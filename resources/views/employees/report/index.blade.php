@extends('layouts.master')
@section('title_head')
<h1>
    Overtime
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Report</a></li>
    <li class="active">Index</li>
    </ol>
@endsection

@section('content')

<!-- Bootstrap Boilerplate... -->
    <div class="panel panel-default" id="employee">
        <div class="panel-heading">
            <a href="{{ route('report.create') }}" class="btn btn-primary">Write Report</a>
            {{ method_field('GET') }}
            <h3 class="text-center">TimeSheet</h3>
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-striped task-table table-hover">
       
                <thead>
                    <th>STT</th>
                    <th>Date</th>
                    <th>Today</th>
                    <th>Tomorrow</th>
                    <th>Problem</th>
                </thead>
                
                
                <tbody>
                    @php 
                        $stt=1;
                    @endphp
                    @foreach ($reports as $rows)
                        <tr>
                            <td class="table-text">
                                <div>{{ $stt++ }}</div>
                            </td>

                            <td class="table-text">
                                <div>{{ (new \Carbon\Carbon($rows->date))->format('d/m/Y') }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ str_limit($rows->today_content, 80) }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ str_limit($rows->tomorrow_content, 80) }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ str_limit($rows->problem, 80) }}</div>
                            </td>

                            <td>
                                <a title="Chi tiết" href="{{ route('report.show',$rows->id) }}" class="glyphicon glyphicon-book btn btn-primary"></a>
                            </td>
                            
                            <td>
                                <a title="Chỉnh sửa" href="{{ route('report.edit',$rows->id) }}" class="glyphicon glyphicon-edit btn btn-primary"></a>
                            </td>
             
                        </tr>

                    @endforeach
                       
                </tbody>
            </table>
            <div class="pagination-container text-center">
                {{ $reports->links() }}
            </div>
        </div>
    </div> 
@endsection