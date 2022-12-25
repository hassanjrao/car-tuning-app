<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
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
        $types=Type::latest()->get();

        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "type" => "required|unique:types,type",
        ]);

        $type=Type::create($request->all());

        return redirect()->route('admin.types.index')->with('success', 'Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type=Type::find($id);

        if(!$type){
            return redirect()->route('admin.types.index')->with('error', 'Type not found.');
        }

        return view('admin.types.edit', compact('type'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "type" => "required|unique:types,type,".$id,
        ]);

        $type=Type::find($id);

        if(!$type){
            return redirect()->route('admin.types.index')->with('error', 'Type not found.');
        }

        $type->update($request->all());

        return redirect()->route('admin.types.index')->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type=Type::find($id);

        if(!$type){
            return redirect()->route('admin.types.index')->with('error', 'Type not found.');
        }

        $type->delete();

        return redirect()->route('admin.types.index')->with('success', 'Deleted successfully.');
    }
}
