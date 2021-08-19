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
        $data = Pelaporan::where('id', $id)->get();
        return view('user.rekapitulasi.edit', compact('data'));
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
            'judul' => 'required',
            'kategori_berita' => 'required',
            'isi_berita' => 'required',
            'media' => 'required',
            'inlineRadioOptions' => 'required',
            'saran' => 'required',
            'upload_gambar' => 'image|nullable|max:10000'

        ]);

        if($request->hasFile('upload_gambar')){
            // $filenameWithExt = $request->file('upload_gambar')->getClientOriginalName();
            // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // $extension = $request->file('upload_gambar')->getClientOriginalExtension();
            // $filenameSimpan = $filename.'_'.time().'.'.$extension;
            // $path = $request->file('upload_gambar')->storeAs('images/', $filenameSimpan);
            $path_file = 'images/';
            $store_file = date('YmdHis') . "." . $request->upload_gambar->getClientOriginalExtension();
            $request->upload_gambar->move($path_file, $store_file);
        }else{
            return $request;
        }

        DB::table('berita')
            ->where('id',$id)
            ->update([
                'judul_berita' => $request['judul'],
                'kategori_berita' => $request['kategori_berita'],
                'isi_berita' => $request['isi_berita'],
                'media' => $request['media'],
                'jenis_berita' => $request['inlineRadioOptions'],
                'saran' => $request['saran'],
                'upload_gambar' => $store_file, 
                'user_id' => Auth::id()
            ]);
        return redirect()->route('user.pelaporan.index')->with([
            'status'=>'success',
            'message'=>'Berhasil membuat laporan'
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
