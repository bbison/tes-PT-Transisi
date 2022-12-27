<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\company;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\employeeImport;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee/index',[
            'employees'=>employee::paginate(5),
           
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee/create',[
            'companys'=>company::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validted = $request->validate([
            'name'=>['required'],
            'email'=>['required'],
            'company_id'=>['required']
        ]);

        employee::create($validted);
        return redirect ('/employee')->with('success', 'Employe has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        return view('employee/detailemployee',[
            'employee'=>employee::find($employee->id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee)
    {
        return view('employee/edit',[
            'employee'=>employee::find($employee->id),
            'companys'=>company::all()
        ]);
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
        $validted = $request->validate([
            'name'=>['required'],
            'email'=>['required'],
            'company_id'=>['required']
        ]);

        employee::find($employee->id)->update($validted);
        return redirect ('/employee')->with('success', 'Employe has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, employee $employee)
    {
        if(env('APP_URL')== $request->url){
            return redirect('company/detail/'.$employee->id);
        }
        employee::find($employee->id)->delete();
        return redirect('/employee');
    }

    public function prosesimport(Request $request){
        Excel::import(new employeeImport,
        $request->file('fileexel')->store('files'));
        return redirect()->back();

    }

    public function ajax($str)
    {
        
        return view('employee/ajax',[
            'employees'=>employee::where('name','like', '%'.$str.'%')
            ->orWhere('email','like', '%'.$str.'%')
            ->limit(5)
            ->get()
        ]);
    }
}
