<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Models\product\Product;
use App\Models\product\Category;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index() {
        $products=Product::select('products.*','categories.name as name')->join('categories','category_id','categories.id')->orderBy('id')->get();
        return view('admin.products.index',['products'=>$products]);
    }

    public function create()
    {
        $categories=Category::get();
        return view('admin.products.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file=$request->file('image');
        $ext=$file->extension();
        $fileName=time().'.'.$ext;
        $file->move(public_path('assets/images/'),$fileName);

        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => floatval($request->price),
            'image' => "/assets/images/".$fileName,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('admin.products.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $Product)
    {
        $categories=Category::get();
        return view('admin.products.edit',['product'=>$Product,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $Product)
    {
        $file=$request->file('image');
        if($file){
            $ext=$file->extension();
            $fileName=time().'.'.$ext;
            $file->move(public_path('assets/images/'),$fileName);
            $Product->update([
                'title' => $request->title,
                'description' => $request->description,
                'price' => floatval($request->price),
                'image' => "/assets/images/".$fileName,
                'category_id' => $request->category_id
            ]);
        }
        $Product->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => floatval($request->price),
            'category_id' => $request->category_id
        ]);
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $Product)
    {
        $Product->delete();
        return redirect()->route('admin.products.index');
    }
}
