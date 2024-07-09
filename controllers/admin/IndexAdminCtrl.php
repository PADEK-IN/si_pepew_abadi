<?php

class IndexAdminCtrl {
    public function dashboard() {
        renderView('admin/dashboard/index');
    }

    public function anggota() {
        renderView('admin/anggota/list');
    }

}
