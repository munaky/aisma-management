<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List Karyawan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="m-0 font-weight-bold text-primary">List Karyawan</h6>
                </div>
                <div class="col-6 text-right">
                    <button type="button" class="btn btn-success btn-sm delete-btn" data-toggle="modal"
                        data-target="#modalAdd">Tambah Karyawan</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Nama Barang: activate to sort column descending"
                                            style="width: 141.766px;">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Deskripsi: activate to sort column ascending"
                                            style="width: 235.734px;">Role</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1"
                                            aria-label="Warna Tersedia: activate to sort column ascending"
                                            style="width: 141.656px;">ID Kartu</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1"
                                            aria-label="Warna Tersedia: activate to sort column ascending"
                                            style="width: 141.656px;">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Terjual: activate to sort column ascending"
                                            style="width: 65.5156px;">Jam Hadir</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Tanggal: activate to sort column ascending"
                                            style="width: 85.1094px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Nama</th>
                                        <th rowspan="1" colspan="1">Role</th>
                                        <th rowspan="1" colspan="1">ID Kartu</th>
                                        <th rowspan="1" colspan="1">Status</th>
                                        <th rowspan="1" colspan="1">Jam Hadir</th>
                                        <th rowspan="1" colspan="1">Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($data['employees'] as $i)
                                        <tr>
                                            <td class="sorting_1">{{ $i->name }}</td>
                                            <td>{{ $i->role->name }}</td>
                                            <td>{{ $i->card->uid }}</td>
                                            <td>{{ $i->attendance ? 'Hadir' : '-' }}</td>
                                            <td>{{ $i->attendance->time ?? '-' }}</td>
                                            <td><button type="button" class="btn btn-primary btn-sm edit-btn"
                                                    data-toggle="modal" data-target="#modalEdit" id="editBtn" onclick="editBtn({{ json_encode($i) }})">Edit</button>
                                                <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                    data-toggle="modal" data-target="#modalDelete" id="delBtn" onclick="delBtn({{ $i->id }})">Hapus</button>
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

@include('users.admin.employees.form', ['data' => $data['role']])

@include('users.admin.employees.script')
