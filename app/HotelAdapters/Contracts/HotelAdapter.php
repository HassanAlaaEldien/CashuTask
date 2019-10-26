<?php
/**
 * Created by PhpStorm.
 * User: hassan
 * Date: 10/26/19
 * Time: 4:29 PM
 */

namespace App\HotelAdapters\Contracts;


interface HotelAdapter
{
    /**
     * @return array
     */
    public function search(array $request);
}
