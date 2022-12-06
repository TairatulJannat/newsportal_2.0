<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Bonus;
use App\Models\PostType;
use App\Models\Post;
use App\Models\Transition;
use Illuminate\Http\Request;
use Auth;

class WalletController extends Controller
{
    //
    public function viewUserWallet(Request $request){

        $users = User::where('type' , '=' , $request->type )->get();
        $user_detail = User::find(Auth::user()->id);
        $type = $request->type;
        $bn_post_count = Post::where('post_type_id' , '1')->where('stage' , 'approved')->where('user_id' , Auth::user()->id)->count();
        $en_post_count = Post::where('post_type_id' , '2')->where('stage' , 'approved')->where('user_id' , Auth::user()->id)->count();
        $both_post_count = Post::where('post_type_id' , '3')->where('stage' , 'approved')->where('user_id' , Auth::user()->id)->count();
        $post_type = PostType::all();
        $Totalbonus = Bonus::where('user_id',Auth::user()->id)->sum('bonus');
        $total_withdraw = Transition::where('status' , 'devited')->sum('amount');
        $bonus = Bonus::where('user_id',Auth::user()->id)->orderBy('id', 'DESC')->first();
        return view('backend.wallet.user_wallet', compact('users' , 'user_detail' , 'bonus' , 'type' , 'bn_post_count' , 'en_post_count' , 'both_post_count' , 'post_type' , 'Totalbonus' , 'total_withdraw'));

    }
    public function filterByDate(Request $request){
        if($request->data == 'month'){
            $current_date_time = date("Y-m-d H:i:s");
            $end_date = date('Y-m-01 H:i:s', strtotime($current_date_time));

            $bn_post_count = Post::where('post_type_id' , '1')->where('stage' , 'approved')->where('user_id' , Auth::user()->id)->whereBetween('updated_at', [$end_date, $current_date_time])->count();
            $en_post_count = Post::where('post_type_id' , '2')->where('stage' , 'approved')->where('user_id' , Auth::user()->id)->whereBetween('updated_at', [$end_date, $current_date_time])->count();
            $both_post_count = Post::where('post_type_id' , '3')->where('stage' , 'approved')->where('user_id' , Auth::user()->id)->whereBetween('updated_at', [$end_date, $current_date_time])->count();
            $post_type = PostType::all();
            return view('backend.wallet.ajax_wallet_detail_filter' , compact('bn_post_count' , 'en_post_count' , 'both_post_count' , 'post_type'));
        }
        elseif($request->data == 'year'){
            $current_date_time = date("Y-m-d H:i:s");
            $end_date = date('Y-01-01 H:i:s', strtotime($current_date_time));

            $bn_post_count = Post::where('post_type_id' , '1')->where('stage' , 'approved')->where('user_id' , Auth::user()->id)->whereBetween('updated_at', [$end_date, $current_date_time])->count();
            $en_post_count = Post::where('post_type_id' , '2')->where('stage' , 'approved')->where('user_id' , Auth::user()->id)->whereBetween('updated_at', [$end_date, $current_date_time])->count();
            $both_post_count = Post::where('post_type_id' , '3')->where('stage' , 'approved')->where('user_id' , Auth::user()->id)->whereBetween('updated_at', [$end_date, $current_date_time])->count();
            $post_type = PostType::all();
            return view('backend.wallet.ajax_wallet_detail_filter' , compact('bn_post_count' , 'en_post_count' , 'both_post_count' , 'post_type'));
        }
        elseif($request->data == 'week'){
            $current_date_time = date("Y-m-d H:i:s");
            $end_date = date("Y-m-d H:i:s", strtotime('saturday previous week'));
            // dd(123);
            // dd($current_date_time , $end_date );
            $bn_post_count = Post::where('post_type_id' , '1')->where('stage' , 'approved')->where('user_id' , Auth::user()->id)->whereBetween('updated_at', [$end_date, $current_date_time])->count();
            $en_post_count = Post::where('post_type_id' , '2')->where('stage' , 'approved')->where('user_id' , Auth::user()->id)->whereBetween('updated_at', [$end_date, $current_date_time])->count();
            $both_post_count = Post::where('post_type_id' , '3')->where('stage' , 'approved')->where('user_id' , Auth::user()->id)->whereBetween('updated_at', [$end_date, $current_date_time])->count();
            $post_type = PostType::all();
            return view('backend.wallet.ajax_wallet_detail_filter' , compact('bn_post_count' , 'en_post_count' , 'both_post_count' , 'post_type'));
        }
        elseif($request->data == 'custom'){
            $start_date =date('Y-m-d', strtotime($request->start_date_time));
            $end_date = date('Y-m-d', strtotime($request->end_date));
            //  dd($start_date , $end_date);
            $bn_post_count = Post::where('post_type_id' , '1')->where('stage' , 'approved')->where('user_id' , Auth::user()->id)->whereBetween('updated_at', [$start_date, $end_date])->count();

            $en_post_count = Post::where('post_type_id' , '2')->where('stage' , 'approved')->where('user_id' , Auth::user()->id)->whereBetween('updated_at', [$start_date, $end_date])->count();
            $both_post_count = Post::where('post_type_id' , '3')->where('stage' , 'approved')->where('user_id' , Auth::user()->id)->whereBetween('updated_at', [$start_date, $end_date])->count();
            $post_type = PostType::all();
            return view('backend.wallet.ajax_wallet_detail_filter' , compact('bn_post_count' , 'en_post_count' , 'both_post_count' , 'post_type'));
        }
        elseif($request->data == 'all'){

            $bn_post_count = Post::where('post_type_id' , '1')->where('stage' , 'approved')->where('user_id' , Auth::user()->id)->count();
            $en_post_count = Post::where('post_type_id' , '2')->where('stage' , 'approved')->where('user_id' , Auth::user()->id)->count();
            $both_post_count = Post::where('post_type_id' , '3')->where('stage' , 'approved')->where('user_id' , Auth::user()->id)->count();
            $post_type = PostType::all();
            return view('backend.wallet.ajax_wallet_detail_filter' , compact('bn_post_count' , 'en_post_count' , 'both_post_count' , 'post_type'));
        }

        return view('backend.wallet.ajax_wallet_detail_filter');
    }
    public function bonusGet($id){

        $user = User::find($id);
        return $user;
    }
    public function bonusEdit(Request $request){

        $user = User::find($request->id);
        $user->bonus_amount = $request->new_bonus;
        $user->save();
        $notification = array(
            'success' => 'Bonus updated Successfully !',
        );
        return redirect()->back()->with($notification);

    }

