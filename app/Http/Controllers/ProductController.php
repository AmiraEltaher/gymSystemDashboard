<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Traits\Common;

class ProductController extends Controller
{
    use Common;
   private $column=[
    'productName',
    'productImage',
    'productDescription',
    'productCost',
    'productDiscount',
   ];

    public function index()
    {
        $products = Product::get();
        return view('admin.Product.viewProduct', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Product.addProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only($this->column);
        $data['productImage']  = $this->uploadFile($request->productImage, 'assets/img');
        Product::create($data);
        return redirect('products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.Product.ShowProduct',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view("admin.Product.EditProduct",compact('product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =  $request->only($this->column);
        $data['productImage'] = $this->uploadFile($request->productImage, 'assets/img');

        Product::where('id',$id)->update($data);
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('products');
    }
}
