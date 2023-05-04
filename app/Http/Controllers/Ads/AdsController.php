<?php

namespace App\Http\Controllers\Ads;

use App\Models\Ads;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdsController extends Controller
{
    public function index() {

//        switch ($_GET['category']) {
//            case 'auto':
//                $ads = Ads::all()->reverse()->where('category', 'Авто');
//                break;
//            case 'forhome':
//                $category = 'Вещи для дома';
//                break;
//            default:
//                $ads = Ads::all()->reverse();
//                break;
//        }

//        dd($_GET['category']);
//        $category = "Авто";
        $ads = Ads::all()->reverse();
        return view('welcome', compact('ads'));
    }

    public function show($id)
    {
        //
    }
}
