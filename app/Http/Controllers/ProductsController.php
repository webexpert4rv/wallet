<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;

class ProductsController extends Controller
{

    public function __construct(){
       // $this->middleware('jwt.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products   =   Product::all();


        if($products){
            $result     =  ['message'   =>  'success', 'data'  =>  $products];
        }else{
            $result     =  ['message'   =>  'success', 'data'  =>  'No products yet'];
        }

        return response()->json($result);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_title          =   $request->get('product_title');
        $product_description    =   ($request->get('product_description')) ? $request->get('product_description') : '';
        $product_image          =   ($request->get('product_image')) ? $request->get('product_image') : '';
        $product_price          =   ($request->get('product_price')) ? $request->get('product_price') : '';
        $product_quantity       =   ($request->get('product_quantity')) ? $request->get('product_quantity') : '';

        $product                        =   new Product();
        $product->product_title         =   $product_title;
        $product->product_description   =   $product_description;
        $product->product_image         =   $product_image;
        $product->product_price         =   $product_price;
        $product->product_quantity      =   $product_quantity;

        if($product->save()){
            $data = ['message'  =>  'Product added successfully'];
        }else{
            $data = ['message'  =>  'Failed to add Product'];
        }

        response()->json($data);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
