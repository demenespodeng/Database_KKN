@extends('data_keluarga.layout')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mt-4">
        <div class="card-body">

            <h5 class="card-title fw-bolder mb-3">Tambah Data</h5>

            <form method="post" action="{{ route('detail.store') }}">
                @csrf

            <div class="mb-3">
                <label for="id_detail" class="form-label"> No </label>
                <input type="text" class="form-control" id="id_detail" name="id_detail">
            </div>
			<div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="ttl" class="form-label"> TTL </label>
                <input type="date" class="form-control" id="ttl" name="ttl">
            </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Tambah" />
                </div>
            </form>
        </div>
    </div>

@stop