<style>
    .nav-link.active {
        font-weight: bold; /* Memberikan tebal pada teks item navbar aktif */
        color: #007bff; /* Mengubah warna teks item navbar aktif */
        background-color: #063970; /* Menambahkan latar belakang pada item navbar aktif */
    }
</style>

<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark">
                <a>
                    <img src="{{ asset('tabler/static/ags.png') }}" class="navbar-brand-image" style="width: 100px; height: 100px;">
                </a>
            </h1>
            <div class="collapse navbar-collapse" id="sidebar-menu">
                <ul class="navbar-nav pt-lg-3">
                    <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link{{ ($npage == 0) ? ' active' : '' }}">
    <span class="nav-link-icon d-md-none d-lg-inline-block">
        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
        </svg>
    </span>
    <span class="nav-link-title">
        Home
    </span>
</a>

</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
        <span class="nav-link-icon d-md-none d-lg-inline-block">
            <!-- Download SVG icon from http://tabler-icons.io/i/package -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /><path d="M16 5.25l-8 4.5" /></svg>
        </span>
        <span class="nav-link-title">
            Dashboard
        </span>
    </a>
    <div class="dropdown-menu" >
        <div class="dropdown-menu-columns" >
            <div class="dropdown-menu-column">
                <a href="{{ url('/data_karyawan') }}" class="dropdown-item nav-link{{ ($npage == 1) ? ' active' : '' }}" style="{{ ($npage == 1) ? 'background-color: #007bff; color: #fff;' : '' }}">
                    Data Karyawan
                </a>
                <a href="{{ url('/tepat_waktu') }}" class="dropdown-item nav-link{{ ($npage == 2) ? ' active' : '' }}" style="{{ ($npage == 2) ? 'background-color: #007bff; color: #fff;' : '' }}">
                    Tepat Waktu
                </a>
                <a href="{{ url('/jampulang') }}" class="dropdown-item nav-link{{ ($npage == 3) ? ' active' : '' }}" style="{{ ($npage == 3) ? 'background-color: #007bff; color: #fff;' : '' }}">
                    Jam Pulang
                </a>    
                <a href="{{ url('/terlambat') }}" class="dropdown-item nav-link{{ ($npage == 4) ? ' active' : '' }}" style="{{ ($npage == 4) ? 'background-color: #007bff; color: #fff;' : '' }}">
                    Terlambat
                </a>
                <a href="{{ url('/izin') }}" class="dropdown-item nav-link{{ ($npage == 5) ? ' active' : '' }}" style="{{ ($npage == 5) ? 'background-color: #007bff; color: #fff;' : '' }}">
                    Izin
                </a>
            </div>
        </div>
    </div>
</li>


                    <li class="nav-item">
    <a href="{{ url('/data-profil') }}" class="nav-link{{ ($npage == 6) ? ' active' : '' }}" onclick="highlightFeature(this)">
        <span class="nav-link-icon d-md-none d-lg-inline-block">
            <!-- Download SVG icon from https://icons8.com/icons/set/worker -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-databricks"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 17l9 5l9 -5v-3l-9 5l-9 -5v-3l9 5l9 -5v-3l-9 5l-9 -5l9 -5l5.418 3.01" /></svg>
        </span>
        <span class="nav-link-title">
            Data Profil
        </span>
    </a>
</li>



<li class="nav-item">
    <a href="{{ url('/laporan') }}" class="nav-link{{ ($npage == 7) ? ' active' : '' }}" onclick="highlightFeature(this)">
        <span class="nav-link-icon d-md-none d-lg-inline-block">
            <!-- Download SVG icon from https://icons8.com/icons/set/worker -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-report"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" /><path d="M18 14v4h4" /><path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" /><path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M8 11h4" /><path d="M8 15h3" /></svg>

        </span>
        <span class="nav-link-title">
            Laporan
        </span>
    </a>
</li>

                    </li>
                </ul>
            </div>
        </div>
    </aside>

    <script>
    // Ketika halaman dimuat
    document.addEventListener("DOMContentLoaded", function() {
        // Temukan semua elemen yang merupakan item dropdown
        var dropdownItems = document.querySelectorAll('.dropdown-item');

        // Periksa apakah salah satu item dropdown memiliki kelas 'active'
        var hasActiveItem = Array.from(dropdownItems).some(function(item) {
            return item.classList.contains('active');
        });

        // Jika salah satu item dropdown memiliki kelas 'active'
        if (hasActiveItem) {
            // Temukan div dropdown-menu terkait dan tambahkan kelas 'show'
            var dropdownMenu = document.querySelector('.dropdown-menu');
            if (dropdownMenu) {
                dropdownMenu.classList.add('show');
            }
        }
    });
    function toggleDropdown(element) {
        // Temukan div dropdown-menu terkait
        var dropdownMenu = element.nextElementSibling;
        if (dropdownMenu) {
            // Tambahkan atau hapus kelas 'show' dari dropdown-menu
            dropdownMenu.classList.toggle('show');
        }}
</script>

</script>


