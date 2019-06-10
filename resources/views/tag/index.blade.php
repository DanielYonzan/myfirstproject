@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tag Management</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
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
                                    <td>
                                        @if($d->status==1)
                                            Active
                                            @else
                                        De-Active
                                            @endif

                                    </td>
                                    <td><a href="{{route('tag.edit',$d->id)}}" class="btn btn-info">Edit</a>
                                        <form action="{{route('tag.destroy',$d->id)}}" method="post">
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
        </div>
    </div>
@endsection
