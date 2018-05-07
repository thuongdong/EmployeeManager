@extends('admin.layouts.master')
@section('title_head')
<h1>
    Adtendsion
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Adtendsion</a></li>
    <li class="active">show</li>
    </ol>
@endsection

@section('content')

<!-- Bootstrap Boilerplate... -->
    <div class="panel panel-default col-md-11">
        <div class="panel-heading">
            <h3 class="text-center">TimeSheet tháng @php echo date('m/Y');@endphp</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-responsive task-table table-hover">
       
                <thead>
                    <th>STT</th>
                    <th>Employee</th>
                    <th>Ngày giờ điểm danh</th>
                </thead>
                
                
                <tbody>
                    @php 
                        $stt=1;
                    @endphp
                    @foreach ($attendsions as $rows)
                        <tr>
                            <td class="table-text">
                                <div>{{ $stt++ }}</div>
                            </td>

                            <td class="table-text">
                                <div>{{ $rows->user->name }}</div>
                            </td>

                            <td class="table-text">
                                <div>{{ (new \Carbon\Carbon($rows->date))->format('d/m/Y - H:i:s') }}</div>
                            </td>

                        </tr>

                    @endforeach
                        <tr>
                            <th>Tổng</th>
                            <th>{{ $stt - 1 }}</th>
                        </tr>
                </tbody>
            </table>
            <a title="Quay lại" href="{{ route('attendsions.index') }}" class="btn btn-danger">Back</a>
            <div class="pagination-container text-center">
                {{ $attendsions->links() }}
            </div>
        </div>
    </div> 
@endsection