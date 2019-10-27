<?php
/**
 * Created by PhpStorm.
 * User: hassan
 * Date: 10/26/19
 * Time: 11:52 PM
 */

namespace App\HotelAdapters;


use App\HotelProviders\BestHotelAPI;
use App\HotelProviders\TopHotelsAPI;

class Hotel
{
    /**
     * @var
     */
    protected static $hotels;

    /**
     * @param array $request
     * @return Hotel
     */
    public static function search(array $request)
    {
        $bestHotel = new BestHotelAdapter(new BestHotelAPI($request));

        $topHotel = new TopHotelAdapter(new TopHotelsAPI($request));

        self::$hotels = collect(
            array_merge($bestHotel->get(), $topHotel->get())
        );

        return new static;
    }

    /**
     * @param $column
     * @param null $sort
     * @return mixed
     */
    public static function orderBy($column, $sort = null)
    {
        $sortMethod = $sort === 'DESC' ? 'sortByDesc' : 'sortBy';

        self::$hotels = self::$hotels->$sortMethod($column)->values()->all();

        return new static;
    }

    /**
     * @return array
     */
    public static function get()
    {
        return self::$hotels;
    }
}
