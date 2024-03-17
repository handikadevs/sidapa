<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Poly;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        if($user->hasRole(['admin', 'staff'])){
            $data = Complaint::get();
            return view('complaint.listComplaint')->with('data', $data);
        }else{
            $data = Complaint::where('patient_id', $user->id)->get();
            return view('complaint.listComplaint')->with('data', $data);
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
        $request->validate([
            'patient_id' => 'required',
            'complaint' => 'required',
        ]);

        DB::beginTransaction();
        $complaint = new Complaint([
            'patient_id' => $request->get('patient_id'),
            'complaint' => $request->get('complaint'),
            'created_at' => now(),
        ]);

        $complaint->save();

        DB::commit();

        Alert::success('Terkirim', 'Keluhan anda berhasil dikirim, mohon menunggu informasi poli.');
        return redirect()->route('complaints.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Complaint $complaint, Request $request)
    {
        $user = $request->user();

        if($user->hasRole(['admin', 'staff'])){
            $data = array(
                'complaint' => $complaint->where('patient_id', $complaint->patient_id)->with('user')->get(),
                'polies' => Poly::get(),
            );
            return view('complaint.detailComplaint')->with($data);
        }else{
            $data = Complaint::where('patient_id', $user->id)->get();
            return view('complaint.detailComplaint')->with($data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Complaint $complaint)
    {
        $request->validate([
            'patient_id' => 'required',
            'poly_id' => 'required',
        ]);

        $newData = array(
           'id' => $request->get('id'),
           'patient_id' => $request->get('patient_id'),
           'poly_id' => $request->get('poly_id'),
           'complaint' => $request->get('complaint'),
           'created_at' => $request->get('created_at'),
           'updated_at' => now(),
        );
          
        $complaint->update($newData);

        Alert::success('Sukses', 'Keluhan berhasil di update');
        return redirect()->route('complaints.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaint $complaint)
    {
        $complaint->delete();

        Alert::success('Sukses', 'Keluhan berhasil di hapus');
        return redirect()->route('complaints.index');
    }
}
