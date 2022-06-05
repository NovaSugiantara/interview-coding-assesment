<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Repositories\Products\ProductRepository;

class ProductController extends Controller
{
    private $ProductRepository;
    public function __construct(ProductRepository $ProductRepository)
    {
        $this->ProductRepository = $ProductRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $produk = $this->ProductRepository->getAll();
        return $produk;
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('product::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //set validation
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'nama'   => 'required',
            'keterangan' => 'required',
            'harga' => 'required',
            'persediaan' => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $produk = $this->ProductRepository->createProduct($request);
        return $produk;
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $produk = $this->ProductRepository->getProductById($id);
        return $produk;
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('product::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //set validation
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'nama'   => 'required',
            'keterangan' => 'required',
            'harga' => 'required',
            'persediaan' => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $produk = $this->ProductRepository->updateProduct($request, $id);
        return $produk;
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $produk = $this->ProductRepository->deleteProduct($id);
        return $produk;
    }
}
