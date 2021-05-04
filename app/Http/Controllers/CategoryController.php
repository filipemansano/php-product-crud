<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormRequest;
use App\Repositores\Contracts\CategoryRepositoryInterface;

/**
 * @group  Category management
 *
 * APIs for managing categorys
 */
class CategoryController extends Controller
{
    protected CategoryRepositoryInterface $entity;

    public function __construct(CategoryRepositoryInterface $entity){
        $this->entity = $entity;
    }

    /**
     * Display a listing of categorys.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->entity->index();
    }

    /**
     * Store a newly Category.
     * @bodyParam  name string required Name of Category. Example: Limpeza
     *
     * @transformerModel  \App\Models\Category
     *
     * @param  CategoryFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {
        return $this->entity->store($request);
    }

    /**
     * Display the specified Category.
     * @urlParam  id required The ID of the Category. Example: 1
     *
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        return $this->entity->show((int) $id);
    }

    /**
     * Update the specified Category.
     * @urlParam  id required required The ID of the Category. Example: 1
     * @bodyParam  name string required Name of Category. Example: Limpeza
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryFormRequest $request, string $id)
    {
        return $this->entity->update($request, (int) $id);
    }

    /**
     * Remove the specified Category.
     * @urlParam  id required required The ID of the Category. Example: 1
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        return $this->entity->destroy((int) $id);
    }
}
