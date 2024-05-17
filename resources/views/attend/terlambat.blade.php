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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Daftar {{$title}}</h3>
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
                                        <th>Jam</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($terlambats as $index => $terlambat)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ optional($terlambat->user)->name }}</td>
                                        <td>{{ optional($terlambat->user)->job_title }}</td>
                                        <td>{{ $terlambat->masuk }}</td>
                                        <td>{{ $terlambat->tanggal }}</td>
                                        <td><span style="color: white; background-color: red; border: 1px solid red; padding: 2px;">{{ $terlambat->keterangan }}</span></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('terlambat') }}" method="GET">
                            <div class="form-group">
                                <label for="filter_date">Tanggal:</label>
                                <input type="date" class="form-control" id="filter_date" name="filter_date">
                            </div>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Filter section -->
        </div>
    </div>
</section>

@endsection
