<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Employee

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp=Employee::all();
       return view('index',array('employees'=>$emp));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new_emp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emp= new Employee;
        $emp->name=$request->input('name');
        $emp->email=$request->input('email');
        $emp->contact_number=$request->input('contact_number');
        $emp->position=$request->input('position');
        $emp->save();
        return "Employee Created with ID of :".$emp->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emp=Employee::find($id);
        return('show_emp',array('emp'=>$emp));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('edit_form');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $emp=Employee::find($id);
        $emp->name=$request->input('name');
        $emp->email=$request->input('email');
        $emp->contact_number=$request->input('contact_number');
        $emp->position=$request->input('position');
        return "EMP is updated and ID is :".$emp->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp=Employee::find($id);
        $emp->destroy();

        return "Employess with ID :".$emp->id ." is deleted";
    }
}
