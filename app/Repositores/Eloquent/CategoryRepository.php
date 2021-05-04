<?php

namespace App\Repositores\Eloquent;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositores\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface {

    protected $entity;

    public function __construct(Category $entity){
        $this->entity = $entity;
    }

    /**
     * @return Category[]
     */
    public function index()
    {
        return $this->entity->all();
    }

    public function show($id) : Category
    {
        return $this->entity->findOrFail($id);
    }

    public function store(Request $request) : Category
    {
        $data = $request->all();
        $product = $this->entity->create($data);

        return $product;
    }

    public function update(Request $request, $id) : Category
    {
        $data = $request->all();

        $product = $this->entity->findOrFail($id);
        $product->update($data);

        return $product->refresh();
    }

    public function destroy($id) : Category
    {
        $product = $this->entity->findOrFail($id);
        $product->delete();

        return $product;
    }
}
