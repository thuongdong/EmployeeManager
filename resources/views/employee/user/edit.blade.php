@extends('layouts.master')
@section('title_head')
<h1>
    Employee
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Employee</a></li>
    <li class="active">Edit</li>
    </ol>
@endsection

@section('title')
<title>edit</title>
@endsection
@section('content')
<div class="container">
	<h2 class="head">Employee "<strong class="">{{ $employee->name }}</strong>"</h2>
	<hr>
	<div class="row">
		<form action = "{{ route('employs.update',$employee->id) }}" method="POST" enctype="multipart/form-data">
				{{ method_field('PUT') }}
				{{ csrf_field() }}
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
		    		<input type="text" class="form-control" name= "name" value="{{ $employee->name }}" required="">
		  		</div>
		  		<div class="form-group">
		    		<label for="birthday">Birthday:</label>
		    		<input type="date" class="form-control" name= "birthday" value="{{ $employee->birthday }}" required="">
		  		</div>
		  		<div class="form-group">
		    		<label for="email">Email:</label>
		    		<input type="email" class="form-control" name= "email" value="{{ $employee->email }}" readonly="">
		  		</div>
		 		<div class="form-group">
		    		<label for="address">Address:</label>
		    		<input type="text" class="form-control" name= "address" value="{{ $employee->address }}" required="">
		  		</div>
		  		<div class="upload-btn-wrapper">
  					<button class="btn-upload">Change avatar</button>
  					<input type="file" name="avatar" />
				</div>
				@if ($errors->has('avatar'))
	                <div class="alert alert-danger">
	                    <ul>
	                        @foreach ($errors->get('avatar') as $avatar)
	                            <li>{{ $avatar }}</li>
	                        @endforeach
	                    </ul>
	                </div>
	            @endif
		  		<div class="sub">
		  			<button type="submit" class="btn btn-default">Update</button>
		  			<button type="reset" class="btn btn-default">Reset</button>
		  		</div>
		  	</div>
		</form>
	</div>
</div>
@endsection