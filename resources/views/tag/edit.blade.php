@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tag Management Edit</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{route('tag.update',$data->id)}}" method="post">
                            {{csrf_field()}}
                            {{@method_field('put')}}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}">
                            </div>
                            @if($errors->has('name'))
                                {{$errors->first('name')}}
                            @endif

                            <div class="form-group">
                                <label for="status">Status</label>
                                @if($data->status==1)
                                <input type="radio"  id="status" name="status" value="0">De-Active
                                <input type="radio"  id="status" name="status" value="1" checked>Active
                                    @else
                                    <input type="radio"  id="status" name="status" value="0" checked>De-Active
                                    <input type="radio"  id="status" name="status" value="1">Active
                                    @endif
                            </div>
                            <input type="submit" name="btnUpdate" value="Update Tag" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
