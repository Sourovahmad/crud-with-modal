<?php

namespace App\Http\Controllers;

use App\crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = crud::paginate(2);
       return view("home",compact("data"));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $crud = new crud;
      
        $crud->firstname=$request->firstname;
        $crud->lastname=$request->lastname;
        $crud->email=$request->email;
        $crud->phone=$request->phone;

        $crud->save();

        return redirect(route("home"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(crud $crud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       

        $crud= crud::find($id);

        $crud->firstname=$request->firstname;
        $crud->lastname=$request->lastname;
        $crud->email=$request->email;
        $crud->phone=$request->phone;

        $crud->save();

        return redirect(route("home"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        crud::find($id)->delete();
        return redirect(route("home"));
}
}