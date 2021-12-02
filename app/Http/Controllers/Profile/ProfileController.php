<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\Helpers;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        

        $page_name = 'Profile';

        $cipher = "aes-256-cbc";

        // $re_key = $request->key;

        $iv_size = openssl_cipher_iv_length($cipher);

        $id = Auth::user()->id;
        $user = User::find($id);

        $key = $user->encryption_key;
        $iv = base64_decode($user->iv);


        if($request->d_key != $key){
            // return Redirect()->back()->with('error', 'Invalid Encryption key');
            return view('admin.profile.index', compact('page_name', 'user'))->withErrors(["errors"=>"Invalid encryption key"]);
        }else{
            $user->name = decryption($key, $user->name, $cipher, $iv_size, $iv);
            $user->email = $user->email;
            $user->phone_number = decryption($key, $user->phone_number, $cipher, $iv_size, $iv);
            $user->resident_address = decryption($key, $user->resident_address, $cipher, $iv_size, $iv);
            $user->occupation = decryption($key, $user->occupation, $cipher, $iv_size, $iv);
            $user->lga = decryption($key, $user->lga, $cipher, $iv_size, $iv);
            $user->state = decryption($key, $user->state, $cipher, $iv_size, $iv);
            $user->image = $user->image;
            
            return view('admin.profile.decrypt', compact('page_name', 'user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = 'Edit Profile';

        $cipher = "aes-256-cbc";

        $iv_size = openssl_cipher_iv_length($cipher);

        $user = User::find($id);

        $key = $user->encryption_key;
        $iv = base64_decode($user->iv);

        $user->name = decryption($key, $user->name, $cipher, $iv_size, $iv);
        $user->email = $user->email;
        $user->phone_number = decryption($key, $user->phone_number, $cipher, $iv_size, $iv);
        $user->resident_address = decryption($key, $user->resident_address, $cipher, $iv_size, $iv);
        $user->occupation = decryption($key, $user->occupation, $cipher, $iv_size, $iv);
        $user->lga = decryption($key, $user->lga, $cipher, $iv_size, $iv);
        $user->state = decryption($key, $user->state, $cipher, $iv_size, $iv);
        return view('admin.profile.edit', compact('page_name', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
