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
            <form method="POST" action="{{ url('admin/post/product/add') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label class="form-label">Pilih Gambar : </label>
                    <input type="file" name="image" placeholder="Enter Nama Murid" required>
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control mb-2" name="name" placeholder="Enter Nama" required>
                    <label class="form-label">Ukuran</label>
                    <input type="text" class="form-control mb-2" name="size" placeholder="Enter Ukuran" required>
                    <label class="form-label">Satuan</label>
                    <input type="text" class="form-control mb-2" name="unit" placeholder="Enter Satuan" required>
                    <label class="form-label">Stock</label>
                    <input type="number" class="form-control mb-2" name="stock" placeholder="Enter Stock" required>
                    <label class="form-label">Harga</label>
                    <input type="number" class="form-control mb-2" name="price" placeholder="Enter Harga" required>
                    <label class="form-label">Deskripsi</label>
                    <textarea type="text" class="form-control mb-2" name="description" placeholder="Enter Deskripsi" required> </textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="add">Simpan</button>
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
            <form method="POST" action="{{ url('admin/post/product/edit') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="text" class="d-none" value="" name="id">
                    <input type="text" class="d-none" value="" name="path">
                    <label class="form-label">Pilih Gambar : </label>
                    <input type="file" name="image">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control mb-2" name="name" value=""
                        placeholder="Enter Nama" required>
                    <label class="form-label">Ukuran</label>
                    <input type="text" class="form-control mb-2" name="size" placeholder="Enter Ukuran" required>
                    <label class="form-label">Satuan</label>
                    <input type="text" class="form-control mb-2" name="unit" placeholder="Enter Satuan" required>
                    <label class="form-label">Stock</label>
                    <input type="number" class="form-control mb-2" name="stock" placeholder="Enter Stock" required>
                    <label class="form-label">Harga</label>
                    <input type="number" class="form-control mb-2" name="price" placeholder="Enter Harga"
                        required>
                    <label class="form-label">Deskripsi</label>
                    <textarea type="text" class="form-control mb-2" name="description" placeholder="Enter Deskripsi" required> </textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
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
            <form method="POST" action="{{ url('admin/post/product/delete') }}">
                @csrf
                <div class="modal-body">
                    <input type="text" class="d-none" name="id" id="deleteId">
                    <div>
                        Apakah yakin ingin menghapus Data Tersebut??
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
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
                @csrf
                <div class="modal-body">
                    <input type="text" class="d-none" name="id">
                    <label class="form-label">Jumlah Barang</label>
                    <input type="number" class="form-control mb-2" name="amount" placeholder="Enter Jumlah Barang"
                        required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-warning">List</button>
                </div>
            </form>
        </div>
    </div>
</div>
