<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $employees = Employee::all();
        $employees = Employee::paginate(2);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departments = Department::all();
        return view('employees.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees',
            'salary' => 'required',
            'gender' => 'required',
        ]);
        $image_path=null;
        ### save image
        if($request->hasFile('image')){
            $image = $request->file('image');
            ## save file to storage
            # define storage ??
            $image_path =$image->store('images','employees_upload');

        }

        $request_data = $request->all();
        $request_data['image'] = $image_path;
        $employee= Employee::create($request_data);
//        $employee = Employee::create($request->all());
//        $employee->image = $image_path;
//        $employee->save();
        return to_route('employees.show', $employee);



    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
//        dd($employee);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
        $departments = Department::all();
        return view('employees.edit', compact('employee', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
        $request->validate([
            'name' => 'required',
//            'email' => 'required|unique:employees'.$employee->id,
            'email'=>['required',Rule::unique('employees')->ignore($employee->id)],
            'salary' => 'required',
            'gender' => 'required',
            'image' => 'mimes:jpg,bmp,png'
        ]);
//        return "hi";
        $image_path=$employee->image;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_path =$image->store('images','employees_upload');
        }
        $request_data = $request->all();
        $request_data['image'] = $image_path;
        $employee->update($request_data);
        return to_route('employees.show', $employee);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee) # implicitly select * from employees where id =
    {
        //
//        dd($employee);
        $employee->delete();
        return to_route('employees.index');

    }
}
