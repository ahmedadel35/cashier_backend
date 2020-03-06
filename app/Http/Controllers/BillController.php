<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    private $validationRules = [
        'typeId' => 'required|numeric|exists:types,id',
        'brandId' => 'required|numeric|exists:brands,id',
        'quantity' => 'required|numeric',
        'price' => 'required|numeric',
        'value' => 'required|numeric'
    ];

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $b = $this->validate($request, $this->validationRules);

        Bill::create($b);

        return response()->json($b);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $rq = (object)$this->validate($request, $this->validationRules);

        $b = Bill::findOrFail($id);
        $b->quantity = $rq->quantity;
        $b->price = $rq->price;
        $b->value = $rq->value;

        $b->update();

        return response()->json($b);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
    }
}
