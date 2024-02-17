<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(20);

        return view('company.index',['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string | max:255',
            'email' => 'required | email | max:255',
            'logo' => 'required | image | mimes:jpeg,png,jpg,gif,svg ',
            'website' => 'required | url',
        ]);

        $logoName = time() . '.' . $request->logo->extension();
        $request->logo->move(public_path('logos'), $logoName);

        $company = new Company([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'logo' => $logoName,
            'website' => $request->get('website'),
        ]);


        $company->save();

        return redirect('/dashboard/companies')->with('success', 'Company saved!');
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
