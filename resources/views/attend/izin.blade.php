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
                        <h3>Daftar {{$title}}</h3>
  <form action="{{ route('izin') }}" method="GET" class="form-inline d-flex">
    <div class="form-group mx-sm-3 mb-2">
      <label for="filter_date" class="sr-only">Tanggal</label>
      <input type="date" class="form-control" id="filter_date" name="filter_date" placeholder="Tanggal">
    </div>
    <button type="submit" class="btn btn-primary mb-2">Filter</button>
  </form>
                            <!-- Akhir Formulir Filter Tanggal -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table-list">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Tanggal</th>
                                        <th>Alasan</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
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

@endsection
