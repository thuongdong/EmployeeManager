@extends('layouts.master')
@section('title_head')
<h1>
    Profile
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Profile</a></li>
    <li class="active">Edit</li>
    </ol>
@endsection

@section('content')
<div class="container">
	<h2 class="head">Employee "<strong class="">{{ $employee->name }}</strong>"</h2>
	<hr>
	<div class="row">
		<form action = "{{ route('profile.update',$employee->id) }}" method="POST" enctype="multipart/form-data">
				{{ method_field('PUT') }}
				{{ csrf_field() }}
			<div class="col-lg-6">
				<div class="avata-name">
				 	Avatar
				</div>
				<div class="avata text-center">
					<img src="{!! asset('img/'.$employee['avatar']) !!}" class="avata-img img-circle" alt="">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
		    		<label for="name">Name:</label>
		    		<input type="text" class="form-control" name= "name" value="{{ $employee->name }}" required="">
		  		</div>
		  		<div class="form-group">
		    		<label for="birthday">Birthday:</label>
		    		<input type="date" class="form-control"  name= "birthday" value="{{ $employee->birthday }}">
		  		</div>
		  		<div class="form-group">
		    		<label for="email">Email:</label>
		    		<input type="email" class="form-control" name= "email" value="{{ $employee->email }}" readonly="">
		  		</div>
		  		<div class="form-group">
					<input type="checkbox" name="changepassword" id="changepassword">
					<label>Change Password:</label>
					<input type="password" class="form-control password" name="password" required="" placeholder="Nhập password người dùng"
					 disabled="" />
				</div>
				@if ($errors->has('password'))
	                <div class="alert alert-danger">
	                    <ul>
	                        @foreach ($errors->get('password') as $repeatpassword)
	                            <li>{{ $password }}</li>
	                        @endforeach
	                    </ul>
	                </div>
	            @endif
				<div class="form-group">
					<label>Repeat Password:</label>
					<input type="password" class="form-control password" name="repeatpassword" required="" placeholder="Nhập repassword người dùng"
					 disabled="" />
				</div>
				@if ($errors->has('repeatpassword'))
	                <div class="alert alert-danger">
	                    <ul>
	                        @foreach ($errors->get('repeatpassword') as $repeatpassword)
	                            <li>{{ $repeatpassword }}</li>
	                        @endforeach
	                    </ul>
	                </div>
	            @endif
		 		<div class="form-group">
		    		<label for="address">Address:</label>
		    		<input type="text" class="form-control" name= "address" value="{{ $employee->address }}" required="">
		  		</div>
		  		<div class="form-group">
			  		<label for="sex">Sex:</label>
				    <select class="form-control" name = "sex">
				    	<option value=" ">__</option>
				        <option value="nam" {{ ($employee->sex == 'nam')?'selected':'' }}>Nam</option>
				        <option value="nữ" {{ ($employee->sex == 'nữ')?'selected':'' }}>Nữ</option>
				        <option value="gay" {{ ($employee->sex == 'gay')?'selected':'' }}>Gay</option>
				        <option value="less" {{ ($employee->sex == 'less')?'selected':'' }}>Less</option>
				    </select>
				</div>
				<div class="form-group">
			  		<label for="language">Level Japanese:</label>
				    <select class="form-control" name = "language">
				    	<option value=" ">__</option>
				        <option value="N1" {{ ($employee->level_japanese == 'N1')?'selected':'' }}>N1</option>
				        <option value="N2" {{ ($employee->level_japanese == 'N2')?'selected':'' }}>N2</option>
				        <option value="N3" {{ ($employee->level_japanese == 'N3')?'selected':'' }}>N3</option>
				        <option value="N4" {{ ($employee->level_japanese == 'N4')?'selected':'' }}>N4</option>
				        <option value="N5" {{ ($employee->level_japanese == 'N5')?'selected':'' }}>N5</option>
				        <option value="none" {{ ($employee->level_japanese == 'none')?'selected':'' }}>Không có</option>
				    </select>
				</div>
				<div class="form-group">
			  		<div class="upload-btn-wrapper">
			  			<label for="avatar">Avatar:</label>
	  					<button class="btn-upload">Change avatar</button>
	  					<input type="file" name="avatar" />
					</div>
				</div>
				@if ($errors->has('avatar'))
	                <div class="alert alert-danger">
	                    <ul>
	                        @foreach ($errors->get('avatar') as $avatar)
	                            <li>{{ $avatar }}</li>
	                        @endforeach
	                    </ul>
	                </div>
	            @endif
		  		<div class="sub">
		  			<button type="submit" class="btn btn-default">Update</button>
		  			<button type="reset" class="btn btn-default">Reset</button>
		  		</div>
		  	</div>
		</form>
	</div>
</div>
@endsection

@section('script')
	<script>
		$(document).ready(function(){
			$("#changepassword").change(function(){
				if($(this).is(":checked")){
					$(".password").removeAttr('disabled');
				}
				else{
					$(".password").attr('disabled','');
				}
			});
		});
	</script>
@endsection