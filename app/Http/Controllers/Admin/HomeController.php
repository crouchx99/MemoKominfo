<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\RoleUser;

class HomeController
{
    public function index()
    {
        $id_user = auth()->user()->id;
        $user = User::find($id_user);
        $role_user = RoleUser::find($id_user);


     
        $url = "http://newsapi.org/v2/top-headlines?country=id&sortBy=publishedAt&apiKey=1bc17eb57ac9417eafe4ba36eee8620d";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($response);
        $firstImage = $result->articles[0]->urlToImage;
        $secondImage = $result->articles[1]->urlToImage;
        $thirdImage = $result->articles[2]->urlToImage;
        $firstUrl = $result->articles[0]->url;
        $secondUrl= $result->articles[1]->url;
        $thirdUrl = $result->articles[2]->url;
        $firstTitle = $result->articles[0]->title;
        $secondTitle= $result->articles[1]->title;
        $thirdTitle = $result->articles[2]->title;

        return view('home', compact('firstImage','secondImage','thirdImage','firstUrl','secondUrl','thirdUrl','firstTitle','secondTitle','thirdTitle','user','role_user'));

        // return view('home',[
        //     'firstImage'=> $firstImage ,
        //     'secondImage'=> $secondImage,
        //     'thirdImage'=> $thirdImage,
        //     'firstUrl'=> $firstUrl,
        //     'secondUrl'=> $secondUrl,
        //     'thirdUrl'=> $thirdUrl,
        //     'firstTitle'=> $firstTitle,
        //     'secondTitle'=> $secondTitle,
        //     'thirdTitle'=> $thirdTitle,
        //      'id_user'=> $id_user,
        //      'user'=> $user
        // ]);

    }
}
