<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List Produk</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="m-0 font-weight-bold text-primary">List Produk</h6>
                </div>
                <div class="col-6 text-right">
                    <button type="button" class="btn btn-success btn-sm delete-btn" data-toggle="modal"
                        data-target="#modalAdd">Tambah Produk</button>
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
                                            style="width: 141.766px;">Nama Barang</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Deskripsi: activate to sort column ascending"
                                            style="width: 235.734px;">Ukuran</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1"
                                            aria-label="Warna Tersedia: activate to sort column ascending"
                                            style="width: 141.656px;">Stok</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1"
                                            aria-label="Warna Tersedia: activate to sort column ascending"
                                            style="width: 141.656px;">Terjual</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Terjual: activate to sort column ascending"
                                            style="width: 65.5156px;">Harga</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Tanggal: activate to sort column ascending"
                                            style="width: 85.1094px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Nama Barang</th>
                                        <th rowspan="1" colspan="1">Ukuran</th>
                                        <th rowspan="1" colspan="1">Stok</th>
                                        <th rowspan="1" colspan="1">Terjual</th>
                                        <th rowspan="1" colspan="1">Harga</th>
                                        <th rowspan="1" colspan="1">Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($data as $i)
                                        <tr>
                                            <td class="sorting_1">{{ $i->name }}</td>
                                            <td>{{ $i->size }}</td>
                                            <td>{{ $i->stock }}</td>
                                            <td>{{ $i->sold }}</td>
                                            <td>Rp. {{ $i->price_idr }}</td>
                                            <td><button type="button" class="btn btn-primary btn-sm edit-btn"
                                                    data-toggle="modal" data-target="#modalEdit" id="editBtn" onclick="editBtn({{ json_encode($i) }})">Edit</button>
                                                <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                    data-toggle="modal" data-target="#modalDelete" id="delBtn" onclick="delBtn({{ $i->id }})">Hapus</button>
                                                <button type="button" class="btn btn-warning btn-sm delete-btn"
                                                    data-toggle="modal" data-target="#modalList" id="listBtn" onclick="listBtn({{ $i->id }})">List</button>
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

@include('users.admin.employees.form')

@include('users.admin.employees.script')
