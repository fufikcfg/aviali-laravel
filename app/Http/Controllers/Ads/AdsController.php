<?php

namespace App\Http\Controllers\Ads;

use App\Models\Ads;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdsController extends Controller
{
    public function index() {
        $ads = DB::table('ads')->orderBy('idAds', 'desc')->get();
        return view('welcome', compact('ads'));
    }

    public function sortCategory($category) {
        $ads = Ads::query()->where('category', $category)->orderBy('idAds', 'desc')->get();
        return view('welcome', compact('ads'));
    }

    public function store(Request $request)
    {
        $ads = new Ads();

        $ads->name = $request->input('name');
        $ads->category = $request->input('category');
        $ads->price = $request->input('price');

        $ads->description = $request->input('description');
        $ads->contact = Auth::user()->numberPhone;
        $ads->status = 'Активно';

        $ads->idUser = Auth::user()->id;

        $ads->save();

        return redirect('/');

    }
}
