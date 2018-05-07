@extends('admin.layouts.master')
@section('title_head')
<h1>
    Report
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Report</a></li>
    <li class="active">show</li>
    </ol>
@endsection

@section('content')

<div class="container">
    <div class="col-md-11">
        <h2 class="text-center">THÔNG TIN CHI TIẾT REPORT</h2>
      <div class="row">
        <h2 class="text-center">Report Ngày {{ (new \Carbon\Carbon($reports->date))->format('d/m/Y') }}</h2>
      </div>
      
      <div class="row"> 
        <p class="col-md-1">Today</p>
        <p class="col-md-10">
          <textarea rows="4" cols="50" name="today_content" class="form-control" disabled="">{{ $reports->today_content }}</textarea>
        </p>
      </div>
      
      <div class="row">
        <p class="col-md-1">Tomorrow</p>
        <p class="col-md-10">
          <textarea rows="4" cols="50" name="tomorrow_content" class="form-control" disabled="">{{ $reports->tomorrow_content }}</textarea>
        </p>
      </div>

      <div class="row">
        <p class="col-md-1">Problem</p>
        <p class="col-md-10">
          <textarea rows="4" cols="50" name="problem" class="form-control" disabled="">{{ $reports->problem }}</textarea>
        </p>
      </div>
      <a title="Quay lại" href="{{ route('reports.index') }}" class="btn btn-danger">Back</a>
    </div>
</div>
@endsection 
