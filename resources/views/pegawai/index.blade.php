@extends('layouts.admin.dashboard')

@php
    $title = 'Karyawan';
@endphp

@section('content')

<div class="d-flex justify-content-between align-items-center mt-3 mb-3">
    <ul>
        <button type="button" class="btn btn-primary" style="padding: 5px 10px; color: #fff; margin-right: 18px; margin-top: 10px;" onclick="togglePopup()">
            <i class="fas fa-plus"></i> &nbsp;Tambah Akun Karyawan
        </button>
    </ul>
</div>

<!-- Modal Tambah Karyawan -->
<div class="modal fade" id="tambahAkunModal" tabindex="-1" role="dialog" aria-labelledby="tambahAkunModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
              <div class="modal-header" style="background-color: #f8f9fa; border-bottom: none;">
            <h5 class="modal-title">Tambah Akun Karyawan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()" style="background-color: transparent; border: none;">
                <span aria-hidden="true" style="font-size: 24px; color: red;">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pegawai.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name">Nama Karyawan</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama karyawan"  required oninvalid="this.setCustomValidity('Silahkan isi kolom ini!')">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini!')">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini!')">
                    </div>
                    <div class="form-group">
                    <label for="phone_number">Nomor Telepon</label>
                    <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Masukkan nomor telepon" pattern="[0-9]{10,13}" title="Harap masukkan nomor telepon dengan panjang minimal 10 dan maksimal 13 angka" required>
                    </div>
                    <div class="form-group">
                        <label for="job_title">Jabatan</label>
                        <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Masukkan jabatan" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini!')">
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Masukkan alamat" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini!')">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Lihat Pegawai -->
@foreach($pegawai as $item)
    <div class="modal fade" id="lihatPegawaiModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="lihatPegawaiModalLabel{{ $item->id }}" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lihatPegawaiModalLabel">Detail Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="PegawaiCloseModal('{{ $item->id }}')" style="background-color: transparent; border: none;">
                <span aria-hidden="true" style="font-size: 24px; color: red;">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <p><strong>Nama:</strong>  {{ $item->name }}</p>
                <p><strong>Email:</strong> {{ $item->email }}</p>
                <p><strong>Nomor Telepon:</strong> {{ $item->phone_number }}</p>
                <p><strong>Jabatan:</strong> {{ $item->job_title }}</p>
                <p><strong>Alamat:</strong>{{ $item->address }}</p>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- END MODAL -->

<!-- Modal Edit Pegawai -->
@foreach($pegawai as $item)
<div class="modal fade" id="editPegawaiModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editPegawaiModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPegawaiModalLabel{{ $item->id }}">Edit Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeEditModal('{{ $item->id }}')">
    <span aria-hidden="true">&times;</span>
</button>

            </div>
            <div class="modal-body">
                <form action="{{ route('pegawai.update', ['id' => $item->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama Karyawan</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $item->email }}" required>
                    </div>
                    <div class="form-group">
                    <label for="phone_number">Nomor Telepon</label>
                    <input type="tel" class="form-control" id="phone_number" name="phone_number" value="{{ $item->phone_number }}" pattern="[0-9]{10,13}" title="Harap masukkan nomor telepon dengan panjang minimal 10 dan maksimal 13 angka" required>
                    </div>
                    <div class="form-group">
                        <label for="job_title">Jabatan</label>
                        <input type="text" class="form-control" id="job_title" name="job_title" value="{{ $item->job_title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $item->address }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="card-title">Data Profile Karyawan</h1> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            &emsp;&emsp;&emsp;&emsp;&emsp;
                            <div class="card-header-right">
                                <div class="ml-auto">
                                    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Cari..." style="padding: 5px; margin-right: 18px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table-list">
                                <thead>
                                    <tr>
                                        <th class="text-left">No</th>
                                        <th class="text-left">Nama Karyawan</th>
                                        <th class="text-left">Email</th>
                                        <!-- <th class="text-left">Password</th> -->
                                        <th class="text-left">Nomor Telepon</th>
                                        <th class="text-left">Jabatan</th>
                                        <th class="text-left">Alamat</th>
                                        <th class="text-right">Aksi</th>
                                        <!-- Tambahkan class "text-right" untuk menggeser ke kanan -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop through your data here to display all employees -->
                                    @php
    $currentPage = $pegawai->currentPage() ?? 1; // Get current page
    $perPage = $pegawai->perPage(); // Get number of items per page
    $startNumber = ($currentPage - 1) * $perPage + 1; // Calculate starting number
@endphp

                                    @foreach($pegawai as $key => $item)
                                        <tr>
                                            <td>{{ $startNumber + $key }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <!-- <td>{{ $item->password }}</td> -->
                                            <td>{{ $item->phone_number }}</td>
                                            <td>{{ $item->job_title }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td class="action-buttons text-right"> <!-- Tambahkan class "text-right" untuk menggeser ke kanan -->
                                            <a href="#" class="btn btn-info btn-green" onclick="openModal('{{ $item->id }}')">Lihat</a>
                                            <a href="#" class="btn-orange" onclick="openEditModal('{{ $item->id }}')"><i class="fas fa-edit"></i> Edit</a>
                                                <form action="{{ route('pegawai.hapus', ['id' => $item->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-red"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                </form>
                                            </td>
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
        <li class="page-item {{ ($pegawai->onFirstPage()) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $pegawai->previousPageUrl() }}">
                <span class="page-text-box">Previous</span>
            </a>
        </li>
        @for ($i = 1; $i <= $pegawai->lastPage(); $i++)
            <li class="page-item {{ ($pegawai->currentPage() == $i) ? 'active' : '' }}">
                <a class="page-link" href="{{ $pegawai->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="page-item {{ ($pegawai->currentPage() == $pegawai->lastPage()) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $pegawai->nextPageUrl() }}">Next</a>
        </li>
    </ul>
</nav>
<!-- End Pagination -->

<!-- JavaScript untuk meng-handle pencarian -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Tambahkan CSS Anda di sini -->
    <link rel="stylesheet" href="{{ asset('tabler/css/dk-ds.css') }}"> <!-- Ganti 'css/dk-ds.css' dengan path yang sesuai dengan lokasi file CSS Anda -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    
<script>
    function searchTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.querySelector("table");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // Targeting the second column (employee name)
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    // Fungsi untuk menampilkan modal
    function closeModal() {
        $('#tambahAkunModal').modal('hide');
    }
    
    function togglePopup() {
        $('#tambahAkunModal').modal('toggle');
    } 

    function openModal(id) {
        $('#lihatPegawaiModal' + id).modal('show');
    }

    function PegawaiCloseModal(id) {
        $('#lihatPegawaiModal' + id).modal('hide');
    }

    function openEditModal(id) {
        $('#editPegawaiModal' + id).modal('show');
    }
    function openEditModal(id) {
    $('#editPegawaiModal' + id).modal('show');
}

function closeEditModal(id) {
    $('#editPegawaiModal' + id).modal('hide');
}


</script>

@endsection
