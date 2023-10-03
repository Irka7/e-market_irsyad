{{-- Modal Tambah --}}
<div class="modal fade" id="formPelangganModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="pelanggan" method="post">
                    @csrf
                    <div id="method"></div>
                    <div class="method"></div>

                    <div class="form-group row">
                        <label for="kode_pelanggan" class="col-sm-4 col-form-label">Kode</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="kode_pelanggan" name="kode_pelanggan" placeholder="Kode Pelanggan">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_pelanggan" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama Pelanggan">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="no_telp" class="col-sm-4 col-form-label">No HP</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No HP">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
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

