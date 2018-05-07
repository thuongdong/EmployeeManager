<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Session;
use Validator;
use File;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $name = $request->search;
        $employees = User::where('name','like','%'.$name.'%')->orwhere('email','like','%'.$name.'%')->orderBy('department')->paginate(config('app.paginate')); 
        $data = [
            'employees'=>$employees,
            'name'=>$name
        ];  
        return view('admin.employee.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request)
    {
        $employee = new User();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->password = bcrypt(config('app.pass'));
        $employee->department = $request->department;
        $employee->level_employee = $request->level;
        $employee->save();
        return redirect()->route('employee.index')->with('success',trans('admin.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee= User::findOrFail($id);
        return view('admin.employee.show',['employee'=>$employee]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = User::findOrFail($id);
        $file= $employee->avatar;
        File::delete('img/'.$file);
        $employee->delete();
        return redirect()->route('employee.index')->with('success',trans('admin.delete_success'));
    }
}
