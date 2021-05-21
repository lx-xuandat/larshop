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
    function getLists($paginate = null, $option = [])
    {
        if ($paginate) {
            $products = $this->productModel->paginate($paginate);
        } else {
            $products = $this->productModel->all();
        }

        return $products;
    }
}