    public function bouns_status(Request $request)
    {
        $user= User::find($request->id);
        // dd($data);
        if ($user->bonus_status == 1) {
            $user->bonus_status = 0;
        } else {
            $user->bonus_status = 1;
        }
        $user->update();
        return 1;
    }

    public function getLastBonusDate(){
        // dd(456);
        $bonus = Bonus::orderBy('updated_at', 'desc')->first();
        $bonus_updated_at = date('m/d/Y H:i:s', strtotime($bonus->updated_at));
        // dd($bonus_updated_at);
        return $bonus_updated_at;

    }
    public function BonusTableUpdate(){
        $current_date_time = date("Y-m-d H:i:s");
        $end_date = date('Y-m-d H:i:s', strtotime($current_date_time. ' - 7 days'));
        $users = User::where('type' , '!=' , 'general_user')->get();
        foreach($users as $user){
            $approve_posts_count = Post::where('stage' , 'approved')
                        ->where('user_id' , $user->id)
                        ->whereBetween('updated_at' , [$end_date , $current_date_time])
                        ->count();
            if($approve_posts_count > 0){

                if($user->bonus_status == 1){

                    $bonus = new Bonus();
                    $bonus->user_id = $user->id;
                    $bonus->bonus =$user->bonus_amount;
                    $bonus->save();

                    $wallet = Wallet::where('user_id' , $user->id)->first();
                    $wallet->Total_balance_without_bonus =  $wallet->Total_balance_bonus;
                    $wallet->bonus = $user->bonus_amount;
                    $wallet->Total_balance_bonus = $wallet->Total_balance_without_bonus + $wallet->bonus;
                    $wallet->update();

                }
                else{
                    $bonus = new Bonus();
                    $bonus->user_id = $user->id;
                    $bonus->bonus =0;
                    $bonus->save();

                    $wallet = Wallet::where('user_id' , $user->id)->first();
                    $wallet->Total_balance_without_bonus =  $wallet->Total_balance_bonus;
                    $wallet->bonus = $user->bonus_amount;
                    $wallet->Total_balance_bonus = $wallet->Total_balance_without_bonus + $wallet->bonus;
                    $wallet->update();
                    // return 1;
                }
            }
            else{

                $bonus = new Bonus();
                $bonus->user_id = $user->id;
                $bonus->bonus =0;
                $bonus->save();

                $wallet = Wallet::where('user_id' , $user->id)->first();
                $wallet->Total_balance_without_bonus =  $wallet->Total_balance_bonus;
                $wallet->bonus = $user->bonus_amount;
                $wallet->Total_balance_bonus = $wallet->Total_balance_without_bonus + $wallet->bonus;
                $wallet->update();
            }

        }

    }
}


