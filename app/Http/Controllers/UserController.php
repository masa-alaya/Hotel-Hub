<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function manage() {
        $users=User::all()->where('role', '=', 3);
        return view('users.admin', ['users'=>$users]);
    }

    public function destroy(Request $request) {
        User::destroy($request->id);
        return back()->with(['message'=>'The user has been deleted successfully']);
    }

    public function suspend(Request $request)
    {
        $user = User::find($request->id);
        if($request->days==0) {
            $user->banned_till = 0;
            $user->save();
            return back()->with(['message'=>'The user has been blocked permanently']);
        }
        else {
            $user->banned_till = Carbon::now()->addDays($request->days);
            $user->save();
            return back()->with(['message'=>'The user has been suspended for '. $request->days. ' days']);
        }

    }

    public function unban(Request $request)
    {
        $user = User::find($request->id);
            $user->banned_till = null;
            $user->save();
            return back()->with(['message'=>'The user has been unbloked successfully']);
    }

    public function chargePage(Request $request)
    {
        $user = User::find($request->id);
        if($user==null)
            return back()->with(['message'=>'Such user doesn\'t exist']);
        return view('users.charge', ['user'=>$user]);
    }

    public function charge (Request $request)
    {
        $user = User::find($request->id);

        $user->balance+=$request->amount;

        $user->save();

        return redirect('/users/manage')->with(['message'=>'The Account has been charged successfully!']);

    }

    public function cart()
    {
        return view('cart');
    }


    public function setting($userID)
    {
        $user= User::findOrFail($userID);
        $userBookings =  Booking::where('user_id', $user->id)->get();


        return view('setting', compact('userBookings'));


    }



    public function update(Request $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string'],
        ]);

        $request->phone = str_replace(' ', '', $request->phone);
        if(substr($request->phone, 0, 2) != '09'){
            throw ValidationException::withMessages([
                'phone number' => 'Phone num should be start 09',
            ]);
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        return redirect()->route('setting', ['id' => $user->id])->with('message', 'User Updated Successfully');
    }




}
