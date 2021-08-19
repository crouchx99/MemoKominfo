@extends('layouts.admin')
@section('content')
<style>
    body {
        height: 100%;
        background-image:url({{url('images/background_login.png')}});
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }

    .table .thead-blue th {
        color: #FEFAFA;
        background-color: #133C77;
        border-color: #dee2e6;
    }
</style>

<div class="card">
    <div class="card-header">
        View Pengguna
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.users.index') }}">
                    Kembali
                </a>
            </div>
            <table class="table table-bordered table-striped mt-3">
                <tbody>
                    <tr>
                        <th>
                            Nama
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Email
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Dibuat Pada
                        </th>
                        <td>
                            {{ $user->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.users.index') }}">
                    Kembali
                </a>
            </div> -->
        </div>
    </div>
</div>



@endsection