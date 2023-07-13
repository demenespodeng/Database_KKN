@extends('data_keluarga.layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Ubah Data </h5>

		<form method="post" action="{{ route('data_keluarga.update', $data->id_data) }}">
			@csrf
            <div class="mb-3">
                <label for="id_data" class="form-label"> No </label>
                <input type="text" class="form-control" id="id_data" name="id_data" value="{{ $data->id_data }}">
            </div>
			<div class="mb-3">
                <label for="kk" class="form-label">No. KK </label>
                <input type="text" class="form-control" id="kk" name="kk" value="{{ $data->kk }}">
            </div>
            <div class="mb-3">
                <label for="namakk" class="form-label">Nama KK</label>
                <input type="text" class="form-control" id="namakk" name="namakk" value="{{ $data->namakk }}">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label"> Alamat </label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data->alamat }}">
            </div>
            <div class="mb-3">
                <label for="dusun" class="form-label"> Dusun </label>
                <input type="text" class="form-control" id="dusun" name="dusun" value="{{ $data->dusun }}">
            </div>
            <div class="mb-3">
                <label for="desa" class="form-label"> Desa </label>
                <input type="text" class="form-control" id="desa" name="desa" value="{{ $data->desa }}">
            </div>
            <div class="mb-3">
                <label for="kecamatan" class="form-label"> Kecamatan </label>
                <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $data->kecamatan }}">
            </div>
            <div class="mb-3">
                <label for="kota" class="form-label"> Kabupaten </label>
                <input type="text" class="form-control" id="kota" name="kota" value="{{ $data->kota }}">
            </div>
            <div class="mb-3">
                <label for="provinsi" class="form-label"> Provinsi </label>
                <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{ $data->provinsi }}">
            </div>
            <div class="mb-3">
                <label for="rt" class="form-label"> RT </label>
                <input type="text" class="form-control" id="rt" name="rt" value="{{ $data->rt }}">
            </div>
            <div class="mb-3">
                <label for="rw" class="form-label"> RW </label>
                <input type="text" class="form-control" id="rw" name="rw" value="{{ $data->rw }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>
@stop