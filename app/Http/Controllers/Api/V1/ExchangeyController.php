<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enum\Role;
use App\Models\Exchange;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreExchangeRequest;
use App\Http\Requests\ShowExchangeRequest;
use App\Http\Resources\ExchangeResoucre;
use Illuminate\Support\Carbon;

class ExchangeyController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExchangeRequest $request)
    {
        $request->validated($request->all());

        if (Auth::user()->role !== Role::ADMIN->value) {
            return $this->error([], 'Brak autoryzacji', 401);
        }

        $exchange = Exchange::where([
            'currency' => $request->currency,
            'date' => Carbon::createFromFormat('Y-m-d', $request->date)->toDateString()
        ])->first();

        if (!empty($exchange)) {
            return $this->error([], 'Exchange already exists', 400);
        }

        $exchange = Exchange::create(
            [
                "currency" => $request->currency,
                "date" =>   Carbon::createFromFormat('Y-m-d', $request->date)->toDateString(),
                "amount" => $request->amount
            ]
        );

        return new ExchangeResoucre($exchange);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowExchangeRequest $request)
    {
        $request->validated($request->all());

        $searchParams = [
            'date' => Carbon::createFromFormat('Y-m-d', $request->date)->toDateString()
        ];

        if (!empty($request->currency)) {
            $searchParams['currency'] = $request->currency;
        }

        return ExchangeResoucre::collection(
            Exchange::where($searchParams)->get()
        );
    }
}
