<?php

namespace App\Repositores\Contracts;

use App\Models\Category;
use Illuminate\Http\Request;

interface CategoryRepositoryInterface {

     /**
     * Display a listing of the resource.
     * @return Category[]
     */
    public function index();

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     */
    public function store(Request $request) : Category;

    /**
     * Show the specified resource.
     * @param int $id
     */
    public function show($id) : Category;


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, $id) : Category;

    /**
     * Remove the specified resource from storage.
     * @param int $id
     */
    public function destroy($id) : Category;
}

