<?php

namespace App\Http\Controllers;

use App\Models\EmailList;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    //
    public function index(EmailList $emailList)
    {
        $search = request()->search;

        $subscribers = $emailList->subscribers()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->paginate(10); 


        return view('subscribers.index', [
            'emailList' => $emailList,
            'subscribers' => $subscribers,
            'search' => $search
        ]);
    }

    public function create(EmailList $emailList)
    {
        return 'oi';
    }
}
