<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\ProductSerivce;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $ProductSerivce;
    public function __construct(ProductSerivce $service){
        $ProductSerivce = $service;
        $this->middleware('auth');
        $this->middleware('admin')->except(['index', 'show']);
        $this->middleware('user')->only(['index', 'show']);
    }

    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
