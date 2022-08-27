@extends('layout.master')
@section('statuskaryawan','active')
@section('statusdatatraining','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Training</h4>
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
                <a href="{{route('Training.index')}}">Training</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('Training.show', $training->id)}}">Detail Training</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Detail Data Training</div>
                </div>
                <div class="card-body">
                    <div class="row col-md-12">
                        <div class="col-9">
                            <div class="form-group form-inline">
                                <label for="nama" class="col-md-4 col-form-label">Nama Lengkap</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$training->pegawai->nama}}" class="form-control input-full" id="nama" style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="jenis_training" class="col-md-4 col-form-label">Jenis Training</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$training->jenis_training}}" class="form-control input-full" id="nama" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="penyelenggara" class="col-md-4 col-form-label">Penyelenggara</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$training->penyelenggara}}" class="form-control input-full" id="penyelenggara" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;
																color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="lokasi_training" class="col-md-4 col-form-label">Lokasi Training</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$training->lokasi_training}}" class="form-control input-full" id="lokasi_training" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;
																color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="waktu_mulai_pelaksanaan" class="col-md-4 col-form-label">Tanggal Mulai</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{\Carbon\Carbon::parse($training->waktu_mulai_pelaksanaan)->format('d-m-Y')}}" class="form-control input-full" id="waktu_mulai_pelaksanaan" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;
																color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="waktu_selesai_pelaksanaan" class="col-md-4 col-form-label">Tanggal Selesai</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{\Carbon\Carbon::parse($training->waktu_selesai_pelaksanaan)->format('d-m-Y')}}" class="form-control input-full" id="waktu_selesai_pelaksanaan" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;
																color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="inlineinput" class="col-md-4 col-form-label">Lampiran Dokumen</label>
                                <div class="col-md-8 p-0">
                                    <!-- <div class="card-body bg-grey1 text-center"> -->
                                    @if(Storage::exists($training->dokumen_data_training))
                                    <a class="btn btn-primary btn-sm text-white" href="{{ Storage::url($training->dokumen_data_training)}}"> Download File</a>

                                    <!-- <div class="image-area mt-4">
                                        <img id="imageResult" src="{{ Storage::url($training->dokumen_data_training)}}" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                                    </div> -->
                                    @else
                                    <h6 class="text-center">Gambar Tidak ada. Klik <span class="badge badge-primary"><a class="text-white" href="{{route('Training.edit',$training->id)}}">Edit Training</a></span> untuk Menambahkan.</h6>
                                    @endif
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <a class="btn btn-danger" href="{{route('Training.list', $training->id_pegawai)}}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection