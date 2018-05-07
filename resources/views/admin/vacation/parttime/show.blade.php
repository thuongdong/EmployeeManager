@extends('admin.layouts.master')
@section('title_head')
<h1>
    Vacation
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('vacation.index') }}"><i class="fa fa-dashboard"></i>Parttime</a></li>
    <li class="active">show</li>
    </ol>
@endsection
@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2 class="head">Employee <strong>"{{ $name->user->name }}"</strong></h2>
		</div>
		<div class="panel-body">
			<div class="row">
				<table class="table table-hover">
        <thead>
          <tr>
            <th>STT</th>
            <th>Date</th>
            <th>Start End</th>
            <th>End Time</th>
            <th>Reason</th>
          </tr>
        </thead>
        <tbody>
          @php 
            $temp=1;
          @endphp
        	@foreach ($parttimes as $value)
          <tr>
            <td>{{ $temp++ }}</td>
            <td>{{ (new \Carbon\Carbon($value->date))->format('d/m/Y') }}</td>
            <td>{{ $value->start_time }}</td>
            <td>{{ $value->end_time }}</td>
            <td>{{ $value->reason }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
			</div>
		</div>
	</div>
</div>
@endsection