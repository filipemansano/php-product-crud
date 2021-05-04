<?php

namespace App\Repositores\Contracts;

use App\Models\Product;
use Illuminate\Http\Request;

interface ProductRepositoryInterface {

     /**
     * Display a listing of the resource.
     * @return Product[]
     */
    public function index();

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     */
    public function store(Request $request) : Product;

    /**
     * Show the specified resource.
     * @param int $id
     */
    public function show($id) : Product;


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, $id) : Product;

    /**
     * Remove the specified resource from storage.
     * @param int $id
     */
    public function destroy($id) : Product;
}
