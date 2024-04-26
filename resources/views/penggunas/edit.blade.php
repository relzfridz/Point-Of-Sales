@extends('layouts.template')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Pengguna</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('penggunas.index') }}"> Back</a>
        </div>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div>
    <form action="{{ route('penggunas.update', $pengguna->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Petugas:</strong>
                <input type="text" name="nama_pet" value="{{ $pengguna->nama_pet }}" class="form-control" placeholder="Nama Petugas">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
                <strong>Username:</strong>
                <input type="text" name="username" value="{{ $pengguna->username }}" class="form-control" placeholder="Username">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="number" min="0" name="password" value="{{ $pengguna->password }}" class="form-control" placeholder="Password">
            </div>
        </div>
        <div>
            <div>
                <select class="form-control" id="role" name="role"  required="nama_pet">
                    <option value="--Pilih Role anda--" selected disabled>--Pilih Role Petugas--</option>
                    <option value="Admin">Admin</option>
                    <option value="Kasir">Kasir</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    </form>
@endsection
