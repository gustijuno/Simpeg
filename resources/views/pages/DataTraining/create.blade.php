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
                <a href="{{route('Training.create')}}">Tambah Training</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Data Training</div>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ route('Training.store') }}" id="myForm">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="id_pegawai">Nama Karyawan</label>
                                    <select name="id_pegawai" class="form-control f0 @error('id_pegawai') is-invalid @enderror" required id="id_pegawai">
                                        <option value="">---Pilih---</option>
                                        @foreach($p as $pegawai)
                                        <option value="{{$pegawai->id}}">{{$pegawai->nip}} - {{$pegawai->nama}}</option>
                                        @endforeach
                                    </select>
                                    <span class="invalid-feedback a0" role="alert">
                                        <strong>Pilih Pegawai Dulu!!!</strong>
                                    </span>
                                    @error('id_pegawai')
                                    <span class="invalid-feedback a" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 col-lg-10"></div>
                            <div class="col-md-12 col-lg-2">
                                <button type="button" class="btn btn-primary btn-sm ml-auto tambahTraining">
                                    <i class="fa fa-plus"></i>
                                    Tambah Training
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="containerTraining">
                            <div class="training1">
                                <br>
                                <div class="row">
                                    <div class="col-md-6 col-lg-8 ml-2">
                                        <span class="h2">Data ke-1</span>
                                        <!-- <a type="button" data-toggle="tooltip" onclick="hapustraining()" data-id="1" class="btn btn-link btn-danger hapustraining" data-original-title="Hapus Data Training">
                                            <i class="fa fa-trash-alt"></i>
                                        </a> -->
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="jenis_training_1">Jenis Training</label>
                                            <input name="jenis_training_1" type="text" class="form-control f1 @error('jenis_training') is-invalid @enderror" id="jenis_training_1" required oninvalid="this.setCustomValidity('Isi jenis training terlebih dahulu')" oninput="setCustomValidity('')">
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong>Jenis Training Tidak Boleh Kosong!!</strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="penyelenggara_1">Penyelenggara</label>
                                            <input name="penyelenggara_1" type="text" class="form-control f2 @error('penyelenggara') is-invalid @enderror" id="penyelenggara_1" required oninvalid="this.setCustomValidity('Isi penyelenggara terlebih dahulu')" oninput="setCustomValidity('')">
                                            <span class="invalid-feedback a2" role="alert">
                                                <strong>Penyelenggara Tidak Boleh Kosong!!</strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="lokasi_training_1">Lokasi Training</label>
                                            <textarea class="form-control f3 @error('lokasi_training') is-invalid @enderror text-capitalize" name="lokasi_training_1" rows="5" id="lokasi_training_1" required oninvalid="this.setCustomValidity('Isi lokasi training terlebih dahulu')" oninput="setCustomValidity('')"></textarea>
                                            <!-- <input name="lokasi_training_1" type="text" class="form-control f3 @error('lokasi_training') is-invalid @enderror" id="lokasi_training_1"> -->
                                            <span class="invalid-feedback a3" role="alert">
                                                <strong>Lokasi Training Tidak Boleh Kosong!!</strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="waktu_mulai_pelaksanaan_1">Tanggal Mulai</label>
                                            <input name="waktu_mulai_pelaksanaan_1" type="text" class="form-control f4 @error('waktu_mulai_pelaksanaan') is-invalid @enderror" id="waktu_mulai_pelaksanaan_1" required onemptied="this.setCustomValidity('Isi waktu mulai pelaksanaan terlebih dahulu')" oninput="setCustomValidity('')">
                                            <span class="invalid-feedback a4" role="alert">
                                                <strong>Tanggal Mulai Tidak Boleh Kosong!!</strong>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="waktu_selesai_pelaksanaan_1">Tanggal Selesai</label>
                                            <input name="waktu_selesai_pelaksanaan_1" type="text" class="form-control f5 @error('waktu_selesai_pelaksanaan') is-invalid @enderror" id="waktu_selesai_pelaksanaan_1" required onemptied="this.setCustomValidity('Isi waktu selesai pelaksanaan terlebih dahulu')" oninput="setCustomValidity('')">
                                            <span class="invalid-feedback a5" role="alert">
                                                <strong>Tanggal Selesai Tidak Boleh Kosong!!</strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="dokumen_data_training_1">Lampiran Dokumen</label>
                                            <input type="file" class="form-control f6" id="dokumen_data_training_1" name="dokumen_data_training_1" required oninvalid="this.setCustomValidity('upload lampiran dokumen terlebih dahulu')" oninput="setCustomValidity('')">
                                            <span class="invalid-feedback a6" role="alert">
                                                <strong>Lampiran Dokumen Tidak Boleh Kosong!!</strong>
                                            </span>
                                        </div>
                                        <!-- <div class="card">
                                            <div class="card-header" style="font-weight: bold;">Lampiran Dokumen</div>
                                            <div class="card-body bg-grey1 text-center">
                                                <div class="form-group mb-0">
                                                    <div class="mb-0">
                                                        <div class="image-area mt-0">
                                                            <img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                                                        </div>
                                                    </div>
                                                    <div class="mb-0">
                                                        <label for="upload" class="btn btn-grey m-0 rounded-pill px-4">Pilih Foto</label>
                                                        <input name="dokumen_data_training_1" id="upload" type="file" onchange="readURL(this);" style="display: none;" class="form-control border-1 f6">
                                                    </div>
                                                </div>
                                                <span class="invalid-feedback a6" role="alert">
                                                    <strong>Lampiran Dokumen Tidak Boleh Kosong!!</strong>
                                                </span>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <input name="jumlah" value="1" type="text" class="form-control jumlahtrn" id="jumlah" hidden>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="btn btn-danger" href="{{route('Training.index')}}">Batal</a>
                        <button type="submit" class="btn btn-success submit">Simpan</button>
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
        $('#waktu_mulai_pelaksanaan_1').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('#waktu_selesai_pelaksanaan_1').datepicker({
            format: 'dd-mm-yyyy'
        });
    });

    function validateForm() {
        var isValid = true;
        $('.form-control').each(function() {
            if ($(this).val() === '')
                isValid = false;
        });
        return isValid;
    }

    $('.submit').click(function() {
        var jml = $('.jumlahtrn').val();
        var i = 1;
        var j = 1;

        if ($.trim($('.f0').val()) === '') {
            $('.a0').show();
            $('.f0').focus();
            return false;
        } else {
            $('.a0').hide();
        }
        while (i <= jml) {
            while (j <= (jml * 6)) {
                if ($.trim($('.f' + j).val()) === '') {
                    if (j === (jml * 6)) {
                        $('.a' + j).show();
                        return false;
                    } else {
                        $('.a' + j).show();
                    }
                } else {
                    $('.a' + j).hide();
                    if (validateForm()) {
                        return true;
                    }
                }
                j++;
            }
            i++;
        }
    });

    // function readURL(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();
    //         reader.onload = function(e) {
    //             $('#imageResult')
    //                 .attr('src', e.target.result);
    //         };
    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
    // $(function() {
    //     $('#upload').on('change', function() {
    //         readURL(input);
    //     });
    // });
    // /*  ==========================================
    //     SHOW UPLOADED IMAGE NAME
    // * ========================================== */
    // var input = document.getElementById('upload');
    // var infoArea = document.getElementById('upload-label');
    // input.addEventListener('change', showFileName);

    // function showFileName(event) {
    //     var input = event.srcElement;
    //     var fileName = input.files[0].name;
    //     infoArea.textContent = 'File name: ' + fileName;
    // }

    $(document).ready(function() {
        var batas = 10;
        var containerTraining = $(".containerTraining");
        var tambah_training_button = $(".tambahTraining");
        var x = 1;
        $(tambah_training_button).click(function(e) {
            e.preventDefault();
            if (x < batas) {
                x++;
                $(containerTraining).append(`<br><hr><br><div class="training` + x + `">
                                            <div class="row">
                                                <div class="col-md-6 col-lg-8 ml-2">
                                                    <span class="h2">Data ke-` + x + `</span>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="jenis_training_` + x + `">Jenis Training</label>
                                                        <input name="jenis_training_` + x + `" type="text"
                                                            class="form-control f7 @error('jenis_training') is-invalid @enderror"
                                                            id="jenis_training_` + x + `" required oninvalid="this.setCustomValidity('Isi jenis training terlebih dahulu')" oninput="setCustomValidity('')">
                                                        <span class="invalid-feedback a7" role="alert">
                                                            <strong>Jenis Training Tidak Boleh Kosong!!</strong>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="penyelenggara_` + x + `">Penyelenggara</label>
                                                        <input name="penyelenggara_` + x + `" type="text"
                                                            class="form-control f8 @error('penyelenggara') is-invalid @enderror" id="penyelenggara_` + x + `" required oninvalid="this.setCustomValidity('Isi penyelenggara terlebih dahulu')" oninput="setCustomValidity('')">
                                                        <span class="invalid-feedback a8" role="alert">
                                                            <strong>Penyelenggara Tidak Boleh Kosong!!</strong>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="lokasi_training_` + x + `">Lokasi Training</label>
                                                        <textarea class="form-control f9 @error('lokasi_training') is-invalid @enderror text-capitalize" name="lokasi_training_` + x + `" rows="5" id="lokasi_training_` + x + `" required oninvalid="this.setCustomValidity('Isi lokasi training terlebih dahulu')" oninput="setCustomValidity('')"></textarea>
                                                        <span class="invalid-feedback a9" role="alert">
                                                            <strong>Lokasi Training Tidak Boleh Kosong!!</strong>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="waktu_mulai_pelaksanaan_` + x + `">Tanggal Mulai</label>
                                                        <input name="waktu_mulai_pelaksanaan_` + x + `" type="text"
                                                            class="form-control f10 @error('waktu_mulai_pelaksanaan') is-invalid @enderror"
                                                            id="waktu_mulai_pelaksanaan_` + x + `" required onemptied="this.setCustomValidity('Isi waktu mulai pelaksanaan terlebih dahulu')" oninput="setCustomValidity('')">
                                                        <span class="invalid-feedback a10" role="alert">
                                                            <strong>Tanggal Mulai Tidak Boleh Kosong!!</strong>
                                                        </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="waktu_selesai_pelaksanaan_` + x + `">Tanggal Selesai</label>
                                                        <input name="waktu_selesai_pelaksanaan_` + x + `" type="text"
                                                            class="form-control f11 @error('waktu_selesai_pelaksanaan') is-invalid @enderror"
                                                            id="waktu_selesai_pelaksanaan_` + x + `" required onemptied="this.setCustomValidity('Isi waktu selesai pelaksanaan terlebih dahulu')" oninput="setCustomValidity('')">
                                                        <span class="invalid-feedback a11" role="alert">
                                                            <strong>Tanggal Selesai Tidak Boleh Kosong!!</strong>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="dokumen_data_training_` + x + `">Lampiran Dokumen</label>
                                                    <input type="file" class="form-control f12" name="dokumen_data_training_` + x + `" required oninvalid="this.setCustomValidity('Upload lampiran dokumen terlebih dahulu')" oninput="setCustomValidity('')">
                                                    <span class="invalid-feedback a12" role="alert">
                                                        <strong>Lampiran Dokumen Tidak Boleh Kosong!!</strong>
                                                    </span>
                                                </div>
                                                </div>
                                            </div>
                                        </div>`); //add input
                $('.jumlahtrn').attr('value', x);
                $('#waktu_mulai_pelaksanaan_' + x).datepicker({
                    format: 'dd-mm-yyyy'
                });
                $('#waktu_selesai_pelaksanaan_' + x).datepicker({
                    format: 'dd-mm-yyyy'
                });

                // function bacaUrl(input) {
                //     if (input.files && input.files[0]) {
                //         var reader = new FileReader();
                //         reader.onload = function(e) {
                //             $('#imageResult_' + x).attr('src', e.target.result);
                //         };
                //         reader.readAsDataURL(input.files[0]);
                //     }
                // }
                // $(function() {
                //     $('#upload_' + x).on('change', function() {
                //         bacaUrl(input);
                //     });
                // });
                // /*  ==========================================
                //     SHOW UPLOADED IMAGE NAME
                // * ========================================== */
                // var input = document.getElementById('upload_' + x);
                // var infoArea = document.getElementById('upload-label_' + x);
                // input.addEventListener('change', showFileName);

                // function showFileName(event) {
                //     var input = event.srcElement;
                //     var fileName = input.files[0].name;
                //     infoArea.textContent = 'File name: ' + fileName;
                // }
            } else {
                alert('You Reached the limits')
            }
        });
    });
</script>
@endpush