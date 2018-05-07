@extends('layouts.master')
@section('title_head')
<h1>
    Vacation
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Fulltime</a></li>
    <li class="active">Create</li>
    </ol>
@endsection

@section('content')
<div class="container">
	<h2 class="head"><a href="{{ route('vacationfulltime.index') }}" class="btn btn-info show-head"><span class="glyphicon glyphicon-list-alt"></span></a>Vacation Fulltime</h2>
	<hr>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Vacation Fulltime</div>
				<div class="panel-body">
					<form class="form-horizontal" action="{{route('vacationfulltime.store')}}" method="POST">
						{{ csrf_field() }}
						<div class="form-group">
				    		<label for="date" class="col-md-4 control-label">Date</label>
				    		<div class="col-md-6">
                                <input type="date" class="form-control" name="date">
                            </div>
				  		</div>
				  		<div class="form-group">
				    		<label for="reason" class="col-md-4 control-label">Reason</label>
				    		<div class="col-md-6">
				    		<textarea class="form-control" name="reason"></textarea></div>
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