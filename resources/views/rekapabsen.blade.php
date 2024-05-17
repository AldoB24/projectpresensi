@extends('layouts.admin.dashboard')

@php
    $title = 'Karyawan';
@endphp

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Rekap {{ $title }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Bagian baru untuk tampilan rekap absen -->
                        <div class="page-body">
                            <div class="container-xl">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-body">
                                                <form action="/presensi/export/pdf" id="frmLaporanPDF" target="_blank" method="POST">
                                                    @csrf <!-- Tambahkan token CSRF untuk keamanan -->
                                                    <div class="form-group">
                                                        <label for="bulan">Bulan</label>
                                                        <select name="bulan" id="bulan" class="form-control">
                                                            <option value="">Pilih Bulan</option>
                                                            @for ($i = 1; $i <= 12; $i++)
                                                                <option value="{{ $i }}" {{ $i == date('n') ? 'selected' : '' }}>
                                                                    {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tahun">Tahun</label>
                                                        <select name="tahun" id="tahun" class="form-control">
                                                            <option value="">Pilih Tahun</option>
                                                            @for ($year = date('Y'); $year >= 2020; $year--)
                                                                <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>
                                                                    {{ $year }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pegawai">Pilih Pegawai</label>
                                                        <select name="pegawai" id="pegawai" class="form-control">
                                                            <option value="">Pilih Pegawai</option>
                                                            <!-- You need to populate this select dropdown with employee data -->
                                                        </select>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-6">
                                                            <button type="submit" name="cetak" class="btn btn-primary w-100">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                    <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"></path>
                                                                    <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path>
                                                                    <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z"></path>
                                                                </svg>
                                                                Cetak
                                                            </button>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button type="submit" name="exportexcel" formaction="/presensi/export/excel" class="btn btn-success w-100">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                    <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                                                    <path d="M7 11l5 5l5 -5"></path>
                                                                    <path d="M12 4l0 12"></path>
                                                                </svg>
                                                                Export to Excel
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
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
</section>


@endsection
