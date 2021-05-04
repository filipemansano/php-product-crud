<?php

namespace App\Repositores\Contracts;

use App\Models\Product;

interface ProductRepositoryInterface {

     /**
     * Display a listing of the resource.
     * @return Product[]
     */
    public function index();

    /**
     * Store a newly created resource in storage.
     * @param array $data
     */
    public function store(array $data) : Product;

    /**
     * Show the specified resource.
     * @param int $id
     */
    public function show($id) : Product;


    /**
     * Update the specified resource in storage.
     * @param array $data
     * @param int $id
     */
    public function update(array $data, $id) : Product;

    /**
     * Remove the specified resource from storage.
     * @param int $id
     */
    public function destroy($id) : Product;
}
