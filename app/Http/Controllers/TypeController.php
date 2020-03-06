<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::with('brands')->get();
        return $types->toJson();
    }

    /**
     * Store a newly created resource in storage.
     * 
     * * Request Body Must Be form-data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $t = $this->validate($request, [
            'name' => 'required|string|min:2|max:255'
        ]);

        Type::create($t);

        return json_encode($t);
    }

    /**
     * Update the specified resource in storage.
     * 
     * * Request Body Must Be x-www-form-urlencoded
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type)
    {
        $q = (object)$this->validate($request, [
            'name' => 'required|string|min:2|max:255'
        ]);

        $t = Type::findOrFail($type);
        $t->name = $q->name;
        $t->update();

        return $t->toJson();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $typeId)
    {
        $t = Type::findOrFail($typeId);

        $t->delete();

        return json_encode(['delete' => true]);
    }
}
