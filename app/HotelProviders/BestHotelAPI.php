<?php
/**
 * Created by PhpStorm.
 * User: hassan
 * Date: 10/26/19
 * Time: 3:36 PM
 */

namespace App\HotelProviders;


class BestHotelAPI
{
    /**
     * @var array
     */
    protected $request;

    /**
     * BestHotelAPI constructor.
     * @param array $request
     */
    public function __construct(array $request)
    {
        $this->request = $request;
    }

    /**
     * @return array
     */
    public function searchHotels()
    {
        return array([
            'hotel' => 'Best Hotel Name!',
            'hotelRate' => rand(1, 5),
            'hotelFare' => round(rand(900, 1500) / 10, 2),
            'roomAmenities' => "Car Park,Restaurant,Internet access,Air conditioned,e-Check-out & e-check-in,Bar"
        ]);
    }
}
