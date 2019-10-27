<?php
/**
 * Created by PhpStorm.
 * User: hassan
 * Date: 10/26/19
 * Time: 5:27 PM
 */

namespace App\Transformers;


use App\Transformers\Contracts\HotelTransformer;
use Carbon\Carbon;

class BestHotelTransformer implements HotelTransformer
{
    /**
     * @param array $hotel_details
     * @return array
     */
    public function transform(array $hotel_details)
    {
        return [
            'provider' => 'Best Hotel',
            'hotelName' => $hotel_details['hotel'],
            'rate' => $hotel_details['hotelRate'],
            'fare' => $this->prepareFarePerNight($hotel_details['hotelFare']),
            'amenities' => explode(',', $hotel_details['roomAmenities']),
        ];
    }

    /**
     * @param $total_fare
     * @return float|int
     */
    private function prepareFarePerNight($total_fare)
    {
        $nights = Carbon::parse(request()->from)->diffInDays(
            Carbon::parse(request()->to)
        );

        return round($total_fare / $nights, 2);
    }
}
