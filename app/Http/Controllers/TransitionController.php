<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Transition;
use App\Models\Bonus;
use Illuminate\Http\Request;
use Auth;

class TransitionController extends Controller
{
    //
    public function viewUserTransition(){


        $transitions = Transition::all();
        $users = User::where('type' , '!=' , 'general_user')->get();
        $own_transition = Transition::where('user_id' , Auth::user()->id)->get();
        $wallet = Wallet::where('user_id' , Auth::user()->id)->first();
        // dd($wallet->Total_balance_bonus);
        $own_wallet = $wallet->Total_balance_bonus;
        return view('backend.transition.transition', compact('transitions', 'users' , 'own_transition' , 'own_wallet'));



    }
    public function viewUserTransitionFilter(Request $request){
        // dd($request);
        if(!empty($request->transition_type) && !empty($request->user_type) && !empty($request->user_id)){

            $transitions = Transition::where('status' , $request->transition_type)->where('user_id' , $request->user_id)->get();
            return view('backend.transition.ajax_transition_table', compact('transitions'));

        }elseif(!empty($request->transition_type) && !empty($request->user_type)){

            $userarr=[];

            $users = User::where('type' , $request->user_type)->get();

            foreach($users as $key=>$user){
                $userarr[] =  $user->id;
            }

            $transitions = Transition::where('status' , $request->transition_type)->whereIn('user_id',$userarr)->get();
            return view('backend.transition.ajax_transition_table', compact('transitions'));

        }elseif(!empty($request->transition_type) && !empty($request->user_id)){

            $transitions = Transition::where('status' , $request->transition_type)->where('user_id' , $request->user_id)->get();
            return view('backend.transition.ajax_transition_table', compact('transitions'));

        }elseif(!empty($request->user_type) && !empty($request->user_id)){

            $transitions = Transition::where('user_id' , $request->user_id)->get();
            return view('backend.transition.ajax_transition_table', compact('transitions'));

        }elseif(!empty($request->transition_type)){
            $transitions = Transition::where('status' , $request->transition_type)->get();
            return view('backend.transition.ajax_transition_table', compact('transitions'));
        }
        elseif(!empty($request->user_type)){

            $userarr= [];

            $users = User::where('type' , $request->user_type)->get();

            foreach($users as $key=>$user){
                $userarr[] =  $user->id;
            }

            $transitions = Transition::whereIn('user_id',$userarr)->get();
            // dd($transitions)
            return view('backend.transition.ajax_transition_table', compact('transitions'));
        }
        elseif(!empty($request->user_id)){
            $transitions = Transition::where('uasr_id' , $request->user_id)->get();
            return view('backend.transition.ajax_transition_table', compact('transitions'));
        }

    }
    public function GetUserId(Request $request){
        $users = User::Where('type' , $request->user_type)->get();
        return $users;
    }

    public function withdrawRequest(){


        // $transitions = Transition::all();
        $users = User::where('id' , Auth::user()->id)->get();
        $wallet = Wallet::where('user_id' , Auth::user()->id)->first();
        // dd($wallet->Total_balance_bonus);
        $own_wallet = $wallet->Total_balance_bonus;
        return view('backend.transition.withdraw_request', compact( 'own_wallet', 'users'));



    }

    public function withdrawRequestStore(Request $request)
    {
        $transition = new Transition();
        $transition->user_id = $request->id;
        $transition->amount = $request->amount;
        $transition->status = 'Debit-Request';
        $transition->transition_medium = $request->transition_medium;
        $transition->Account_number = $request->Account_number;
        $transition->bank_name = $request->bank_name;
        $transition->branch_name = $request->branch_name;
        $transition->debit_request_date = date('Y-m-d H:i:s');
        $transition->save();

        $notification = array(
            'success' => 'Withdraw Created Successfully !',
        );
        return redirect()->back()->with($notification);

    }
    public function viewownTransitionFilter(Request $request){

        $own_transition = Transition::where('user_id' , Auth::user()->id)
                                    ->where('status' , $request->type)
                                    ->get();
        return view('backend.transition.ajax_own_transition', compact('own_transition'));
    }

    public function GetTransitionDetail(Request $request){
        // dd(123);

        $data['transition'] = Transition::find($request->id);
        // dd($data['transition']->user_id);
        $data['name'] = User::find($data['transition']->user_id);
        return $data;
    }
    public function GetTransitionStatusUpdate(Request $request){
        // dd($request);
        $wallet = Wallet::where('user_id',$request->user_id)->first();
        $transition = Transition::find($request->id);
        // dd($request->user_id);
        if($wallet->Total_balance_without_bonus < $request->amount){
            $extra = $wallet->Total_balance_bonus - $request->amount;
            $wallet->Total_balance_without_bonus = 0.00;
            $wallet->bonus =  $wallet->bonus - $extra;
            $wallet->Total_balance_bonus = $wallet->Total_balance_without_bonus + $wallet->bonus;
            $wallet->Total_withdaw = $wallet->Total_withdaw + $request->amount;
            $wallet->save();
            $transition->status = 'Debited';
            $transition->TxnID = $request->txn_id;
            $transition->date = date('Y-m-d H:i:s');
            $transition->save();
            $notification = array(
                'success' => 'Transition Updated Successfully !',
            );
            return redirect()->back()->with($notification);

        }
        else{
            $wallet->Total_balance_without_bonus = $wallet->Total_balance_without_bonus - $request->amount;
            $wallet->Total_balance_bonus = $wallet->Total_balance_without_bonus - $wallet->bonus;
            $wallet->Total_withdaw = $wallet->Total_withdaw + $request->amount;
            $wallet->save();
            $transition->status = 'Debited';
            $transition->TxnID = $request->txn_id;
            $transition->date = date('Y-m-d H:i:s');
            $transition->save();
            $notification = array(
                'success' => 'Transition Updated Successfully !',
            );
            return redirect()->back()->with($notification);
        }

    }

}
