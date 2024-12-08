<script src="https://cdn.tailwindcss.com"></script>
<!-- This is an example component -->
<?php
session_start();
include "../login/ceksession.php";
?>

<div>
    <nav class="bg-white border-b border-gray-200 fixed z-30 w-full">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar"
                        class="lg:hidden mr-2 text-gray-600 hover:text-gray-900 cursor-pointer p-2 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 rounded">
                        <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg id="toggleSidebarMobileClose" class="w-6 h-6 hidden" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <a href="#" class="text-xl font-bold flex items-center lg:ml-2.5">
                        <img src="https://demo.themesberg.com/windster/images/logo.svg" class="h-6 mr-2"
                            alt="Windster Logo">
                        <span class="self-center whitespace-nowrap text-red-600">APLIKASI APA YAA</span>
                    </a>
                </div>
                <div class="flex items-center">
                    <button id="toggleSidebarMobileSearch" type="button"
                        class="lg:hidden text-gray-500 hover:text-gray-900 hover:bg-gray-100 p-2 rounded-lg">
                        <span class="sr-only">Search</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <a href="#"
                        class="hidden sm:inline-flex ml-5 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3">
                        <svg class="svg-inline--fa fa-gem -ml-1 mr-2 h-4 w-4" aria-hidden="true" focusable="false"
                            data-prefix="fas" data-icon="gem" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path fill="currentColor"
                                d="M378.7 32H133.3L256 182.7L378.7 32zM512 192l-107.4-141.3L289.6 192H512zM107.4 50.67L0 192h222.4L107.4 50.67zM244.3 474.9C247.3 478.2 251.6 480 256 480s8.653-1.828 11.67-5.062L510.6 224H1.365L244.3 474.9z">
                            </path>
                        </svg>
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="overflow-hidden bg-white pt-10 flex h-screen overflow-hidden">
        <aside x-show="isSidebarOpen" x-transition:enter="transition-all transform duration-300 ease-in-out"
            x-transition:enter-start="-translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100"
            x-transition:leave="transition-all transform duration-300 ease-in-out"
            x-transition:leave-start="translate-x-0 opacity-100" x-transition:leave-end="-translate-x-full opacity-0"
            x-ref="sidebar" @keydown.escape="window.innerWidth <= 1024 ? isSidebarOpen = false : ''" tabindex="-1"
            class="w-64 bg-white border-r dark:border-red-800 dark:bg-darker focus:outline-none">
            <!-- Mini column -->
            <!-- Sidebar links -->
            <nav aria-label="Main" class="flex-1 w-64 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
                <!-- Dashboards links -->
                <div x-data="{ isActive: false, open: false}" class="pt-10">
                    <!-- active & hover classes 'bg-red-100 dark:bg-red-600' -->
                    <a href="#" @click="$event.preventDefault(); open = !open"
                        class="flex items-center p-2 text-gray-300 bg-red-600 transition-colors rounded-md dark:text-light hover:bg-red-100 dark:hover:bg-red-600 hover:text-white py-3"
                        :class="{'bg-red-100 dark:bg-red-600': isActive || open}" role="button" aria-haspopup="true"
                        :aria-expanded="(open || isActive) ? 'true' : 'false'">
                        <span aria-hidden="true">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </span>
                        <span class="ml-2 text-sm">Pengurus Harian</span>
                        <span class="ml-auto" aria-hidden="true">
                            <!-- active class 'rotate-180' -->
                            <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </a>
                    <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Dashboards">
                        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                        <a href="#" role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-700">
                            Notulensi
                        </a>
                        <a href="#" role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                            Proposal
                        </a>
                        <a href="#" role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                            Laporan Pertanggung Jawaban
                        </a>
                        <a href="#" role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                            Dokumentasi
                        </a>
                    </div>
                </div>

                <!-- Components links -->
                <div x-data="{ isActive: false, open: false }">
                    <!-- active classes 'bg-red-100 dark:bg-red-600' -->
                    <a href="#" @click="$event.preventDefault(); open = !open"
                        class="flex items-center p-2 text-gray-300 bg-red-600 transition-colors rounded-md dark:text-light hover:bg-red-100 dark:hover:bg-red-600 hover:text-white py-3"
                        :class="{'bg-red-100 dark:bg-red-600': isActive || open}" role="button" aria-haspopup="true"
                        :aria-expanded="(open || isActive) ? 'true' : 'false'">
                        <span aria-hidden="true">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                        </span>
                        <span class="ml-2 text-sm"> Components</span>
                        <span aria-hidden="true" class="ml-auto">
                            <!-- active class 'rotate-180' -->
                            <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </a>
                    <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">
                        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                        <a href="#" role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-white">
                            Alerts
                        </a>
                        <a href="#" role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                            Buttons
                        </a>
                        <a href="#" role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                            Cards
                        </a>
                        <a href="#" role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                            Dropdowns
                        </a>
                        <a href="#" role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                            Forms
                        </a>
                        <a href="#" role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                            Lists
                        </a>
                        <a href="#" role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                            Modals
                        </a>
                    </div>
                </div>

                <!-- Pages links -->
                <div x-data="{ isActive: false, open: false }">
                    <!-- active classes 'bg-red-100 dark:bg-red-600' -->
                    <a href="#" @click="$event.preventDefault(); open = !open"
                        class="flex items-center p-2 text-gray-300 bg-red-600 transition-colors rounded-md dark:text-light hover:bg-red-100 dark:hover:bg-red-600 hover:text-white py-3"
                        :class="{'bg-red-100 dark:bg-red-600': isActive || open}" role="button" aria-haspopup="true"
                        :aria-expanded="(open || isActive) ? 'true' : 'false'">
                        <span aria-hidden="true">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </span>
                        <span class="ml-2 text-sm"> Pages </span>
                        <span aria-hidden="true" class="ml-auto">
                            <!-- active class 'rotate-180' -->
                            <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </a>
                    <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Pages">
                        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                        <a href="#" role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                            Blank
                        </a>
                        <a href="#" role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                            Profile
                        </a>
                        <a href="#" role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                            Pricing
                        </a>
                        <a href="#" role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                            Kanban
                        </a>
                        <a href="#" role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                            Feed
                        </a>
                    </div>
                </div>

                <!-- Authentication links -->
                <div x-data="{ isActive: false, open: false}">
                    <!-- active & hover classes 'bg-red-100 dark:bg-red-600' -->
                    <a href="#" @click="$event.preventDefault(); open = !open"
                        class="flex items-center p-2 text-gray-300 bg-red-600 transition-colors rounded-md dark:text-light hover:bg-red-100 dark:hover:bg-red-600 hover:text-white py-3"
                        :class="{'bg-red-100 dark:bg-red-600': isActive || open}" role="button" aria-haspopup="true"
                        :aria-expanded="(open || isActive) ? 'true' : 'false'">
                        <span aria-hidden="true">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="ml-2 text-sm"> Authentication </span>
                        <span aria-hidden="true" class="ml-auto">
                            <!-- active class 'rotate-180' -->
                            <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </a>
                    <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Authentication">
                        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                        <a href="#" role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                            Register
                        </a>
                        <a href="#" role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                            Login
                        </a>
                        <a href="#" role="menuitem"
                            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                            Password Reset
                        </a>
                    </div>
                </div>

            </nav>
        </aside>
        <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
        <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto ">
            <main>
                <div class="pt-6 px-4">
                    <h1 class="text-3xl pt-3 text-gray-700"><b>Selamat Datang, <?php echo $_SESSION['nama'];?></b></h1>
                    <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                        <div class="bg-white shadow  rounded-lg p-4 sm:p-6 xl:p-8 ">
                            <div class="flex items-center">
                                <?php include '../../koneksi/koneksi.php';
                                $sql1		= "SELECT * FROM tb_suratmasuk";  
                                $query1  	= mysqli_query($db, $sql1);
                                $jumlah1   = mysqli_num_rows($query1);
                                  ?>
                                <div class="flex-shrink-0">
                                    <span
                                        class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?php echo "$jumlah1" ?></span>
                                    <h3 class="text-base font-normal text-gray-500">Surat Masuk</h3>
                                </div>
                                <div
                                    class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                                    14.6%
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <?php include '../../koneksi/koneksi.php';
                                $sql2		= "SELECT * FROM tb_suratkeluar";  
                                $query2  	= mysqli_query($db, $sql2);
                                $jumlah2   = mysqli_num_rows($query2);
                                  ?>
                        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <span
                                        class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?php echo "$jumlah2" ?></span>
                                    <h3 class="text-base font-normal text-gray-500">Surat Keluark</h3>
                                </div>
                                <div
                                    class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                                    32.9%
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <?php include '../../koneksi/koneksi.php';
                                $sql3		= "SELECT * FROM tb_bagian";  
                                $query3  	= mysqli_query($db, $sql3);
                                $jumlah3   = mysqli_num_rows($query3);
                                  ?>
                        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <span
                                        class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?php echo "$jumlah3" ?></span>
                                    <h3 class="text-base font-normal text-gray-500">User</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        include '../../koneksi/koneksi.php';

                        // Query untuk mengambil lima data terbaru dari tabel tb_bagian
                        $sql3 = "SELECT * FROM tb_bagian ORDER BY id_bagian DESC LIMIT 5";  
                        $query3 = mysqli_query($db, $sql3);
                        $jumlah3 = mysqli_num_rows($query3);
                    ?>
                    <div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4 my-4">
                        <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-xl font-bold leading-none text-gray-900">Anggota Terbaru</h3>
                                <a href="#"
                                    class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2">
                                    View all
                                </a>
                            </div>
                            <div class="flow-root">
                                <ul role="list" class="divide-y divide-gray-200">
                                    <?php while ($row = mysqli_fetch_assoc($query3)) { ?>
                                    <li class="py-3 sm:py-4">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <img class="h-8 w-8 rounded-full"
                                                    src="../bagian/images/<?php echo htmlspecialchars($row['gambar']); ?>"
                                                    alt="User image">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate">
                                                    <?php echo htmlspecialchars($row['nama_lengkap']); ?>
                                                </p>
                                                <p class="text-sm text-gray-500 truncate">
                                                    <?php echo htmlspecialchars($row['no_hp_bagian']); ?>
                                                </p>
                                            </div>
                                            <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                                <?php echo htmlspecialchars($row['nama_bagian']); ?>
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer
                class="bg-white md:flex md:items-center md:justify-between shadow rounded-lg p-4 md:p-6 xl:p-8 my-6 mx-4">
                <ul class="flex items-center flex-wrap mb-6 md:mb-0">
                    <li><a href="#" class="text-sm font-normal text-gray-500 hover:underline mr-4 md:mr-6">Terms and
                            conditions</a></li>
                    <li><a href="#" class="text-sm font-normal text-gray-500 hover:underline mr-4 md:mr-6">Privacy
                            Policy</a></li>
                    <li><a href="#" class="text-sm font-normal text-gray-500 hover:underline mr-4 md:mr-6">Licensing</a>
                    </li>
                    <li><a href="#" class="text-sm font-normal text-gray-500 hover:underline mr-4 md:mr-6">Cookie
                            Policy</a></li>
                    <li><a href="#" class="text-sm font-normal text-gray-500 hover:underline">Contact</a></li>
                </ul>
                <div class="flex sm:justify-center space-x-6">
                    <a href="#" class="text-gray-500 hover:text-gray-900">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </footer>
            <p class="text-center text-sm text-gray-500 my-10">
                &copy; 2019-2021 <a href="#" class="hover:underline" target="_blank">Themesberg</a>. All rights
                reserved.
            </p>
        </div>
    </div>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
</div>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>

<script>
const setup = () => {
    const getTheme = () => {
        if (window.localStorage.getItem('dark')) {
            return JSON.parse(window.localStorage.getItem('dark'))
        }
        return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
    }

    const setTheme = (value) => {
        window.localStorage.setItem('dark', value)
    }

    return {
        loading: true,
        isDark: getTheme(),
        toggleTheme() {
            this.isDark = !this.isDark
            setTheme(this.isDark)
        },
        setLightTheme() {
            this.isDark = false
            setTheme(this.isDark)
        },
        setDarkTheme() {
            this.isDark = true
            setTheme(this.isDark)
        },
        watchScreen() {
            if (window.innerWidth <= 1024) {
                this.isSidebarOpen = false
            } else if (window.innerWidth >= 1024) {
                this.isSidebarOpen = true
            }
        },
        isSidebarOpen: window.innerWidth >= 1024 ? true : false,
        toggleSidbarMenu() {
            this.isSidebarOpen = !this.isSidebarOpen
        },
        isNotificationsPanelOpen: false,
        openNotificationsPanel() {
            this.isNotificationsPanelOpen = true
            this.$nextTick(() => {
                this.$refs.notificationsPanel.focus()
            })
        },
        isSettingsPanelOpen: false,
        openSettingsPanel() {
            this.isSettingsPanelOpen = true
            this.$nextTick(() => {
                this.$refs.settingsPanel.focus()
            })
        },
        isSearchPanelOpen: false,
        openSearchPanel() {
            this.isSearchPanelOpen = true
            this.$nextTick(() => {
                this.$refs.searchInput.focus()
            })
        },
    }
}
</script>