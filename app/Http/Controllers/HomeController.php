<?php
namespace App\Http\Controllers;
class HomeController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.index');
    }
    public function minor()
    {
        return view('pages.dashboard.minor');
    }
}
