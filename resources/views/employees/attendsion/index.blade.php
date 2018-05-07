@extends('layouts.master')
@section('title_head')
<h1>
    Adtendsion
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Adtendsion</a></li>
    <li class="active">index</li>
    </ol>
@endsection

@section('content')

<!-- Bootstrap Boilerplate... -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <form action="{{ route('attendsion.store') }}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary attendtion">Điểm danh ngay</button>
            </form>
            <h3 class="text-center">TimeSheet</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-responsive task-table table-hover">
       
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
                       
                </tbody>
            </table>
            <div class="pagination-container text-center">
                {{ $attendsions->links() }}
            </div>
        </div>
    </div> 
@endsection