<?php

namespace App\Http\Controllers\Ads;

use App\Http\Requests\Ads\StoreRequest;
use App\Http\Requests\Ads\UpdateRequest;
use App\Models\Ads;
use Illuminate\Support\Facades\Auth;

class AdsController extends BaseController
{
    public function index() {
        $ads = $this->service->getAllAds();

        return view('welcome', compact('ads'));
    }

    public function sortCategory($category)
    {
        $ads = $this->service->getSortByCategory($category);

        return view('welcome', compact('ads'));
    }

    public function show($id)
    {
        $adsData = $this->service->getDataForEdit($id);

        return view('ads.update', compact('adsData'));
    }

    public function store(StoreRequest $request)
    {
        $ads = new Ads();

        $this->validate($request, [
            'name' => 'required|min:5|max:25',
            'price' => 'required|min:1|max:10',
            'description' => 'required|min:10|max:225',
        ]);

        $ads->name = $request->input('name');
        $ads->category = $request->input('category');
        $ads->price = $request->input('price');

        $ads->description = $request->input('description');
        $ads->contact = Auth::user()->numberPhone;
        $ads->status = 'Активно';

        $ads->idUser = Auth::user()->id;

        $ads->save();

        return back()->withInput();
    }

    public function update(UpdateRequest $request, $id)
    {
        $this->service->updateAds($request->validated(), $id);

        return redirect('/');
    }

    public function destroy($id)
    {
        $ads = Ads::query()->where('idAds', $id)->delete();

        return back()->withInput();
    }
}
