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
            <form method="POST" action="{{ url('admin/post/employee/add') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control mb-2" name="name" value=""
                        placeholder="Enter Nama" required>
                    <label class="form-label">Role</label>
                    <select class="form-control mb-2" name="role_id" id="exampleFormControlSelect1">
                        <option class="d-none" selected>Pilih Role</option>
                        @foreach ($data as $i)
                            <option value="{{ $i->id }}">{{ $i->name }}</option>
                        @endforeach
                    </select>
                    <label class="form-label">ID Kartu</label>
                    <input type="text" class="form-control mb-2" name="card_uid" placeholder="Enter ID Kartu"
                        required>
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
            <form method="POST" action="{{ url('admin/post/employee/edit') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="text" class="d-none" value="" name="id">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control mb-2" name="name" value=""
                        placeholder="Enter Nama" required>
                    <label class="form-label">Role</label>
                    <select class="form-control mb-2" name="role_id" id="exampleFormControlSelect1">
                        <option class="d-none" selected>Pilih Role</option>
                        @foreach ($data as $i)
                            <option value="{{ $i->id }}">{{ $i->name }}</option>
                        @endforeach
                    </select>
                    <label class="form-label">ID Kartu</label>
                    <input type="text" class="form-control mb-2" name="card_uid" placeholder="Enter ID Kartu"
                        required>
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
            <form method="POST" action="{{ url('admin/post/employee/delete') }}">
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
