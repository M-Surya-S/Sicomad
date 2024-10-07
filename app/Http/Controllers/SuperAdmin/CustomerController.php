<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('role', 'pengguna')->get();
        return view('super-admin.customer.table', compact('customers'));
    }
}
