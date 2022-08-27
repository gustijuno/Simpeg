@extends('layout.master')
@section('statuskaryawan','active')
@section('statusdatakaryawan','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Karyawan</h4>
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
                <a href="{{route('Karyawan.index')}}">Karyawan</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                @foreach($k as $karyawan)
                <a href="{{route('Karyawan.show', $karyawan->id)}}">Detail</a>
                @endforeach
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Detail Karyawan</div>
                </div>
                <div class="card-body">
                    <div class="row col-md-12">
                        <ul class="nav nav-pills nav-primary nav-pills-icons col-lg-12" id="pills-tab-with-icon" role="tablist">
                            <li class="nav-item col-md-4">
                                <a class="nav-link active text-center" id="pills-home-tab-icon" data-toggle="pill" href="#data-karyawan" role="tab" aria-controls="data-karyawan" aria-selected="true">
                                    <i class="flaticon-home"></i>
                                    Data Pribadi Karyawan
                                </a>
                            </li>
                            <li class="nav-item col-md-4 text-center">
                                <a class="nav-link" id="pills-profile-tab-icon" data-toggle="pill" href="#data-kontrak-karyawan" role="tab" aria-controls="data-kontrak-karyawan" aria-selected="false">
                                    <i class="flaticon-user-4"></i>
                                    Data Kontrak Karyawan
                                </a>
                            </li>
                            <li class="nav-item col-md-4 text-center">
                                <a class="nav-link" id="pills-contact-tab-icon" data-toggle="pill" href="#data-kelengkapan-karyawan" role="tab" aria-controls="data-kelengkapan-karyawan" aria-selected="false">
                                    <i class="flaticon-pen"></i>
                                    Data Kelengkapan Karyawan
                                </a>
                            </li>
                        </ul>
                    </div>
                    @foreach($k as $karyawan)
                    <div class="tab-content mt-2 mb-3" id="pills-with-icon-tabContent">
                        <div class="tab-pane fade show active" id="data-karyawan" role="tabpanel" aria-labelledby="pills-home-tab-icon">
                            <div class="row">
                                <!-- Foto -->
                                <div class="col-3">
                                    <div class="card">
                                        <div class="card-header" style="font-weight: bold;">Foto Pribadi</div>
                                        <div class="card-body bg-grey1">
                                            @if(empty($karyawan->foto_pegawai) && $karyawan->jenis_kelamin == 'Laki-Laki')
                                            <img src="{{ asset('img/avatar.png')}}" alt="Foto Pribadi" class="avatar-img img-responsive rounded">
                                            @elseif(empty($karyawan->foto_pegawai) && $karyawan->jenis_kelamin == 'Perempuan')
                                            <img src="{{ asset('img/avatar2.png')}}" alt="Foto Pribadi" class="avatar-img img-responsive rounded">
                                            @elseif(!empty($karyawan->foto_pegawai))
                                            <img src="{{ Storage::url($karyawan->foto_pegawai)}}" alt="image profile" class="avatar-img img-responsive rounded">
                                            @else
                                            <h4>Belum ada Foto</h4>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="form-group form-inline">
                                        <label for="nip" class="col-md-4 col-form-label">NIP</label>
                                        <div class="col-md-8 p-0">
                                            <input type="number" value="{{$karyawan->nip}}" class="form-control input-full" id="nip" style="background-color:#E5EBFF;color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="nama" class="col-md-4 col-form-label">Nama
                                            Lengkap</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->nama}}" class="form-control input-full" id="nama" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Tipe
                                            Pegawai</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->tipepegawai['nama_tipe_pegawai']}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;
																color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Asal
                                            Kepegawaian</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->asal_kepegawaian}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;
																color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Jenis
                                            kelamin</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->jenis_kelamin}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;
																color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Pendidikan Terakhir</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->pendidikan_terakhir}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;
																color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Pendidikan T/NT</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->pendidikan_tnt}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Jurusan
                                            Pendidikan</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->jurusan_pendidikan}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Sekolah
                                            / Universtas</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->sekolah_universitas}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Pendidikan Diakui</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->pendidikan_diakui}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Tempat
                                            Lahir</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->tempat_lahir}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Tanggal
                                            Lahir</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->tanggal_lahir}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Umur</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->umur}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Agama</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->agama}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Status
                                            Hubungan Dalam Keluarga</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->status_hubungan_dalam_keluarga}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Nama
                                            Ayah</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->nama_ayah}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Nama
                                            Ibu</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->nama_ibu}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Alamat
                                            KTP</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->alamat_ktp}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Alamat
                                            Domisili</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->alamat_domisili}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Kota
                                            Asal</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->kota_asal}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">No.KTP</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->no_ktp}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Kewarganegaraan</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->kewarganegaraan}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">No.KITAP</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->no_kitap}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="data-kontrak-karyawan" role="tabpanel" aria-labelledby="pills-profile-tab-icon">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Kontrak 1</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="@if(!empty($karyawan->kontrak->kontrak_1)) {{\Carbon\Carbon::parse($karyawan->kontrak->kontrak_1)->format('d-m-Y')}} @endif" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Selesai Kontrak 1</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="@if(!empty($karyawan->kontrak->selesai_kontrak_1)) {{\Carbon\Carbon::parse($karyawan->kontrak->selesai_kontrak_1)->format('d-m-Y')}} @endif" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Kontrak
                                            2
                                        </label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="@if(!empty($karyawan->kontrak->kontrak_2)) {{\Carbon\Carbon::parse($karyawan->kontrak->kontrak_2)->format('d-m-Y')}} @endif" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Selesai
                                            Kontrak 2</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="@if(!empty($karyawan->kontrak->selesai_kontrak_2)) {{\Carbon\Carbon::parse($karyawan->kontrak->selesai_kontrak_2)->format('d-m-Y')}} @endif" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Kontrak
                                            3</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="@if(!empty($karyawan->kontrak->kontrak_3)) {{\Carbon\Carbon::parse($karyawan->kontrak->kontrak_3)->format('d-m-Y')}} @endif" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Selesai
                                            Kontrak 3</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="@if(!empty($karyawan->kontrak->selesai_kontrak_3)) {{\Carbon\Carbon::parse($karyawan->kontrak->selesai_kontrak_3)->format('d-m-Y')}} @endif" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Kontrak
                                            4</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="@if(!empty($karyawan->kontrak->kontrak_4)) {{\Carbon\Carbon::parse($karyawan->kontrak->kontrak_4)->format('d-m-Y')}} @endif" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Selesai
                                            Kontrak 4</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="@if(!empty($karyawan->kontrak->selesai_kontrak_4)) {{\Carbon\Carbon::parse($karyawan->kontrak->selesai_kontrak_4)->format('d-m-Y')}} @endif" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Kontrak
                                            5</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="@if(!empty($karyawan->kontrak->kontrak_5)) {{\Carbon\Carbon::parse($karyawan->kontrak->kontrak_5)->format('d-m-Y')}} @endif" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Selesai
                                            Kontrak 5</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="@if(!empty($karyawan->kontrak->selesai_kontrak_5)) {{\Carbon\Carbon::parse($karyawan->kontrak->selesai_kontrak_5)->format('d-m-Y')}} @endif" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Kontrak
                                            6</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="@if(!empty($karyawan->kontrak->kontrak_6)) {{\Carbon\Carbon::parse($karyawan->kontrak->kontrak_6)->format('d-m-Y')}} @endif" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Selesai
                                            Kontrak 6</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="@if(!empty($karyawan->kontrak->selesai_kontrak_6)) {{\Carbon\Carbon::parse($karyawan->kontrak->selesai_kontrak_6)->format('d-m-Y')}} @endif" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Kontrak
                                            7</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="@if(!empty($karyawan->kontrak->kontrak_7)) {{\Carbon\Carbon::parse($karyawan->kontrak->kontrak_7)->format('d-m-Y')}} @endif" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Selesai
                                            Kontrak 7</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="@if(!empty($karyawan->kontrak->selesai_kontrak_7)) {{\Carbon\Carbon::parse($karyawan->kontrak->selesai_kontrak_7)->format('d-m-Y')}} @endif" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Masa
                                            Kerja</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->masa_kerja}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="data-kelengkapan-karyawan" role="tabpanel" aria-labelledby="pills-contact-tab-icon">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">No.
                                            BPJS Kesehatan</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->no_bpjs_kesehatan}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">No.
                                            BPJS Ketenagakerjaan</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->no_bpjs_ketenagakerjaan}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">No.
                                            Passport</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->no_passport}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Nama
                                            Bank</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->nama_bank}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">No.
                                            Rekening Gaji</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->no_rekening_gaji}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">No.
                                            Rekening PPIP</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->no_rekening_ppip}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">NPWP</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->npwp}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">No.
                                            Handphone</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->no_handphone}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Email</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->email}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Jabatan</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->jabatan->nama_jabatan}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Unit
                                            Kerja</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->unit_kerja}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Departemen</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->departemen}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Divisi</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$karyawan->division}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="card-action">
                    <a class="btn btn-danger" href="{{route('Karyawan.index')}}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection