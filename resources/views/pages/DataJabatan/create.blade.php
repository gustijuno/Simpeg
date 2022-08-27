@extends('layout.master')
@section('statusjabatan','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Jabatan</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="{{route('dashboard')}}">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('Jabatan.index')}}">Jabatan</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('Jabatan.create')}}">Tambah Jabatan</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Data Jabatan</div>
                </div>
                <form method="POST" action="{{ route('Jabatan.store') }}" id="myForm">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 col-lg-5">
                                <div class="form-group">
                                    <label for="kode_jabatan">Kode Jabatan</label>
                                    <input name="kode_jabatan" type="text" class="form-control form-control" id="kode_jabatan">
                                </div>
                            </div>
                            <div class="col-md-5 col-lg-5">
                                <div class="form-group">
                                    <label for="nama_jabatan">Nama Jabatan</label>
                                    <input name="nama_jabatan" type="text" class="form-control form-control" id="nama_jabatan">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control form-control" id="status">
                                        <option value="">---Pilih---</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Nonaktif">Nonaktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="btn btn-danger" href="{{route('Jabatan.index')}}">Batal</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection