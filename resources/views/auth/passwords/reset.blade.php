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
                <div class="text-center mt-5">
                    <p>Masukkan Kata Sandi Baru Anda</p>
                </div>
                <form method="POST" action="{{ route('password.request') }}">
                    @csrf

                    <input name="token" value="{{ $token }}" type="hidden">

                    <div class="form-group">
                        <input id="email" type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ $email ?? old('email') }}">

                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" name="password" class="form-control" required placeholder="Kata Sandi Baru">

                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="password-confirm" type="password" name="password_confirmation" class="form-control" required placeholder="Konfirmasi Kata Sandi Baru">
                    </div>

                    <div class="row">
                        <button type="submit" class="btn btn-primary ml-3">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection