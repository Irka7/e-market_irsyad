<table class="table table-compact table-stripped" id="data-barang">
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode</th>
            <th>Produk</th>
            <th>Nama</th>
            <th>Satuan</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Ditarik</th>
            <th>Pengguna</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($barang as $b)
            <tr>
                <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
                <td>{{ $b->kode_barang }}</td>
                <td>{{ $b->produk_id }}</td>
                <td>{{ $b->nama_barang }}</td>
                <td>{{ $b->satuan }}</td>
                <td>{{ $b->harga_jual }}</td>
                <td>{{ $b->stok }}</td>
                <td>{{ $b->ditarik }}</td>
                <td>{{ $b->user_id }}</td>
                <td>
                    <button class="btn btn-info" data-toggle="modal" data-target="#formBarangModal" data-mode="edit" data-id="{{ $b->id }}" data-kode_barang="{{ $b->kode_barang }}" data-produk_id="{{ $b->produk_id }}" data-nama_barang="{{ $b->nama_barang }}" data-satuan="{{ $b->satuan }}" data-harga_jual="{{ $b->harga_jual }}" data-stok="{{ $b->stok }}" data-ditarik="{{ $b->ditarik }}" data-user_id="{{ $b->user_id }}"><i class="fas fa-edit"></i></button>
                    <form action="barang/{{ $b->id }}" style="display: inline" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                    </td>
                </form>
            </tr>
        @endforeach
    </tbody>
</table>
