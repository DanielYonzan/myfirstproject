<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductCreateRequest;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $data = Product::all();

        return view('products.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catlist=Category::all();
        $taglist=Tag::all();
        return view('products.create',compact('catlist','taglist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        $file = $request->file('feature_image');
        $fname = uniqid().'_'.rand(0,1000000).$file->getClientOriginalExtension();
        $destinationPath = 'images';
        $file->move($destinationPath,$fname);

        $user=Auth::id();
       $status= Product::create([
            'category'=>$request->input('category'),
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'feature_image'=>$fname,
            'status'=>$request->input('status'),
            'created_by'=>$user
        ]);
//       $status->tag()->attach($request->input('tag'));
        if ($status){
            Session::flash('success','Category created Successfully');
        }else{
            Session::flash('error','Error on Category create!!!');
        }
        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Product::find($id);
        $catlist=Category::all();
        return view('products.edit',compact('data','catlist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);

        if($request->file('feature_image')){
            $file = $request->file('feature_image');
            $fname = uniqid().'_'.rand(0,1000000).$file->getClientOriginalExtension();
            $destinationPath = 'images';
            $file->move($destinationPath,$fname);
            $product->feature_image=$fname;
        }

        $product->category=$request->input('category');
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->status=$request->input('status');
        $product->update();
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prodduct=Product::find($id);
        $prodduct->delete();
        return redirect('products');
    }
}
