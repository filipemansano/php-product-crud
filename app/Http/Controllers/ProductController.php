<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Repositores\Contracts\ProductRepositoryInterface;

/**
 * @group  Product management
 *
 * APIs for managing products
 */
class ProductController extends Controller
{
    protected ProductRepositoryInterface $entity;

    public function __construct(ProductRepositoryInterface $entity){
        $this->entity = $entity;
    }

    /**
     * Display a listing of products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->entity->index();
    }

    /**
     * Store a newly product.
     * @bodyParam  name string required Name of product. Example: Sabão em Pó
     * @bodyParam  quantity int required The id of the user. Example: 2
     * @bodyParam  category_id int required The id of category. Example: 1
     *
     * @transformerModel  \App\Models\Product
     *
     * @param  ProductFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        return $this->entity->store($request->all());
    }

    /**
     * Display the specified product.
     * @urlParam  id required The ID of the product. Example: 1
     *
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        return $this->entity->show((int) $id);
    }

    /**
     * Update the specified product.
     * @urlParam  id required required The ID of the product. Example: 1
     * @bodyParam  name string required Name of product. Example: Sabão em Pó
     * @bodyParam  quantity int required The id of the user. Example: 2
     * @bodyParam  category_id int required The id of category. Example: 1
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, string $id)
    {
        return $this->entity->update($request->all(), (int) $id);
    }

    /**
     * Remove the specified product.
     * @urlParam  id required required The ID of the product. Example: 1
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        return $this->entity->destroy((int) $id);
    }
}
