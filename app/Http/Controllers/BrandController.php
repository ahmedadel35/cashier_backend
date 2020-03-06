<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Type;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private $validationRules = [
        'name' => 'required|string|min:2|max:255',
        'price' => 'sometimes|numeric'
    ];

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $typeId)
    {
        $b = $this->validate($request, $this->validationRules);

        $type = Type::findOrFail($typeId);

        $type->brands()->create($b);

        return response()->json($b, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $rq = (object) $this->validate($request, $this->validationRules);

        $brand = Brand::findOrFail($id);
        $brand->name = $rq->name;
        $brand->price = $rq->price;
        $brand->update();

        return response()->json($brand);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $b = Brand::findOrFail($id);

        $b->delete();

        return response()->json(['delete' => true]);
    }
}
