<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\PermissionRegistrar;
class MenuController extends Controller
{
    public function index()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        return view('menusso.menu');
    }
}
