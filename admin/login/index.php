<!DOCTYPE html>
<?php
	session_start();
	include "ceksessionn.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arsip Surat Kota Samarinda</title>

    <!-- Bootstrap -->
    <link href="../../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../../assets/vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../../assets/build/css/custom.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../../img/icon.ico">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="antialiased bg-gradient-to-br from-gray-800 to-gray-700">
    <div class="container px-6 mx-auto">
        <div class="flex flex-col text-center md:text-left md:flex-row h-screen justify-evenly md:items-center">
            <div class="flex flex-col w-full">
                <div>
                    <svg class="w-20 h-20 mx-auto md:float-left fill-stroke text-red-600" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                        </path>
                    </svg>
                </div>
                <h1 class="text-5xl text-gray-100 font-bold">Arsip Dokumen Senat Mahasiswa</h1>
                <p class="w-5/12 mx-auto md:mx-0 text-gray-400">
                    Berisi tentang surat dan dokumentasi Senat Mahasiswa Amikom Purwokerto.
                </p>
            </div>
            <div class="w-full md:w-full lg:w-9/12 mx-auto md:mx-0">
                <div class="bg-gray-900 p-10 flex flex-col w-full shadow-xl rounded-xl">
                    <h2 class="text-2xl font-bold text-red-500 text-left mb-5">
                        Login Admin
                    </h2>
                    <form action="proses_login.php" id="login" name="login" method="post" class="w-full">
                        <div id="input" class="flex flex-col w-full my-5">
                            <label for="username" class="text-gray-400 mb-2">Username</label>
                            <input type="text" id="username" name="username_admin"
                                placeholder="Please insert your username"
                                class="appearance-none border-2 border-gray-700 rounded-lg px-4 py-3 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:shadow-lg"
                                autocomplete="off" maxlength="50" required />
                        </div>
                        <div id="input" class="flex flex-col w-full my-5">
                            <label for="password" class="text-gray-400 mb-2">Password</label>
                            <input type="password" id="password" name="password"
                                placeholder="Please insert your password"
                                class="appearance-none border-2 border-gray-700 rounded-lg px-4 py-3 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:shadow-lg"
                                autocomplete="off" maxlength="50" required />
                        </div>
                        <div id="button" class="flex flex-col w-full my-5">
                            <button type="submit"
                                class="w-full py-4 bg-red-600 rounded-lg text-gray-200 hover:bg-red-700">
                                <div class="flex flex-row items-center justify-center">
                                    <div class="mr-2">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="font-bold">Login</div>
                                </div>
                            </button>
                            <div class="flex justify-evenly mt-5">
                                <a href="" class="text-center font-medium text-gray-400 hover:text-gray-300">Recover
                                    password!</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>


</html>