<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <ul class="breadcrumbs" style="margin:0;">
                <li class="nav-home">
                    <a href="/admin/dashboard">
                    <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <b>Admin</b>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Daftar List Admin</h4>
                        <div>
                        <a class="btn btn-sm btn-warning btn-round ms-auto" href="">
                                <i class="fas fa-file-alt"></i>
                                Print
                            </a>
                            <a class="btn btn-sm btn-primary btn-round ms-auto" href="/admin/create/admin">
                                <i class="fa fa-plus"></i>
                                Tambah Admin
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Tiger Nixon</td>
                                        <td>Architect</td>
                                        <td>
                                            <span class="badge badge-success">Admin</span>
                                        </td>
                                        <td>
                                            <a href="/admin/edit/admin" class="btn btn-sm btn-warning">Edit</a>
                                            <button 
                                            type="button" 
                                            class="btn btn-sm btn-danger" 
                                            onclick="confirmDeleteUser(this, 'Ingin Menghapus pengguna 1 ini!')">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Tiger Nixon</td>
                                        <td>Architect</td>
                                        <td>
                                            <span class="badge badge-primary">User</span>
                                        </td>
                                        <td>
                                            <a href="/admin/edit/admin" class="btn btn-sm btn-warning">Edit</a>
                                            <button 
                                            type="button" 
                                            class="btn btn-sm btn-danger" 
                                            onclick="confirmDeleteUser(this, 'Ingin Menghapus pengguna 2 ini!')">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>