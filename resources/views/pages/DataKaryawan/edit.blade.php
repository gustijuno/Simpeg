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
                @foreach($p as $pegawai)
                <a href="{{route('Karyawan.edit', $pegawai->id)}}">Edit</a>
                @endforeach
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Data Karyawan</div>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('Karyawan.update', $pegawai->id) }}" id="myForm">
                        @csrf
                        @method('PUT')
                        <div class="row col-md-12">
                            <ul class="nav nav-pills nav-primary nav-pills-icons col-lg-12" id="pills-tab-with-icon" role="tablist">
                                <li class="nav-item col-md-4">
                                    <a class="nav-link active text-center text-bold" id="pills-home-tab-icon" data-toggle="pill" href="#kontrak" role="tab" aria-controls="kontrak" aria-selected="true">
                                        <span class="badge badge-count" style="background-color: white; color:black; font-weight:bold; border: 1px solid black; font-size:medium">1</span>
                                        &nbsp Data Kontrak
                                    </a>
                                </li>
                                <li class="nav-item col-md-4 text-center">
                                    <a class="nav-link" id="pills-profile-tab-icon" data-toggle="pill" href="#data-pribadi" role="tab" aria-controls="data-pribadi" aria-selected="false">
                                        <span class="badge badge-count" style="background-color: white; color:black; font-weight:bold; border: 1px solid black; font-size:medium">2</span>
                                        &nbsp Data Pribadi
                                    </a>
                                </li>
                                <li class="nav-item col-md-4 text-center">
                                    <a class="nav-link" id="pills-contact-tab-icon" data-toggle="pill" href="#data-kelengkapan" role="tab" aria-controls="data-kelengkapan" aria-selected="false">
                                        <span class="badge badge-count" style="background-color: white; color:black; font-weight:bold; border: 1px solid black; font-size:medium">3</span>
                                        &nbsp Data Kelengkapan
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @foreach($p as $pegawai)
                        <div class="tab-content mt-2 mb-3" id="pills-with-icon-tabContent">
                            <div class="tab-pane fade show active" id="kontrak" role="tabpanel" aria-labelledby="pills-home-tab-icon">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="kontrak_1">Kontrak 1</label>
                                            <input name="kontrak_1" type="text" value="@if(!empty($pegawai->kontrak->kontrak_1)){{\Carbon\Carbon::parse($pegawai->kontrak->kontrak_1)->format('d-m-Y')}} @endif" class="form-control date1" id="kontrak_1">
                                        </div>
                                        <div class="form-group">
                                            <label for="kontrak_2">Kontrak 2</label>
                                            <input name="kontrak_2" type="text" value="@if(!empty($pegawai->kontrak->kontrak_2)){{\Carbon\Carbon::parse($pegawai->kontrak->kontrak_2)->format('d-m-Y')}} @endif" class="form-control date2" id="kontrak_2">
                                        </div>
                                        <div class="form-group">
                                            <label for="kontrak_3">Kontrak 3</label>
                                            <input name="kontrak_3" type="text" value="@if(!empty($pegawai->kontrak->kontrak_3)){{\Carbon\Carbon::parse($pegawai->kontrak->kontrak_3)->format('d-m-Y')}} @endif" class="form-control date3" id="kontrak_3">
                                        </div>
                                        <div class="form-group">
                                            <label for="kontrak_4">Kontrak 4</label>
                                            <input name="kontrak_4" type="text" value="@if(!empty($pegawai->kontrak->kontrak_4)){{\Carbon\Carbon::parse($pegawai->kontrak->kontrak_4)->format('d-m-Y')}} @endif" class="form-control date4" id="kontrak_4">
                                        </div>
                                        <div class="form-group">
                                            <label for="kontrak_5">Kontrak 5</label>
                                            <input name="kontrak_5" type="text" value="@if(!empty($pegawai->kontrak->kontrak_5)){{\Carbon\Carbon::parse($pegawai->kontrak->kontrak_5)->format('d-m-Y')}} @endif" class="form-control date5" id="kontrak_5">
                                        </div>
                                        <div class="form-group">
                                            <label for="kontrak_6">Kontrak 6</label>
                                            <input name="kontrak_6" type="text" value="@if(!empty($pegawai->kontrak->kontrak_6)){{\Carbon\Carbon::parse($pegawai->kontrak->kontrak_6)->format('d-m-Y')}} @endif" class="form-control date6" id="kontrak_6">
                                        </div>
                                        <div class="form-group">
                                            <label for="kontrak_7">Kontrak 7</label>
                                            <input name="kontrak_7" type="text" value="@if(!empty($pegawai->kontrak->kontrak_7)){{\Carbon\Carbon::parse($pegawai->kontrak->kontrak_7)->format('d-m-Y')}} @endif" class="form-control date7" id="kontrak_7">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="selesai_kontrak_1">Selesai Kontrak 1</label>
                                            <input name="selesai_kontrak_1" value="@if(!empty($pegawai->kontrak->selesai_kontrak_1)){{\Carbon\Carbon::parse($pegawai->kontrak->selesai_kontrak_1)->format('d-m-Y')}} @endif" type="text" class="form-control date8" id="selesai_kontrak_1">
                                        </div>
                                        <div class="form-group">
                                            <label for="selesai_kontrak_2">Selesai Kontrak 2</label>
                                            <input name="selesai_kontrak_2" value="@if(!empty($pegawai->kontrak->selesai_kontrak_2)){{\Carbon\Carbon::parse($pegawai->kontrak->selesai_kontrak_2)->format('d-m-Y')}} @endif" type="text" class="form-control date9" id="selesai_kontrak_2">
                                        </div>
                                        <div class="form-group">
                                            <label for="selesai_kontrak_3">Selesai Kontrak 3</label>
                                            <input name="selesai_kontrak_3" value="@if(!empty($pegawai->kontrak->selesai_kontrak_3)){{\Carbon\Carbon::parse($pegawai->kontrak->selesai_kontrak_3)->format('d-m-Y')}} @endif" type="text" class="form-control date10" id="selesai_kontrak_3">
                                        </div>
                                        <div class="form-group">
                                            <label for="selesai_kontrak_4">Selesai Kontrak 4</label>
                                            <input name="selesai_kontrak_4" value="@if(!empty($pegawai->kontrak->selesai_kontrak_4)){{\Carbon\Carbon::parse($pegawai->kontrak->selesai_kontrak_4)->format('d-m-Y')}} @endif" type="text" class="form-control date11" id="selesai_kontrak_4">
                                        </div>
                                        <div class="form-group">
                                            <label for="selesai_kontrak_5">Selesai Kontrak 5</label>
                                            <input name="selesai_kontrak_5" value="@if(!empty($pegawai->kontrak->selesai_kontrak_5)){{\Carbon\Carbon::parse($pegawai->kontrak->selesai_kontrak_5)->format('d-m-Y')}} @endif" type="text" class="form-control date12" id="selesai_kontrak_5">
                                        </div>
                                        <div class="form-group">
                                            <label for="selesai_kontrak_6">Selesai Kontrak 6</label>
                                            <input name="selesai_kontrak_6" value="@if(!empty($pegawai->kontrak->selesai_kontrak_6)){{\Carbon\Carbon::parse($pegawai->kontrak->selesai_kontrak_6)->format('d-m-Y')}} @endif" type="text" class="form-control date13" id="selesai_kontrak_6">
                                        </div>
                                        <div class="form-group">
                                            <label for="selesai_kontrak_7">Selesai Kontrak 7</label>
                                            <input name="selesai_kontrak_7" value="@if(!empty($pegawai->kontrak->selesai_kontrak_7)){{\Carbon\Carbon::parse($pegawai->kontrak->selesai_kontrak_7)->format('d-m-Y')}} @endif" type="text" class="form-control date14" id="selesai_kontrak_7">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="data-pribadi" role="tabpanel" aria-labelledby="pills-profile-tab-icon">
                                <div class="row mb-2">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <input type="text" name="nip" value="@if(empty($pegawai->nip)){{ old('nip') }} @else {{$pegawai->nip}} @endif" class="form-control @error('nip') is-invalid @enderror" id="nip">
                                            @error('nip')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kode_tipe_pegawai">Tipe Pegawai</label>
                                            <select name="kode_tipe_pegawai" class="form-control  @error('kode_tipe_pegawai') is-invalid @enderror" id="kode_tipe_pegawai">
                                                <option value="">---Pilih---</option>
                                                @foreach($tp as $tipe)
                                                <option value="{{$tipe->id}}" {{$pegawai->kode_tipe_pegawai == $tipe->id ? 'selected' : ''}}>{{$tipe->nama_tipe_pegawai}}</option>
                                                @endforeach
                                            </select>
                                            @error('kode_tipe_pegawai')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap</label>
                                            <input type="text" name="nama" value="@if(empty($pegawai->nama)){{ old('nama') }} @else {{$pegawai->nama}} @endif" class="form-control  @error('nama') is-invalid @enderror" id="nama">
                                            @error('nama')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="asal_kepegawaian">Asal Kepegawaian</label>
                                            <select name="asal_kepegawaian" class="form-control  @error('asal_kepegawaian') is-invalid @enderror" id="asal_kepegawaian">
                                                <option value="">---Pilih---</option>
                                                <option value="INKA" @if(empty($pegawai->asal_kepegawaian)) {{old('asal_kepegawaian') == 'INKA' ? 'selected' : ''}} @else{{$pegawai->asal_kepegawaian == 'INKA' ? 'selected' : ''}}@endif>INKA</option>
                                                <option value="REKA" @if(empty($pegawai->asal_kepegawaian)) {{old('asal_kepegawaian') == 'REKA' ? 'selected' : ''}} @else{{$pegawai->asal_kepegawaian == 'REKA' ? 'selected' : ''}}@endif>REKA</option>
                                            </select>
                                            @error('asal_kepegawaian')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="status_karyawan">Status Karyawan</label>
                                            <select class="form-control @error('status_karyawan') is-invalid @enderror" name="status_karyawan" id="status_karyawan">
                                                <option value="">--- Pilih ---</option>
                                                <option value="Aktif" @if(empty($pegawai->status_karyawan)) {{old('status_karyawan') == 'Aktif' ? 'selected' : ''}} @else{{$pegawai->status_karyawan == 'Aktif' ? 'selected' : ''}}@endif>Aktif</option>
                                                <option value="Nonaktif" @if(empty($pegawai->status_karyawan)) {{old('status_karyawan') == 'Nonaktif' ? 'selected' : ''}} @else{{$pegawai->status_karyawan == 'Nonaktif' ? 'selected' : ''}}@endif>Nonaktif</option>
                                            </select>
                                            @error('status_karyawan')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control  @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin">
                                                <option value="">---Pilih---</option>
                                                <option value="Laki-Laki" @if(empty($pegawai->jenis_kelamin)) {{old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : ''}} @else{{$pegawai->jenis_kelamin == 'Laki-Laki' ? 'selected' : ''}}@endif>Laki-Laki</option>
                                                <option value="Perempuan" @if(empty($pegawai->jenis_kelamin)) {{old('jenis_kelamin') == 'Perempuan' ? 'selected' : ''}} @else{{$pegawai->jenis_kelamin == 'Perempuan' ? 'selected' : ''}}@endif>Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="pendidikan_tnt">Pendidikan T/NT</label>
                                            <select name="pendidikan_tnt" class="form-control  @error('pendidikan_tnt') is-invalid @enderror" id="pendidikan_tnt">
                                                <option value="">---Pilih---</option>
                                                <option value="Teknik" @if(empty($pegawai->pendidikan_tnt)) {{old('pendidikan_tnt') == 'Teknik' ? 'selected' : ''}} @else{{$pegawai->pendidikan_tnt == 'Teknik' ? 'selected' : ''}}@endif>Teknik</option>
                                                <option value="Non Teknik" @if(empty($pegawai->pendidikan_tnt)) {{old('pendidikan_tnt') == 'Non Teknik' ? 'selected' : ''}} @else{{$pegawai->pendidikan_tnt == 'Non Teknik' ? 'selected' : ''}}@endif>Non Teknik</option>
                                            </select>
                                            @error('pendidikan_tnt')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="sekolah_universitas">Asal Sekolah / Universitas</label>
                                            <input name="sekolah_universitas" type="text" value="@if(empty($pegawai->sekolah_universitas)){{ old('sekolah_universitas') }} @else {{$pegawai->sekolah_universitas}} @endif" class="form-control  @error('sekolah_universitas') is-invalid @enderror" id="sekolah_universitas">
                                            @error('sekolah_universitas')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input name="tempat_lahir" type="text" value="@if(empty($pegawai->tempat_lahir)){{ old('tempat_lahir') }} @else {{$pegawai->tempat_lahir}} @endif" class="form-control  @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir">
                                            @error('tempat_lahir')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="umur">Umur</label>
                                            <input name="umur" type="text" value="@if(empty($pegawai->umur)){{ old('umur') }} @elseif(!empty($pegawai->umur)) {{$pegawai->umur}} @endif" class="form-control  @error('umur') is-invalid @enderror umur" id="umur">
                                            @error('umur')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                            <select name="pendidikan_terakhir" class="form-control  @error('pendidikan_terakhir') is-invalid @enderror" id="pendidikan_terakhir">
                                                <option value="">---Pilih---</option>
                                                <option value="SMA" @if(empty($pegawai->pendidikan_terakhir)) {{old('pendidikan_terakhir') == 'SMA' ? 'selected' : ''}} @else{{$pegawai->pendidikan_terakhir == 'SMA' ? 'selected' : ''}}@endif>SMA</option>
                                                <option value="S1" @if(empty($pegawai->pendidikan_terakhir)) {{old('pendidikan_terakhir') == 'S1' ? 'selected' : ''}} @else{{$pegawai->pendidikan_terakhir == 'S1' ? 'selected' : ''}}@endif>S1</option>
                                                <option value="S2" @if(empty($pegawai->pendidikan_terakhir)) {{old('pendidikan_terakhir') == 'S2' ? 'selected' : ''}} @else{{$pegawai->pendidikan_terakhir == 'S2' ? 'selected' : ''}}@endif>S2</option>
                                                <option value="S3" @if(empty($pegawai->pendidikan_terakhir)) {{old('pendidikan_terakhir') == 'S3' ? 'selected' : ''}} @else{{$pegawai->pendidikan_terakhir == 'S2' ? 'selected' : ''}}@endif>S3</option>
                                                <option value="D3" @if(empty($pegawai->pendidikan_terakhir)) {{old('pendidikan_terakhir') == 'D3' ? 'selected' : ''}} @else{{$pegawai->pendidikan_terakhir == 'D3' ? 'selected' : ''}}@endif>D3</option>
                                                <option value="D4" @if(empty($pegawai->pendidikan_terakhir)) {{old('pendidikan_terakhir') == 'D4' ? 'selected' : ''}} @else{{$pegawai->pendidikan_terakhir == 'D4' ? 'selected' : ''}}@endif>D4</option>
                                            </select>
                                            @error('pendidikan_terakhir')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="jurusan_pendidikan">Jurusan Pendidikan</label>
                                            <input name="jurusan_pendidikan" type="text" value="@if(empty($pegawai->jurusan_pendidikan)){{ old('jurusan_pendidikan') }} @else {{$pegawai->jurusan_pendidikan}} @endif" class=" form-control  @error('jurusan_pendidikan') is-invalid @enderror" id="jurusan_pendidikan">
                                            @error('jurusan_pendidikan')
                                            <span class="invalid-feedback a1" role="alert"><strong class="text-capitalize">{{$message}}</strong>
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="pendidikan_diakui">Pendidikan Diakui</label>
                                            <select name="pendidikan_diakui" class="form-control  @error('pendidikan_diakui') is-invalid @enderror" id="pendidikan_diakui">
                                                <option value="">---Pilih---</option>
                                                <option value="SMA" @if(empty($pegawai->pendidikan_diakui)) {{old('pendidikan_diakui') == 'SMA' ? 'selected' : ''}} @else{{$pegawai->pendidikan_diakui == 'SMA' ? 'selected' : ''}}@endif>SMA</option>
                                                <option value="S1" @if(empty($pegawai->pendidikan_diakui)) {{old('pendidikan_diakui') == 'S1' ? 'selected' : ''}} @else{{$pegawai->pendidikan_diakui == 'S1' ? 'selected' : ''}}@endif>S1</option>
                                                <option value="S2" @if(empty($pegawai->pendidikan_diakui)) {{old('pendidikan_diakui') == 'S2' ? 'selected' : ''}} @else{{$pegawai->pendidikan_diakui == 'S2' ? 'selected' : ''}}@endif>S2</option>
                                                <option value="S3" @if(empty($pegawai->pendidikan_diakui)) {{old('pendidikan_diakui') == 'S3' ? 'selected' : ''}} @else{{$pegawai->pendidikan_diakui == 'S2' ? 'selected' : ''}}@endif>S3</option>
                                                <option value="D3" @if(empty($pegawai->pendidikan_diakui)) {{old('pendidikan_diakui') == 'D3' ? 'selected' : ''}} @else{{$pegawai->pendidikan_diakui == 'D3' ? 'selected' : ''}}@endif>D3</option>
                                                <option value="D4" @if(empty($pegawai->pendidikan_diakui)) {{old('pendidikan_diakui') == 'D4' ? 'selected' : ''}} @else{{$pegawai->pendidikan_diakui == 'D4' ? 'selected' : ''}}@endif>D4</option>
                                            </select>
                                            @error('pendidikan_diakui')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input name="tanggal_lahir" value="@if(empty($pegawai->tanggal_lahir)){{ old('tanggal_lahir') }} @elseif(!empty($pegawai->tanggal_lahir)){{\Carbon\Carbon::parse($pegawai->tanggal_lahir)->format('d-m-Y')}}@endif" type="text" class="form-control date15  @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir">
                                            @error('tanggal_lahir')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="agama">Agama</label>
                                            <select name="agama" class="form-control  @error('agama') is-invalid @enderror" id="agama">
                                                <option value="">---Pilih---</option>
                                                <option value="Islam" @if(empty($pegawai->agama)) {{old('agama') == 'Islam' ? 'selected' : ''}} @else{{$pegawai->agama == 'Islam' ? 'selected' : ''}}@endif>Islam</option>
                                                <option value="Kristen" @if(empty($pegawai->agama)) {{old('agama') == 'Kristen' ? 'selected' : ''}} @else{{$pegawai->agama == 'Kristen' ? 'selected' : ''}}@endif>Kristen</option>
                                                <option value="Katolik" @if(empty($pegawai->agama)) {{old('agama') == 'Katolik' ? 'selected' : ''}} @else{{$pegawai->agama == 'Katolik' ? 'selected' : ''}}@endif>Katolik</option>
                                                <option value="Hindu" @if(empty($pegawai->agama)) {{old('agama') == 'Hindu' ? 'selected' : ''}} @else{{$pegawai->agama == 'Hindu' ? 'selected' : ''}}@endif>Hindu</option>
                                                <option value="Buddha" @if(empty($pegawai->agama)) {{old('agama') == 'Buddha' ? 'selected' : ''}} @else{{$pegawai->agama == 'Buddha' ? 'selected' : ''}}@endif>Buddha</option>
                                                <option value="Konghucu" @if(empty($pegawai->agama)) {{old('agama') == 'Konghucu' ? 'selected' : ''}} @else{{$pegawai->agama == 'Konghucu' ? 'selected' : ''}}@endif>Konghucu</option>
                                            </select>
                                            @error('agama')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="status_hubungan_dalam_keluarga">Status Hubungan Dalam Keluarga</label>
                                            <select class="form-control @error('status_hubungan_dalam_keluarga') is-invalid @enderror" name="status_hubungan_dalam_keluarga" id="status_hubungan_dalam_keluarga">
                                                <option value="">--- Pilih ---</option>
                                                <option value="Anak" @if(empty($pegawai->status_hubungan_dalam_keluarga)) {{old('status_hubungan_dalam_keluarga') == 'Anak' ? 'selected' : ''}}@else{{$pegawai->status_hubungan_dalam_keluarga == 'Anak' ? 'selected' : ''}}@endif>Anak</option>
                                                <option value="Istri" @if(empty($pegawai->status_hubungan_dalam_keluarga)) {{old('status_hubungan_dalam_keluarga') == 'Istri' ? 'selected' : ''}}@else{{$pegawai->status_hubungan_dalam_keluarga == 'Istri' ? 'selected' : ''}}@endif>Istri</option>
                                                <option value="Suami" @if(empty($pegawai->status_hubungan_dalam_keluarga)) {{old('status_hubungan_dalam_keluarga') == 'Suami' ? 'selected' : ''}}@else{{$pegawai->status_hubungan_dalam_keluarga == 'Suami' ? 'selected' : ''}}@endif>Suami</option>
                                            </select>
                                            @error('status_hubungan_dalam_keluarga')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="nama_ayah">Nama Ayah</label>
                                            <input name="nama_ayah" value="@if(empty($pegawai->nama_ayah)){{ old('nama_ayah') }} @else {{$pegawai->nama_ayah}} @endif" type="text" class="form-control  @error('nama_ayah') is-invalid @enderror" id="nama_ayah">
                                            @error('nama_ayah')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat_ktp">Alamat KTP</label>
                                            <textarea class="form-control @error('alamat_ktp') is-invalid @enderror" name="alamat_ktp" rows="5" id="alamat_ktp">@if(empty($pegawai->alamat_ktp)){{ old('alamat_ktp') }} @else {{$pegawai->alamat_ktp}} @endif</textarea>
                                            @error('alamat_ktp')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kota_asal">Kota Asal</label>
                                            <input name="kota_asal" value="@if(empty($pegawai->kota_asal)){{ old('kota_asal') }} @else {{$pegawai->kota_asal}} @endif" type="text" class="form-control  @error('kota_asal') is-invalid @enderror" id="kota_asal">
                                            @error('kota_asal')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="no_ktp">No. KTP / NIK</label>
                                            <input name="no_ktp" value="@if(empty($pegawai->no_ktp)){{ old('no_ktp') }} @else {{$pegawai->no_ktp}} @endif" type="text" class="form-control  @error('no_ktp') is-invalid @enderror" id="no_ktp">
                                            @error('no_ktp')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="no_kitap">No. KITAP</label>
                                            <input name="no_kitap" value="@if(empty($pegawai->no_kitap)){{ old('no_kitap') }} @else {{$pegawai->no_kitap}} @endif" type="text" class="form-control  @error('no_kitap') is-invalid @enderror" id="no_kitap">
                                            @error('no_kitap')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="nama_ibu">Nama Ibu</label>
                                            <input name="nama_ibu" value="@if(empty($pegawai->nama_ibu)){{ old('nama_ibu') }} @else {{$pegawai->nama_ibu}} @endif" type="text" class="form-control  @error('nama_ibu') is-invalid @enderror" id="nama_ibu">
                                            @error('no_kitap')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat_domisili">Alamat Domisili</label>
                                            <textarea class="form-control @error('alamat_domisili') is-invalid @enderror" name="alamat_domisili" rows="5" id="alamat_domisili">@if(empty($pegawai->alamat_domisili)){{ old('alamat_domisili') }} @else {{$pegawai->alamat_domisili}} @endif</textarea>
                                            @error('alamat_domisili')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kewarganegaraan">Kewarganegaraan</label>
                                            <input name="kewarganegaraan" value="@if(empty($pegawai->kewarganegaraan)){{ old('kewarganegaraan') }} @else {{$pegawai->kewarganegaraan}} @endif" type="text" class="form-control  @error('kewarganegaraan') is-invalid @enderror" id="kewarganegaraan">
                                            @error('kewarganegaraan')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="masa_kerja">Masa Kerja</label>
                                            <input name="masa_kerja" value="@if(empty($pegawai->masa_kerja)){{ old('masa_kerja') }} @else {{$pegawai->masa_kerja}} @endif" type="text" class="form-control  @error('masa_kerja') is-invalid @enderror" id="masa_kerja">
                                            @error('masa_kerja')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row ml-1">
                                    <div class="col-md-4 col-lg-4">
                                        <div class="card">
                                            <div class="card-header" style="font-weight: bold;">Foto Pribadi</div>
                                            <div class="card-body bg-grey1 text-center">
                                                <div class="form-group mb-0">
                                                    <div class="mb-1">
                                                        <div class="image-area mt-2">
                                                            <img id="imageResult" src="@if(!empty($pegawai->foto_pegawai)){{ Storage::url($pegawai->foto_pegawai)}}@endif" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                                                        </div>
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="upload" class="btn btn-grey m-0 rounded-pill px-4">Pilih / Ubah Foto</label>
                                                        <input name="foto_pegawai" id="upload" @if(!empty($pegawai->foto_pegawai)) 'value="{{$pegawai->foto_pegawai}}"'@endif type="file" onchange="readURL(this);" style="display: none;" class="form-control border-1 @error('foto_pegawai') is-invalid @enderror">
                                                        @error('foto_pegawai')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="text-capitalize">{{$message}}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="data-kelengkapan" role="tabpanel" aria-labelledby="pills-contact-tab-icon">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="no_bpjs_kesehatan">No. BPJS Kesehatan</label>
                                            <input name="no_bpjs_kesehatan" value="@if(empty($pegawai->no_bpjs_kesehatan)){{ old('no_bpjs_kesehatan') }}@else{{$pegawai->no_bpjs_kesehatan}}@endif" type="text" class="form-control @error('no_bpjs_kesehatan') is-invalid @enderror" id="no_bpjs_kesehatan">
                                            @error('no_bpjs_kesehatan')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="no_passport">No. Passport</label>
                                            <input name="no_passport" value="@if(empty($pegawai->no_passport)){{ old('no_passport') }} @else{{$pegawai->no_passport}}@endif" type="text" class="form-control @error('no_passport') is-invalid @enderror" id="no_passport">
                                            @error('no_passport')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="no_bpjs_ketenagakerjaan">No. BPJS Ketenagakerjaan</label>
                                            <input name="no_bpjs_ketenagakerjaan" value="@if(empty($pegawai->no_bpjs_ketenagakerjaan)){{ old('no_bpjs_ketenagakerjaan') }} @else{{$pegawai->no_bpjs_ketenagakerjaan}}@endif" type="text" class="form-control @error('no_bpjs_ketenagakerjaan') is-invalid @enderror" id="no_bpjs_ketenagakerjaan">
                                            @error('no_bpjs_ketenagakerjaan')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="npwp">No. NPWP</label>
                                            <input name="npwp" value="@if(empty($pegawai->npwp)){{ old('npwp') }} @else{{$pegawai->npwp}}@endif" type="text" class="form-control @error('npwp') is-invalid @enderror" id="npwp">
                                            @error('npwp')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="nama_bank">Nama Bank</label>
                                            <input name="nama_bank" value="@if(empty($pegawai->nama_bank)){{ old('nama_bank') }} @else{{$pegawai->nama_bank}}@endif" type="text" class="form-control @error('nama_bank') is-invalid @enderror" id="nama_bank">
                                            @error('nama_bank')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="no_rekening_gaji">No. Rekening Gaji</label>
                                            <input name="no_rekening_gaji" value="@if(empty($pegawai->no_rekening_gaji)){{ old('no_rekening_gaji') }} @else{{$pegawai->no_rekening_gaji}}@endif" type="text" class="form-control @error('no_rekening_gaji') is-invalid @enderror" id="no_rekening_gaji">
                                            @error('no_rekening_gaji')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="no_handphone">No. Hp</label>
                                            <input name="no_handphone" value="@if(empty($pegawai->no_handphone)){{ old('no_handphone') }} @else{{$pegawai->no_handphone}}@endif" type="text" class="form-control @error('no_handphone') is-invalid @enderror" id="no_hp">
                                            @error('no_handphone')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kode_jabatan">Jabatan</label>
                                            <select name="kode_jabatan" class="form-control @error('kode_jabatan') is-invalid @enderror" id="kode_jabatan">
                                                <option value="">---Pilih---</option>
                                                @foreach($j as $jabatan)
                                                <option value="{{$jabatan->id}}" @if(empty($pegawai->jabatan)){{old('jabatan') == $jabatan->nama_jabatan ? 'selected' : ''}}@else{{$jabatan->id == $pegawai->kode_jabatan ? 'selected' : ''}} @endif>{{$jabatan->nama_jabatan}}</option>
                                                @endforeach
                                            </select>
                                            @error('kode_jabatan')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="departemen">Departemen</label>
                                            <input name="departemen" value="@if(empty($pegawai->departemen)){{old('departemen')}}@else{{$pegawai->departemen}}@endif" type="text" class="form-control @error('departemen') is-invalid @enderror" list="departemens" id="departemen">
                                            <datalist id="departemens">
                                                <option value="-" @if(empty($pegawai->departemen)){{old('departemen') == '-' ? 'selected' : ''}}@else{{$pegawai->departemen == '-' ? 'selected' : ''}} @endif>-</option>
                                            </datalist>
                                            @error('departemen')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="no_rekening_ppip">No. Rekening PPIP</label>
                                            <input name="no_rekening_ppip" value="@if(empty($pegawai->no_rekening_ppip)){{ old('no_rekening_ppip') }} @else{{$pegawai->no_rekening_ppip}}@endif" type="text" class="form-control @error('no_rekening_ppip') is-invalid @enderror" id="no_rekening_ppip">
                                            @error('no_rekening_ppip')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input name="email" value="@if(empty($pegawai->email)){{ old('email') }} @else{{$pegawai->email}}@endif" type="email" class="form-control @error('email') is-invalid @enderror" id="email">
                                            @error('email')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="division">Divisi</label>
                                            <select name="division" class="form-control @error('division') is-invalid @enderror division" onchange="getUnitKerja()" id="division">
                                                <option value="">---Pilih---</option>
                                                @foreach($d as $divisi)
                                                <option value="{{$divisi->nama_divisi}}" @if(empty($pegawai->division)) {{old('division') == $divisi->nama_divisi ? 'selected' : ''}} @else {{$pegawai->division == $divisi->nama_divisi ? 'selected' : ''}} @endif>{{$divisi->nama_divisi}}</option>
                                                @endforeach
                                            </select>
                                            @error('division')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="unit_kerja">Selection / Unit Kerja</label>
                                            <select name="unit_kerja" class="form-control @error('unit_kerja') is-invalid @enderror" id="unit_kerja">
                                                <option value="">---Pilih---</option>
                                            </select>
                                            @error('unit_kerja')
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
                <div class="card-action">
                    <a class="btn btn-danger" href="{{ route('Karyawan.index') }}">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan</button>

                </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
