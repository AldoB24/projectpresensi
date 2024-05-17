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
            <!-- Filter section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('tepatwaktu.filter') }}" method="GET">
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

            <!-- Daftar karyawan -->
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
                                        <th>Jam Masuk</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $counter = 1; @endphp <!-- Initialize counter before the loop -->
                                    @foreach($on_time as $data)
                                        @if($data->keterangan == 'tepat')
                                            <tr>
                                                <td>{{ $counter++ }}</td> <!-- Use counter and increment it -->
                                                <td>{{ optional($data->user)->name }}</td>
                                                <td>{{ optional($data->user)->job_title }}</td>
                                                <td>{{ $data->masuk }}</td>
                                                <td>{{ $data->tanggal }}</td>
                                                <td><span style="color: white; background-color: green; border: 1px solid green; padding: 2px;">
                                                    Tepat Waktu
                                                </span>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Daftar karyawan -->
        </div>
    </div>
</section>

@endsection
