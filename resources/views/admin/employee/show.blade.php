@extends('admin.layouts.master')
@section('title_head')
<h1>
    Employee
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('employee.index') }}"><i class="fa fa-dashboard"></i>Employee</a></li>
    <li class="active">show</li>
    </ol>
@endsection
@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2 class="head">Employee "<strong class="">{{ $employee->name }}</strong>"</h2>
		</div>
		<div class="panel-body">
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
			    		<label for="department">Department:</label>
			    		{{ $employee->department }}
			  		</div>
			  		<div class="form-group">
			    		<label for="sex">Sex:</label>
			    		{{ $employee->sex }}
			  		</div>
			  		<div class="form-group">
			    		<label for="level_japanese">Level Japanese:</label>
			    		{{ $employee->level_japanese }}
			  		</div>
			  	</div>
			</div>
		</div>
	</div>
</div>
@endsection