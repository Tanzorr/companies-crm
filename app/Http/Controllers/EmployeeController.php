<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $employees = Employee::with('company')->paginate(5);

        return view('employees.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $companies = Company::all();

        return view('employees.create', ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request): \Illuminate\Http\RedirectResponse
    {
        $request->validated();
        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $companies = Company::all();
        return view('employees.edit', [
            'employee' => $employee,
            'companies' => $companies
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee): \Illuminate\Http\RedirectResponse
    {
        $request->validated();
        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee): \Illuminate\Http\RedirectResponse
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
