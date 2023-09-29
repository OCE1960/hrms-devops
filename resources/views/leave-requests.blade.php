@extends('adminlte::page')

@section('title', 'Leave Request Dashboard')

@section('content_header')
<div class="row">

    <div class="col-sm-6">
        <h4 class="m-0 text-dark">Leave Request Dashboard</h4>
    </div>

    <div class="col-sm-6">
        <button class="btn btn-primary float-right" data-add-group="0"> Request for Leave </button>
    </div> 


    </div>
@stop


@section('content')           
    
    <div class="row shadow p-3 bg-white rounded" id="info">

        @if(isset($leaveRequets) & count($leaveRequets) > 0)
            <div class="table-responsive">
                <h4 class="text-primary"> List of Submitted Leave Requests</h4>
                <table id="leave-requets" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" >Name</th>
                            <th scope="col" >title</th>
                            <th scope="col" width="30%" >description</th>
                            <th scope="col" style="width:100px;"  >Start Date</th>
                            <th scope="col" style="width:100px;" >End Date</th>
                            <th scope="col">Status</th>
                            <th scope="col" style="width:100px;"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                            $x = 0;
                        @endphp

                        @foreach($leaveRequets as $leaveRequet)

                            <tr>
                                <th scope="row"> {{ ++$x }} </th>
                                <td> <strong> {{ $leaveRequet->user->name }} </strong> <br></td>

                                <td> {{ $leaveRequet->title }}   </td>
    
                                <td> {!! Str::limit(strip_tags($leaveRequet->description), 250, ' ...') !!} </td>

                                <th>{{ $leaveRequet->start_date }}</th>
                                <th>{{ $leaveRequet->end_date }}</th>

                                <td>  

                                    @if( (!$leaveRequet->status))
                                        <button class="btn btn-info btn-xs"> Pending </button>
                                    @elseif(($leaveRequet->status))
                                        <button class="btn btn-danger btn-xs"> Approved </button>
                                    @endif
                                
                                </td>

                                <td class="text-center"> 
                                        <button title="View" class="btn btn-xs btn-info mr-2 mb-2" data-view-project="#"> <i class="fas fa-eye"></i> View  </button>    
                                </td>
                            </tr>
                    
                        @endforeach
                        


                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center text-danger col-sm-12"> No Submitted Leave Request</div>          
        @endif 


    </div> <!-- /#info-box -->

@stop

@push('js')

    <script>       
        $(document).ready(function() {
            $('#leave-requets').DataTable();
        })
    </script>
    
@endpush