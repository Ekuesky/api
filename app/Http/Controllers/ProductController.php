<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Resources\ProductCollection;
use Facade\FlareClient\Http\Response;

class ProductController extends Controller
{

    function __construct(){

        $this->middleware('auth:api')->except('index','show');

    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return ProductCollection::collection(Product::all()) ;
        return ProductResource::collection(Product::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'youpi';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, Product $product)
    {
        //
        //dd($request);
        $product->name = $request->name;
        $product->detail = $request->detail;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->stock = $request->stock;

        $product->save();
        return response()->json(['data' => new ProductResource($product)]);
        //$this->description = $request->detail;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $product->update($request->all());
        return response()->json(['data' => new ProductResource($product)]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return response()->json(['data' => new ProductResource($product),'status'=>'deleted']);
    }
}
