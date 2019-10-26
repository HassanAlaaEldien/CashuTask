<?php
/**
 * Created by PhpStorm.
 * User: hassan
 * Date: 10/26/19
 * Time: 5:28 PM
 */

namespace App\Transformers;


use App\Transformers\Contracts\HotelTransformer;

class TopHotelTransformer implements HotelTransformer
{
    /**
     * @param array $hotel_details
     * @return array
     */
    public static function transform(array $hotel_details)
    {
        return [
            'provider' => 'Top Hotel',
            'hotelName' => $hotel_details['hotelName'],
            'fare' => self::prepareFarePerNight($hotel_details['price'], ($hotel_details['discount'])),
            'amenities' => $hotel_details['amenities']
        ];
    }

    /**
     * @param $price
     * @param $discount
     * @return float|int
     */
    private static function prepareFarePerNight($price, $discount)
    {
        $discount_amount = $discount ? $price * ($discount / 100) : 0;
        return $price - $discount_amount;
    }
}
