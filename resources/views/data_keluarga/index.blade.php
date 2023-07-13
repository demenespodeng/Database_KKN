@extends('data_keluarga.layout')

@section('content')

<h4 class="mt-5">Data Desa</h4>
<a href="{{ route('data_keluarga.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover table-striped mt-4 table-bordered table-responsive">
    <thead>
      <tr>
        <th>No</th>
        <th>No KK</th>
        <th>Nama KK</th>
        <th>Alamat</th>
        <th>Dusun</th>
        <th>Desa</th>
        <th>Kecamatan</th>
        <th>Kota</th>
        <th>Provinsi</th>
        <th>RT</th>
        <th>RW</th>
      </tr>
    </thead>


    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_data }}</td>
                <td>{{ $data->kk }}</td>
                <td>{{ $data->namakk }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->dusun }}</td>
                <td>{{ $data->desa }}</td>
                <td>{{ $data->kecamatan }}</td>
                <td>{{ $data->kota }}</td>
                <td>{{ $data->provinsi }}</td>
                <td>{{ $data->rt }}</td>
                <td>{{ $data->rw }}</td>
                <td>



                    <a href="{{ route('data_keluarga.edit', $data->id_data) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>
                    <a href="{{ route('detail.index') }}" type="button" class="btn btn-primary rounded-3">Detail</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_data }}">
                        Hapus
                    </button>
                    

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_data }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('data_keluarga.delete', $data->id_data) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data saudara/i {{ $data->namakk}} ini?
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
