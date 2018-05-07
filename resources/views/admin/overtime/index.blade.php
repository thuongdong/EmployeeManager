@extends('admin.layouts.master')
@section('title_head')
<h1>
    Overtime
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Overtime</a></li>
    <li class="active">index</li>
    </ol>
@endsection

@section('content')

<!-- Bootstrap Boilerplate... -->
    <div class="panel panel-default col-md-5">
        <div class="panel-heading">
            <h3 class="text-center">TimeSheet OT ngày @php echo date('d/m/Y'); @endphp</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-responsive task-table table-hover">
       
                <thead>
                    <th>STT</th>
                    <th>Employee</th>
                    <th>Tổng số giờ</th>
                    <th>Chi tiết</th>
                </thead>
                
                
                <tbody>
                    @php 
                        $stt=1;
                    @endphp
                    @foreach ($overtimes as $rows)
                        <tr>
                            <td class="table-text">
                                <div>{{ $stt++ }}</div>
                            </td>

                            <td class="table-text">
                                <div>{{ $rows->user->name }}</div>
                            </td>

                            <td class="table-text">
                                <div>{{ str_limit($rows->sum_hours, 5) }} h</div>
                            </td>

                            <td>
                                <a title="Chi tiết" href="{{ route('overtimes.show',$rows->user_id) }}" class="glyphicon glyphicon-book btn btn-primary"></a>
                            </td>

                        </tr>

                    @endforeach
                        <tr>
                            <th>Tổng OT ngày</th>
                            <th>{{ $sumHours }} giờ</th>
                        </tr>
                </tbody>
            </table>
            <div class="pagination-container text-center">
                {{ $overtimes->links() }}
            </div>
        </div>
    </div> 

    <div class="panel panel-default col-md-6">
        <div class="panel-heading">
            <h3 class="text-center">THỐNG KÊ THÁNG @php echo date('m/Y') @endphp</h3>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-striped task-table table-hover">
       
                <thead>
                    <th>STT</th>
                    <th>Employee</th>
                    <th>Total</th>
                    <th>Xem chi tiết</th>
                </thead>
                
                <tbody>
                    @php 
                        $stt=1;
                    @endphp
                    @foreach ($filterNames as $rows)
                        <tr>
                            <td class="table-text">
                                <div>{{ $stt++ }}</div>
                            </td>

                            <td class="table-text">
                                <div>{{ $rows->user->name }}</div>
                            </td>

                            <td class="table-text">
                                <div>{{ str_limit($rows->sum_hours, 5) }} giờ</div>
                            </td>
                            
                             <td>
                                <a title="Chi tiết" href="{{ route('overtimes.statistical',$rows->user_id) }}" class="glyphicon glyphicon-book btn btn-primary"></a>
                            </td>
                        </tr>

                    @endforeach
                       
                </tbody>
            </table>
            <div class="pagination-container text-center">
                {{ $filterNames->links() }}
            </div>
        </div>
    </div> 
@endsection 