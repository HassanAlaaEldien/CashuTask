<?php

/**
 * Created by PhpStorm.
 * User: hassan
 * Date: 10/26/19
 * Time: 4:24 PM
 */

namespace App\HotelAdapters;

use App\HotelAdapters\Contracts\HotelAdapter;
use App\HotelProviders\BestHotelAPI;
use App\Transformers\BestHotelTransformer;

class BestHotelAdapter implements HotelAdapter
{
    /**
     * Search BestHotels Provider For Required Hotels.
     *
     * @return array
     */
    public function search(array $request)
    {
        $hotels = (new BestHotelAPI($request))->searchHotels();

        return BestHotelTransformer::transform($hotels);
    }
}
