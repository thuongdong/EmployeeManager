@extends('layouts.master')
@section('title_head')
<h1>
    Employee
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Employee</a></li>
    <li class="active">Add</li>
    </ol>
@endsection

@section('title')
<title>add</title>
@endsection
@section('content')
<div class="container">
	<h2 class="head">Add Employee</h2>
	<hr>
	<div class="col-lg-6 col-lg-offset-3">
		<form action = "{{ route('employs.store') }}" method="POST" id="form-add">
			{{ csrf_field() }}
			<div class="form-group">
	    		<label for="name">Name:</label>
	    		<input type="text" class="form-control" name= "name" required="">
	  		</div>
	  		<div class="form-group">
	    		<label for="email">Email:</label>
	    		<input type="email" class="form-control" name= "email" value="@gmail.com" required="">
	  		</div>
	  		@if ($errors->has('email'))
	            <div class="alert alert-danger">
	                <ul>
	                    @foreach ($errors->get('email') as $email)
	                        <li>{{ $email }}</li>
	                    @endforeach
	                </ul>
	            </div>
            @endif
	  		<div class="sub">
	  			<button type="submit" class="btn btn-default" id="add">Add</button>
	  			<button type="reset" class="btn btn-default">Reset</button>
	  		</div>
		</form>
	</div>
</div>
@endsection
