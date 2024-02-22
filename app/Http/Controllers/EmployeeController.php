<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $search = $request->get('search');
        $employees = Employee::search($search, ['first_name', 'last_name', 'email', 'phone'])
            ->with('company')->paginate(5)->withQueryString();

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
        $validateRequest = $request->validated();

        Employee::query()->create($validateRequest);

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
        $validateRequest = $request->validated();
        $employee->update($validateRequest);

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
