<?php

namespace App\Http\Controllers;

use App\Models\Poly;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PolyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        if($user->hasRole(['admin', 'staff'])){
            $data = Poly::get();
            return view('poly.listPoly')->with('data', $data);
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
        $request->validate([
            'name' => 'required',
            'services' => 'required',
            'service_days' => 'required',
            'hours_from' => 'required',
            'hours_to' => 'required',
            'categories' => 'required',
        ]);

        DB::beginTransaction();
        $poly = new Poly([
            'name' => $request->get('name'),
            'categories' => $request->get('categories'),
            'services' => $request->get('services'),
            'service_days' => $request->get('service_days'),
            'hours_from' => $request->get('hours_from'),
            'hours_to' => $request->get('hours_to'),
            'doctor' => $request->get('doctor'),
            'created_at' => now(),
        ]);

        $poly->save();

        DB::commit();

        Alert::success('Berhasil', 'Poli baru telah disimpan');
        return redirect()->route('polies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Poly $poly, Request $request) 
    {
        $user = $request->user();

        if($user->hasRole(['admin', 'staff'])){
            $data = Poly::where('id', $poly->id)->get();
            return view('poly.detailPoly')->with('data', $data);
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poly $poly)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Poly $poly)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poly $poly)
    {
        $poly->delete();

        Alert::success('Sukses', 'Poli berhasil di hapus');
        return redirect()->route('polies.index');
    }
}
