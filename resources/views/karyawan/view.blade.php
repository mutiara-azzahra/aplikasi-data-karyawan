@extends('welcome')
 
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                Detail Data Karyawan
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('karyawan.index') }}" class="btn btn-info d-none d-sm-inline-block">
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
                    <div class="col-lg-8 col-lg-12">
                        <div class="row row-cards">
                            <div class="col-12">
                                <div class="card-body">
                                    <div class="row row-cards">
                                        <div class="col-6">
                                            <span class="avatar avatar-xl" style="background-image: url('{{ asset('foto-karyawan/' . $data->foto_karyawan) }}')"></span>
                                        </div>
                                        <div class="col-sm-6 col-md-12 col-lg-12">
                                            <div class="mb-1">
                                                <label class="form-label">NIK</label>
                                                <div class="form-control-plaintext">{{ $data->nik }}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-12 col-lg-12">
                                            <div class="mb-1">
                                                <label class="form-label">Nama Karyawan</label>
                                                <div class="form-control-plaintext">{{ $data->nama_karyawan }}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-12 col-lg-12">
                                            <div class="mb-1">
                                                <label class="form-label">Email</label>
                                                <div class="form-control-plaintext">{{ $data->email ?? 'Belum diisi' }}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-12 col-l-12">
                                            <div class="mb-1">
                                                <label class="form-label">Alamat</label>
                                                <div class="form-control-plaintext">{{ $data->alamat ?? 'Belum diisi' }}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-12 col-l-12">
                                            <div class="mb-1">
                                                <label class="form-label">Nomor Telepon</label>
                                                <div class="form-control-plaintext">{{ $data->nomor_telepon ?? 'Belum diisi' }}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label">Tempat Tanggal Lahir</label>
                                                <div class="form-control-plaintext">{{ $data->tempat_lahir ?? 'Belum diisi' }}, {{ $data->tanggal_lahir ?? 'Belum diisi' }}</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label">Jabatan</label>
                                                <div class="form-control-plaintext">{{ $data->jabatan->nama_jabatan ?? 'Belum diisi' }}</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label">Departemen</label>
                                                <div class="form-control-plaintext">{{ $data->departemen->nama_departemen ?? 'Belum diisi' }}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label">Tanggal Awal Bekerja</label>
                                                <div class="form-control-plaintext">{{ $data->tanggal_awal_bekerja ?? 'Belum diisi' }}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label">Tanggal Akhir Bekerja</label>
                                                <div class="form-control-plaintext">{{ $data->tanggal_akhir_bekerja ?? 'Belum diisi' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
document.addEventListener("DOMContentLoaded", function () {
    window.Litepicker && (new Litepicker({
        element: document.getElementById('datepicker-default'),
        buttonText: {
            previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
            nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
        },
    }));
});

document.addEventListener("DOMContentLoaded", function () {
    window.Litepicker && (new Litepicker({
        element: document.getElementById('datepicker-1'),
        buttonText: {
            previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
            nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
        },
    }));
});

document.addEventListener("DOMContentLoaded", function () {
    window.Litepicker && (new Litepicker({
        element: document.getElementById('datepicker-2'),
        buttonText: {
            previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
            nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
        },
    }));
});
</script>

@endsection