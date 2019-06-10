@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Product Management</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                        <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control">
                                <option value="">Select Category</option>
                                @foreach($catlist as $ct)
                                <option value="{{$ct->id}}">{{$ct->name}}</option>
                                    @endforeach
                            </select>
                            </div>
                            @if($errors->has('category'))
                                {{$errors->first('category')}}
                            @endif

                            <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                    </div>
                            @if($errors->has('name'))
                                {{$errors->first('name')}}
                            @endif

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>

                    <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="feature_image">
                </div>

            <div class="form-group">
            <label for="status">Status</label>
                <input type="radio"  id="status" name="status" value="0" checked>De-Active
                <input type="radio"  id="status" name="status" value="1">Active
        </div>
                            <div class="form-group">
                                <label for="tags">Tags</label>
                                @foreach($taglist as $tg)
                                <input type="checkbox" id="tags" name="tag[]" value="{{$tg->id}}"/>{{$tg->name}}
                                    @endforeach
                            </div>
                            @if($errors->has('tags'))
                                {{$errors->first('tags')}}
                            @endif

                            <input type="submit" name="btnSave" value="Save Product" class="btn btn-info">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
