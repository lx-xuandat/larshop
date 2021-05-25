<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * @var ProductService $productService
     */
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productService->getLists();
        $data = [
            'products' => $products,
        ];
        return view('admin.products', $data);
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
    public function store(StoreProductRequest $request)
    {
        $request->validated();

        $product = $request->isMethod('put') ? Product::findOrFail($request->product_id) : new Product;

        $product->name = $request->input('name');
        $product->code = $request->input('code');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->status = $request->input('status');
        $product->images = $request->input('images');
        $product->weight = $request->input('weight');
        $product->user_id = 1;

        if ($product->save()) {
            return response()->json([
                'status_code' => 203,
                'message' => 'created successful',
                'product' => $product,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json($product);
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
        $product->update($request->except(['productId']));

        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // destroy product

    }

    public function deleteAll(Request $request){
        $ids = $request->ids;
        DB::table("products")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Products Deleted successfully."]);
    }
}
