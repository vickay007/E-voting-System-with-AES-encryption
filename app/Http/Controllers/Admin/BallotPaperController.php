<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BallotPaper;
use App\Models\Party;
use App\Models\Candidate;
use Auth;
use Image;
use DB;

class BallotPaperController extends Controller
{
	public function index()
	{
		$data = Party::all();
		$page_name = 'VOTING';
		return view('admin.ballot_paper.list', compact('page_name', 'data'));
	}

	public function vote(Request $request)
	{
		$this->validate($request, [
            'vote_btn' => 'required',
        ]);

		$page_name = 'VOTING';

		$id = $request->vote_btn;

		$electoral_id = DB::table('ballot_papers')->select('electoral_id')->where('electoral_id', Auth::user()->electoral_id)->first();

		$call_result = DB::table('candidates')->value('call_result');

		// $candidate = DB::table('candidates')->where('party_id', $id)->value('push_result');

		// $inc = ++$candidate;

		// dd($inc);

		if($electoral_id == null){

			$data = Party::find($id);

			$vote = new BallotPaper;
			$vote->party = $data->party;
			$vote->party_name = $data->party_name;
			$vote->logo = $data->logo;
			$vote->electoral_id = Auth::user()->electoral_id;
			$vote->save();

			$vote = DB::table('ballot_papers')->where('party', $data->party)->count();

			Candidate::where('party_id', $id)->update(['push_result' => $vote]);
			return redirect('/ballot/list')->with('success', 'Your Vote Has been Recorded');
			
		}elseif($call_result == 1){

			return redirect('/ballot/list')->with('error', 'Voting process is closed');
		}
		else{

			return redirect('/ballot/list')->with('error', 'You cannot vote twice');
		}
	}

	public function view_result()
	{
		$page_name = 'View Result';

		$count_party = DB::table('ballot_papers')
             ->select('party', DB::raw('count(*) as count'))
             ->groupBy('party')->orderBy('count', 'DESC')
             ->get();
		
		$winner = $count_party[0]->party;

		// $maxValue = Cliente::orderBy('id', 'desc')->value('id');

		$pdp_vote = DB::table('ballot_papers')->where('party', 'PDP')->count();
        $apc_vote = DB::table('ballot_papers')->where('party', 'APC')->count();
        $anpp_vote = DB::table('ballot_papers')->where('party', 'ANPP')->count();
        $acn_vote = DB::table('ballot_papers')->where('party', 'ACN')->count();

        $result = DB::table('candidates')->select('call_result')->value('call_result');

		if($result == 1){
			return view('admin.ballot_paper.result2', compact('page_name', 'pdp_vote', 'apc_vote', 'anpp_vote', 'acn_vote', 'winner'));
		}else{
			return view('admin.ballot_paper.result', compact('page_name'));
		}
		
	}

}
