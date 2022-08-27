@extends('layout.master')
@section('statuskaryawan','active')
@section('statusdatatraining','active')
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
                <a href="{{route('Training.index')}}">Training</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('Training.edit', $training->id)}}">Edit Training</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Data Training</div>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ route('Training.update', $training->id) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="id_pegawai">Nama Karyawan</label>
                                    <select name="id_pegawai" class="form-control form-control @error('id_pegawai') is-invalid @enderror" required id="id_pegawai">
                                        <option value="">---Pilih---</option>
                                        @foreach($p as $pegawai)
                                        <option value="{{$pegawai->id}}" {{$training->id_pegawai == $pegawai->id ? 'selected' : ''}}>{{$pegawai->nip}} - {{$pegawai->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_pegawai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="jenis_training">Jenis Training</label>
                                    <input name="jenis_training" type="text" value="{{$training->jenis_training}}" class="form-control form-control @error('jenis_training') is-invalid @enderror" id="jenis_training">
                                    @error('jenis_training')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="penyelenggara">Penyelenggara</label>
                                    <input name="penyelenggara" type="text" value="{{$training->penyelenggara}}" class="form-control form-control @error('penyelenggara') is-invalid @enderror" id="penyelenggara">
                                    @error('penyelenggara')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="lokasi_training">Lokasi Training</label>
                                    <textarea class="form-control f3 @error('lokasi_training') is-invalid @enderror text-capitalize" name="lokasi_training" rows="5" id="lokasi_training_1" required oninvalid="this.setCustomValidity('Isi lokasi training terlebih dahulu')" oninput="setCustomValidity('')">{{$training->lokasi_training}}</textarea>
                                    <!-- <input name="lokasi_training" type="text" value="{{$training->lokasi_training}}" class="form-control form-control @error('lokasi_training') is-invalid @enderror" id="lokasi_training"> -->
                                    @error('lokasi_training')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="waktu_mulai_pelaksanaan">Tanggal Mulai</label>
                                    <input name="waktu_mulai_pelaksanaan" type="text" value="{{\Carbon\Carbon::parse($training->waktu_mulai_pelaksanaan)->format('d-m-Y')}}" class="form-control form-control @error('waktu_mulai_pelaksanaan') is-invalid @enderror" id="waktu_mulai_pelaksanaan">
                                    @error('waktu_mulai_pelaksanaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="waktu_selesai_pelaksanaan">Tanggal Selesai</label>
                                    <input name="waktu_selesai_pelaksanaan" type="text" value="{{\Carbon\Carbon::parse($training->waktu_selesai_pelaksanaan)->format('d-m-Y')}}" class="form-control form-control @error('waktu_selesai_pelaksanaan') is-invalid @enderror" id="waktu_selesai_pelaksanaan">
                                    @error('waktu_selesai_pelaksanaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="dokumen_data_training">Lampiran Dokumen</label>
                                    <input type="file" class="form-control input-file @error('dokumen_data_training') is-invalid @enderror" name="dokumen_data_training">
                                    @if(!empty($training->dokumen_data_training))
                                    <div class="text text-black">
                                        <div class="text-capitalize text-black">Dokumen tersimpan</div>
                                        <ul>
                                            <li><a href="{{ Storage::url($training->dokumen_data_training)}}">{{$training->pegawai->nip}} - {{$training->pegawai->nama}} - {{$training->jenis_training}}</a></li>
                                        </ul>
                                        <span class="text-danger text-capitalize text-small"> *** Kosongkan Lampiran jika tidak ingin mengubah</span>
                                    </div>
                                    @endif
                                    @error('dokumen_data_training')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- <div class="card">
                                    <div class="card-header" style="font-weight: bold;">Lampiran Dokumen</div>
                                    <div class="card-body bg-grey1 text-center">
                                        <div class="form-group mb-0">
                                            <div class="mb-0">
                                                <div class="image-area mt-0">
                                                    <img id="imageResult" src="{{ Storage::url($training->dokumen_data_training)}}" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                                                </div>
                                            </div>
                                            <div class="mb-0">
                                                <label for="upload" class="btn btn-grey m-0 rounded-pill px-4">Pilih Foto</label>
                                                <input name="dokumen_data_training" id="upload" type="file" onchange="readURL(this);" style="display: none;" class="form-control border-1">
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="btn btn-danger" href="{{route('Training.list', $training->id_pegawai)}}">Kembali</a>
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
        $('#waktu_mulai_pelaksanaan').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('#waktu_selesai_pelaksanaan').datepicker({
            format: 'dd-mm-yyyy'
        });
    });
</script>
@endpush