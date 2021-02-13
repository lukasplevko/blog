@extends('layouts.app')
@section('content')

    <body class="antialiased bg-gray-200 font-sans">
        <div class="max-w-6xl mx-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="max-w-sm w-full sm:w-1/2 lg:w-1/3 py-6 px-3">
                    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                        <div class="bg-cover bg-center h-56 p-4"
                            style="background-image: url(https://images.unsplash.com/photo-1552083974-186346191183?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80)">

                        </div>
                        <div class="p-4">
                            <p class="uppercase tracking-wide text-sm font-bold text-gray-700">{{ auth()->user()->name }}
                            </p>
                            <p class="text-3xl text-gray-900">Registrovaný/á dňa: </p>
                            <p class="text-gray-700">{{ auth()->user()->created_at }}</p>
                        </div>
                        <div class="flex p-4 border-t border-gray-300 text-gray-700">
                            <div class="flex-1 inline-flex items-center">
                                <svg class="h-6 w-6 text-gray-600 fill-current mr-3" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M0 16L3 5V1a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v4l3 11v5a1 1 0 0 1-1 1v2h-1v-2H2v2H1v-2a1 1 0 0 1-1-1v-5zM19 5h1V1H4v4h1V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1h2V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1zm0 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V6h-2v2a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V6H3.76L1.04 16h21.92L20.24 6H19zM1 17v4h22v-4H1zM6 4v4h4V4H6zm8 0v4h4V4h-4z">
                                    </path>
                                </svg>
                                <p><span class="text-gray-900 font-bold">{{ auth()->user()->comments->count() }}</span>
                                    Komentáre
                                </p>
                            </div>
                            <div class="flex-1 inline-flex items-center">


                            </div>
                        </div>
                        <div class="px-4 pt-3 pb-4 border-t border-gray-300 bg-gray-100">
                            <div class="text-xs uppercase font-bold text-gray-600 tracking-wide">Realtor</div>
                            <div class="flex items-center pt-2">
                                <div class="bg-cover bg-center w-10 h-10 rounded-full mr-3"
                                    style="background-image: url(https://thumbs.dreamstime.com/b/default-avatar-profile-trendy-style-social-media-user-icon-187599373.jpg)">
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900">Tiffany Heffner</p>
                                    <p class="text-sm text-gray-700">(555) 555-4321</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
