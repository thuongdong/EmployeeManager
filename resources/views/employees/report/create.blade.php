@extends('layouts.master')
@section('title_head')
<h1>
    Overtime
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Report</a></li>
    <li class="active">Create</li>
    </ol>
@endsection

@section('content')

<div class="col-md-8 col-xs-offset-2">	
	<div class="panel panel-primary">
		<div class="panel-heading">Write Report</div>
		<div class="panel-body add-edit">
		<form method="POST" action="{{ route('report.store') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('POST') }}
			
			<div class="row">
				<p class="col-md-2">Date</p>
				<p class="col-md-10">
					<input type="text" name="date" value ="@php echo date('Y-m-d');@endphp" class="form-control" required="required">
				</p>
			</div>
			
			<div class="row">	
				<p class="col-md-2">Today</p>
				<p class="col-md-10">
					<textarea rows="4" cols="50" name="todayContent" placeholder="Hôm nay bạn làm những gì?" class="form-control" required="required"></textarea>
				</p>
				@if ($errors->has('todayContent'))
                   <p class="warning text-center text-danger">{{ $errors->first('todayContent') }}</p>
                @endif
			</div>
			
			<div class="row">
				<p class="col-md-2">Tomorrow</p>
				<p class="col-md-10">
					<textarea rows="4" cols="50" name="tomorrowContent" placeholder="Ngày mai bạn định làm gì?" class="form-control" required="required"></textarea>
				</p>
				@if ($errors->has('tomorrowContent'))
                   <p class="warning text-center text-danger">{{ $errors->first('tomorrowContent') }}</p>
                @endif
			</div>

			<div class="row">
				<p class="col-md-2">Problem</p>
				<p class="col-md-10">
					<textarea rows="4" cols="50" name="problem" placeholder="Vấn đề bạn đang gặp phải?" class="form-control" required="required"></textarea>
				</p>
				@if ($errors->has('problem'))
                   <p class="warning text-center text-danger">{{ $errors->first('problem') }}</p>
                @endif
			</div>
			
			<div class="row">
				<p class="col-md-2"></p>
				<p class="col-md-10">
					<input type="submit" value="Đăng" class="btn btn-primary">
					<a title="Quay lại" href="{{ route('report.index') }}" class="btn btn-danger">Back</a>
				</p>
			</div>
			
		</form>
		</div>
	</div>
</div>
@endsection