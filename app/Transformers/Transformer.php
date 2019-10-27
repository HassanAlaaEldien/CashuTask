<?php
/**
 * Created by PhpStorm.
 * User: hassan
 * Date: 10/26/19
 * Time: 11:28 PM
 */

namespace App\Transformers;


use App\Transformers\Contracts\HotelTransformer;

class Transformer
{
    /**
     * @param array $data
     * @param HotelTransformer $transformer
     *
     * @return array
     */
    public static function create(array $data, HotelTransformer $transformer)
    {
        $transformed_data = [];

        foreach ($data as $item) {
            array_push($transformed_data, $transformer->transform($item));
        }

        return $transformed_data;
    }
}
