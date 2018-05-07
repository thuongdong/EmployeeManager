@extends('admin.layouts.master')
@section('title_head')
<h1>
    Salary
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('employee.index') }}"><i class="fa fa-dashboard"></i>Employee</a></li>
    <li class="active">Salary</li>
    </ol>
@endsection
@section('content')
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>Salary for <strong>"{{ $employee->name }}"</strong></h2>	
			</div>
			<div class="panel-body">
				<div class="col-md-6">
					<form action = "{{ route('salary.store',$employee->id) }}" method="POST" id="form-add">
					{{ csrf_field() }}
						<div class="form-group">
				    		<label for="salary">Basic Salary:</label>
				    		<input type="number" class="form-control" name= "basic_salary" required="">
				  		</div>
				  		<div class="sub">
				  			<button type="submit" class="btn btn-default" id="add">Create</button>
				  			<button type="reset" class="btn btn-default">Reset</button>
	  					</div>
				  	</form>
				</div>
				<div class="col-md-6">
					<h3>List Overtimes</h3>
					@foreach($overtimes as $value)
						<div class="form-group">
		    				<label for="date">Date:</label>
		    					{{ $value->date }}
		  				</div>
		  				<div class="form-group">
		    				<label for="time">Start Time:</label>
		    					{{ $employee->start_time }}
		  				</div>
		  				<div class="form-group">
		    				<label for="time">End Time:</label>
		    					{{ $employee->end_time }}
		  				</div>
					@endforeach
					<br>
						<div class="form-group">
							<label for="time">Total:</label>
								{{ $sumHours }} Hours
						</div>
					{{ $overtimes->links() }}
				</div>
			</div>
		</div>
	</div>
@endsection