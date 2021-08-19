<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\RoleUser;
use App\Pelaporan;
use Illuminate\Support\Facades\DB;


class RekapitulasiController extends Controller
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

        return view('user.rekapitulasi.index', compact('user','role_user'));
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
    public function show()
    {   
        $id_user = auth()->user()->id;
        $user = User::find($id_user);
        $role_user = RoleUser::find($id_user);
        $data = DB::table('berita')->select('*')->orderBy('created_at', 'desc')->get();
        return view('user.rekapitulasi.view', compact('user','role_user', 'data'))->with('i');
    }

    public function view($id) 
    {
        $data = Pelaporan::where('id')->get();
        return view('user.rekapitulasi.detail', compact('data'));
    }

    public function detail()
    {   
        $id_user = auth()->user()->id;
        $user = User::find($id_user);
        $role_user = RoleUser::find($id_user);
        return view('user.rekapitulasi.detail', compact('user','role_user'));
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
