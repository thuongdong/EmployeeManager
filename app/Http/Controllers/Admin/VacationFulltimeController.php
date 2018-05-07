<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VacationFulltime;

class VacationFulltimeController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fulltimes = VacationFulltime::where('user_id',$id)->orderBy('date','DESC')->paginate(config('app.paginate'));
        $name = $fulltimes->first();
        
        return view('admin.vacation.fulltime.show',['fulltimes' => $fulltimes, 'name'=>$name]);
    }
}
