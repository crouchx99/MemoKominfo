<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\RoleUser;
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
        
        $harian = $this->harian();
        $harian_positif = $harian[0];
        $harian_negatif = $harian[1];

        $mingguan = $this->mingguan();
        $mingguan_positif = $mingguan[0];
        $mingguan_negatif = $mingguan[1];

        $bulanan = $this->bulanan();
        $bulanan_positif = $bulanan[0];
        $bulanan_negatif = $bulanan[1];

        return view('user.rekapitulasi.index', compact('user','role_user', 'harian_positif', 'harian_negatif', 'mingguan_positif', 'mingguan_negatif', 'bulanan_positif', 'bulanan_negatif'));
    }

    public function harian(){
        $berita_positif = DB::select("select HOUR(updated_at) as 'hour', count(updated_at) as 'jumlah' from berita where jenis_berita = 'option1'group by hour");
        $berita_negatif = DB::select("select HOUR(updated_at) as 'hour', count(updated_at) as 'jumlah' from berita where jenis_berita = 'option2'group by hour");
        
        
        $i = 0;
        $hours = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24];
        $positif = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
        $negatif = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($hours as $jam){
            foreach($berita_positif as $data){
                if($jam == $data->hour){
                        $positif[$i] = $data->jumlah;
                }  
            }
            foreach($berita_negatif as $data){
                if($jam == $data->hour){
                        $negatif[$i] = $data->jumlah;
                }  
            }

            $i++;
        }

        return array($positif, $negatif);
    }

    public function mingguan(){

        $berita_positif = DB::select("select DAYNAME(updated_at) as 'day', count(updated_at) as 'jumlah' from berita where jenis_berita = 'option1'group by day");
        $berita_negatif = DB::select("select DAYNAME(updated_at) as 'day', count(updated_at) as 'jumlah' from berita where jenis_berita = 'option2'group by day");
        
        $i = 0;
        $dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        $positif = array(0,0,0,0,0,0,0);
        $negatif = array(0,0,0,0,0,0,0);
        foreach($dayNames as $hari){
            foreach($berita_positif as $data){
                if($hari == $data->day){
                        $positif[$i] = $data->jumlah;
                }  
            }
            $i++;
        }

        $i =0;
        foreach($dayNames as $hari){
            foreach($berita_negatif as $data){
                if($hari == $data->day){
                        $negatif[$i] = $data->jumlah;
                }  

            }  
            $i++;
        }
        return array($positif, $negatif);
    }

    public function bulanan(){
        $berita_positif = DB::select("select MONTH(updated_at) as 'month', count(updated_at) as 'jumlah' from berita where jenis_berita = 'option1'group by month");
        $berita_negatif = DB::select("select MONTH(updated_at) as 'month', count(updated_at) as 'jumlah' from berita where jenis_berita = 'option2'group by month");
        
        $i = 0;
        $namaBulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        $positif = array(0,0,0,0,0,0,0,0,0,0,0,0);
        $negatif = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($namaBulan as $bulan){
            foreach($berita_positif as $data){
                if($bulan == $data->month){
                        $positif[$i] = $data->jumlah;
                }  
            }
            $i++;
        }

        $i =0;
        foreach($namaBulan as $bulan){
            foreach($berita_negatif as $data){
                if($bulan == $data->month){
                        $negatif[$i] = $data->jumlah;
                }  

            }  
            $i++;
        }
        return array($positif, $negatif);
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
        return view('user.rekapitulasi.view', compact('user','role_user'));
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
