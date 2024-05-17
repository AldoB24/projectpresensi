@extends('layouts.admin.dashboard')

@section('content')
<style>
    .page-title {
        font-size: 30px;
        font-weight: bold;
        margin-top: 20px;
        margin-bottom: 20px; /* Memberikan jarak di bawah judul */
    }

    .breadcrumb-item.active {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 5px;
    }
</style>

<div class="container-fluid">
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h2 class="page-title">Dashboard</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Selamat Datang di E-Presensi Karyawan Arsenet Global Solution</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                    <div></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-left mini-stat-img mr-4">
                            <i class="ti-check-box" style="font-size: 20px"></i>
                        </div>
                        <h5 class="font-16 text-uppercase mt-0 text-white-50">Tepat Waktu Hari ini</h5>
                        <h4 class="font-500">{{ $tepatWaktuCount }}<i class="text-success ml-2"></i></h4>
                    </div>
                    <div class="pt-2">
                        <div class="float-right">
                            <a href="{{ url('/tepat_waktu') }}" class="text-white-50">Lihat Detail <i class="mdi mdi-arrow-right h5"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-left mini-stat-img mr-4">
                            <i class="ti-check-box" style="font-size: 20px"></i>
                        </div>
                        <h5 class="font-16 text-uppercase mt-0 text-white-50">Izin Hari ini</h5>
                        <h4 class="font-500">{{ $izinCount }}<i class="text-success ml-2"></i></h4>
                    </div>
                    <div class="pt-2">
                        <div class="float-right">
                            <a href="{{ url('/izin') }}" class="text-white-50">Lihat Detail <i class="mdi mdi-arrow-right h5"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
    <div class="card mini-stat bg-primary text-white">
        <div class="card-body">
            <div class="mb-4">
                <div class="float-left mini-stat-img mr-4">
                    <i class="ti-alert" style="font-size: 20px"></i>
                </div>
                <h5 class="font-16 text-uppercase mt-0 text-white-50">Terlambat Hari ini</h5>
                <h4 class="font-500">{{ $terlambatCount }}<i class="text-success ml-2"></i></h4>
            </div>
            <div class="pt-2">
                <div class="float-right">
                    <a href="{{ route('terlambat') }}" class="text-white-50">Lihat Detail <i class="mdi mdi-arrow-right h5"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>


    </div>
</div>
@endsection
