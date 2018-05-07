<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VacationParttime;

class VacationParttimeController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parttimes = VacationParttime::where('user_id',$id)->orderBy('date','DESC')->paginate(config('app.paginate'));
        $name = $parttimes->first();
        
        return view('admin.vacation.parttime.show',['parttimes' => $parttimes, 'name'=>$name]);
    }
}
