<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $cakes = Cake::where('is_available', true)->get();
        return view('dashboard.index', compact('cakes'));
    }

    public function show($id)
    {
        $cake = Cake::findOrFail($id);
        return view('dashboard.show', compact('cake'));
    }
}
