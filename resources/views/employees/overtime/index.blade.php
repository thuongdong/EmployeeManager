@extends('layouts.master')
@section('title_head')
<h1>
    Overtime
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Overtime</a></li>
    <li class="active">Index</li>
    </ol>
@endsection

@section('content')

<!-- Bootstrap Boilerplate... -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ route('overtime.create') }}" class="btn btn-primary">Thêm</a>
            {{ method_field('GET') }}
            <h3 class="text-center">TimeSheet</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-responsive task-table table-hover">
       
                <thead>
                    <th>STT</th>
                    <th>Date</th>
                    <th>Total hours</th>
                    <th>Content</th>
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
                                <div>{{ (new \Carbon\Carbon($rows->date))->format('d/m/Y') }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $rows->hours }} hour</div>
                            </td>

                            <td class="table-text">
                                <div>{{ str_limit($rows->content, 80) }} hour</div>
                            </td>

                            <td>
                                <a title="Chi tiết" href="{{ route('overtime.show',$rows->id) }}" class="glyphicon glyphicon-book btn btn-primary"></a>
                            </td>
                            
                            <td>
                                <a title="Chỉnh sửa" href="{{ route('overtime.edit',$rows->id) }}" class="glyphicon glyphicon-edit btn btn-primary"></a>
                            </td>

                            <td>
                                <form action="{{ route('overtime.destroy',$rows->id) }}" name="_delete" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button title="Xóa" class="glyphicon glyphicon-trash btn btn-danger"></button>
                                </form>
                            </td>
             
                        </tr>

                    @endforeach
                       
                </tbody>
            </table>
            <div class="pagination-container text-center">
                {{ $overtimes->links() }}
            </div>
        </div>
    </div> 
@endsection