<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CarModel;
use App\Models\ChipTuning;
use App\Models\Contact;
use App\Models\Engine;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }

    public function getChip(Request $request){

        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'type' => 'required',
            'engine' => 'required',
        ]);

        // dd($request->all());

        $brand = Brand::where('id', $request->brand)->first();
        $model = CarModel::where('id', $request->model)->first();
        $type = Type::where('id', $request->type)->first();
        $engine = Engine::where('id', $request->engine)->first();


        $chipTunning=ChipTuning::where('brand_id', $brand->id)
            ->where('model_id', $model->id)
            ->where('type_id', $type->id)
            ->where('engine_id', $engine->id)
            ->first();





        return view('chip-tunning', compact('chipTunning'));
    }


    public function contactUs(Request $request){

        $request->validate([
            "name" => "required",
            "email"=>"required",
            "subject"=>"required",
            "message"=>"required",
        ]);

        Contact::create($request->all());


        return redirect()->back()->with('success', 'Your message has been sent successfully');

    }

}
