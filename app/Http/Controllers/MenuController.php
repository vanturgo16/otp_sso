<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Spatie\Permission\PermissionRegistrar;
class MenuController extends Controller
{
    public function index()
    {
        $lastPasswordUpdate = Auth::user()->password_update;
    
        if ($lastPasswordUpdate === null || now()->diffInYears($lastPasswordUpdate) >= 1) {
            Alert::info('info', 'Segera Rubah Password anda');
            return redirect('/profil');
        }
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        return view('menusso.menu');
    }
}
