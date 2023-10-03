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
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#formPemasokModal">
                    Tambah Pemasok
                </button>
                <div class="mt-3">
                    @include('pemasok.data')
                </div>
            </div>
            <div class="card-footer">
                Footer
            </div>
        </div>
    </section>
@endsection
@include('pemasok.form')

@push('script')
    <script>

        $('.alert-success').fadeTo(2000,500).slideUp(500, function(){
            $('.alert-success').slideUp(500)
        })

        $('.alert-danger').fadeTo(2000,500).slideUp(500, function(){
            $('.alert-danger').slideUp(500)
        })

        $(function (){
            $('#data-pemasok').DataTable()

            $('.btn-delete').on('click', function(e){
                e.preventDefault()
                let nama_pemasok = $(this).closest('tr').find('td:eq(1)').text()
                Swal.fire({
                    title: 'Hapus Data',
                    html: `Apakah data <b>${nama_pemasok}</b>`,
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

            $('#formPemasokModal').on('show.bs.modal', function(e){
                const btn = $(e.relatedTarget)
                console.log(btn.data('mode'))
                const mode = btn.data('mode')
                const nama_pemasok = btn.data('nama_pemasok')
                const id = btn.data('id')
                const modal = $(this)
                console.log(mode)
                if(mode === 'edit'){
                    modal.find('.modal-title').text('Edit Data Pemasok')
                    modal.find('#nama_pemasok').val(nama_pemasok)
                    modal.find('.modal-body form').attr('action','{{ url('pemasok') }}/'+id)
                    modal.find('#method').html('@method('PATCH')')
                }else{
                    modal.find('.modal-title').text('Input Data Pemasok')
                    modal.find('#nama_pemasok').val('')
                    modal.find('#method').html('')
                    modal.find('.modal-body form').attr('action','{{ url("pemasok") }}')
                }
            })
        })
    </script>
@endpush
