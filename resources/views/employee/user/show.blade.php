@extends('layouts.master')
@section('title_head')
<h1>
    Employee
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Employee</a></li>
    <li class="active">Show</li>
    </ol>
@endsection

@section('title')
<title>show</title>
@endsection
@section('content')
<div class="container">
	<h2 class="head"><a href="{{ route('employs.edit',$employee->id) }}" class="btn btn-info show-head"><span class="glyphicon glyphicon-pencil"></span></a>Employee "<strong class="">{{ $employee->name }}</strong>"</h2>
	<hr>
	<div class="row">
		<div class="col-lg-6">
			<div class="avata-name">
			 	Avatar
			</div>
			<div class="avata text-center">
				<img src="{!! asset('img/'.$employee['avatar']) !!}" class="avata-img img-circle" alt="">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="form-group">
	    		<label for="name">Name:</label>
	    		{{ $employee->name }}
	  		</div>
	  		<div class="form-group">
	    		<label for="birthday">Birthday:</label>
	    		{{ $employee->birthday }}
	    	</div>
	  		<div class="form-group">
	    		<label for="email">Email:</label>
	    		{{ $employee->email }}
	    	</div>
	 		<div class="form-group">
	    		<label for="address">Address:</label>
	    		{{ $employee->address }}
	  		</div>
	  		<div class="form-group">
	    		<label for="address">Skill:</label>
	    		{{ $employee->level_japanese }}
	  		</div>
	  		<div class="form-group">
	    		<label for="address">Department:</label>
	    		{{ $employee->department }}
	  		</div>
	  	</div>
	</div>
</div>
@endsection