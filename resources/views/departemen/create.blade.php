@extends('welcome')
 
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                Tambah Data Departemen
                </h2>
            </div>
             <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('departemen.index') }}" class="btn btn-info d-none d-sm-inline-block">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M5 12l6 6" /><path d="M5 12l6 -6" /></svg>
                    Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="col-12">
                        <form class="card" action="{{ route('departemen.store') }}" method="POST">
                        @csrf
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label required">Nama Departemen</label>
                                    <div>
                                        <input type="text" name="nama_departemen" class="form-control" placeholder="Masukkan Nama Departemen">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pilih Kepala Departemen</label>
                                    <div>
                                        <select name="id_head_departemen" id="select-tags" class="form-select">
                                            <option value="">-- Pilih --</option>
                                            @foreach($head_departemen as $a)
                                                <option value="{{ $a->id_head_departemen }}">{{ $a->nama_karyawan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-success">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection