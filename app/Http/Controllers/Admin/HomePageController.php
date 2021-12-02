<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BallotPaper;
use Auth;
use DB;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $role_insert = DB::table('role_user')->select('role_id')->count();

        // if(!$role_insert){
        //     $data = 'good';
        // }

        $role_user = DB::table('role_user')->where('user_id', Auth::user()->id)->exists();

        // dd($role_user);

        if(Auth::user()->type == 1){

            if ($role_user == false) {
                DB::table('role_user')->insert([
                    'role_id' => 1,
                    'user_id' => Auth::user()->id, 
                    ]);
            }

            $pdp_vote = DB::table('ballot_papers')->where('party', 'PDP')->count();
            $apc_vote = DB::table('ballot_papers')->where('party', 'APC')->count();
            $anpp_vote = DB::table('ballot_papers')->where('party', 'ANPP')->count();
            $acn_vote = DB::table('ballot_papers')->where('party', 'ACN')->count();
            $total_votes = DB::table('ballot_papers')->count();

            $reg_voters = DB::table('users')->where('reg_status', '1')->count();
            // $unreg_voters = DB::table('users')->where('reg_status', '0')->count();
            // dd($total_votes);

            return view('admin.index', compact('pdp_vote', 'apc_vote', 'anpp_vote', 'acn_vote', 'reg_voters', 'total_votes'));
        }else if(Auth::user()->type == 2){

            if ($role_user == false) {
                DB::table('role_user')->insert([
                    'role_id' => session('role_id'),
                    'user_id' => Auth::user()->id, 
                ]);
            }

            return redirect('/users/register');          
        }
    }

    public function home_dash()
    {
        if(Auth::user()->type == 1){
            $pdp_vote = DB::table('ballot_papers')->where('party', 'PDP')->count();
            $apc_vote = DB::table('ballot_papers')->where('party', 'APC')->count();
            $anpp_vote = DB::table('ballot_papers')->where('party', 'ANPP')->count();
            $acn_vote = DB::table('ballot_papers')->where('party', 'ACN')->count();
            $total_votes = DB::table('ballot_papers')->count();

            $reg_voters = DB::table('users')->where('reg_status', '1')->count();
            // $unreg_voters = db::table('users')->where('reg_status', '0')->count();
            // dd($total_votes);

            return view('admin.index', compact('pdp_vote', 'apc_vote', 'anpp_vote', 'acn_vote', 'reg_voters', 'total_votes'));
        }else{
            $total_votes = DB::table('ballot_papers')->count();
            $reg_voters = DB::table('users')->where('reg_status', '1')->count();
            return view('admin.voters.index', compact('reg_voters', 'total_votes'));
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
    public function edit($id)
    {
        //
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
