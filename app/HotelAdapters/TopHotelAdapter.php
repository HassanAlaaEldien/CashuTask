<?php
/**
 * Created by PhpStorm.
 * User: hassan
 * Date: 10/26/19
 * Time: 4:24 PM
 */

namespace App\HotelAdapters;


use App\HotelAdapters\Contracts\HotelAdapter;
use App\HotelProviders\TopHotelsAPI;
use App\Transformers\TopHotelTransformer;

class TopHotelAdapter implements HotelAdapter
{
    /**
     * Search TopHotels Provider For Required Hotels.
     *
     * @return array
     */
    public function search(array $request)
    {
        $hotels = (new TopHotelsAPI($request))->getHotels();

        return TopHotelTransformer::transform($hotels);
    }
}
