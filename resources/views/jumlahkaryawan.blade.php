@extends('layouts.admin.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-left mt-3 mb-3">
    <ul style="list-style-type:none;">
        <li style="display:inline-block;">
            <a href="{{ route('exportjk') }}" class="btn btn-primary" style="padding: 5px 10px; color: #fff; margin-right: 18px; margin-top: 10px;" onclick="togglePopup()">
                <i class="fas fa-file-pdf"></i> Export PDF
            </a>
        </li>
        <li style="display:inline-block;">
            <a href="{{ route('exceljk') }}" class="btn btn-success" style="padding: 5px 10px; color: #fff; margin-right: 18px; margin-top: 10px;" onclick="togglePopup()">
                <i class="fas fa-file-excel"></i> Export Excel
            </a>
        </li>
    </ul>
</div>



<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                            <h1 class="card-title">Data Profile Karyawan</h1> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
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
                                        <th>No</th>
                                        <th>Nama Karyawan</th>
                                        <th>Nomor Telepon</th>
                                        <th>Jabatan</th>
                                        <th>Alamat</th>
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
                                        <td>{{ $item->phone_number }}</td>
                                        <td>{{ $item->job_title }}</td>
                                        <td>{{ $item->address }}</td>
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
</script>


@endsection
