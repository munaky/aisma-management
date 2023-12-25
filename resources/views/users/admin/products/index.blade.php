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
                                            <td>Rp. {{ $i->price }}</td>
                                            <td><button type="button" class="btn btn-primary btn-sm edit-btn"
                                                    data-toggle="modal" data-target="#modalEdit">Edit</button>
                                                <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                    data-id="` + data[x].id_murid + `" data-toggle="modal"
                                                    data-target="#modalDelete">Hapus</button>
                                                <button type="button" class="btn btn-warning btn-sm delete-btn"
                                                    data-id="` + data[x].id_murid + `" data-toggle="modal"
                                                    data-target="#modalList">List</button>
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

<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ url('admin/post/product/add') }}">
                <div class="modal-body">
                    <label class="form-label">Pilih Gambar : </label>
                    <input type="file" name="image" placeholder="Enter Nama Murid" required>
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control mb-2" name="name" placeholder="Enter Nama"
                        required>
                    <label class="form-label">Ukuran</label>
                    <input type="text" class="form-control mb-2" name="size" placeholder="Enter Ukuran"
                        required>
                    <label class="form-label">Stock</label>
                    <input type="number" class="form-control mb-2" name="stock" placeholder="Enter Stock"
                        required>
                    <label class="form-label">Harga</label>
                    <input type="number" class="form-control mb-2" name="price" placeholder="Enter Harga"
                        required>
                    <label class="form-label">Deskripsi</label>
                    <textarea type="text" class="form-control mb-2" name="description" placeholder="Enter Deskripsi" required> </textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="add">Save
                        changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ url('admin/post/product/edit') }}">
                <div class="modal-body">
                    <label class="form-label">Pilih Gambar : </label>
                    <input type="file" name="image" placeholder="Enter Nama Murid" required>
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control mb-2" name="name" placeholder="Enter Nama"
                        required>
                    <label class="form-label">Ukuran</label>
                    <input type="text" class="form-control mb-2" name="size" placeholder="Enter Ukuran"
                        required>
                    <label class="form-label">Stock</label>
                    <input type="number" class="form-control mb-2" name="stock" placeholder="Enter Stock"
                        required>
                    <label class="form-label">Harga</label>
                    <input type="number" class="form-control mb-2" name="price" placeholder="Enter Harga"
                        required>
                    <label class="form-label">Deskripsi</label>
                    <textarea type="text" class="form-control mb-2" name="description" placeholder="Enter Deskripsi" required> </textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="update"
                        data-dismiss="modal">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" class="d-none" value="" id="deleteId">
                <div>
                    Apakah yakin ingin menghapus Data Tersebut??
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" id="delete" data-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal List -->
<div class="modal fade" id="modalList" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Catat Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ url('admin/post/product/list') }}">
                <div class="modal-body">
                    <input type="text" class="d-none" value="" id="listId">
                    <label class="form-label">Jumlah Barang</label>
                    <input type="number" class="form-control mb-2" name="amount" placeholder="Enter Jumlah Barang"
                        required>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" id="delete" data-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>
