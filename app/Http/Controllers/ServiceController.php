<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\DonateCampaign;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{

    public function index()
    {
        $posts = Campaign::orderBy('id', 'desc')->paginate(3);
        return view('pages.services', [
            'posts' => $posts
        ]);
    }

    public function detail(Request $request, $slug)
    {

        $post = Campaign::where('slug', '=', $slug)->first();
        if ($request->vnp_TxnRef) {
            $order = DonateCampaign::find($request->vnp_TxnRef); 
            if(!$order->status){
                $order->status = 1;
                $order->save();
    
                $campaign = Campaign::find($order->campaign_id);
                $campaign->total_donate += $order->amount;
                $campaign->save();
                $post->total_donate = $campaign->total_donate;
                
                return view('pages.services-detail', [
                    'post' => $post,
                    'message' => "Payment success, thank you !"
                ]);
            }
        }

        return view('pages.services-detail', [
            'post' => $post
        ]);
    }
}
