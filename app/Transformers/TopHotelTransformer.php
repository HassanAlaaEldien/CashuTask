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
    public function transform(array $hotel_details)
    {
        return [
            'provider' => 'Top Hotel',
            'hotelName' => $hotel_details['hotelName'],
            'rate' => (int)$hotel_details['rate'],
            'fare' => $this->prepareFarePerNight(
                $hotel_details['price'], ($hotel_details['discount'])
            ),
            'amenities' => $hotel_details['amenities']
        ];
    }

    /**
     * @param $price
     * @param $discount
     * @return float|int
     */
    private function prepareFarePerNight($price, $discount)
    {
        $discount_amount = $discount ? $price * ($discount / 100) : 0;
        return $price - $discount_amount;
    }
}
