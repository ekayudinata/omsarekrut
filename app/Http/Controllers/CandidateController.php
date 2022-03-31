<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Region;
use App\Models\WorkExperience;
use App\Models\WorkField;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Candidate $candidate, WorkField $workfield, Region $region)
    {
        return view('dashboard.candidates.index', [
            'title' => 'Kandidat',
            'candidateCount' => $candidate,
            'workCount' => $workfield,
            'regions' => $region::all(),
            'workfields' => $workfield::all(),
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
    public function show(Candidate $candidate, WorkField $workfield, Region $region, WorkExperience $workexp)
    {
        return view('dashboard.candidates.show', [
            'title' => 'Detail Kandidat',
            'candidateCount' => $candidate,
            'regions' => $region::all(),
            'workfields' => $workfield::all(),
            'workexps' => $workexp::all(),
            'workCount' => $workfield,
            'candidate' => $candidate
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate, WorkField $workfield, Region $region)
    {
        return view('dashboard.candidates.edit', [
            'title' => 'Ubah Status Kandidat',
            'candidateCount' => $candidate,
            'workCount' => $workfield,
            'workfields' => $workfield::all(),
            'regions' => $region::all(),
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
        $validatedData = $request->validate([
            'status' => 'required'
            
        ]);

        Candidate::where('id', $candidate->id)
            ->update($validatedData);

            return redirect('/dashboard/candidates')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        Candidate::destroy($candidate->id);
        return redirect('/dashboard/candidates')->with('success', 'Data berhasil dihapus');
    }
}
