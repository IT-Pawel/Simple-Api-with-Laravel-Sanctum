<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\DodajKursRequest;
use Illuminate\Http\Request;
use App\Enum\Role;
use App\Models\Kurs;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PokazKursyRequest;
use App\Http\Resources\KursyRescource;

class KursyController extends Controller
{
    use HttpResponses;
    /**
     * Store a newly created resource in storage.
     */
    public function store(DodajKursRequest $request)
    {
        $request->validated($request->all());

        if (Auth::user()->role !== Role::ADMIN->value) {
            return $this->error('', 'Brak autoryzacji', 403);
        }

        $kurs = Kurs::where([
            'currency' => $request->currency,
            'date' => date("Y-m-d", strtotime($request->date) )
        ])->first();

        if (!empty($kurs)) {
            return $this->error('', 'Kurs już istnieje', 403);
        }

        Kurs::create(
            [
                "currency" => $request->currency,
                "date" =>   date("Y-m-d", strtotime($request->date)),
                "amount" => $request->amount
            ]
        );
        
    }

    /**
     * Display the specified resource.
     */
    public function show(PokazKursyRequest $request)
    {
        $request->validated($request->all());

        $searchParams = [
            'date' => date("Y-m-d", strtotime($request->date) )
        ];

        if(!empty($request->currency)){
            $searchParams['currency'] = $request->currency;
        }

        return KursyRescource::collection(
            Kurs::where($searchParams)->get()
        );

    }

}
