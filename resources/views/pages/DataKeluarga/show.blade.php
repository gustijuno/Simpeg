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
                <a href="{{route('Keluarga.show', $keluarga->id)}}">Detail</a>

            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Detail Keluarga</div>
                </div>
                <div class="card-body">
                    <div class="row col-md-12">
                        <ul class="nav nav-pills nav-primary nav-pills-icons col-lg-12" id="pills-tab-with-icon" role="tablist">
                            <li class="nav-item col-md-4">
                                <a class="nav-link active text-center" id="pills-home-tab-icon" data-toggle="pill" href="#data-keluarga" role="tab" aria-controls="data-keluarga" aria-selected="true">
                                    <i class="flaticon-home"></i>
                                    Data Keluarga
                                </a>
                            </li>
                            <li class="nav-item col-md-4 text-center">
                                <a class="nav-link" id="pills-profile-tab-icon" data-toggle="pill" href="#data-pasangan" role="tab" aria-controls="data-pasangan" aria-selected="false">
                                    <i class="flaticon-users"></i>
                                    Data Pasangan
                                </a>
                            </li>
                            <li class="nav-item col-md-4 text-center">
                                <a class="nav-link" id="pills-contact-tab-icon" data-toggle="pill" href="#data-anak" role="tab" aria-controls="data-anak" aria-selected="false">
                                    <i class="flaticon-profile"></i>
                                    Data Anak
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content mt-2 mb-3" id="pills-with-icon-tabContent">
                        <div class="tab-pane fade show active" id="data-keluarga" role="tabpanel" aria-labelledby="pills-home-tab-icon">
                            <div class="row">
                                <div class="col-9">
                                    <div class="form-group form-inline">
                                        <label for="nama" class="col-md-4 col-form-label">Nama
                                            Lengkap</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$keluarga->pegawai->nama}}" class="form-control input-full" id="nama" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">No.KK</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$keluarga->no_kk}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;
																color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Status
                                            Pernikahan</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$keluarga->status_perkawinan}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;
																color: black;" disabled>
                                        </div>
                                    </div>
                                    <!-- Foto -->
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Dokumen KK</label>
                                        <div class="col-md-4 p-0">
                                            <a class="btn btn-primary btn-sm text-white" href="{{ Storage::url($keluarga->dokumen_kk)}}"> Download File PDF KK</a>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="data-pasangan" role="tabpanel" aria-labelledby="pills-profile-tab-icon">
                            @if($keluarga->status_perkawinan == "Menikah" && !empty($keluarga->pasangan->nama_lengkap))
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Nama Lengkap</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$keluarga->pasangan->nama_lengkap}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">No.KTP/NIK</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$keluarga->pasangan->nik}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Jenis Kelamin
                                        </label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$keluarga->pasangan->jenis_kelamin}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Tempat
                                            Lahir</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$keluarga->pasangan->tempat_lahir}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Tanggal
                                            Lahir</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{\Carbon\Carbon::parse($keluarga->pasangan->tanggal_lahir)->format('d-m-Y')}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Agama
                                        </label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$keluarga->pasangan->agama}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Pendidikan
                                        </label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$keluarga->pasangan->pendidikan}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Jenis Pekerjaan
                                        </label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$keluarga->pasangan->jenis_pekerjaan}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Status Pernikahan
                                        </label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$keluarga->pasangan->status_pernikahan}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Statu Hubungan Dalam Keluarga
                                        </label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$keluarga->pasangan->status_hubungan_dalam_keluarga}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Kewarganegaraan
                                        </label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$keluarga->pasangan->kewarganegaraan}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">No.KITAP
                                        </label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$keluarga->pasangan->no_kitap}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">No.Passport
                                        </label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$keluarga->pasangan->no_passport}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Nama Ayah
                                        </label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$keluarga->pasangan->nama_ayah}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Nama Ibu
                                        </label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$keluarga->pasangan->nama_ibu}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <br>
                            <h1 class="text-center">Status: {{$keluarga->status_perkawinan}}</h1>
                            <h1 class="text-center">Klik <span class="badge badge-primary"><a class="text-white" href="{{route('Keluarga.edit',$keluarga->id)}}">Edit Keluarga</a></span> untuk mengubah</h1>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="data-anak" role="tabpanel" aria-labelledby="pills-contact-tab-icon">
                            <div class="row">
                                <div class="col-md-12 col-lg-9"></div>
                            </div>
                            <br>
                            @if($a->isNotEmpty())
                            <div class="table-responsive">
                                <table id="list" class="display table table-hover">
                                    <thead>
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama Lengkap</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($a as $anak)

                                        <tr style="white-space:nowrap; width:1%;">
                                            <td>{{$anak->nik}}</td>
                                            <td>{{$anak->nama_lengkap}}</td>
                                            <td>{{\Carbon\Carbon::parse($anak->tanggal_lahir)->format('d-m-Y')}}</td>
                                            <td>{{$anak->jenis_kelamin}}</td>
                                            <td>

                                                <a href="{{route('Anak.edit', $anak->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Data">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{route('Anak.show', $anak->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Detail">
                                                    <i class="fas fa-user"></i>
                                                </a>
                                                <button id="removedataanak" data-id="{{ $anak->id }}" data-toggle="tooltip" title="" class="btn btn-link btn-danger removedataanak" data-original-title="Hapus Data">
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <br>
                            @if($keluarga->status_anak == 'Ada')
                            <h1 class="text-center">Status: Belum Input Data Anak</h1>
                            <h1 class="text-center">Klik <span class="badge badge-primary"><a class="text-white" href="{{route('Anak.list',$keluarga->id)}}">Edit Anak</a></span> untuk mengubah</h1>
                            @elseif($keluarga->status_anak == 'Tidak Ada')
                            <h1 class="text-center">Status: Belum Mempunyai Anak</h1>
                            <h1 class="text-center">Klik <span class="badge badge-primary"><a class="text-white" href="{{route('Keluarga.edit',$keluarga->id)}}">Edit Keluarga</a></span> untuk mengubah</h1>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <a class="btn btn-danger" href="{{route('Keluarga.index')}}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('plugin-scripts')
<!-- <script>
    var myState = {
        pdf: null,
        currentPage: 1,
        zoom: 1
    }

    pdfjsLib.getDocument('{{ Storage::url($keluarga->dokumen_kk)}}').then((pdf) => {

        myState.pdf = pdf;
        render();

    });

    function render() {
        myState.pdf.getPage(myState.currentPage).then((page) => {

            var canvas = document.getElementById("pdf_renderer");
            var ctx = canvas.getContext('2d');

            var viewport = page.getViewport(myState.zoom);

            canvas.width = viewport.width;
            canvas.height = viewport.height;

            page.render({
                canvasContext: ctx,
                viewport: viewport
            });
        });
    }
</script> -->
@endpush