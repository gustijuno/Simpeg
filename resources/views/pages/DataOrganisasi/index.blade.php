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
                <a href="{{route('Organisasi.index')}}">Data Organisasi</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center" id="ch">
                    <div class="col-md-7">
                        <ul class="nav nav-tabs nav-primary" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                                    <i class="fas fa-sitemap">&nbsp Tree View</i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                                    <i class="fas fa-clipboard-list">&nbsp Form STO</i>
                                </a>
                            </li>
                        </ul>
                    </div>      
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary ml-1 btn-sm" data-toggle="modal" data-target="#importmodal">
                            <i class="fas fa-file-import"></i>
                                Import Data
                        </button>
                        <a href="{{route('Organisasi.export')}}">
                        <button class="btn btn-primary ml-1 btn-sm">
                            <i class="fas fa-file-export"></i>
                                Eksport Data
                            </button>
                        </a>
                         <a class="btn btn-primary ml-auto btn-sm" href="{{route('Organisasi.create')}}">
                            <i class="fa fa-plus"></i>
                               Tambah Organisasi
                         </a>
                    </div>
                </div>
            </div>
                <div class="modal fade" id="importmodal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Import Data Organisasi</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form method="POST" enctype="multipart/form-data" action="{{ route('Organisasi.import') }}" id="myForm">
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
                    <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>

                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="table-responsive">
                                <table id="DataOrganisasi" class="display table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Kode Organisasi</th>
                                            <th>Nama Organisasi</th>
                                            <th>Nama Pejabat</th>
                                            <th>Level Organisasi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($Organisasi as $o)
                                        <tr style="white-space:nowrap; width:1%;">
                                            <td>{{$o->kode_organisasi}}</td>
                                            <td>{{$o->nama_organisasi}}</td>
                                            <td>{{$o->nama_pejabat}}</td>
                                            <td>{{$o->level_organisasi}}</td>
                                            <td>
                                                <a href="{{route('Organisasi.edit', $o->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Data">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{route('Organisasi.show', $o->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Lihat Data">
                                                    <i class="fas fa-user"></i>
                                                </a>
                                                <button id="removeorganisasi" data-id="{{ $o->id }}" data-toggle="tooltip" title="" class="btn btn-link btn-danger removeorganisasi" data-original-title="Hapus Data">
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
    </div>
</div>
@endsection
@push('plugin-scripts')
<script>
    $(document).ready(function() {
        $('#DataOrganisasi').DataTable({
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
    $('.removeorganisasi').click(function(e) {
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        swal({
            title: 'Hapus Data Organisasi?',
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
                    url: '/Organisasi/' + id,
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