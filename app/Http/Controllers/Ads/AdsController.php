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

    public function show($id)
    {
        $adsData = Ads::query()->where('idAds', $id)->get();

        return view('ads.update', compact('adsData'));
    }

    public function store(Request $request)
    {
        $ads = new Ads();

        $this->validate($request, [
            'name' => 'required|unique:ads|min:5|max:25',
            'price' => 'required|unique:ads|min:1|max:10',
            'description' => 'required|unique:ads|min:10|max:225',
        ]);

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

    public function update($id, Request $request)
    {
        $ads = Ads::query()->where('idAds', $id)->first();

        $this->validate($request, [
            'name' => 'required|unique:ads|min:5|max:25',
            'price' => 'required|unique:ads|min:1|max:10',
            'description' => 'required|unique:ads|min:25|max:225',
        ]);

        $ads->name = $request->input('name');
        $ads->category = $request->input('category');
        $ads->price = $request->input('price');

        $ads->description = $request->input('description');
        $ads->status = $request->input('status');

        $ads->save();

        return redirect('/');
    }

    public function destroy($id)
    {
        $ads = Ads::query()->where('idAds', $id)->delete();

        return redirect('/');
    }
}
