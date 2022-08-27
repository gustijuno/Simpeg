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
                <a href="{{route('Anak.edit', $anak->id)}}">Edit Data Anak</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Data Anak</div>
                </div>
                <form method="POST" action="{{ route('Anak.update', $anak->id) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="pegawai">Pegawai</label>
                                    <input type="text" value="{{$keluarga->pegawai->nip}}-{{$keluarga->pegawai->nama}}" name="pegawai" class="form-control @error('pegawai') is-invalid @enderror" id="pegawai" disabled>
                                    <input type="text" value="{{$keluarga->id}}" name="id_keluarga" class="form-control @error('id_keluarga') is-invalid @enderror" id="id_keluarga" hidden>
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" value="{{$anak->nama_lengkap}}" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" @if($errors->has('nama_lengkap')) autofocus @endif>
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
                                        <option value="Laki-Laki" {{$anak->jenis_kelamin == 'Laki-Laki' ? 'selected' : ''}}>Laki-Laki</option>
                                        <option value="Perempuan" {{$anak->jenis_kelamin == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" value="{{$anak->tempat_lahir}}" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" @if($errors->has('tempat_lahir')) autofocus @endif>
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
                                        <option value="Belum Sekolah" {{$anak->pendidikan == 'Belum Sekolah' ? 'selected' : ''}}>Belum Sekolah</option>
                                        <option value="PAUD" {{$anak->pendidikan == 'PAUD' ? 'selected' : ''}}>Paud</option>
                                        <option value="SD" {{$anak->pendidikan == 'SD' ? 'selected' : ''}}>SD</option>
                                        <option value="SMP" {{$anak->pendidikan == 'SMP' ? 'selected' : ''}}>SMP</option>
                                        <option value="SMA" {{$anak->pendidikan == 'SMA' ? 'selected' : ''}}>SMA</option>
                                        <option value="S1" {{$anak->pendidikan == 'S1' ? 'selected' : ''}}>S1</option>
                                        <option value="S2" {{$anak->pendidikan == 'S2' ? 'selected' : ''}}>S2</option>
                                        <option value="D3" {{$anak->pendidikan == 'D3' ? 'selected' : ''}}>D3</option>
                                        <option value="D4" {{$anak->pendidikan == 'D4' ? 'selected' : ''}}>D4</option>
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
                                        <option value="Belum Menikah" {{$anak->status_pernikahan == 'Belum Menikah' ? 'selected' : ''}}>Belum Menikah</option>
                                        <option value="Menikah" {{$anak->status_pernikahan == 'Menikah' ? 'selected' : ''}}>Menikah</option>
                                    </select>
                                    @error('status_pernikahan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kewarganegaraan">Kewarganegaraan</label>
                                    <input type="text" value="{{$anak->kewarganegaraan}}" class="form-control @error('kewarganegaraan') is-invalid @enderror" @if($errors->has('kewarganegaraan')) autofocus @endif name="kewarganegaraan" id="kewarganegaraan">
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
                                    <input type="text" value="{{$keluarga->no_kk}}" name="no_kk" class="form-control @error('nama_lengkap') is-invalid @enderror" id="no_kk" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK / No. KTP</label>
                                    <input type="text" value="{{$anak->nik}}" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" @if($errors->has('nik')) autofocus @endif>
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
                                        <option value="Islam" {{$anak->agama == 'Islam' ? 'selected' : ''}}>Islam</option>
                                        <option value="Kristen" {{$anak->agama == 'Kristen' ? 'selected' : ''}}>Kristen</option>
                                        <option value="Katolik" {{$anak->agama == 'Katolik' ? 'selected' : ''}}>Katolik</option>
                                        <option value="Hindu" {{$anak->agama == 'Hindu' ? 'selected' : ''}}>Hindu</option>
                                        <option value="Buddha" {{$anak->agama == 'Buddha' ? 'selected' : ''}}>Buddha</option>
                                        <option value="Konghucu" {{$anak->agama == 'Konghucu' ? 'selected' : ''}}>Konghucu</option>
                                    </select>
                                    @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="text" value="@if(!empty($anak->tanggal_lahir)) {{\Carbon\Carbon::parse($anak->tanggal_lahir)->format('d-m-Y')}} @endif" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror tanggal_lahir" id="tanggal_lahir" @if($errors->has('tanggal_lahir')) autofocus @endif>
                                    @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
                                    <input required class="form-control @error('jenis_pekerjaan') is-invalid @enderror" value="{{$anak->jenis_pekerjaan}}" name="jenis_pekerjaan" id="jenis_pekerjaan" list="jenis_pekerjaan_list" @if($errors->has('jenis_pekerjaan')) autofocus @endif>
                                    <datalist id="jenis_pekerjaan_list">
                                        <option value="">--- Pilih ---</option>
                                        <option value="Pelajar">Pelajar</option>
                                        <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                        <option value="Wiraswasta">Wiraswasta</option>
                                        <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
                                        <option value="Pengusaha">Pengusaha</option>
                                        <option value="Dokter">Dokter</option>
                                        <option value="Polisi">Polisi</option>
                                        <option value="Tidak Bekerja">Tidak Bekerja</option>
                                    </datalist>
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
                                        <option value="Anak" {{$anak->status_hubungan_dalam_keluarga == 'Anak' ? 'selected' : ''}}>Anak</option>
                                        <option value="Istri" {{$anak->status_hubungan_dalam_keluarga == 'Istri' ? 'selected' : ''}}>Istri</option>
                                        <option value="Suami" {{$anak->status_hubungan_dalam_keluarga == 'Suami' ? 'selected' : ''}}>Suami</option>
                                    </select>
                                    @error('status_hubungan_dalam_keluarga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_kitap">No. KITAP</label>
                                    <input type="text" value="{{$anak->no_kitap}}" name="no_kitap" class="form-control @error('no_kitap') is-invalid @enderror" id="no_kitap" @if($errors->has('no_kitap')) autofocus @endif>
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
                                    <input type="text" value="{{$anak->no_passport}}" name="no_passport" class="form-control @error('no_passport') is-invalid @enderror" id="no_passport" @if($errors->has('no_passport')) autofocus @endif>
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
                                    <input type="text" value="{{$anak->nama_ayah}}" name="nama_ayah" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah" @if($errors->has('nama_ayah')) autofocus @endif>
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
                                    <input type="text" value="{{$anak->nama_ibu}}" name="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" @if($errors->has('nama_ibu')) autofocus @endif>
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
                        <a class="btn btn-danger" href="{{route('Anak.list',$anak->id_keluarga)}}">Kembali</a>
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
        $('.tanggal_lahir').datepicker({
            format: 'dd-mm-yyyy'
        });
    });
</script>
@endpush