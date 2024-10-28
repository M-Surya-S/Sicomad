<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $admins = User::where('role', 'admin')->count();
        $customers = User::where('role', 'pengguna')->count();
        
        return view('super-admin.index', compact('admins', 'customers'));
    }
}
