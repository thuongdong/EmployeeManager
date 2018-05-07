@extends('layouts.master')
@section('title_head')
<h1>
    Overtime
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Report</a></li>
    <li class="active">Edit</li>
    </ol>
@endsection

@section('content')

<div class="col-md-8 col-xs-offset-2" style="top:80px;">	
	<div class="panel panel-primary">
		<div class="panel-heading">Edit Report</div>
		<div class="panel-body add-edit">
		<form method="POST" action="{{ route('report.update',$reports->id) }}" enctype="multipart/form-data">
			 {{ csrf_field() }}
			 {{ method_field('PUT') }}
			 <!-- rows -->
			<div class="row">	
				<p class="col-md-2">Date</p>
				<p class="col-md-10">
					<input type="date" name="date" class="form-control" value="{{ $reports->date }}"></input>
				</p>
			</div>
			<!-- end rows -->
			<!-- rows -->
			<div class="row">	
				<p class="col-md-2">Today</p>
				<p class="col-md-10">
					<textarea rows="4" cols="50" name="todayContent" class="form-control">{{ $reports->today_content }}</textarea>
				</p>
				@if ($errors->has('todayContent'))
                   <p class="warning text-center text-danger">{{ $errors->first('todayContent') }}</p>
                @endif
			</div>
			<!-- end rows -->
			<!-- rows -->
			<div class="row">	
				<p class="col-md-2">Tomorrow</p>
				<p class="col-md-10">
					<textarea rows="4" cols="50" name="tomorrowContent" class="form-control">{{ $reports->tomorrow_content }}</textarea>
				</p>
				@if ($errors->has('tomorrowContent'))
                   <p class="warning text-center text-danger">{{ $errors->first('tomorrowContent') }}</p>
                @endif
			</div>
			<!-- end rows -->
			<!-- rows -->
			<div class="row">	
				<p class="col-md-2">Problem</p>
				<p class="col-md-10">
					<textarea rows="4" cols="50" name="problem" class="form-control">{{ $reports->problem }}</textarea>
				</p>
				@if ($errors->has('problem'))
                   <p class="warning text-center text-danger">{{ $errors->first('problem') }}</p>
                @endif
			</div>
			<!-- end rows -->
			<!-- rows -->
			<div class="row">
				<p class="col-md-2"></p>
				<p class="col-md-10">
					<input type="submit" value="Process" class="btn btn-primary">
					<a title="Quay lại" href="{{ route('report.index') }}" class="btn btn-danger">Back</a>
				</p>
			</div>
			<!-- end rows -->
		</form>
		</div>
	</div>
</div>
@endsection