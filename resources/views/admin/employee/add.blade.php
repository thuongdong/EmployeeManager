@extends('admin.layouts.master')
@section('title_head')
	<h1>
    Employee
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('employee.index') }}"><i class="fa fa-dashboard"></i>Employee</a></li>
    <li class="active">add</li>
    </ol>
@endsection
@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2 class="head">Add Employee</h2>
		</div>
		<div class="panel-body">
			<div class="col-lg-6 col-lg-offset-3">
			<form action = "{{ route('employee.store') }}" method="POST" id="form-add">
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
	            <div class="form-group">
			  		<label for="department">Department:</label>
				    <select class="form-control" name = "department">
				        <option value="dev">Dev</option>
				        <option value="hr">Hr</option>
				    </select>
				</div>
				<div class="form-group">
					<label for="department">Level:</label>
					    <label class="radio-inline">
					      <input type="radio" name="level" value="1" checked="">leader
					    </label>
					    <label class="radio-inline">
					      <input type="radio" name="level" value="2">employee
					    </label>
				</div>
		  		<div class="sub">
		  			<button type="submit" class="btn btn-default" id="add">Add</button>
		  			<button type="reset" class="btn btn-default">Reset</button>
		  		</div>
			</form>
			</div>
		</div>
	</div>
</div>
@endsection
