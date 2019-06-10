@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Product Management Edit</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{route('products.update',$data->id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{@method_field('put')}}
                            <div class="form-group">
                                <label for="name">Category</label>
                                <select name="category" id="category" class="form-control">
                                    @foreach($catlist as $c)
                                    <option value="{{$c->id}}" @if($c->id == $data->category) selected @endif>{{$c->name}}</option>
                                        @endforeach
                                </select>

                            </div>
                            @if($errors->has('category'))
                                {{$errors->first('category')}}
                            @endif

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}">
                            </div>
                            @if($errors->has('name'))
                                {{$errors->first('name')}}
                            @endif

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description">{{$data->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="feature_image">Image</label>
                                <br>
                                <img src="{{asset('images/'.$data->feature_image)}}" width="150" height="150" alt="{{$data->name}}">
                                <input type="file" class="form-control" id="image" name="feature_image" value="{{$data->feature_image}}">
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
                            <input type="submit" name="btnUpdate" value="Update Product" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
