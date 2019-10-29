<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Shows the index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $totalUsers = User::count();
        $todayUsers = User::where('created_at', '>=', Carbon::now()->startOfDay())->count();

        return view('admins.index', [
            'totalUsers' => $totalUsers,
            'todayUsers' => $todayUsers
        ]);
    }
}
