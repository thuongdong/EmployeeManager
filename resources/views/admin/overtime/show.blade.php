@extends('admin.layouts.master')
@section('title_head')
<h1>
    Overtime
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('salary.index') }}"><i class="fa fa-dashboard"></i>Overtime</a></li>
    <li class="active">show</li>
    </ol>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <h2 class="text-center">THÔNG TIN CHI TIẾT OVERTIME</h2>
        @foreach ($overtimes as $rows)
        <div class="row">
            <h2 class="text-center">OverTime Ngày {{ (new \Carbon\Carbon($rows->date))->format('d/m/Y') }}</h2>
        </div>

        <div class="row">
            <p class="col-md-2">From Time</p>
            <p class="col-md-10">
                <input type="time" name="from" class="form-control" value="{{ $rows->start_time }}" disabled=""></input>
            </p>
        </div>

        <div class="row">
            <p class="col-md-2">To Time</p>
            <p class="col-md-10">
                <input type="time" name="to" class="form-control" value="{{ $rows->end_time }}" disabled=""></input>
            </p>
        </div>

        <div class="row">
            <p class="col-md-2">Content</p>
            <p class="col-md-10">
                <textarea name="content" class="form-control" disabled="">{{ $rows->content }}</textarea>
            </p>
        </div>
        @endforeach
    </div>
    <a title="Quay lại" href="{{ route('overtimes.index') }}" class="btn btn-danger">Back</a>
</div>
@endsection