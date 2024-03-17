<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

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
    public function index(Request $request)
    {
        $user = $request->user();

        if($user->hasRole(['admin', 'staff'])){
            $data = Complaint::whereDate('created_at', now())->get();
            return view('home')->with('data', $data);
        }else{
            $data = Complaint::where('patient_id', $user->id)->whereDate('created_at', now())->get();
            return view('home')->with('data', $data);
        }
    }
}
