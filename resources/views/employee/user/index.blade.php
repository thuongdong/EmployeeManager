@extends('layouts.master')
@section('title_head')
<h1>
    Employee
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Employee</a></li>
    <li class="active">Index</li>
    </ol>
@endsection

@section('title')
<title>index</title>
@endsection
@section('content')
<div class="container">
	<h2 class="head">List Employees</h2>
  <hr>
  <div class="row">
    <div class="col-md-12 text-center">
      <form class="navbar-form navbar-left" action="{{ route('employs.index') }}" method="get">
        <div class="input-group">
          <input type="text" class="form-control" name="search" placeholder="Tìm theo tên, email.." required="">
          <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
              <i class="glyphicon glyphicon-search"></i>
               </button>
          </div>
        </div>
      </form>
      <div class="btn-add"><a href="{{ route('employs.create') }}" class="btn btn-info"><span>thêm nhân viên</span></a></div>
    </div>
  </div>
  <div class="row">
  </div>
	<table class="table table-hover">
    <thead>
      <tr>
        <th>STT</th>
        <th>Name</th>
        <th>Avatar</th>
        <th>Email</th>
        <th>Birthday</th>
        <th>Address</th>
        <th>Department</th>
        <th>Skill</th>
        <th>Level</th>
        <th></th>
        <th></th>
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
        <td><img src="{!! asset('img/'.$value['avatar']) !!}" class="name-search img-circle" alt=""></td>
        <td>{{ $value->email }}</td>
        <td>{{ (new \Carbon\Carbon($value->birthday))->format('d/m/Y') }}</td>
        <td>{{ $value->address }}</td>
        <td>{{ $value->department }}</td>
        <td>{{ $value->level_japanese }}</td>
        <td>{{ ($value->level_employee == 1)?'leader':'employee' }}</td>
        <td><div class="show"><a href="{{ route('employs.show',$value->id) }}" class="btn btn-info"><span class="glyphicon glyphicon-user"></span></a></div></td>
        <td><form action="{{ route('employs.destroy',$value->id) }}" method="POST">
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
