<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class ChangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $id_user = auth()->user()->id;
        // $user = User::find($id_user);


        return view('auth.change');
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
        $validate_oldpass = ['nullable', 'string'];
        if($request->has('password') && !empty($request->password)){
            $validate_oldpass = ['required', 'string'];
        }
        $request->validate([
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
            'old_password' => $validate_oldpass,
        ]);

        $email = $request->email;
        $user = User::where('email', $email)->first();

        if($request->has('password') && !empty($request->password)){
            if(!(\Hash::check($request->old_password, $user->password))){
                return redirect()->route('login')->with([
                    'status' => 'danger',
                    'message_icon' => 'times',
                    'message' => 'Failed to change password. Old password did not match'
                ]);
            } else {
                $user->password = \Hash::make($request->password);
            }
        }

        $user->save();

        return redirect()->route('login')->with([
            'status'=>'success',
            'message'=>'Berhasil merubah profil'
        ]);
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

        if($request->has('password') && !empty($request->password)){
            if(!(\Hash::check($request->old_password, $user->password))){
                return redirect()->route('adm.login')->with([
                    'status' => 'danger',
                    'message_icon' => 'times',
                    'message' => 'Failed to change password. Old password did not match'
                ]);
            } else {
                $user->password = \Hash::make($request->password);
            }
        }

        $user->save();

        return redirect()->route('/login')->with([
            'status'=>'success',
            'message'=>'Berhasil merubah password'
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