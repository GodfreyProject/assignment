<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use App\Services\DiscountService;
use Illuminate\Http\Request;

/**
 * CheckoutController
 * 
 * Handles the checkout process.
 */

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $orderService;
    protected $discountService;

    /**
     * Constructor
     * 
     * @param OrderService $orderService
     * @param DiscountService $discountService
     */

    public function __construct(OrderService $orderService, DiscountService $discountService)
    {
        $this->orderService = $orderService;
        $this->discountService = $discountService;
    }

    /**
     * Show the checkout page.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */

    public function showCheckout(Request $request)
    {
        $user = $request->user();
        return view('checkout.index', compact('user'));
    }

    /**
     * Process the checkout.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function processCheckout(Request $request)
    {
        $user = $request->user();
        $discountCode = $request->input('discount_code');
        
        $order = $this->orderService->createOrder($user->id, $discountCode);
        
        // Schedule discount code creation
        $this->discountService->scheduleDiscountCode($user->id);

        return redirect()->route('checkout.success')->with('order', $order);
    }

    /**
     * Show the checkout success page.
     *
     * @return \Illuminate\View\View
     */

    public function success()
    {
        return view('checkout.success');
    }
    public function index()
    {
        //
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
