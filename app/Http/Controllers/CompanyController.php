<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(20);

        return view('company.index', ['companies' => $companies]);
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
    public function store(CompanyRequest $request)
    {
        $request = $request->validated();
        $logoName = time() . '.' . $request['logo']->extension();
        $request['logo']->move(storage_path('app/public/logos'), $logoName);
        Company::create([...$request, 'logo' => $logoName]);

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
    public function edit(Company $company): \Illuminate\Contracts\View\View
    {
        return view('company.edit', compact('company'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $request = $request->validated();

        if (isset($request['logo'])) {
           // unlink(storage_path('app/public/logos/' . $company->logo));
            $logoName = time() . '.' . $request['logo']->extension();
            $request['logo']->move(storage_path('app/public/logos'), $logoName);
            $company->update([...$request, 'logo' => $logoName]);
        }

        $company->update($request);

     return redirect('/dashboard/companies')->with('success', 'Company updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        unlink(storage_path('app/public/logos/' . $company->logo));
        $company->delete();
        return redirect('/dashboard/companies')->with('success', 'Company deleted!');
    }
}
