<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;

/**
 * CartController
 * 
 * Handles cart-related operations.
 */

class CartController extends Controller
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
     * Display the user's cart.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $cartItems = $this->cartService->getCartItems($request->user()->id);
        return view('cart.index', compact('cartItems'));
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
