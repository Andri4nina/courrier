@extends('welcome')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endpush


@section("content")

<div class="w-full max-h-screen h-screen relative flex justify-center items-center">
    <div class=" gap-12 flex justify-center items-start">
        <div>
            <div class="w-full grid grid-cols-2 gap-2 min-h-44 dashboard">
                <div class="w-full h-full">
                    <h3 class="text-white">Envoye</h3>
                    <div class="h-36 bg-red-500 w-full">

                    </div>
                </div>
                <div>
                    <h3 class="text-white">Recu</h3>
                    <div class="h-36 bg-red-500 w-full">

                    </div>
                </div>
            </div>

            <div class="flex gap-2">
                <div class="grid grid-cols-2 gap-2">
                    <div class="bg-red-600 shadow-md hover:bg-red-700 hover:shadow  text-white flex justify-center items-center w-36 h-36 cursor-pointer">
                        + Nouvelle Colis
                    </div>
                    <div class="bg-green-600 shadow-md hover:bg-green-700 hover:shadow text-white flex justify-center items-center w-36 h-36 cursor-pointer">
                        Archive
                    </div>
                    <div class="bg-blue-600 shadow-md hover:bg-blue-700 hover:shadow text-white text-center flex justify-center items-center w-36 h-36 cursor-pointer">
                        Liste de colis <br> envoyer
                    </div>
                    <div class="bg-yellow-600 shadow-md hover:bg-yellow-700 hover:shadow text-white text-center flex justify-center items-center w-36 h-36 cursor-pointer">
                        Liste de colis <br> Recu
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <div class="flex justify-center items-center w-36 h-36">

                    </div>
                    <div class="bg-purple-600 shadow-md hover:bg-purple-700 hover:shadow text-white flex justify-center items-center w-36 h-36 cursor-pointer" >
                        Nos Client
                    </div>
                </div>
            </div>
        </div>
        <div class="relative h-full">
            <h2 class="text-white">Horloge</h2>
            <div class="grid grid-cols-1 gap-2">
                <div class="bg-green-800 text-white flex justify-center items-center w-36 h-36">
                    clock
                </div>
                <div class="bg-yellow-800 text-white flex justify-center items-center w-36 h-36">
                    Date
                </div>
                <div class="flex justify-end items-end w-36 h-36">
                        <div class="grid grid-cols-2 gap-2">
                            <div class="cursor-pointer hover:bg-blue-700 bg-blue-500 h-6 w-6 rounded-md text-slate-200 flex justify-center items-center">
                                <i class="bx bx-info-circle"></i>
                            </div>
                            <div class="cursor-pointer hover:bg-slate-700 bg-slate-500 h-6 w-6 rounded-md text-slate-200 flex justify-center items-center">
                                <i class="bx bx-cog"></i>
                            </div>
                        </div>
                </div>
            </div>



        </div>

    </div>

    <div class="absolute top-0 left-0 w-full h-auto">
        <div class="flex justify-between px-16 pt-5 items-center">
            <div class="bg-red-500 h-16 w-16  Logo">
            </div>
            <div class="text-white user">
                Andrianina
            </div>
        </div>



    </div>

</div>
@endsection
