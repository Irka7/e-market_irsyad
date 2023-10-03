<table class="table table-compact table-stripped" id="data-pelanggan">
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Email</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pelanggan as $p)
            <tr>
                <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
                <td>{{ $p->kode_pelanggan }}</td>
                <td>{{ $p->nama_pelanggan }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->no_telp }}</td>
                <td>{{ $p->email }}</td>
                <td>
                    <button class="btn btn-info" data-toggle="modal" data-target="#formPelangganModal" data-mode="edit" data-id="{{ $p->id }}" data-kode_pelanggan="{{ $p->kode_pelanggan }}" data-nama_pelanggan="{{ $p->nama_pelanggan }}" data-alamat="{{ $p->alamat }}" data-no_telp="{{ $p->no_telp }}" data-email="{{ $p->email }}"><i class="fas fa-edit"></i></button>
                    <form action="pelanggan/{{ $p->id }}" style="display: inline" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                    </td>
                </form>
            </tr>
        @endforeach
    </tbody>
</table>
