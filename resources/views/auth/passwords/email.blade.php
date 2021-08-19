@extends('layouts.app')
@section('content')
<style>
    body {
        background-image:url('{{url('images/background_login.png')}}');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
</style>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mx-4">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-center">
		      	    <img src="https://th.bing.com/th/id/R.fc01acdb2d64724639adcf62631b99f5?rik=Y%2fwbvERSV7zehw&riu=http%3a%2f%2f1.bp.blogspot.com%2f-fcEHnGPGLxY%2fT4LzmVAfA9I%2fAAAAAAAAFkc%2frGPa1UQpM2w%2fs1600%2fLOGO%2bPROVINSI%2bSUMATERA%2bUTARA.png&ehk=951Z2GMlV1bw2i2a7oWGj24bbdu8ghW2Vdyblm%2bCTwo%3d&risl=&pid=ImgRaw&r=0" height="90px" width="80px">
		      	</div>
                <h4 class="text-center mt-3 mb-1" style="color:#133C77">MEMO KOMINFO</h4>
                <p class="text-center" style="color:#133C77">Monitoring dan Evaluasi Media Opini Publik</p>
                <div class="text-left mt-5">
                    <p>Masukkan email yang ditautkan ke akun anda.</p>
                </div>
                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email') }}">

                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary px-4">
                                Kirim
                            </button>
                        </div>
                        <div class="col-6 text-right">
                                <a class="btn btn-link px-0" href="{{ route('login') }}">
                                    Login disini!
                                </a><br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection