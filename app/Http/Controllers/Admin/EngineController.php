<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Engine;
use Illuminate\Http\Request;

class EngineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $engines=Engine::latest()->get();

        return view('admin.engines.index', compact('engines'));
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
            "name" => "required|unique:engines,name",
        ]);

        $engine=Engine::create($request->all());

        return redirect()->route('admin.engines.index')->with('success', 'Added successfully.');
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
        $engine=Engine::find($id);

        if(!$engine){
            return redirect()->route('admin.engines.index')->with('error', 'Not found.');
        }

        return view('admin.engines.edit', compact('engine'));
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
        $engine=Engine::find($id);

        if(!$engine){
            return redirect()->route('admin.engines.index')->with('error', 'Not found.');
        }

        $request->validate([
            "name" => "required|unique:engines,name,".$engine->id,
        ]);

        $engine->update($request->all());

        return redirect()->route('admin.engines.index')->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $engine=Engine::find($id);

        if(!$engine){
            return redirect()->route('admin.engines.index')->with('error', 'Not found.');
        }

        $engine->delete();

        return redirect()->route('admin.engines.index')->with('success', 'Deleted successfully.');
    }
}
