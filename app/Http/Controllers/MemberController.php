<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Dashboard.members.index', [
            'members' => Member::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {
        //dd($request);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'noTelp' => 'required|max:15',
            'alamat' => 'required|max:255',
            'image' => 'image|file|max:1024',
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('member-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Member::create($validatedData);

        return redirect('dashboard/members')->with('success', 'New member has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        return view('Dashboard.members.show', [
            'member' => $member
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('Dashboard.members.edit', [
            'member' => $member
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {        
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'noTelp' => 'required|max:15',
            'alamat' => 'required|max:255',
            'image' => 'image|file|max:1024',
        ]);
        
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('member-images');
        }

        if($member->user_id !== auth()->user()->id) abort(403);

        $validatedData['user_id'] = auth()->user()->id;

        Member::where('id', $member->id)
            ->update($validatedData);

        return redirect('dashboard/members')->with('success', 'Member has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        if($member->image){
            Storage::delete($member->image);
        }
        $member->sampahs()->detach();
        member::destroy($member->id);
        return redirect('dashboard/members')->with('success', 'Member has been deleted!');
    }
}
