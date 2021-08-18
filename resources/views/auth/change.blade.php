@extends('layouts.app')
@section('content')
<style>
body {
  background-image: url('images/background_login.png');
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
		      	    <img src="images/Logo_sumut2.png" height="90px" width="70px">
		      	</div>
                <h4 class="text-center mb-1">MEMO KOMINFO</h4>
                <p class="text-center mb-3">Monitoring dan Evaluasi Media Opini Publik</p>

                <div class="col-12">         
            <form class="card-body" action="{{route('change')}}" method="POST">
                        @csrf
                        <div class="form">
                            <label class="col-form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="">
                        </div>
                        <!-- <div class="form">
                            <label class="col-form-label">Kata Sandi Lama </label>
                                <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="input-old_password" name="old_password" value="">
                                @error('old_password')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror    
                        </div> -->
                        <div class="form">
                            <label class="col-form-label @error('password') is-invalid @enderror">Kata Sandi Baru</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="input-password" name="password" value="">
                                @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Konfirmasi Kata Sandi </label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="input-password_confirmation" name="password_confirmation" value="">
                                @error('password_confirmation')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input class="btn btn-primary pull-right" type="submit" value="Simpan">

                                <a class="btn btn-link" href="{{ route('login') }}">
                                        Sudah punya akun? Login
                                </a>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection