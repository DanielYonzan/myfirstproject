@extends('layouts.front')


@section('content')

    <div class="row">
        <div class="col-md-8">
            @foreach($product as $pd)

                <div class="product_post">
            <h3 class="product_post title"><a href="{{route('product.details',$pd->id)}}">{{$pd->name}} </a></h3>
                    <p class="text-leftt">{{$pd->created_at}}by <a href="" >{{App\User::find($pd->created_by)->name}}</a></p>
            <p>{{substr($pd->description,0,100)}}</p>


        </div>
            @endforeach
        </div>
        <div class="col-md-4">
            <dl>
                <dt>
                    Description lists
                </dt>
                <dd>
                    A description list is perfect for defining terms.
                </dd>
                <dt>
                    Euismod
                </dt>
                <dd>
                    Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.
                </dd>
                <dd>
                    Donec id elit non mi porta gravida at eget metus.
                </dd>
                <dt>
                    Malesuada porta
                </dt>
                <dd>
                    Etiam porta sem malesuada magna mollis euismod.
                </dd>
                <dt>
                    Felis euismod semper eget lacinia
                </dt>
                <dd>
                    Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh,
                    ut fermentum massa justo sit amet risus.
                </dd>
            </dl>
            <ol>
                <li class="list-item">
                    Lorem ipsum dolor sit amet
                </li>
                <li class="list-item">
                    Consectetur adipiscing elit
                </li>
                <li class="list-item">
                    Integer molestie lorem at massa
                </li>
                <li class="list-item">
                    Facilisis in pretium nisl aliquet
                </li>
                <li class="list-item">
                    Nulla volutpat aliquam velit
                </li>
                <li class="list-item">
                    Faucibus porta lacus fringilla vel
                </li>
                <li class="list-item">
                    Aenean sit amet erat nunc
                </li>
                <li class="list-item">
                    Eget porttitor lorem
                </li>
            </ol>

        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <address>
                <strong>Twitter, Inc.</strong><br> 795 Folsom Ave, Suite 600<br> San Francisco, CA 94107<br>
                <abbr title="Phone">P:</abbr> (123) 456-7890
            </address>
            <nav>
                <ul class="pagination align-content-center">
                    {{$product->links()}}
                    {{$product->currentPage()}}
                </ul>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        </div>
    </div>
    @endsection

@section('title')
<div class="row">
    <div class="col-md-12">
        <h1 class="text-center">Laravel Framework Frontend</h1>
         <p class="text-center">This is laravel framework</p>
        </div>
    </div>
</br>

@endsection