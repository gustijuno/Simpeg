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
                <a href="{{route('Keluarga.create')}}">Edit Keluarga</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Data Keluarga</div>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ route('Keluarga.update', $keluarga->id) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row col-md-12">
                            <ul class="nav nav-pills nav-primary nav-pills-icons col-lg-12" id="pills-tab-with-icon" role="tablist">
                                <li class="nav-item col-md-4">
                                    <span class="nav-link active text-center" id="pills-home-tab-icon">
                                        <span class="badge badge-count" style="background-color: white; color:black; font-weight:bold; border: 1px solid black; font-size:medium">1</span>
                                        Data Keluarga
                                    </span>
                                </li>
                                <li class="nav-item col-md-4 text-center">
                                    <span class="nav-link" id="pills-profile-tab-icon">
                                        <span class="badge badge-count" style="background-color: white; color:black; font-weight:bold; border: 1px solid black; font-size:medium">2</span>
                                        Data Pasangan
                                    </span>
                                </li>
                                <li class="nav-item col-md-4 text-center">
                                    <span class="nav-link" id="pills-contact-tab-icon">
                                        <span class="badge badge-count" style="background-color: white; color:black; font-weight:bold; border: 1px solid black; font-size:medium">3</span>
                                        Data Anak
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="nama">Pegawai</label>
                                    <input type="text" value="{{$keluarga->pegawai->nip}} - {{$keluarga->pegawai->nama}}" name="nama" class="form-control form-control @error('nama') is-invalid @enderror" id="nama" disabled>
                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input type="text" value="{{$keluarga->pegawai->id}}" name="id_pegawai" class="form-control form-control @error('id_pegawai') is-invalid @enderror" id="id_pegawai" hidden>
                                    @error('id_pegawai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input type="text" value="{{$keluarga->pegawai->nama}}" name="nama" class="form-control form-control" id="nama" hidden>
                                    <input type="text" value="{{$keluarga->pegawai->nip}}" name="nip" class="form-control form-control" id="nip" hidden>
                                </div>
                                <div class="form-group">
                                    <label for="status_perkawinan">Status Pernikahan</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status_perkawinan" id="status_perkawinan" value="Belum Menikah" class="selectgroup-input @error('status_perkawinan') is-invalid @enderror" {{$keluarga->status_perkawinan == 'Belum Menikah' ? 'checked' : ''}}>
                                            <span class="selectgroup-button">Belum Menikah</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status_perkawinan" id="status_perkawinan" value="Menikah" class="selectgroup-input @error('status_perkawinan') is-invalid @enderror" {{$keluarga->status_perkawinan == 'Menikah' ? 'checked' : ''}}>
                                            <span class="selectgroup-button">Menikah</span>
                                        </label>
                                    </div>
                                    <input type="text" value="{{$keluarga->status_perkawinan}}" name="status_perkawinan_lama" class="form-control form-control" id="status_perkawinan_lama" hidden>
                                    @error('status_perkawinan') <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="no_kk">Nomor Kartu Keluarga</label>
                                    <input type="text" value="@if(empty($keluarga->no_kk)){{old('no_kk')}}@else{{$keluarga->no_kk}}@endif" class="form-control form-control @error('no_kk') is-invalid @enderror" name="no_kk" id="no_kk">
                                    @error('no_kk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Status Anak</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status_anak" id="status_anak_ya" value="Ada" class="selectgroup-input @error('status_anak') is-invalid @enderror" {{$keluarga->status_anak == 'Ada' ? 'checked' : ''}}>
                                            <span class="selectgroup-button">Memiliki Anak</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status_anak" id="status_anak_tidak" value="Tidak Ada" class="selectgroup-input @error('status_anak') is-invalid @enderror" {{$keluarga->status_anak == 'Tidak Ada' ? 'checked' : ''}}>
                                            <span class="selectgroup-button">Belum Memiliki Anak</span>
                                        </label>
                                    </div>
                                </div>
                                @error('status_anak')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-capitalize">{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-lg-6">
                                <div class="form-group">
                                    <label for="dokumen_kk">Dokumen KK</label>
                                    <input type="file" class="form-control input-file @error('dokumen_kk') is-invalid @enderror" name="dokumen_kk">
                                    @if(!empty($keluarga->dokumen_kk) && Storage::exists($keluarga->dokumen_kk))
                                    <div class="text text-black">
                                        <div class="text-capitalize text-black">Dokumen tersimpan</div>
                                        <ul>
                                            <li><a href="{{ Storage::url($keluarga->dokumen_kk)}}">{{$keluarga->pegawai->nip}} - {{$keluarga->pegawai->nama}}</a></li>
                                        </ul>
                                        <strong class="text-danger text-capitalize"> *** Kosongkan Dokumen KK jika tidak ingin mengubah</strong>
                                    </div>
                                    @endif
                                    @error('dokumen_kk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="btn btn-danger" href="{{route('Keluarga.index')}}">Kembali</a>
                        <button type="submit" class="btn btn-success" id="btnns">Selanjutnya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('plugin-scripts')
<script>
    var status_perkawinan = document.querySelectorAll("#status_perkawinan");

    function checkBox(e) {
        if (e.target.value == "Menikah") {
            $("#btnns").html('Selanjutnya');
        } else if (e.target.value == "Belum Menikah") {
            $("#btnns").html('Simpan');
            $('#status_anak_tidak').prop("checked", true);
        }
    }

    status_perkawinan.forEach(check => {
        check.addEventListener("click", checkBox);
    });
    $(document).ready(function() {
        var status = "{{$keluarga->status_perkawinan}}";
        if (status == "Menikah") {
            $("#btnns").html('Selanjutnya');
        } else if (status == "Belum Menikah") {
            $("#btnns").html('Simpan');
        }
    });
</script>
@endpush