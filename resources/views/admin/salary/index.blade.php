@extends('admin.layouts.master')
@section('title_head')
<h1>
    Salary
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('salary.index') }}"><i class="fa fa-dashboard"></i>Salary</a></li>
    <li class="active">index</li>
    </ol>
@endsection

@section('content')
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
  	 <h2 class="head">List Salary Employees</h2>
    </div>
    <div class="panel-body">
      <div class="row">
      </div>
    	<table class="table table-hover">
        <thead>
          <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Basic Salary</th>
            <th>Overtimes Salary</th>
            <th>Insurance Money</th>
            <th>Insurance Payment</th>
            <th>Real Salary</th>
            <th colspan="2" class="text-center">Detail</th>
            
          </tr>
        </thead>
        <tbody>
          @php 
            $temp=1;
          @endphp
        	@foreach ($salaries as $value)
          <tr>
            <td>{{ $temp++ }}</td>
            <td>{{ $value->user->name }}</td>
            <td>{{ $value->basic_salary }}</td>
            <td>{{ $value->overtime_salary }}</td>
            <td>{{ $value->insurance_money }}</td>
            <td>{{ $value->insurance_payment }}</td>
            <td>{{ $value->real_salary }}</td>
            <td><div class="show"><a href="#" class="btn btn-info"><span class="glyphicon glyphicon-user"></span></a></div></td>
            <td><div class="show"><a href="#" class="btn btn-info"><span class="fa fa-usd"></span></a></div></td>
            <td><form action="#" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <div class="delete"><button class="btn btn-danger"><span class="  glyphicon glyphicon-trash"></span></button></div>
            </form></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        {{ $salaries->links() }}
      </div>
    </div>
  </div>
</div>
@endsection