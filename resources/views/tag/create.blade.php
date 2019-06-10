@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tags Management</div>

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

                        <form method="post" action="{{route('tag.store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                            </div>
                            @if($errors->has('name'))
                                {{$errors->first('name')}}
                            @endif

            <div class="form-group">
            <label for="status">Status</label>
                <input type="radio"  id="status" name="status" value="0" checked>De-Active
                <input type="radio"  id="status" name="status" value="1">Active
        </div>
                            <input type="submit" name="btnSave" value="Save Tag" class="btn btn-info">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
