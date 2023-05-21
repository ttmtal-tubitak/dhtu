<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Exception;
use Image;
Use \Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use DB;


// use Carbon\CarbonInterval;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function saveExpert(Request $request){
        if($request->ajax()){
            $file = $request->file('image');
            $new_name =  $request->class . '_' . Carbon::now()->format('d-m-Y_H-i-s-') . rand() . '.' . $file->getClientOriginalExtension();
            $fileStatus = $file->move(public_path('img/experts'), $new_name);
            $fileUrl = 'img/experts/'. $new_name;

            $data = [
                "class" => $request->class,
                "description" => $request->desc,
                "img" => $fileUrl
            ];

            $isOk = DB::table('expertdatas')->insert($data);

            if($isOk) 
                return 200;
            else
                return 0;
            // return $request;
        }
    }
}
