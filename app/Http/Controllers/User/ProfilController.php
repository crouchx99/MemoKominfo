<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\RoleUser;


class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = auth()->user()->id;
        $user = User::find($id_user);
        $role_user = RoleUser::find($id_user);

        return view('user.profil.index', compact('user','role_user'));
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
    public function edit()
    {
        $id_user = auth()->user()->id;
        $user = User::find($id_user);
        $role_user = RoleUser::find($id_user);

      
        
        

        return view('user.profil.edit', compact('user','role_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_user)
    {
        $validate_oldpass = ['nullable', 'string'];
        if($request->has('password') && !empty($request->password)){
            $validate_oldpass = ['required', 'string'];
        }
        $request->validate([
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
            'old_password' => $validate_oldpass,
        ]);


        $id_user = auth()->user()->id;
        $user = User::findOrFail($id_user);

        $user->name = $request->username;

        if($request->has('password') && !empty($request->password)){
            if(!(\Hash::check($request->old_password, $user->password))){
                return redirect()->route('adm.profile.index')->with([
                    'status' => 'danger',
                    'message_icon' => 'times',
                    'message' => 'Failed to change password. Old password did not match'
                ]);
            } else {
                $user->password = \Hash::make($request->password);
            }
        }

        $user->save();
       
        // if ($request->hasFile('image')) {
        //     $image           = $request->file('image');
        //     $image_extension = $image->getClientOriginalExtension();
        //     $image_name      = $users->id . "-" . time() . "." . $image_extension;
        //     $image_folder    = '/images/photo_profile/';
        //     $image_location  = $image_folder . $image_name;

        //     try {
        //         $image->move(public_path($image_folder), $image_name);

        //         $maintenance::whereId($maintenance->id)->update([
        //             'image' => $image_location
        //         ]);
        //     } catch (\Exception $e) {
        //         return back()->with([
        //             'status'  => 'danger',
        //             'message' => 'Gagal Upload Foto'
        //         ]);
        //     }
        // }

        return redirect()->route('user.profil.index')->with([
            'status'=>'success',
            'message'=>'Berhasil mengubah profil'
        ]);
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