@push('plugin-scripts')
<script>
    $(document).ready(function() {
        $('.date1').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('.date2').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('.date3').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('.date4').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('.date5').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('.date6').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('.date7').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('.date8').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('.date9').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('.date10').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('.date11').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('.date12').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('.date13').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('.date14').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('.date15').datepicker({
            format: 'dd-mm-yyyy'
        });

        $('.date15').change(function() {
            var tgl_lahir = document.getElementById("tanggal_lahir").value;
            const [day, month, year] = tgl_lahir.split('-');

            var today = new Date();
            var umur = today.getFullYear() - year;
            var m = today.getMonth() - month;
            if (m < 0 || (m === 0 && today.getDate() < day)) {
                umur--;
            }
            $('.umur').attr('value', umur);
        });

        var divisi = $('.division').val();

        if (divisi != '') {
            getUnitKerja();
        }
    });

    function isSelected(nama) {
        var old = "{{old('unit_kerja')}}"
        var saved = "{{$pegawai->unit_kerja}}"
        if (!saved) {
            if (old === nama) {
                return 'selected';
            } else {
                return '';
            }
        } else {
            if (saved === nama) {
                return 'selected';
            } else {
                return '';
            }
        }
    }

    function getUnitKerja(divisi_name) {
        var divisi_name = $('.division').val();
        if (divisi_name) {
            $.ajax({
                type: "GET",
                url: "/get/getUnitKerja/" + divisi_name,
                dataType: 'JSON',
                success: function(res) {
                    if (res) {
                        $("#unit_kerja").empty();
                        $("#unit_kerja").append('<option value="">---Pilih---</option>');
                        $.each(res, function(kode, nama) {
                            $("#unit_kerja").append('<option value="' + nama + '" ' + isSelected(nama) + '> ' + nama + ' </option>');
                        });
                    } else {
                        $("#unit_kerja").empty();
                        $("#unit_kerja").append('<option value="">---Pilih---</option>');
                    }
                }
            });
        } else {
            $("#unit_kerja").empty();
            $("#unit_kerja").append('<option value="">---Pilih---</option>');
        }
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imageResult')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(function() {
        $('#upload').on('change', function() {
            readURL(input);
        });
    });
    /*  ==========================================
        SHOW UPLOADED IMAGE NAME
    * ========================================== */
    var input = document.getElementById('upload');
    var infoArea = document.getElementById('upload-label');
    input.addEventListener('change', showFileName);

    function showFileName(event) {
        var input = event.srcElement;
        var fileName = input.files[0].name;
        infoArea.textContent = 'File name: ' + fileName;
    }
</script>
@endpush