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
                <a href="{{route('Pasangan.buat', $keluarga->id)}}">Edit Data Pasangan</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Data Pasangan</div>
                </div>
                <form method="POST" action="{{ route('Pasangan.update', $keluarga->pasangan->id) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row col-md-12">
                            <ul class="nav nav-pills nav-primary nav-pills-icons col-lg-12" id="pills-tab-with-icon" role="tablist">
                                <li class="nav-item col-md-4">
                                    <span class="nav-link text-center" id="pills-home-tab-icon">
                                        <span class="badge badge-count" style="background-color: white; color:black; font-weight:bold; border: 1px solid black; font-size:medium">1</span>
                                        Data Keluarga
                                    </span>
                                </li>
                                <li class="nav-item col-md-4 text-center">
                                    <span class="nav-link active" id="pills-profile-tab-icon">
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
                                    <label for="id_keluarga">Pegawai</label>
                                    <input type="text" value="{{$keluarga->pegawai->nip}}-{{$keluarga->pegawai->nama}}" name="pegawai" class="form-control" id="pegawai" disabled>
                                    <input type="text" value="{{$keluarga->id}}" name="id_keluarga" class="form-control" id="id_keluarga" hidden>
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" value="{{$keluarga->pasangan->nama_lengkap}}" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" @if($errors->has('nama_lengkap')) autofocus @endif>
                                    @error('nama_lengkap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin" @if($errors->has('jenis_kelamin')) autofocus @endif>
                                        <option value="">--- Pilih ---</option>
                                        <option value="Laki-Laki" {{ $keluarga->pasangan->jenis_kelamin == 'Laki-Laki' ? 'selected' : ''}}>Laki-Laki</option>
                                        <option value="Perempuan" {{ $keluarga->pasangan->jenis_kelamin == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" value="@if(empty($keluarga->pasangan->tempat_lahir)){{old('tempat_lahir')}}@else{{$keluarga->pasangan->tempat_lahir}}@endif" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" @if($errors->has('tempat_lahir')) autofocus @endif>
                                    @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan">Pendidikan</label>
                                    <select class="form-control @error('pendidikan') is-invalid @enderror" name="pendidikan" id="pendidikan" @if($errors->has('pendidikan')) autofocus @endif>
                                        <option value="">--- Pilih ---</option>
                                        <option value="PAUD" {{$keluarga->pasangan->pendidikan == 'PAUD' ? 'selected' : ''}}>Paud</option>
                                        <option value="TK" {{$keluarga->pasangan->pendidikan == 'TK' ? 'selected' : ''}}>TK</option>
                                        <option value="SD" {{$keluarga->pasangan->pendidikan == 'SD' ? 'selected' : ''}}>SD</option>
                                        <option value="SMP" {{$keluarga->pasangan->pendidikan == 'SMP' ? 'selected' : ''}}>SMP</option>
                                        <option value="SMA" {{$keluarga->pasangan->pendidikan == 'SMA' ? 'selected' : ''}}>SMA</option>
                                        <option value="S1" {{$keluarga->pasangan->pendidikan == 'S1' ? 'selected' : ''}}>S1</option>
                                        <option value="S2" {{$keluarga->pasangan->pendidikan == 'S2' ? 'selected' : ''}}>S2</option>
                                        <option value="D3" {{$keluarga->pasangan->pendidikan == 'D3' ? 'selected' : ''}}>D3</option>
                                        <option value="D4" {{$keluarga->pasangan->pendidikan == 'D4' ? 'selected' : ''}}>D4</option>
                                    </select>
                                    @error('pendidikan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status_pernikahan">Status Pernikahan</label>
                                    <select class="form-control @error('status_pernikahan') is-invalid @enderror" name="status_pernikahan" id="status_pernikahan" @if($errors->has('status_pernikahan')) autofocus @endif>
                                        <option value="">--- Pilih ---</option>
                                        <option value="Belum Menikah" {{$keluarga->pasangan->status_pernikahan == 'Belum Menikah' ? 'selected' : ''}}>Belum Menikah</option>
                                        <option value="Menikah" {{$keluarga->pasangan->status_pernikahan == 'Menikah' ? 'selected' : ''}}>Menikah</option>
                                    </select>
                                    @error('status_pernikahan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kewarganegaraan">Kewarganegaraan</label>
                                    <input type="text" value="@if(empty($keluarga->pasangan->kewarganegaraan)){{old('kewarganegaraan')}}@else{{$keluarga->pasangan->kewarganegaraan}}@endif" class="form-control @error('kewarganegaraan') is-invalid @enderror" name="kewarganegaraan" id="kewarganegaraan" @if($errors->has('kewarganegaraan')) autofocus @endif>
                                    @error('kewarganegaraan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="no_kk">Nomor Kartu Keluarga</label>
                                    <input type="text" value="{{$keluarga->no_kk}}" name="no_kk" class="form-control @error('no_kk') is-invalid @enderror" id="no_kk" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK / No. KTP</label>
                                    <input type="text" value="@if(empty($keluarga->pasangan->nik)){{old('nik')}}@else{{$keluarga->pasangan->nik}}@endif" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" @if($errors->has('nik')) autofocus @endif>
                                    @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select name="agama" class="form-control @error('agama') is-invalid @enderror" id="agama" @if($errors->has('agama')) autofocus @endif>
                                        <option value="">--- Pilih ---</option>
                                        <option value="Islam" {{$keluarga->pasangan->agama == 'Islam' ? 'selected' : ''}}>Islam</option>
                                        <option value="Kristen" {{$keluarga->pasangan->agama == 'Kristen' ? 'selected' : ''}}>Kristen</option>
                                        <option value="Katolik" {{$keluarga->pasangan->agama == 'Katolik' ? 'selected' : ''}}>Katolik</option>
                                        <option value="Hindu" {{$keluarga->pasangan->agama == 'Hindu' ? 'selected' : ''}}>Hindu</option>
                                        <option value="Buddha" {{$keluarga->pasangan->agama == 'Buddha' ? 'selected' : ''}}>Buddha</option>
                                        <option value="Konghucu" {{$keluarga->pasangan->agama == 'Konghucu' ? 'selected' : ''}}>Konghucu</option>
                                    </select>
                                    @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="text" value="@if(empty($keluarga->pasangan->tanggal_lahir)){{ old('tanggal_lahir') }}@else{{\Carbon\Carbon::parse($keluarga->pasangan->tanggal_lahir)->format('d-m-Y')}}@endif" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" @if($errors->has('tanggal_lahir')) autofocus @endif>
                                    @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
                                    <select class="form-control @error('jenis_pekerjaan') is-invalid @enderror" name="jenis_pekerjaan" id="jenis_pekerjaan" @if($errors->has('jenis_pekerjaan')) autofocus @endif>
                                        <option value="">--- Pilih ---</option>
                                        <option value="Ibu Rumah Tangga" {{$keluarga->pasangan->jenis_pekerjaan == 'Ibu Rumah Tangga' ? 'selected' : ''}}>Ibu Rumah Tangga</option>
                                        <option value="Wiraswasta" {{$keluarga->pasangan->jenis_pekerjaan == 'Wiraswasta' ? 'selected' : ''}}>Wiraswasta</option>
                                        <option value="Pegawai Negeri Sipil" {{$keluarga->pasangan->jenis_pekerjaan == 'Pegawai Negeri Sipil' ? 'selected' : ''}}>Pegawai Negeri Sipil</option>
                                        <option value="Pengusaha" {{$keluarga->pasangan->jenis_pekerjaan == 'Pengusaha' ? 'selected' : ''}}>Pengusaha</option>
                                        <option value="Dokter" {{$keluarga->pasangan->jenis_pekerjaan == 'Dokter' ? 'selected' : ''}}>Dokter</option>
                                        <option value="Polisi" {{$keluarga->pasangan->jenis_pekerjaan == 'Polisi' ? 'selected' : ''}}>Polisi</option>
                                        <option value="Tidak Bekerja" {{$keluarga->pasangan->jenis_pekerjaan == 'Tidak Bekerja' ? 'selected' : ''}}>Tidak Bekerja</option>
                                    </select>
                                    @error('jenis_pekerjaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status_hubungan_dalam_keluarga">Status Hubungan Dalam Keluarga</label>
                                    <select class="form-control @error('status_hubungan_dalam_keluarga') is-invalid @enderror" name="status_hubungan_dalam_keluarga" id="status_hubungan_dalam_keluarga" @if($errors->has('status_hubungan_dalam_keluarga')) autofocus @endif>
                                        <option value="">--- Pilih ---</option>
                                        <option value="Istri" {{$keluarga->pasangan->status_hubungan_dalam_keluarga == 'Istri' ? 'selected' : ''}}>Istri</option>
                                        <option value="Suami" {{$keluarga->pasangan->status_hubungan_dalam_keluarga == 'Suami' ? 'selected' : ''}}>Suami</option>
                                    </select>
                                    @error('status_hubungan_dalam_keluarga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_kitap">No. KITAP</label>
                                    <input type="text" value="@if(empty($keluarga->pasangan->no_kitap)){{ old('no_kitap') }}@else{{$keluarga->pasangan->no_kitap}}@endif" name="no_kitap" class="form-control @error('no_kitap') is-invalid @enderror" id="no_kitap" @if($errors->has('no_kitap')) autofocus @endif>
                                    @error('no_kitap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="no_passport">No. Passport</label>
                                    <input type="text" value="@if(empty($keluarga->pasangan->no_passport)){{ old('no_passport') }}@else{{$keluarga->pasangan->no_passport}}@endif" name="no_passport" class="form-control @error('no_passport') is-invalid @enderror" id="no_passport" @if($errors->has('no_passport')) autofocus @endif>
                                    @error('no_passport')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="nama_ayah">Nama Ayah</label>
                                    <input type="text" value="@if(empty($keluarga->pasangan->nama_ayah)){{ old('nama_ayah') }}@else{{$keluarga->pasangan->nama_ayah}}@endif" name="nama_ayah" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah" @if($errors->has('nama_ayah')) autofocus @endif>
                                    @error('nama_ayah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="nama_ibu">Nama Ibu</label>
                                    <input type="text" value="@if(empty($keluarga->pasangan->nama_ibu)){{ old('nama_ibu') }}@else{{$keluarga->pasangan->nama_ibu}}@endif" name="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" @if($errors->has('nama_ibu')) autofocus @endif>
                                    @error('nama_ibu')
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
    $(document).ready(function() {
        $('#tanggal_lahir').datepicker({
            format: 'dd-mm-yyyy'
        });
        var status = "{{$keluarga->status_anak}}";
        if (status == "Ada") {
            $("#btnns").html('Selanjutnya');
        } else if (status == "Tidak Ada") {
            $("#btnns").html('Simpan');
        }
    });
</script>
@endpush