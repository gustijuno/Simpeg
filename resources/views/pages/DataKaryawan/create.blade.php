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
                <a href="{{route('Karyawan.create')}}">Tambah</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Data Karyawan</div>
                </div>
                <form method="POST" action="{{ route('Karyawan.store') }}" id="myForm">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="id_kepegawaian">ID Kepegawaian</label>
                                    <select name="id_kepegawaian" class="form-control form-control" id="id_kepegawaian">
                                        <option>---Pilih---</option>
                                        @foreach($tp as $tipepegawai)
                                        <option value="{{$tipepegawai->kode_tipe_pegawai}}">{{$tipepegawai->kode_tipe_pegawai}} - {{$tipepegawai->nama_tipe_pegawai}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tahun_sk">Tahun SK</label>
                                    <select name="tahun_sk" class="form-control form-control" id="tahun_sk">
                                        <option>---Pilih---</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="no_urut_pegawai">No. Urut Pegawai</label>
                                    <select name="no_urut_pegawai" class="form-control form-control" id="no_urut_pegawai">
                                        <option>---Pilih---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-4 col-form-label">NIP</label>
                                    <div class="col-md-8 p-0" id="dnip">
                                        <input type="number" class="form-control input-full @error('nip') is-invalid @enderror" id="nip" name="nip" style="background-color:#E5EBFF;color: black;" disabled>
                                        @error('nip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-4 col-form-label">Nama Lengkap</label>
                                    <div class="col-md-8 p-0" id="dnama">
                                        <input type="text" class="form-control input-full @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" style="background-color:#E5EBFF; color: black;" disabled>
                                        @error('nama_lengkap')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="btn btn-danger" href="{{route('Karyawan.index')}}">Batal</a>
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
    $('#id_kepegawaian').change(function() {
        var id_kepegawaian = $(this).val();
        if (id_kepegawaian) {
            $.ajax({
                type: "GET",
                url: "/get/getSK?IDPegawai=" + id_kepegawaian,
                dataType: 'JSON',
                success: function(res) {
                    if (res) {
                        $("#tahun_sk").empty();
                        $("#tahun_sk").append('<option>---Pilih---</option>');
                        $.each(res, function(nama, kode) {
                            $("#tahun_sk").append('<option value="' + nama + '">' + nama + '</option>');
                        });
                    } else {
                        $("#tahun_sk").empty();
                    }
                }
            });
        } else {
            $("#tahun_sk").empty();
        }
    });

    $('#tahun_sk').change(function() {
        var tahunSK = $(this).val();
        var id_kepegawaian = $("#id_kepegawaian").val();
        if (tahunSK) {
            $.ajax({
                type: "GET",
                url: "/get/getNO/" + id_kepegawaian + "/" + tahunSK,
                dataType: 'JSON',
                success: function(res) {
                    if (res) {
                        $("#no_urut_pegawai").empty();
                        $("#no_urut_pegawai").append('<option>---Pilih---</option>');
                        $.each(res, function(nama, kode) {
                            $("#no_urut_pegawai").append('<option value="' + nama + '">' + nama + '</option>');
                        });
                    } else {
                        $("#no_urut_pegawai").empty();
                    }
                }
            });
        } else {
            $("#no_urut_pegawai").empty();
        }
    });

    $('#no_urut_pegawai').change(function() {
        var no_urut_pegawai = $(this).val();
        var id_kepegawaian = $("#id_kepegawaian").val();
        var tahun_sk = $("#tahun_sk").val();
        if (no_urut_pegawai) {
            $.ajax({
                type: "GET",
                url: "/get/getDataNip/" + id_kepegawaian + "/" + tahun_sk + "/" + no_urut_pegawai,
                dataType: 'JSON',
                success: function(res) {
                    if (res) {
                        $("#dnip").empty();
                        $("#dnama").empty();
                        $.each(res, function(nama, kode) {
                            $("#dnip").append('<input type="text" class="form-control input-full" id="nip" name="nip" value="' + kode + '" style="background-color:#E5EBFF;color: black;">');
                            $("#dnama").append('<input type="text" class="form-control input-full" id="nama_lengkap" name="nama_lengkap" value="' + nama + '" style="background-color:#E5EBFF; color: black;">');
                        });
                    } else {
                        $("#dnip").empty();
                        $("#dnama").empty();
                    }
                }
            });
        } else {
            $("#nip").empty();
            $("#dnama").empty();
        }
    });
</script>
@endpush