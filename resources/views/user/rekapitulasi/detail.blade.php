@extends('layouts.admin')
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h5 class="card-title">Data Berita</h5>
               </div>
            </div>
            <div class="card-body">

               <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center">         
                            <table border="1" class="table table-striped">
                                <tr>
                                    <td class="font-weight-bold" style="width: 30%">Judul Berita</td>
                                    <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium quis cumque eos sint sapiente aspernatur eum explicabo eius nesciunt ipsam perspiciatis ipsum quas nisi iste omnis reprehenderit, ratione consequatur aliquid!</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Kategori Berita</td>
                                    <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga, maxime?</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Isi Berita</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum ducimus placeat obcaecati, explicabo, voluptatum veniam nihil delectus iusto laborum illum, quibusdam quam amet libero fugiat distinctio aliquid et. Unde omnis aliquam debitis dicta deserunt possimus aspernatur officia recusandae cupiditate dolorem molestiae veritatis explicabo illum iusto quam, eius eveniet sint voluptatibus!</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Media</td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Jenis Berita</td>
                                    <td>Lorem, ipsum dolor.</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Saran</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, beatae! In, repudiandae! Quidem consectetur maxime, alias at odio incidunt ad?</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Gambar</td>
                                    <td><img src="{{asset('images/logo_sumut.png')}}" alt="Gambar" width="50px" height="50px"></td>
                                </tr>

                            </table>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
    @parent
@endsection