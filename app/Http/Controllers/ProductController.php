<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\CartService;

/**
 * ProductController
 * 
 * Handles product-related operations.
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    protected $cartService;

    /**
     * Constructor
     * 
     * @param CartService $cartService
     */

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
/**
     * Display a listing of products.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = Product::where('stock', '>', 0)->get();
        return view('products.index', compact('products'));
    }
    /**
     * Add a product to the user's cart.
     *
     * @param Request $request
     * @param int $productId
     * @return \Illuminate\Http\RedirectResponse
     */

    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $this->cartService->addToCart($request->user()->id, $product->id);
        return redirect()->back()->with('success', 'Product added to cart');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
