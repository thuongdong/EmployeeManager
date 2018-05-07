@extends('layouts.master')
@section('title_head')
<h1>
    Overtime
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Overtime</a></li>
    <li class="active">create</li>
    </ol>
@endsection

@section('content')

<div class="col-md-8 col-xs-offset-2">	
	<div class="panel panel-primary">
		<div class="panel-heading">Viết Overtime</div>
		<div class="panel-body add-edit">
		<form method="POST" action="{{ route('overtime.store') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('POST') }}
			
			<div class="row">
				<p class="col-md-2">Date</p>
				<p class="col-md-10">
					<input type="date" name="date" value ="@php echo date('Y-m-d');@endphp" class="form-control" required="required">
				</p>
			</div>
			
			<div class="row">	
				<p class="col-md-2">From Time</p>
				<p class="col-md-10">
					<input type="time" name="from" class="form-control" required="required"></input>
				</p>
			</div>
			
			<div class="row">
				<p class="col-md-2">To Time</p>
				<p class="col-md-10">
					<input type="time" name="to" class="form-control" required="required"></input>
				</p>
			</div>

			<div class="row">
				<p class="col-md-2">Content</p>
				<p class="col-md-10">
					<textarea name="content" class="form-control" required="required"></textarea>
				</p>
				@if ($errors->has('content'))
                   <p class="warning text-center text-danger">{{ $errors->first('content') }}</p>
                @endif
			</div>
			
			<div class="row">
				<p class="col-md-2"></p>
				<p class="col-md-10">
					<input type="submit" value="Process" class="btn btn-primary">
					<a title="Quay lại" href="{{ route('overtime.index') }}" class="btn btn-danger">Back</a>
				</p>
			</div>
			
		</form>
		</div>
	</div>
</div>
@endsection