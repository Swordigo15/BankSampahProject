<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Sampah;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('input', [
            "title" => "INPUT SAMPAH",
            'active'=> 'input',
            'members'=> Member::all(),
            'sampahs'=> Sampah::all(),
            'hasMember' => false,
        ]);
    }

    public function add(Request $request){
        // dd($request);
        $validatedData = $request->validate([
            'member' => 'required',
            'jenisSampah' => 'required',
            'jumlah' => 'required',
        ]);
        
        $memberId = $validatedData['member'];
        $sampahId = $validatedData['jenisSampah'];
        $jumlah = $validatedData['jumlah'];

        $member = Member::find($memberId);

        // $jumlah = $member->sampahs()->where('id', $request->jenisSampah)->get()->jumlah;
        // if($jumlah) $jumlah += $request->jumlah;

        $existingPivot = $member->sampahs()->where('sampah_id', $sampahId)->first();

        if($existingPivot){
            $oldJumlah = $member->sampahs->find($sampahId)->pivot->jumlah;
            $newJumlah =  $oldJumlah + $jumlah;
            $member->sampahs()->updateExistingPivot($sampahId, array('jumlah' => $newJumlah));
        }else{
            $member->sampahs()->attach($sampahId, ['jumlah' => $jumlah]);
        }

        return redirect('/input');
    }

    public function remove(Member $member, Sampah $id){
        // dd($member);
        $member = Member::find($member->id);
        $member->sampahs()->detach($id);
        return redirect('/input');
    }
}
