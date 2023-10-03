{{-- Modal Tambah --}}
<div class="modal fade" id="formBarangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="barang" method="post">
                    @csrf
                    <div id="method"></div>
                    <div class="method"></div>

                    <div class="form-group row">
                        <label for="kode_barang" class="col-sm-4 col-form-label">Kode</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode Barang">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="produk_id" class="col-sm-4 col-form-label">Produk</label>
                        <div class="col-sm-8">
                            <select name="produk_id" id="produk_id" class="form-control" required>
                                <option value="">Pilih Produk</option>
                                @foreach ($produk as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_barang" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="satuan" class="col-sm-4 col-form-label">Satuan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga_jual" class="col-sm-4 col-form-label">Harga Jual</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="Harga Jual">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stok" class="col-sm-4 col-form-label">Stok</label>
                        <div class="col-sm-8">
                            <input type="stok" class="form-control" id="stok" name="stok" placeholder="Stok">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ditarik" class="col-sm-4 col-form-label">Ditarik</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="ditarik" name="ditarik" placeholder="Ditarik">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ditarik" class="col-sm-4 col-form-label">Pengguna</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Pengguna">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

