@extends('layout.master')
@section('statusorganisasi','active')
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
                <a href="{{route('Organisasi.create')}}">Tambah Organisasi</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Data Organisasi</div>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ route('Organisasi.store') }}" id="myForm">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 col-lg-5">
                                <div class="form-group">
                                    <label for="kode_organisasi">Kode Organisasi</label>
                                    <input name="kode_organisasi" type="text" class="form-control form-control" id="kode_organisasi">
                                </div>
                                <div class="form-group">
                                    <label for="level_organisasi">Level Organisasi</label>
                                    <input name="level_organisasi" type="text" class="form-control form-control" id="level_organisasi">
                                </div>

                                <div class="form-group">
                                    <label for="nama_pejabat">Nama Pejabat</label>
                                    <input name="nama_pejabat" type="text" class="form-control form-control" id="nama_pejabat">
                                </div>
                            </div>

                            <div class="col-md-5 col-lg-5">
                                <div class="form-group">
                                    <label for="nama_organisasi">Nama Organisasi</label>
                                    <input name="nama_organisasi" type="text" class="form-control form-control" id="nama_organisasi">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input name="status" type="text" class="form-control form-control" id="status">
                                </div>
                                <div class="form-group">
                                    <label for="status_pejabat">Status Pejabat</label>
                                    <input name="status_pejabat" type="text" class="form-control form-control" id="status_pejabat">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-lg-5">
                                <div class="card">
                                    <div class="card-header" style="font-weight: bold;">Jobdesk</div>
                                    <div class="card-body bg-grey1 text-center">
                                        <div class="form-group mb-0">
                                            <div class="mb-0">
                                                <div class="image-area mt-0">
                                                    <img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                                                </div>
                                            </div>
                                            <div class="mb-0">
                                                <label for="upload" class="btn btn-grey m-0 rounded-pill px-2">Pilih Foto</label>
                                                <input name="jobdesk" id="upload" type="file" onchange="readURL(this);" style="display: none;" class="form-control border-0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="btn btn-danger" href="{{route('Organisasi.index')}}">Batal</a>
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
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imageResult')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(function() {
        $('#upload').on('change', function() {
            readURL(input);
        });
    });
    /*  ==========================================
        SHOW UPLOADED IMAGE NAME
    * ========================================== */
    var input = document.getElementById('upload');
    var infoArea = document.getElementById('upload-label');
    input.addEventListener('change', showFileName);

    function showFileName(event) {
        var input = event.srcElement;
        var fileName = input.files[0].name;
        infoArea.textContent = 'File name: ' + fileName;
    }
</script>
@endpush