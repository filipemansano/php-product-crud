<?php

namespace App\Repositores\Contracts;

use App\Models\Category;

interface CategoryRepositoryInterface {

     /**
     * Display a listing of the resource.
     * @return Category[]
     */
    public function index();

    /**
     * Store a newly created resource in storage.
     * @param array $data
     */
    public function store(array $data) : Category;

    /**
     * Show the specified resource.
     * @param int $id
     */
    public function show($id) : Category;


    /**
     * Update the specified resource in storage.
     * @param array $data
     * @param int $id
     */
    public function update(array $data, $id) : Category;

    /**
     * Remove the specified resource from storage.
     * @param int $id
     */
    public function destroy($id) : Category;
}

