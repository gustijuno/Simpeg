@extends('layout.master')
@section('statusjabatan','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Jabatan</h4>
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
                <a href="{{route('Jabatan.index')}}">Jabatan</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('Jabatan.index')}}">Data Jabatan</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center" id="ch">
                        <h4 class="card-title">Data Jabatan</h4>
                        <a class="btn btn-primary ml-auto btn-sm" href="{{route('Jabatan.create')}}">
                            <i class="fa fa-plus"></i>
                            Tambah Jabatan
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabelJabatan" class="display table table-hover">
                            <thead>
                                <tr>
                                    <th>Kode Jabatan</th>
                                    <th>Nama Jabatan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Jabatan as $j)
                                <tr style="white-space:nowrap; width:1%;">
                                    <td>{{$j->kode_jabatan}}</td>
                                    <td>{{$j->nama_jabatan}}</td>
                                    <td>
                                        @if($j->status == "Aktif")
                                        <span class="badge text-success text-bold" style="background-color: #F1FFE5; border: 1px solid #2AD000">{{$j->status}}</span>
                                        @else
                                        <span class="badge text-danger text-bold" style="background-color: #FFE5E7; border: 1px solid #DA1E28">{{$j->status}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('Jabatan.edit', $j->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Data">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button data-id="{{ $j->id }}" data-toggle="tooltip" title="" class="btn btn-link btn-danger hapusjabatan" data-original-title="Hapus Data">
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
        $('#tabelJabatan').DataTable({
            "bLengthChange": false,
            "bInfo": false,
            "paginate": false,
            "autoWidth": true,
            fixedColumns: {
                leftColumns: 1
            },
        });
    });

    $('.hapusjabatan').click(function(e) {
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        swal({
            title: 'Hapus Data Jabatan?',
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
                    url: '/Jabatan/' + id,
                    data: {
                        "id": id,
                        "_token": token,
                    },
                }).done(function(data) {
                    swal("Data berhasil terhapus", {
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