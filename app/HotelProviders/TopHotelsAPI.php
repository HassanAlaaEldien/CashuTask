<?php
/**
 * Created by PhpStorm.
 * User: hassan
 * Date: 10/26/19
 * Time: 3:37 PM
 */

namespace App\HotelProviders;


class TopHotelsAPI
{
    /**
     * @var array
     */
    protected $request;

    /**
     * TopHotelsAPI constructor.
     * @param array $request
     */
    public function __construct(array $request)
    {
        $this->request = $request;
    }

    /**
     * @return array
     */
    public function getHotels()
    {
        return [
            'hotelName' => 'Top Hotel Name!',
            'rate' => (string)rand(1, 5),
            'price' => rand(100, 600),
            'discount' => rand(0, 8),
            'amenities' => [
                "Car Park",
                "Restaurant",
                "Internet access",
                "Air conditioned",
                "e-Check-out & e-check-in",
                "Bar"
            ]
        ];
    }
}
