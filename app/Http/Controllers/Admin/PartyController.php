<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Party;
use Image;

class PartyController extends Controller
{
	public function index()
	{
		$data = Party::all();
		$page_name = 'Registered Parties';
		return view('admin.party.list', compact('page_name', 'data'));
	}

    public function create()
    {
    	$page_name = 'Create Party';
    	return view('admin.party.create', compact('page_name'));
    }

     public function store(request $request)
    {

    	$this->validate($request, [
            'party' => 'required',
            'party_name' => 'required',
            'logo' => 'required',
        ]);

        $party = new Party;

        $party->party = $request->party;
        $party->party_name = $request->party_name;
        $party->logo = '';

        $file = $request->file('logo');
        $file_name = time(). '.' .$file->getClientOriginalExtension();

        $img_path = 'party_logo/'. $file_name;

        Image::make($file)->resize(75,75)->save($img_path);

        $party->logo = $file_name;

        $party->save();
        return redirect('/party/create')->with('success', 'Party Successfully Created');

    }

    public function edit($id)
    {
    	$page_name = 'Edit Party';
    	$party = Party::find($id);
    	return view('admin.party.edit', compact('page_name', 'party'));
    }

    public function update(request $request, $id)
    {
    	$this->validate($request, [
            'party' => 'required',
            'party_name' => 'required',
            'logo' => 'required',
        ]);

        $party = Party::find($id);

        if($request->file('logo')){
            unlink('party_logo/'. $party->logo);
            $file = $request->file('logo');
            $file_name = time(). '.' .$file->getClientOriginalExtension();
            $img_path = 'party_logo/'. $file_name
            Image::make($file)->resize(75,75)->save(public_path($img_path));

            $party->logo = $file_name;
        }

        $party->party = $request->party;
        $party->party_name = $request->party_name;
        $party->save();

        return redirect('/party/list')->with('success', 'Party Successfully Created');
    }

    public function destroy($id)
    {
    	$party = Party::find($id);
    	$party->delete();
    	return redirect('/party/list')->with('success', 'Party Successfully Deleted');
    }
}
