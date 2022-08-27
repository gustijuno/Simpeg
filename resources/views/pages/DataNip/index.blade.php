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
                <a href="{{route('NIP.index')}}">Data NIP</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="col-md-8">
                            <h4 class="card-title">Data Data NIP</h4>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-primary ml-1 btn-sm" data-toggle="modal" data-target="#exportmodal">
                                <i class="fas fa-file-export"></i>Eksport Data
                            </button>
                            <a class="btn btn-primary ml-1 btn-sm" href="{{route('NIP.create')}}">
                                <i class="fa fa-plus"></i>
                                Tambah Data NIP
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exportmodal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Eksport Data Karyawan</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form method="POST" enctype="multipart/form-data" action="{{ route('NIP.export') }}" id="myForm">
                                @csrf
                                <div class="modal-body">
                                    <div class="col-12">
                                        <div class="form-group form-inline">
                                            <label for="tahun_sk" class="col-md-4 col-form-label">Tahun SK</label>
                                            <div class="col-md-8 p-0">
                                                <select name="tahun_sk" class="form-control input-full" id="tahun_sk">
                                                    <option value="">---Pilih---</option>
                                                    @foreach($sk as $tahun_sk)
                                                    <option value="{{$tahun_sk['tahun_sk']}}">{{$tahun_sk['tahun_sk']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group form-inline">
                                            <label for="id_kepegawaian" class="col-md-4 col-form-label">ID Kepegawaian</label>
                                            <div class="col-md-8 p-0">
                                                <select name="id_kepegawaian" class="form-control input-full" id="id_kepegawaian">
                                                    <option value="">---Pilih---</option>
                                                    @foreach($tp as $tipe)
                                                    <option value="{{$tipe->kode_tipe_pegawai}}">{{$tipe->kode_tipe_pegawai}} - {{$tipe->nama_tipe_pegawai}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="text-warning text-capitalize">*Kosongkan pilihan untuk eksport semua data</small>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary btn-sm" type="submit">
                                        Eksport
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabelNip" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>NIP</th>
                                    <th>Nama Karyawan</th>
                                    @if(Auth::user()->tipe_user == 'superadmin')
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($n as $nip)
                                <tr>
                                    <td style="white-space:nowrap; width:1%;">{{$nip->id_kepegawaian}}{{$nip->tahun_sk}}{{$nip->no_urut_pegawai}}</td>
                                    <td style="white-space:nowrap; width:1%;">{{$nip->nama_lengkap}}</td>
                                    @if(Auth::user()->tipe_user == 'superadmin')
                                    <td style="white-space:nowrap; width:1%;">
                                        <div class="form-button-action">
                                            <a href="{{route('NIP.edit', $nip->id)}}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit NIP">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>

                                            <!-- <button type="submit" data-id="{{$nip->id}}" id="remove" data-toggle="tooltip" title="" class="btn btn-link btn-danger removenip" data-original-title="Hapus NIP">
                                                <i class="fa fa-trash-alt"></i>
                                            </button> -->
                                        </div>
                                    </td>
                                    @endif
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
        $('#tabelNip').DataTable({});
    });

    // $('.removenip').click(function(e) {
    //     var id = $(this).data("id");
    //     var token = $("meta[name='csrf-token']").attr("content");
    //     swal({
    //         title: 'Hapus Data NIP?',
    //         text: "Apakah Anda yakin ingin menghapus Data ini",
    //         buttons: {
    //             cancel: {
    //                 visible: true,
    //                 text: 'Batal',
    //                 className: 'btn btn-focus'
    //             },
    //             confirm: {
    //                 text: 'Hapus',
    //                 className: 'btn btn-danger'
    //             }
    //         }
    //     }).then((willDelete) => {
    //         if (willDelete) {
    //             $.ajax({
    //                 type: 'DELETE',
    //                 url: '/NIP/' + id,
    //                 data: {
    //                     "id": id,
    //                     "_token": token,
    //                 },
    //             }).done(function(data) {
    //                 swal({
    //                     title: 'Data berhasil terhapus',
    //                     buttons: {
    //                         confirm: {
    //                             className: 'btn btn-success'
    //                         }
    //                     }
    //                 }).then(function() {
    //                     location.reload();
    //                 })
    //                 $(".swal-modal").css('background-color', '#DCF4E6');
    //             }).fail(function(data) {
    //                 swal({
    //                     title: 'Data Gagal dihapus',
    //                     buttons: {
    //                         confirm: {
    //                             className: 'btn btn-success'
    //                         }
    //                     }
    //                 });
    //                 $(".swal-modal").css('background-color', '#F4E2E2');
    //             })
    //         } else {
    //             swal.close();
    //         }
    //     });
    //     $(".swal-modal").css('background-color', '#F4E2E2');
    // })
</script>
@endpush