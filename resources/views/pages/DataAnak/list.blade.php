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
                <a href="{{route('Anak.list', $keluarga->id)}}">Data Anak</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Data Anak</div>
                </div>
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
                                <span class="nav-link" id="pills-profile-tab-icon">
                                    <span class="badge badge-count" style="background-color: white; color:black; font-weight:bold; border: 1px solid black; font-size:medium">2</span>
                                    Data Pasangan
                                </span>
                            </li>
                            <li class="nav-item col-md-4 text-center">
                                <span class="nav-link active" id="pills-contact-tab-icon">
                                    <span class="badge badge-count" style="background-color: white; color:black; font-weight:bold; border: 1px solid black; font-size:medium">3</span>
                                    Data Anak
                                </span>
                            </li>
                        </ul>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 col-lg-9"></div>
                        <div class="col-md-12 col-lg-2">
                            <a href="{{route('Anak.buat',$keluarga->id)}}" type="button" class="btn btn-primary btn-sm ml-auto">
                                <i class="fa fa-plus"></i>
                                Tambah Data Anak
                            </a>
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table id="list" class="display table table-hover">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if(!$a->isEmpty())
                                @foreach($a as $anak)
                                <tr style="white-space:nowrap; width:1%;">
                                    <td>{{$anak->nik}}</td>
                                    <td>{{$anak->nama_lengkap}}</td>
                                    <td>@if(!empty($anak->tanggal_lahir)) {{\Carbon\Carbon::parse($anak->tanggal_lahir)->format('d-m-Y')}} @endif</td>
                                    <td>{{$anak->jenis_kelamin}}</td>
                                    <td>
                                        <a href="{{route('Anak.edit', $anak->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Data">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button id="removedataanak" data-id="{{ $anak->id }}" data-toggle="tooltip" title="" class="btn btn-link btn-danger removedataanak" data-original-title="Hapus Data">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-action">
                    <a class="btn btn-danger" href="{{route('Pasangan.edit', $keluarga->id)}}">Sebelumnya</a>
                    <a class="btn btn-success" href="{{route('Keluarga.index')}}">Simpan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('plugin-scripts')
<script>
    $(document).ready(function() {
        $('#list').DataTable({
            "bLengthChange": false,
            "bInfo": false,
            "paginate": false,
            "autoWidth": true,
            fixedColumns: {
                leftColumns: 2
            },
        });
    });
</script>
<script>
    $('.removedataanak').click(function(e) {
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        swal({
            title: 'Hapus Data Anak?',
            text: "Apakah Anda yakin ingin menghapus Data ini",
            buttons: {
                cancel: {
                    visible: true,
                    text: 'Batal',
                    className: 'btn btn-focus'
                },
                confirm: {
                    text: 'Hapus',
                    className: 'btn btn-danger'
                }
            }
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'DELETE',
                    url: '/Anak/' + id,
                    data: {
                        "id": id,
                        "_token": token,
                    },
                }).done(function(data) {
                    swal({
                        title: 'Data berhasil terhapus',
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        }
                    }).then(function() {
                        location.reload();
                    })
                    $(".swal-modal").css('background-color', '#DCF4E6');
                }).fail(function(data) {
                    swal({
                        title: 'Data Gagal dihapus',
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        }
                    });
                    $(".swal-modal").css('background-color', '#F4E2E2');
                })
            } else {
                swal.close();
            }
        });
        $(".swal-modal").css('background-color', '#F4E2E2');
    })
</script>
@endpush