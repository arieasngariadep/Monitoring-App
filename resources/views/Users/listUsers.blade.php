@extends('layout.index')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="#">Users</a></li>
        <li class="breadcrumb-item active">List Users</li>
    </ol>
@endsection('breadcrumbs')

@section('title', 'List Users')
@section('titleTab', 'List Users')

@section('content')
<div class="row">
    <div class="col-lg-12 col-xl-12">
        <?php if($alert): ?>
        <div class="card m-b-30">
            <div class="card-body">
                <?= $alert ?>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary" href="{{ route('formAddUser') }}">
                    <i class="fas fa-user-plus"></i>&nbsp;&nbsp;Tambah User
                </a>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Kelompok</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $no = 1;
                            foreach($userList as $list){
                                $button = "
                                <a target='_blank' href='".route('formUpdateUser', ['id' => $list->userId])."' class='btn btn-outline-warning' data-toggle='tooltip' data-placement='top' title='' data-original-title='Edit'>
                                    <i class='fas fa-pencil-alt'></i>
                                </a> |
                                <a href='".route('prosesDeleteUser', ['id' => $list->userId])."' class='btn btn-outline-danger' data-toggle='tooltip' data-placement='top' title='' data-original-title='Hapus'>
                                    <i class='fas fa-trash-alt'></i>
                                </a>";
                                echo "
                                    <tr>
                                        <td>$no</td>
                                        <td>$list->username</td>
                                        <td>$list->email</td>
                                        <td>$list->role_name</td>
                                        <td>$list->kelompok</td>
                                        <td class='text-center'>$button</td>
                                    </tr>
                                ";
                                $no++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection('content')