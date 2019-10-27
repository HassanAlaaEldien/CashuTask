<?php

namespace App\Http\Controllers;

use App\HotelAdapters\BestHotelAdapter;
use App\HotelAdapters\Contracts\HotelAdapter;
use App\HotelAdapters\Hotel;
use App\HotelAdapters\TopHotelAdapter;
use App\HotelProviders\BestHotelAPI;
use App\HotelProviders\TopHotelsAPI;
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
     * @param ResponsesInterface $responder
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
    public function search(HotelSearchRequest $request)
    {
        $hotels = Hotel::search($request->toArray())->orderBy('rate', 'DESC')->get();

        return $this->responder->respond($hotels);
    }
}
