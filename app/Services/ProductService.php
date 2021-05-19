<?php


namespace App\Services;


use App\Models\Product;

class ProductService extends BaseService
{
    protected $productModel;

    /**
     * ProductService constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->productModel = $product;
    }

    /**
     * @param array $option
     * @param $page
     */
    function getLists($paginate = 15, $option = [])
    {
        $products = $this->productModel->paginate($paginate);
        return $products;
    }
}
