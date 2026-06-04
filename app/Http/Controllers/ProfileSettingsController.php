<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProfilePelamar;
use App\Models\User;

class ProfileSettingsController extends Controller
{
    public function edit(){
        $user=Auth::user();
        $profile=ProfilePelamar::where('user_id',$user->id)->first();
        return view('profile_settings.edit',compact('user','profile'));
    }

    public function update(Request $request){
        $user=User::find(Auth::id());

        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:50|unique:users,email,'.$user->id,
            'no_hp'=>'required|digits_between:10,15',
            'tempat_lahir'=>'required|string',
            'tgl_lahir'=>'required|date|before:'.date('Y-m-d',strtotime('-17 years')),
            'gender'=>'nullable',
            'foto_diri'=>'nullable|image|max:2048',
        ]);

        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();

        $profile=ProfilePelamar::where('user_id',$user->id)->first();

        $data=[
            'no_hp'=>$request->no_hp,
            'tempat_lahir'=>$request->tempat_lahir,
            'tgl_lahir'=>$request->tgl_lahir,
        ];

        if($request->hasFile('foto_diri')){
            $data['foto_diri']=$request->file('foto_diri')->store('foto_diri','public');
        }
        
        if(!$profile?->nik && $request->nik){
            $data['nik']=$request->nik;
        }

        if ($profile) {
            $profile->update($data);
        } 
        else {
            $data['user_id']=$user->id;
            ProfilePelamar::create($data);
        }
    
        return redirect()->back()->with('success','Profil berhasil diperbarui');
    }
}
