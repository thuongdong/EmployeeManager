@extends('admin.layouts.master')
@section('title_head')
<h1>
    Employee
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('employee.index') }}"><i class="fa fa-dashboard"></i>Employee</a></li>
    <li class="active">index</li>
    </ol>
@endsection
@section('content')
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
  	 <h2 class="head">List Employees</h2>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="text-center">
          <form class="navbar-form navbar-left" action="{{ route('employee.index') }}" method="get">
            <div class="input-group">
              <input type="text" class="form-control" name="search" placeholder="Tìm theo tên, email.." required="">
              <div class="input-group-btn">
                  <button class="btn btn-default" type="submit">
                  <i class="glyphicon glyphicon-search"></i>
                   </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
      </div>
    	<table class="table table-hover">
        <thead>
          <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Level</th>
            <th>Birthday</th>
            <th>Address</th>
            <th colspan="3" class="text-center">Detail</th>
            
          </tr>
        </thead>
        <tbody>
          @php 
            $temp=1;
          @endphp
        	@foreach ($employees as $value)
          <tr>
            <td>{{ $temp++ }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->department }}</td>
            <td>{{ ($value->level_employee == 1)?'leader':'employee' }}</td>
            <td>{{ (new \Carbon\Carbon($value->birthday))->format('d/m/Y') }}</td>
            <td>{{ $value->address }}</td>
            <td><div class="show"><a href="{{ route('employee.show',$value->id) }}" class="btn btn-info"><span class="glyphicon glyphicon-user"></span></a></div></td>
            <td><div class="show"><a href="{{ route('salary.create',$value->id) }}" class="btn btn-info"><span class="fa fa-usd"></span></a></div></td>
            <td><form action="{{ route('employee.destroy',$value->id) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <div class="delete"><button class="btn btn-danger"><span class="  glyphicon glyphicon-trash"></span></button></div>
            </form></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        {{ $employees->links() }}
      </div>
      <div class="text-center">
      <div class="btn-add"><a href="{{ route('employee.create') }}" class="btn btn-info"><span>thêm nhân viên</span></a></div>
      </div>
    </div>
  </div>
</div>
@endsection
