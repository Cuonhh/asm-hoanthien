<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Additional_info;
use Illuminate\Support\Facades\Storage;

class WebInfoController extends Controller
{
    public function index() {
        $logo = Additional_info::where('title', 'logo')->value('content');
        $address = Additional_info::where('title', 'address')->value('content');
        $phone = Additional_info::where('title', 'phone')->value('content');
        $email = Additional_info::where('title', 'email')->value('content');

        return view('admin.webinfo', compact('logo','address','phone','email'));
    }

    public function store(Request $request) {
        $request->validate([
            'logo' => 'image',
            'address' => 'required|min:6',
            'phone' => 'required|min:9',
            'email' => 'required|min:9|email'
        ]);

        if(isset($request->logo)){
            $logo = Additional_info::where('title', 'logo')->value('content');
            Storage::delete($logo);
            Additional_info::where('title', 'logo')->update(['content' => $request->logo->store('images')]);
        }

        Additional_info::where('title', 'address')->update(['content' => $request->address]);
        Additional_info::where('title', 'phone')->update(['content' => $request->phone]);
        Additional_info::where('title', 'email')->update(['content' => $request->email]);

        return redirect()->back()->with('status', 'Cập nhập thành công');
    }
}
