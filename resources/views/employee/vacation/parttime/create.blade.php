@extends('layouts.master')
@section('title_head')
<h1>
    Vacation
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Parttime</a></li>
    <li class="active">Create</li>
    </ol>
@endsection

@section('content')
<div class="container">
	<h2 class="head"><a href="{{ route('vacationparttime.index') }}" class="btn btn-info show-head"><span class="glyphicon glyphicon-list-alt"></span></a>Vacation Parttime</h2>
	<hr>
	<hr>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Vacation Partime</div>
				<div class="panel-body">
					<form class="form-horizontal" action="{{route('vacationparttime.store')}}" method="POST">
						{{ csrf_field() }}
						<div class="form-group">
				    		<label for="date" class="col-md-4 control-label">Date</label>
				    		<div class="col-md-6">
                                <input type="date" class="form-control" name="date" required="">
                            </div>
				  		</div>
						<div class="form-group">
				    		<label for="time" class="col-md-4 control-label">Start Time</label>
				    		<div class="col-md-6">
				    		<input type="time" class="form-control" name= "start_time" required=""></div>
				  		</div>
				  		<div class="form-group">
				    		<label for="time" class="col-md-4 control-label">End Time</label>
				    		<div class="col-md-6">
				    		<input type="time" class="form-control" name= "end_time" required=""></div>
				  		</div>
				  		<div class="form-group">
				    		<label for="date" class="col-md-4 control-label">Reason</label>
				    		<div class="col-md-6">
				    		<textarea class="form-control" name="reason" required=""></textarea></div>
				  		</div>
				  		<div class="sub">
				  			<button type="submit" class="btn btn-primary">Create</button>
				  			<button type="reset" class="btn btn-primary">Reset</button>
				  		</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection