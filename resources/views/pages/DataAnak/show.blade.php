@extends('layout.master')
@section('statuskaryawan','active')
@section('statusdatakeluarga','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Keluarga</h4>
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
                <a href="{{route('Keluarga.index')}}">Keluarga</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('Anak.show', $anak->id)}}">Detail</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Detail Anak dari : {{$keluarga->pegawai->nama}}</div>
                </div>
                <div class="card-body">
                    <div class="tab-content mt-2 mb-3" id="pills-with-icon-tabContent">
                        <div class="tab-pane fade show active" id="pills-home-icon" role="tabpanel" aria-labelledby="pills-home-tab-icon">
                            <div class="row">
                                <!-- Foto -->
                                <div class="col-9">
                                    <div class="form-group form-inline">
                                        <label for="nip" class="col-md-4 col-form-label">Nama Lengkap</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$anak->nama_lengkap}}" class="form-control input-full" id="nama" style="background-color:#E5EBFF;color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="nama" class="col-md-4 col-form-label">No.KTP/NIK</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$anak->nik}}" class="form-control input-full" id="email" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Jenis
                                            Kelamin</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$anak->jenis_kelamin}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;
																color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="nama" class="col-md-4 col-form-label">Tempat Lahir</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$anak->tempat_lahir}}" class="form-control input-full" id="email" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="nama" class="col-md-4 col-form-label">Tanggal Lahir</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$anak->tanggal_lahir}}" class="form-control input-full" id="email" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="nama" class="col-md-4 col-form-label">Agama</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$anak->agama}}" class="form-control input-full" id="email" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="nama" class="col-md-4 col-form-label">Pendidikan</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$anak->pendidikan}}" class="form-control input-full" id="email" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="nama" class="col-md-4 col-form-label">Jenis Pekerjaan</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$anak->jenis_pekerjaan}}" class="form-control input-full" id="email" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="nama" class="col-md-4 col-form-label">Status Pernikahan</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$anak->status_pernikahan}}" class="form-control input-full" id="email" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="nama" class="col-md-4 col-form-label">Status Hubungan Dalam Keluarga</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$anak->status_hubungan_dalam_keluarga}}" class="form-control input-full" id="email" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection