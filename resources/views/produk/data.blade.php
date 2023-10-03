<table class="table table-compact table-stripped" id="data-produk">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produk as $p)
            <tr>
                <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
                <td>{{ $p->nama_produk }}</td>
                <td>
                    <button class="btn btn-info" data-toggle="modal" data-target="#formProdukModal" data-mode="edit" data-id="{{ $p->id }}" data-nama_produk="{{ $p->nama_produk }}"><i class="fas fa-edit"></i></button>
                    <form action="produk/{{ $p->id }}" style="display: inline" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
