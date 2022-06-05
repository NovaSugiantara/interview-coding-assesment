<?php

namespace Modules\Product\Entities\Repositories\Products;

use Modules\Product\Entities\Product;
use Illuminate\Http\Request;

interface Products
{
    public function getAll();
    public function getProductById($id);
    public function createProduct(Request $request);
    public function updateProduct(Request $request, $id);
    public function deleteProduct($id);
}
