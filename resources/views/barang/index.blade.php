@extends('templates.layout')

@section('content')
    {{-- Main Sections --}}
    <section class="content">

        {{-- Default box --}}
        <div class="card">
            <div class="card-header">
                <div class="card-title">Title</div>

                <div class="card-tools">
                    <button class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                {{-- Button trigger modal form produk --}}
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#formBarangModal">
                    Tambah Barang
                </button>
                <div class="mt-3">
                    @include('barang.data')
                </div>
            </div>
            <div class="card-footer">
                Footer
            </div>
        </div>
    </section>
@endsection
@include('barang.form')

@push('script')
    <script>
        $(function (){
            $('#data-barang').DataTable()

            $('.alert-success').fadeTo(2000,500).slideUp(500, function(){
                $('.alert-success').slideUp(500)
            })

            $('.alert-danger').fadeTo(2000,500).slideUp(500, function(){
                $('.alert-danger').slideUp(500)
            })

            $('.btn-delete').on('click', function(e){
                e.preventDefault()
                let barang = $(this).closest('tr').find('td:eq(3)').text()
                Swal.fire({
                    title: 'Hapus Data',
                    html: `Apakah data <b>${barang}</b>`,
                    icon: 'error',
                    showDenyButton: true,
                    focusConfirm: false,
                    denyButtonText: 'Tidak',
                    confirmButtonText: 'Ya',
                }).then((result)=> {
                    if (result.isConfirmed) $(e.target).closest('form').submit()
                    else swal.close()
                })
            })

            $('#formBarangModal').on('show.bs.modal', function(e){
                const btn = $(e.relatedTarget)
                console.log(btn.data('mode'))
                const mode = btn.data('mode')
                const kode_barang = btn.data('kode_barang')
                const produk_id = btn.data('produk_id')
                const nama_barang = btn.data('nama_barang')
                const satuan = btn.data('satuan')
                const harga_jual = btn.data('harga_jual')
                const stok = btn.data('stok')
                const ditarik = btn.data('ditarik')
                const user_id = btn.data('user_id')
                const id = btn.data('id')
                const modal = $(this)
                console.log(mode)
                if(mode === 'edit'){
                    modal.find('.modal-title').text('Edit Data Barang')
                    modal.find('#kode_barang').val(kode_barang)
                    modal.find('#produk_id').val(produk_id)
                    modal.find('#nama_barang').val(nama_barang)
                    modal.find('#satuan').val(satuan)
                    modal.find('#harga_jual').val(harga_jual)
                    modal.find('#stok').val(stok)
                    modal.find('#ditarik').val(ditarik)
                    modal.find('#user_id').val(user_id)
                    modal.find('.modal-body form').attr('action','{{ url('barang') }}/'+id)
                    modal.find('#method').html('@method('PATCH')')
                }else{
                    modal.find('.modal-title').text('Input Data Barang')
                    modal.find('#kode_barang').val('')
                    modal.find('#produk_id').val('')
                    modal.find('#nama_barang').val('')
                    modal.find('#satuan').val('')
                    modal.find('#harga_jual').val('')
                    modal.find('#stok').val('')
                    modal.find('#ditarik').val('')
                    modal.find('#user_id').val('')
                    modal.find('#method').html('')
                    modal.find('.modal-body form').attr('action','{{ url("barang") }}')
                }
            })
        })
    </script>
@endpush
