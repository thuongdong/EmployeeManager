@extends('layouts.master')
@section('title_head')
<h1>
    Overtime
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Overtime</a></li>
    <li class="active">Edit</li>
    </ol>
@endsection

@section('content')

<div class="col-md-8 col-xs-offset-2" style="top:80px;">	
	<div class="panel panel-primary">
		<div class="panel-heading">Edit OverTime</div>
		<div class="panel-body add-edit">
		<form method="POST" action="{{ route('overtime.update',$overtimes->id) }}" enctype="multipart/form-data">
			 {{ csrf_field() }}
			 {{ method_field('PUT') }}
			<!-- rows -->
			<div class="row">
				<p class="col-md-2">Date</p>
				<p class="col-md-10">
					<input type="date" name="date" value ="{{ $overtimes->date }}" class="form-control">
				</p>
			</div>
			
			<div class="row">	
				<p class="col-md-2">From Time</p>
				<p class="col-md-10">
					<input type="time" name="from" class="form-control" value="{{ $overtimes->start_time }}"></input>
				</p>
			</div>
			
			<div class="row">
				<p class="col-md-2">To Time</p>
				<p class="col-md-10">
					<input type="time" name="to" class="form-control" value="{{ $overtimes->end_time }}"></input>
				</p>
			</div>

			<div class="row">
	            <p class="col-md-2">Content</p>
	            <p class="col-md-10">
	                <textarea name="content" class="form-control">{{ $overtimes->content }}</textarea>
	            </p>
	            @if ($errors->has('content'))
                   <p class="warning text-center text-danger">{{ $errors->first('content') }}</p>
                @endif
        	</div>
			<!-- end rows -->
			<!-- rows -->
			<div class="row">
				<p class="col-md-2"></p>
				<p class="col-md-10">
					<input type="submit" value="Process" class="btn btn-primary">
					<a title="Quay lại" href="{{ route('overtime.index') }}" class="btn btn-danger">Back</a>
				</p>
			</div>
			<!-- end rows -->
		</form>
		</div>
	</div>
</div>
@endsection