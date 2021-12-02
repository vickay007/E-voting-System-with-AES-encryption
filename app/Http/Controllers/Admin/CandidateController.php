<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Party;
use Image;
use DB;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = 'Candidate list';

        $result = DB::table('candidates')->select('call_result')->value('call_result');
        // $data = Candidate::all();
        $data = Candidate::with(['party'])->get();

        return view('admin.candidate.list', compact('page_name', 'data', 'result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = 'Create Candidate';

        $party = Party::pluck('party', 'id');

        return view('admin.candidate.create', compact('page_name', 'party'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'party' => 'required',
        ]);

        $candidate = new Candidate;
        $candidate->name = $request->name;
        $candidate->party_name = $request->party_name;
        $candidate->is_active = 0;
        $candidate->image = '';


        $file = $request->file('image');
        $file_name = time(). '.' .$file->getClientOriginalExtension();
        // $file->move('candidate_img/', $file_name);

        $img_path = 'candidate_img/'. $file_name;

        Image::make($file)->resize(75,75)->save($img_path);

        foreach($request->party as $value){
            $candidate->party_id = $value;
            if ($value == 1) {
                $candidate->party = 'PDP';
            }elseif($value == 2){
                $candidate->party = 'ANPP';
            }elseif($value == 3){
                $candidate->party = 'ACN';
            }elseif($value == 4){
                $candidate->party = 'APC';
            }

        }

        $candidate->image = $file_name;
        $candidate->save();

        return redirect('/candidate')->with('success', 'Candidate successfully created');
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
        $page_name = 'Edit Candidate';
        $candidate = Candidate::find($id);
        return view('admin.candidate.edit', compact('page_name', 'candidate'));
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
            'party' => 'required',
        ]);

        $candidate = Candidate::find($id);

        if($request->file('image')){
            unlink('candidate_img/'. $candidate->image);
            $file = $request->file('image');
            $file_name = time(). '.' .$file->getClientOriginalExtension();
            $img_path = 'candidate_img/'. $file_name;
            Image::make($file)->resize(122,122)->save($img_path);

            $candidate->image = $file_name;
        }

        $candidate->name = $request->name;
        $candidate->party = $request->party;
        $candidate->is_active = 0;

        $candidate->save();

        return redirect('/candidate/list')->with('success', 'Candidate Information successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidate = Candidate::find($id);
        $candidate->delete();
        return redirect('/candidate/list')->with('success', 'Candidate Deleted Successfully');
    }


    public function view($id)
    {
        $page_name = 'Voters';

        $candidate = Candidate::find($id);

        if($candidate->party == 'PDP'){

            $results = DB::table('candidates')
                ->join('ballot_papers', 'ballot_papers.party', '=', 'candidates.party')
                ->join('users', 'users.electoral_id', '=', 'ballot_papers.electoral_id')
                ->select('users.name', 'users.electoral_id', 'candidates.party')
                ->where('candidates.party', 'pdp')
                ->get(); 
                // dd($result);

                return view('admin.candidate.view', compact('page_name', 'results'));
        }elseif($candidate->party == 'APC'){
            $results = DB::table('candidates')
                ->join('ballot_papers', 'ballot_papers.party', '=', 'candidates.party')
                ->join('users', 'users.electoral_id', '=', 'ballot_papers.electoral_id')
                ->select('users.name', 'users.electoral_id', 'candidates.party')
                ->where('candidates.party', 'APC')
                ->get(); 

                return view('admin.candidate.view', compact('page_name', 'results'));
        }elseif($candidate->party == 'ACN'){
            $results = DB::table('candidates')
                ->join('ballot_papers', 'ballot_papers.party', '=', 'candidates.party')
                ->join('users', 'users.electoral_id', '=', 'ballot_papers.electoral_id')
                ->select('users.name', 'users.electoral_id', 'candidates.party')
                ->where('candidates.party', 'ACN')
                ->get(); 

                return view('admin.candidate.view', compact('page_name', 'results'));
        }elseif($candidate->party == 'ANPP'){
            $results = DB::table('candidates')
                ->join('ballot_papers', 'ballot_papers.party', '=', 'candidates.party')
                ->join('users', 'users.electoral_id', '=', 'ballot_papers.electoral_id')
                ->select('users.name', 'users.electoral_id', 'candidates.party')
                ->where('candidates.party', 'ANPP')
                ->get(); 

                return view('admin.candidate.view', compact('page_name', 'results'));
        }
        
    }

    public function result()
    {
        $result = DB::table('candidates')->select('call_result')->value('call_result');
        // dd($result);
        if($result == 0){
            DB::table('candidates')->select('call_result')->update(['call_result' => 1]);
        }else{
            DB::table('candidates')->select('call_result')->update(['call_result' => 0]);
        }
        return redirect('/candidate/list');
    }
}
