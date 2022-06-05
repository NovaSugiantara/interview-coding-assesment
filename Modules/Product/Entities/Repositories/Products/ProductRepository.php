<?php

namespace Modules\Product\Entities\Repositories\Products;

use Modules\Product\Entities\Product;
use Illuminate\Http\Request;

class ProductRepository implements Products
{
    protected $produk;

    public function __construct(Product $produk)
    {
        $this->produk = $produk;
    }

    public function getAll()
    {
        $produk = Product::all();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Produtcs',
            'data'    => $produk
        ], 200);
    }

    public function getProductById($id)
    {
        //find Produtcs by ID
        $produk = Product::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Produtcs',
            'data'    => $produk
        ], 200);
        //return view('product::show');
    }
    public function createProduct(Request $request)
    {
        //save to database
        $produk = Product::create([
            'nama'     => $request->nama,
            'keterangan'   => $request->keterangan,
            'harga'   => $request->harga,
            'persediaan'   => $request->persediaan
        ]);

        //success save to database
        if ($produk) {

            return response()->json([
                'success' => true,
                'message' => 'Produtcs Created',
                'data'    => $produk
            ], 201);
        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Produtcs Failed to Save',
        ], 409);
    }

    public function updateProduct(Request $request, $id)
    {
        //find Produtcs by ID
        $produk = Product::findOrFail($id);

        if ($produk) {

            //update Produtcs
            $produk->update([
                'nama'     => $request->nama,
                'keterangan'   => $request->keterangan,
                'harga'   => $request->harga,
                'persediaan'   => $request->persediaan
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Produtcs Updated',
                'data'    => $produk
            ], 200);
        }

        //data Produtcs not found
        return response()->json([
            'success' => false,
            'message' => 'Produtcs Not Found',
        ], 404);
    }

    public function deleteProduct($id)
    {
        //find Produtcs by ID
        $produk = Product::findOrfail($id);

        if ($produk) {

            //delete Produtcs
            $produk->delete();

            return response()->json([
                'success' => true,
                'message' => 'Produtcs Deleted',
            ], 200);
        }

        //data Produtcs not found
        return response()->json([
            'success' => false,
            'message' => 'Produtcs Not Found',
        ], 404);
    }
}
