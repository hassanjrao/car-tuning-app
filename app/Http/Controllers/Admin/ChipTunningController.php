<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChipTuning;
use Illuminate\Http\Request;

class ChipTunningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chipTunnings=ChipTuning::latest()->with(["brand","model","type","engine"])->get();

        return view('admin.chip-tunnings.index', compact('chipTunnings'));
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
            "name" => "required",
            "brand_id" => "required|exists:brands,id",
            "model_id" => "required|exists:models,id",
            "type_id" => "required|exists:types,id",
            "engine_id" => "required|exists:engines,id",
            "asset_original" => "required",
            "asset_after_tuning" => "required",
            "asset_result" => "required",
            "couple_original" => "required",
            "couple_after_tuning" => "required",
            "couple_result" => "required",
        ]);


        $chipTunning=ChipTuning::create($request->all());

        return redirect()->route('admin.chip-tunnings.index')->with('success', 'Added successfully.');

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
        $chip=ChipTuning::find($id);

        return view('admin.chip-tunnings.edit', compact('chip'));
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
            "name" => "required",
            "brand_id" => "required|exists:brands,id",
            "model_id" => "required|exists:models,id",
            "type_id" => "required|exists:types,id",
            "engine_id" => "required|exists:engines,id",
            "asset_original" => "required",
            "asset_after_tuning" => "required",
            "asset_result" => "required",
            "couple_original" => "required",
            "couple_after_tuning" => "required",
            "couple_result" => "required",
        ]);

        $chipTunning=ChipTuning::find($id);

        if(!$chipTunning){
            return redirect()->route('admin.chip-tunnings.index')->with('error', 'Not found.');
        }

        $chipTunning->update($request->all());

        return redirect()->route('admin.chip-tunnings.index')->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chipTunning=ChipTuning::find($id);

        $chipTunning->delete();

        return redirect()->route('admin.chip-tunnings.index')->with('success', 'Deleted successfully.');
    }
}
