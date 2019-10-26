<?php

namespace App\Http\Controllers;

use App\HotelAdapters\Contracts\HotelAdapter;
use App\Http\Requests\HotelSearchRequest;
use App\Http\Responses\ResponsesInterface;
use Illuminate\Http\JsonResponse;

class HotelsController extends Controller
{
    /**
     * @var ResponsesInterface
     */
    protected $responder;

    /**
     * HotelsController constructor.
     */
    public function __construct(ResponsesInterface $responder)
    {
        $this->responder = $responder;
    }

    /**
     * Search hotels based on current provider.
     *
     * @param HotelSearchRequest $request
     * @return JsonResponse
     */
    public function search(HotelSearchRequest $request, HotelAdapter $adapter)
    {
        $hotels = $adapter->search($request->toArray());

        return $this->responder->respond($hotels);
    }
}
