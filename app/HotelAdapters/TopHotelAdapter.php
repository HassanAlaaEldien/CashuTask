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
use App\Transformers\Transformer;

class TopHotelAdapter implements HotelAdapter
{
    private $topHotel;

    /**
     * TopHotelAdapter constructor.
     * @param TopHotelsAPI $adapter
     */
    public function __construct(TopHotelsAPI $adapter)
    {
        $this->topHotel = $adapter;
    }

    /**
     * Search TopHotels Provider For Required Hotels.
     *
     * @param array $request
     *
     * @return array
     */
    public function get()
    {
        $hotels = $this->topHotel->getHotels();

        return Transformer::create($hotels, new TopHotelTransformer);
    }
}
