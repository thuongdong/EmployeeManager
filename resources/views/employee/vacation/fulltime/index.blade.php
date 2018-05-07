@extends('layouts.master')
@section('title_head')
<h1>
    Vacation
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Fulltime</a></li>
    <li class="active">Index</li>
    </ol>
@endsection

@section('content')
<div class="container">
	<h2 class="head">List Vacation Fulltime</h2>
  <hr>
	<table class="table table-hover">
    <thead>
      <tr>
        <th>STT</th>
        <th>Date</th>
        <th>Reason</th>
      </tr>
    </thead>
    <tbody>
      @php 
        $temp=1;
      @endphp
    	@foreach ($employees as $value)
      <tr>
        <td>{{ $temp++ }}</td>
        <td>{{ (new \Carbon\Carbon($value->date))->format('d/m/Y') }}</td>
        <td>{{ $value->reason }}</td>
        <td><td><div class="show"><a href="{{ route('vacationfulltime.edit',$value->id) }}" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a></div></td></td>
        <td><form action="{{ route('vacationfulltime.destroy',$value->id) }}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <div class="delete"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></div>
        </form></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="row">
    {{ $employees->links() }}
  </div>
</div>
@endsection