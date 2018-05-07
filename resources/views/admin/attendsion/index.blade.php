@extends('admin.layouts.master')
@section('title_head')
<h1>
    Attendsion
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Adtendsion</a></li>
    <li class="active">index</li>
    </ol>
@endsection

@section('content')

<!-- Bootstrap Boilerplate... -->
    <div class="panel panel-default col-md-5">
        <div class="panel-heading">
            <h3 class="text-center">TimeSheet ngày @php echo date('d/m/Y'); @endphp</h3>
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
            <div class="pagination-container text-center">
                {{ $attendsions->links() }}
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
                                <div>{{ $rows->attendsion_count }}</div>
                            </td>
                            
                             <td>
                                <a title="Chi tiết" href="{{ route('attendsions.show',$rows->user_id) }}" class="glyphicon glyphicon-book btn btn-primary"></a>
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