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
                <a href="{{route('Keluarga.create')}}">Tambah Keluarga</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Data Keluarga</div>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ route('Keluarga.store') }}" id="myForm">
                    @csrf
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
                                    <select class="form-control f0" name="id_pegawai" id="id_pegawai" required>
                                        <option value="">---Pilih---</option>
                                        @foreach($p as $pegawai)
                                        <option value="{{$pegawai->id}}" {{old('id_pegawai') == $pegawai->id ? 'selected' : ''}}>{{$pegawai->nip}}-{{$pegawai->nama}}</option>
                                        @endforeach
                                    </select>
                                    <span class="invalid-feedback a0" role="alert">
                                        <strong>Pilih Pegawai Dulu!!!</strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="status_perkawinan">Status Pernikahan</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status_perkawinan" id="status_perkawinan" value="Belum Menikah" class="selectgroup-input f1 @error('status_perkawinan') is-invalid @enderror" {{old('status_perkawinan') == 'Belum Menikah' ? 'checked' : ''}} checked>
                                            <span class="selectgroup-button">Belum Menikah</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status_perkawinan" id="status_perkawinan" value="Menikah" class="selectgroup-input f1 @error('status_perkawinan') is-invalid @enderror" {{old('status_perkawinan') == 'Menikah' ? 'checked' : ''}}>
                                            <span class="selectgroup-button">Menikah</span>
                                        </label>
                                    </div>
                                    @error('status_perkawinan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="no_kk">Nomor Kartu Keluarga</label>
                                    <input type="text" value="{{old('no_kk')}}" class="form-control f2 @error('no_kk') is-invalid @enderror" name="no_kk" id="no_kk" @if($errors->has('no_kk')) autofocus @endif>
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
                                            <input type="radio" name="status_anak" id="status_anak_ya" value="Ada" class="selectgroup-input f3 @error('status_anak') is-invalid @enderror" {{old('status_anak') == 'Ada' ? 'checked' : ''}}>
                                            <span class="selectgroup-button">Memiliki Anak</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status_anak" id="status_anak_tidak" value="Tidak Ada" class="selectgroup-input f3 @error('status_anak') is-invalid @enderror" {{old('status_anak') == 'Tidak Ada' ? 'checked' : ''}}>
                                            <span class="selectgroup-button">Belum Memiliki Anak</span>
                                        </label>
                                        @error('status_anak')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dokumen_kk">Dokumen KK</label>
                                    <input type="file" class="form-control @error('dokumen_kk') is-invalid @enderror" id="dokumen_kk" name="dokumen_kk" @if($errors->has('dokumen_kk')) autofocus @endif>
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
                        <a class="btn btn-danger" href="{{route('Keluarga.index')}}">Batal</a>
                        <button type="submit" class="btn btn-success submit" id="btnns">Selanjutnya</button>
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
        function validateForm() {
            var isValid = true;
            $('.form-control').each(function() {
                if ($(this).val() === '')
                    isValid = false;
            });
            return isValid;
        }
        $('.submit').click(function() {
            var i = 1;
            if ($.trim($('.f0').val()) === '') {
                $('.a0').show();
                $('.f0').focus();
                return false;
            } else {
                $('.a0').hide();
            }
        });
    });
    $(document).ready(function() {
        var status = $('#status_perkawinan').val();
        if (status == "Menikah") {
            $("#btnns").html('Selanjutnya');
        } else if (status == "Belum Menikah") {
            $("#btnns").html('Simpan');
        }
    });
    var radio = document.querySelectorAll("#status_perkawinan");

    function checkBox(e) {
        if (e.target.value == "Menikah") {
            $("#btnns").html('Selanjutnya');
            $('#status_anak_ya').prop("checked", true);
        } else if (e.target.value == "Belum Menikah") {
            $("#btnns").html('Simpan');
            $('#status_anak_tidak').prop("checked", true);
        }
    }

    radio.forEach(check => {
        check.addEventListener("click", checkBox);
    });
</script>
@endpush