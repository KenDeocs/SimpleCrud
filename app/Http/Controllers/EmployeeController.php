<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use DB;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = DB::table('employees')->select('*')->get();
        return view('welcome')->with('employees', $employees);
    }

    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:employees',
            'gender' => 'required|not_in:Select Gender',
         
   
           ]);
 

          $post = new Employee;
          $post->name = $request->input('name');
          $post->email = $request->input('email');
          $post->gender = $request->input('gender');

          $post->save();

          return redirect('/')->with('success', 'New Employee is inserted '.$request->input('full_name'));
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $get_employees = DB::table('employees')->select('*')->where('id', $id)->first();
        return view('update')->with('get_employees', $get_employees);
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
  

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees,email,'.$id,
            'gender' => 'required'
        ]);

        $post = Employee::findOrFail($id);
        $post->name = $request->input('name');
        $post->email = $request->input('email');
        $post->gender = $request->input('gender');

        $post->save();

        return redirect('/')->with('success', $request->input('full_name').' data was successfully updated');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Employee::findOrFail($id);
        $user->delete();
   
        return redirect('/')->with('success', 'employee info successfully removed');
    }
}
