@extends('layout.master')
@section('statusnip','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">NIP</h4>
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
                <a href="{{route('NIP.index')}}">NIP</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('NIP.edit', $nip->id)}}">Edit NIP</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit NIP</div>
                </div>
                <form method="POST" action="{{ route('NIP.update', $nip->id) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" value="{{$nip->nama_lengkap}}" class="form-control form-control" id="nama_lengkap">
                                </div>
                                <div class="form-group">
                                    <label for="tahun_sk">Tahun SK</label>
                                    <input type="text" name="tahun_sk" value="{{$nip->tahun_sk}}" class="form-control form-control" id="tahun_sk" list="list_sk">
                                    <datalist id="list_sk">
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="id_kepegawaian">ID Kepegawaian</label>
                                    <select name="id_kepegawaian" class="form-control form-control" id="id_kepegawaian">
                                        <option value="">---Pilih---</option>
                                        <option value="94" {{$nip->id_kepegawaian == '94' ? 'selected' : ''}}>94</option>
                                        <option value="61" {{$nip->id_kepegawaian == '61' ? 'selected' : ''}}>61</option>
                                        <option value="64" {{$nip->id_kepegawaian == '64' ? 'selected' : ''}}>64</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="no_urut_pegawai">No. Urut Pegawai</label>
                                    <input type="text" name="no_urut_pegawai" value="{{$nip->no_urut_pegawai}}" onchange="nourutchange()" class="form-control form-control" id="no_urut_pegawai">
                                    <div id="warn_no_urut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="btn btn-danger" href="{{route('NIP.index')}}">Batal</a>
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
                url: "/getSK?IDPegawai=" + id_kepegawaian,
                dataType: 'JSON',
                success: function(res) {
                    if (res) {
                        $("#list_sk").empty();
                        $("#list_sk").append('<option>---Pilih---</option>');
                        $.each(res, function(nama, kode) {
                            $("#list_sk").append('<option value="' + nama + '">' + nama + '</option>');
                        });
                    } else {
                        $("#list_sk").empty();
                    }
                }
            });
        } else {
            $("#list_sk").empty();
        }
    });

    function nourutchange() {
        var id_kepegawaian = $("#id_kepegawaian").val();
        var tahun_sk = $("#tahun_sk").val();
        var no_urut_pegawai = $('#no_urut_pegawai').val();
        if (no_urut_pegawai) {
            $.ajax({
                type: "GET",
                url: "/ceknip/" + id_kepegawaian + "/" + tahun_sk + "/" + no_urut_pegawai,
                dataType: 'JSON',
                success: function(res) {
                    if (res) {
                        $("#warn_no_urut").empty();
                        $.each(res, function(key, value) {
                            $("#warn_no_urut").append('<small id="keterangan" class="form-text text-' + key + '" >' + value + '</small>');
                            return
                        });
                    } else {
                        $("#warn_no_urut").empty();
                    }
                }
            })
        } else {
            $("#warn_no_urut").empty();
        }
    };
</script>
@endpush