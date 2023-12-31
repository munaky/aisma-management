<!-- Modal Next -->
<div class="modal fade" id="modalNext" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Isi Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ url('admin/post/list/history') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label class="form-label">Pembeli</label>
                    <input type="text" class="form-control mb-2" name="client" value=""
                        placeholder="Enter Pembeli" required>
                    <label class="form-label">Direktur</label>
                    <input type="text" class="form-control mb-2" name="director" value="Muhammad Fadillah Ramadhan"
                        placeholder="Enter Direktur" required>
                    <label class="form-label">Operasional Manajer</label>
                    <input type="text" class="form-control mb-2" name="manager" value="Rahmat Ismail"
                        placeholder="Enter Operasional Manajer" required>
                    <label class="form-label">Kontak</label>
                    <input type="text" class="form-control mb-2" name="contact" value="0821 1371 1793 / 0812 9691 5033"
                        placeholder="Enter Kontak" required>
                    <label class="form-label">Dikirim Melalui</label>
                    <input type="text" class="form-control mb-2" name="sent_via" value="Mobil"
                        placeholder="Enter Dikirim Melalui" required>
                    <label class="form-label">Nama Pengemudi</label>
                    <input type="text" class="form-control mb-2" name="driver_name" value=""
                        placeholder="Enter Nama Pengemudi">
                    <label class="form-label">Total</label>
                    <input type="text" class="form-control mb-2" name="total" value=""
                        placeholder="Enter Total" required>
                    <textarea type="text" class="form-control mb-2" name="total_word" value="" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="add">Selesai</button>
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
            <form method="POST" action="{{ url('admin/post/list/edit') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="text" class="d-none" value="" name="id">
                    <label class="form-label">Jumlah Barang</label>
                    <input type="number" class="form-control mb-2" name="amount" placeholder="Enter Jumlah" required>
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
            <form method="POST" action="{{ url('admin/post/list/delete') }}">
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
