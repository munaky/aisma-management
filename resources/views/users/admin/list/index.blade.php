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
                                            style="width: 235.734px;">Jumlah</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1"
                                            aria-label="Warna Tersedia: activate to sort column ascending"
                                            style="width: 141.656px;">Satuan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1"
                                            aria-label="Warna Tersedia: activate to sort column ascending"
                                            style="width: 141.656px;">Harga Satuan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1"
                                            aria-label="Warna Tersedia: activate to sort column ascending"
                                            style="width: 141.656px;">Total</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Tanggal: activate to sort column ascending"
                                            style="width: 85.1094px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Nama</th>
                                        <th rowspan="1" colspan="1">Jumlah</th>
                                        <th rowspan="1" colspan="1">Satuan</th>
                                        <th rowspan="1" colspan="1">Harga Satuan</th>
                                        <th rowspan="1" colspan="1">Total</th>
                                        <th rowspan="1" colspan="1">Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($data as $i)
                                        <tr>
                                            <td class="sorting_1">{{ $i['name'] }}</td>
                                            <td>{{ $i['amount'] }}</td>
                                            <td>{{ $i['amount'] }}</td>
                                            <td>Rp. {{ $i['price'] }}</td>
                                            <td>Rp. {{ $i['total'] }}</td>
                                            <td><button type="button" class="btn btn-primary btn-sm edit-btn"
                                                    data-toggle="modal" data-target="#modalEdit" id="editBtn" onclick="editBtn({{ $i['id'] }})">Edit</button>
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

{{-- @include('users.admin.list.form')

@include('users.admin.list.script') --}}
