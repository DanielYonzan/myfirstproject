@extends('layouts.app')

@section('page-heading','Category')

@section('extra-styles')
    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Category</h6>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Rank</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $i =1;
                    @endphp
                    @foreach($data as $d)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$d->name}}</td>
                            <td>{{$d->slug}}</td>
                            <td>{{$d->rank}}</td>
                            <td>{{$d->description}}</td>
                            <td>
                                @if($d->status==1)
                                    Active
                                @else
                                    De-Active
                                @endif

                            </td>
                            <td><a href="{{route('category.edit',$d->id)}}" class="btn btn-info">Edit</a>
                                <form action="{{route('category.destroy',$d->id)}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form></td>
                        </tr>
                    @endforeach
                    </tbody>


                </table>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <script>
        $("#dataTable").dataTable();
    </script>
@endsection
