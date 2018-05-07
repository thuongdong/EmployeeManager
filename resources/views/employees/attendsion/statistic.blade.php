@extends('layouts.master')
@section('title_head')
<h1>
    Adtendsion
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Adtendsion</a></li>
    <li class="active">Statistical</li>
    </ol>
@endsection

@section('content')

<!-- Bootstrap Boilerplate... -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="text-center">THỐNG KÊ THÁNG @php echo date('m/Y') @endphp</h3>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-striped task-table table-hover">
       
                <thead>
                    <th>STT</th>
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
                                <div>{{ (new \Carbon\Carbon($rows->date))->format('d/m/Y - H:i:s') }}</div>
                            </td>
                        </tr>

                    @endforeach
                     	<tr>
                        	<th>Tổng số ngày điểm danh</th>
                        	<th>{{ $stt - 1 }}</th>
                        </tr>
                       
                </tbody>
            </table>
            <div class="pagination-container text-center">
                {{ $attendsions->links() }}
            </div>
        </div>
    </div> 
@endsection