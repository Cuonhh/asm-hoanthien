<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $now = date("Y-m-d H:i:s");
        $date = date_create($now);
        date_add($date, date_interval_create_from_date_string("-1 months"));
        $startDay = date_format($date, "Y-m-d H:i:s");
        $users = User::whereBetween('created_at', [$startDay, $now])->get();
        $numberTang = $users->count();
        // dd($startDay );
        $numberUser = User::all()->count();
        $numberPost = Post::all()->count();
        $numberTangPost = Post::whereBetween('created_at', [$startDay, $now])->get()->count();
        
        return view('admin.dashboard', compact('numberTang', 'numberUser', 'numberPost', 'numberTangPost'));
    }

    public function servicePostOnCate() {
        $data = DB::select("SELECT c.name, COUNT(c.id) as countPost from categories c JOIN posts p ON c.id = p.category_id GROUP BY c.id");

        return response()->json($data, 200);
    }
}
