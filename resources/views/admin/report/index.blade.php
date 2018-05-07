@extends('admin.layouts.master')
@section('title_head')
<h1>
    Report
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Report</a></li>
    <li class="active">index</li>
    </ol>
@endsection

@section('content')

<!-- Bootstrap Boilerplate... -->
    <div class="panel panel-default" id="employee">
        <div class="panel-heading">
            <h3 class="text-center">TimeSheet Ngày @php echo date('d/m/Y'); @endphp</h3>
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-striped task-table table-hover">
       
                <thead>
                    <th>STT</th>
                    <th>Date</th>
                    <th>Employees</th>
                    <th>Today</th>
                    <th>Tomorrow</th>
                    <th>Problem</th>
                    <th>Chi tiết</th>
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
                                <div>{{ $rows->user->name }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ str_limit($rows->today_content, 50) }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ str_limit($rows->tomorrow_content, 50) }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ str_limit($rows->problem, 50) }}</div>
                            </td>

                            <td>
                                <a title="Chi tiết" href="{{ route('reports.show',$rows->id) }}" class="glyphicon glyphicon-book btn btn-primary"></a>
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