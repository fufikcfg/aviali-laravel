<?php

namespace App\Http\Controllers\Ads;

use App\Http\Requests\Ads\StoreRequest;
use App\Http\Requests\Ads\UpdateRequest;
use App\Models\Ads;


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
        $data = $request->validated();

        $this->service->store($data);

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
