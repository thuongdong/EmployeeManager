@extends('admin.layouts.master')
@section('title_head')
<h1>
    Vacation
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('vacation.index') }}"><i class="fa fa-dashboard"></i>Vacation</a></li>
    <li class="active">index</li>
    </ol>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Fulltime List New</h2>
				</div>
				<div class="panel-body">
					<table class="table table-hover">
				        <thead>
				          <tr>
				            <th>STT</th>
				            <th>Name</th>
				            <th>Last Day</th>
				          </tr>
				        </thead>
				        <tbody>
				          @php 
				            $temp=1;
				          @endphp
				        	@foreach ($listfulltimes as $value)
				          <tr>
				            <td>{{ $temp++ }}</td>
				            <td>{{ $value->user->name }}</td>
				            <td>{{ (new \Carbon\Carbon($value->date))->format('d/m/Y') }}</td>
				            
				          </tr>
				          @endforeach
				        </tbody>
					</table>
					{{ $listfulltimes->links() }}
				</div>
			</div>
		</div>	
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Parttime List New</h2>
				</div>
				<div class="panel-body">
					<table class="table table-hover">
				        <thead>
				          <tr>
				            <th>STT</th>
				            <th>Name</th>
				            <th>Date</th>
				            <th>Start End</th>
				            <th>End Time</th>
				          </tr>
				        </thead>
				        <tbody>
				          @php 
				            $temp=1;
				          @endphp
				        	@foreach ($listparttimes as $value)
				          <tr>
				            <td>{{ $temp++ }}</td>
				            <td>{{ $value->user->name }}</td>
				            <td>{{ (new \Carbon\Carbon($value->date))->format('d/m/Y') }}</td>
				            <td>{{ $value->start_time }}</td>
				            <td>{{ $value->end_time }}</td>
				          </tr>
				          @endforeach
				        </tbody>
      				</table>
      				{{ $listparttimes->links() }}
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Employee Fulltime</h2>
				</div>
				<div class="panel-body">
					<table class="table table-hover">
				        <thead>
				          <tr>
				            <th>STT</th>
				            <th>Name</th>
				            <th class="text-center">Detail</th>
				          </tr>
				        </thead>
				        <tbody>
				          @php 
				            $temp=1;
				          @endphp
				        	@foreach ($fulltimes as $value)
				          <tr>
				            <td>{{ $temp++ }}</td>
				            <td>{{ $value->user->name }}</td>
				            <td><div class="show"><a href="{{ route('fulltime.show',$value->user_id) }}" class="btn btn-info"><span class="glyphicon glyphicon-th"></span></a></div></td>
				          </tr>
				          @endforeach
				        </tbody>
      				</table>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Employee Parttime</h2>
				</div>
				<div class="panel-body">
					<table class="table table-hover">
				        <thead>
				          <tr>
				            <th>STT</th>
				            <th>Name</th>
				            <th class="text-center">Detail</th>
				          </tr>
				        </thead>
				        <tbody>
				          @php 
				            $temp=1;
				          @endphp
				        	@foreach ($parttimes as $value)
				          <tr>
				            <td>{{ $temp++ }}</td>
				            <td>{{ $value->user->name }}</td>
				            <td><div class="show"><a href="{{ route('parttime.show',$value->user_id) }}" class="btn btn-info"><span class="glyphicon glyphicon-th"></span></a></div></td>
				          </tr>
				          @endforeach
				        </tbody>
      				</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection