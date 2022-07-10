<?php

namespace App\Http\Controllers;

use App\Actions\Product\CreateProductAction;
use App\Actions\Product\UpdateProductAction;
use App\Actions\Upload\UploadImageAction;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():Response
    {
        return Inertia::render('Products/Index', [
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():Response
    {
        return Inertia::render('Products/Create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $imageName = "";
        if($request->hasFile('image'))
        {
            $imageName = app(UploadImageAction::class)->execute($request->image);
        }
        $product = app(CreateProductAction::class)->execute($request->title,$request->description,$request->category_id,$request->price,$request->in_stock,$imageName);
        return Redirect::route('products.edit',$product)->with([
            'message'=>__('response.created',['Resource'=>'Product']),
            'success'=>true
        ]);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product):Response
    {
        return Inertia::render('Products/Edit',[
            'product'=>$product,
            'categories'=>Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {

        if($request->hasFile('image'))
        {
            $imageName = app(UploadImageAction::class)->execute($request->image);
        } else {
            $imageName = $product->image;
        }
        $updatedProduct = app(UpdateProductAction::class)->execute($product,$request->title,$request->description,$request->category_id,$request->price,$request->in_stock,$imageName);

        return Redirect::back()->with([
            'message'=>__('response.updated',['Resource'=>'Product']),
            'success'=>true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return Redirect::route('products.index')->with([
            'message'=> __('response.deleted',['Resource'=>'Product']),
            'success'=>true
        ]);
    }
}
