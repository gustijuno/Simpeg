@extends('layout.master')
@section('statuskaryawan','active')
@section('statusdataorganisasi','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Organisasi</h4>
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
                <a href="{{route('Organisasi.index')}}">Organisasi</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">

                <a href="{{route('Organisasi.show', $Organisasi->id)}}">Detail Organisasi</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Detail Data Organisasi</div>
                </div>
                <div class="card-body">
                    <div class="tab-content mt-2 mb-3" id="pills-with-icon-tabContent">
                        <div class="tab-pane fade show active" id="pills-home-icon" role="tabpanel" aria-labelledby="pills-home-tab-icon">
                            <div class="row">
                                <div class="col-9">
                                    <div class="form-group form-inline">
                                        <label for="kode_organisasi" class="col-md-4 col-form-label">Kode Organisasi</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$Organisasi->kode_organisasi}}" class="form-control input-full" id="kode_organisasi" style="background-color:#E5EBFF;color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="nama_organisasi" class="col-md-4 col-form-label">Nama Organisasi</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$Organisasi->nama_organisasi}}" class="form-control input-full" id="nama_organisasi" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="level_organisasi" class="col-md-4 col-form-label">Level Organisasi</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$Organisasi->level_organisasi}}" class="form-control input-full" id="level_organisasi" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="status" class="col-md-4 col-form-label">Status</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$Organisasi->status}}" class="form-control input-full" id="status" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="nama_pejabat" class="col-md-4 col-form-label">Nama Pejabat</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$Organisasi->nama_pejabat}}" class="form-control input-full" id="nama_pejabat" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="jobdesk" class="col-md-4 col-form-label">Status Pejabat</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$Organisasi->status_pejabat}}" class="form-control input-full" id="jobdesk" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Jobdesk</label>
                                        <div class="col-md-8 p-0">
                                            <div class="image-area mt-4">
                                                <img id="imageResult" src="{{ Storage::url($Organisasi->jobdesk)}}" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-action">
                <a class="btn btn-danger" href="{{route('Organisasi.index')}}">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection