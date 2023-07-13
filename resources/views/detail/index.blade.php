@extends('data_keluarga.layout')

@section('content')

<h4 class="mt-5">Data Keluarga KK</h4>
<a href="{{ route('detail.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover table-striped mt-4 table-bordered table-responsive">
    <thead>
      <tr>
        <th>No</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>TTL</th>
      </tr>
    </thead>


    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_detail }}</td>
                <td>{{ $data->nik }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->ttl }}</td>
                <td>


                    <a href="{{ route('detail.edit', $data->id_detail) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_detail }}">
                        Hapus
                    </button>
                    

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_detail }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('detail.delete', $data->id_detail) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data saudara/i {{ $data->nama}} ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form> 
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop
