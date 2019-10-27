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
use App\Transformers\Transformer;

class BestHotelAdapter implements HotelAdapter
{
    private $bestHotel;

    /**
     * BestHotelAdapter constructor.
     * @param BestHotelAPI $adapter
     */
    public function __construct(BestHotelAPI $adapter)
    {
        $this->bestHotel = $adapter;
    }

    /**
     * Search BestHotels Provider For Required Hotels.
     *
     * @return array
     */
    public function get()
    {
        $hotels = $this->bestHotel->searchHotels();

        return Transformer::create($hotels, new BestHotelTransformer);
    }
}
