<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return Employee::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'pincode' => 'required|string|max:10',
        ]);

        return Employee::create($request->all());
    }

    public function show($id)
    {
        return Employee::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return $employee;
    }

    public function destroy($id)
    {
        Employee::findOrFail($id)->delete();

        return response()->noContent();
    }

    public function create()
    {

    return view('employees.create');
    
    }
}
