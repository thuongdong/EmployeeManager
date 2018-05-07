<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateEmployee;
use Auth;
use App\Models\User;
use Session;
use Validator;
use File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Auth::user();   
        return view('employee.profile.show',['employee'=>$employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = User::findOrFail($id);
        return view('employee.profile.edit',['employee'=>$employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployee $request, $id)
    {
        $employee = User::findOrFail($id);
        if($request->hasFile('avatar')){
            $file1= $employee->avatar;
            File::delete('img/'.$file1);
            $file = $request->avatar;
            $file->move('img',$file->getClientOriginalName());
            $employee->avatar = $file->getClientOriginalName();
            $employee->save();
        }
        $employee->name = $request->name;
        $employee->address = $request->address;
        $employee->birthday = $request->birthday;
        $employee->email = $request->email;
        $employee->sex = $request->sex;
        $employee->level_japanese = $request->language;
        if($request->changepassword=="on"){
            $employee->password = bcrypt($request->password);
        }
        $employee->save();
        return redirect()->route('profile.index')->with('success',trans('message.update'));
    }
}
