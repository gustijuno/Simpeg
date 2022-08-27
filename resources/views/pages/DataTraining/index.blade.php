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
                <a href="{{route('Training.index')}}">Data Training</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-end">
                        <div class="col-md-6">
                            <h4 class="card-title">Data Training</h4>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary ml-1 btn-sm" data-toggle="modal" data-target="#importmodal">
                                <i class="fas fa-file-import"></i>
                                Import Data
                            </button>
                            <a href="{{route('Training.export')}}">
                                <button class="btn btn-primary ml-1 btn-sm">
                                    <i class="fas fa-file-export"></i>
                                    Eksport Data
                                </button>
                            </a>
                            <a class="btn btn-primary ml-1 btn-sm" href="{{route('Training.create')}}">
                                <i class="fa fa-plus"></i>
                                Tambah Data Training
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="importmodal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Import Data Training</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form method="POST" enctype="multipart/form-data" action="{{ route('Training.import') }}" id="myForm">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="file" class="form-control input-file" name="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary btn-sm" type="submit">
                                        Import
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabelTraining" class="display table table-hover">
                            <thead>
                                <tr>
                                    <th>NIP</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jumlah Keikutsertaan Training</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($t as $training)
                                <tr>
                                    <td style="white-space:nowrap; width:1%;">{{$training->nip}}</td>
                                    <td style="white-space:nowrap; width:1%;">{{$training->nama}}</td>
                                    <td style="white-space:nowrap; width:1%;">{{$training->jumlah}}</td>
                                    <td style="white-space:nowrap; width:1%;">
                                        <div class="form-button-action">
                                            <a href="{{route('Training.list', $training->id_pegawai)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Lihat Data">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <button type="button" data-id="{{$training->id_pegawai}}" id="remove" data-toggle="tooltip" title="" class="btn btn-link btn-danger deletetraining" data-original-title="Hapus Training">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </div>
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
        $('#tabelTraining').DataTable({
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
    $('.deletetraining').click(function(e) {
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        swal({
            title: 'Hapus Data Training?',
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
                    url: '/training/' + id + '/deleteall',
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