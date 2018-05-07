<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attention;
use App\Models\User;
use Auth;
use DB;
use Validator;
use Carbon\Carbon;

class AttendsionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendsions = Attention::whereDate('date', Carbon::now()->format('Y-m-d'))->orderBy('date', 'desc')->paginate(config('app.pagination'));
        // statistical attendsions of Month
        $filterNames = Attention::select(DB::raw('count(user_id) as attendsion_count, user_id'))
                     ->whereMonth('date', Carbon::now()->format('m'))->whereYear('date', Carbon::now()->format('Y'))
                     ->groupBy('user_id')
                     ->paginate(config('app.pagination'));
        $data = [
            'attendsions' => $attendsions,
            'filterNames' => $filterNames,
        ];
        return view("admin.attendsion.index", $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attendsions = Attention::where('user_id', $id)->whereMonth('date', Carbon::now()->format('m'))->whereYear('date', Carbon::now()->format('Y'))->paginate(config('app.pagination'));
        $data = [
            'attendsions' => $attendsions,
        ];
        return view("admin.attendsion.show", $data);
    }
}
