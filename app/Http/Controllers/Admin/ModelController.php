<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models=CarModel::latest()->get();

        return view('admin.models.index', compact('models'));
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
            "name" => "required|unique:models,name",
        ]);

        $model=CarModel::create($request->all());

        return redirect()->route('admin.models.index')->with('success', 'Added successfully.');
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

        $model=CarModel::find($id);

        if(!$model){
            return redirect()->route('admin.models.index')->with('error', 'Model not found.');
        }

        return view('admin.models.edit', compact('model'));

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
            "name" => "required|unique:models,name,".$id,
        ]);

        $model=CarModel::find($id);

        if(!$model){
            return redirect()->route('admin.models.index')->with('error', 'Model not found.');
        }

        $model->update($request->all());

        return redirect()->route('admin.models.index')->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model=CarModel::find($id);

        if(!$model){
            return redirect()->route('admin.models.index')->with('error', 'Model not found.');
        }

        $model->delete();

        return redirect()->route('admin.models.index')->with('success', 'Deleted successfully.');
    }
}
