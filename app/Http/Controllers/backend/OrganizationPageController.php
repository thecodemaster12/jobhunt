<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orgs = Organization::latest()->get();
        return view('backend.organization.index', compact('orgs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.organization.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:organizations,name',
                'about' => 'required',
                'address' => 'required',
                'phone' => 'required|unique:organizations,phone|regex:/^\d{11}$/',
                'email' => 'required|unique:organizations,email|email',
            ]
        );

        $org = new Organization();

        $org->name = $request->name;
        $org->about = $request->about;
        $org->address = $request->address;
        $org->phone = $request->phone;
        $org->email = $request->email;

        $org->save();

        return redirect()->route('organization.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $org)
    {
        return view('backend.organization.show', compact('org'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $org)
    {
        return view('backend.organization.edit', compact('org'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization $org)
    {

        if ($org->name !== $request->name) {
            $request->validate(
                [
                    'name' => 'unique:organizations,name',
                ]
            );
        }
        if ($org->email !== $request->email) {
            $request->validate(
                [
                    'email' => 'unique:organizations,name',
                ]
            );
        }
        if ($org->phone !== $request->phone) {
            $request->validate(
                [
                    'phone' => 'unique:organizations,phone',
                ]
            );
        }

        $request->validate(
            [
                'name' => 'required',
                'about' => 'required',
                'address' => 'required',
                'phone' => 'required|regex:/^\d{11}$/',
                'email' => 'required',
            ]
        );

        $org->name = $request->name;
        $org->about = $request->about;
        $org->address = $request->address;
        $org->phone = $request->phone;
        $org->email = $request->email;

        $org->save();

        return redirect()->route('organization.index');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $org)
    {
        $org->delete();
        return redirect()->route('organization.index');
    }
}
