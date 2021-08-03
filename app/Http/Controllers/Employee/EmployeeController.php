<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $employees = Employee::with('company')->latest()->paginate(10);

        return view('employee.index', compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::select('id', 'name')->latest()->get();
        return view('employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id'         => 'required   | integer ',
            'first_name'         => ' required  | string',
            'last_name'          => 'nullable   | string',
            'email'              => 'nullable   | email ',
            'phone'              => 'nullable   | string',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'employee created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {

        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee)
    {
        $companies = Company::select('id', 'name')->latest()->get();
        return view('employee.edit', compact('employee', 'companies'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employee $employee)
    {
        $request->validate([
            'company_id'         => 'required   | integer ',
            'first_name'         =>  'required | string ',
            'last_name'          => 'nullable   | string',
            'email'              => 'nullable   | email ',
            'phone'              => 'nullable   | string',
        ]);
        $employee->update($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'employee updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'employee deleted successfully');
    }
}
