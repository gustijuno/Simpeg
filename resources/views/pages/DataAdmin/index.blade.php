@extends('layout.master')
@section('statusadmin','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Admin</h4>
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
                <a href="{{route('admin.index')}}">Admin</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Daftar Admin</h4>
                        <a class="btn btn-primary btn-round ml-auto" href="{{route('admin.create')}}">
                            <i class="fa fa-plus"></i>
                            Tambah Admin
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabelNip" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Username</th>
                                    <th>Tipe user</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $user)
                                <tr>
                                    <td style="white-space:nowrap; width:1%;">
                                        @if($user->foto == 'null')
                                        <img src="{{ asset('img/avatar.png')}}" alt="image profile" height="60" width="60" class="rounded">
                                        @else
                                        <img src="{{ Storage::url($user->foto)}}" alt="image profile" height="60" width="60" class="rounded">
                                        @endif
                                    </td>
                                    <td style="white-space:nowrap; width:1%;">{{$user->nama}}</td>
                                    <td style="white-space:nowrap; width:1%;">{{$user->tipe_user}}</td>
                                    <td style="white-space:nowrap; width:1%;">
                                        <a href="{{route('admin.edit', $user->id_user)}}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Admin">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('admin.show', $user->id_user)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Lihat Data">
                                            <i class="fas fa-user"></i>
                                        </a>

                                        <button type="submit" data-id="{{$user->id_user}}" id="remove" data-toggle="tooltip" title="" class="btn btn-link btn-danger removenip" data-original-title="Hapus Admin">
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
        $('#tabelUser').DataTable({});
    });

    $('.removenip').click(function(e) {
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        swal({
            title: 'Hapus Data Admin?',
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
                    url: '/admin/' + id,
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