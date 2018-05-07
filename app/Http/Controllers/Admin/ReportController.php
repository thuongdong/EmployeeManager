<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Report;
use Auth;
use Validator;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::whereDate('date', Carbon::now()->format('Y-m-d'))->paginate(config('app.pagination'));
        $data = [
            'reports' => $reports,
        ];
        return view("admin.report.index", $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reports = Report::findOrFail($id);
        $data = [
            'reports' => $reports,
        ];
        return view("admin.report.show", $data);
    }
}
