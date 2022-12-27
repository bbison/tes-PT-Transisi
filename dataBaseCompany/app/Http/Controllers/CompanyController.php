<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\companyimport;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('company/index',[
            'companys'=>company::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('company/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
           'name'=>['required'],
           'email'=>['required'],
           'logo'=>['required','image','mimes:png', 'file', 'max:2000'],
           'website'=>['required'],
        ]);

        if($request->file('logo')){
            $validated['logo']=$request->file('logo')->store('company');
        }
       
        company::create($validated);
        return redirect('/company')->with('success', 'Sucsessfuly Added To DataBase');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(company $company)
    {
        return view('company/edit',[
            'company'=>company::find($company->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, company $company)
    {
        $validated=$request->validate([
           'name'=>['required'],
            'email'=>['required'],
            'logo'=>['required','image','mimes:png', 'file', 'max:2000'],
            'website'=>['required'],
         ]);
         if($request->file('logo')){
            if ($request['oldimage']){
            storage::delete($request['oldimage']);
            }
            $validated['logo']=$request->file('logo')->store('company');
        }
       
        company::find($company->id)->update($validated);
        return redirect('/company')->with('success', 'Sucsessfuly Updated DataBase');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(company $company)
    {

        if(employee::where('company_id', $company->id)->count() != 0){
            return redirect('/company')->with('field', 'sorry this company Has an employees, Delete Al employees in Company To delete this Company Data');
        }
        if($company->logo){
            storage::delete($company->logo);
        }
        $company=company::find($company->id)->delete();
        return redirect('/company')->with('success', 'Sucsessfuly Delete DataBase');

    }

    public function allemployee($id){
        return view('company/dataemployee',[
            'company'=>company::find($id)
        ]);
    }
    public function download($id){
        $pdf = Pdf::loadView('company/downloadDataEmployee',[
            'company'=>company::find($id)
        ]);
        return $pdf->download('invoice.pdf');

        
    }

    public function ajax($str)
    {
        
        return view('company/ajax',[
            'companys'=>company::where('name','like', '%'.$str.'%')
            ->orWhere('email','like', '%'.$str.'%')
            ->orWhere('website','like', '%'.$str.'%')
            ->limit(5)
            ->get()
        ]);
    }
    public function prosesimport(Request $request){
        $request->validate([
            'fileexel'=>['mimes:xlsx', 'file']
        ]);
        Excel::import(new companyimport,
        $request->file('fileexel')->store('files'));
        return redirect()->back();
    }
}
