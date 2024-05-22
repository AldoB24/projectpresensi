@extends('layouts.admin.dashboard')

@php
    $title = 'Karyawan Izin';
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
                            <h3 class="card-title">Daftar {{$title}}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Form untuk filter berdasarkan tanggal -->
                        <form action="{{ route('izin') }}" method="GET">
                            <div class="form-group">
                                <label for="filter_date">Filter Tanggal:</label>
                                <input type="date" class="form-control" id="filter_date" name="filter_date">
                            </div>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table-list">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Jam Pulang</th>
                                        <th>Tanggal</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @php
    $currentPage = $izins->currentPage() ?? 1; // Get current page
    $perPage = $izins->perPage(); // Get number of items per page
    $startNumber = ($currentPage - 1) * $perPage + 1; // Calculate starting number
@endphp
                                    @foreach($izins as $izin)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $izin->name }}</td>
                                            <td>{{ $izin->job_title }}</td>
                                            <td>{{ $izin->tanggal }}</td>
                                            <td>{{ $izin->alasan }}</td>
                                            <td>{{ $izin->keterangan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Pagination -->
<br></br>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item {{ ($izins->onFirstPage()) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $izins->previousPageUrl() }}">
                <span class="page-text-box">Previous</span>
            </a>
        </li>
        @for ($i = 1; $i <= $izins->lastPage(); $i++)
            <li class="page-item {{ ($izins->currentPage() == $i) ? 'active' : '' }}">
                <a class="page-link" href="{{ $izins->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="page-item {{ ($izins->currentPage() == $izins->lastPage()) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $izins->nextPageUrl() }}">Next</a>
        </li>
    </ul>
</nav>
@endsection