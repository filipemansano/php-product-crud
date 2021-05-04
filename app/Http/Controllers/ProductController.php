<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Repositores\Contracts\ProductRepositoryInterface;

class ProductController extends Controller
{
    protected ProductRepositoryInterface $entity;

    public function __construct(ProductRepositoryInterface $entity){
        $this->entity = $entity;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->entity->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        return $this->entity->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function show(int $product)
    {
        return $this->entity->show($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductFormRequest  $request
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, int $product)
    {
        return $this->entity->update($request, $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $product)
    {
        return $this->entity->destroy($product);
    }
}
