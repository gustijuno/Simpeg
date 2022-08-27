@extends('layout.master')
@section('tipepegawai','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Tipe Pegawai</h4>
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
                <a href="{{route('tipePegawai.index')}}">Tipe Pegawai</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('tipePegawai.index')}}">Data Tipe Pegawai</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center" id="ch">
                        <h4 class="card-title">Tipe Pegawai</h4>
                        <a class="btn btn-primary ml-auto btn-sm" href="{{route('tipePegawai.create')}}">
                            <i class="fa fa-plus"></i>
                            Tipe Pegawai
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tipePegawai" class="display table table-hover">
                            <thead>
                                <tr>
                                    <th>Kode Tipe Pegawai</th>
                                    <th>Nama Tipe Pegawai</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Pegawai as $p)
                                <tr style="white-space:nowrap; width:1%;">
                                    <td>{{$p->kode_tipe_pegawai}}</td>
                                    <td>{{$p->nama_tipe_pegawai}}</td>
                                    <td>
                                        <a href="{{route('tipePegawai.edit', $p->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Data">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button id="removepegawai" data-id="{{ $p->id }}" data-toggle="tooltip" title="" class="btn btn-link btn-danger show_confirm" data-original-title="Hapus Data">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('plugin-scripts')
<script>
    $(document).ready(function() {
        $('#tipePegawai').DataTable({
            "bLengthChange": false,
            "bInfo": false,
            "paginate": false,
            "autoWidth": true,
            fixedColumns: {
                leftColumns: 1
            },
        });
    });
</script>
<script>
    $('.show_confirm').click(function(e) {
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        swal({
            title: 'Hapus Data Tipe Pegawai?',
            text: "Apakah Anda yakin ingin menghapus Data ini",
            type: 'warning',
            background: 'red',
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
                    url: '/tipePegawai/' + id,
                    data: {
                        "id": id,
                        "_token": token,
                    },
                }).done(function(data) {
                    swal("Data berhasil terhapus", {
                        icon: "success",
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
                    swal("Data Gagal dihapus", {
                        icon: "danger",
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