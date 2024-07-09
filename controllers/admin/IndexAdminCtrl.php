<?php

class IndexAdminCtrl {
    public function dashboard() {
        renderView('admin/dashboard/index');
    }

    public function anggota() {
        renderView('admin/anggota/list');
    }

    public function tambahAnggota() {
        renderView('admin/anggota/create');
    }

    public function editAnggota() {
        renderView('admin/anggota/edit');
    }

}
