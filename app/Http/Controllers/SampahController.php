<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreSampahRequest;
use App\Http\Requests\UpdateSampahRequest;

class SampahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Dashboard.sampahs.index', [
            'sampahs' => Sampah::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.sampahs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSampahRequest $request)
    {
        //dd($request);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'harga' => 'required',
            'satuan' => 'required',
        ]);

        $validatedData['jumlah'] = 0;
        $validatedData['user_id'] = auth()->user()->id;

        Sampah::create($validatedData);

        return redirect('dashboard/sampahs')->with('success', 'New Sampah has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sampah $sampah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sampah $sampah)
    {
        return view('Dashboard.sampahs.edit', [
            'sampah' => $sampah
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSampahRequest $request, Sampah $sampah)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'harga' => 'required',
            'satuan' => 'required',
        ]);

        if($sampah->user_id !== auth()->user()->id) abort(403);

        $validatedData['user_id'] = auth()->user()->id;

        Sampah::where('id', $sampah->id)
            ->update($validatedData);

        return redirect('dashboard/sampahs')->with('success', 'Sampah has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sampah $sampah)
    {
        $sampah->members()->detach();
        Sampah::destroy($sampah->id);
        return redirect('dashboard/sampahs')->with('success', 'Sampah has been deleted!');
    }
}
