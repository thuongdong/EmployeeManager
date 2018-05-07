@extends('layouts.master')
@section('title_head')
<h1>
    Profile
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Profile</a></li>
    <li class="active">Show</li>
    </ol>
@endsection

@section('content')
<div class="container">
	<h2 class="head"><a href="{{route('profile.edit',$employee->id)}}" class="btn btn-info show-head"><span class="glyphicon glyphicon-pencil"></span></a>Employee "<strong class="">{{ $employee->name }}</strong>"</h2>
	<hr>
	<div class="row">
		<div class="col-lg-6">
			<div class="avata-name">
			 	Avatar
			</div>
			<div class="avata text-center">
				<img src="{!! asset('/img/'.$employee['avatar']) !!}" class="avata-img img-circle" alt="">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="form-group">
	    		<label for="name">Name:</label>
	    		{{ $employee->name }}
	  		</div>
	  		<div class="form-group">
	    		<label for="birthday">Birthday:</label>{{ (new \Carbon\Carbon($employee->birthday))->format('d/m/Y') }}
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
	    		<label for="address">Sex:</label>
	    		{{ $employee->sex }}
	  		</div>
	  		<div class="form-group">
	    		<label for="address">Department:</label>
	    		{{ $employee->department }}
	  		</div>
	  		<div class="form-group">
	    		<label for="address">Level Japanese:</label>
	    		{{ $employee->level_japanese }}
	  		</div>
		</div>
	</div>
</div>
@endsection