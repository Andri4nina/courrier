@extends('welcome')




@section("content")

{{ view('pages.layouts.headers') }}
<div class="w-full max-h-screen h-screen relative flex justify-center">
    <div class=" gap-12 flex justify-center items-start">
        <div>
            <div class="w-full grid grid-cols-2 gap-2 mb-2 dashboard">
                <div class="w-full h-full">

                    <div class="h-36 bg-red-500 w-full">

                    </div>
                </div>
                <div>

                    <div class="h-36 bg-red-500 w-full">

                    </div>
                </div>
            </div>

            <div class="flex gap-2">
                <div class="grid grid-cols-2 gap-2">
                    <div class="overflow-hidden relative bg-blue-600  hover:bg-blue-400 hover:shadow-blue-700 hover:shadow-lg   text-white  w-36 h-36 cursor-pointer group">
                       <a href="#" class="relative w-full h-full flex justify-center items-center">

                       <div class="text-7xl absolute -bottom-5 text-slate-400 -right-3  group-hover:text-blue-500"><i class="bx bx-plus "></i></div>
                       <div class="z-10 font-medium"> + Nouvelle Colis </div>
                       </a>
                    </div>
                    <div class="overflow-hidden relative bg-green-600  hover:bg-green-400 hover:shadow-green-700 hover:shadow-lg   text-white  w-36 h-36 cursor-pointer group">
                        <a href="#" class="relative w-full h-full flex justify-center items-center">
                        <div class="text-7xl absolute -bottom-4 text-slate-400 -right-1  group-hover:text-green-500"><i class="bx bx-archive-in"></i></div>
                        <div class="z-10">Archive</div>
                        </a>
                     </div>
                     <div class="overflow-hidden relative bg-green-600  hover:bg-green-400 hover:shadow-green-700 hover:shadow-lg   text-white  w-36 h-36 cursor-pointer group">
                        <a href="#" class="relative w-full h-full flex justify-center items-center">
                        <div class="text-7xl absolute -bottom-4 text-slate-400 -right-1 group-hover:text-green-500"><i class="bx bxs-truck"></i></div>
                        <div class="z-10 text-center">Liste de colis <br> envoyer</div>
                        </a>
                     </div>
                     <div class="overflow-hidden relative bg-yellow-600  hover:bg-yellow-400 hover:shadow-yellow-700 hover:shadow-lg   text-white  w-36 h-36 cursor-pointer group">
                        <a href="#" class="relative w-full h-full flex justify-center items-center">
                        <div class="text-7xl absolute -bottom-4 text-slate-400 -right-1  group-hover:text-yellow-500"><i class="bx bx-check"></i></div>
                        <div class="z-10 text-center">Liste de colis <br> recu</div>
                        </a>
                     </div>
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <div class="flex justify-center items-center w-36 h-36">

                    </div>
                    <div class="overflow-hidden relative bg-purple-600  hover:bg-purple-400 hover:shadow-purple-700 hover:shadow-lg   text-white  w-36 h-36 cursor-pointer group">
                        <a href="#" class="relative w-full h-full flex justify-center items-center">
                        <div class="text-7xl absolute -bottom-4 text-slate-400 -right-1  group-hover:text-purple-500"><i class="bx bx-group"></i></div>
                        <div class="z-10 text-center">Nos Clients</div>
                        </a>
                     </div>
                     <div class="overflow-hidden relative bg-blue-600  hover:bg-blue-400 hover:shadow-blue-700 hover:shadow-lg   text-white  w-36 h-36 cursor-pointer group">
                        <a href={{  route('poste.index') }} class="relative w-full h-full flex justify-center items-center">
                        <div class="text-7xl absolute -bottom-4 text-slate-400 -right-1  group-hover:text-blue-500"><i class="bx bxs-building-house"></i></div>
                        <div class="z-10 text-center">Les Postes</div>
                        </a>
                     </div>
                     <div class="overflow-hidden relative bg-green-600  hover:bg-green-400 hover:shadow-green-700 hover:shadow-lg   text-white  w-36 h-36 cursor-pointer group">
                        <a href="#" class="relative w-full h-full flex justify-center items-center">
                        <div class="text-7xl absolute -bottom-4 text-slate-400 -right-1  group-hover:text-green-500"><i class="bx bx-user"></i></div>
                        <div class="z-10 text-center">Utilisateurs</div>
                        </a>
                     </div>
                </div>
            </div>
        </div>

        <div class="relative h-full">
            <div class="grid grid-cols-1 gap-2">
                <div class=" text-white flex justify-center items-center w-36 h-36">
                    <div class="clock ">
                        <div class="wrap">
                          <span class="hour"></span>
                          <span class="minute"></span>
                          <span class="second"></span>
                          <span class="dot"></span>
                        </div>
                      </div>
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

</div>
@endsection
