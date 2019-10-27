<?php

namespace Tests\Feature\Search;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\TestResponse;
use Tests\TestCase;

class SearchHotels extends TestCase
{
    /**
     * @test
     */
    public function any_guest_can_search_our_hotels_using_both_providers()
    {
        $request = $this->mockRequestData();

        $response = $this->get(route('hotels.search', $request));

        $response->assertStatus(200);

        $search_result = $response->decodeResponseJson();

        $this->assertCount(2, $search_result);
    }

    /**
     * @test
     */
    public function send_non_integer_adult_number_leads_to_failure_of_search_results()
    {
        $request = $this->mockRequestData(['adult_number' => 'dummy']);

        $response = $this->get(route('hotels.search', $request));

        $this->assertValidationError($response, 'adult_number');
    }

    /**
     * @test
     */
    public function send_wrong_to_date_leads_to_failure_of_search_results()
    {
        $request = $this->mockRequestData(['to' => 'dummy']);

        $response = $this->get(route('hotels.search', $request));

        $this->assertValidationError($response, 'to');;
    }

    /**
     * @test
     */
    public function send_wrong_from_date_leads_to_failure_of_search_results()
    {
        $request = $this->mockRequestData(['from' => 'dummy']);

        $response = $this->get(route('hotels.search', $request));

        $this->assertValidationError($response, 'from');
    }


    /**
     * Custom assertion for validation error.
     *
     * @param TestResponse $response
     * @param string $field
     */
    private function assertValidationError(TestResponse $response, string $field)
    {
        $response->assertStatus(422);

        // The returned json should contain the validation error on the given field
        $errorMessages = $response->decodeResponseJson()['error']['message'];

        $this->assertArrayHasKey($field, $errorMessages);
    }

    /**
     * @return array
     */
    private function mockRequestData(array $cutom_attributes = [])
    {
        $request = [
            'from' => $cutom_attributes['from'] ?? Carbon::today()->format('y-m-d'),
            'to' => $cutom_attributes['to'] ?? Carbon::today()->addDays(3)->format('y-m-d'),
            'city' => 'ATH',
            'adult_number' => $cutom_attributes['adult_number'] ?? rand(4, 10)
        ];

        return $request;
    }
}
