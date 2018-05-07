@extends('layouts.master')
@section('title_head')
<h1>
    Vacation
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Fulltime</a></li>
    <li class="active">Edit</li>
    </ol>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Vacation "<strong class="">{{ (new \Carbon\Carbon($employee->date))->format('d/m/Y') }}</strong>"</div>
				<div class="panel-body">
					<form class="form-horizontal" action="{{route('vacationfulltime.update',$employee->id)}}" method="POST">
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						<div class="form-group">
				    		<label for="date" class="col-md-4 control-label">Date</label>
				    		<div class="col-md-6">
                                <input type="date" class="form-control" name="date" value="{{ $employee->date }}">
                            </div>
				  		</div>
				  		<div class="form-group">
				    		<label for="reason" class="col-md-4 control-label">Reason</label>
				    		<div class="col-md-6">
				    		<textarea class="form-control" name="reason">{{ $employee->reason }}</textarea></div>
				  		</div>
				  		<div class="sub">
				  			<button type="submit" class="btn btn-primary">Update</button>
				  			<button type="reset" class="btn btn-primary">Reset</button>
				  		</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection