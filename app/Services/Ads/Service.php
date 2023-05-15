<?php

namespace App\Services\Ads;

use App\Models\Ads;
use Illuminate\Support\Facades\Auth;

class Service
{
    public function getAllAds()
    {
        return Ads::query()
            ->with('category', 'status')
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function getSortByCategory($category)
    {
        return $this->getAllAds()
            ->where('category_id', $category);
    }

    public function getDataForEdit($id)
    {
        return Ads::query()
            ->where('id', $id)
            ->take(1)
            ->select('id' ,'name', 'price', 'description', 'category_id', 'status_id')
            ->get();
    }

    public function updateAds($data, $id)
    {
        Ads::where('id', $id)
            ->update($data);
    }

    public function getDefaultValueForAds()
    {
        return [
            'status_id' => 1,
            'contact' => Auth::user()->numberPhone,
            'user_creat_id' => Auth::user()->id,
        ];
    }

    public function store($data)
    {
        $data += $this->getDefaultValueForAds();
        Ads::create($data);
    }
}
