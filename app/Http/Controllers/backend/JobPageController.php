<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Organization;
use Illuminate\Http\Request;

class JobPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.job.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orgs = Organization::orderBy('name')->get();
        return view('backend.job.create', compact('orgs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'salary' => 'required',
            'description' => 'required',
        ]);

        $job = new Job();

        $job->title = $request->title;
        $job->description = $request->description;
        $job->organization_id = $request->organization_id;
        $job->salary = $request->salary;
        $job->save();

        return redirect()->route('job.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
