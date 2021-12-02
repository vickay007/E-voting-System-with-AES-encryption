<?php

namespace App\Http\Controllers\Voters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Helpers;
use Illuminate\Support\Facades\Mail;
use Auth;
use App\Models\User;
use App\Models\State;
use App\Models\Local;
use Image;

class HomePageController extends Controller
{

    public function sendMail($user_email, $enc_key)
    {
        $email_message = "Here is your encryption key: $enc_key";

        $messageData = ['user' => $user_email, 'enc_key'=> $enc_key, 'email_message' => $email_message];

        Mail::send('admin.mail', $messageData, function($message) use ($user_email){
            $message->to($user_email)->subject('Encryption key Notice');
        });

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // if(Auth::user()->type === 2){
        //     return view('admin.voters.index');
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

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
    public function edit()
    {
        $id = Auth::user()->id;
        $page_name = 'Complete Your Registration';
        $user = User::find($id);
        $states = State::all();
        $locals = Local::all();
        return view('admin.voters.register', compact('page_name', 'user', 'states', 'locals'));
    }

    public function findLocalName(Request $request)
    {
        $data = Local::select('local_name', 'local_id')->where('state_id', $request->id)->get();
        return response()->json($data);
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
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required',
            'resident_address' => 'required',
            'occupation' => 'required',
            'lga' => 'required',
            'state' => 'required',
        ]);

        $key = rand(1111111111,9999999999);

        $cipher = "aes-256-cbc";

        $iv_size = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($iv_size);

        $user = User::find($id);
        $state = State::where('state_id', $request->state)->value('name');

        if($request->file('image')){
            // unlink('user_img/'. $user->image);
            $file = $request->file('image');
            $file_name = time(). '.' .$file->getClientOriginalExtension();
            $img_path = 'user_img/'. $file_name;
            Image::make($file)->resize(122,122)->save($img_path);

            $user->image = $file_name;
            // dd($user->image);

            $user->name = encryption($key, $request->name, $cipher, $iv_size, $iv);
            $user->phone_number = encryption($key, $request->phone_number, $cipher, $iv_size, $iv);
            $user->resident_address = encryption($key, $request->resident_address, $cipher, $iv_size, $iv);
            $user->occupation = encryption($key, $request->occupation, $cipher, $iv_size, $iv);
            $user->lga = encryption($key, $request->lga, $cipher, $iv_size, $iv);
            $user->state = encryption($key, $state, $cipher, $iv_size, $iv);
            $user->encryption_key = $key;
            $user->iv = base64_encode($iv);
            $user->reg_status = 1;

            $user->save();
            $db_key = User::where('id', Auth::user()->id)->value('encryption_key');
            $this->sendMail($user->email, $db_key);
        }else{

            $user->name = encryption($key, $request->name, $cipher, $iv_size, $iv);
            $user->phone_number = encryption($key, $request->phone_number, $cipher, $iv_size, $iv);
            $user->resident_address = encryption($key, $request->resident_address, $cipher, $iv_size, $iv);
            $user->occupation = encryption($key, $request->occupation, $cipher, $iv_size, $iv);
            $user->lga = encryption($key, $request->lga, $cipher, $iv_size, $iv);
            $user->state = encryption($key, $state, $cipher, $iv_size, $iv);
            $user->encryption_key = $key;
            $user->iv = base64_encode($iv);
            $user->reg_status = 1;

            $user->save();
            $db_key = User::where('id', Auth::user()->id)->value('encryption_key');
            $this->sendMail($user->email, $db_key);
        }

        return redirect('/users/register')->with('success', 'Records Changed Successfully');
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
