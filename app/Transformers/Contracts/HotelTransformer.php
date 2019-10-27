<?php
/**
 * Created by PhpStorm.
 * User: hassan
 * Date: 10/26/19
 * Time: 5:29 PM
 */

namespace App\Transformers\Contracts;


interface HotelTransformer
{
    /**
     * @return array
     */
    public function transform(array $hotel_details);
}
