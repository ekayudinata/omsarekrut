<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Region;
use App\Models\WorkField;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Candidate $candidate)
    {
        return view('dashboard.candidates.index', [
            'title' => 'Kandidat',
            'candidates' => $candidate::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Candidate $candidate)
    {
        return view('dashboard.candidates.edit', [
            'title' => 'Ubah Bidang Pekerjaan',
            'candidates' => $candidate::all()
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        return view('dashboard.candidates.show', [
            'title' => 'Detail Kandidat',
            'candidate' => $candidate
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        return view('dashboard.candidates.show', [
            'title' => 'Detail Kandidat',
            'candidate' => $candidate
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}
