<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
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
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        if($user->hasRole(['admin', 'staff'])){
            $data = User::where('category', 'rm')->get();

            return view('staff.listStaff')->with('data', $data);
        }else{
            return redirect()->route('home');
        }
    }

    public function newPatient(Request $request){
        $user = $request->user();

        if($user->hasRole(['admin','staff'])){
            $data = User::where('category', 'new')->with('complaint')->get();

            return view('patient.listNewPatient')->with('data', $data);
        }else{
            return redirect()->route('home');
        }
    }

    public function oldPatient(Request $request){
        $user = $request->user();

        if($user->hasRole(['admin','staff'])){
            $data = User::where('category', 'old')->get();
            return view('patient.listPatient')->with('data', $data);
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showPatient(string $id, Request $request)
    {
        $user = $request->user();

        if($user->hasRole(['admin', 'staff'])){
            $data = array(
                'patient' => $user->where('id', $id)->get(),
                'complaints' => Complaint::where('patient_id', $id)->get(),
            );
            return view('patient.detailPatient')->with($data);
        }else{
            $data = array(
                'patient' => $user->where('id', $id)->get(),
                'complaints' => Complaint::where('patient_id', $id)->get(),
            );
            return view('patient.detailPatient')->with($data);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function addRm(Request $request, string $id, User $user)
    {
        $user = $request->user();

        if($user->hasRole(['admin', 'staff'])){
            $newData = array(
            'no_medical_records' => $request->get('no_medical_records'),
            'category' => 'old',
            'updated_at' => now(),
            );
            
            $user->where('id', $id)->update($newData);

            Alert::success('Sukses', 'No. RM berhasil ditambahkan');
            return redirect()->route('patientallPatient');
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, User $user)
    {
        $user->where('id', $id)->delete();

        Alert::success('Sukses', 'User berhasil di hapus');
        return redirect()->route('patientallPatient');
    }
}
