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
    public static function transform(array $hotel_details)
    {
        return [
            'provider' => 'Best Hotel',
            'hotelName' => $hotel_details['hotel'],
            'fare' => self::prepareFarePerNight(
                $hotel_details['hotelFare'], $hotel_details['from'], $hotel_details['to']
            ),
            'amenities' => explode(',', $hotel_details['roomAmenities']),
        ];
    }

    /**
     * @param $total_fare
     * @param $date_from
     * @param $date_to
     * @return float|int
     */
    private static function prepareFarePerNight($total_fare, $date_from, $date_to)
    {
        $nights = Carbon::parse($date_from)->diffInDays(
            Carbon::parse($date_to)
        );

        return $total_fare / $nights;
    }
}
