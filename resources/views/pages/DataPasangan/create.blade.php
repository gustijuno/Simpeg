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
                <a href="{{route('Pasangan.edit', $keluarga->id)}}">Tambah Data Pasangan</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Data Pasangan</div>
                </div>
                <form method="POST" action="{{ route('Pasangan.store') }}" id="myForm">
                    @csrf
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
                            <div class="col-md-6 col-lg-">
                                <div class="form-group">
                                    <label for="id_keluarga">Pegawai</label>
                                    <input type="text" value="{{$keluarga->pegawai->nip}}-{{$keluarga->pegawai->nama}}" name="pegawai" class="form-control" id="pegawai" disabled>
                                    <input type="text" value="{{$keluarga->id}}" name="id_keluarga" class="form-control" id="id_keluarga" hidden>
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input @if($errors->has('nama_lengkap')) autofocus @endif value="{{old('nama_lengkap')}}" type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap">
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
                                        <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : ''}}>Laki-Laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input @if($errors->has('tempat_lahir')) autofocus @endif value="{{old('tempat_lahir')}}" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir">
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
                                        <option value="Belum Sekolah" {{old('pendidikan') == 'Belum Sekolah' ? 'selected' : ''}}>Belum Sekolah</option>
                                        <option value="PAUD" {{old('pendidikan') == 'PAUD' ? 'selected' : ''}}>Paud</option>
                                        <option value="TK" {{old('pendidikan') == 'TK' ? 'selected' : ''}}>TK</option>
                                        <option value="SD" {{old('pendidikan') == 'SD' ? 'selected' : ''}}>SD</option>
                                        <option value="SMP" {{old('pendidikan') == 'SMP' ? 'selected' : ''}}>SMP</option>
                                        <option value="SMA" {{old('pendidikan') == 'SMA' ? 'selected' : ''}}>SMA</option>
                                        <option value="S1" {{old('pendidikan') == 'S1' ? 'selected' : ''}}>S1</option>
                                        <option value="S2" {{old('pendidikan') == 'S2' ? 'selected' : ''}}>S2</option>
                                        <option value="D3" {{old('pendidikan') == 'D3' ? 'selected' : ''}}>D3</option>
                                        <option value="D4" {{old('pendidikan') == 'D4' ? 'selected' : ''}}>D4</option>
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
                                        <option value="Belum Menikah" {{old('status_pernikahan') == 'Belum Menikah' ? 'selected' : ''}}>Belum Menikah</option>
                                        <option value="Menikah" {{old('status_pernikahan') == 'Menikah' ? 'selected' : ''}}>Menikah</option>
                                    </select>
                                    @error('status_pernikahan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kewarganegaraan">Kewarganegaraan</label>
                                    <input @if($errors->has('kewarganegaraan')) autofocus @endif value="{{old('kewarganegaraan')}}" type="text" class="form-control @error('kewarganegaraan') is-invalid @enderror" name="kewarganegaraan" id="kewarganegaraan">
                                    @error('kewarganegaraan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-">
                                <div class="form-group">
                                    <label for="no_kk">Nomor Kartu Keluarga</label>
                                    <input readonly type="text" value="{{$keluarga->no_kk}}" name="no_kk" class="form-control" id="no_kk">
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK / No. KTP</label>
                                    <input @if($errors->has('nik')) autofocus @endif value="{{old('nik')}}" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik">
                                    @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select @if($errors->has('agama')) autofocus @endif name="agama" class="form-control @error('agama') is-invalid @enderror" id="agama">
                                        <option value="">--- Pilih ---</option>
                                        <option value="Islam" {{old('agama') == 'Islam' ? 'selected' : ''}}>Islam</option>
                                        <option value="Kristen" {{old('agama') == 'Kristen' ? 'selected' : ''}}>Kristen</option>
                                        <option value="Katolik" {{old('agama') == 'Katolik' ? 'selected' : ''}}>Katolik</option>
                                        <option value="Hindu" {{old('agama') == 'Hindu' ? 'selected' : ''}}>Hindu</option>
                                        <option value="Buddha" {{old('agama') == 'Buddha' ? 'selected' : ''}}>Buddha</option>
                                        <option value="Konghucu" {{old('agama') == 'Konghucu' ? 'selected' : ''}}>Konghucu</option>
                                    </select>
                                    @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input @if($errors->has('tanggal_lahir')) autofocus @endif value="{{old('tanggal_lahir')}}" type="text" name="tanggal_lahir" class="form-control tanggal_lahir @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir">
                                    @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
                                    <input @if($errors->has('jenis_pekerjaan')) autofocus @endif class="form-control @error('jenis_pekerjaan') is-invalid @enderror" value="{{old('jenis_pekerjaan')}}" name="jenis_pekerjaan" id="jenis_pekerjaan" list="jenis_pekerjaan_list">
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
                                    <select @if($errors->has('status_hubungan_dalam_keluarga')) autofocus @endif class="form-control @error('status_hubungan_dalam_keluarga') is-invalid @enderror" name="status_hubungan_dalam_keluarga" id="status_hubungan_dalam_keluarga">
                                        <option value="">--- Pilih ---</option>
                                        <option value="Anak" {{old('status_hubungan_dalam_keluarga') == 'Anak' ? 'selected':''}}>Anak</option>
                                        <option value="Istri" {{old('status_hubungan_dalam_keluarga') == 'Istri' ? 'selected':''}}>Istri</option>
                                        <option value="Suami" {{old('status_hubungan_dalam_keluarga') == 'Suami' ? 'selected':''}}>Suami</option>
                                    </select>
                                    @error('status_hubungan_dalam_keluarga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_kitap">No. KITAP</label>
                                    <input @if($errors->has('no_kitap')) autofocus @endif value="{{old('no_kitap')}}" type="text" name="no_kitap" class="form-control @error('no_kitap') is-invalid @enderror" id="no_kitap">
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
                                    <input value="{{old('no_passport')}}" type="text" name="no_passport" class="form-control @error('no_passport') is-invalid @enderror" id="no_passport" @if($errors->has('no_passport')) autofocus @endif>
                                    @error('no_passport')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-">
                                <div class="form-group">
                                    <label for="nama_ayah">Nama Ayah</label>
                                    <input @if($errors->has('nama_ayah')) autofocus @endif type="text" name="nama_ayah" value="{{old('nama_ayah')}}" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah">
                                    @error('nama_ayah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-">
                                <div class="form-group">
                                    <label for="nama_ibu">Nama Ibu</label>
                                    <input @if($errors->has('nama_ibu')) autofocus @endif type="text" name="nama_ibu" value="{{old('nama_ibu')}}" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu">
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