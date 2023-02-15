<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        $users = DB::select('CALL getAllUsers()');

        //COMPLETED ORDERS
        DB::select('CALL countOrdersByStatus(?, @total)', ['COMPLETED']);

        $completed_orders = DB::select('SELECT @total AS total_completed_orders');

        //PENDING ORDERS
        DB::select('CALL countOrdersByStatus(?, @total)', ['PENDING']);

        $pending_orders = DB::select('SELECT @total AS total_pending_orders');

        //CANCELLED ORDERS
        DB::select('CALL countOrdersByStatus(?, @total)', ['CANCELLED']);

        $cancelled_orders = DB::select('SELECT @total AS total_cancelled_orders');

        return view('home', compact('users', 'completed_orders', 'pending_orders', 'cancelled_orders'));
    }
}
