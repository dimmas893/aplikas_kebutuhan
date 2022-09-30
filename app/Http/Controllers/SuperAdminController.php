<?php

namespace App\Http\Controllers;

use App\Models\Super_admin;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function store(Request $request)
    {
        $create = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];

        $super_admin = Super_admin::create($create);
        return response()->json([
            'data' => $super_admin
        ]);
    }
}
