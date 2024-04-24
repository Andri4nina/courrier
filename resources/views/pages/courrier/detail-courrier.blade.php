@extends('welcome')

@section('content')
    {{ view('pages.layouts.headers') }}
    <div class="w-10/12 mx-auto max-h-screen h-screen flex justify-center">
        <div class=" w-full">
            <h3 class="text-white text-xl font-semibold  flex items-center">
                <a href="javascript:history.back()" class="flex justify-center items-center"><i
                        class="bx bx-chevron-left"></i></a>
                <p>Courrier/<small>Details colis</small></p>
            </h3>


            <div class="w-full mt-10 max-w-6xl">

                <div class="flex justify-between">
                    <div>

                        <div class="mb-8 text-white font-bold items-center flex">
                            <div class="rounded-sm min-h-5 min-w-1 bg-blue-800"></div>
                            <div class="ms-2">Information du courrier</div>
                        </div>
                        <div class="grid grid-cols-1">
                            <div class="">
                                <img src={{ asset('images/Postman.png') }} alt="" class="w-40 h-40 mx-auto">
                            </div>

                            <div class="">
                                <div
                                    class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                    <div class="text-white w-1/3 border-r">
                                        Libelle
                                    </div>
                                    <div class="w-2/3">
                                        <input disabled type="text"
                                            class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                            name='libelle' value={{ $courriers->libelle }}>
                                    </div>
                                </div>
                                <div
                                    class=" inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                    <div class="text-white w-1/3 border-r">
                                        Poids
                                    </div>
                                    <div class="w-2/3">
                                        <input disabled type="text"
                                            class=" w-full text-right bg-transparent pr-10 outline-none text-white"
                                            name='poids' id='poids' onkeyup ="calculerPrix()"
                                            value={{ $courriers->poids }}>
                                    </div>
                                    <div class="absolute text-white right-1  px-[14px]">
                                        Kg
                                    </div>
                                </div>
                                <div
                                    class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                    <div class="text-white w-1/3 border-r">
                                        Prix
                                    </div>
                                    <div class="w-2/3">
                                        <input disabled type="prix"
                                            class="w-full text-right bg-transparent pr-10 outline-none text-white"
                                            name="prix" id='prix' value={{ $courriers->prix }}>
                                    </div>
                                    <div class="absolute text-white right-1 px-[14px]">
                                        AR
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div>
                        <div class="mb-8 text-white font-bold items-center flex">
                            <div class="rounded-sm min-h-5 min-w-1 bg-blue-800"></div>
                            <div class="ms-2">Information de l'expediteur</div>
                        </div>
                        <div class="">
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Nom
                                </div>
                                <div class="w-2/3">
                                    <input disabled type="text"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white uppercase"
                                        name='nom_exp' value={{ $courriers->exp->nom }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 capitalize flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Prenom
                                </div>
                                <div class="w-2/3">
                                    <input disabled type="text"
                                        class=" w-full text-left bg-transparent pr-3 outline-none text-white"
                                        name='prenom_exp' value={{ $courriers->exp->prenom }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Adresse
                                </div>
                                <div class="w-2/3">
                                    <input disabled type="text"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                        name="adresse_exp" value={{ $courriers->exp->adresse }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Email
                                </div>
                                <div class="w-2/3">
                                    <input disabled type="email"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                        name="email_exp" value={{ $courriers->exp->email }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Telephone
                                </div>
                                <div class="w-2/3">
                                    <input disabled type="tel"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white" name="tel_exp"
                                        value={{ $courriers->exp->tel }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Cin
                                </div>
                                <div class="w-2/3">
                                    <input disabled type="tel"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white" name="cin_exp"
                                        value={{ $courriers->exp->cin }}>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-8 text-white font-bold items-center flex">
                            <div class="rounded-sm min-h-5 min-w-1 bg-blue-800"></div>
                            <div class="ms-2">Information du destinataire</div>
                        </div>
                        <div class="">
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Nom
                                </div>
                                <div class="w-2/3">
                                    <input disabled type="text"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white uppercase"
                                        name='nom_exp' value={{ $courriers->dest->nom }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 capitalize flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Prenom
                                </div>
                                <div class="w-2/3">
                                    <input disabled type="text"
                                        class=" w-full text-left bg-transparent pr-3 outline-none text-white"
                                        name='prenom_exp' value={{ $courriers->dest->prenom }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Adresse
                                </div>
                                <div class="w-2/3">
                                    <input disabled type="text"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                        name="adresse_exp" value={{ $courriers->dest->adresse }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Email
                                </div>
                                <div class="w-2/3">
                                    <input disabled type="email"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                        name="email_exp" value={{ $courriers->dest->email }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Telephone
                                </div>
                                <div class="w-2/3">
                                    <input disabled type="tel"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                        name="tel_exp" value={{ $courriers->dest->tel }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Cin
                                </div>
                                <div class="w-2/3">
                                    <input disabled type="tel"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                        name="cin_exp" value={{ $courriers->dest->cin }}>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between gap-5">
                    <div class="w-1/3">
                        <div class="mb-8 text-white font-bold items-center flex">
                            <div class="rounded-sm min-h-5 min-w-1 bg-blue-800"></div>
                            <div class="ms-2">Actions</div>
                        </div>

                        <div
                            class=" inputfield w-10/12 px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                            <div class="text-white w-1/3">
                                Rappel
                            </div>
                            <div class="w-2/3 flex justify-end items-center gap-2">
                                <div class="relative group">
                                    <form action="">
                                        <button
                                            class="w-8 h-8 border text-purple-500 border-purple-500  hover:bg-purple-500 hover:shadow-purple-700 hover:shadow-lg hover:text-white  font-bold ">
                                            <i class="bx bx-message-square-dots"></i>
                                        </button>
                                    </form>
                                    <p
                                        class="absolute w-20 text-center -top-3 left-1/2 -translate-x-1/2  opacity-0 group-hover:opacity-100 group-hover:-translate-y-1/2 duration-700  text-sm rounded-sm border-purple-500  bg-purple-500 shadow-purple-700 hover:shadow-lg text-white">
                                        par SMS</p>
                                </div>
                                <div class="relative group">
                                    <form action="">
                                        <button
                                            class="w-8 h-8 border text-yellow-500 border-yellow-500  hover:bg-yellow-500 hover:shadow-yellow-700 hover:shadow-lg hover:text-white  font-bold ">
                                            <i class="bx bx-mail-send"></i>
                                        </button>
                                    </form>
                                    <p
                                        class="absolute w-20 text-center -top-3 left-1/2 -translate-x-1/2  opacity-0 group-hover:opacity-100 group-hover:-translate-y-1/2 duration-700  text-sm rounded-sm border-yellow-500  bg-yellow-500 shadow-yellow-700 hover:shadow-lg text-white">
                                        par Email</p>
                                </div>
                            </div>
                        </div>

                        <div
                            class=" inputfield w-10/12 px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                            <div class="text-white w-1/3">
                                Facture
                            </div>
                            <div class="w-2/3 flex justify-end items-center gap-2">
                                <div class="relative group">
                                    <form action="">
                                        <button
                                            class="w-8 h-8 border text-slate-500 border-slate-500  hover:bg-slate-500 hover:shadow-slate-700 hover:shadow-lg hover:text-white  font-bold ">
                                            <i class="bx bx-printer"></i>
                                        </button>
                                    </form>

                                </div>

                            </div>
                        </div>

                        <div
                            class=" inputfield w-10/12 px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                            <div class="text-white w-1/3">
                                Status
                            </div>
                            <div class="w-2/3 flex justify-end items-center gap-2">
                                <div class="relative group text-white">
                                    @if ($courriers->status === 0)
                                        <p>Dans notre engard</p>
                                    @else
                                        <p>Recupere</p>
                                    @endif
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="w-2/3">
                        <div class="mb-8 text-white font-bold items-center flex">
                            <div class="rounded-sm min-h-5 min-w-1 bg-blue-800"></div>
                            <div class="ms-2">MAP</div>
                        </div>

                        <div class="text-white flex items-center">
                        @if ( $courriers->exp_post->region === $courriers->dest_post->region )
                        <span class="border-b-4 border-yellow-400">{{ $courriers->exp_post->region }}</span>
                        <i class="bx bx-right-arrow-alt"></i>
                        <span class="border-b-4 border-yellow-400">{{ $courriers->dest_post->region }}</span>
                            @else
                            <span class="border-b-4 border-blue-400">{{ $courriers->exp_post->region }}</span>
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="border-b-4 border-green-400">{{ $courriers->dest_post->region }}</span>
                        @endif


                        </div>


                        <div >

                            <?xml version="1.0" encoding="utf-8"?>
                            <!-- Generator: Adobe Illustrator 24.3.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                            <svg class="w-96 h-96 mx-auto" version="1.1" id="ccmada"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 692.7 1355.6" style="enable-background:new 0 0 692.7 1355.6;"
                                xml:space="preserve" onload="colorizeRegions()">
                                <style type="text/css">
                                    .st0 {
                                        stroke: #000000;
                                        stroke-miterlimit: 10;
                                    }
                                </style>
                                <path class="st0 fill-white " id="DIANA" d="M455.5,210.9c-1.1,0-1-0.3-1.8-0.5c-0.2,0-0.4,0-0.6-0.1c-1.4-0.4-2.3-2-3.3-2.8
                                    c-0.8-0.7-2.1-1.1-2.6-2.1l0.1-0.6l0.3-0.4c1-0.3,2.1,0.2,3,0s1.4-1.5,2-2s1.6-0.6,2.2-1.1l0.2-0.5c-0.3-0.5-3.4-1.7-4.2-2
                                    c-0.2-1-2.1-2.1-3-2.5c-0.7-0.2-1.5-0.3-2.1-0.6c-0.4-0.2-0.9-0.5-1.2-0.8c-0.2-0.2-0.4-0.5-0.6-0.8s-2.4-7-2.4-7.1
                                    c0-0.6,0.5-0.9,0.3-1.6c-0.4-0.5-0.8-1.1-1-1.7c-0.5-1.7,0.5-6.2,1.9-7.4c1.3-0.4,2.7,0.4,3.3,0c0.1-0.4,0.1-0.7,0-1.1l-0.3-0.4
                                    c-1,0.4-1.4-0.1-2.2-0.3c-0.4-0.1-0.8-0.1-1.1-0.2c-0.6-0.6-0.1-1.5-0.1-2.2c0-1.7,0.2-3.3,0.6-4.9c0.1-0.5,0.5-1,0.6-1.5
                                    c0-0.5,0.2-1,0.5-1.5l0.8-0.5c1.1-0.5,2.9,1.4,4.1,0.3c0.2-0.3,0.3-0.7,0.3-1.1c-0.3-0.4-0.5-0.9-0.6-1.4c0.2-0.9,1.7-1.6,1.1-2.7
                                    l-0.3-0.3V158c0.5-0.8,1.2-1.5,2-2.1c0.8,0.1,1.5,0.8,1.5,1.6c-0.4,0.5-1.2,0.2-1.7,0.9c-0.1,0.8-0.1,1.6,0.2,2.4l0.4,0.3
                                    c0.5,0,0.8-0.5,1.1-0.8h0.5c0.3,0.9-0.8,1.6-0.3,2.7c0.7,0.9,1.7,0.1,2.2-0.4c0.2-0.6-0.2-1.1,0-1.7l0.3-0.4h0.7
                                    c0.3-0.2,0.6-0.3,1-0.3v-0.6c-0.6-1.1-1.3-1-2.2-1.8l-0.1-0.6l0.3-0.4c0.4-0.2,0.8-0.2,1.1-0.2c0.2,0,0.3,0.2,0.4,0.2
                                    c0.7,0.2,1.8-0.1,2.5,0.3c0.4,0.4,0.3,1,0.7,1.3c0.3,0.2,0.5,0.4,0.7,0.6c0.1,0.6,0.2,1.2,0.2,1.8c0.3,0.2,0.6,0.4,0.9,0.4v0.6
                                    c-0.2,0.2-0.4,0.5-0.6,0.8c0.1,0.3,0.2,0.6,0.5,0.7c0,0.6,0,1.1-0.2,1.7l0.4,0.3c1.2-0.2,1.2-1.2,2.2-1.2c0.8,0.9,1.8,0.3,2.7,0.7
                                    l0.3,0.4c-0.1,0.5-0.2,1-0.4,1.4c0.3,0.2,0.5,0.4,0.8,0.6c0,1.8-0.8,3.1,0.9,4.2c0.3,0.5,0.1,1.2,0.2,1.8s0.5,0.9,0.7,1.5
                                    c0.2,0.9-0.4,2.1,0.5,2.7c0.3,0.2,0.6,0.2,0.9,0.5c0.2,0.3,0.2,0.7,0.2,1c-0.4,0.3-1,0.4-1.2,0.9l0.1,0.6c1,0.9,2.1,1.5,3.1,2.4
                                    c0.8,0.7,1.5,1.7,2.4,2.4c0.2,0.2,0.6,0.4,0.8,0.6c0.6,0,1.1-0.1,1.7-0.2c0.6,0,1.1,0.4,1.7,0.4c1.3-0.4,2.4-1.1,3.5-1.8
                                    c0.3-0.2,0.4-0.5,0.7-0.6c0.2-0.5,0.5-0.9,0.9-1.2c0.2-0.6-0.1-1.4,0.2-2.3l-0.2-0.5c-0.3-0.2-0.5-0.4-0.7-0.6v-0.5
                                    c0.4-0.5,0.2-1.9,0.7-2.7c-0.2-0.9-0.5-1.7-0.9-2.5c0.1-0.5,0.4-0.9,0.8-1.2c0.2-0.6-0.5-1.4-0.2-2.3c0.4-0.9,0.9-1.8,1.5-2.6
                                    c0.2-0.2,0.5-0.5,0.6-0.7c0.1-0.4,0.2-0.8,0.1-1.2c-0.2-1.7-2.3-2.7-2.1-4.5c0.2-0.2,0.4-0.5,0.7-0.7s0.6-0.2,0.9-0.4
                                    c0.2-0.7,0.5-1.4,1.3-1.4c0.8,0.6,1.4,1.3,1.9,2.2l0.5,0.2c1,0,1.3-1,1.7-1.7c1.1-0.6,1.9-1.5,3.2-0.9c0.3,0.2,0.7,0.3,1.1,0.3
                                    l0.3-0.4c-0.1-0.3-0.1-0.6-0.1-0.9c0.4,0.1,0.8,0.2,1.1,0.2c0.7-0.4,1.5-0.4,2.2-0.1l0.2-0.5c-0.2-0.3-0.3-0.6-0.5-0.8l0.3-0.4
                                    c0.6,0.3,0.8,1,1.2,1.5l0.5-0.1l0.4,0.1c0.2,0.3,0.3,0.7,0.2,1.1c0.5,0.2,1.1-0.1,1.6-0.1l0.2-0.5c-0.2-0.4-0.7-0.7-0.8-1.2
                                    c-0.1-0.3-0.2-0.7-0.3-1c-0.2-0.3-0.6-0.5-0.8-0.9c-0.4-0.9-0.2-2.6-0.5-3.3c-0.1-0.3-0.5-0.4-0.7-0.7c-0.1-0.2-0.1-0.3-0.2-0.5
                                    c-0.3-0.6-1-0.9-1.5-1.2c-0.3-0.6,0-1.2-0.1-1.8s-0.7-1.3-0.6-2.1c0.1-0.3,0.2-0.7,0.3-1c0.1-0.6-0.2-1.1-0.2-1.7l0.4-0.3l0.5,0.1
                                    l0.3,0.3c0.3-0.1,0.7-0.1,1.1,0c0.2,0.7,0.3,2,1.2,2.2l0.2,0.4c-0.1,0.6-0.2,1.1-0.3,1.6l0.3,0.4c0.4,0,0.8,0.1,1.1,0.3
                                    c0.1,0.3,0.2,0.6,0.4,0.9c1.1,0.3,2.2,0.5,3.3,0.7c0.9,0.3,1.6,1.4,2.5,1.6c0.6-0.3,1.3-0.5,2-0.7c0.8-0.1,1.6-0.2,2.4-0.1
                                    c0.8,0.1,1.8,0.9,2.5,0.8c0.3-0.2,0.5-0.4,0.6-0.7c0.5-0.3,1-0.2,1.5-0.5c0.3-0.1,0.5-0.4,0.8-0.5c0.5-0.1,1-0.3,1.5-0.5
                                    c0.3-0.2,0.5-0.4,0.8-0.6l0.6,0.1c0.2,0.3,0.4,0.5,0.7,0.6l0.3-0.3c0.1-0.5,0.3-1,0.6-1.4c0.4-0.4,0.9-0.4,1.2-0.9
                                    c0.7-1,1.5-2,2.3-3c0.5-0.4,1.3-0.5,1.7-1V141c-0.1,0-0.2-0.1-0.3-0.1c-0.3,0.1-0.7,0.1-1-0.1c-0.2-0.3-0.3-0.6-0.5-0.9
                                    c0-0.4,0.3-0.6,0.4-0.9c0.4-1-0.2-1.5,1-2.4c0-1.8,0.6-2.2,1.8-3.2c0.3-0.3,0.6-0.6,1-0.8c0.3-0.1,0.7,0,1-0.2
                                    c0-0.5-0.4-0.9-0.4-1.4l-0.3-0.4c-0.4,0-0.8-0.1-1.1-0.2l-0.2-0.3c0.8-1.2-0.4-1.6-0.5-2.4c0-0.4,0.1-0.8,0.1-1.2
                                    c-0.3-0.4-0.5-1-0.5-1.6c0.1-0.7,0.5-1.4,0.6-2.1c0.3-1.2,0.4-2.5,0.4-3.7c0-0.4,0-0.8,0-1.2c0.2-0.4,0.6-0.8,1-1
                                    c0.4-0.5,0.1-1.2,0.3-1.8l2.2-4.6c0.6-0.8,1.2-1.6,1.9-2.4c0.3-0.4,0.3-0.8,0.7-1.2c0.1-0.7,0.3-1.4,0.6-2.1c0-0.2,0-0.4,0.1-0.6
                                    c0.2-0.6,1.3-2,1.9-2.1l0.3-0.4c-0.1-0.6-0.1-1.3,0-1.9c0.5-0.4,1.2-0.7,1.9-0.8l0.4-0.4l-0.1-0.4c-0.3-0.1-0.6-0.3-0.8-0.6
                                    c0.2-1,0.6-2,1.2-2.8c0.7-1.3-0.1-2.2,0.1-3.5c0-0.3,1-2.6,1.2-2.9c0-0.4-0.1-0.8-0.2-1.1c-0.6-0.3-1.1-0.7-1.7-1.1
                                    c-0.2-0.6,0.2-1.2-0.2-1.7c-0.5-0.8-1.7-0.9-2.4-2.3c-0.9-1.5,0.2-2.7-0.2-4.1c-0.2-0.6-0.7-1.2-0.9-1.9c-0.2-1,1.1-2.1-0.1-2.9
                                    c-0.2-0.1-0.5-0.2-0.7-0.4s-0.3-0.6-0.9-0.7c-0.5,0.1-0.9,0.5-1.4,0.5c-0.1-0.4-0.2-0.8-0.1-1.2c-0.1-0.4-0.1-0.9-0.1-1.3
                                    c0.1-0.6,1.2-1.1,1.3-2.1l-0.2-0.5l-0.4-0.2c-0.4-0.8,0.3-1.3,0.4-2c0-0.4,0-0.9,0.1-1.3c0.2-0.6,0.9-1,1.1-1.6l-0.1-0.6
                                    c-0.5-0.5-2.7-0.1-3.1,0.4c-0.3,0.4-0.5,0.9-0.8,1.3h-0.4l-0.4-0.3c-0.5-1.1,0.7-2.8-0.5-5.1c-1-2-2.9-1.7-3.5-2.6
                                    c0-0.4,0-0.8,0-1.2c-0.5-0.3-1.2-1-1.2-1.5c0.4-0.4,0.6-0.9,0.6-1.4c-0.5-0.5-0.4-1.2-1-1.7l-0.5,0.2c-0.3,0.8,0.1,1.6-0.2,2.3
                                    l-0.5,0.1c-0.3-0.4-0.6-0.8-0.9-1.1c-0.3-0.1-0.8-0.1-1.1-0.3s-0.8-0.6-1.2-0.8v-0.5c0.4-0.3,0.9-0.4,1.2-0.7c0.7-0.7,0.4-2.6,2-2.7
                                    c0.6,0.1,1,0.9,1.7,1.1c0.4,0,0.9,0,1.3,0c1.9,0,4.9,0.1,6.6,0.8c0.8,0.9,0.4,3.1,1.4,4l0.5,0.2l0.3,0.3c0.1,1.2,0.6,2.4,1.5,3.2
                                    c0.8,0.2,1.1-0.3,1.8-0.5c0.4,0,0.9-0.1,1.3-0.2c0.2-0.1,0.4-0.3,0.6-0.5c1.2-1.1,0.6-2.1,0.6-3.5c0.2-0.7,0.4-1.4,0.6-2.1
                                    c0.4-1.9,0-2.4,1.6-3.8c0.6-2-2-1.9,0-4.4c0.4-0.5,0.9-0.9,1.4-1.2s1-1,1.5-1.2s1.1,0.7,1.9,0.7c0.3-0.2,0.4-0.6,0.5-0.9
                                    c-0.3-0.5-0.4-1.1-0.4-1.6l0.3-0.3h0.5c0.2,0.2,0.5,0.4,0.8,0.5c0.4-0.3,0.7-1.9,1.5-2.6l0.5,0.1c0.2,0.6,0.2,1.2,0.2,1.8
                                    c0.6,0.5,1.4,0.5,1.9,0.1c0.9-1,0-3.5,0.9-4.5c0.4-0.1,0.8-0.1,1.2,0.1c0.3-0.1,0.5-0.4,0.6-0.7h0.5c0.2,0.3,0.3,0.7,0.4,1l0.4,0.3
                                    c1.3,0.2,2.8-1.7,3.3-2.8c-0.2-1.4-1.6-1.4-1.5-3.8c0.2-0.6,1-0.9,1.2-1.5c0.1-0.3,0.2-0.7,0.3-1c0.3-0.4,0.8-0.5,1-1l0.5-0.2
                                    c0.2,0.2,0.5,0.5,0.6,0.7l0.4-0.2c0.3-0.5,0.4-1.1,0.4-1.7c-0.2-0.3-0.4-0.5-0.6-0.8c-0.3-0.4-0.2-0.9-0.8-1.2
                                    c-0.7,0.1-1.4,0.3-2.1,0.6l-0.2-0.5c0.2-0.3,0.2-0.6,0.2-0.9c-0.5-0.2-0.8-0.7-0.8-1.2l-0.4-0.3c-0.9-0.2-1.7,0.4-2.6,0.6
                                    c-0.8-0.6-1.8-0.2-2.7-0.6l-0.1-0.6c0.3-0.3,0.7-0.7,1.1-0.9c1.1-0.6,3.9-1,4.4-1.6c0-0.4,0-0.8,0-1.2l0.5-0.2c1,0,3.1,2.4,3.5,3.2
                                    c0.3,0.6,0.5,1.3,0.8,1.9l0.4,0.3c0.5-0.1,0.8-0.5,1.1-0.9c0.2,0.3,0.4,0.5,0.7,0.6L568,17c0.4-1.2-0.9-1.5-1.1-2.2s0-0.9-0.7-1.3
                                    c-0.3-0.4-0.1-1.1-0.1-1.6l-0.3-0.3c-0.8-0.3-1.5,0.3-2.2,0.2l-0.2-0.4l0.1-0.6c0.2-0.2,0.4-0.5,0.7-0.7c0-0.6,0.1-1.2,0.5-1.6h0.5
                                    c0.2,0.2,0.5,0.4,0.8,0.6h0.5l0.2-0.5c-0.3-0.6-0.5-1.3-0.8-1.9c0.2-0.3,0.5-0.4,0.7-0.6c0.6-0.6,0.5-1.3,1.3-2
                                    c0.5-0.4,1.2-0.7,1.6-1.1s0.5-0.9,0.8-1.2c0.6-0.6,2-0.2,2.5,0.3c0.4,0.3,0.4,0.9,0.9,1.2s1,0.3,1.4,0.6c0.6,0.8,1,1.6,1.3,2.6
                                    c0.1,0.4,0,0.9,0.1,1.2c0.3,1.1,1.4,2.2,1.4,3.3c0,0.3-0.2,0.8-0.2,1.1l0.2,0.4c0.6,0.1,1.2,0.2,1.7,0.3c0,0.4,0.1,0.8,0.1,1.2
                                    c0.3,0.8,2,1.7,1.8,2.6c-0.2,0.3-0.3,0.6-0.5,0.8c-0.5,0-1,0.3-1.2,0.8l0.1,0.3c0.1,0.3,0.2,0.4,0.3,0.6c0.2,0.5,0.3,1.1,0.4,1.7
                                    c0.2,0.2,0.4,0.5,0.7,0.7c0.3,1.3,0.1,2.6,0.9,3.8c0.5,0.8,1.3,1.2,1.3,2.4v0.2l-0.3,0.3c-0.6,0.1-1-0.3-1.4-0.7
                                    c-0.5-0.4-0.9-0.9-1.3-1.4c-1.1-1.5-1.6-3.4-3.6-3.8l-0.5,0.2c0.1,0.3,0.2,0.7,0.4,1c0.2,0.4-0.7,2.3-1,2.8h-0.5
                                    c-0.3-0.4-0.4-0.9-0.8-1.2c-0.3,0.1-0.6,0.1-0.9,0c-0.1-0.7-1-1-1.6-1.1c-0.6-0.9-0.5-2.4-1.1-2.9c-1.3,0.4-2.3,1.6-2.2,3
                                    c0.3,0.2,0.6,0.4,0.9,0.4l0.3,0.3l-0.1,0.6c-1,1-1.6,2.3-1.8,3.7l0.4,0.3h1.2c0.3-0.2,0.5-0.4,0.8-0.5c0.3,0.2,0.5,0.5,0.5,0.8
                                    l0.3,0.2c0.4,0,0.8-0.1,1.1-0.2c0.5,0.2,0.9,0.4,1.2,0.8l-0.1,0.6c-1.2,0.9-2.4,1.4-2.2,3.3c0.1,0.3,0.4,0.5,0.7,0.7
                                    c0.4,0.1,0.8,0.1,1.1-0.1c0.4-0.8,0.8-1.6,1-2.4c0.3-0.2,0.7-0.3,1-0.6c3.4,1.8,0.8,2.1,0.9,4.2l0.3,0.4c0.4,0,0.9,0,1.4,0
                                    c0.4,0.1,0.7,0.2,1.1,0.2c1-0.2,1.9-1,2.1-2c0.2-0.5,0.2-1.2,0.1-1.7c-0.3-0.7-1.1-1.3-1.3-2.1c0.1-0.6,0.4-1.1,0.9-1.3
                                    c0.7-0.5,2.2-0.6,2.9,0.1c0.3,0.3,0.2,0.6,0.4,1c0,0.1,0.2,0.3,0.3,0.4c0.6,0.7,0.7,1.4,1.2,2.1c0.4,0.5,1.1,0.7,1.2,1.5
                                    c0.2,0.8,0,1.6-0.4,2.3l0.1,0.5c0.2,0.2,0.4,0.5,0.7,0.7c0,0.4,0.1,0.7,0.1,1.1c0.5,0.4,1.1,0.5,1.5,1c0.8,1,0,2.4,0.3,3.5l0.5,0.1
                                    c0.4-0.7,0.8-1.4,1.2-2.2c0.4-0.1,0.7-0.2,1.1-0.3c1.4-0.4,3.2-0.8,4.6-0.2c0.6,0.3,0.5,0.8,0.8,1.2c0.1,0.1,0.3,0.2,0.4,0.3
                                    c0.4,0.6,0.7,1.3,0.8,2c0.1,1-0.6,2-0.2,3c0.5,1.2,1.4,0.8,2.1,1.2c0.4,0.4,0.4,2.1,0.6,2.8c0.3,0.8,0.6,1.6,1,2.3
                                    c0.1,0.4,0.1,0.8,0.1,1.2c0.2,1.2,1.5,5.3-0.7,5.6l-0.5-0.1c-1.1-1.1,0.2-4-0.8-5.6h-0.3c0.4,1.1-0.4,3.4-0.4,4.7
                                    c0.1,1.7,1.4,1.7,1.2,4.7c0,0.4,0,0.9,0,1.3c-0.3,1.2-1.2,0.7-1.3,3.1c-0.1,0.5,0.1,0.9,0.3,1.3l0.5,0.2c0,0.5,0.2,1.1,0.5,1.6
                                    l0.4,0.3l0.5-0.1c0.3-0.4,0.4-0.9,0.8-1.3l0.6-0.1c2,0.9,1.4,1.5,2.2,2.3c0.4,0.5,1.2,0.6,1.6,1.1c1,1.1,1.8,2.4,2.2,3.8
                                    c0.1,0.7,0.2,1.5,0.3,2.2c0.4,1,1.5,1.7,1,3.1c-0.2,0.6-1.8,1.8-2.2,3.2L608,87c0.9,0.1,1.2-0.7,1.9-0.8c1-0.1,1,0.6,1.7,1l-1.6,2.9
                                    c-0.3,0.6-0.7,1.3-1.1,1.9c-0.6,0.9-2.8,1-3.9,1s-1.2,0.9-2.1,1.9s-1.6,1.2-1.6,1.9s-0.4,2.8-0.4,3.8s-0.9,2.1-2.5,3.8
                                    c-1.1,1-2.2,2-3.4,2.9c-1.1,1-1.2,3.4-0.4,3.9s0.8,2.2,0.1,3.2s-1,1-2,2s-1.8,1-2.8,1.8s-1,1.8-1.2,3.4s0.6,1.9,1.1,3
                                    c0.5,1.2,1.1,2.4,2,3.4c0.9,0.9,0.4,2.4-0.4,3.4c-0.8,1-1.4,2.1-1.9,3.2c-0.6,1.4-0.6,4.1-0.6,6s-1.5,2.4-3.2,2.5
                                    c-1.3,0.1-2.5,0.7-3.4,1.6c-0.6,1.1-1.1,2.3-1.4,3.5c0,0.5,0.1,3.9,0,5.8s0.1,1.9,1,2.8s0.5,2,0.2,3.4c-0.2,1.4,0.6,2.8,1.9,3.4
                                    c1.2,0.6,1,1.8,1.1,3.1s-0.2,1.5-1.5,2.1s-1,1.5-0.5,2.5c0.6,1.1,1.4,2.1,2.4,3c1.5,1.6,2.1,2.2,1.4,3.4s-0.9,7.1-1.4,8.2
                                    c-0.5,1.6-0.8,3.2-0.9,4.9c0,1-0.2,2.2-3,4s-1.1,3.8-1.1,5s-0.9,2.8-1.2,4.4s-1.6,1.9-2.9,1.8c-1.6,0.1-3.1,0.3-4.6,0.6
                                    c-1,0.1-1.9,0.4-2.8,1c-0.8,0.5-0.1,3.4-0.5,4s-1.1,1-1.1,1.9c0.2,1.3-0.2,2.6-0.9,3.8c-1,1.2-0.9,1.6-3.1,2.1s-1.1,1.4-1.1,2
                                    s-0.2,1.8-0.2,2.9s-1,1-1.5,1s-2.8,0.3-2.8,0.3c-0.3-0.5-0.7-1-1.3-1.1c-0.5,0.1-1,0.3-1.3,0.7c-0.4,0-2.8-1.7-3.4-2
                                    c-2.7-1.4-2.4-1.4-5.6-1.8c-0.8-0.1-1.3-1.7-2.4-1.7c-0.7,0-1.2,0.7-1.8,0.9c-0.3,0.1-0.8,0-1.2,0.1c-1.7,0.5-2.7,3.7-4,4.9
                                    c-0.8,0.3-1.6,0.6-2.4,0.9c-1.1,0.7-2.1,1.5-3.1,2.3c-0.3,0.4-0.4,0.9-0.8,1.3c-0.3,0.2-0.7,0.2-1,0.2c-0.4-0.7-0.6-1.5-0.4-2.3
                                    c-0.2-0.5-0.7-0.7-0.9-1.1c-0.7-1.4-0.7-3.5-2.8-3.2c-0.5,0.2-0.6,0.7-1,1c-0.7,0.5-1.5,0-2.3,0.1c-1.2,0.1-2.2,1.3-3.7,1
                                    c-1.5,0.9-3.3,1.1-4.9,0.7c-1.4-0.3-2.8-0.9-4-1.8c-1-0.8-5-0.5-6-0.5s-4.1,0.5-5.4-0.9s-5.2-0.8-7.4-1.6s-3.2-3.7-3.2-3.7
                                    c-1.6-0.6-3-1.5-4.2-2.6c-0.2-0.3-0.6-1-0.8-1.2c-0.8-0.5-1.7-1.1-2.5-1.5c-0.5-0.2-1-0.3-1.5-0.5c-0.8-0.5-1.5-1.2-2-2.1
                                    c-0.5-0.8-2.1-3.5-2.8-3.9l-0.5,0.1c-0.9,0.8-1.2,1.9-2.4,2.3c-0.3,0.1-0.7,0-1-0.1c-1.8-0.9-1.3-4.4-0.8-6c0.4-1.3,2.1-1.7,2.9-2.6
                                    c0.5-0.6,0.9-1.4,1.3-2.1c0.3-0.4,0.6-0.8,1-1.1c0.9-1,1.6-2.2,1.9-3.6l-0.5-0.9l-0.6-0.1c-2.6,1.1-3.1,2.3-5,3.2
                                    c-0.9,0.4-1.9,0.8-2.8,1.2c-1.3,0.7-2.5,1.6-3.5,2.6c-1.3,0.7-2.7,1.4-4.1,1.9c-0.3,0.2-0.5,0.4-0.7,0.6c-0.6,1.1,1.6,2.5,0.1,4.3
                                    c-0.3,0.3-0.7,0.6-1.1,0.7c-0.3,0.1-3,0.5-3,1.1l0.3,0.3l1.1,0.2l0.4,0.9l-1,0.5l-0.6,2.2C455.6,210.3,455.7,211,455.5,210.9
                                    L455.5,210.9z" />
                                <path class="st0 fill-white" id="SAVA" d="M655.8,396.9c0.1,0.6,0.2,1.1,0.4,1.7l0.8,0.5l0.2,0.5c-0.1,0.7-0.5,1.6-0.3,2.3l0.4,0.2
                                    c0.3-1.9,3.1-1.3,4.3-1.4c0.7,0,1.3-0.1,1.9-0.1c2.4-1.6,0.6-2,1-3.5c0.2-0.8,1.3-1.1,1.7-2c0.3-0.7,0-1.1,0-1.8
                                    c0.4-0.9,0.9-1.8,1.6-2.5c0.5-0.2,1.2,0,1.7,0.1c2.1-1,1-3.3,1.4-4.5c0.3-0.6,0.9-0.9,1.4-1.3c1.5,0.1,1.1-0.2,2-1.1v-0.6L674,383
                                    c-0.4,0-0.7-0.2-0.9-0.5c-0.2-1.8,1.5-4.4,2.1-6.1c0.1-0.6,0.2-1.1,0.4-1.7c0.5-1,1.4-1.9,1.9-2.9c1.5-2.7,2.8-5.6,3.8-8.5
                                    c0.2-0.7,0.8-1.4,1-2c0.3-0.9,0.3-2,0.6-2.8c0.3-0.7,0.5-1.4,0.5-2.2c0.5-0.5,0.9-1,1.1-1.6c0.2-0.8,0-3,0.2-3.6
                                    c0.2-0.4,0.6-0.8,0.8-1.2s0.4-0.9,1-1.1c0.7-0.9-0.3-1.8-0.4-2.7c0-0.5,0.9-2.9,1-3.8c0.2-1.1-0.2-2.1,0-3.2c1-1.4,1.5-3.1,1.4-4.8
                                    c-0.1-1.3-0.8-2.9-0.5-4.1c0.1-0.3,0.2-0.7,0.4-1c0-1.5-1.1-1.7-1.5-2.6s0.5-1.9-0.1-2.9c-0.3-0.5-1.8-1.4-2.2-2.6
                                    c-0.7-1.5-0.2-3.3-1.1-5c-1.1-1.6-2.3-3.1-3.7-4.5c-0.8-0.5-1.5-1.1-2.1-1.8c-0.3-0.4-0.4-1-0.6-1.5c-0.8-1.4-2.3-2.6-2.9-4
                                    c-0.5-1.2-0.8-4.1-1.2-5.4c-0.2-0.9-0.9-1.6-1.7-1.9c-1-1.6-1.7-3.3-2.5-4.9c-0.3-0.4-0.5-0.9-0.7-1.3c-0.8-2.4-0.6-6.9-1.9-9
                                    c-0.2-0.3-0.5-0.5-0.7-0.7c-0.9-1-1.2-2.3-0.9-3.6c0-0.5,0.1-1,0.1-1.5c0-1.3-0.2-2.7-0.8-3.9c-0.2-0.5-0.1-1.2-0.2-1.7
                                    c-0.3-0.6-0.6-1.2-0.9-1.8c-0.5-1.1-1-2.2-1.3-3.4c-0.2-0.8-0.2-1.6-0.4-2.4s-0.9-1.6-1-2.4c0-0.4,0.1-0.8,0.2-1.2
                                    c0.3-1.5,0.3-3,0.1-4.5c-0.1-0.7-0.7-2.2-0.8-3.1c-0.3-1.9-0.4-3.9-0.1-5.8c0.5-3.2,2-6.1,2.2-9.5c0.1-0.9,0.2-1.7,0.1-2.6
                                    c-0.1-0.7-0.4-1.3-0.9-1.8c-0.2-0.6-0.6-1.2-1-1.7c-0.4-0.3-0.9-0.5-1.4-0.7c-1.1-0.8-1.9-2-2.1-3.3c0-2.3,0.3-4.6,0.7-6.8
                                    c0.2-0.7,0.4-1.4,0.6-2.2c0.1-1.3-0.3-2.6-0.2-3.9c0.3-1.2,0.4-2.4,0.5-3.6c-0.1-0.9-0.7-1-1-1.7c-0.1-0.6-0.2-1.3-0.2-1.9
                                    c-0.7-0.9-1.3-1.9-1.8-2.9c-0.2-1,0.5-1.3,0.5-2.2c0-0.6-0.2-1.2-0.2-1.8l-0.2-5.2c0.1-1.4,0.3-2.9,0.5-4.3c0-1.1,0-2.2-0.2-3.2
                                    c-0.1-0.7-0.4-1.4-0.5-2.2c-0.2-1.3-0.1-3-0.7-4.1c-0.6-0.3-1.1-0.8-1.4-1.3c-0.2-0.6,0-1.1-0.2-1.7c-0.3-1.4-1.4-1.3-1.5-3.3
                                    c-0.3-0.4-0.8-0.6-1-1.1l-0.1-0.6c0.1-0.5,0.4-0.9,0.6-1.4c0.7-1.6,0.9-5.1-1.8-4.9l-0.4-0.3c-0.2-0.8-0.3-1.5-0.4-2.3
                                    c0-1.2,0.3-2.5-0.1-3.7c-0.5-1.5-3-2.5-3.2-3.6c0-0.2,0-0.5,0-0.7c0-0.4-0.3-0.8-0.4-1.2v-0.4c0-2.3,1.7-1.4-0.9-4.1V149l0.3-0.4
                                    V148c-1.1-1.3,0.3-3.2,0.3-4.7c0-1.1-0.2-2-0.2-3.1c-0.2-0.2-0.2-0.8-0.5-1.1l-0.5-0.2c-1.1,0-1.5,1.4-2.4,1.6
                                    c-0.6,0.1-1-0.4-1.2-0.9c-0.4-1.5-0.6-3-0.6-4.5c0.1-0.6,0.4-1.2,0.4-1.7s-2.5-4.4-2.9-5.2c-0.5-1.1,0-3.4-0.8-4
                                    c-0.4,0.1-0.8,0.2-1.2,0.1l0.1-0.6c1.3-0.9,1.1-6,1.3-7.6c0.1-0.6,0.6-2.9,0.6-3.2c-0.1-0.6-0.2-1.1-0.5-1.6c-0.2-0.9,0.2-1.9-0.1-3
                                    c-0.6-0.7-1.6-1.1-2-2.1c-0.1-0.5-0.3-1.1-0.5-1.6c-0.4-0.7-0.8-1.5-1.1-2.2c-0.2-0.5-0.2-1.1-0.4-1.6c-0.2-0.4-0.5-0.8-0.9-1.1
                                    c-3.4,0.1-2.1-0.3-4-2c-0.1-0.4-0.2-0.8-0.2-1.2l0.3-0.3c0.5,0,1.1,0.1,1.6,0.3l0.5-0.1c0.7-1.5-0.3-2.5-1.1-3.6
                                    c-1.2-0.6-1.4,0.7-2.1,1c-1-0.1-1.5-1.3-2.3-1.7c-0.4-0.5-0.1-1.2-0.3-1.7s-0.8-0.8-0.9-1.2v-0.4c0-0.3,0-0.6,0-0.9
                                    s-0.2-0.8-0.2-1.2c0.3-0.5,0.4-1,0.3-1.6c-1.2-1.2-1.6-0.9-2.3-1.6s-0.7-1.1-1.1-1.6l-0.5-0.2c-0.6,0.1-1.6,0.5-2.1-0.1l-0.1-0.6
                                    c0.3-0.4,0.5-0.8,0.8-1.2v-0.5c-0.3,0.2-0.7,0.3-1,0.4c-0.3-0.2-0.5-0.4-0.7-0.6l-0.5-0.1c-1.1,0.5-0.6,1.9-1.3,2.8v0.6l0.4,0.3
                                    l-0.1,0.6c-0.5,0.4-1.3,0.5-1.7,1c0.1,0.5,0.3,1.1,0.4,1.6l-0.2,0.5l-1.6,2.9c-0.3,0.7-0.7,1.3-1.1,1.9c-0.6,0.9-2.8,1-3.9,1
                                    s-1.2,0.9-2.1,1.9s-1.6,1.2-1.6,1.9s-0.4,2.8-0.4,3.8s-0.9,2.1-2.5,3.8c-1.1,1-2.2,2-3.4,2.9c-1.1,1-1.2,3.4-0.4,3.9
                                    s0.8,2.2,0.1,3.2s-1,1-2,2s-1.8,1-2.8,1.8s-1,1.8-1.2,3.4s0.6,1.9,1.1,3c0.5,1.2,1.1,2.4,2,3.4c0.9,0.9,0.4,2.4-0.4,3.4
                                    c-0.8,1-1.4,2.1-1.9,3.2c-0.6,1.4-0.6,4.1-0.6,6s-1.5,2.4-3.2,2.5c-1.3,0.1-2.5,0.7-3.4,1.6c-0.6,1.1-1.1,2.3-1.4,3.5
                                    c0,0.5,0.1,3.9,0,5.8s0.1,1.9,1,2.8s0.5,2,0.2,3.4c-0.2,1.4,0.6,2.8,1.9,3.4c1.2,0.6,1,1.8,1.1,3.1s-0.2,1.5-1.5,2.1s-1,1.5-0.5,2.5
                                    c0.6,1.1,1.4,2.1,2.4,3c1.5,1.6,2.1,2.2,1.4,3.4s-0.9,7.1-1.4,8.2c-0.5,1.6-0.8,3.2-0.9,4.9c0,1-0.2,2.2-3,4s-1.1,3.8-1.1,5
                                    s-0.9,2.8-1.2,4.4s-1.6,1.9-2.9,1.8c-1.6,0.1-3.1,0.3-4.7,0.7c-1,0.1-1.9,0.4-2.8,1c-0.8,0.5-0.1,3.4-0.5,4s-1.1,1-1.1,1.9
                                    c0.2,1.3-0.1,2.6-0.9,3.8c-1,1.2-0.9,1.6-3.1,2.1s-1.1,1.4-1.1,2s-0.2,1.8-0.2,2.9s-1,1-1.5,1s-2.8,0.3-2.8,0.3
                                    c0.1,0.7,0.1,1.4,0,2.1c0,0.7,0.2,1.5,0.5,2.2c0.5,1.7,0.5,2.4,2.5,3c0.2,0.7,0.1,1.7,0.5,2.3c0.7,0.6,2.1,1,2.9,1.8
                                    c1.1,1.1,2.1,2.5,3.3,3.5s2.5,1.5,3.5,2.6c0.6,0.7,0.4,1.5,0.7,2.2c0.6,1.5,2.3,2.7,3.5,3.8c0.1,0.1,0.6,0.7,0.7,0.7
                                    c0.7,0.4,1.7,0.5,2.5,0.9c0.5,0.4,1,0.8,1.4,1.3c0.5,0.5,1.3,0.5,1.9,0.9c0.5,0.4,0.9,0.9,1.3,1.4c0.7,0.6,1.2,1.1,1.3,2.1
                                    c-0.3,1.2-1.9,1.8-2.8,2.7c-0.3,0.4-0.6,0.9-0.7,1.3c-0.2,0.3-0.3,0.6-0.4,1l0.1,0.4c0.1,0.3,0.1,0.2,0.2,0.4
                                    c0.5,0.5,1.3,0.6,1.8,1.2c0.6,0.8,0.9,1.9,1.5,2.6s1.4,0.9,1.7,1.7s0.6,1.6,1,2.4c0.2,0.4,0.6,0.8,0.8,1.2c0.4,0.8,0.6,1.6,0.9,2.5
                                    s1.1,2.8,0.8,3.6c-0.2,0.5-0.4,0.9-0.5,1.4c0.2,0.5,0.5,0.9,0.7,1.4c0.4,1,1.6,5.3,2.2,5.9c0.9,1,2.6,1,3.6,1.9
                                    c0.3,0.3,0.6,0.5,0.8,0.9c0.6,0.9,1.1,1.9,1.7,2.8c2.2,2.9,2.4,2.5,3.5,6c0.2,0.4,0.3,0.9,0.2,1.4h0.5c0.3,0.6,0.7,1.1,1.1,1.6
                                    c0.6,0.2,1.2,0.5,1.8,0.9s2.4,2.6,3.2,3.4c0.3,0.3,0.5,0.6,0.7,0.9c-0.1,1.1,0.3,2.2,0.9,3.1c0.5,0.5,1,0.9,1.5,1.5
                                    c0.8,1.1,0.7,1.8,2.1,2.2c0.3,0,0.5,0,0.8,0c2.7-1.2,5.4-2.2,8.2-3.4c0.8,1.5,1.8,3,2.9,4.4c1.1,1.2,1.9,4.6,1.6,6.2
                                    s-0.9,5.6-0.1,6.5s2.9,1,3.9,3s3.1,5.5,4,5s2.6-2.2,3.5-2.6s4.3-0.8,4.8,0.8c0.8,2.3,1.4,2.6,0.9,4.4c-0.3,1.1-1.8,3.4-1.8,4.5
                                    c0,4.4,3.9,5.2,3.5,8.1c-0.3,1.2-0.7,2.4-1.3,3.5c-0.6,1.2-1,2.5-1,3.8c0,0.6,0.2,1.3,0.2,1.9c-0.1,0.8-0.3,1.5-0.5,2.2
                                    c-0.4,1.5-1,3.2-0.2,4.6c0.3,0.6,0.8,1.1,1,1.7c0.7,1.8,1.3,3.7,1.7,5.6c0.1,1.8,0.3,3.6,0.8,5.3c0.4,1.1,1.9,1.8,2.1,2.7
                                    c0.1,1.1,0.2,2.1,0.3,3.2c0,0.1,0.2,0.4,0.2,0.5l0.8,3.3c0.3,1.2,0.7,2.4,1.2,3.5c0.1,0.3,0.4,0.6,0.5,0.9c0.4,1.2,0.5,1.4,0.8,2.7
                                    l1.6,0.8l0.1,1.2C655.2,396.3,655.5,396.6,655.8,396.9L655.8,396.9z" />
                                <path class="st0 fill-white" id="ANDROY" d="M123.7,1317.4l0.3-0.4c0.6-1-0.1-2.1,1.6-4.6c1-1.5,0.1-2.5,2.9-3.2c1.1-0.3,1.2-0.1,1.8-1l0.4-0.6
                                    c1.3-1.9,2.1-1.1,3.6-3.5c1.1-1.7,3.7-2.2,5.2-4.1s2.5-4.2,5-4.6c0.3,0,0.7-0.1,0.9-0.3l0.2-0.3c0.3-0.5,0.7-1,1.2-1.3l0.5-0.3
                                    c0.7-0.4,0.8-0.8,1.2-1.5c1.1-1.3,2.3-2.4,3.6-3.5c2-1.2,4.4-1,6.3-2.2l0.6-0.4c1.4-0.8,1.7-0.5,3.1-0.6c0.6-0.6,0.9-3.3,2.5-5.1
                                    s3.8-4.6,3.9-6.9c0.1-2.2,3.2-2,4.6-1.8c0.6-2.1,1-1.4,2.3-2.7v-0.4c-0.1-1.7,0.3-1.7,1.2-2.9c0.2-1-0.4-1.6,0.2-3.3l0.3-0.8
                                    c0.4-1,0.4-1.2-0.2-1.9l-0.3-0.3c-1.4-1.9-0.1-6.4,2.2-6.3c0.9,0,1.7-0.3,2.3-1l0.3-1.9c0,0,0.1-1.8-0.5-2s-1.1-2.5-1.1-2.5
                                    s-1-5-1.5-6.8c-0.5-1.7-0.7-3.4-0.8-5.1c-0.1-2.1-0.5-4.5,0.4-5.6s3.6-5.6,4.1-6.5s2.9-3.6,3.5-4.6s0.9-0.1,0.9-2.4
                                    s0.6-15.6,1.1-16.6s-0.9-0.9,1.4-1.8s2-2.5,0.9-2.9s-2.9-2.2-0.2-3.5s2.2-2.8,1.6-3.6s-1.8-2.9-2.1-3.4s-0.5-1.2,1.5-2
                                    c2.4-0.9,4.7-1.9,7-3c1.7-0.9,3.7-1.3,5.6-1.1c1.4,0.1,5.4-0.4,6.8-0.4s1.5-2.2,1.5-2.2s2.2,0.8,2.6,2.5s0.2,2.6,1.9,3.6
                                    c1.3,0.8,2.1,2.3,2.1,3.9c0,1.1-0.1,3.8-1.5,4.1s-1.5,2.1-0.5,3.1c0.8,0.8,1.1,1.9,1,3c-0.1,0.6,1.4,2.6,2.2,3
                                    c1.5,0.4,3.1,0.2,4.4-0.6c1-0.9,0.5-2.6,2.8-1.2s1.4,1.1,3.8-0.2s1-1.4,4.1-3s2.8-1,2.6,1.1s1.1,2.5,2.1,1.8s4-0.8,4.9-0.8
                                    s0.9,0.6,1.9,2.5s0.9,2.1,2,2.8s0.9,0.9,2.1,0.6s2.1,0.9,2.4,2.1c0.3,1.9,0.3,3.9,0.1,5.9c-0.2,1.1-3.9,8-4,8.6s-1.5,3.1,1,2.9
                                    c1.3-0.2,2.7-0.1,4,0.2c0.3,1.1,0.4,2.2,0.5,3.2c-0.1,0.5,1.2,4.8,1.8,5.9c0.4,1.1,1.4,1.8,2.5,1.9c1.1,0,3.8,1.6,3.8,3.1
                                    s0.8,5.8,1.8,6.5s0.4,3.2-0.9,3.2s-2.5,0.8-3.2-0.1s-2.8-1-2.5,0.5s0.8,3.8,1.4,4.5s2.1,5,2.6,6s1.2,4,0.2,4.1s-3.1,0-3.2,0.5
                                    s1.4,3.2,2.2,3.8s2.6,1.4,2.6,1.4c0.3,1.1,0.4,2.2,0.2,3.4c-0.4,1.4-0.9,2.7-1.6,4c-0.8,0.3-1.6,0.6-2.4,0.8c-0.8,0.1,0.1,2,0.9,2.8
                                    c0.9,1.1,1.6,2.5,2,3.9c0.2,1.1,0.8,2.9,2.6,3.2s2.4-0.1,2.6,1.1c0.2,0.9,0.3,1.8,0.2,2.8c-0.2,1.4,0.2,2.9,1.1,4
                                    c1.5,1.8,3.6,1.6,4.8,1.6s3.9,1.8,4.4,2.5s0.8,3,2,3.9c2.8,1.7,5.6,3.3,8.6,4.6c1.8,0.6,1.9,2.1,2,3.6c0.2,0.9-0.1,1.8-0.6,2.5
                                    c-0.4,1-0.6,2-0.8,3l-0.3,3.5c-1.8,0.7-3.7,1.5-5.5,2.1c-1.2,0.4-2.4,0.8-3.6,1.3c-3.4,1.6-6.7,3.1-10,4.7
                                    c-3.5,1.8-7.6,2.4-11.1,4.2c-1.4,0.7-2.7,1.4-4,2.3c-0.5,0.4-1,0.8-1.6,1.2c-1,0.6-2.1,1.1-3.2,1.7c-1.4,0.8-2.7,1.6-4.1,2.4
                                    c-1.1,0.7-2.1,1.5-3.2,2.2c-1.8,1.1-3.6,2-5.3,3.2c-0.2,0.2-0.5,0.5-0.7,0.8c-0.4,0.5-1,0.8-1.5,1.3c-1.4,1.6-2.5,3-4.4,4
                                    c-0.3,0.1-0.6,0.4-0.9,0.5c-1.8,0.7-3.9,1.3-5.8,1.9c-0.7,0.2-1.4,0.5-2,0.9c-1.4,0.5-2.8,1-4.3,1.3c-2.7,0.2-5.4,0-8.1,0.1
                                    c-1.3,0.1-2.6,0.2-3.9,0.4c-0.6,0.1-1.2,0.2-1.8,0.3c-1.8-0.1-3.6,0-5.5,0.1c-1.2,0.2-2.4,0.3-3.6,0.6c-1.6,0.4-7.3,2.1-8.6,1.9
                                    c-0.4-0.1-0.7-0.5-1-0.7c-3-2.1,0-4.4-1.7-6.2c-2.3-1.4-4.7-2.7-7.1-3.7c-1.9-0.7-3.9-1.3-5.7-2.1c-0.5-0.2-0.9-0.5-1.4-0.8
                                    c-3.4-1.6-5.1-7.7-9.2-10c-2-1.1-4.4-1.3-6.5-2.1s-4.2-1.6-6.3-2.3c-1.1-0.4-2.3-0.5-3.5-0.8c-1.6-0.5-3.4-1.1-5.1-1.4
                                    c-1.1-0.2-2.1-0.3-3.2-0.5c-1.5-0.3-2.9-0.5-4.4-0.7c-1.3-0.1-2.6-0.2-3.9-0.2c-1,0.1-2-0.3-2.7-1
                                    C123.1,1321,122.8,1319,123.7,1317.4L123.7,1317.4z" />
                                <path class="st0 fill-white" id="SOFIA" d="M596.4,287.1c-1-0.9-2.7-0.9-3.6-1.9c-0.6-0.6-1.8-4.9-2.2-5.9c-0.2-0.5-0.5-0.9-0.7-1.4
                                    c0.1-0.5,0.3-1,0.5-1.4c0.3-0.8-0.5-2.8-0.8-3.6s-0.6-1.7-0.9-2.5c-0.2-0.4-0.6-0.8-0.8-1.2c-0.4-0.8-0.7-1.6-1-2.4
                                    s-1.2-1.1-1.7-1.7s-1-1.8-1.5-2.6c-0.4-0.6-1.3-0.7-1.8-1.2c-0.2-0.2-0.2-0.1-0.3-0.4l-0.1-0.4c0.1-0.4,0.2-0.7,0.3-1
                                    c0.2-0.5,0.4-0.9,0.8-1.3c0.8-0.8,2.5-1.4,2.8-2.7c0-1-0.6-1.5-1.3-2.1c-0.4-0.5-0.9-1-1.3-1.4c-0.5-0.4-1.4-0.4-1.9-0.9
                                    c-0.4-0.5-0.9-0.9-1.4-1.3c-0.8-0.4-1.8-0.5-2.5-0.9c-0.1,0-0.5-0.6-0.7-0.7c-1.2-1-2.9-2.2-3.5-3.8c-0.3-0.8-0.1-1.5-0.7-2.2
                                    c-1-1.1-2.4-1.6-3.5-2.6s-2.1-2.4-3.3-3.5c-0.9-0.8-2.3-1.2-2.9-1.8c-0.3-0.5-0.2-1.6-0.4-2.3c-1.9-0.5-2-1.2-2.5-3
                                    c-0.3-0.7-0.5-1.4-0.5-2.2c0.1-0.7,0.1-1.4,0-2.1c-0.2-0.6-0.7-1-1.2-1.2c-0.5,0.1-1,0.3-1.3,0.7c-0.4,0-2.8-1.7-3.4-2
                                    c-2.7-1.4-2.4-1.4-5.6-1.8c-0.8-0.1-1.3-1.7-2.4-1.7c-0.7,0-1.2,0.7-1.8,0.9c-0.3,0.1-0.8,0-1.2,0.1c-1.6,0.5-2.7,3.7-4,4.9
                                    c-0.8,0.3-1.6,0.6-2.4,0.9c-1.1,0.7-2.1,1.5-3.1,2.3c-0.3,0.4-0.4,0.9-0.8,1.3c-0.3,0.2-0.7,0.2-1,0.2c-0.5-0.7-0.6-1.5-0.4-2.3
                                    c-0.2-0.5-0.7-0.7-0.9-1.1c-0.7-1.4-0.7-3.5-2.8-3.2c-0.5,0.2-0.6,0.7-1,1c-0.7,0.5-1.5,0-2.3,0.1c-1.2,0.1-2.2,1.3-3.7,1
                                    c-1.5,0.9-3.3,1.1-4.9,0.7c-1.4-0.3-2.8-0.9-4-1.8c-1-0.8-5-0.5-6-0.5s-4.1,0.5-5.4-0.9s-5.2-0.8-7.4-1.6s-3.2-3.7-3.2-3.7
                                    c-1.6-0.6-3-1.5-4.2-2.6c-0.2-0.4-0.5-0.8-0.8-1.2c-0.8-0.5-1.7-1.1-2.5-1.5c-0.5-0.2-1-0.3-1.5-0.6c-0.8-0.5-1.5-1.2-2-2.1
                                    c-0.5-0.8-2.1-3.5-2.8-3.9l-0.5,0.1c-0.9,0.8-1.2,1.9-2.4,2.3c-0.3,0.1-0.7,0-1-0.1c-1.8-0.9-1.3-4.4-0.8-6c0.4-1.3,2.1-1.7,2.9-2.6
                                    c0.5-0.6,0.9-1.4,1.3-2.1c0.3-0.4,0.6-0.8,1-1.1c0.9-1,1.6-2.2,1.9-3.6l-0.5-0.9l-0.6-0.1c-2.7,1.1-3.1,2.3-5,3.2
                                    c-0.9,0.4-1.9,0.8-2.8,1.2c-1.3,0.7-2.5,1.6-3.5,2.6c-1.3,0.7-2.7,1.4-4.1,1.9c-0.3,0.2-0.5,0.4-0.7,0.6c-0.6,1.1,1.6,2.5,0.1,4.3
                                    c-0.3,0.4-0.6,0.6-1.1,0.7c-0.3,0.1-3,0.5-3,1.1l0.3,0.3l1.1,0.2l0.4,0.9l-1,0.5l-0.6,2.2c0.7,0.5,0.6,2.3,1.1,3.4
                                    c0.2,0.3,0.4,0.6,0.4,1c-0.1,0.7-0.3,1.5-0.5,2.2c0,0.8,0,1.6,0.1,2.4c0,0.3,0,0.6,0,0.8c-0.2,0.8-1.5,1.5-2,2.1s-0.8,1.5-1.4,2
                                    c-0.3,0.9,0.1,1.4,0.4,2.1s0.1,1.5,0.6,2.1s1.3,0.9,1.1,2.1l-0.2,0.2c-0.3,0.3-0.7,0.3-1,0.5s-0.4,0.5-0.6,0.8s-0.9,0.4-1.3,0.7
                                    c-0.6,1,0.3,2.2,0.2,3.3c-0.8,0.5-1.8,0.5-2.5-0.1c-0.3-0.5-0.4-1-0.5-1.5c0-0.4,0.1-0.7,0.3-1.1c0.2-0.6-0.1-1.1,0.1-1.7
                                    c0.3-1.1,0.4-2.3,0.6-3.4c0.3-1.5,0.8-3,1.1-4.4c0.1-0.8,0.3-1.5,0.5-2.3c0.3-0.7,1.3-1.2,1.7-2.1c0.1-0.6-0.1-1.2-0.5-1.6l-0.5-0.1
                                    c-0.3-0.2-0.4-0.5-0.5-0.9c-0.4-0.2-0.8-0.5-1.2-0.8c-0.6,0-1.2-0.1-1.7-0.3c-0.7-0.4-1.1-1.2-1.7-1.7c-0.4-0.2-0.8-0.4-1.3-0.6
                                    c-1-0.4-2.5-1.3-3.4,0.2l0.3,0.4l0.5,0.2l0.9-0.2l0.2,0.3c-0.2,0.6-0.2,1.2-0.1,1.8c0.4,0.3,0.9,0.6,1.4,0.6
                                    c0.2,0.2,0.5,0.4,0.7,0.6c0.5,0.6,0.1,1.5,0.5,2.1c0.2,0.4,0.7,0.6,1,1.1c0.2,1.6-0.5,3-0.9,4.5c-0.1,0.6-0.1,1.2-0.3,1.8
                                    c-0.3,0.8-0.7,1.6-1.2,2.2c-0.3,0.1-0.7,0.1-1.1,0c-0.4-0.3-0.5-0.9-0.8-1.2l-0.4-0.2c-0.7,0.2-1.3,1.1-1.9,1.5
                                    c-1.8,0.1-5.2-1.1-6.3-2.6c-0.3-0.6-0.7-1.1-1.1-1.6l-0.6-0.1l-0.3,1.1l-0.4,0.4c-0.4-0.1-0.7-0.1-1.1-0.1c-1.4,0.9-0.6,3-0.6,4.4
                                    c0,0.8-0.1,1.6-0.4,2.4c-0.3,0.8-0.9,0.8-1.5,1.2c-0.9,0.8-1.6,1.9-2.6,2.6c-0.2,0.1-0.3,0.2-0.5,0.4c-0.4,0.5-0.6,1.2-1.1,1.6
                                    c-0.2,0.9,0.1,1.6,0,2.4s-0.8,1.1-1,1.8c-0.1,0.2,0,0.4-0.1,0.6c-0.2,0.9-0.7,1-0.4,2.1c0.1,0.3,0.3,0.7,0.4,1
                                    c0.1,0.6-0.2,1.1-0.1,1.7c0.2,0.7,0.9,1,1,1.7c-0.2,0.3-0.2,0.7-0.1,1.1c0.7,0.3,1.1,1.6,1.1,2.3c0.7,0.5,1.2,1.2,1.4,2
                                    c-0.4,1.4-1.9,2.4-2,3.5c0.3,0.8,1.5,0.9,1.9,1.8s0.4,3,1.2,3.3c0.6-0.1,1-0.8,1.4-1.2s1.2-0.6,1.6-1.1c0.9-0.9,0.9-2.4,1.4-3.4
                                    l0.4-0.2c0.4,0,0.7,0.2,1,0.4c0.3,1.1,1.3,3.8,2.3,4.5c0.6,0.3,1.3,0.5,2,0.5c0.6,0.1,1.4,0.3,1.8-0.2c0.3-0.4,0.5-0.9,0.7-1.4
                                    c0.7-1.2,2.8-1.5,4-1.4c1.2,0.2,1.5,1,2.4,1.7c0.4,0.3,0.8,0.5,1.2,0.8c0.4,0.5,0.7,1.1,1.2,1.5c0.9,0.8,2,0.6,2.8,1.3
                                    c1.8,1.6,0.7,3.7,0.8,5.8c0.1,0.9,0.7,1.7,0.7,2.7c0,0.7,0,1.3-0.1,2c-0.2,1-1.5,4.1-2.7,4l-0.3-0.4c-0.5-1.6,1-5.6,0.9-7.8
                                    c0-1-0.2-1.9-0.5-2.9c-0.2-0.4-0.7-0.7-0.8-1.2c0-0.2,0.1-0.5,0-0.7c-0.1-0.9-0.8-1.6-1.6-1.8c-1,0.2-1.9,0.4-2.9,0.4
                                    c-0.8,0.3-1.5,0.7-2.2,1.2l-0.1,0.5c0.4-0.1,0.8,0,1.2,0.1c0.2,0.3,0.2,0.7,0.1,1.1c0.3,0.2,0.6,0.3,0.8,0.5l0.1,0.6
                                    c-1.1,1.2,0.3,3.6-1,4.3l-0.6,0.1l-0.4-0.3c-0.4-1.3,0-1.5,0.5-2.6c0-0.5-0.2-1.1-0.5-1.5c-0.3-0.2-0.6-0.4-0.9-0.4
                                    c-1.8-0.6-3.4-1.6-5.1-2.3c-0.8-1.3-1.2-0.8-1.9-1.5c-0.4-0.4-0.4-1-0.6-1.4c-0.2-0.2-0.4-0.5-0.6-0.7c-0.6-1-1-2.1-1.6-3.1
                                    l-0.4,0.1c-0.1,1.1-0.5,2.1-1.2,2.9c-1.8,0.1-3,2.4-3.6,3.9c-0.4,1-0.3,2.2-1.1,3s-2,0.6-3,1s-0.8,1.4-1.4,2c-0.1,0.8,0.4,1.3,0,2.2
                                    c-0.3,0.8-1.1,1.2-1.6,1.8c-1,1.1-3.1,3.6-3.1,5.1c0.2,0.4,0.5,0.8,0.8,1.2c0,0.4-0.1,0.7-0.3,1c-0.5,0.1-1,0.4-1.4,0.6
                                    c-0.5,0.5-0.4,1.6-0.7,2.3c-0.4,0.8-1,1.6-1.5,2.4s-0.6,1.7-1,2.4c-0.2,0.6-0.8,1.1-1.1,1.6c-0.5,0.8-0.9,1.9-1.3,2.8
                                    c-0.5,1.2,0.3,1.6,0.3,2.6c0.1,1.2-1.1,1.9-1.3,2.8h-0.3c-0.2-0.4-0.4-0.9-0.7-1.2h-0.5c-0.9,0.5-1,1.2-1.6,1.8
                                    c-0.8,0.9-2.2,1.9-2.3,3.1c-0.1,0.7,0.2,1.3,0.1,1.9s-0.7,0.8-0.8,1.4s0,0.9-0.1,1.3c-0.7,0.9-1.8,0.8-2.7,1.4c-0.5,0.4-1,1-1.6,1.4
                                    c-0.6,0.5-1.4,0.7-2.2,0.6c-0.5-0.1-0.6-0.4-0.9-0.7c-1.1-1.7-0.1-4.6,0.4-6.3c0.1-0.6,0.2-1.2,0.1-1.8c0-0.7,0-1.3-0.1-2
                                    c-0.2-0.8-0.9-1.6-0.8-2.5c0.2-1,0.8-1.4,1.3-2.2c0.7-1.3,0.6-2.2,1.7-3.8c0.8-1.2,2.2-2,3-3.1c0.5-0.6,0.9-1.4,1.4-2
                                    c0.2-0.3,0.5-0.5,0.6-0.7c0.6-0.8,0.4-1.8,0.8-2.7c0.3-0.6,1-0.9,1.2-1.5c-0.2-1.1-1.3-1-2.1-1.3c0.1-0.4,0.2-0.7,0.3-1.1
                                    c-0.1-0.8-0.9-1.8-0.9-2.5c0-0.5,0.4-1,0.5-1.6c0.2-1.2,0-2.3,0.9-3.3c0.1-1.7-1.8-1.2-2.5-2.2s-0.4-2.7-0.9-3.2l-0.6-0.1
                                    c-1.1,0.9-2.2,2-3,3.1c-0.2,0.2-0.5,0.4-0.7,0.6c-1.1,0.9-2.2,1.9-3.1,3c-0.7,0.9-1.3,1.9-2.1,2.8c-1,1-2.3,1.9-3.2,2.9
                                    c-0.8,1.1-1.5,2.3-2.1,3.5c-0.8,0.9-1.5,1.9-2.2,2.9c0,0.1,0.1,0.5,0.2,0.6l0.5,0.2c0.2,0.3,0.3,0.7,0.3,1l0.3,0.4
                                    c1.3,0.2,0.9-0.6,2.8,0.4h0.6c0.7-0.7,0.1-2.1,0.8-2.7c0.2-0.2,0.6-0.3,0.8-0.5c0.4,0,0.7,0,1,0.2c0.1,0.1,1.4,1.8,1.5,2.1l0.2,0.3
                                    c0,0.2,0.1,0.3,0.1,0.5c-0.3,0.6-1.4,1-1.9,1.5v0.4l0.3,0.4c-0.5,1.3-2.1,0-3,0.5c-0.2,0.3-0.4,0.5-0.8,0.6l-0.5-0.2
                                    c-0.4,0-0.8,0.2-1.1,0.5c-1.3,2.3-2.4,1.6-3.3,2.5s-1,2.5-2.1,3.3c-0.9,0.7-1.7,0.5-2.6,1.5c-0.2,1.1,0.2,3.4-0.4,4.2
                                    c-0.6,0.6-1.2,1.1-1.8,1.6c-0.7,0.7-1.3,1.5-1.9,2.2c-1.2,1.3-2.6,2.4-4.1,3.3c-0.7,0.5-1.2,0-2.1,0.6c-1.1,0.8-1.4,1.8-2,2.8
                                    c-0.2,0.2-0.5,0.4-0.7,0.6c-0.4,0.5-0.7,1.1-1,1.7c-0.3,0.5-0.8,1.1-1.2,1.6c-0.1,0.1-0.2,0.2-0.3,0.4c-0.1,0.4-0.2,0.8-0.2,1.2
                                    c0,0.9,0.2,1.8,0.2,2.7v0.5l0.2,0.5c0.5,0.6,1.6,0.5,2,1.4c0.2,0.6-0.1,1.2-0.1,1.8l0.4,0.3c0.8,0,2.2-0.7,2.8,0.1
                                    c0.1,1.4-0.5,1.4-0.6,2.1c0,0.2-0.2,1.7-0.2,1.9c1.1,0.9,3.8-1.1,5.1-1c1.7,1.3,0.1,3.8,0.4,5.5c0.2,1.1,1.2,1.4,1.7,2.2
                                    c0.2,0.4,0.1,0.9,0.3,1.3c0.4,1.1,1.8,3,3,3.1c0.6,0.1,1.2-0.2,1.8-0.2l0.3,0.4c0,0.4-0.2,0.6-0.4,0.9c-0.4,0.9-0.2,1.6-1.1,2.3
                                    c-0.8,0-1.6,0.1-2.4,0.2c-0.7,0.2-1,1-1.8,1c-0.3-0.2-0.6-0.4-0.9-0.6c-4.2,3.4-2,6.2-3,7.5l-0.1,0.2l-0.2,0.2
                                    c-0.9,1.3-1.2,2.9-0.7,4.4c-2.9,1.9-1.1,2-1.6,3.9c-1.2,1.5-1.4,2.7,0.5,3.6l0.7,0.3c0.2,0.1,0.4,0.2,0.6,0.4
                                    c0.2,0.9,0.6,1.7,1.1,2.4c0,0.1,0,0.3,0,0.5c0.1,3.1,1.3,2.6,1.9,4l0.1,0.2c0,0.2-0.1,0.3-0.1,0.5c-0.6,0.2-1.3,0.4-1.9,0.4
                                    c-2.7,0.4-3.6,3.2-1.2,5c0.8,0.9,1,2.2,2.3,2.7c-0.6,3.5,2.8,3.4,3.5,4.2l0.1,0.2c0,0.1,0.1,0.3,0.1,0.4c0.2,1.4,1,2,1.2,3v0.4
                                    c0,0.8,0.3,1.5,0.7,2.1l0.2,0.3c0.1,0.5-0.1,1.7,0,2.4c0.1,0.4,1,3,0.9,3.2c-0.4-0.2-1.1-1.5-2.2-2l-0.4-0.1c-2.8-0.3-3.7,3-1.8,5
                                    l0.4,0.4l0.4,0.4c0.2,1.3,0.2,2.8,2,2.8c0,0.4,0,0.9,0,1.4c-0.1,3.2,1,3.6,2.7,3.8c-0.4,0.8-0.4,1.9,0.2,2.6
                                    c-0.1,0.4-0.2,0.9-0.2,1.4v0.4c0.2,0.8,1,1.9,2,1.8c0.5,0,0.9-0.2,1.3-0.5c0.2,0.7,0.6,1.3,1.3,1.6c-0.1,0.4-0.3,0.9-0.5,1.2
                                    c-1.4,1.7,1.6,10.7,6.6,6.1c0.4,0.2,0.8,0.3,1.2,0.6v0.3c0.1,0.5,0.4,1,0.4,1.6c-0.1,0.1-0.1,0.2-0.2,0.2l-0.3,0.4
                                    c-1.5,1.3-1.8,3.5-0.8,5.2c0.8,1.4,0.3,0.8,0.6,2.2c0.3,1.2,3.8,5.1,4.7,6.4l0.3,0.4l0.1,0.2c1.2,0.3,2.4,0.6,3.7,0.8
                                    c1.2,0.1,2.2-1,3.8,0.6s2.4,1.4,3.1,1.2c1.1-0.1,2.2-0.4,3.1-1c1-0.8,6.8-0.5,8.9-0.4s2.6,1.2,3.8,1.4s1.6,2.1,0.6,2.6
                                    s-0.6,1.4-0.5,3.2s1.6,1.9,2.4,2s0.6,0.4,2.2,1.6s4,2.6,5.4,1.9c1.4-0.8,3.2-0.4,4.2,0.9c1,1.4,1.2,1.4,2.6,1.2s5.2,0,5.2,0
                                    c-0.1-0.5-0.1-1,0-1.5c-0.6-1.2-0.9-2.5-0.9-3.9c0.4-3.1,0.2-4,1.7-6.6c-0.4-2.3,0.5-2.2,0.5-3.4c0.1-1.5,0-3.1-0.1-4.6
                                    c-0.3-2-1.1-2.2-0.8-4.5c0.1-0.3,0.2-0.7,0.4-1c0.2-0.6,0.6-1.2,1-1.8c0.7-0.9,3-1.9,3.2-3c0.1-0.6-0.6-1.2-0.6-1.9
                                    c0.1-0.3,0.3-0.6,0.5-0.8c0.9-0.2,1.1,0.5,1.8,0.9c1.3,0.2,1.4-0.8,2.5-0.9s2,0.8,3,0.9c0.9,0.1,1.7-0.3,2.4-0.2
                                    c1.7,1.5,2,1,3.8,1.2c0.5,0.1,1,0.1,1.5,0.1c0.6-0.2,1.2-0.6,1.8-0.9c0.6-0.1,1.2-0.2,1.8-0.2c0.7-0.2,1.5-1.1,2.2-1.2
                                    s1.2-0.1,1.8-0.2c0.9-0.2,1.8-0.5,2.7-0.7c1.6-0.2,1.9,1.1,3.9,0c2.1,0.1,3.5,3.5,4.2,4c1,0.6,1.3,0.3,1.9,1.5
                                    c1.4,0.8,3,0.4,3.6,1.2c0.5,1-0.4,2.6,0.6,3.5h0.5c0.7-1.1,1.8-0.2,2.7-0.4c0.8-0.1,2.5-0.9,3.2-0.3l1.9,1.5c0.9,0.8,1.8,3,2.5,3.6
                                    c0.8,0.6,1.7,1.1,2.6,1.5c0.5,0.2,1.1,0.2,1.6,0.4c1.7,0.7,5.2,2.2,5,4.6l0.3,0.4c0.6,0.3,1.2,0.6,1.8,1l0.2,0.5
                                    c-0.1,0.2-0.1,0.5,0,0.8c0.1,1.6,0.5,1.1,1.1,2.4c0.3,0.6,0,1.3,0.1,1.9c0,0.2,0.3,1,0.3,1.1c0,0.4-0.3,0.8-0.3,1.3v0.4
                                    c0.4,0.9,1.1,1.7,1.9,2.2c1.5,3.3-3.7,5.2-2.4,10.9c0.2,0.9,6.1,1.8,6.6,2.6c0,0,8-0.8,8.9-1.4s3.4-2.4,4.5-2.3c0.2,0,1,0.2,1.2,0.2
                                    c0.7-0.1,1.4-0.7,2.2-0.4c0.9,0.5,1.9,0.9,3,1.1c1.1-0.1,2.1-0.3,3.2-0.6c1.3-0.3,2.5-0.6,3-0.7l0.4-0.3l0.2-0.5
                                    c-0.1-1.3-1.9-2-2.1-4c0.1-0.9,0.5-1.7,1.2-2.2c0.3-0.2,0.6-0.2,0.9-0.5c0.7-0.7,1.3-1.5,1.7-2.5c0.3-0.9-0.2-2.1,0.5-2.8l2.1-2
                                    c0.5-1.4-0.8-4.2,0.5-5.2c0.7-0.5,1.9-0.1,2.8-0.5s1.4-0.9,2.1-1.3s3.1-1,3.6-1.8c0.2-0.3,0.2-0.7,0.4-1c0.5-0.7,0.9-1.4,1.2-2.2
                                    c0.2-0.9,0.3-1.7,0.3-2.6c0.3-1,0.8-2,1.4-2.9c0.1-0.1,0.1-0.4,0.1-0.5c0.6-1,1.4-1.8,2.3-2.5c0.6-0.6,0.3-1.5,0.4-2.3
                                    c0.7-1.1,1.4-2.2,2.3-3.2c0.6-0.9-0.3-2.9-0.8-3.6c-0.1-1.1,0.6-2.4-0.1-3.4c0,0,0.9-2.6,0.2-3.9s-2-4.5,0.5-5.2s4.5-3,2.2-3.8
                                    s-3-1.2-3.5-3s-1.5-3.4-3-4.5c-1.8-1.5-4.5-2-4.5-4l-1.3-4.2c-0.3-1.5-0.6-3-1-4.5c-0.1-0.8-0.2-1.6-0.3-2.4
                                    c-0.4-1.9-1.2-3.7-2.3-5.2c-0.4-0.5-0.8-1-1.2-1.5c-0.1-0.6-0.2-1.2-0.2-1.8c0.1-1,0.3-1.9,0.6-2.9c0.3-0.8,0.6-1.7,0.8-2.6
                                    c0.3-2.7,0.6-5.4,0.9-8.1c0.3-1.6,0.6-3.2,0.7-4.8c0-1.4-1.4-2.1-1-3.8s1.4-1.8,2.5-2.6c1.1-0.9,1.7-2.3,1.7-3.7l-0.3-0.4
                                    c-0.6,0.2-1.3,0.8-1.9,0.7c-0.6-0.3-1.1-0.7-1.5-1.2l-0.6-0.1c-1.1,1-3,0.4-4-0.3c-1.2-1.5-0.8-2.1-1-3.8c0-0.4-0.8-1.3-1-1.7
                                    c-0.2-1-0.1-2.1,0.3-3c1.1-1,2.5-0.7,3.8-0.9c0.8-0.1,2-0.8,2.8-0.6c0.5,0.2,1.1,0.3,1.6,0.3c1.2-0.3,2.2-0.8,3.2-1.5
                                    c0.2-0.1,0.3-0.1,0.5-0.2c1-0.2,2-0.5,3-1c1.8-1.2,0.6-2.4,4-3.5c1.8-0.6,3.2,0.8,5.3,0c0.2-0.4,0.4-0.9,0.5-1.4
                                    c0.7-0.6,1.5-0.9,2.4-1c0.8-0.9,0.5-1.7,2.2-1.9c1.3-0.2,3.4,2.1,4.3-0.1c0.6-1.4,1.3-2.9,0.7-4.4c-0.2-0.6-0.9-1-1.1-1.6
                                    c0.1-0.8,0.1-1.7,0-2.5c0.3-0.4,0.9-0.7,1.4-0.6c0.4,0,0.8,0.5,1.2,0.6c1.9,0.7,3.8,0.9,5.5-0.5c0.6-1.6,0.7-3.2,0.5-4.9
                                    c-0.1-0.7-0.7-1.1-0.7-2.1c0-2.5,2.5-2.8,0.9-7.4c-0.3-0.9-0.7-3.5,0.3-4.1c0.5-1.1,0.7-2.4,0.5-3.6c-0.4-1.8-1.9-3.2-0.9-4
                                    s3.6-2.4,3.6-2.4l2.9-1.8C596.9,287.7,596.6,287.4,596.4,287.1L596.4,287.1z" />
                                <path class="st0 fill-white" id="ANALANJIROFO"
                                    d="M540.1,475.9c-1.8,1.2-1,2-1,4s-0.2,2.2-2.2,3.2s-0.8,1.8-2.8,6s-1,1.8,0.2,4s1,2,0.5,3.8
                                    c-0.3,1.6-0.4,3.3-0.2,5c0,1.5-0.2,3-1.8,3.8s-1.5,3.5-1.5,3.5s-0.5,4.5-0.2,5.7s1.2,2.8,1.4,3.5s-0.5,11.9-0.6,12.7
                                    s-0.9,1.9-0.9,2.8s-0.5,8.3-0.5,8.3s2.2-0.7,2.8-0.9c0.6-0.3,1.2-0.6,1.7-1c0,0,0.6,2.7,0.8,3.8s-0.3,1.9-1.9,2.2s-1.1,3.3-0.3,4.4
                                    s0.2,1.4-1.4,2s-1.4,0.9-1.1,2s1.4,1.6,1.4,3s-1.9,1.3-4,1.7s-2.2,1.4-2.3,3.1s-1.5,2-3.6,2.2s-1.5,3-1.1,4.5s0.5,0.9,2,1.1
                                    s4.2-0.3,5-1.4s3.1,0,4.3,0.2s1.1,0.5,1.2,1.6c0.1,1.2,0.4,2.4,0.9,3.5c0.6,1.1,0.5,1.4,0.2,2.5c-0.4,0.9-0.4,2,0,2.9
                                    c0,0,3.3-1.2,4.3-0.7s1,0.9,2.2,1.5c0.8,0.4,1.6,0.6,2.5,0.5c1.3,0.1,2.5-0.6,3.1-1.7c0.9-1.5,1.8-2.3,2.6-1.4s3.2,0.6,4-0.8
                                    c0.4-0.7,1.3-1.1,2-0.7c0.4,0.2,0.6,0.5,0.8,0.9c0.4,1.1-0.6,2.3,1.3,1.1s3.2-0.8,3.7-0.3s-1.8,2.2,0,2.6s2.3,0.5,3.4-0.8
                                    s0.9-1.5,2.2-1.7s1.9-0.3,1.9-1.7s1.6-3.2,2.5-2.8s2.8,0.3,3.2-0.9s-0.6-2.9,0.2-4s0-4.1,0-5.1s2-2,2-3.4s1.9-1.4,2.8,0
                                    s5.6,2.6,5.6,2.6l5.6,2.2l4.1-0.6c-0.3-1.9-1.6-4.2-1.5-6c0.1-1,0.8-1.6,0.8-2.7l-0.3-0.4c-0.5-0.3-1.2-0.1-1.6-0.6
                                    c0-1.6,1.5-4,0.6-5c-0.5-0.2-1-0.4-1.5-0.5c-1.8-2.1-0.5-4.8-0.9-5.3c-0.9-0.3-0.6-1.1-1.1-1.7c-0.4-0.2-1.1-0.3-1.4-0.7
                                    c-0.1-0.6-0.2-1.1-0.4-1.7c-0.2-0.5-0.6-0.7-0.7-1.4c0-0.4,0-0.8,0.2-1.2c0.3-1.4,1.1-2.7,1.4-4s0.3-2.8,0.7-4.1s1.6-2.5,2.4-3.8
                                    c0.2-0.3,0.2-0.7,0.4-1c0.7-1.3,1.4-2.8,2-4.2c0.4-0.8,0.4-1.9,0.8-2.7s1.1-1.6,1.4-2.6c0.4-0.8,0.7-1.6,1-2.4
                                    c0.3-0.9,0.5-1.7,0.6-2.7c0.2-0.9,0.4-1.8,0.7-2.7c0.2-0.7,0.6-1.3,0.8-1.9c0.1-0.2,0-0.4,0.1-0.5c0.4-0.9,1.3-1.5,1.7-2.4
                                    c0.4-0.7,0.2-1.5,0.6-2.2c0.5-1.2,1.5-2.3,1.9-3.5c0.2-0.8,0.3-1.7,0.2-2.5c0.5-0.6,1.1-0.6,1.7-0.9c0.3-0.2,0.6-0.4,0.9-0.5
                                    c2.4-1.1,5-2,7.6-2.6c1.8-0.3,3.6-0.5,5.5-0.6c0.9-0.1,1.8-0.5,2.7-0.7s2.7,0,3.6-0.3c0.7-0.2,1.7-0.9,1.9-1.6l-0.3-0.4
                                    c-1.2-0.3-2.4,0.3-3.7-0.2c-0.5-0.2-0.9-0.4-1.4-0.7c-1.5-1.5-2.9-3-4.2-4.7c-0.4-0.6-0.7-1.3-0.9-1.9c-0.6-2-0.6-4,0-6
                                    c0.2-0.3,0.4-0.5,0.6-0.7c0.2-0.2,0.4-0.5,0.8-0.5l0.5,0.1c0.2,0.3,0.4,0.6,0.5,0.9c1.7-1,1.9-2.8,2.4-4.5c0.3-0.8,1-1.6,1.2-2.5
                                    s0-1.8,0.5-2.7c0.7-1.3,2.3-2.4,3.3-3.5c0.3-1.3,0.6-2.7,0.8-4c0.2-1.5,0.1-3.4,0.7-4.8c0.3-0.7,1.5-2.6,1.5-3.3
                                    c0-0.3-0.3-0.7-0.3-1c-0.1-0.7,0.5-1.5-0.1-2.2c-0.6,0-0.9,0.5-1.4,0.6l-0.5-0.1c-0.8-0.6-1.1-1.7-0.8-2.7c-0.4-0.6-0.2-1.4-0.5-2.1
                                    c-0.6-0.9-1-1.9-1.3-3c-0.3-1.9,0.4-3,0.9-4.6c0.2-0.5,0.2-1.2,0.4-1.7s1-1,1.3-1.6c0.4-0.9,0.2-2.2,0.5-2.7c0.2-0.3,0.8-0.7,1.1-1
                                    c0.1-0.8-0.1-1.5-0.3-2.3c-1-1.3-2.1-2.5-3.2-3.6c-0.1,0-0.8-0.4-1-0.4c-0.8-0.3-1.6,0.3-2.3-0.1c-0.1-0.3-0.1-0.7,0-1
                                    c-0.4-0.7-2-0.5-2.7-0.7c-1.1-0.7-2.3-1.4-3.3-2.2c-1.4-1.4-0.8-3.9-1.4-5.4c-0.5-1.1-1.8-1-2.1-2.7c-0.1-0.4,0.6-3.4,0.7-4
                                    c0.1-0.5-0.1-0.9-0.1-1.3c0.1-1.7,0.3-1.2,1-2.4c0.1-0.2,0.2-0.4,0.3-0.6c0.2-0.6,0.6-1.2,0.8-1.7c0.2-0.7,0.4-1.4,0.7-2.1
                                    c0.2-0.3,0.4-0.6,0.5-0.9c0.1-0.4,0.2-0.7,0.2-1.1l-0.2-0.5h-0.6c-1.7-2.1-0.7-1.4-1.1-3.6c-0.2-0.9-0.5-1.7-0.9-2.6
                                    c-0.2-0.8,0-1.7-0.2-2.5c-0.1-0.5-1.6-3.5-1.9-4.2c-0.7-1.3-0.9-2.8-1.5-4.1c-0.1-0.4-0.4-0.8-0.6-1.2c-0.5-0.4-1.1-0.8-1.8-1
                                    l-0.1-0.4c0.5-0.4,1-0.9,1.2-1.5c0.1-0.9,0.1-1.7,0-2.6c0-0.4,0.2-0.7,0.2-1.1c0-1-0.1-2.1-0.4-3.1c-0.8-1.5-2.5-0.5-2.3-4.5
                                    c0.1-1.4,0.8-2.2,1.4-3.4c0-0.2,0.1-0.3,0.2-0.5c0.2-0.4,0.7-0.8,0.9-1.1c1-1.5,2.5-4,3.8-5.1c1.1-1,2.5-1.7,3.9-2.2
                                    c0.3-0.2,0.7-0.3,1-0.4l0.6,0.1l0.1,0.6l0.3,0.3c1,0,2.2-0.7,3.1-0.9c1.1-0.3,2.2-0.5,3.4-0.7c1.2-0.1,3.3,0.3,3.9,0
                                    c0.2-0.5,0.4-1,0.6-1.4c0.4,0.3,0.7,0.6,1.1,1c0.4,0.1,0.8,0.1,1.3,0.1c0.3,0.2,0.5,0.4,0.6,0.8c0,0.8-0.6,1.3-0.7,2
                                    c0,1,0.1,2,0.5,2.9c0.7,2.6-0.9,5.1-0.3,7.7c0.3,1.3,1.3,1.3,1.9,2.1c0.4,0.5,0.3,1,0.5,1.6c1,0.1,2.4,0.1,3.2,0.9
                                    c0.2,0.3,0.4,0.5,0.6,0.7c0.1,0.8,0.8,1.2,0.8,1.9c0,1.1-1.4,2.1-1.6,3.9c-0.1,0.9,0.6,1.9,0.6,2.9c0,0.6-0.5,0.9-0.2,1.6
                                    s3.8,4.2,4.7,4.9c0.4,0.3,0.9,0.4,1.3,0.7c0.1,0.1,0.2,0.3,0.3,0.4c0,0.8-0.5,1.5-0.5,2.3c0,1.2,0.8,2.3,0.6,3.5
                                    c-0.3,0.8-0.3,1.6-0.2,2.4c0.7,0.7,1.6,1.1,2.3,1.8c0.2,0.2,0.4,0.5,0.7,0.8c0.5,0.1,1.2,0.2,1.5,0.6c0.1,1.2,1.1,1.1,1.6,1.8
                                    c0.2,0.3,0.3,0.6,0.5,0.9l0.5,0.1c0.5-0.3,2.7,0.3,3.2,0.5l-0.1-1.2l-1.6-0.8c-0.3-1.3-0.5-1.4-0.8-2.7c-0.1-0.3-0.3-0.6-0.5-0.9
                                    c-0.5-1.2-0.9-2.3-1.2-3.5l-0.8-3.3c0-0.1-0.2-0.4-0.2-0.5c0-1.1-0.1-2.1-0.3-3.2c-0.2-0.9-1.7-1.5-2.1-2.7
                                    c-0.4-1.8-0.7-3.5-0.8-5.4c-0.4-1.9-1-3.8-1.7-5.6c-0.3-0.6-0.6-1.2-1-1.7c-0.7-1.5-0.1-3.2,0.2-4.7c0.3-0.7,0.4-1.5,0.6-2.2
                                    c0-0.6-0.2-1.2-0.2-1.8c0-1.3,0.4-2.6,1-3.8c0.6-1.1,1-2.3,1.3-3.5c0.4-2.9-3.5-3.7-3.5-8.1c0-1.1,1.5-3.4,1.8-4.5
                                    c0.5-1.8-0.1-2.2-0.9-4.4c-0.5-1.6-4-1.2-4.8-0.8s-2.6,2.1-3.5,2.6s-3-3-4-5s-3.1-2.1-3.9-3s-0.1-4.9,0.1-6.5s-0.5-5-1.6-6.2
                                    c-1.1-1.4-2-2.9-2.9-4.4c-2.8,1.1-5.5,2.1-8.2,3.4c-0.3,0-0.5,0-0.8,0c-1.4-0.4-1.2-1.1-2.1-2.2c-0.5-0.6-1-0.9-1.5-1.5
                                    c-0.7-0.9-1-2-0.9-3.1c-0.2-0.3-0.4-0.7-0.7-0.9c-0.9-0.8-2.6-2.9-3.2-3.4c-0.6-0.3-1.2-0.6-1.8-0.9c-0.4-0.5-0.8-1-1.1-1.6H603
                                    c0.1-0.5,0-0.9-0.2-1.4c-1.1-3.5-1.3-3-3.5-6c-0.6-0.9-1.2-1.8-1.8-2.7l-3,1.7c0,0-2.6,1.6-3.6,2.4s0.5,2.2,0.9,4
                                    c0.2,1.2,0,2.5-0.5,3.6c-1,0.6-0.6,3.1-0.3,4.1c1.6,4.6-0.9,4.9-0.9,7.4c0,0.9,0.6,1.4,0.7,2.1c0.3,1.6,0.1,3.3-0.5,4.9
                                    c-1.6,1.4-3.6,1.2-5.5,0.5c-0.4-0.1-0.8-0.5-1.2-0.6c-0.6-0.1-1.1,0.2-1.5,0.6c0.1,0.8,0.2,1.7,0.1,2.5c0.3,0.6,0.9,1,1.1,1.6
                                    c0.6,1.6-0.1,3-0.7,4.4c-1,2.2-3-0.1-4.3,0.1c-1.6,0.2-1.4,1-2.2,1.9c-0.9,0.1-1.7,0.4-2.4,1c-0.1,0.5-0.2,0.9-0.5,1.4
                                    c-2.1,0.8-3.6-0.6-5.3,0c-3.4,1.2-2.2,2.4-4,3.5c-1,0.5-2,0.8-3,1c-0.2,0.1-0.3,0.1-0.5,0.2c-1,0.7-2,1.2-3.2,1.5
                                    c-0.6,0-1.1-0.1-1.6-0.3c-0.8-0.1-2,0.5-2.8,0.6c-1.3,0.2-2.7-0.1-3.8,0.9c-0.4,0.9-0.5,2-0.3,3c0.2,0.4,1,1.3,1,1.7
                                    c0.2,1.7-0.2,2.2,1,3.8c1.1,0.8,3,1.4,4,0.3l0.6,0.1c0.5,0.4,1,0.8,1.5,1.2c0.6,0.1,1.3-0.5,1.9-0.7l0.3,0.4
                                    c0.1,1.4-0.5,2.8-1.7,3.7c-1.1,0.9-2.2,1-2.5,2.7s1,2.4,1,3.8c-0.1,1.6-0.4,3.2-0.7,4.8c-0.3,2.7-0.6,5.4-0.9,8.1
                                    c-0.2,0.9-0.5,1.7-0.8,2.6c-0.2,0.9-0.4,1.9-0.6,2.9c0,0.6,0,1.2,0.2,1.9c0.3,0.6,0.8,1,1.2,1.5c1.1,1.6,1.9,3.4,2.3,5.2
                                    c0.1,0.8,0.2,1.6,0.3,2.4c0.4,1.5,0.7,3,1,4.5l1.3,4.2c0,2,2.8,2.5,4.5,4c1.5,1.1,2.5,2.7,3,4.5s1.2,2.2,3.5,3s0.2,3-2.2,3.8
                                    s-1.2,4-0.5,5.2s-0.2,3.9-0.2,3.9c0.7,1.1,0,2.3,0.1,3.4c0.5,0.7,1.5,2.8,0.8,3.6c-0.8,1-1.6,2.1-2.3,3.2c-0.1,0.8,0.3,1.6-0.4,2.3
                                    c-0.9,0.7-1.7,1.6-2.3,2.5c-0.1,0.1-0.1,0.4-0.1,0.5c-0.6,0.9-1.1,1.9-1.4,2.9c-0.1,0.9-0.2,1.8-0.3,2.6c-0.4,0.8-0.8,1.5-1.2,2.2
                                    c-0.2,0.3-0.2,0.7-0.4,1c-0.5,0.9-2.8,1.4-3.6,1.8s-1.4,0.9-2.1,1.3s-2.1,0-2.8,0.5c-1.3,1,0,3.8-0.5,5.2l-2.1,2
                                    c-0.7,0.7-0.2,1.9-0.5,2.8c-0.4,0.9-1,1.8-1.7,2.5c-0.3,0.3-0.6,0.3-0.9,0.5c-0.7,0.5-1.2,1.3-1.2,2.2c0.2,2,2,2.7,2.1,4l-0.2,0.5
                                    c-0.1,0-0.4,0.3-0.4,0.3c-1,0.3-2,0.5-3,0.5C542.5,469.8,541.8,474.6,540.1,475.9L540.1,475.9z" />
                                <path class="st0 fill-white" id="BOENY" d="M162.3,420.8c0.9-0.1,2.2,0.7,2.9,0.3l0.3-0.4l-0.1-0.5c-0.2-0.2-0.5-0.4-0.8-0.6l-0.1-0.4
                                    c1.1-0.4,2.6-0.5,3.6-1c0.8-0.5,1.6-1.1,2.3-1.8c0.9-0.5,1.8-1.1,2.6-1.7c0.2-0.2,0.4-0.3,0.6-0.5c1.6-1.5,2.6-3.9,3.9-5.8
                                    c0.8-1.2,1.9-2.2,2.8-3.3c0.8-0.9,1-1.8,2.1-2.7c0.9-0.5,1.8-0.9,2.8-1.2c1.5-0.9,3-1.9,4.4-3c0.6-0.4,1.4-0.3,2-0.6
                                    c0.9-0.5,1.9-2.1,3-1.5s0.5,3.8,0.5,4.8s0.2,1.9,0.5,2.9c0.4,1.3,1,1.4,1.8,2.3c0.1,0.4,0.2,0.8,0.2,1.2c-0.3,0.6-0.6,1.2-0.9,1.9
                                    c-0.1,0.6-0.1,1.3-0.1,2c-0.1,1-0.5,3.1,0.8,3.7c0.7,0.2,1-0.2,1.6-0.4c3-0.9,2-2.6,3.8-3.7c1.1-0.7,3-0.4,3.7-1
                                    c0.3-0.5,0.4-1,0.5-1.6c0.4-0.3,0.8-0.6,1.1-0.9l0.1-0.6c-0.2-0.3-0.4-0.5-0.6-0.8l-0.6-0.1c-0.1,0.4-0.2,0.8-0.3,1.1h-0.6
                                    c-1.1-1.7-2-3.5-2.6-5.5c0.7-0.8,3.3-1.1,4.4-1c0.8,0.1,2.3,0.6,2.9,0.4c0.3-0.1,0.5-0.4,0.8-0.5c0.9-0.3,1.8-0.5,2.7-0.5
                                    c2.1-0.1,4.2-0.4,6.3-0.9c0.9-0.3,1.7-0.6,2.6-0.8l0.2,0.4c-0.2,0.6-0.2,1.2,0,1.7c0.5,1,3.9,1-0.1,5.7c-0.1,0.4-0.1,0.8,0.1,1.1
                                    l0.4,0.3h0.5c0.4-0.3,0.8-0.5,1.3-0.7l0.3,0.4c-0.2,0.9,0.3,2.1,1.4,1.8l0.2-0.5c0-0.6-0.4-1.1-0.2-1.7l0.5-0.1l0.4,0.1l0.2-0.5
                                    c-0.9-0.9-2.1-1.6-1.8-3c0.1-0.4,0.3-0.7,0.3-1.1c0-0.5,0-0.9,0-1.4c0.2-0.3,0.4-0.5,0.7-0.7c0.4,0,0.7,0,1.1-0.1l0.2-0.6l-0.1-0.5
                                    c0.6-1.4-0.3-1.8-0.1-2.8c0-0.1,0.2-0.5,0.3-0.6c0.2-0.4,0.4-0.7,0.6-1c0.8-1.2,0.3-2.2,0.1-3.5c-0.3-0.1-0.7-0.2-1-0.4v-0.7
                                    c-0.3-0.4-0.8-0.6-1.2-0.8v-0.6c0.3-0.4,0.6-0.7,1-1c0.9-1,0.8-1.8,2-2.8c0.7-0.6,1.9-0.9,2.5-1.6c0.3-0.4,0.5-1,0.5-1.6l0.4-0.3
                                    c0.9,0,3,1.6,4.9,1.9c1.1,0,2.1,0,3.2,0.1c0.5,0.3,0.5,1,1.3,1.4c1.6-0.7,2,0.1,2.9,1.3l0.4-0.1c0.1-0.3,0.2-0.7,0.4-1
                                    c1-0.6,2.1-1.1,3.2-1.6c1.3-1.8,1.5-1.4,3.5-1.9c0.7-0.2,1.2-0.7,1.9-0.9c0.5,0.1,0.9,0.5,1.4,0.7c0.4,0.1,0.8,0.2,1.2,0.2
                                    c0.5,0.1,0.7,0.3,1.1,0.5c0.8,0.3,1.7,0.2,1.9,1.3c0.3,1.3-0.4,1.6-0.7,2.7c-0.2,0.8,0.2,1.4,0.3,2.1c0,0.4,0,0.9,0.4,1.2
                                    c1.6,0.1,3.2,0,4.7-0.4c0.2-0.4,0.7-0.7,1.2-0.7c1.8,3.4,1.8,2.7,5,2.4l0.3-0.3c-0.5-1.5-1.6-1.4-2.7-2c-0.3-0.1-0.5-0.4-0.8-0.6
                                    l-0.1-0.5c1-1.6,3.6-1.1,3.4-3.5l-0.4-0.4c-1.2-0.4-4.6,3.4-6.1,2c0-1,1-1.8,1.6-2.5c1-1.2,2.3-3.1,3.5-4c0.5-0.4,1.2-0.6,1.8-1
                                    c0.8-0.5,1.5-1.3,2.4-1.7c1.4-0.7,3.8-2,5.3-2.1c1.8-0.1,2.9,0.7,4.6,1c0.6,0.1,2.2,0.3,2.6,0.8c0.1,0.6,0.2,1.1,0.2,1.7
                                    c0.2,0.2,0.4,0.5,0.6,0.8c0.9,1.1,1,1.6-0.2,2.6c-0.4,1.3,0.4,3.6-0.6,4.6c-0.6,0.4-1.3,0.1-2,0.7l-0.1,0.5c0.3,0.9,1.3,0.6,1.9,0.8
                                    s3.4,3,3.8,3.7c0.3,0.9,0.5,1.7,0.7,2.6c0.2,0.5,0.5,0.9,0.7,1.4c1.1,3.1,0.7,3,2.7,6c0.2,0.2,0.8,1.1,1,1.2
                                    c-0.6-1.4-0.9-2.9-0.9-4.5l0.3-0.4l0.6,0.1c0.5,0.5,0.9,1.1,1,1.7c0.9,1,3.8,0.2,4.2-1c-0.4-0.8-0.8-1.6-1-2.4
                                    c0.2-0.4,0.4-0.9,0.6-1.3c-0.2-0.5-0.8-0.5-1.1-1l0.3-0.4h0.6c0.8,0.6,1.7,1.1,2.5,1.6c0.5,0.2,1,0.3,1.5,0.5
                                    c0.6,0.8,0.7,1.9,1.5,2.6c0.3,0.3,0.6,0.3,0.9,0.5c0.9,0.5,1.6,1.2,2,2l0.3-0.1c-0.3-0.4-0.4-0.9-0.7-1.3c-1-1.5-2.2-2.9-2.9-4.6
                                    c-0.3-0.8,0-1.7-0.3-2.3c-0.5-0.8-2-1.1-2.3-1.8s-0.3-1.2-1.1-1.7c-1.1-0.7-2.5-0.7-3.5-1.3c-0.3-0.2-0.6-0.4-0.9-0.5
                                    c-1.7-0.5-2.5,1.2-4-0.5l-0.1-0.6c0.1-1.1,1.7-1.1,2.4-1.7c0.5-0.4,0.9-0.9,1.2-1.5c2.4-2.9,1.1-3.9,2-5.5l-0.3-0.4
                                    c-0.6-0.1-1.3-0.1-1.9-0.1c-0.1,0-0.3-0.2-0.5-0.2c-0.6-0.1-1.7,0.1-2.1-0.7c-0.1-0.4-0.2-0.8-0.1-1.2c0.1-0.2,0.2-0.4,0.3-0.6
                                    c0.6-1.2,1.2-2.4,1.7-3.6c0.1-0.3,0.2-0.7,0.4-1c0.3-0.6,0.7-1.1,1.1-1.6c0.6-0.7,1.5-1.2,2.2-2c1-1.3,2.1-2.5,3.3-3.6
                                    c0.9-0.6,1.8-1.3,2.6-2.1c1.1-1.4,2.3-2.7,3.5-4c0.5-0.4,1.6-1.3,2.2-1.2c0.1,1.1-1.1,1.8-1.2,2.8l0.1,0.6l0.5,0.2l0.3-0.4
                                    c-0.1-1.2,0.9-1.8,1.6-2.6c0.4-0.5,0.5-1.3,1-1.8c0.8-1,2.1-1,3.1-1.6c0.8-0.5,1.3-1.5,2-2.1s1.6-0.3,2.3-1c0.4-0.4,0.8-1.1,1.2-1.5
                                    c1.2-0.8,2.5-1.3,3.9-1.5l0.3-0.3v-0.5c-0.3-0.2-0.5-0.4-0.8-0.6l-0.1-0.4c0.9-0.7,1.9-1.2,2.8-2c1.1-0.9,2-2.1,3.2-3
                                    c0.5-0.4,1.1-0.7,1.6-1.1c0.9-0.7,1.5-1.7,2.3-2.4c1-0.9,2.2-1.3,3.3-2.1c0.6-0.5,1.2-1.1,1.8-1.6s1.4-0.8,2.1-1.3s1.1-1.2,1.6-1.8
                                    c0.3-0.3,0.9-0.5,1.2-0.8s0.4-0.5,0.7-0.7c1.2-0.9,3-1.2,4.3-1.7s2.3-2.5,4.1-1.7c0.2,0.3,0.9,0.8,0.9,1.1c0,1.2-0.1,2.4-0.4,3.5
                                    c0.1,0.9,0.8,1.1,0.9,1.8c-0.9,1.8,1.4,2.3,2.4,2.8c0.8,0.4,1.5,0.8,2.3,1.1c0.7,0.2,1.3,0.5,2,0.8c1,0.5,1.3,1.5,1.7,1.8l0.6,0.1
                                    l0.1,0.5c-0.1,1-0.7,1-1.1,1.6c-0.4,0.7-0.8,1.5-1.1,2.3c-0.4,0.3-0.8,0.6-1.2,0.9c-0.6,0.4-1.3,0.8-2,1.1c-0.2,0.1-0.4,0.2-0.6,0.4
                                    c-0.5,0.6-0.8,1.4-1,2.2c-0.3,0.8-1.9,4.9-2.2,5.6c-0.7,1-1.3,2-1.8,3.1c-0.2,0.6-0.4,4.5,0,5h0.5c1.2-0.4,0.8-2,1.2-2.9
                                    c0.1-0.3,0.4-0.6,0.5-0.9c0.3-0.7,0.1-1.6,0.6-2.1s1.3-0.3,2.1-0.3c0.6,0,1.2-0.2,1.8-0.2c0.4,0.1,0.7,0.1,1.1,0.1
                                    c0.5-0.1,0.9-0.5,1.4-0.5c0.3,0.2,0.6,0.3,0.9,0.3c0.6-0.6,0.7-1.1,1.8-1.1c0.4,0,0.8,0,1.2-0.1c1.7-0.9,1-3.5,4.1-3.4
                                    c0.1,0,1.5,0.7,2.7,1.1c-4.2,3.4-2,6.2-3,7.5l-0.1,0.2L371,357c-0.9,1.3-1.2,2.9-0.7,4.4c-2.9,1.9-1.1,2-1.6,3.9
                                    c-1.2,1.5-1.4,2.7,0.5,3.6l0.7,0.3c0.2,0.1,0.4,0.2,0.6,0.4c0.2,0.9,0.6,1.7,1.1,2.4c0,0.1,0,0.3,0,0.5c0.1,3.1,1.3,2.6,1.9,4
                                    l0.1,0.2c0,0.2-0.1,0.3-0.1,0.5c-0.6,0.2-1.3,0.4-1.9,0.4c-2.7,0.4-3.6,3.2-1.2,5c0.8,0.9,1,2.2,2.3,2.7c-0.6,3.5,2.8,3.4,3.5,4.2
                                    l0.1,0.2c0,0.1,0.1,0.3,0.1,0.4c0.2,1.4,1,2,1.2,3v0.4c0,0.8,0.3,1.5,0.7,2.1l0.2,0.3c0.1,0.5-0.1,1.7,0,2.4c0.1,0.4,1,3.1,0.9,3.2
                                    c-0.4-0.2-1.1-1.5-2.2-2l-0.4-0.1c-2.8-0.3-3.7,3-1.8,5l0.4,0.4l0.4,0.4c0.2,1.3,0.2,2.8,2,2.8c0,0.4,0,0.9,0,1.4
                                    c-0.1,3.2,1,3.6,2.7,3.8c-0.4,0.8-0.4,1.9,0.2,2.6c-0.1,0.4-0.2,0.9-0.2,1.4v0.4c0.2,0.8,1,2,2,1.8c0.5,0,0.9-0.2,1.3-0.5
                                    c0.2,0.7,0.6,1.3,1.3,1.6c-0.1,0.4-0.3,0.9-0.5,1.2c-1.4,1.7,1.6,10.7,6.6,6.1c0.4,0.2,0.8,0.3,1.2,0.6v0.3c0.2,0.5,0.3,1.1,0.4,1.6
                                    c-0.1,0.1-0.1,0.2-0.2,0.3l-0.3,0.4c-1.5,1.3-1.8,3.5-0.8,5.2c0.8,1.4,0.3,0.8,0.9,2.8c-1.2-0.4-2.5,0.2-2.9,1.4
                                    c-0.1,0.2-0.1,0.4-0.1,0.6c-0.1,1.4-0.7,2.8-1.8,3.8c-1.2,1.2-2.2,0.4-3.2,1s-1.1,2.8-1.1,4.2c0,1.5-1,1.5-2.6,1.2s-1.5,0.2-3,1.6
                                    s-0.8,2.1-0.8,2.1c0.8,1.2,1.9,2.2,3.2,2.8c2.4,1,2.1,1.2,2.4,2.8s0.6,0.6,1.8,0.6c1.5,0,2.8,0.9,3.5,2.2c0.6,1.5,2.5,1.5,3.5,1.2
                                    s1.4,1.2,1.6,2.6c0.3,1,0.3,2.1-0.1,3.1c-0.5,1.1-1.1,1.1-2.4,3s-1.1,0.4-1.2-0.8s-3.1-3.4-3.8-3.5c-1.1-0.4-2-1.2-2.8-2.1
                                    c-1.1-1.1-2.6-1.5-4.1-1.2c-1.4,0.2-3.4-1.5-4.4-1.6s-2.5-1.1-3.6-1.1s-1.9-0.1-4.5-1.6s-4,0.8-5,1.9s-1.5,1.5-4.8,1.5
                                    s-3.1,4.4-3.1,4.4s-2.8,0-5.6-0.1s-2.6-0.8-3.6-2.1s-3.4-0.8-4.2-0.2c-1.2,0.4-2.5,0.4-3.6,0c-1.1-0.3-2.2-0.5-3.2-0.5
                                    c-0.7,0.5-1.5,1-2.1,1.6s-0.4,4.2-0.4,4.9s0.5,3.2-0.5,4.2s-1.2,5.1-1.2,6.5s-1.5,2.2-2.6,3s-0.5,3,0,5.1s-0.2,3.2-1.6,3.2
                                    s-1.4,3.8-1.4,5.4s-1.6,1.8-1.6,3s-1.9,1.1-3.1-0.2s-1.2-0.5-3.5-0.2s-1.5,0.8-1.9,1.5s-1.5,1.9-1.5,2.5s-0.5,5.8-0.2,7.2
                                    s0,1.4-0.9,1.4s-2.1,0.1-3.6-2s-2.6-1.4-3.6-0.2c-1,1.2-4.4,3.5-4.6,4.6s-1.4,1.5-2,4s-1.6,1.4-1.6-0.1s-0.1-2.1-0.8-2.8
                                    s-0.5-3.9-0.6-4.8c-0.2-0.6-0.8-1-1.5-0.8c-0.1,0-0.3,0.1-0.4,0.2c-0.4,0.5-1.2,0.5-2.8,0.5s-1.8,0.9-2.4,1.6
                                    c-0.6,0.8-1.1,1.6-1.5,2.5c-0.6,1.2-1.4,0.8-1.2-0.4s-0.4-3.5-0.4-4.4c-0.1-1.2-0.5-2.3-1.4-3.1c-0.8-0.8-1.7-1.5-2.6-2.1
                                    c-1.1-0.9-0.1-2.2,0.4-3.4s-0.4-3.1-1.1-4.5s-0.4-2.1-1.1-3.5s-2.5-0.8-3.1-0.1s-2.5-0.1-3.1-0.5c-0.9-0.3-1.8,0.2-2.1,1
                                    c-0.1,0.8-0.6,0.9-1.5,1.2s-0.8,1.1-0.5,2c0.2,0.6,0.3,1.2,0.1,1.8c-0.2,0.5-0.4,1-0.8,1.5c0,0-5.5,0.2-6.9,0.2
                                    c-1.7,0-3.3-0.1-5-0.4c-2.3-1-4.5-2.3-6.5-3.9c-0.8-0.9-6.4-0.5-7.5-0.5s-4.4-0.1-6.1,1s-1.8,0.9-3.4,0.8s-2.6,1.1-4,1.4
                                    c-0.9,0.2-1.7,0.5-2.5,0.8c0,0-2.1-3.5-3.1-4.7s-4.2-3-5-1.5s-2.4,2.1-3.4,2.6s-1.5,0.6-2.4,0.1c-1.3-0.5-2.6-0.8-4-1
                                    c-0.7-0.2-1.2-0.8-1.1-1.5c0-1.2-2.6-4.1-0.9-5.2s1.6-1.4,1-2.9s-3.6-3.8-4.4-5.2s-2-2.5-1.9-5.1s0.1-4,0.1-4.8s-0.1-1.6-1.4-1.5
                                    s-2.6,0.1-3.1,0.1s-0.9-0.1-1-1.1s-1-3.5-2.4-3.4s-4.1,0-4.1,0c-0.7-0.4-1.3-1-1.8-1.6c-0.8-1-3.6-2.9-4.8-4.6s0.1-2.5-1.2-2.9
                                    c-1.2-0.2-2.4-0.8-3.2-1.6c-1.2-1.1-2.5-1.4-2-2.8s0.9-2.2-0.2-3.1s-1.1-2-1.5-2.6c-1-1.1-2.1-2.2-3.2-3.2c-0.8-0.8-2.4-1-0.6-2.2
                                    s1.5-4.2,1.5-5.5s0.1-1.6-1.2-3.2s-3.5-4.8-4.5-5.5c-0.9-0.9-1.7-2-2.2-3.1l-2.2-3.7C160.7,421.1,161.5,420.9,162.3,420.8
                                    L162.3,420.8z" />
                                <path class="st0 fill-white" id="BETSIBOKA"
                                    d="M226.7,501.6c1.4-0.2,2.4-1.5,4-1.4s1.6,0.4,3.4-0.8s5-1,6.1-1s6.8-0.4,7.5,0.5
                                    c2,1.5,4.2,2.8,6.5,3.9c1.7,0.3,3.3,0.4,5,0.4c1.4,0,6.9-0.2,6.9-0.2c0.3-0.5,0.6-1,0.8-1.5c0.1-0.6,0.1-1.2-0.1-1.8
                                    c-0.2-0.9-0.4-1.6,0.5-2s1.4-0.5,1.5-1.2c0.3-0.8,1.3-1.3,2.1-1c0.6,0.4,2.5,1.1,3.1,0.5s2.4-1.2,3.1,0.1s0.4,2.1,1.1,3.5
                                    s1.6,3.4,1.1,4.5s-1.5,2.5-0.4,3.4c1,0.6,1.8,1.3,2.6,2.1c0.8,0.8,1.3,2,1.4,3.1c0,0.9,0.5,3.2,0.4,4.4s0.6,1.6,1.2,0.4
                                    c0.4-0.9,0.9-1.7,1.5-2.5s0.9-1.6,2.4-1.6s2.4,0,2.8-0.5c0.5-0.4,1.3-0.3,1.7,0.2c0.1,0.1,0.2,0.3,0.2,0.4c0.1,0.9,0,4.1,0.6,4.8
                                    s0.8,1.2,0.8,2.8s1,2.6,1.6,0.1s1.8-2.9,2-4s3.6-3.5,4.6-4.6s2.1-1.9,3.6,0.2c1.5,2.1,2.8,2,3.6,2s1.1,0.1,0.9-1.4s0.2-6.6,0.2-7.2
                                    s1.1-1.8,1.5-2.5s-0.4-1.2,1.9-1.5s2.2-1.1,3.5,0.2s3.1,1.5,3.1,0.2s1.6-1.4,1.6-3s0-5.4,1.4-5.4s2.1-1.1,1.6-3.2s-1.1-4.4,0-5.1
                                    s2.6-1.6,2.6-3s0.2-5.5,1.2-6.5s0.5-3.6,0.5-4.2s-0.2-4.2,0.4-4.9c0.7-0.6,1.4-1.1,2.1-1.6c1.1,0,2.2,0.2,3.2,0.5
                                    c1.2,0.4,2.5,0.4,3.6,0c0.9-0.5,3.2-1.1,4.2,0.2s0.8,2,3.6,2.1s5.6,0.1,5.6,0.1s-0.1-4.4,3.1-4.4s3.8-0.4,4.8-1.5s2.4-3.4,5-1.9
                                    s3.4,1.6,4.5,1.6s2.6,1,3.6,1.1s3,1.9,4.4,1.6c1.5-0.3,3,0.2,4.1,1.2c0.7,0.9,1.7,1.7,2.8,2.1c0.6,0.1,3.6,2.4,3.8,3.5
                                    s0,2.6,1.2,0.8s1.9-1.9,2.4-3c0.4-1,0.5-2.1,0.1-3.1c-0.2-1.4-0.6-2.9-1.6-2.6s-2.9,0.2-3.5-1.2c-0.7-1.3-2-2.2-3.5-2.2
                                    c-1.1,0-1.5,0.9-1.8-0.6s0-1.8-2.4-2.8c-1.4-0.5-2.5-1.5-3.2-2.8c0,0-0.8-0.8,0.8-2.1s1.4-1.9,3-1.6s2.6,0.2,2.6-1.2
                                    s0.1-3.6,1.1-4.2s2,0.2,3.2-1c1-1,1.6-2.3,1.8-3.8c0.1-1.3,1.2-2.2,2.5-2.1c0.2,0,0.4,0.1,0.6,0.1c0,0.6,3.5,4.6,4.4,5.8l0.3,0.4
                                    l0.1,0.2c1.2,0.3,2.4,0.6,3.6,0.8c1.2,0.1,2.2-1,3.8,0.6s2.4,1.4,3.1,1.2c1.1-0.1,2.2-0.4,3.1-1c1-0.8,6.8-0.5,8.9-0.4
                                    s2.6,1.2,3.8,1.4s1.6,2.1,0.6,2.6s-0.6,1.4-0.5,3.2s1.6,1.9,2.4,2s0.6,0.4,2.2,1.6s4,2.6,5.4,1.9c1.4-0.8,3.3-0.4,4.2,0.9
                                    c1,1.4,1.2,1.4,2.6,1.2s5.2-0.1,5.2-0.1c0.4,0.8,1.1,1.6,1.5,2.5c0.7,1.5,1.2,3.1,1.3,4.8c0,0.6-0.1,1.3-0.1,2s0.2,1.6,0.4,2.3
                                    c0,0.2-0.1,0.4-0.1,0.5c-1.2,1-1.3,1.4-0.7,2.8c0.3,1.1,0.9,2,1.7,2.8c0.1,0.1,0.7,0.5,0.8,0.6s0.3,0.6,0.5,0.9s0.7,0.6,1,1
                                    c0,2.2,1.6,2.1,2.5,3.6c0.5,0.7-0.1,1.6,0,2.4s1.8,1.2,2.3,1.8c0.4,0.5,0.5,1.6,0.9,1.9c0.9,0.8,2.5,0.8,3,2l0.1,0.3
                                    c0.1,2-1.5,2.7-1.7,4.3c0.4,0.4,0.8,0.6,1.3,0.8l0.3,0.4c0.2,0.8-0.8,1.6-0.5,2.7c0.5,1.1,1.1,2.2,1.9,3.1c4.2,6.5,6.6,2.6,8.7,4.5
                                    l0.2,0.5c-0.1,1.1-0.8,2.5-0.3,3.6c0.2,0.5,0.7,0.7,0.8,1.2c-0.6,2-0.1,2.3,0.8,4.2c0.6,1.4-0.7,2.7-1.2,3.8
                                    c-0.3,0.9-0.8,1.7-1.3,2.4c-1.7,2.2-3.3,1.4-1.2,5.1c-0.2,0.9-0.6,1.7-1.1,2.5c-0.2,0.5-0.3,1-0.6,1.5s-1.8,0.8-2.6,2.2
                                    c-0.2,0.8-0.3,1.7-0.2,2.5c-0.1,0.5-0.4,1-0.7,1.4c-0.2,0.6,0,1.2-0.2,1.8c-0.6,0.6-1.3,1-2,1.4c-1.3,0.2-2.6,0.2-3.9,0.1
                                    c-1.4-0.2-2.8,0.6-3.5,1.9c-0.6,1.1-3,1.6-5.3,1.7s-2.3,3.1-2.7,6.1s0.8,3,1.6,4.7s4.4,2.5,5.8,3.9s5.3,3.2,5.3,3.2
                                    c-0.2,1.9-0.1,2.7-1.2,4.3c-0.2,0.2-0.4,0.6-0.7,0.7h-0.6c-1.5-1.4-4.5,0.1-4.5,1.9c0.1,1,0.2,1.9,0.4,2.9c0,0.2,0,0.5,0,0.7
                                    c-0.5,1.1-2.4,1.9-2.7,2.8c-0.6,1.8,1.2,3.5,0.1,5.2c-0.9,1.4-2.1,2.6-2.7,4.2c-0.1,0.3,0,0.8-0.3,1.1c0,0-2.1-4.4-2.5-5.5
                                    s-1.6-1.9-5.8-3.1s-3.5-0.3-5-0.2s-2.5,0.8-5.6,0s-4.2,4.1-4.2,4.1v2c0,0.8-0.5,1.9-4.7,2.7c-2.4,0.4-4.7,1.5-6.4,3.2
                                    c-0.8,1-2.2,2.1-3.5,1.6L407,592l-1.7,0.4l-0.9,0.4c-1.5-0.6-4.9-0.4-5.1-1.8c-0.6-3.5-2.2-2.8-4.6-4.1c-1-0.5-1.7-1.5-1.9-2.5
                                    c-0.3-1.9-1.4-2.8-0.3-4.9v-0.3c-0.2-0.6-2.4-1.5-2.9-1.7c-0.6-0.2-1.2-0.3-1.8-0.3c-0.3-0.1-0.6-0.3-0.9-0.4
                                    c-1.1-0.4-2.3-0.6-3.5-0.5c-1,0.5-2,0.8-3,1.1c-0.4-0.3-0.8-0.5-1.3-0.6c-2.1-0.2-1.8,0.7-3.2,1.6c-0.2,0.1-0.9,0.4-1,0.5
                                    c-0.6,0.5-0.9,1.2-1.6,1.5c-1.7,0.7-3.8,0-5.5,0.8c-0.5,0.4-1.1,0.8-1.5,1.3c-0.2,0.2-0.6,0.3-0.8,0.5c-0.9,0.9-1.2,3.3-2.4,4.5
                                    l-0.9-0.1c-0.1-1.1-0.5-2.1-1-3.1c-3.3-1.2-7.9-0.9-11.3-0.5l-0.9-0.5c-0.2-1.5,1.1-2.8,0.8-4.3c-0.5-2.1-1.2-3.2-1.2-5.4l-0.7-0.5
                                    c-0.4,0.5-0.9,1-1.5,1.2l-1.9-0.9l-0.5,0.8v0.7l-0.8,0.6c-2.1-1.1-2.8,0-3.7-0.3c-0.3-0.2-0.6-0.3-0.9-0.5c-1.2-0.5-5-1.3-6.3-1
                                    c-0.6,0.2-1.2,0.7-1.9,0.9c-1.1,0.3-2.2,0.3-3.3,0.7c-0.5,0.1-0.7,0.7-1.8,0.9c-1.7,0.3-2-0.6-3.3-0.3l-0.7,0.7
                                    c-1.5,0-3.1-0.2-4.6-0.7c-0.2-0.6-0.6-1.2-1.3-1.5c-0.9,0.6-0.6,1.9-1.6,2.5c-0.7,0-1.4,0.3-2,0.7c-0.8,0.6-1.2,1.4-2.4,1.8
                                    c-1,0.3-1.9,0-2.9,0.5s-1.6,1.3-2.6,1.4c-1.2,0.1-4.7-0.3-5.6,0.4l-0.5,0.9l0.1,1.2l-0.7,0.7c-2.3-0.1-3.6,2.2-6.4,1l-0.9,0.3
                                    c-0.2,0.6-0.6,1.2-1,1.7l-1.1-0.2c-0.6,0.3-1,0.8-1.3,1.4c-1.1-0.1-1.8-1-2.9-1.1c-0.6,0.7-0.4,1.6-0.9,2.4
                                    c-1.4,0.3-2.9,0.3-4.3,0.2l-0.4-1c0.6-0.9,0.8-2,0.6-3.1l-0.8-0.5c-0.9,0.5-1.5,1.3-2.3,1.8c-0.5,0.2-0.9,0.3-1.4,0.4
                                    c-1.6,0.3-3.3-0.4-4.2-1.8c-1.6-0.6-3.4,0.1-4.9-0.5s-0.8-2.5-3.1-3.1l-0.8-0.2c1.6-5.1,1-4.5-1.7-7.9c-2.2-2.7,0.1-4.8,1.6-7.1
                                    c0.3-0.5,0.5-1,0.8-1.4c-0.6-0.9-0.9-1.9-1-3c0.1-1.2-0.4-2.9,0.4-3.9s1.5-1,0.6-2.4s-1.4-4.6-2.2-6.1s-1.4-0.5-1.5-3
                                    s-0.8-2.9-1.2-2.1c-0.5,0.8-1.4,1.3-2.4,1.1c-1.4,0-2.6,0.1-3.4,1.2s-2.2,2-3,1.8s-0.5-0.9-1.9-0.2s-3.8,0.6-5.5,0.6
                                    s-3.2-0.2-3.6-0.8s-0.8-1.4-1.8-0.1s-2,1.2-2.4,0.6s-0.5-0.1-2.6-1.5s-0.5-1.5,0-2.8s-0.5-3.1-1.5-4.1s-3.1-2-3.4-3.2
                                    s-0.6-1.6-1.9-1.8s-1.9-2.6-0.5-3.4s1.4-1.8-0.2-3.2s-1.5-0.9-1.5-3.4c0.1-1.5-0.2-3-1-4.4c-0.5-0.9-0.9-8.4-1.1-10.5
                                    s-0.2-4.2,1-5.1s1.5-1.9,2.5-2.8c0.5-0.4,1-0.7,1.5-1C225.1,502.1,225.9,501.8,226.7,501.6L226.7,501.6z" />
                                <path class="st0 fill-white" id="MELAKY"
                                    d="M106.6,717.3c1.1,0,2.2,0,3.3,0.1c0.6,0.2,1.3,0.6,2,0.8c1.3,0.3,2.4-0.9,3.6-1.2
                                    c0.6-0.1,1.2-0.1,1.9-0.1c2.2-0.1,4.3,1,5.4,2.8c0.2,0.3,0.3,0.6,0.4,0.9c0.3,0.6,0.9,1,1.3,1.5c0.2,0.3,0.2,0.7,0.4,1
                                    c0.3,0.6,1,0.9,1.3,1.4s0.4,1.2,0.9,1.8c0.7,0.3,1.5,0.5,2.3,0.6c1.3,0.3,3.2,1.1,4.2-0.3l1.1-0.1l1.4,1.3l1.1-0.2l1.2-1.6l1-0.2
                                    c0.7,0.8,0.7,1.9,1.3,2.8c1.4,0.2,2.5-1.3,3.9-1.1c0.8,1,1.8,0.9,2.8,1.4c0.7,0.3,1,0.9,1.5,1.3c1.8,0.8,3.6,1.2,5.5,1.3
                                    c0.6-0.4,1.2-0.7,1.8-0.9c1.4-0.3,2.8-0.1,3.8-1.6c0.7-1,0.1-2.3,0.7-3.5l0.8-0.5c1.1,0.1,2.3-0.2,3.2-0.9c1.2-0.3,1.9,0.9,2.8,1.3
                                    s3.1-0.2,4.1,1.5l0.9,0.1c0.2-0.7,0.5-1.3,0.8-2c2-0.2,5.5,0.9,7.1-0.6l0.4-0.9l-0.2-0.3c-1.1-1.8-4.9-3.7-6.7-5.3
                                    c-1.1-1-1-2.5-1.9-3.5v-1.2c0.4-1.3,2.1-1.6,2.6-2.8c0.3-1,0.3-2,0.2-3.1c-0.1-0.8-0.9-1.4-1.2-2.1c-0.4-1.3-0.7-2.7-0.9-4
                                    c0-1.1-0.4-2.2-1-3.1c0-1.1-0.2-2.3-0.7-3.3c-0.7,0.2-1.4,0.1-2-0.3c-1-2.1-1.3-2.9,0-4.8c0.6-0.8,1.4-1.5,1.6-2.5
                                    c0-0.9-0.1-1.8-0.2-2.7c-0.4-3-0.4-3.8-2.6-5.6c-0.4-0.3-0.8-0.6-1.3-0.8L166,676l-1-0.4l-0.2-1c0.5-0.5,0.9-1,1.2-1.5l-0.3-1
                                    c-1.1-1-2.6-2.4-2.9-4c0.3-0.7,0.4-1.4,0.5-2.2l-1.3-1.5c0.1-0.9,0.1-1.7,0-2.6c-0.2-0.7-0.6-1.3-0.8-1.9s0.1-1.3-0.1-1.9
                                    c-0.1-0.3-0.3-0.6-0.4-0.9c-0.4-1.1,0-2.4-0.6-3.4l-2.8-4c-0.9-1.3-0.5-2.6-1.1-3.6c-1.4-2.3-3.2-4.2-4.6-6.5l0.1-1.2
                                    c0.4-0.5,0.8-1,1.2-1.5c0.5-0.9,1-1.8,1.6-2.6c1.6-1.6,3.7-2.8,5.4-4.4c1-0.2,1.9,0.7,2.7,0.5c2.9-1.5,2.1-3.1,3.7-4.5
                                    c0.2-0.2,0.6-0.3,0.8-0.5c0.7-0.7,1.3-1.5,1.9-2.3c0.4-0.6,1.4-0.7,1.9-1.3s0.9-1.5,1.6-2.2l1.1-0.1c0.8,0.7,0.7,2,1.2,2.8
                                    c1.2,0.3,2.8,0.2,3.9,1.1s1,2.5,2.4,3.2l1.2-0.2l2.1-2c1.4-0.2,2.6-0.9,3.6-1.8c3.5,0,4.8,0.4,7.5,2.9c0.7,0.7,1.4,1.3,2.2,1.9
                                    c0.9,0.6,2.3,0.5,3.3,0.9c0.6,0.2,1.1,0.8,1.7,1c0.8,0.3,1.3-0.2,2.3,0.5s1.5,2.4,2.9,2.1c0.7-0.4,0.9-0.9,1.3-1.4
                                    c0.7-0.7,1.8-0.9,2.4-1.7c0.4-0.6,0.4-1.2,1.2-1.5c1.1,0,3.2,0.6,3.6,1.7c0.5,1.4,0.5,2.6,1.5,3.9l1,0.2c1.3-0.3,2.1-1.8,2.6-2.9
                                    c0.6-0.5,1.5-0.6,2.1-0.1c0.5-0.5,1-1,1.4-1.7c0-0.9,0.3-1.9,1-2.5c0.2-0.2,0.6-0.3,0.8-0.5c0.6-0.6,1.1-1.8,2-1.9
                                    c1.2,0,1.2,0.6,1.9,0.9c0.7,0.3,1.4,0.5,2.1,0.7l1,1.7l0.9-0.1l1.2-1.5l1,0.1c0.4,0.5,1,0.9,1.7,1.2c0.1,0,0.5,0,0.7,0
                                    c1,0.3,2,0.8,2.9,1.4l0.6-0.1c0.8-0.9,1.6-1.8,2.2-2.9c0.4-0.5,0.9-0.9,1.6-1.1l0.8-0.3c2-0.8-1.7-2.9,1.4-6.5c0.1-1.2-0.1-2,0.9-3
                                    l0.3-0.3c0.6-0.7,0.9-1.8,2-3l0.4-0.4c1-1.1,0.2-3.6,1.7-3.8c0.7-0.1-0.2-1.8,0.9-3.4c0.8-1.1,0.1-1.7,0.3-3l0.1-0.3
                                    c0.6-0.7,1.4-1.3,2.3-1.7c0.2-2.3,0.6-4.5,1.4-6.7c0-0.2,0-0.5,0-0.7c-0.4-0.4-0.7-0.5-0.9-1.1v-0.3c0-0.4,0.1-0.7,0.3-1l0.1-0.2
                                    c0.3-0.7,0.5-1.5,0.8-2.1c0.5-1.3,1.3-2.5,1.9-3.7c1.6-5.1,1-4.5-1.7-7.9c-2.2-2.7,0.1-4.8,1.6-7.1c0.3-0.5,0.5-1,0.9-1.4
                                    c-0.6-0.9-0.9-1.9-1-3c0.1-1.2-0.4-2.9,0.4-3.9s1.5-1,0.6-2.4s-1.4-4.6-2.2-6.1s-1.4-0.5-1.5-3s-0.8-2.9-1.2-2.1
                                    c-0.5,0.8-1.4,1.3-2.4,1.1c-1.4,0-2.6,0.1-3.4,1.2s-2.2,2-3,1.8s-0.5-0.9-1.9-0.2s-3.8,0.6-5.5,0.6s-3.2-0.2-3.6-0.8
                                    s-0.8-1.4-1.8-0.1s-2,1.2-2.4,0.6s-0.5-0.1-2.6-1.5s-0.5-1.5,0-2.8s-0.5-3.1-1.5-4.1s-3.1-2-3.4-3.2s-0.6-1.6-1.9-1.8
                                    s-1.9-2.6-0.5-3.4s1.4-1.8-0.2-3.2s-1.5-0.9-1.5-3.4c0.1-1.5-0.2-3-1-4.4c-0.5-0.9-0.9-8.4-1.1-10.5s-0.2-4.2,1-5.1s1.5-1.9,2.5-2.8
                                    c0.4-0.4,0.9-0.7,1.4-1c0,0-2.1-3.6-3.1-4.8s-4.2-3-5-1.5s-2.4,2.1-3.4,2.6s-1.5,0.6-2.4,0.1c-1.3-0.5-2.6-0.8-4-1
                                    c-0.7-0.2-1.1-0.8-1.1-1.5c0-1.2-2.6-4.1-0.9-5.2s1.6-1.4,1-2.9s-3.6-3.8-4.4-5.2s-2-2.5-1.9-5.1s0.1-4,0.1-4.8s-0.1-1.6-1.4-1.5
                                    s-2.6,0.1-3.1,0.1s-0.9-0.1-1-1.1s-1-3.5-2.4-3.4s-2.7,0.1-4.1,0c-0.7-0.4-1.3-1-1.8-1.6c-0.8-1-3.6-2.9-4.8-4.6s0.1-2.5-1.2-2.9
                                    c-1.2-0.2-2.4-0.8-3.2-1.6c-1.2-1.1-2.5-1.4-2-2.8s0.9-2.2-0.2-3.1s-1.1-2-1.5-2.6c-1-1.1-2.1-2.2-3.2-3.2c-0.8-0.8-2.4-1-0.6-2.2
                                    s1.5-4.2,1.5-5.5s0.1-1.6-1.2-3.2s-3.5-4.8-4.5-5.5c-0.9-0.9-1.7-2-2.2-3.1l-2.1-3.7c-0.8,0.6-1.6,1.4-2.2,2.2
                                    c-0.5,0.6-0.6,1.7-1.4,2c-0.5,0-1-0.2-1.5-0.4c-0.8-0.2-1.7,0-2.4-0.4c-1.1-0.7-1.1-2-2.6-2.2c-2.1-0.4-4.2,0.5-6.4,0.3
                                    c-1.2-0.1-2.3-0.6-3.4-0.8c-0.6-0.1-1.4,0-2-0.1c-1-0.1-2-0.3-3.1-0.4c-0.8,0-1.6,0.1-2.4,0.2c-2.6,0-5.3-0.2-7.9-0.5
                                    c-0.6-0.1-1.2-0.1-1.8,0.1c-0.2-0.3-0.4-0.5-0.7-0.7c-1.1,0.1-2.2,0.3-3.2,0.6c-0.3,0.2-0.5,0.4-0.7,0.7c0.1,1.8,0.3,2.3-0.5,4
                                    c0.2,1.9,0.2,3.9-1.1,5.4c-0.4,0.5-1,0.8-1.4,1.3c-0.5,0.8-0.7,1.7-0.9,2.6c-0.2,0.6-0.3,1.2-0.3,1.8c-0.1,2.4,1,1.9,1.9,3.5
                                    c0.2,0.5,0.4,1,0.5,1.5c0.2,0.6,0.8,1,1.1,1.6c0.5,1.1,0.9,2.3,1.4,3.4c0.3,0.7,0.8,1.3,1.2,2c0.4,0.4,0.6,1,0.7,1.5
                                    c0.1,1.6-0.2,3.2-0.8,4.6c-0.7,2.1-1.5,1.2-2.1,2.4c-0.5,1-0.2,2.5-0.9,3.4c-0.5-0.7-0.9-1.6-0.9-2.5c0.1-0.6,0.1-1.2,0.1-1.9
                                    l-0.3-0.2c-0.8,0.5-1.1,2.3-0.9,3.1c0.5,1.3,1.1,2.5,1.7,3.7c0.1,0.3,0.2,0.7,0.3,1c0.2,0.7,0.5,1.4,0.7,2.1c0.5,1.6,0.5,5-0.3,6.5
                                    c-2,1.4-3.5,1.8-4.9,4c-0.5,0.9-0.7,2.1-1.3,2.9s-1.9,1.2-2.2,1.9s-0.1,1.6-0.9,2.3c-1.1,1.5-0.2,2-0.6,2.8l-0.4,0.3l-0.6-0.2
                                    l-0.5,0.2c-0.6,0.8-0.6,2-1.5,2.6c-0.2,0.5-0.2,1.2-0.4,1.7c-0.5,1.3-1.3,2.1-1.5,3.5c-0.1,0.5-0.1,1.2-0.4,1.6l-0.6,0.1
                                    c-0.5,0.5-0.8,1-1.1,1.6c-0.3,0.4-0.8,0.6-1,1.1c-0.2,0.6-0.3,1.1-0.4,1.7c-0.3,1.1-1.3,2-1.9,2.9c-0.3,0.5-0.4,1-0.6,1.5
                                    s-1.1,0.7-1.5,1.2c-0.4,0.6-0.7,1.2-1,1.8c-0.5,0.8-1.4,1.4-1.9,2.2s-0.2,1.9-0.2,2.9l-0.6,0.1c-0.9-0.2-0.7-1.1-1.3-1.5l-0.5-0.1
                                    c-0.7,1.2-1.3,2.5-1.6,3.9c0.1,0.3,0.3,0.6,0.4,0.9c-0.2,1.4-0.5,2.7-0.9,4l-0.4,0.3c-0.1-0.3-0.2-0.7-0.4-1c-1.1,0.7-0.7,2-1.1,3
                                    c-0.1,0.4-0.3,0.8-0.5,1.2c-0.9,2.1-2,2.9-3.3,4.5c-0.8,1.1-1.4,2.4-2.3,3.4c-0.5,0.4-0.9,0.9-1.3,1.4c-0.5,0.9,0.1,2.1-0.3,3
                                    l-0.5,0.2c-0.3-0.6-0.6-1.2-1.1-1.7c-0.6,0.7-0.8,2.2-1.1,3.1c-0.1,0.3-0.3,0.6-0.4,0.9c-0.3,0.7-0.3,1.5-0.6,2.3s-1,1.3-1.4,2.1
                                    c-0.7,1.5-1,3.2-1.6,4.8c-0.6,1.3-1.1,2.6-1.5,4c-0.3,1.4,0.6,5-0.5,5.8c-0.3,1.4-0.1,2.8,0.6,4c0.3,0.4,0.6,0.8,0.9,1.2
                                    c0.2,0.5,0.3,1,0.6,1.5c0.3,0.5,1.1,0.8,1.4,1.3s0.1,0.9,0.6,1.3s1.2,0.5,1.6,1.1c0.6,0.9,0.1,3.6,1.6,3.7l0.8,0.8l-0.2,0.5
                                    c0,0.7,1.3,2.1,2,1.9l0.4-0.2l0.5,0.1c0.4,0.6,0,2.3,0,3c0,1,0.3,1.9,0.4,2.9c-0.1,1.3-0.2,2.5-0.5,3.8c-0.2,1.3-1.1,2.2-1.5,3.4
                                    c-0.7,2.5-1.2,5.1-1.5,7.6c0,1.6,0.7,3,0.9,4.5c0,1-0.1,2.1-0.3,3.1c0,2,0.3,4,0.7,6c0.1,0.6,0.1,1.2,0.2,1.8
                                    c0.2,0.8,0.6,1.6,0.9,2.5c0.4,1.2,0.2,2.4,0.4,3.6s1,2.3,1.2,3.5c0.2,1.4,0.1,3,0.2,4.4c0.3,2.4,0.8,4.3,0.5,6.8
                                    c-0.1,0.8-0.3,1.6-0.5,2.3c-0.2,0.3-0.3,0.7-0.4,1c-0.4,2.8,0,5.6,1.1,8.2c0.9,2.1,2.2,4.1,3.8,5.8c0.7,0.7,1.5,1.2,2.1,2
                                    s0.4,1.6,1,2.3c0.8,1,3.2,3.6,3.6,4.6s-0.1,1.7,0,2.5c0.1,0.4,0.3,0.8,0.4,1.2c0.3,0.5,0.6,1,1,1.4c0.5,0.7,0.9,1.4,1.2,2.2
                                    c0.5,0.9,0.5,2,1,3c0.4,0.3,0.9,0.5,1.4,0.6c0.3,0.4,0.5,0.9,0.6,1.5l-0.3,0.2l-0.3-0.3l-0.6-0.1c-0.2,0.9,0.9,1.8,1.2,2.7
                                    c0.5,1.4,0.5,2.9,1.1,4.3c1.4,3.6,2.5,4.1,2.1,8.5c0,0.6,0,1.3-0.1,1.9l-0.3,0.3l-0.3-0.3c-0.4-0.1-0.7,0-1,0.2L99,689
                                    c1,2.1-1,2.9,0.8,6.5c0.2,0.3,0.4,0.5,0.6,0.8c0.1,0.3,0.3,0.6,0.4,0.9c0,0.4-0.1,0.7-0.3,1.1l-0.5,0.2c-0.9-0.2-1.3-2.3-1.6-3.1
                                    l-0.3-0.1c-0.1,1.4,0.2,1.9,0.2,3.1c0,1.3-0.2,2.8-0.2,4.1c0.1,1,0.5,1.9,0.6,2.8s-0.6,1.8-0.2,2.8c0.4,0.3,0.6,0.8,1,1.1
                                    c0.1,0.9,0.3,1.8,0.7,2.7c0.3,0.4,0.7,0.5,1,1c0.3,0.7,0.1,1.5,0.4,2.3C104,715.3,105.2,717.1,106.6,717.3L106.6,717.3z" />
                                <path class="st0 fill-white" id="ALAOTRA_MANGORO" d="M534.4,583.4c-1.5,0.9-1.4,1.7-1.2,3c0.1,1.2,0.5,2.3,1.1,3.3c0.8,1.6,0.6,1.7-0.3,1.7
                                    c-1.1-0.1-2.2,0.3-3.1,0.9c-1.5,0.9-1.5,0-3.1-1.1s-2,0.6-2.6,2.2s-1.5,1.6-2.9,2.4s-0.3-2.4-1.1-3.3s-2.5,0.6-2.5,2
                                    s0.5,3.8,0.5,5.3s3,1.3,4.8,1.3s0.6,1.1,0.6,2.8s0.6,3.3-1.1,4.5s0.2,1.1,0.9,1.9s1.9,0.6,2.8-0.9s1.7,0,3,1.3s0.9,2,0.2,3.1
                                    s-0.9,1.3-0.2,2.4s0.8,3.5,0.8,5c0.1,1.3-0.8,2.4-2,2.7c-1.3,0.3-2.4,1-3.2,2c-0.9,1.1-1.7,1.1-3.7,1.1s-4.7,0.3-5.4,1.4
                                    s-2.6,0.6-3.1-0.2s-3.3-1.1-4-1.7s-1.1,0-1.1,1.1c-0.1,1.2-0.3,2.3-0.6,3.5c-0.2,0.8-1.7,2-2.8,3.3s-1.1,2.3-3.4,4.4
                                    s-1.2,5.5-0.6,6.8s1.2,1.7,1.2,2.4s0,4.4,1.1,5.8s0.8,3,0.9,4.2c0.1,1.4-0.3,2.8-1.1,3.9c-0.8,0.9-1.1,1.6-1.1,3.8s0.6,2.3,1.2,2.8
                                    c0.7,0.5,1.4,1.2,2,1.9c0.9,1.1,0.2,2.3-0.6,3.5s-0.3,1.3,0.6,1.9c0.9,0.6,1.7,1.3,2.5,2c0.8,0.6,0.3,2.2-0.9,2.8s0.5,3,0.5,3
                                    s1.7,0,3.1,0.2s2.2,2,2.8,2.8s0.8,2.7,0.8,4.1s-0.2,1.9-0.9,2s-0.6,1.1-0.6,2.5s0.5,1.7,2.3,1.9s2.2,2.5,2.5,3.1s1.1,4.4-0.2,6.3
                                    s-0.2,1.9,1.4,2.4s1.1,2.2,0,3.5s0.3,2.2,0.6,3.1s1.2,0.9,2.9,0.9s1.5,1.1-0.6,2.3s-1.2,1.1-1.4,2.4s-1.5,1.3-1.7-0.3s-0.5-1.1-2-2
                                    s-2.2-0.8-3.2-0.2s-3.1,1.9-2.5,2.3s0.5,3,0.5,4.2s0.3,2.7,0,3.1s-1.9-0.2-3.6-0.2c-1.5-0.1-2.9,0.7-3.7,2c-1.1,1.4-0.2,3.5-0.2,5.2
                                    s-1.5,1.6-3.3,1.7c-1.6,0.2-3.1-0.2-4.5-1s-2.8-0.8-3.6-2s-2.3-0.2-2.3,1.2s-0.3,3.5,0.2,4.9c0.4,1,0.5,2.2,0.2,3.3s0.9,1.9,1.1,3.5
                                    s0,1.7,1.2,3.1s0.6,2.3,0.5,4.4s-0.9,0.9-2,0.9s-3.2,0.2-5,0.3s-1.7,0.6-1.2,1.4c0.4,0.7,0.7,1.5,0.6,2.3c0,0.9-0.2,4.1-1.1,5.2
                                    s-0.5,3.9-0.6,6.1s-0.9,1.4-1.4,2.8s0.2,1.9,1.9,1.9s0.8,0.9,0.2,2.2c-0.4,1-0.6,2.1-0.7,3.2c-0.3-0.1-0.7-0.1-1-0.1
                                    c-0.2,0-0.3,0-0.5,0c-0.6-0.4-0.5-1-1.6-1.4l-0.4-0.1c-2.2-0.7-2.4-2.9-5.9-1c-2.5,1.3-4.6,1.8-7.4,0c-1-0.7-1.1-1.5-2.8-2.3
                                    c-1.2-0.5-3-3.8-4.2-5.2l-2-0.1c-1.2,1.2-1,3.3-1.2,4.8v0.3c-2.5-0.7-5.1-0.8-7.7-0.4c-4.1,0.6-2.6,2-3.9,3.9
                                    c-3.4,0.4-2.3-6.2-5.7-7.6c-0.1-1.6-0.2-3.2-0.1-4.9c-0.1-1-0.2-2.1-0.1-3.2c0.3-0.4,0.8-0.5,1.2-0.9c0.7-0.9,1.1-2,0.9-3.1
                                    c-0.4-2.4-0.8-3.7-0.2-5.1c0.4-0.8,0.8-1.6,1.4-2.3c0.6-0.6,1-1.4,1.3-2.2c0.2-0.8-0.6-2,0-2.9c1-1.1,3.3-3.2,3.6-4.7
                                    c0.8-3.5,0.7-4,0.6-7.8c0-0.9,1.3-2.1,0.9-3c-0.5-0.5-0.8-1-1.1-1.7c-0.1-0.8,0.7-1.3,0.7-2.1c0.1-1.9-1.3-3.2-1.2-4.9
                                    c0.1-1.2,1-2,0.5-3.4c-0.3-0.6-0.6-1.2-0.9-1.8c-0.5-0.9-0.8-1.9-1.3-2.8c-1.3-2.5-2.4-3.1-1-5.9c0.4-0.7,2-3.5,2.1-4.2
                                    c0.1-0.9-0.8-1.9-0.1-2.9c1.4-2,2.3-2.6,1.4-4.8c-0.1-0.3-0.2-0.7-0.2-1c1.2-1.6,0.6-2.8,0.7-4.6c0-1.3,0.2-2.6,0.3-3.8
                                    c0.1-0.8-0.8-3-0.9-4.1c-0.4-3.1-0.4-6.2-0.6-9.4c0-0.2,0-0.4,0.1-0.6c0.4-1.2,0.8-2.5,1.1-3.8c0.1-0.6,0-1.4,0.1-2s0.4-1.5,0.6-2.2
                                    c0.3-1.2,0.8-2.4,1.3-3.6c2.9-6.4,1.4-5.2,1.5-11.6c0-1.2,1-2.6,1-4.3c0-0.5-0.2-0.9-0.2-1.4s0.1-0.8,0.1-1.2s-0.1-1-0.1-1.5v0.3
                                    c0.4-1.6,2-2.7,3.3-3.6c0.3-0.6,0.4-1.2,0.3-1.8c-0.2-1.4-1.3-2.2-1.6-3.6c-0.3-1.7,0.3-2.7,0.2-3.7s-2.1-3-2.4-5.1
                                    c-0.1-0.6-0.1-1.3-0.1-1.9c0-1,0.9-2.7,0.7-3.5c-0.4-1.8-1-2.8-0.7-4.8c0.1-1.1,1.2-2,1.2-2.7s-0.6-1.2-0.9-1.8
                                    c-0.7-1.4-0.5-3-1.1-4.3c-0.3-0.6-0.9-1-1-1.8s-0.2-1.7-0.2-2.5s0.2-2.7-0.8-3.3c-0.6-0.4-1.4-0.4-2-0.8c-0.4-0.2-0.8-0.7-1.2-0.9
                                    l-1.8-1c-0.6-0.3-0.6-2.5-0.9-3l0.1-0.3c0.7-2.1,1.2-1.8,2.7-3.2c0.3-0.3,0.2-0.8,0.3-1.1c0.5-1.6,1.8-2.8,2.7-4.2
                                    c1-1.7-0.8-3.3-0.1-5.2c0.3-0.9,2.2-1.7,2.7-2.8c0-0.2,0-0.5,0-0.7c-0.2-1-0.3-1.9-0.4-2.9c0-1.8,3-3.3,4.5-1.9h0.5
                                    c0.3-0.1,0.5-0.5,0.7-0.7c1.1-1.6,1-2.4,1.2-4.3c0,0-3.9-1.7-5.3-3.1s-5-2.2-5.8-3.9s-1.9-1.7-1.6-4.7s0.3-6,2.7-6.1
                                    s4.7-0.6,5.3-1.7c0.6-1.3,2-2,3.5-1.9c1.3,0.1,2.6,0,3.9-0.1c0.7-0.4,1.4-0.9,2-1.4c0.1-0.6-0.1-1.2,0.2-1.8
                                    c0.3-0.4,0.5-0.9,0.7-1.4c0-0.9,0-1.7,0.2-2.5c0.8-1.5,2.3-1.8,2.6-2.2s0.3-1,0.5-1.5c0.5-0.7,0.9-1.6,1.1-2.5
                                    c-2.1-3.7-0.5-2.9,1.2-5.1c0.5-0.8,1-1.6,1.3-2.4c0.6-1.1,1.9-2.4,1.2-3.8c-0.9-1.9-1.4-2.2-0.8-4.2c-0.1-0.5-0.6-0.8-0.8-1.2
                                    c-0.4-1,0.3-2.5,0.3-3.6l-0.2-0.5c-2.2-1.9-4.5,2-8.7-4.5c-0.8-0.9-1.4-2-1.9-3.1c-0.3-1.1,0.7-1.8,0.5-2.7l-0.3-0.4
                                    c-0.5-0.1-0.9-0.4-1.3-0.8c0.2-1.7,1.8-2.3,1.7-4.4l-0.1-0.3c-0.5-1.2-2.1-1.2-3-2c-0.4-0.3-0.5-1.4-0.9-1.9
                                    c-0.5-0.7-2.1-1.1-2.3-1.8s0.5-1.7,0-2.4c-1-1.5-2.5-1.4-2.5-3.6c-0.3-0.4-0.7-0.7-1-1s-0.3-0.7-0.5-0.9s-0.7-0.5-0.8-0.6
                                    c-0.8-0.8-1.4-1.7-1.7-2.8c-0.6-1.4-0.5-1.8,0.7-2.8c0-0.1,0.1-0.5,0.1-0.5c-0.1-0.8-0.3-1.6-0.4-2.3s0.2-1.3,0.1-2
                                    c-0.1-1.7-0.6-3.3-1.3-4.8c-0.5-0.8-1-1.6-1.5-2.4c-0.2-0.5-0.2-1-0.1-1.5c-0.6-1.2-0.9-2.5-0.9-3.9c0.4-3.1,0.2-4,1.7-6.6
                                    c-0.4-2.3,0.5-2.2,0.5-3.4c0.1-1.5,0-3.1-0.1-4.6c-0.3-2-1.1-2.2-0.8-4.5c0.1-0.3,0.2-0.7,0.4-1c0.3-0.6,0.6-1.2,1-1.8
                                    c0.7-0.9,3-1.9,3.2-3c0.1-0.6-0.6-1.2-0.6-1.9c0.1-0.3,0.3-0.6,0.5-0.8c0.9-0.2,1.1,0.5,1.8,0.9c1.3,0.2,1.4-0.8,2.5-0.9
                                    s2,0.8,3,0.9c0.9,0.1,1.7-0.3,2.4-0.2c1.7,1.5,2,1,3.8,1.2c0.5,0.1,1,0.1,1.5,0.1c0.6-0.2,1.2-0.6,1.8-0.9c0.6-0.1,1.2-0.2,1.8-0.2
                                    c0.7-0.2,1.5-1.1,2.2-1.2s1.2-0.1,1.8-0.2c0.9-0.2,1.8-0.5,2.7-0.7c1.6-0.2,1.9,1.1,3.9,0c2.1,0.1,3.5,3.5,4.2,4
                                    c1,0.6,1.3,0.3,2,1.5c1.4,0.8,3,0.4,3.6,1.2c0.5,1-0.4,2.6,0.6,3.5h0.5c0.7-1.1,1.8-0.2,2.7-0.4c0.8-0.1,2.5-0.9,3.2-0.3l1.8,1.5
                                    c0.9,0.8,1.8,3,2.5,3.6c0.8,0.6,1.7,1.1,2.6,1.5c0.5,0.2,1.1,0.2,1.6,0.4c1.7,0.7,5.2,2.2,5,4.6l0.3,0.4c0.6,0.2,1.2,0.6,1.8,1
                                    l0.2,0.5c-0.1,0.2-0.1,0.5,0,0.7c0.1,1.6,0.5,1.1,1.1,2.4c0.3,0.6,0,1.3,0.1,1.9c0,0.2,0.3,0.9,0.3,1.1c0,0.4-0.3,0.8-0.3,1.3v0.4
                                    c0.4,0.9,1.1,1.7,1.9,2.2c1.5,3.3-3.7,5.2-2.4,10.8c0.2,0.9,6.1,1.8,6.6,2.6c0,0,8-0.8,8.9-1.4s3.4-2.5,4.5-2.3c0.2,0,1,0.2,1.2,0.2
                                    c0.7-0.1,1.4-0.7,2.2-0.4c0.9,0.5,1.9,0.9,3,1.1c1.1-0.1,2.2-0.4,3.2-0.8c0,0-0.7,4.8-2.5,6.1s-1,2-1,4s-0.2,2.2-2.2,3.2
                                    s-0.8,1.8-2.8,6s-1,1.8,0.2,4s1,2,0.5,3.8c-0.3,1.6-0.4,3.3-0.2,5c0,1.5-0.2,3-1.8,3.8s-1.5,3.5-1.5,3.5s-0.5,4.5-0.2,5.7
                                    s1.2,2.8,1.4,3.5s-0.5,11.9-0.6,12.7s-0.9,1.9-0.9,2.8s-0.5,8.3-0.5,8.3s2.2-0.7,2.8-0.9c0.6-0.3,1.2-0.6,1.7-1c0,0,0.6,2.7,0.8,3.8
                                    s-0.3,1.9-1.9,2.2s-1.1,3.3-0.3,4.4s0.2,1.4-1.4,2s-1.4,1-1.1,2s1.4,1.6,1.4,3s-1.9,1.3-4,1.7s-2.2,1.4-2.3,3.2s-1.5,2-3.6,2.2
                                    s-1.5,3-1.1,4.5s0.5,1,2,1.1s4.2-0.3,5-1.4s3.1,0,4.3,0.2s1.1,0.5,1.2,1.6c0.1,1.2,0.4,2.4,0.9,3.5c0.5,0.7,0.6,1.7,0.2,2.5
                                    c-0.4,1-0.4,2.1,0,3.1C535.7,581.1,536,582.3,534.4,583.4L534.4,583.4z" />
                                <path  class="st0 fill-white" id="ANALAMANGA"
                                    d="M312.5,584.2c-0.1,1.8,2.6,1.8,3.4,2.5s1.1,3.1,1.9,5.1s1.4,5.1,1.8,5.8s3.1,2.1,3.2,3.5
                                    c0.3,1.5,0.8,3,1.4,4.5c0.2,0.9,2.1,2,2.4,3s-0.1,4.9-0.2,6.6s1,2.2,1.6,5.4s2.6,7.4,3,8.8s4,5.9,4.8,6.6c0.7,0.6,1.2,1.4,1.2,2.4
                                    c0.3,2,1.6,3.8,3.5,4.6c2.6,1.2,1.4,1.1,1.8,2c0.4,0.8,1,1.5,1.8,2c0.9,0.8,2.4,0.5,4,0.6s5.3,2.5,5.3,2.5c0.1,0.8,0.2,1.5,0.4,1.9
                                    c1.1,5.6,1.7,6.5,5.8,9.7l0.3,0.2v0.6c0.2,2,2.7,7.3,4,8.8c0.9,1,2,1.6,3.3,1.8c0.5,0.1,1.1,0.3,1.6,0.6c0.9,4.9,2.6,2.3,5.6,3.8
                                    c2.5,1.3,3,0.9,5.8,0.7c2.4-0.2,2.2,3.1,5.1,2.7l0.4-0.1h0.2l0.1,0.5c0.6,3.7,3.5,4.2,6.7,4.2c0.2,0,0.2-0.1,0.4,0
                                    c0.6,0.4,0,0.7,0,0.7l0.6,1.4c0,0-0.9,0.8-1.4,1.1s-0.2,2.5-0.1,3.4s2.4,0.5,3.8,0.5s4,2,4,2c0.9,0.9,1.6,2,2.1,3.1
                                    c0.6,1.5,1,1.9,1,2.4s1.8,4.1-0.9,6.4s0.8,2.8,2,2.9s0.4,4.5,0.2,5.4c0.8,0.4,1.7,0.1,2.2-0.6c0.9-1.2,2.2-0.6,3.9-0.4
                                    s2,1.1,1.1,2.5c-0.6,1-1.1,2-1.6,3c-0.4,0.9-0.7,1.9-0.9,2.9c0,0.6-0.9,1.1,1.2,1.8s2,1.2,2,2.4s2.4,3.6,1,5s-1.4,1-0.1,2.9
                                    c1.1,1.4,1.9,2.9,2.6,4.5c0.2,1,2.9,2.9,4.5,4.1s3.2,1,4.6,0.9s2.9-0.4,3.6,0.8s4.8,2.8,5.6,4.2s1.5,2.4,2.4,2.4s2.8-0.1,3,0.6
                                    s1.3,3.1,1.3,3.1c0.4-0.8,0.9-1.6,1.4-2.3c0.6-0.6,1-1.4,1.3-2.2s-0.6-2,0-2.9c1-1.2,3.3-3.3,3.6-4.7c0.8-3.5,0.7-4,0.5-7.8
                                    c0-0.9,1.3-2.1,0.9-3c-0.5-0.5-0.8-1-1.1-1.7c-0.1-0.8,0.7-1.3,0.7-2.1c0.1-1.9-1.3-3.2-1.2-4.9c0.1-1.2,1-2,0.5-3.4
                                    c-0.3-0.6-0.6-1.2-0.9-1.8c-0.5-0.9-0.8-1.9-1.3-2.8c-1.3-2.5-2.4-3.1-1-5.9c0.4-0.7,2-3.5,2.1-4.2c0.1-0.9-0.8-1.9-0.1-2.9
                                    c1.4-2,2.3-2.6,1.4-4.8c-0.1-0.3-0.2-0.7-0.2-1c1.2-1.6,0.6-2.8,0.7-4.6c0-1.3,0.2-2.6,0.3-3.8c0.1-0.8-0.8-3-1-4.1
                                    c-0.4-3.1-0.4-6.2-0.5-9.4c0-0.1,0.1-0.5,0.1-0.6c0.4-1.2,0.8-2.5,1.1-3.8c0.1-0.6,0-1.4,0.1-2c0.2-0.7,0.4-1.5,0.6-2.2
                                    c0.3-1.2,0.8-2.4,1.3-3.6c2.9-6.4,1.4-5.2,1.5-11.6c0-1.2,1-2.6,1-4.3c0-0.5-0.2-0.9-0.2-1.4s0.1-0.8,0.1-1.2s-0.1-1-0.1-1.5V642
                                    c0.4-1.6,2-2.7,3.3-3.6c0.3-0.6,0.4-1.2,0.3-1.8c-0.2-1.4-1.3-2.2-1.6-3.6c-0.3-1.7,0.3-2.7,0.2-3.7s-2.1-3-2.4-5.1
                                    c-0.1-0.6-0.1-1.3-0.1-1.9c0-1,0.9-2.7,0.7-3.5c-0.4-1.8-1-2.8-0.7-4.7c0.1-1.1,1.2-2,1.2-2.7s-0.6-1.3-0.9-1.8
                                    c-0.7-1.4-0.5-3-1.1-4.3c-0.3-0.6-0.9-1-1-1.8s-0.2-1.7-0.2-2.5s0.2-2.7-0.8-3.3c-0.6-0.4-1.4-0.4-2-0.8c-0.4-0.2-0.8-0.7-1.2-0.9
                                    l-1.8-1c-0.6-0.3-0.6-2.5-0.9-3l0.1-0.3c0.7-2.1,1.2-1.8,2.7-3.2c0,0-2.1-4.4-2.4-5.5s-1.6-1.9-5.8-3.1s-3.5-0.3-5-0.2
                                    s-2.5,0.8-5.6,0s-4.1,4.2-4.1,4.2v2c0,0.8-0.5,1.9-4.7,2.7c-2.4,0.4-4.7,1.5-6.4,3.2c-0.8,1-2.2,2.1-3.5,1.6L407,592l-1.7,0.4
                                    l-0.9,0.4c-1.5-0.6-4.9-0.4-5.1-1.8c-0.6-3.5-2.2-2.8-4.6-4.1c-1-0.5-1.7-1.5-1.9-2.5c-0.3-1.9-1.4-2.8-0.3-4.9v-0.3
                                    c-0.2-0.6-2.4-1.5-2.9-1.7c-0.6-0.2-1.2-0.3-1.8-0.3c-0.3-0.1-0.6-0.3-1-0.4c-1.1-0.4-2.3-0.6-3.5-0.5c-1,0.4-2,0.8-3,1.1
                                    c-0.4-0.3-0.8-0.5-1.3-0.6c-2.1-0.2-1.8,0.7-3.2,1.6c-0.2,0.1-0.9,0.4-1,0.5c-0.6,0.5-0.9,1.2-1.6,1.5c-1.7,0.7-3.8,0-5.5,0.8
                                    c-0.6,0.4-1.1,0.8-1.5,1.3c-0.2,0.2-0.6,0.3-0.8,0.5c-0.9,0.9-1.2,3.3-2.4,4.5l-0.9-0.1c-0.1-1.1-0.5-2.1-1-3.1
                                    c-3.3-1.2-7.9-0.9-11.2-0.5l-0.9-0.5c-0.2-1.5,1.1-2.8,0.8-4.3c-0.5-2.1-1.2-3.2-1.2-5.4l-0.7-0.5c-0.4,0.5-0.9,1-1.5,1.2l-1.9-0.8
                                    l-0.5,0.7v0.7l-0.8,0.6c-2.1-1.1-2.8,0-3.7-0.3c-0.3-0.1-0.6-0.3-0.9-0.5c-1.2-0.6-5-1.4-6.3-1c-0.6,0.2-1.2,0.7-1.9,0.8
                                    c-1.1,0.3-2.2,0.3-3.3,0.7c-0.5,0.1-0.7,0.7-1.8,0.9c-1.7,0.3-2-0.6-3.3-0.3l-0.7,0.7c-1.6,0-3.1-0.2-4.6-0.7
                                    c-0.2-0.6-0.7-1.2-1.3-1.5c-0.9,0.6-0.6,1.9-1.6,2.5c-0.7,0-1.4,0.3-1.9,0.8C312.3,579.9,312.4,582.1,312.5,584.2L312.5,584.2z" />
                                <path  class="st0 fill-white" id="ANTSINANANA" d="M444.8,779.4c1.3-2-0.2-3.4,3.9-3.9c2.6-0.5,5.2-0.4,7.7,0.4v-0.3c0.2-1.5,0-3.6,1.2-4.8l2,0.1
                                    c1.2,1.4,3,4.7,4.2,5.2c1.7,0.7,1.7,1.6,2.8,2.3c2.8,1.8,4.9,1.3,7.4,0c3.5-1.8,3.8,0.4,5.9,1l0.4,0.1c1.1,0.4,1,1,1.6,1.4
                                    c0.2,0,0.3,0,0.5,0c0.3,0,0.7,0,1,0.1c0-1.1,0.3-2.1,0.7-3.2c0.6-1.3,1.5-2.2-0.2-2.2s-2.3-0.5-1.9-1.9s1.2-0.6,1.4-2.8
                                    s-0.3-5,0.6-6.1s1.1-4.2,1.1-5.2c0-0.8-0.2-1.7-0.6-2.4c-0.5-0.8-0.5-1.2,1.2-1.4s3.9-0.3,5-0.3s1.8,1.1,2-0.9s0.8-3-0.5-4.4
                                    s-1.1-1.6-1.2-3.1s-1.4-2.4-1.1-3.5s0.3-2.2-0.2-3.3c-0.5-1.4-0.2-3.5-0.2-4.9s1.5-2.5,2.3-1.2s2.2,1.2,3.6,2s2.9,1.1,4.5,0.9
                                    c1.7-0.2,3.2,0,3.2-1.7s-0.9-3.8,0.2-5.2c0.8-1.3,2.2-2.1,3.7-2c1.7,0,3.2,0.6,3.6,0.2s0-1.9,0-3.1s0.2-3.8-0.5-4.2s1.4-1.7,2.5-2.3
                                    s1.7-0.8,3.3,0.2s1.9,0.5,2,2s1.5,1.6,1.7,0.3s-0.8-1.1,1.4-2.4s2.3-2.3,0.6-2.3s-2.6,0-2.9-0.9s-1.7-1.9-0.6-3.1s1.5-3,0-3.5
                                    s-2.6-0.5-1.4-2.4s0.5-5.7,0.2-6.3s-0.6-3-2.5-3.1s-2.3-0.5-2.3-1.9s-0.2-2.4,0.6-2.5s0.9-0.6,0.9-2s-0.2-3.3-0.8-4.1
                                    s-1.4-2.7-2.8-2.8s-3.1-0.2-3.1-0.2s-1.7-2.3-0.5-3s1.7-2.2,0.9-2.8s-1.5-1.4-2.5-2s-1.4-0.8-0.6-1.9s1.5-2.3,0.6-3.5
                                    c-0.6-0.7-1.3-1.4-2-1.9c-0.6-0.5-1.2-0.6-1.2-2.8s0.3-2.8,1.1-3.8c0.8-1.1,1.2-2.5,1.1-3.9c-0.2-1.2,0.2-2.8-0.9-4.2
                                    s-1.1-5.2-1.1-5.8s-0.6-1.1-1.2-2.4s-1.7-4.7,0.6-6.8s2.3-3.1,3.4-4.4s2.6-2.5,2.8-3.3c0.3-1.1,0.5-2.3,0.6-3.5
                                    c0-1.1,0.3-1.7,1.1-1.1s3.6,0.9,4,1.7c0.7,0.9,1.9,1.1,2.8,0.4c0.1-0.1,0.2-0.2,0.3-0.3c0.8-1.1,3.4-1.4,5.4-1.4s2.8,0,3.7-1.1
                                    c0.9-1,2-1.7,3.3-2c1.2-0.3,2.1-1.4,2-2.7c0-1.6,0-3.9-0.8-5s-0.6-1.3,0.2-2.4s1.1-1.9-0.2-3.1s-2-2.8-2.9-1.3s-2,1.7-2.8,1
                                    s-2.6-0.6-0.9-1.9s1.1-2.8,1.1-4.5s1.2-2.8-0.6-2.8s-4.8,0.3-4.8-1.3s-0.5-3.9-0.5-5.3s1.7-3,2.5-2s-0.3,4.1,1.1,3.3
                                    s2.3-0.8,2.9-2.3s1.1-3.3,2.6-2.2s1.6,2,3.1,1.1c0.9-0.7,2-1,3.1-0.9c0.9,0,1.1-0.2,0.3-1.7c-0.6-1-1-2.1-1.1-3.3
                                    c-0.2-1.3-0.3-2,1.2-3s1.2-2.2,0.8-3.8c0,0,3.3-1.1,4.3-0.7s1,0.9,2.2,1.5c0.8,0.4,1.6,0.6,2.5,0.5c1.3,0.1,2.5-0.6,3.1-1.7
                                    c0.9-1.5,1.8-2.3,2.6-1.4s3.2,0.6,4-0.8c0.4-0.7,1.3-1.1,2-0.7c0.4,0.2,0.6,0.5,0.8,0.9c0.4,1.1-0.6,2.3,1.3,1.1s3.2-0.8,3.7-0.3
                                    s-1.8,2.2,0,2.6s2.3,0.5,3.4-0.8s0.9-1.5,2.2-1.7s1.9-0.3,1.9-1.7s1.6-3.2,2.5-2.8s2.8,0.3,3.2-0.9s-0.6-2.9,0.2-4s0-4.1,0-5.1
                                    s2-2,2-3.4s1.9-1.4,2.8,0s5.6,2.6,5.6,2.6l5.6,2.2l4.1-0.6c0.1,0.8-0.3,1.7-0.1,2.2l1,0.4c0.1,0.4,0.2,0.8,0.2,1.2
                                    c0.5,0.1,0.9,0.4,1.3,0.8c0.8,1.2-1,8.1-1.6,9.7c-0.3,1-0.9,1.9-1.2,2.9c-0.4,1.5-0.6,3-1,4.5c-0.3,0.8-0.8,1.5-1.1,2.3
                                    c-0.4,1-0.7,2-1.1,3c-0.3,0.6-0.7,1.2-0.9,1.8c-0.1,0.3-1.3,3.8-1.3,4.2c-0.4,2.3,0,4.8-0.5,7c-0.1,0.4-0.2,0.7-0.4,1
                                    c-0.7,1.9-1,3.9-0.9,5.9c0.1,1.7,2.1,2.3,2.3,4.9c-0.6,1.6-3.9,3.3-4.8,5.5c-0.8,2-0.7,4-0.7,6.1c0,1.1-1.1,2.9-1.5,4
                                    c-0.3,1-0.4,2-0.4,3.1c-0.2,2.9-0.1,5.8-1.1,8.5c-0.7,1.7-1.9,3.2-2.8,4.8c-0.4,0.9-0.8,1.8-1.1,2.8c-0.2,0.5-0.5,0.9-0.6,1.4
                                    c-0.6,1.7-1.1,3.4-1.8,5.1c-0.5,1.3-1.1,2.6-1.7,3.8c-0.9,1.4-1.7,2.9-2.4,4.5c-0.5,1.4-0.8,2.9-1.3,4.2c-0.4,1.2-1,2.3-1.4,3.5
                                    s-0.6,2.2-0.9,3.2c-0.7,2-1.7,3.9-2.3,5.9c-0.3,0.9-0.4,1.8-0.7,2.7c-0.5,1.4-1.1,2.7-1.5,4c-0.5,1.7-1.1,3.5-1.8,5.2
                                    c-0.7,1.6-1.4,3.2-2.2,4.7s-1.3,3.2-2.1,4.7c-0.2,0.4-0.6,0.8-0.9,1.2c-0.8,1.3-1.5,2.7-2.1,4.1c-0.5,1.6-1,3.2-1.4,4.9
                                    c-0.1,0.8-0.3,1.5-0.5,2.3c-0.5,1.7-1.5,3.2-1.9,5c-0.6,2.3-0.8,4.8-1.2,7.1c-0.3,1.7-0.7,3.5-1,5.2c-0.6,3.2-2.1,5.7-3.1,8.6
                                    c-0.9,2.5-1.5,5.1-2.9,7.5c-0.2,0.3-0.3,0.8-0.6,1c0,0.2-2.1,5.5-2.4,5.9c-0.6,0.8-1.1,1.7-1.5,2.6c-0.5,1.2-0.9,2.3-1.4,3.5
                                    c-0.8,2.6-1.3,5.3-1.7,8c-0.3,1.7-0.8,3.4-1.2,5c-0.4,2-0.6,4-1,6c-0.3,1.3-0.8,2.5-1,3.9c-0.2,1.6,0.6,4.4,0.5,4.8
                                    c-1,1.4-1.8,2.8-2.5,4.4c-0.4,1.2-0.5,2.6-1,3.7c-0.1,0.2-0.2,0.3-0.3,0.4c-1.1-1.4-0.8-3.7-3.5-3.4l-0.4,0.3l-0.1,0.6
                                    c0.7,2.2,3.4,2.3,3,5.8c-0.1,1.5-1.2,2.5-1.6,3.9c-0.4,1.1-0.4,2.3-0.8,3.4c-0.4,0.9-0.9,1.8-1.4,2.7c-0.7,1.2-1,2.6-1.7,3.8
                                    c-0.5,0.9-1.1,1.7-1.6,2.6c-1.6,3.1-3.1,6.3-4.3,9.5c-0.7,1.6-1.6,3.1-2.2,4.7c-0.2,0.5-0.2,1.1-0.4,1.7c-0.7,1.9-1.9,4.3-2.4,6.2
                                    c-0.7-0.3-5.4-1.8-5.8-1.8c-0.8-0.1-1.7-0.2-2.6-0.2c-2,0-4,0.3-6.1,0.1c-1.1-0.2-2.2-0.5-3.3-0.9c-0.6-0.1-2,0-2.4-0.3
                                    c-2.3-1.8,0.5-4.2-2-6.7c-0.6-0.4-1.2-0.7-1.9-0.9c-0.4-0.2-0.5-1-1.3-1.5c-2.8-0.4-4.4,3-9-0.1c-0.5-0.2-1-0.5-1.5-0.8
                                    c-0.5-0.4-1-0.9-1.4-1.4c-1.2-1.7-1.5-3.9-3.5-4.8c-1.5-0.2-2.9,0.6-3.7,1.8c-0.1,1.2,0.8,1.4,1.2,2.3l-0.2,0.6
                                    c-1.9,1-0.9,2.5-1.5,3.2c-0.4,0.4-1.1,0.8-1.3,1.4s-0.3,2.1-0.5,2.3l-1.7,2.4c-0.8,1.2-1.9,3-1.7,4.4c0.1,0.8,1.2,1.7,1,2.4
                                    c-0.6,1.4-2.8,1.6-3.8,0.7c-2.1-1.7-2.3-3.6-5.7-3.1c-0.9,0-1.9,0.3-2.7,0.8c-0.9,0.6-1.8,1.8-2.4,1.9c-2.1,0.5-4-0.8-5.9-0.3
                                    c-0.9,0.4-1.8,0.9-2.6,1.6c-0.9,0.6-2.6,0.1-3.6,0.3c-0.5,0.2-1.1,0.3-1.7,0.4c-1.3,0-1.9-1.5-2.5-2.4c-0.3-0.5-0.9-0.5-1.3-0.8
                                    c-1.6-1.1-0.9-2-3.8-2.5l-0.7-0.7c-0.4-2.4-1.4-2-1.8-3.5c-0.1-0.4,0.6-2,0.6-3c0-1.2-0.8-2.6-0.9-3.9c-0.1-0.9,0.4-1.4,0.6-2.2
                                    s-0.3-1.6-0.3-2.4c0-1.1,0.7-1.6,1-2.5c0-1.1-0.1-2.1-0.2-3.1c0-0.4,1.3-1.7,1.5-2c0.4-0.6,0.7-1.2,0.9-1.8c0.8-2.2,0.1-4.5,0.3-6.8
                                    c-0.1-1.1-1.4-1.7-2.3-1.9c-1.1-0.3-2.4,0.1-3.2-1l-0.2-0.5c0.3-1,0.8-1.9,1.6-2.5l-0.3-1.4l-0.6-2.6l-1.2-2.5
                                    c-0.5-1.1-0.8-2.3-1-3.5c0-1.2,4.2-2.8,5.5-3.8s5.2-3.8,6.2-4.5c1.1-0.9,2.4-1.6,3.8-2c1.2-0.2,4.5-1.4,4.5-1.4l0.5-1.3l0.3-2.1
                                    c0.4-3-0.3-2.8-0.4-4.8c3.4,1.3,2.3,8,5.7,7.6L444.8,779.4z" />
                                <path  class="st0 fill-white" id="BONGOLAVA" d="M224.6,630.1c0.4,0.2,0.8,0.6,1,1c1,1.7,0.5,2.3,1,3c0.9,0.8,3.6,1.5,2.8,3.2l-1.8,1.7
                                    c-0.4,0.3-0.2,1.3-0.3,1.8c0,0.2-0.5,0.8-0.5,0.9c-0.1,0.9-0.1,1.8-0.1,2.7c0,1.7,1,2.8,1.2,3.7s-0.5,1.7-0.2,2.5
                                    c0.5,1.4,0.9,2.8,1.2,4.2c0.2,1.2-0.8,1.7-0.8,2.6c0,0.5,0.2,0.7,0.3,1.1c0.2,1.3,0.2,2.6-1.1,3.4c-0.9,0.5-1.7,1-2.4,1.7
                                    c-0.6,0.6-0.5,1.7-1.3,2.2s-1.6,0.6-2.1,1.3c-0.3,0.4-0.4,1-0.6,1.4c-0.5,0.7-1,1.3-1.6,1.9c-0.1,0.1-0.2,0.3-0.3,0.4
                                    c-0.4,0.3-0.8,0.6-1.2,0.8c-0.7,0.5-1.1,0.5-1.4,1.4c-0.2,0.7,0.4,1.5,0.5,2.1c0.6,1.8,0.3,4.1,0.7,6.1c0.1,0.7,0.4,1.5,0.5,2.2
                                    c0.4,1,0.7,2,1,3c0.3,2.2-2.7,3.6-2.8,6.9c0.4,1.2,2.6,0.8,3.9,2.3c0,0,0.2,0.4,0.2,0.5c1.2,2.1,1.4,3.9,2.3,5.8
                                    c0.5,1,3.1,1.6,3.9,3.1c0.1,0.8,0.2,1.7,0.1,2.6c0.5,0.9,2.9,1.1,3.9,1.5c1.3,1.5-1.2,3.5-1,5.1c0,0.1,0,0.1,0,0.2
                                    c0.3,1.2,1,1.4,1.7,2.2c1.1,1.3,1.9,3.8,2.8,4.7c0.6,0.6,1.4,0.9,2,1.5c0.5,0.8,1.1,1.4,1.8,2.1l0.5,0.4c1,0.5,2.8-1.2,3.8-1.5
                                    c0.5-0.2,1.1-0.3,1.6-0.4s1.1-0.5,1.6-0.4c0.2,0.2,0.4,0.4,0.5,0.7c0.3,0.8-0.5,1.6-0.2,2.4c0.1,0.5,1,1,1.3,1.3
                                    c0.5,0.6,0,1.6,0.1,2.3c0.2,1.2,0.8,1.4,1.2,2.2c0.4,1.1,0.4,2.4,0,3.5c1.2,3.4-0.1,2.2-0.3,4.9c-0.1,1.1,1.2,2.9,0.2,3.8
                                    c-0.5,0.5-1.7,0.5-2.5,0.9c0,0.1-0.1,1,0.4,1.1c0.6,0.3,1.3,0.5,2,0.6c3.2,0.2,4.1-0.2,5.9-2.2c0.3,0.3,0.4,0.8,0.6,1.1l0.3,0.3
                                    c0.6,0.5,1.5,0.6,2.3,0.4c1.8-0.9,2.7-0.5,4.3-2.4c1.8,0.3,3.5,0.8,4.5-1.4c0.6,0.6,1.5,1.4,2.5,0.9c0.4,1,1,1.2,2.1,1.1
                                    c0.8-0.1,1.5,0.3,2.3,0.2h0.5c2.2-0.2,1.1,2.3,5.5,1.1c1.5-0.4,2-0.8,2.1-1.7c0,0-0.6-1.8,0.7-1.8c0.4-0.2,0.7-0.5,0.9-0.8l0.6-0.8
                                    c0.9-1.1,1.3-1.3,1.2-2.8v-0.5c0.5,0.5,1.2,0.8,1.9,0.8c1.6,0,1.9-1.2,2.5-1.3c4-1.1,0.9-5,4.2-5.5c1.4-0.2,2.7,0.7,3.8-1.1l0.2-0.4
                                    c0.1-0.6,0.1-1.1,0-1.7l-0.2-0.4c-0.2-0.3-0.5-0.6-0.9-0.8l0.3,0.2c0.7-0.6,1-1.5,0.8-2.3v-0.2c3.4-0.7,2.2-3.4,2.1-3.4
                                    c1.7-0.2,1.8-0.7,2.4-2.3c0.8-2,2.7-1.2,3.3-4.7c0.3-2,2.4-0.9,3.5-3.7c1.6-0.9,2.8-1,2.7-3.5c-0.1-1,0-2,0.3-2.9V704
                                    c0.3-0.4,0.6-1,0.6-1.5l0.2-0.1c0.5-0.2,1-0.5,1.3-0.9l0.1-0.3c0.2-0.6,0.2-1.2,0-1.7c0.2,0.1,0.4,0.1,0.6,0.2h0.2
                                    c2.1,0,2.7-2.2,1.8-3.7l0.3-0.1c0.8-0.2,1.4-0.8,1.6-1.5c0.6-1.9,3-3.2,1.7-5.6l-0.3-0.6c0-1.2,0.2-1.4,1.1-1.9
                                    c1-0.6,1.6-1.7,1.4-2.9c-0.1-5.4,1.1-2.6,1.9-5.1c0.9-0.1,1.8-0.6,2.4-1.3c-0.4-1.1-0.8-2.2-1.4-3.3c-0.5-0.8-1.1-0.8-1.4-1.6
                                    s-2-2.6-0.9-2.4c1,0.4,2.1,0.2,2.9-0.5c0.8-0.8,1.4-0.4,4-0.5s3.5-1.4,4.5,0.2c0.6,1.2,1.6,2.3,2.8,3c1.6,0.5,3.3,1,5,1.2
                                    c1.2,0,2.5-0.3,3.6-0.8c0.9-0.4,1.5-1,3.2-0.1s4.2,0.6,5,0.8s2-1.5,2.5-2c0.7-0.6,1.7-1,2.6-1c0.6,0.1,2.5,1,2.5,2.2
                                    s1.6,1.6,1.6,1.6l4.1-0.8c-1.3-0.2-2.5-0.8-3.4-1.8c-1.3-1.5-3.8-6.8-4-8.8v-0.6l-0.3-0.2c-4.1-3.2-4.7-4.1-5.8-9.7
                                    c-0.1-0.5-0.2-1.2-0.4-1.9c0,0-3.6-2.4-5.3-2.5s-3.1,0.1-4-0.6c-0.7-0.5-1.3-1.2-1.8-2c-0.4-0.9,0.9-0.8-1.8-2
                                    c-1.9-0.8-3.2-2.6-3.5-4.6c-0.1-0.9-0.5-1.8-1.2-2.4c-0.8-0.8-4.4-5.2-4.8-6.6s-2.4-5.6-3-8.8s-1.8-3.6-1.6-5.4s0.5-5.6,0.2-6.6
                                    s-2.1-2.1-2.4-3c-0.6-1.5-1-3-1.4-4.5c-0.1-1.4-2.9-2.9-3.2-3.5s-1-3.8-1.8-5.8s-1.1-4.4-1.9-5.1s-3.5-0.8-3.4-2.5
                                    c0-2.2-0.2-4.3-0.5-6.5c-0.9,0.5-1.3,1.3-2.5,1.7c-1,0.3-1.9,0-2.9,0.5s-1.6,1.3-2.6,1.4c-1.2,0.1-4.7-0.3-5.6,0.4l-0.5,0.9l0.1,1.1
                                    l-0.7,0.7c-2.3-0.1-3.6,2.3-6.4,1l-0.9,0.4c-0.2,0.6-0.6,1.2-1,1.7l-1.1-0.2c-0.6,0.3-1,0.8-1.3,1.4c-1.1-0.1-1.8-1-2.9-1.1
                                    c-0.6,0.7-0.4,1.6-0.9,2.4c-1.4,0.3-2.9,0.3-4.3,0.2l-0.4-1c0.6-0.9,0.8-2,0.6-3.1l-0.8-0.5c-0.9,0.5-1.5,1.3-2.3,1.8
                                    c-0.5,0.2-0.9,0.3-1.4,0.4c-1.6,0.3-3.3-0.4-4.2-1.8c-1.6-0.6-3.4,0.1-4.9-0.5s-0.8-2.5-3.1-3.1l-1,0.2c-0.4,0.8-1.1,2-1.6,3.3
                                    c-0.3,0.6-0.4,1.4-0.8,2.1l-0.1,0.2c-0.2,0.3-0.3,0.6-0.3,1v0.3c0.2,0.6,0.6,0.7,0.9,1.1c0,0.2,0,0.5,0,0.7
                                    c-0.7,2.2-1.2,4.4-1.4,6.7c-0.9,0.4-1.7,1-2.3,1.7l-0.1,0.3c-0.3,1.3,0.5,1.8-0.4,3c-1.2,1.6-0.2,3.3-0.9,3.4
                                    c-1.5,0.2-0.7,2.7-1.7,3.8l-0.4,0.4c-1,1.2-1.4,2.3-2,3l-0.3,0.3c-0.9,1-0.8,1.8-0.9,3c-3.1,3.6,0.6,5.7-1.4,6.5l-0.8,0.3
                                    c-0.6,0.2-1.2,0.6-1.6,1.1c-0.7,1.1-1.4,2-2.3,3l-0.6,0.1c-0.8-0.6-1.7-1.1-2.7-1.4c-0.2,0-0.5,0-0.7,0c-0.7-0.2-1.2-0.6-1.7-1.2
                                    l-1-0.1l-1.2,1.5h-0.9l-1-1.7c-0.7-0.2-1.4-0.4-2.1-0.7c-0.6-0.3-0.7-0.9-1.9-0.9c-1,0.1-1.5,1.3-2,1.9c-0.2,0.2-0.6,0.3-0.8,0.5
                                    c-0.7,0.6-1.1,1.6-1,2.5c-0.4,0.6-0.8,1.2-1.4,1.6L224.6,630.1L224.6,630.1z" />
                                <path  class="st0 fill-white" id="ITASY"
                                    d="M404.3,722.4c0,1.1-0.2,2.1-2.2,3.1s-2,1.2-2.4,3.5s-0.8,1-2.4,1s-2.4,0.1-3.1-1.1s-1.9,0-2.5,0.5
                                    s-1.5,1.4-3.8,0.5s-2.1-0.6-3.2,0.6s-0.2,2.5-0.1,4s-1.2,1.9-1.4,3.2s-1.9,1-3.4,1s-1.9-0.8-1.9-1.6s-3.4-0.9-3.4-0.9
                                    s-5.6-0.4-6.5-0.4s-1.4-1.8-1.4-2.5s-0.8-6.2-0.5-7.5s1.1-1.6,0.8-3s-3.5-0.5-4.6-1.2s-3.9,0-4.9,0.6s-7.9,0-9.6-0.1
                                    s-3.6,0.9-3.6,1.8s-1.4,3-2.9,3s-2.5,0.5-2.8,1.8s-0.2,1.5-1.1,2.2c-1.4,1.2-3.2,1.9-5,2.1c-2.1,0.1-4,1.9-6.1,2.6s-3,1.6-2.9,2.8
                                    s-1.1,2.5-2.2,3.4s-4,0-4.4-1s-3.9-0.9-4.8-1.5s-2.8,1.6-3.6,2.2s-1-2-1.6-2.5s-3.2,0.2-4.6,0.8s-5,1.9-6,3.5s-2,0.4-2.6-0.8
                                    s-2.1-0.5-3,0.5s-2.6,1-4.1,0.6s-2.8,0.4-4-0.9l-0.8-0.4c0.4-0.2,0.7-0.5,0.9-0.8l0.6-0.8c0.9-1.1,1.3-1.3,1.2-2.8v-0.5
                                    c0.5,0.5,1.2,0.8,1.9,0.8c1.6,0,1.9-1.2,2.5-1.3c4-1.1,0.9-5,4.2-5.5c1.4-0.2,2.7,0.7,3.8-1.1l0.2-0.4c0.1-0.6,0.1-1.1,0-1.7
                                    l-0.2-0.4c-0.2-0.3-0.5-0.6-0.9-0.8l0.3,0.2c0.7-0.6,1-1.5,0.8-2.3v-0.2c3.4-0.7,2.2-3.4,2.1-3.4c1.7-0.2,1.8-0.7,2.4-2.3
                                    c0.8-2,2.7-1.2,3.3-4.7c0.3-2,2.4-0.8,3.5-3.7c1.6-0.9,2.8-1,2.7-3.5c-0.1-1,0-2,0.3-2.9V704c0.3-0.4,0.6-1,0.6-1.5l0.2-0.1
                                    c0.5-0.2,1-0.5,1.3-0.9l0.1-0.3c0.2-0.6,0.2-1.2,0-1.7c0.2,0.1,0.4,0.1,0.6,0.2h0.2c2.1,0,2.7-2.2,1.8-3.7l0.3-0.1
                                    c0.8-0.2,1.4-0.8,1.6-1.5c0.6-1.9,3-3.2,1.7-5.6l-0.3-0.6c0-1.2,0.2-1.4,1.1-1.9c1-0.6,1.6-1.7,1.4-2.9c-0.1-5.4,1.1-2.6,1.9-5.1
                                    c0.9-0.1,1.8-0.6,2.4-1.3c-0.4-1.1-0.8-2.2-1.4-3.3c-0.5-0.8-1.1-0.8-1.4-1.6s-2-2.6-0.9-2.4c1,0.4,2.1,0.2,2.9-0.5
                                    c0.8-0.8,1.4-0.4,4-0.5s3.5-1.4,4.5,0.2c0.6,1.2,1.6,2.3,2.8,3c1.6,0.5,3.3,0.9,5,1.2c1.2,0,2.5-0.3,3.6-0.8c1-0.7,2.2-0.8,3.2-0.1
                                    c1.8,0.9,4.2,0.6,5,0.8s2-1.5,2.5-2c0.7-0.6,1.7-1,2.6-1c0.6,0.1,2.5,1,2.5,2.2s1.6,1.6,1.6,1.6l4.1-0.8c0.5,0.1,1,0.3,1.5,0.6
                                    c0.9,4.9,2.6,2.3,5.6,3.8c2.5,1.3,3,0.9,5.8,0.7c2.4-0.2,2.2,3.1,5.1,2.7l0.4-0.1h0.2l0.1,0.5c0.6,3.7,3.5,4.1,6.7,4.2
                                    c0.2,0,0.2-0.1,0.4,0c0.6,0.4,0,0.7,0,0.7l0.6,1.4c0,0-0.9,0.8-1.4,1.1s-0.2,2.5-0.1,3.4s2.4,0.5,3.8,0.5s4,2,4,2
                                    c0.9,0.9,1.6,2,2.1,3.1c0.6,1.5,1,1.9,1,2.4s1.8,4.1-0.9,6.4s0.8,2.8,2,2.9s0.4,4.5,0.2,5.4S404.3,721.3,404.3,722.4L404.3,722.4z" />
                                <path  class="st0 fill-white" id="VAKINAKARATRA"
                                    d="M417.2,803.3c-1.1,0.4-2.4,0.2-3.6,0.5c-0.9,0.4-1.8,0.9-2.6,1.5c-0.5,0.3-1,0.4-1.4,0.7
                                    c-0.9,0.5-1.6,1.4-2.7,1.4l-0.3-0.3c-0.1-1.7-0.5-2.1-2.1-2.7l-1.2,0.2c-1,0.5-0.2,1.8-1.9,2.9c-1,0.3-3-0.7-3.8-1
                                    c-1.1-0.3-2.3-0.5-3.4-0.8c-1.5-0.4-1.5-2.4-4.2-1.6c-0.3,0.1-0.6,0.3-0.9,0.4s-1.3,0.2-1.5,0.5s-1.7,2.5-2.2,2.6
                                    c-2.1,0.3-1.6-1.9-2.7-2.8c-0.4-0.1-0.8-0.2-1.2-0.1c-0.4,0.3-0.6,0.8-1,1.1c-1.1,0.9-1.9,0.6-2.9,2.6c-0.2,0.8-0.2,1.6-0.1,2.4
                                    c-0.1,0.6-0.2,1.1-0.4,1.7c-0.1,0.7,0.1,1.7-0.4,2.4c-1,0.2-1.4-0.9-2.6-0.6s-3.2,1.7-4.2,2c-1.4,0.3-2-0.7-4.6,0.1
                                    c-1.1,0.4-2.8,1.7-3.9,1.6c-1.4-0.1-3.2-2.5-4.5-2.5c-1,0-1.6,1.3-2.5,1.6c-0.4,0.7-0.9,1.5-1.4,2.1c-0.2,0.2-0.6,0.4-0.8,0.6
                                    c-0.7,0.7-1.2,1.6-1.9,2.3s-1.5,1.2-2.2,1.9c-0.4,0.4-0.7,1.2-1.3,1.5c-0.8,0.4-1.9,0.7-1.9,0.7c-0.1-0.5-0.2-1.2-0.8-1.3
                                    c-1.8-0.3-1.6,0-2.3,1.8h-1.6c-0.5,0-0.9,0-1.4-0.1c-0.8-0.6-2.1-2.6-3-2.2c-1.9,0.9-0.8,1-2.1,2.1c-0.8,0.3-3.1,0.7-3.8-0.2
                                    l-0.3-0.4c-0.5-0.6-1.2-1-2-1h-0.3c-1.4-0.3-2.8-0.8-4-1.6c-2.9-1.4-3.5,0.2-4.6,2.5c-0.9,0.7-3.2,0.6-3.8,0
                                    c-0.2-0.8-0.6-2.1-1.8-2.2c-2.2-0.1-2.9,0.4-4.5-0.9c-3.3-2.7-6.3,1.2-8.2,1.1c-2-1.8-3.8-1.4-6-2.2l-1-1.4c-0.5-0.7-2.4-0.5-3-3.1
                                    l0.2-0.6c0.5-0.3,1.6-0.4,1.9-0.7c1.2-1.4,1.1-2.2-0.5-3.3c-0.1-0.6-0.3-1.2-0.5-1.7c1.4-0.5,1.6-1.5,1.2-2.8
                                    c-1-4.4-1.9-3.4-4.5-5.3c-0.6-0.5-1.8-2.3-2.7-1.6c-1.6,1.3-0.6,1.1-1.5,2.7c-0.3,0.2-0.7,0.4-1,0.5c-2.8,1.2-1.9,2.1-3.5,3.5
                                    c0.1-1.2,0.1-2.3-0.1-3.5l-0.2-0.3c-0.8-0.7-1.7-1.2-2.8-1.2c-3.8-0.8-2.3-3.3-3.2-6c-0.2-0.7-0.7-0.9-1.2-1.1
                                    c-0.5-0.3-1-0.5-1.6-0.5c-0.9,0.1-1.7,0.1-2.6,0c-1.8-3.6-4.7-2.7-7.8-2.2c-1.3,0.2-4.1-1.2-5.3-1.9c-3.2-2.1-4.6,0.8-5.8,0.4
                                    c-0.7-0.2-4.8-3.5-5.5-3.6l0.1-0.2c3.9-2.4,2.2-5.4,3.4-6.8c0.9-1,2.1-1.5,2.7-2.8s0.8-5.2,0.5-6.7c-0.1-0.7-0.9-1.2-0.8-1.9
                                    c0.2-1,0.2-2.1,0-3.1c-0.4-0.9-0.9-1.8-1.4-2.7c-0.4-0.8-0.7-1.6-1-2.4c-0.4-1,0.2-2.2-0.2-3.2c-0.3-0.8-1.9-1.8-2-2.2
                                    c-0.8-2.9,0.8-3.3,1-4.2c0.1-0.3,0-0.6-0.1-0.9c-0.4-1.3-0.3-2.7,0.4-3.9c0.5-0.7,1.2-0.3,2-0.3c3.2,0.2,4.1-0.2,5.9-2.2
                                    c0.3,0.3,0.4,0.8,0.6,1.1l0.3,0.3c0.7,0.5,1.5,0.6,2.3,0.4c1.8-0.9,2.7-0.5,4.3-2.4c1.8,0.3,3.5,0.8,4.5-1.4
                                    c0.6,0.6,1.5,1.4,2.5,0.9c0.4,1,1.1,1.2,2.1,1.1c0.8-0.1,1.5,0.3,2.3,0.2h0.5c2.2-0.2,1.1,2.3,5.5,1.1c1.5-0.4,2-0.8,2.1-1.7
                                    c0,0-0.6-1.7,0.7-1.8l0.8,0.4c1.2,1.2,2.5,0.5,4,0.9s3.2,0.4,4.1-0.6s2.4-1.6,3-0.5s1.6,2.4,2.6,0.8s4.6-3,6-3.5s4-1.2,4.6-0.8
                                    s0.8,3.1,1.6,2.5s2.8-2.9,3.6-2.2s4.4,0.5,4.8,1.5s3.2,1.9,4.4,1s2.4-2.2,2.2-3.4s0.8-2,2.9-2.8s4-2.5,6.1-2.6
                                    c1.8-0.2,3.6-0.9,5-2.1c0.9-0.8,0.9-1,1.1-2.2s1.2-1.8,2.8-1.8s2.9-2.1,2.9-3s1.9-1.9,3.6-1.8s8.6,0.8,9.6,0.1s3.8-1.4,4.9-0.6
                                    s4.2-0.1,4.6,1.2s-0.5,1.8-0.8,3s0.5,6.8,0.5,7.5s0.5,2.5,1.4,2.5s6.5,0.4,6.5,0.4s3.4,0,3.4,0.9s0.4,1.6,1.9,1.6s3.2,0.4,3.4-1
                                    s1.5-1.8,1.4-3.2s-1-2.8,0.1-4s1-1.5,3.2-0.6s3.1,0,3.8-0.5s1.8-1.8,2.5-0.5s1.5,1.1,3.1,1.1s2,1.2,2.4-1s0.4-2.5,2.4-3.5
                                    s2.2-2,2.2-3.1s-0.2-6.9-0.1-7.8c0.8,0.4,1.7,0.1,2.2-0.6c0.9-1.2,2.2-0.6,3.9-0.4s2,1.1,1.1,2.5c-0.6,1-1.1,2-1.6,3
                                    c-0.4,0.9-0.7,1.9-0.9,2.9c0,0.6-0.9,1.1,1.2,1.8s2,1.2,2,2.4s2.4,3.6,1,5s-1.4,1-0.1,2.9c1.1,1.4,1.9,2.9,2.6,4.5
                                    c0.2,1,2.9,2.9,4.5,4.1s3.2,1,4.6,0.9s2.9-0.4,3.6,0.8s4.8,2.8,5.6,4.2s1.5,2.4,2.4,2.4s2.8-0.1,3,0.6s1.3,3.1,1.3,3.1
                                    c-0.5,1.5-0.2,2.7,0.3,5.2c0.2,1.1-0.1,2.1-0.8,3c-0.4,0.3-0.9,0.5-1.2,0.9c-0.1,1-0.1,2.1,0.1,3.1c0,1.5-0.1,3,0,4.5
                                    c0.2,2.4,0.9,2.1,0.5,5.2l-0.3,2.1l-0.5,1.3c0,0-3.2,1.2-4.5,1.4c-1.4,0.4-2.6,1.1-3.8,2c-1,0.8-5,3.5-6.2,4.5s-5.5,2.5-5.5,3.8
                                    c0.2,1.2,0.5,2.4,1,3.5l1.2,2.5l0.6,2.7C420.1,800.1,418,802.3,417.2,803.3L417.2,803.3z" />
                                <path  class="st0 fill-white" id="MENABE"
                                    d="M35.8,936.2c0.5,0.9,0.8,2,0.7,3c0.2,6,2.4,4.3,5.2,6.5c0.3,0.9,1,1.3,1.7,2l0.1,0.3l0.1,0.4
                                    c0.3,0.9,1.2,1.4,1.5,2.3l0.1,0.3c0.4,1.3,1.3,2.3,2.5,2.9c2.3,1.5,1.9,1.5,2.2,4.4c0.3,3.9,3.2,4,3,9c-0.2,4.5,4.6,4.4,4.9,6.4
                                    s0.7,2.5,1.7,4.4c0.8,1.5,2.4,2.2,3.1,3.7c0.1,0.2,0.1,0.5,0.1,0.7c0.5,4.9,2.5,4.4,6.3,5.2c0.5,0.4,0.8,0.9,1.3,1.3
                                    c2.6,2.4,10,1.1,12.2-1.2c0.5-0.7,0.9-1.4,1-2.2c1.2-0.5,1.5-1.5,2.3-2.3c1.7-0.1,2.3,0.3,3.4-1.4c1.3-2,5.6-1.8,7.1-0.3
                                    c0.6,0.8,1,1.7,1.4,2.7c1.9,3.4,5.3,0.9,5.6-2.1c0.7,0.6,0.4,1.5,0.8,2.3c1.5,3.4,4.1-0.8,5.3-1.1c3.1-0.7,5.7,1.8,10.6-0.8
                                    c5.5-2.8,8.4-1.5,12.8-6.4c2.5-2.8,5.9-1.6,9.3-1.7c2.1,0,4.4-0.5,6.3-0.5l-0.8-2.7c0,0-1.8-2.2-2.5-3.4c-0.8-1.1-1.3-2.4-1.5-3.8
                                    c0-1.1-1-3.2-1-4.2s-0.4-2-1-2.8c-0.8-1.2-0.9-3.8-1.1-4.9s-1.1-2.6-0.6-3.9s-0.5-1.8,0.4-3.1s1.5-2.8,1.6-4.4c0.1-1.8-1-1.9-1-3.6
                                    v-7.8c0-0.9-0.1-1.2,1-1.2s2.2-0.1,1.5-1.6c-0.4-1.1-1-2-1.9-2.8s-0.9-1.6-0.9-2.8s-0.1-3.4,1.1-2.8c1.1,0.5,2.1,1.1,3,2
                                    c1,0.9,2.5,0.9,3.5,0c0.8-1,2.6-1.1,3.1-0.2s3.4,0.6,4.5,0.5s5.1,1.8,5.1,1.8s0.4,1.4,1,3s1,2.8,2.4,3.1s4.5-0.2,5,0.4
                                    c0.9,0.7,2.2,0.9,3.2,0.5c1.4-0.4,2.8-0.7,4.2-0.8c1.2,0,1.5-0.1,2-1.8s-0.6-3.8,2.2-4.1s2.8-2.4,5-3.2s3.1-2.6,5.7-3.9
                                    c2-0.9,4.1-1.2,6.2-1c1.4,0,1.6-1.2,2.6,1s2,2.5,2.8,0.6s2.6-3,2.6-4.1s1.6-2.4,3-2.9s2.2-0.9,2.8-2.4s1.1-2.6,2.8-3s2-1.4,2.1-2.8
                                    s-0.1-3.1,2.1-3.1s10.4,0.4,11.5,0.2s1.6-2.1,1.6-3.4s1.1-4,3.1-4.1s4.8-0.1,4.8-0.1l4.2,0.3c0.2-1,0.5-2.2,0.2-2.7l-1.3-2.1
                                    c-0.5-0.8,0.1-2,0.1-2.9c0-0.4-0.2-0.8-0.2-1.2c0.1-0.8,0.3-1.5,0.5-2.2c0.1-0.4,0-0.9,0.1-1.3c0.1-0.7,1.1-1.4,1.2-2.3s0-3,0.7-3.5
                                    c0.5-0.3,2.2-0.2,3-0.4l0.6-0.7c0.3-1.2-0.5-8-0.8-9.6c-0.1-0.7-0.7-1.3-0.7-2c0-0.8,0-1.7-0.1-2.5c-0.2-1.1-1.3-2.1-1.3-2.8
                                    s0.6-1.3,0.8-2s0.2-1.3,0.3-1.8c0-0.4,0-0.9,0-1.3c0.1-0.8,1-1.5,1.3-2.1c0.9-1.7-0.2-5.2-0.6-7c-0.4-1.5,1-3.2,1-5.1
                                    c0-1-0.7-1.6-0.9-2.5c-0.2-1-0.3-2-0.3-3l-0.2-0.3c-0.2-0.4-0.4-0.7-0.5-1.1c-0.3-1.1,0.1-2.1-0.1-3.1s-0.5-1.8-0.6-2.8
                                    c0-0.6,0-1.2-0.1-1.8c-0.6-1.8-1.8-2.2-1.9-4.3c-0.1-0.9,0-1.7,0.2-2.6c-0.3-1-1.4-1.1-1.5-2c-0.1-0.7,0.5-1.5,0.5-2.2
                                    c0-1.1-0.6-2.5,0.3-3.5c0.5-0.6,1.6-0.9,1.9-1.5c0.5-1-0.6-1.8-0.2-2.8c0.2-0.6,0.9-1.3,0.8-2c-0.3-1.1-1.5-1.3-2.4-1.8
                                    c-0.7-0.4-2.5-2.1-2.6-2.9c-0.2-1.3,1.4-2.2,1.4-3.5c0-1.1,0.1-2.3,0.4-3.4l0.2-0.7c3.9-2.4,2.2-5.4,3.4-6.8c0.9-1,2.1-1.5,2.7-2.8
                                    s0.8-5.2,0.5-6.7c-0.1-0.7-0.9-1.2-0.8-1.9c0.2-1,0.2-2.1,0-3.1c-0.4-0.9-0.9-1.8-1.4-2.7c-0.4-0.8-0.7-1.6-1-2.4
                                    c-0.4-1,0.2-2.2-0.2-3.2c-0.3-0.8-1.9-1.8-2-2.2c-0.8-2.9,0.8-3.3,1-4.2c0.1-0.3,0-0.6-0.1-0.9c-0.2-1.6-0.3-3.2-0.2-4.9l0.1-1
                                    c0.7-0.5,1.9-0.5,2.4-0.9c1-0.9-0.3-2.8-0.2-3.8c0.3-2.7,1.5-1.5,0.4-4.9c0.4-1.1,0.4-2.4,0-3.5c-0.4-0.9-1-1.1-1.2-2.2
                                    c-0.1-0.7,0.5-1.7-0.1-2.3c-0.3-0.4-1.1-0.9-1.3-1.3c-0.2-0.8,0.5-1.7,0.2-2.4c-0.1-0.3-0.3-0.5-0.5-0.7c-0.6-0.2-1.1,0.2-1.6,0.4
                                    s-1.1,0.3-1.6,0.4c-1,0.4-2.8,2-3.8,1.5l-0.5-0.4c-0.7-0.6-1.3-1.3-1.8-2.1c-0.6-0.6-1.4-1-2-1.5c-0.9-0.9-1.8-3.4-2.8-4.7
                                    c-0.7-0.8-1.4-1-1.7-2.2c0-0.1,0-0.1,0-0.2c-0.1-1.5,2.4-3.6,1-5.1c-1-0.5-3.4-0.7-3.9-1.5c0-0.9,0-1.7-0.1-2.6
                                    c-0.8-1.5-3.4-2.1-3.9-3.1c-1-1.9-1.1-3.7-2.3-5.8c0-0.1-0.2-0.5-0.2-0.5c-1.4-1.5-3.5-1.1-3.9-2.3c0.1-3.2,3-4.6,2.8-6.9
                                    c-0.3-1-0.6-2-1-3c-0.2-0.7-0.4-1.4-0.6-2.2c-0.3-1.9,0-4.2-0.6-6.1c-0.2-0.6-0.8-1.5-0.5-2.1c0.3-0.9,0.7-0.9,1.4-1.4
                                    c0.4-0.3,0.8-0.5,1.2-0.8c0.1-0.1,0.2-0.3,0.3-0.4c0.6-0.6,1.1-1.2,1.6-1.9c0.2-0.5,0.4-0.9,0.6-1.4c0.5-0.7,1.4-0.9,2.1-1.3
                                    s0.7-1.5,1.3-2.2c0.7-0.7,1.5-1.3,2.4-1.7c1.3-0.8,1.3-2.1,1.1-3.4c-0.1-0.4-0.3-0.7-0.3-1.1c0.1-0.9,1-1.4,0.8-2.7
                                    c-0.2-1.4-0.6-2.9-1.2-4.2c-0.2-0.8,0.3-1.7,0.2-2.5s-1.2-2-1.2-3.7c0-0.9,0-1.8,0.1-2.7c0-0.1,0.5-0.7,0.5-0.9
                                    c0.1-0.4,0-1.4,0.3-1.8l1.8-1.7c0.8-1.7-1.9-2.4-2.8-3.2c-0.5-0.8,0-1.4-1-3c-0.2-0.4-0.6-0.8-1-1.1h-1c-0.7-0.4-1.5-0.4-2.1,0.2
                                    c-0.5,1.1-1.3,2.6-2.6,2.9l-1-0.2c-1-1.3-1-2.5-1.5-3.9c-0.4-1.2-2.5-1.8-3.6-1.7c-0.8,0.3-0.8,1-1.2,1.5c-0.6,0.8-1.7,1-2.4,1.7
                                    c-0.5,0.5-0.7,1-1.3,1.4c-1.4,0.3-2-1.5-2.9-2.1s-1.5-0.2-2.3-0.5c-0.6-0.2-1.1-0.8-1.7-1c-1-0.4-2.4-0.3-3.3-0.9
                                    c-0.8-0.6-1.5-1.2-2.2-1.9c-2.7-2.5-3.9-2.9-7.5-2.9c-1,1-2.3,1.6-3.6,1.8l-2.1,2l-1.2,0.2c-1.4-0.6-1.3-2.3-2.4-3.2
                                    s-2.6-0.7-3.9-1.1c-0.5-0.9-0.4-2.2-1.2-2.8l-1.1,0.1c-0.7,0.6-0.9,1.5-1.6,2.2s-1.5,0.7-1.9,1.3c-0.5,0.9-1.1,1.7-1.9,2.3
                                    c-0.2,0.2-0.6,0.3-0.8,0.5c-1.6,1.5-0.9,3-3.7,4.5c-0.8,0.2-1.7-0.6-2.7-0.5c-1.7,1.6-3.7,2.8-5.4,4.4c-0.6,0.8-1.1,1.7-1.6,2.6
                                    c-0.4,0.5-0.8,1-1.2,1.5l-0.1,1.2c1.4,2.2,3.3,4.2,4.6,6.5c0.6,1,0.2,2.3,1.1,3.6l2.8,4c0.6,0.9,0.3,2.3,0.6,3.4
                                    c0.1,0.3,0.4,0.6,0.4,0.9c0.1,0.6-0.1,1.4,0.1,1.9s0.6,1.3,0.8,1.9c0.1,0.8,0.1,1.7,0.1,2.5l1.3,1.5c-0.1,0.7-0.2,1.5-0.5,2.2
                                    c0.2,1.6,1.7,2.9,2.9,4l0.3,1c-0.3,0.6-0.7,1.1-1.2,1.5l0.2,1l1,0.4l0.4,2.3c0.5,0.2,0.9,0.5,1.3,0.8c2.3,1.8,2.2,2.5,2.6,5.6
                                    c0.2,0.9,0.3,1.8,0.2,2.7c-0.2,1.1-1,1.7-1.6,2.5c-1.3,1.9-1,2.7,0,4.8c0.6,0.3,1.3,0.4,2,0.3c0.5,1,0.8,2.1,0.7,3.3
                                    c0.6,0.9,1,2,1,3.1c0.2,1.4,0.5,2.7,0.9,4c0.2,0.7,1,1.3,1.1,2.1c0.2,1,0.1,2.1-0.2,3.1c-0.5,1.2-2.3,1.5-2.6,2.8v1.2
                                    c0.9,1.1,0.8,2.6,1.9,3.5c1.8,1.6,5.6,3.5,6.7,5.3l0.2,0.3l-0.4,0.9c-1.6,1.5-5.1,0.4-7.1,0.6c-0.3,0.6-0.6,1.3-0.8,2l-0.9-0.1
                                    c-1-1.7-3.1-1.1-4.1-1.5s-1.6-1.5-2.8-1.3c-0.9,0.6-2.1,0.9-3.2,0.9l-0.8,0.5c-0.6,1.1,0,2.4-0.7,3.5c-1,1.5-2.4,1.2-3.8,1.6
                                    c-0.7,0.2-1.3,0.5-1.8,0.9c-1.9-0.1-3.8-0.6-5.5-1.3c-0.5-0.4-0.9-1-1.5-1.3c-1-0.5-2-0.4-2.8-1.4c-1.4-0.2-2.5,1.2-3.9,1.1
                                    c-0.6-0.9-0.6-2-1.3-2.8l-1.1,0.2l-1.1,1.6l-1,0.3l-1.5-1.3l-1.1,0.1c-1,1.4-2.9,0.6-4.2,0.3c-0.8-0.1-1.5-0.3-2.2-0.6
                                    c-0.4-0.6-0.5-1.3-0.9-1.8s-1-0.8-1.3-1.4c-0.1-0.3-0.2-0.7-0.4-1c-0.3-0.5-0.9-0.9-1.3-1.5c-0.2-0.3-0.3-0.6-0.4-0.9
                                    c-1.1-1.9-3.2-3-5.4-2.8c-0.6,0-1.2,0-1.9,0.1c-1.2,0.2-2.3,1.5-3.6,1.2c-0.7-0.2-1.3-0.6-2-0.8c-1.1-0.1-2.2-0.2-3.3-0.1
                                    c-1.3-0.2-2.4-2-4.9-2.1c0.3,0.6,0.6,1.2,1,1.8c0.4,0.8,0.5,1.7,0.9,2.5c0.9,1.8,2.3,2.7,3.7,3.9c1.1,0.9,1.8,2.4,2.9,3.3
                                    c0,0.3,0.5,1.2,0.7,1.6c0.2,1.1,0.5,2.1,0.9,3.2c0.1,0.3,0.2,0.7,0.4,0.9c0.6,0.5,1.3-0.1,1.8,0.8c0.4,0.7,0.7,1.6,1,2.4
                                    s0.8,1.5,1.2,2.2c0.8,1.2,1.8,2.4,2.7,3.5c0.8,1.1,1.4,2.3,2,3.5s0.3,1.7,0.2,2.8c-0.1,0.6,0.2,1.2,0.2,1.8
                                    c-0.1,0.6-0.1,1.2-0.1,1.8c0.3,0.6,0.7,1.1,1.2,1.5c0.2,0.6-0.4,2.7-1,2.9l-0.4-0.3c-0.1-0.3-0.3-0.6-0.5-0.8l-0.5-0.1l-0.4,0.3
                                    c-0.1,0.6-0.2,1.2-0.2,1.9c-0.2,0.3-0.6,0.4-0.9,0.4c-0.1,0.6-0.1,1.3-0.1,1.9c-0.2,0.5-0.8,0.6-1.1,1c-0.3,0.5-0.4,1.1-0.3,1.6
                                    c0,0.8-0.1,1.7-0.4,2.5c-0.3,0.5-0.5,0.9-0.7,1.5c0.2,0.5,0.3,1.1,0.4,1.6c-0.1,0.8-0.3,1.5-0.5,2.3c-0.1,0.8-0.1,1.6-0.2,2.4
                                    c0,0.3-0.1,0.5-0.2,0.8c-0.7,1.5-2.1,1.8-2.4,3.8c-0.1,1.1,0.4,1.7,0.6,2.7c0.4,1.3,0.9,4.8,2.9,4.7c0.8-0.3,1.5-0.8,2.1-1.3
                                    l0.3,0.3c-0.1,1-0.6,2-0.3,3s1.3,1,2,1.5c0.5,0.4,0.4,1.7,0.7,2.2c0.9,2.3,2.3,2.1,1.8,5.1c-0.1,0.5-0.2,1.1-0.3,1.6
                                    c-0.2,0.5-0.3,1.2-0.8,1.5c-0.5-0.2-1.1-0.2-1.6,0c-0.9,1-1.4,2.9-2.1,4.2c-0.5,0.8-1.3,1.7-1.7,2.5s0.1,2.1-0.4,3
                                    c-0.8,1.8-3.1,2.5-4.2,4.1c-0.9,1.5-1.7,2.9-2.5,4.5c-0.7,1-1.3,2-1.9,3c-0.4,1.2-0.8,2.4-1.4,3.5c-0.3,0.4-0.6,0.7-0.9,1.1l0.2-0.2
                                    c-0.6,0.6-0.9,2.1-1.4,2.8s-1.2,1.1-1.7,1.8c-0.5,1-0.9,2-1.2,3c-0.1,0.2-0.3,0.5-0.4,0.7s-0.2,0.4-0.3,0.7c-0.1,0.4,0,0.9-0.1,1.3
                                    c-0.2,1.1-0.5,2.2-1,3.2c-0.5,0.8-1.1,1.7-1.7,2.4c-0.4,0.2-0.8,0.5-1.2,0.8c-0.2,0.3-0.4,0.5-0.7,0.7c-0.3,0.2-0.7,0.2-1,0.4
                                    c-0.2,0.2-0.5,0.4-0.7,0.6c-1,0.6-1.9,1.2-2.8,2c-0.1,0.1-0.2,0.3-0.3,0.4c-0.1,0.4-0.2,0.8-0.2,1.2c-0.3,1.3-0.7,2.5-1.3,3.7
                                    l-0.4,0.1l-0.2-0.4c-0.1-0.8,0.5-1.7,0.1-2.4c-2.1,0.3-2.5,5.8-3.1,7.4c-0.3,0.8-1,1.5-1.2,2.3c-0.3,1,0.1,2.2-0.5,3.6
                                    c-0.3,0.8-0.9,1.5-1.1,2.3s-0.4,1.5-0.6,2.2c-0.7,1.6-1.6,3.2-2.7,4.6c-0.8,1.1-3,7.1-5.2,5l-0.6,0.1c-0.8,0.5-0.6,1.1-1.1,1.7
                                    c-0.4,0-0.7,0.1-1.1,0.3c-0.5,0.7-1.1,1.3-1.5,1.9s-0.4,1.5-0.7,2.1c-0.2,0.3-0.4,0.6-0.6,0.8c-0.8,1.3-1.8,2.5-2.5,3.8
                                    c-1,1.7-3.4,9-3.2,10.7c0,2.1-0.1,4.2-0.5,6.2c-0.2,0.8-0.8,1-0.9,1.9c-0.1,1.3,0.1,2.7-0.1,4s-1.4,2.7-1.6,4
                                    c-0.2,1,0.1,2.1-0.1,3.2c-0.3,1-0.7,2-1.2,3c-1.3,3.2-1.3,3.5-3.6,6.2c-0.6,0.7-0.9,1.8-1.8,2.4c-0.6,0.4-1.3,0.5-1.9,0.9
                                    c-0.3,0.4-0.7,0.7-1.1,0.9c-1,0.1-1.4-0.8-2.3-1.1c-0.6-0.1-1.1-0.2-1.7-0.3c-1.1-0.1-2.1-0.1-3.2,0c-0.7,0.1-1.6,0.6-2.1,0.6
                                    c-1.4-0.6-2.2-0.1-3.5,0.1c-1.1,0.2-1.8-0.5-2.8,0.3c-0.1,0.4-0.1,0.9-0.1,1.3l-0.3,0.3l-0.4-0.3c-0.9-0.1-1.8,0.2-2.5,0.8
                                    c-0.3,0.8,0.5,1.4,0.1,2.2c-0.3,0.1-0.5,0.4-0.6,0.7C32.7,934.8,34.2,934,35.8,936.2L35.8,936.2z" />
                                <path  class="st0 fill-white" id="AMORON_I_MANIA" d="M398.9,895.2c0.9,0,2.6-0.5,3,1.1s2.5,2.4,2.5,0.4s0.2-5.8,0.1-6.8c-0.3-1.1-0.8-2.1-1.5-3
                                    c-0.6-1.1-1.2-3,0.6-4.2s3.1-2.6,3-3.9s-1.2-4.5,0.8-4.6c1.5,0,3,0.1,4.5,0.2c1.1,0,3.8,0.6,4.8-1.1s2.1-3.4,1.9-4.1
                                    c-0.3-1-0.8-1.9-1.4-2.8c-0.5-0.6-0.5-5-0.5-5.6c0.1-1.5,0.5-2.9,1.2-4.1c0.9-1.1,1.9-3.9,3.9-4.6s3-1.8,1-2.9s-2.6-2.1-1.4-2.9
                                    c1.1-0.8,1.8-1.9,2.2-3.1c0.1-0.5,1.5-3.7,1.5-3.7l-0.8-0.8c-0.4-2.4-1.4-2-1.8-3.5c-0.1-0.4,0.6-2,0.6-3c0-1.2-0.8-2.6-0.9-3.9
                                    c-0.1-0.9,0.4-1.4,0.6-2.2s-0.3-1.7-0.3-2.4c0-1.1,0.7-1.6,1-2.5c0-1.1-0.1-2.1-0.2-3.2c0-0.4,1.3-1.7,1.5-2
                                    c0.4-0.6,0.7-1.2,0.9-1.8c0.8-2.3,0.1-4.5,0.3-6.8c-0.1-1.1-1.4-1.7-2.3-1.9c-1.1-0.3-2.4,0.1-3.2-1l-0.2-0.5c0.3-1,0.8-1.9,1.6-2.5
                                    l-0.3-1.3c-1.6-0.2-3.6,2-4.5,3.1c-1.1,0.4-2.4,0.2-3.6,0.5c-0.9,0.4-1.8,0.9-2.6,1.5c-0.5,0.3-1,0.4-1.4,0.7
                                    c-0.9,0.5-1.6,1.4-2.7,1.4l-0.3-0.3c-0.1-1.7-0.5-2.1-2.1-2.7l-1.2,0.2c-1,0.5-0.2,1.8-1.9,2.9c-1,0.3-3-0.7-3.8-1
                                    c-1.1-0.3-2.3-0.5-3.4-0.8c-1.5-0.4-1.5-2.4-4.2-1.6c-0.3,0.1-0.6,0.3-0.9,0.4s-1.3,0.2-1.5,0.5s-1.7,2.5-2.2,2.6
                                    c-2.1,0.3-1.6-1.9-2.7-2.8c-0.4-0.1-0.8-0.2-1.2-0.1c-0.4,0.3-0.6,0.8-1,1.1c-1.1,0.9-1.9,0.6-2.9,2.6c-0.2,0.8-0.2,1.6-0.1,2.4
                                    c-0.1,0.6-0.2,1.2-0.4,1.7c-0.1,0.7,0.1,1.7-0.4,2.4c-1,0.2-1.4-0.9-2.6-0.6s-3.2,1.7-4.2,2c-1.4,0.3-2-0.7-4.6,0.1
                                    c-1.1,0.4-2.8,1.7-3.9,1.6c-1.4-0.1-3.2-2.5-4.5-2.5c-1,0-1.6,1.3-2.5,1.6c-0.4,0.7-0.9,1.5-1.4,2.1c-0.2,0.2-0.6,0.4-0.8,0.6
                                    c-0.6,0.7-1.2,1.6-1.9,2.3s-1.5,1.2-2.2,1.9c-0.4,0.4-0.7,1.2-1.2,1.5c-0.8,0.4-1.9,0.7-1.9,0.7c-0.1-0.5-0.2-1.2-0.8-1.3
                                    c-1.8-0.3-1.6,0-2.3,1.8H340c-0.5,0-0.9,0-1.4-0.1c-0.8-0.6-2.1-2.6-3-2.2c-1.9,0.9-0.8,1-2.1,2.1c-0.8,0.3-3.1,0.7-3.8-0.2
                                    l-0.3-0.4c-0.5-0.6-1.2-1-2-1h-0.3c-1.4-0.3-2.8-0.8-4-1.6c-2.9-1.4-3.5,0.2-4.6,2.5c-0.9,0.7-3.2,0.6-3.8,0
                                    c-0.2-0.8-0.6-2.1-1.8-2.2c-2.2-0.1-2.9,0.4-4.5-0.9c-3.3-2.7-6.3,1.2-8.2,1.1c-2-1.8-3.8-1.4-6-2.2l-1-1.4c-0.5-0.7-2.4-0.5-3-3.1
                                    l0.2-0.6c0.5-0.3,1.6-0.4,1.9-0.7c1.2-1.4,1-2.2-0.5-3.3c-0.1-0.6-0.3-1.2-0.5-1.7c1.4-0.5,1.6-1.5,1.2-2.8c-1-4.4-1.9-3.4-4.5-5.3
                                    c-0.6-0.5-1.8-2.3-2.7-1.6c-1.6,1.3-0.6,1.1-1.5,2.7c-0.3,0.2-0.7,0.4-1,0.5c-2.8,1.2-1.9,2.1-3.5,3.5c0.1-1.2,0.1-2.3-0.1-3.5
                                    l-0.1-0.3c-0.8-0.7-1.7-1.1-2.8-1.2c-3.8-0.8-2.3-3.3-3.2-6c-0.2-0.7-0.7-0.9-1.2-1.1c-0.5-0.3-1-0.5-1.6-0.5
                                    c-0.9,0.1-1.7,0.1-2.6,0c-1.8-3.6-4.7-2.7-7.8-2.2c-1.3,0.2-4.1-1.2-5.3-1.9c-3.2-2.1-4.6,0.8-5.8,0.5c-0.7-0.2-4.7-3.5-5.5-3.6
                                    c-0.4,1.2-0.6,2.6-0.5,3.9c-0.1,1.3-1.6,2.2-1.4,3.5c0.1,0.8,2,2.5,2.6,2.9c0.9,0.5,2.1,0.7,2.4,1.8c0.1,0.7-0.6,1.4-0.8,2
                                    c-0.4,0.9,0.7,1.7,0.2,2.8c-0.3,0.6-1.4,0.9-1.9,1.5c-0.9,1-0.2,2.4-0.3,3.5c0,0.7-0.6,1.5-0.5,2.2c0.1,0.9,1.2,1,1.5,2
                                    c-0.2,0.8-0.2,1.7-0.2,2.6c0,2,1.2,2.5,1.9,4.3c0.1,0.6,0.2,1.2,0.2,1.8c0.1,0.9,0.4,1.9,0.6,2.8s-0.2,2,0.1,3.1
                                    c0.1,0.4,0.3,0.8,0.5,1.1l0.2,0.3c0,1,0.2,2,0.3,3c0.2,0.9,0.9,1.5,0.9,2.5c0,1.8-1.4,3.5-1.1,5.1c0.4,1.7,1.5,5.2,0.6,7
                                    c-0.4,0.7-1.2,1.3-1.3,2.1c-0.1,0.4,0.1,0.9,0,1.3c-0.1,0.6-0.1,1.2-0.3,1.8c-0.1,0.7-0.8,1.2-0.8,2s1.1,1.7,1.3,2.8
                                    c0.1,0.8,0.2,1.7,0.1,2.5c0,0.7,0.6,1.3,0.7,2c0.3,1.5,1,8.4,0.8,9.6l-0.7,0.7c-0.8,0.2-2.5,0.1-3,0.4c-0.8,0.5-0.6,2.7-0.7,3.5
                                    c-0.1,0.9-1.1,1.6-1.2,2.3c-0.1,0.4,0,0.9-0.1,1.3c-0.3,0.7-0.4,1.5-0.5,2.2c0,0.4,0.2,0.8,0.2,1.2c0,0.9-0.6,2-0.1,2.9l1.3,2.1
                                    c0.3,0.5,0,1.7-0.3,2.8c-0.2,0.6-0.3,1.2-0.4,1.9c0,2.3-0.2,4.6-0.4,6.9c0.4-0.2,0.9-0.3,1.3-0.3c0.8,0,1.6,0.1,2.4,0.4l0.5,0.2
                                    c0.2,0.1,0.4,0.2,0.7,0.2c1.8-0.4,2.2-3.4,4.9-2.7c0.8,0.2,1.4,0.1,1.6-0.8c-0.9-2.9,1.4-3.4,3.6-2.6s2.4-1.5,4.8-1l0.2,0.1
                                    c0.2,0.1,0.5,0.2,0.7,0.3c0.6,0.5,1.2,0.9,1.9,1.3c1.7,0.5,2.1,2.1,3,2.2c2.9-0.9,4.8-3.1,8.1-1.1c0.8,0.6,1.6,1.2,2.5,1.6
                                    c3.3-1.7,6.3-9.3,11-4.6c0,0,2.3-1.2,1.2-2.2s-1.8-1.7-1.8-2.7s-0.6-1.4-0.1-3.1s0.9-0.1,2-3s-0.1-2.9,2-4.2c1.6-0.9,3-2.1,4.1-3.5
                                    c0.5-0.8,1.4-1.2,2,0s2.9,1.9,3.1,2.4s2.8,1.2,3.4,0.4s1.6-0.8,2.6-1.4s2.2-2.4,3.4-2.8c1-0.2,1.7-1,1.9-2c0.1-0.9,2.6-2,3-0.6
                                    s1.9,1.6,2.1,2.9s-0.4,2.5,1.1,2.6s1.5,0.9,1.8,2.4s0.6,3.8,2.6,5.1s4.8,2.9,5.8,2.9s1.1,0.8,1.4,1.8s0.5,3,2.6,3s2.4,1.2,2.4,1.8
                                    l-0.1,1.5c0.4-0.1,0.8-0.1,1.5-0.2c1.8-0.3,3.6,0.9,4,2.7c0.1,0.3,0.1,0.6,0,0.9c0,0.2,0,0.4,0,0.7c1.1,0.4,2,0.6,2.7,0.8
                                    c0,0,3.2-2.4,3.4-0.3s-0.4,2.6,1.5,2.9s3.8,0.5,3.8-1.1s-0.6-4.6,2-3.6s5.4,0.4,5.8-0.4c0.6-1,1-2.2,1-3.4c0.1-2-1-3.1,1-3.4
                                    s2.8-1.6,5-1.6s3.5,0,4.9-1c1.1-0.7,1.8-1.8,2.2-3c0.4-1,1-2,3.1-2s3.9,0.1,4.1-1.2s1.6-2,3.2-0.9s3,2.5,2.2,4.4
                                    c-0.6,1.3-0.8,2.7-0.5,4.1c0.5,1.7,1,3.3,1.8,4.9c0.5,1,0.5,1.5,1.1,1.8s3.8,0.8,3.8,0.8C396.2,894.8,398,895.3,398.9,895.2
                                    L398.9,895.2z" />
                                <path  class="st0 fill-white" id="HAUTE_MATSIATRA"
                                    d="M365.4,1012.5c-2-0.1-1.5,1.4-1.6,2.2s-1.5,0.6-2.2,0.6c-1.7,0.1-3.5-0.1-5.1-0.8
                                    c-2.9-1-2.4,0.9-2.9,2.2s-3,2.2-3,2.2c-1.2-0.5-2.4-1.1-3.5-1.9c-1.2-1-2.5-1.1-5.9-1.8c-2.4-0.4-4.8,0.2-6.6,1.8
                                    c-1,0.8-5-0.2-6.9,0.2s-2.8,1.4-4.5-1s-2.5-3.5-1.9-4.4s-0.5-3-1.1-3.9s-2.2-1.6-3.1,0.2s-2.9,3.2-2.9-0.4s-2.6-1.8-3.6-1.6
                                    c-1.2-0.1-2.4-0.7-3.1-1.6c-0.8-0.9-1.5-1.2-1.5-2.2s0.4-4.1,0.5-5.4c0.2-1.9-0.2-3.8-1.1-5.4c-1.2-2.2-2.6-4.5-3.8-4.9
                                    s-1-1.1-1.1-2.4s-1.9-1.4-3.5-1.5s-1.1-2.6-1.1-3.2s-0.2-1.8-3.2-2s-3.4,1.4-4.1,0.5s-2.1-3.1-2.6-3.4s-8.5-0.6-9.6-0.6
                                    c-1.2,0-2.3-0.6-3-1.6c-0.6-1-3.4-0.2-4.5,0.1s-3.5-1.1-4.2-1.2s-2.2-0.1-2.4-0.8s0.8-1.5-1.9-2.8s-0.9,1.9-2.2,2.2
                                    c-1.1,0.4-2.1,0.9-3,1.6c-0.1-0.2-0.3-0.3-0.5-0.5c-3.1-2-3.8,2-5.4,1l-0.4-0.2c-1.3-0.8-2.4-0.2-3.3,0.8c-0.9-1.3-0.9-1.1-2.2-1.3
                                    c-1-1.5,0-2.3-2.5-3.6l-0.6-0.3c-0.2-0.1-0.3-0.2-0.5-0.3l-0.3-0.4c-1-1.4-1.9-1.2-3.4-1.2c-0.7-0.5-1.5-0.8-2.4-0.8
                                    c-3-0.2-1.6-0.1-3.1-2c-1.2-1.5-1.9-2.9-4.1-3.2h-0.6c-0.9-0.5-2-0.8-3-0.7c0.8-1.1,0.2-3.8,0-4.8l-1.3-4.8V949c0-1,0.7-2,0.7-3.2
                                    c0-0.9-0.8-1.2-0.7-2c-0.8-1-1.2-2.3-0.9-3.5l0.1-0.2c0.8-1.2,3.9-4,4.2-5c0.3-1.3-0.3-2.6,0.1-3.7l0.1-0.2c0.6-1,1.7-1.6,2.8-1.5
                                    c0.6-1.9,0.8-3.2,3.2-3.3c0.3-1.8,1.6-1.1,2.9-2.4c0.5-0.6,1.2,0.3,2.5-0.9c0.3-0.2,1.4-0.2,1.8-0.2c2.9-0.4,1.8-1.8,2.2-3.8
                                    l-0.4-2.9c0-0.4,0.3-0.9,0.5-1.2c-0.6-1.7-1.5-0.9-1.7-4c-0.1-1.1-0.9-4.5,0.1-5.1c1.8-1.5,3-3.5,3.5-5.8l1-0.9
                                    c0.4-0.2,0.9-0.3,1.3-0.3c0.8,0,1.6,0.1,2.4,0.4l0.5,0.2c0.2,0.1,0.4,0.2,0.7,0.2c1.8-0.4,2.2-3.4,4.9-2.7c0.8,0.2,1.4,0.1,1.6-0.8
                                    c-0.9-2.9,1.4-3.4,3.6-2.6s2.4-1.5,4.8-1l0.2,0.1c0.2,0.1,0.5,0.2,0.7,0.3c0.6,0.5,1.2,0.9,1.9,1.3c1.7,0.5,2.1,2.1,3,2.2
                                    c2.9-0.9,4.8-3.1,8.1-1.1c0.8,0.6,1.6,1.2,2.5,1.6c3.3-1.7,6.3-9.3,11-4.6c0,0,2.3-1.2,1.2-2.2s-1.9-1.6-1.9-2.6s-0.6-1.4-0.1-3.1
                                    s0.9-0.1,2-3s-0.1-2.9,2-4.2c1.6-0.9,3-2.1,4.1-3.5c0.5-0.8,1.4-1.2,2,0s2.9,1.9,3.1,2.4s2.8,1.2,3.4,0.4s1.6-0.8,2.6-1.4
                                    s2.2-2.4,3.4-2.8c1-0.2,1.7-1,1.9-2c0.1-0.9,2.6-2,3-0.6s1.9,1.6,2.1,2.9s-0.4,2.5,1.1,2.6s1.5,0.9,1.8,2.4s0.6,3.8,2.6,5.1
                                    s4.8,2.9,5.8,2.9s1.1,0.8,1.4,1.8s0.5,3,2.6,3s2.4,1.2,2.4,1.8l-0.1,1.5c0.4-0.1,0.8-0.1,1.5-0.2c1.8-0.3,3.6,0.9,4,2.7
                                    c0.1,0.3,0.1,0.6,0,0.9c0,0.2,0,0.4,0,0.7c1.1,0.4,2,0.6,2.7,0.8c0,0,3.2-2.4,3.4-0.3s-0.4,2.6,1.5,2.9s3.8,0.5,3.8-1.1
                                    s-0.6-4.6,2-3.6s5.4,0.4,5.8-0.4c0.6-1,1-2.2,1-3.4c0.1-2-1-3.1,1-3.4s2.8-1.6,5-1.6s3.5,0,4.9-1c1.1-0.7,1.8-1.8,2.2-3
                                    c0.4-1,1-2,3.1-2s3.9,0.1,4.1-1.2s1.6-2,3.2-0.9s3,2.5,2.2,4.4c-0.6,1.3-0.8,2.7-0.5,4.1c0.5,1.7,1,3.3,1.8,4.9
                                    c0.5,1,0.5,1.5,1.1,1.8s3.8,0.8,3.8,0.8c-1.4,0.7-2.4,1.9-3,3.4c-0.2,1.8-0.2,3.7,0,5.5c0,0,1.2,2,2.2,2.4s5.4,0.4,6.4,0.5
                                    s1,4.4,0.9,6.6s0,2.5-1.4,2.5s-1.2,0.4-1.2,1.5c-0.1,2.1-0.6,4.1-1.5,6c-1,2.1-1.2,2.6-0.2,4.1s1.6,1.8,0.5,2.6s-1,1.2,0.4,2.5
                                    s0.9,2.4-0.4,3.2s0,0.8-0.1,2.2s0.4,1.9,1.6,3s0.9,4.2-0.2,4.6s-1.1,1-0.4,3.9s0.2,2-1.2,2.8s0.5,3.6,0,4.5c-0.6,1-0.7,2.2-0.2,3.2
                                    c0.5,1.4-0.1,4.9,0,5.8s0.5,3.4,0,4c-0.5,0.8-0.8,1.6-1.1,2.4c-0.2,0.5-1,1.9-1,1.9c-0.3,1.3-0.7,2.5-1.2,3.6
                                    c-0.6,0.9-1.1,1.9-1.5,2.9c-0.2,0.9-1.1,1.8-3.1,1.8s-2.1,0.8-3.1,1.8c-0.8,1.1-1.4,2.2-1.9,3.5c0,0-1.6,1.2,0.2,2.9
                                    s4.6,3.4,5.1,3.9s0.2,0.9-0.1,2s-0.2,1.5-1.6,1.6s-1.6,0.9-1.6,1.9s-1.1,3.2-1.6,4.6s-1.8,1.5-2.1,0.9s-1.1-0.9-2-1.4
                                    s-3.4-1.9-3.4-1.9l-1.9,2.1l-2.5,2.6h-1.9c-0.9,0-1.5-0.5-1.5,0.6s0.2,4.6,0.2,4.6c0.2-0.9-1.8-0.1-3.8-0.2L365.4,1012.5z" />
                                <path  class="st0 fill-white" id="ATSIMO_ANDREFANA" d="M222.6,954.5l-1.3-4.8v-0.2c0-1.1,0.6-2,0.7-3.2c0.1-0.9-0.8-1.2-0.7-2c-0.9-1-1.2-2.3-0.9-3.5
                                    l0.1-0.2c0.9-1.2,4-4,4.2-5c0.3-1.3-0.3-2.7,0.1-3.7l0.1-0.2c0.6-1,1.7-1.6,2.8-1.5c0.6-1.9,0.8-3.2,3.2-3.3
                                    c0.3-1.8,1.7-1.1,2.9-2.3c0.5-0.6,1.2,0.3,2.5-0.9c0.3-0.2,1.4-0.2,1.8-0.2c2.9-0.4,1.8-1.8,2.2-3.8l-0.4-2.9c0-0.4,0.3-0.9,0.5-1.2
                                    c-0.6-1.7-1.5-0.9-1.7-4c-0.1-1.1-0.9-4.5,0.1-5.1c1.8-1.5,3-3.5,3.5-5.8l0.9-0.7c0.3-2.4,0.5-4.7,0.5-7.1c0.1-0.7,0.3-1.3,0.5-2
                                    l-4.2-0.3c0,0-2.8,0-4.8,0.1s-3.1,2.9-3.1,4.1s-0.5,3.2-1.6,3.4s-9.2-0.2-11.5-0.2s-2,1.8-2.1,3.1s-0.5,2.4-2.1,2.8s-2.2,1.5-2.8,3
                                    s-1.4,1.9-2.8,2.4s-3,1.8-3,2.9s-1.9,2.2-2.6,4.1s-1.8,1.6-2.8-0.6s-1.2-1-2.6-1c-2.1-0.2-4.3,0.1-6.2,1c-2.6,1.2-3.5,3-5.8,3.9
                                    s-2.1,2.9-5,3.2s-1.8,2.5-2.2,4.1s-0.8,1.8-2,1.8c-1.4,0-2.9,0.3-4.2,0.8c-1.1,0.4-2.3,0.2-3.2-0.5c-0.5-0.6-3.6,0-5-0.4
                                    s-1.8-1.5-2.4-3.1s-1-3-1-3s-4-1.9-5.1-1.8s-4,0.4-4.5-0.5s-2.4-0.8-3.1,0.2c-1,0.9-2.5,0.9-3.5,0c-0.9-0.9-1.9-1.5-3-2
                                    c-1.2-0.6-1.1,1.6-1.1,2.8s0,2,0.9,2.8c0.8,0.8,1.5,1.7,1.9,2.8c0.8,1.5-0.4,1.6-1.5,1.6s-1,0.4-1,1.2v7.8c0,1.8,1.1,1.9,1,3.6
                                    c-0.1,1.6-0.7,3.1-1.6,4.4c-0.9,1.4,0.1,1.9-0.4,3.1s0.4,2.8,0.6,3.9s0.4,3.6,1.1,4.9c0.6,0.8,1,1.7,1,2.8c0,1,1,3.1,1,4.2
                                    c0.2,1.4,0.7,2.6,1.5,3.8c0.8,1.1,2.5,3.4,2.5,3.4l0.8,2.7c-1.9,0-4.2,0.4-6.3,0.5c-3.4,0.1-6.8-1.1-9.3,1.7
                                    c-4.4,4.9-7.3,3.6-12.8,6.4c-4.9,2.5-7.5,0-10.6,0.7c-1.3,0.3-3.8,4.5-5.3,1.1c-0.4-0.8-0.1-1.7-0.8-2.3c-0.4,3-3.7,5.6-5.6,2.1
                                    c-0.4-0.9-0.9-1.8-1.4-2.7c-1.4-1.4-5.8-1.6-7.1,0.3c-1.1,1.7-1.7,1.3-3.4,1.4c-0.8,0.9-1.1,1.8-2.3,2.3c-0.1,0.8-0.5,1.6-1,2.2
                                    c-2.2,2.3-9.6,3.7-12.2,1.2c-0.4-0.4-0.8-0.9-1.3-1.3c-3.7-0.8-5.8-0.3-6.3-5.2c0-0.2-0.1-0.5-0.1-0.7c-0.8-1.4-2.4-2.2-3.2-3.7
                                    c-1-1.9-1.4-2.3-1.7-4.4c-0.3-2-5.1-1.9-4.9-6.4c0.2-5-2.7-5-3-8.9c-0.2-2.8,0.1-2.9-2.2-4.4c-1.2-0.6-2.1-1.6-2.5-2.9l-0.1-0.3
                                    c-0.3-0.8-1.2-1.3-1.5-2.3l-0.1-0.4l-0.1-0.3c-0.7-0.7-1.4-1.2-1.7-2c-2.8-2.2-5.1-0.5-5.2-6.5c0.1-1-0.1-2.1-0.7-3
                                    c-1.7-2.2-3.2-1.5-5-4.1c-0.6,0.1-1.2,0.5-1.5,0.5c-0.2-0.6-0.1-1.2-0.2-1.7c-0.1-0.3-0.3-0.6-0.4-1l-0.3,0.2
                                    c-0.1,0.5-0.4,1-0.6,1.6s-0.2,1.2-0.3,1.8c0,0.2-0.1,0.4-0.2,0.5c-0.5,0.9-1.3,1.5-1.6,2.6c-0.3,1.5-0.4,3-0.5,4.5
                                    c-0.2,1.5-0.9,3.1-0.8,4.7c0,1.1,0.6,1.7,0.6,2.2l-0.3,0.4c0,0.7-0.3,1.6-0.2,2.3c0,0.4,0.2,0.8,0.2,1.2c-0.1,0.2-0.1,0.3-0.2,0.5
                                    l0.1,0.5c0.3,0.2,0.6,0.4,0.8,0.6c0.3,0.4,0.2,1.2,0.3,1.7c0.2,1.4,0.3,2.9,0.2,4.3c-0.2,1.3-0.3,2.5-0.3,3.8
                                    c0.2,1.3,1.3,1.9,1.8,2.9c0,0.4-0.1,0.7-0.2,1c-1-0.1-2.4-2.1-2.4-3.1l-0.3-0.2c-0.1,0.3-0.3,0.6-0.6,0.8c-0.4,0.1-0.7,0.1-1.1,0
                                    c-0.5,0.4-0.9,1-1.2,1.6c-0.8,1.3-1.8,2.4-2.6,3.6c-0.3,0.6-0.6,1.2-1,1.7c-0.9,1-2.1,1.7-2.7,2.9c-0.3,0.6-0.6,1.3-0.8,2
                                    c-0.1,0.6,0.3,1,0.1,1.7s-0.7,0.5-0.7,1.4s0.5,1.8,0.2,2.9c-0.2,0.8-0.8,1.1-0.6,2.1c0.5,0.4,0.9,0.9,1.3,1.4c0.3,0.7,0.3,3.6-0.5,4
                                    c-0.7-0.2-0.7-1-1.6-1.2l-0.3,0.3c-0.1,0.6-0.2,1.1-0.5,1.6l-0.3-0.2c-0.3-1.6,0.4-3.9-0.6-5.3h-0.6l-0.3,0.2
                                    c-0.1,0.3-0.3,0.7-0.4,1c-0.5,1.1-2.1,2.1-2.1,3.5c0,1.5,2,1.8,0.8,3.8L7.9,994c-0.7-0.3-1.2-0.8-1.9-0.3c-0.7,0.8,0.3,2.9,0.2,4
                                    c-0.1,1.6-0.7,1.9-1.1,3.1c-0.5,1.2-0.9,2.5-1.1,3.8c-0.1,0.4-0.1,0.8-0.1,1.3c0.1,0.3,0.2,0.7,0.4,1c0.3,0.2,0.6,0.4,0.9,0.6
                                    l0.2,0.5c-0.3,0.4-0.8,0.6-1.2,0.9c0,0.5,0.6,0.9,0.9,1.1l0.2,0.5c0,0.7-0.6,0.8-0.8,1.3c-0.3,0.7-0.4,1.5-0.4,2.3l0.8,0.6
                                    c0.2,0.6,0.6,1.2,1.1,1.7c2.1,0.8,2.3-0.7,3.4-1.7c0.5,0.2,1,0.5,1.1,1c-0.1,0.4-0.2,0.8-0.3,1.2c0,1.3,1.8,1.4,0.8,4.7l-0.4,0.2
                                    l-0.5-0.2c-0.2-0.6-0.6-1.2-1.1-1.7c-0.8-0.2-1.5,0.3-2.3,0.3c-0.8-0.6-2.4-1-2.7,0.3c0.1,0.6,0.1,1.2,0,1.7
                                    c-0.4,0.3-0.7,0.7-0.9,1.2c0.1,1.7,0.5,2.1,1.2,3.5c-0.1,0.6-0.5,0.9-0.6,1.4c-0.7,3.8,2.2,5.1,3.3,8.9c0.5,1.6,0,3.4,0.3,5
                                    c0.4,1.4,0.9,2.7,1.5,4c0.5,0.7,0.9,1.5,1.1,2.3c0.1,1,0.1,2.1,0,3.2c-0.2,1.4-0.5,2-0.2,3.6c0.3,1.2,0.6,2.5,1,3.7s1.2,2.5,1.6,3.8
                                    c0.5,1.8,0.9,3.6,1.2,5.5c0.2,1.1,0.6,2.2,0.7,3.3s0.1,2.1,0.2,3.1c0.1,0.6,0.2,1.1,0.3,1.7c0,1.4-0.2,2.2,0.5,3.5
                                    c1.1,2.2,2.4,4.4,3.8,6.4c0.9,1.2,1.8,1.3,2.8,2.2c0.7,0.7,1.4,1.4,1.9,2.2c0.3,0.8,0.6,1.7,0.8,2.5c0.7,0.5,1.6,0.8,2.1,1.4
                                    s1.1,2.6,1.6,3.2c0.8,0.8,2.2,0.6,3.1,1.1c1.7,1,3.3,3.6,4.9,4.9c0.9,0.7,2.2,1,2.8,2.2c0.4,1.3,0.6,2.6,0.6,3.9
                                    c-0.1,0.6-0.4,1.1-0.4,1.7c-0.1,1,0.3,1.4,0.5,2.2c0.1,0.4,0,0.9,0,1.3c0.1,0.3,0.2,0.7,0.4,1c0.3,1.3,0.5,2.7,0.6,4
                                    c0.1,0.7,0.4,1.5,0.5,2.2c0.1,1.1-0.6,1.2-0.6,2.2c0,0.4,0.1,0.8,0.1,1.2c-0.1,1.1-0.2,2.1-0.4,3.1l0.2,0.5c1.4,0.8,1.3,1.8,1.6,3.2
                                    c0.1,0.3,0.2,0.7,0.4,1l0.6,0.2c0.4-0.2,0.8-0.7,1.2-0.7c1.2,0.1,1.6,2.6,2.8,3.5c0.6,0.4,1.4,0.5,2,0.8c1,0.6,0.9,1.2,1.4,2
                                    s1.4,1,1.9,1.6c1.3,1.3,1.5,4.5,1.4,6.2c0,0.7-0.1,2.1-0.7,2.5h-0.5c-0.4-0.3-0.7-0.7-0.9-1.2H51c-0.1,0.8,0.6,1.2,0.9,1.9
                                    c0.1,0.5,0.2,1,0.4,1.5c0.7,1.3,2.1,1.1,3,1.9c-0.5,0.7-1.6,0.3-2.2,0.5c-0.4,0.2-0.8,0.6-1.2,0.8c-0.9,0.4-2,0.8-2.9,1.2
                                    s-2.3,0.4-3.4,0.8c-0.3,0.1-0.6,0.3-0.8,0.6c-0.1,0.2-0.2,0.4-0.3,0.6c-0.1,0.3-0.2,0.6-0.2,0.9c-0.2,1-0.4,1.9-0.7,2.8
                                    c-0.2,0.5-0.6,0.9-0.6,1.4s0.3,1.1,0.3,1.7c0,0.4-0.2,0.8-0.2,1.2c0,0.2,0.1,0.4,0.1,0.5c0,0.7-0.2,1.3-0.1,2s0.2,1.5,0.2,2.2
                                    c0,1-0.8,1.2-0.6,2.3c0.1,0.3,0.3,0.7,0.4,1c0.3,1,0.3,2.2,1,3.1c0.3,0.4,0.7,0.7,0.7,1.3c0,1-0.8,1.7-0.8,2.7c0,0.9,1.8,4,2,5.5
                                    c0.2,1-0.7,1.2-0.8,2c-0.1,0.3-0.2,3.5-0.1,3.9c0,1.4,0.2,2.8,0.4,4.2c0.3,1,1,1.8,1.1,3c0,1.8-0.2,3.5-0.4,5.2
                                    c-0.3,3.9-0.4,7.9-0.6,11.8c0,1-0.2,2-0.2,3c0.1,0.6,0.2,1.2,0.3,1.7c0.2,1.2,0.2,2.4,0.4,3.6c0.2,1.4,0,2.8,0.1,4.2
                                    c0,0.5,0.1,0.9,0.2,1.4c1.2,3.3,3.1,6.3,5.6,8.8c0.2,0.2,0.4,0.5,0.7,0.7c0.5,0.3,1,0.5,1.6,0.6c0.5,0.2,0.9,0.5,1.3,0.8
                                    c0.6,0.5,1.2,1.1,1.8,1.7c0.9,0.7,1.9,1.4,2.8,2.1c0.7,0.6,3.8,4.6,4.7,5.7c0.8,0.8,1.7,1.6,2.7,2.3c0.3,0.2,4.1,4.5,4.3,4.8
                                    c0.4,0.9,0.7,1.9,0.7,2.9c0.1,0.7,0.4,1.4,0.4,2.1c0,1.8-2.1,3.1-2.2,4.8c-0.1,2,2,4.4,2.7,6.1c0.6,1.3,0.7,2.6,1.6,3.8
                                    c1.4,1.8,3.8,2.9,4.4,5.2c0.5,1.6-0.1,2.6,0,3.6c0.3,1.5,1.7,2.4,1.9,4.1c0,0.1,0,0.1,0,0.2c-0.1,0.9-1.8,2-0.5,3.5
                                    c0.8,0.2,1.2-0.6,2.1-0.1c0.1,0.7,0.3,1.4,0.6,2.2c0.7,1.4,3.9,5.5,5.5,5.6c0.8-0.1,1.6-0.3,2.4-0.6c1.8-0.3,3.7-0.1,5.3,0.8
                                    c1.6,0.9,2.7,2.3,4.1,3.5c1.3,0.9,2.6,1.7,4.1,2.3c0.6,0.3,1,1,1.5,1.3c1.1-0.1,2.1,0.1,3.1,0.6c0.6,0.6,1.1,1.3,1.6,2
                                    c1.4,1.6,3.1,3.6,5.3,3.9l0.3,0.3v0.5c-0.4,0.6-1.3,0.4-1.6,1.2c0,0.3,0.1,0.7,0.2,1l-0.2,0.5c-1.2-0.1-1-1.2-1.8-1.7l-0.4,0.1
                                    c0,0.5,0.3,1.2,0,1.7l-0.4-0.3c-0.4-2.3-2-7.8-4.7-8.3l-0.4,0.3c0.4,1.2,1.3,1.9,1.9,2.9c1,2,1.6,4.2,1.7,6.4l0.3,0.4
                                    c1.1,0.1,2.3,0.1,3.4,0.2c1.7,0.1,3.4,0.6,5.1,0.7c0.9,0.1,1.8,0.1,2.7,0.3c0.7,0.2,1.4,0.3,2.1,0.3c-0.8-1.8-1.6-3.6-0.5-5.4
                                    l0.3-0.4c0.6-1-0.1-2.1,1.6-4.6c1-1.5,0.1-2.5,2.9-3.2c1.1-0.3,1.2-0.1,1.8-1l0.4-0.6c1.3-1.9,2.1-1.1,3.6-3.5
                                    c1.1-1.6,3.7-2.2,5.2-4.1s2.5-4.2,5-4.6c0.3,0,0.7-0.1,0.9-0.3l0.2-0.3c0.3-0.5,0.7-1,1.2-1.3l0.4-0.3c0.8-0.4,0.8-0.8,1.2-1.5
                                    c1.1-1.3,2.3-2.4,3.6-3.5c2-1.2,4.4-1,6.3-2.2l0.6-0.4c1.4-0.9,1.7-0.5,3.1-0.6c0.6-0.6,0.9-3.3,2.5-5.1s3.8-4.6,3.9-6.9
                                    c0.1-2.2,3.2-2,4.6-1.8c0.6-2.1,1-1.4,2.4-2.7v-0.4c-0.1-1.7,0.3-1.7,1.3-2.9c0.2-1-0.4-1.6,0.2-3.3l0.3-0.8c0.4-1,0.4-1.2-0.2-1.9
                                    l-0.3-0.3c-1.4-1.9-0.1-6.4,2.2-6.3c0.9,0,1.7-0.3,2.3-1l0.3-1.9c0,0,0.1-1.8-0.5-2s-1.1-2.5-1.1-2.5s-1-5-1.5-6.8
                                    c-0.5-1.7-0.7-3.4-0.8-5.1c-0.1-2.1-0.5-4.5,0.4-5.6s3.6-5.6,4.1-6.5s2.9-3.6,3.5-4.6s0.9-0.1,0.9-2.4s0.6-15.6,1.1-16.6
                                    s-0.9-0.9,1.4-1.8s2-2.5,0.9-2.9s-2.9-2.2-0.2-3.5s2.2-2.8,1.6-3.6s-1.8-2.9-2.1-3.4s-0.5-1.2,1.5-2c2.4-0.9,4.7-1.9,7-3
                                    c1.7-0.9,3.7-1.3,5.6-1.1c1.4,0.1,5.4-0.4,6.8-0.4s1.5-2.2,1.5-2.2s-0.4-3.4-0.5-4.8s1.1-2,2.4-3.9s0.8-5.4,0.8-6.4s1.6-1.6,2.4-2.5
                                    s0.6-2.9-1.4-3.8s-0.9-1.1-0.9-2.6c0.1-1-0.3-1.9-1-2.6c-1-0.8-2-1.6-3.1-2.2c-1.2-1-0.8-1.6-1.6-2.1s-1.2-1-2.1,0s-3.2,0-3.2,0
                                    c-0.1,1.3-0.1,2.9-2.4,2.7c-0.7-0.1-1.3-0.4-1.8-0.8l-0.3-0.3l-0.2-0.2c-1.1-1.1-3.4,1.5-6.1,0.4c-0.7-0.3-1.5-0.4-2.3-0.4l-1.1-2.2
                                    c0.2-0.1,0.3-0.2,0.5-0.3c0.7-1.5-1.1-4.1,1.8-5.8l0.5-0.3c0.4-0.2,0.7-0.6,0.9-1l0.4-0.7c1.5-2.2,4.4-2.4,5.1-5.1
                                    c0.7-2.4,1.9-2.7,2-5.2c0.1-1.8,1.3-3,1.3-4.9c-0.1-1.1,0.2-2.3,0.9-3.2l0.4-0.5c0.6-1.4,1-3,1-4.5c-0.4-0.3-0.6-0.8-0.7-1.2
                                    c-3.7,2.1-2.5,0.5-5.8,0.3c-1.2-0.1-2.3,0.7-3.6,0.2c-1.1-1.4-0.5-1.7-1-3c-0.3-0.7-1.2-1.3-1.4-2s0-1.7-0.4-2.3
                                    c-1.4-0.5-2,0.5-3.3,0.4c-0.8-0.2-1.5-0.3-2.3-0.4c-1,0.1-5.9,1.1-6.7,0.3s-1.6-1.7-2.4-2.5c-0.5-0.4-1-0.9-1.4-1.3
                                    c-0.2-0.2-0.3-0.6-0.6-0.8s-0.8-0.6-1.1-1c-1.1-1.4-0.8-2.6-1.1-4.1c-0.3-1.3-1.2-1.8-1.4-2.7c-0.1-0.8-0.2-1.7-0.1-2.5
                                    c-0.2-0.7-0.4-1.5-0.5-2.2c0-0.4,0.1-0.7,0.3-1.1c0.9-1.9,1-3.9,1.7-5.8c0.3-0.8,0.9-1.2,1.1-2c0.1-0.8,0.2-1.7,0.3-2.5
                                    c0.2-0.7,0.5-1.4,0.9-2c0.9-2.2-1.7-4.4-1-6.6c0.6-1.2,1.3-2.4,2.2-3.4c0.3-0.4,0.7-0.7,1-1.1c1.1-1.9,0.6-4,1.1-6
                                    c0.7-2.4,1.8-4.6,3.2-6.7c0.5-0.8,1-1.8,1.6-2.7s1.1-1.2,1.6-2c0.3-0.5,0.1-1.2,0.2-1.8c0.9-1.4,4.6-1.3,6.2-2.9
                                    c0.5-0.9-0.5-1.9-0.2-2.8c0.9-0.7,0.5-1.9,1.1-2.4c0.8-0.7,2.3-0.3,2.8-1.4s-0.5-2.2-0.8-3c-0.1-1.5,0-2.9,0.3-4.4
                                    c0.3-0.4,0.5-0.9,0.7-1.4c0.1-0.7,0-1.6,0.8-2c0.7-0.1,1.3-0.1,2,0l0.4-0.3c0.3-0.5,0.4-1,0.5-1.6c0.7-3-1.1-2.2-1-4
                                    c0.4-1,2-1,2.6-2.9c0.8-2.9-2.1-2.8-2.4-4.9c-0.2-1.2,0.3-1.6,0.7-2.7c0.3-0.8-0.5-3.6-0.7-4.3c-0.1-0.6-0.1-1.2-0.1-1.8
                                    c-0.3-0.2-0.5-0.5-0.6-0.8c-0.4-1.6-0.9-3.1-1.5-4.6c-1.1-1.9-3.9-1.8-3.6-4.6c0.5-0.7,1-1.3,1.7-1.8c1.1-0.6,3.8-0.5,4.9-0.4
                                    c0.4,0.1,0.8,0.1,1.3,0c0.9-0.2,4.1-0.7,4.8-1.4c0-1.1,0.4-2.2,1.1-3.1c1-0.5,2.1-0.5,3.1-1l0.6-0.8c0.5-4.3,1.3-8.4,2-12.7
                                    c0.5-2.9,3.3-2.6,5.5-2.6c1.1,0,3.5-0.5,4.2-1.3l0.4-1c-0.3-0.9-0.5-1.9-0.5-2.8l0.2-0.5c0.4-0.1,0.7-0.2,1-0.3
                                    c0.5-0.1,1-0.4,1.4-0.7c0.7-0.9,0.1-3.5-0.1-4.5L222.6,954.5z" />
                                <path  class="st0 fill-white" id="IHOROMBE" d="M204.9,1107.4c-0.2-1.2-0.1-2.4,0.2-3.6c0.2-0.7-0.2-2.2-0.1-3.3c0.2-1.5-0.8-1.2-0.1-3.6l0.2-0.7
                                    c0.3-1-0.3-1.8,0.1-2.8l0.2-0.5c0.4-2-0.4-3.9,1.9-4.6l0.1-0.2v-0.6c0-2.5,1.5-2.4,1.6-3.2c0.2-0.5,0.6-0.9,1.1-1.1
                                    c2.5-0.3,2.6-1.6,3.4-1.6c3.7,0.1,2.2-1.6,3.5-2.6c1.1-0.6,3.4-0.3,3.7-1.1c0.2-0.4,0.4-0.8,0.7-1.2l0.3-0.2
                                    c1.2-0.5,4.3-1.2,4.5-2.7c0.2-0.5,0.6-0.9,1.1-1.1c1.3-0.1,2.6-0.3,3.9-0.6l0.3-0.2c0.7-0.3,1.4-0.4,2.1-0.1c0.7,0.2,1-1.2,2.3-1.5
                                    l0.6-0.1l1.9-1l0.2-0.3c0.3-0.4,0.7-0.6,1.2-0.7h0.3c0.8,0.2,0.9,0.2,1.3,0.8c0.7-0.3,1.1-1,1.9-1.4c0.3-0.1,1-0.5,1.7-0.8l1.4-0.6
                                    c1.4-0.5,2.8-0.7,4.3-0.8c1.2-0.3,1.7-1.1,3.3-1.1c1,0.1,1.9,0.3,2.8,0.8c0.1,0,0.3-0.4,0.3-0.4c0.3-0.5,0.9-0.8,1.5-0.8
                                    c0.7,0.1,1.3,0.3,1.9,0.6l1,0.2l0.3,0.4c1.1-0.7,1.8-0.3,2.3,0.8l0.1,0.2c2.4,0.5,3.4,2.6,4.5,2.8h0.4c2.2,0.2,2.2,2.1,3.3,2.4
                                    c0.6-1.2,2-0.3,2.4,0.3l0.3,0.4l0.8,1.1c0.9,0.6,0.7,1,1.7,1.5c0.9,0.4,1.9,0.9,2.7,1.5c0.8,0.6,1.7,1.1,2.5,1.7
                                    c2.2,1.7,3.6,6.1,4.6,8.4c0.5,1.1,1.2,2.1,1.6,3.2c0.1,0.2,0.1,0.4,0.1,0.6l1.4,2.8l1,0.7c0.6,1.5,1.1,0.9,1.5,3.4
                                    c0.3,1.8,1.8,1.6,2.4,4.5c0.3,1.7,2.3,1.5,2.4,3.7v0.4c0,0.1,0,0.2,0,0.2c0.5,0.4,0.9,0.8,1.2,1.3l0.1,0.3c0,0.5,0.1,1,0.1,1.5
                                    l-0.7,0.9c1,2.2,4.2,1.6,5.4,3.9l0.2-0.2c1.4,0.3,3.7,1.2,4.3,2.6c0.1,2.2-0.4,2.8,0.2,5.1c0.2,0.5,0.2,1,0.2,1.5
                                    c-0.4,1.9-2.3,2.5-1.9,4.9c0.4,0.6,0.7,1.1,1,1.7l0.1,0.8c0.1,0.9,0.7,1.4,0.6,2.4c-0.7,2.2-1.6,1.2-1.5,4.7
                                    c-0.8,1.8-3.9,1.7-4.5,3.6c0.4,1.8,2,1.2,1.1,4.5c0.3,1,1.4,1.4,1.8,2.4c0.1,0.3,0.2,0.7,0.3,1c0.4,0.5,1,0.9,1.6,1.1
                                    c1.5,2.1,1,3,1.9,4.9l1.7,1.6c0,0,5.6,0.2,7.1,0.2s2.2-0.5,2.8,0.9s0.5,1.6,2.5,2.1s3.1,3.1,3.9,3.2c1.5,0.1,3.1,0,4.6-0.2
                                    c0.8-0.2,1.2-1.4,3.5-1.4s5.5-1.5,6.9-2.1s2.1-1,2.1-2.6s-1-3.5-0.1-5.6s-0.5-4.5,2.5-4.4s3.9-0.4,3.1-1.5s-0.5-3.1-0.5-4.1
                                    s0-3.5-0.6-4.4c-0.9-1.9-1.5-4-1.8-6.1c0-1.4-1.1-6-1.1-6.9c-0.1-1.1-0.5-2.2-1.2-3.1c-0.9-1.4-3.1-3.4-1.8-5s1.4-3.9,2.1-4.5
                                    s1.5-4,0.2-5.4s-1.6-2.8-2.9-3.8c-1.1-1-1.9-2.3-2.4-3.8c-0.1-0.6-1.1-1.5-0.6-2.8c0.4-1.3,0.8-2.6,1-3.9c2.2,0.5,2.2-0.4,4.5,0.9
                                    l0.6,0.4c1.4,0.9,1.5,3.2,4,2.3c1.8-0.7,2.7-1.2,2.8-3.2v-0.5l0.4,0.1c0.6,0.1,1.3,0,1.9-0.3c0.7,0.2,1.3,0.6,1.8,1
                                    c0.6,0.7,0.9,1.5,1.6,2.2l0.5,0.4c1.3,1,0.4,1.6,1.3,2.8c1.1,1.2,2.9,1.2,4,0.1c0.6-0.5,0.9-1.3,0.9-2.1c0.3,0,0.6,0,0.8,0l0.4-0.1
                                    c0.3-0.2,0.7-0.4,1-0.6c-0.1,0.2-0.2,0.7-0.5,1.6c-0.8,2.3,2.4,3.4,4.5,3.1l1.5-3c0.3-0.9,0.4-1.9,0.5-2.9c0-1,0.1-2.2,1.8-2
                                    c1,0.1,2.1,0.1,3.1-0.1c0.1-0.8,0.1-1.6,0.1-2.4c0.1-1.7,0-3.5-0.3-5.2c-0.2-0.5-3.2-1.8-1-2.8s2.4-1.5,1.8-3.1
                                    c-0.8-2-1.4-4.1-1.6-6.2c0-1.6-0.5-4.2,1-5.5s1.6-2.2,0.5-3s-0.6-2.5,0-3.4s1.6-2.8-0.5-2.8s-3.1-0.1-2-1.9s1.5-2.5,1.5-3.6
                                    s1.1-1.8-0.9-3s-1.6-2.5-1.1-3s1.6-1.6,0.1-2.8s-1.5-2.8-0.1-3.8c1.2-1,1.7-2.5,1.2-4c-0.4-1.1-2.6-1-3.1-2.5
                                    c-0.6-1.4-1.4-2.7-2.5-3.8c-0.8-0.9-1-2.9-1.1-3.8c0-1-0.8-1.8-1.8-2c-1.1-0.2-2.1-0.9-2.5-2c-0.4-1-2.9-1.6-2-2.8s-0.1-3.6-0.1-3.6
                                    c-0.1,0.9-1.5,0.6-2.2,0.6c-1.7,0.1-3.5-0.1-5.1-0.8c-2.9-1-2.4,0.9-2.9,2.2s-3,2.2-3,2.2c-1.2-0.5-2.4-1.1-3.5-1.9
                                    c-1.2-1-2.5-1.1-5.9-1.8c-2.4-0.4-4.8,0.2-6.6,1.8c-1,0.8-5-0.2-6.9,0.2s-2.8,1.4-4.5-1s-2.5-3.5-1.9-4.4s-0.5-3-1.1-3.9
                                    s-2.2-1.6-3.1,0.2s-2.9,3.2-2.9-0.4s-2.6-1.8-3.6-1.6c-1.2-0.1-2.4-0.7-3.1-1.6c-0.8-0.9-1.5-1.2-1.5-2.2s0.4-4.1,0.5-5.4
                                    c0.2-1.9-0.2-3.7-1.1-5.4c-1.2-2.2-2.6-4.5-3.8-4.9s-1-1.1-1.1-2.4s-1.9-1.4-3.5-1.5s-1.1-2.6-1.1-3.2s-0.2-1.8-3.2-2
                                    s-3.4,1.4-4.1,0.5s-2.1-3.1-2.6-3.4s-8.5-0.6-9.6-0.6c-1.2,0-2.3-0.6-3-1.6c-0.6-1-3.4-0.2-4.5,0.1s-3.5-1.1-4.2-1.2
                                    s-2.2-0.1-2.4-0.8s0.8-1.5-1.9-2.8s-0.9,1.9-2.2,2.2c-1.1,0.4-2.1,0.9-3,1.6c-0.1-0.2-0.3-0.3-0.5-0.5c-3.1-2-3.8,2-5.4,1l-0.4-0.2
                                    c-1.3-0.8-2.4-0.2-3.3,0.8c-0.9-1.3-0.9-1.1-2.2-1.3c-1.1-1.5,0-2.3-2.5-3.6l-0.6-0.3c-0.2-0.1-0.3-0.2-0.5-0.3l-0.3-0.4
                                    c-1-1.4-1.9-1.2-3.4-1.2c-0.7-0.5-1.5-0.8-2.4-0.8c-3-0.2-1.6-0.1-3.1-2c-1.2-1.5-1.9-3-4.1-3.2h-0.6c-0.9-0.5-2-0.8-3-0.7
                                    c-0.4,0.2-0.8,0.4-1.2,0.5c-0.3,0.1-0.7,0.3-1,0.3l-0.2,0.5c0.1,1,0.2,1.9,0.5,2.8l-0.4,1c-0.8,0.8-3.1,1.3-4.2,1.3
                                    c-2.2,0-5.1-0.3-5.5,2.6c-0.7,4.3-1.5,8.3-2,12.7l-0.6,0.8c-1,0.5-2.1,0.5-3.1,1c-0.7,0.9-1.1,2-1.1,3.1c-0.7,0.7-3.9,1.2-4.8,1.4
                                    c-0.4,0-0.8,0-1.3-0.1c-1.2-0.1-3.9-0.1-4.9,0.4c-0.6,0.5-1.2,1.1-1.7,1.8c-0.2,2.8,2.5,2.7,3.6,4.6c0.6,1.5,1.1,3,1.5,4.6
                                    c0.1,0.3,0.4,0.6,0.6,0.8c0,0.6,0.1,1.2,0.1,1.8c0.2,0.8,1,3.5,0.6,4.3c-0.4,1-0.9,1.4-0.7,2.7c0.3,2,3.2,2,2.4,4.9
                                    c-0.6,2-2.2,2-2.6,2.9c-0.1,1.9,1.7,1,1,4c-0.1,0.6-0.2,1.1-0.5,1.6l-0.4,0.3c-0.7-0.1-1.3-0.1-2-0.1c-0.7,0.4-0.6,1.3-0.8,2
                                    c-0.2,0.5-0.4,1-0.7,1.4c-0.3,1.4-0.4,2.9-0.3,4.4c0.3,0.9,1.2,2.1,0.8,3s-2,0.7-2.8,1.3c-0.6,0.5-0.2,1.6-1.1,2.4
                                    c-0.2,1,0.7,1.9,0.2,2.8c-1.6,1.6-5.3,1.5-6.2,2.9c-0.1,0.6,0,1.2-0.2,1.8c-0.4,0.8-1.1,1.3-1.6,2s-1,1.8-1.6,2.7
                                    c-1.4,2-2.5,4.3-3.2,6.7c-0.5,2,0,4.1-1.1,6c-0.3,0.4-0.7,0.7-1,1.1c-0.9,1-1.6,2.1-2.2,3.4c-0.8,2.2,1.9,4.5,1,6.6
                                    c-0.4,0.6-0.7,1.3-0.9,2c0,0.8-0.1,1.7-0.3,2.5c-0.2,0.7-0.9,1.2-1.1,1.9c-0.7,1.9-0.8,3.9-1.7,5.8c-0.2,0.3-0.3,0.7-0.3,1.1
                                    c0.1,0.7,0.3,1.5,0.5,2.2c0,0.8,0,1.7,0.1,2.5c0.2,0.9,1.1,1.4,1.4,2.7c0.4,1.6,0,2.8,1.1,4.1c0.3,0.4,0.8,0.7,1.1,1
                                    s0.4,0.6,0.6,0.8c0.5,0.5,0.9,0.9,1.4,1.3c0.8,0.8,1.6,1.6,2.4,2.4s5.7-0.2,6.7-0.3c0.8,0.1,1.6,0.2,2.3,0.4c1.3,0.1,2-0.9,3.3-0.4
                                    c0.4,0.6,0.2,1.6,0.4,2.3s1.1,1.3,1.4,2c0.5,1.3,0,1.7,1,3c1.3,0.5,2.4-0.3,3.6-0.2c3.3,0.2,2.1,1.8,5.9-0.4
                                    C203,1107.9,203.6,1106.9,204.9,1107.4L204.9,1107.4z" />
                                <path  class="st0 fill-white" id="ANOSY"
                                    d="M309.6,1154.9c-0.9-2-0.3-2.8-1.9-4.9c-0.7-0.2-1.2-0.6-1.7-1.1c-0.2-0.3-0.2-0.7-0.4-1
                                    c-0.5-0.9-1.5-1.3-1.8-2.4c0.9-3.4-0.8-2.7-1.2-4.5c0.6-2,3.7-1.8,4.5-3.6c-0.1-3.5,0.9-2.5,1.5-4.7c0-1-0.6-1.5-0.6-2.4l-0.1-0.8
                                    c-0.3-0.6-0.6-1.2-1-1.7c-0.3-2.4,1.5-2.9,1.9-4.8c0.1-0.5,0-1-0.2-1.4c-0.6-2.4-0.1-2.9-0.2-5.1c-0.6-1.4-2.9-2.4-4.3-2.6l-0.2,0.2
                                    c-1.2-2.3-4.4-1.7-5.4-3.9l0.7-1c-0.1-0.5-0.1-1-0.1-1.5l-0.1-0.3c-0.4-0.5-0.8-1-1.2-1.3c0-0.1,0-0.2,0-0.2v-0.4
                                    c-0.1-2.2-2-2-2.4-3.7c-0.6-2.9-2.1-2.7-2.4-4.5c-0.4-2.5-0.9-1.9-1.5-3.4l-1-0.7l-1.4-2.8c-0.1-0.2-0.1-0.4-0.1-0.6
                                    c-0.4-1.1-1.1-2.1-1.6-3.2c-1-2.3-2.5-6.7-4.6-8.4c-0.8-0.6-1.7-1.2-2.5-1.7c-0.9-0.6-1.8-1.1-2.7-1.5c-1-0.5-0.7-0.9-1.6-1.5
                                    l-0.8-1.1l-0.3-0.4c-0.4-0.6-1.9-1.6-2.4-0.3c-1.1-0.3-1.1-2.2-3.3-2.4h-0.4c-1.1-0.1-2.1-2.3-4.5-2.8l-0.1-0.2
                                    c-0.5-1.1-1.1-1.5-2.3-0.8l-0.3-0.4l-1-0.2c-0.6-0.3-1.3-0.4-1.9-0.6c-0.6,0-1.2,0.3-1.5,0.8c0,0-0.3,0.3-0.4,0.4
                                    c-0.9-0.4-1.8-0.7-2.8-0.8c-1.6,0-2,0.8-3.3,1.1c-1.5,0.1-2.9,0.4-4.3,0.8l-1.4,0.6c-0.7,0.3-1.5,0.7-1.7,0.8
                                    c-0.8,0.3-1.2,1-1.9,1.4c-0.5-0.7-0.6-0.7-1.3-0.8h-0.3c-0.5,0.1-0.9,0.3-1.2,0.7l-0.2,0.3l-1.9,1l-0.6,0.1
                                    c-1.2,0.2-1.5,1.6-2.3,1.5c-0.7-0.3-1.4-0.3-2.1,0.1l-0.3,0.2c-1.3,0.3-2.6,0.5-3.9,0.6c-0.5,0.2-1,0.6-1.1,1.1
                                    c-0.2,1.5-3.3,2.2-4.5,2.7l-0.3,0.2c-0.3,0.4-0.5,0.8-0.7,1.2c-0.4,0.8-2.6,0.5-3.7,1.1c-1.3,1.1,0.2,2.8-3.5,2.6
                                    c-0.8,0-0.9,1.3-3.4,1.6c-0.5,0.2-0.9,0.6-1.1,1.1c-0.1,0.8-1.6,0.8-1.6,3.2v0.6l-0.1,0.2c-2.3,0.7-1.4,2.6-1.9,4.6l-0.2,0.5
                                    c-0.4,1,0.2,1.8-0.1,2.8l-0.2,0.7c-0.7,2.4,0.2,2.2,0.1,3.6c-0.1,1.1,0.3,2.5,0.1,3.3c-0.3,1.2-0.3,2.4-0.2,3.6
                                    c-1.2-0.4-1.8,0.5-1.9,1.9c0.1,0.5,0.3,0.9,0.7,1.2c-0.1,1.6-0.4,3.1-1,4.5l-0.4,0.5c-0.7,0.9-1.1,2-0.9,3.2c0,1.9-1.2,3.1-1.3,4.9
                                    c-0.1,2.5-1.3,2.8-2,5.2c-0.8,2.7-3.7,3-5.1,5.1l-0.4,0.7c-0.2,0.4-0.5,0.8-0.9,1l-0.5,0.2c-3,1.6-1.1,4.3-1.8,5.8
                                    c-0.1,0.1-0.3,0.2-0.4,0.3l1.1,2.2c0.8,0,1.6,0.1,2.3,0.4c2.7,1.1,5-1.4,6.1-0.4l0.2,0.2l0.3,0.3c0.5,0.5,1.1,0.8,1.8,0.8
                                    c2.3,0.2,2.4-1.4,2.4-2.7c0,0,2.4,1,3.2,0s1.2-0.5,2.1,0s0.4,1.1,1.6,2.1c1.1,0.7,2.1,1.4,3.1,2.2c0.7,0.7,1.1,1.7,1,2.6
                                    c0,1.5-1.1,1.8,0.9,2.6s2.1,2.9,1.4,3.8s-2.4,1.5-2.4,2.5s0.5,4.5-0.8,6.4s-2.5,2.5-2.4,3.9s0.5,4.8,0.5,4.8s2.2,0.8,2.6,2.5
                                    s0.2,2.6,1.9,3.6c1.3,0.8,2.1,2.3,2.1,3.9c0,1.1-0.1,3.8-1.5,4.1s-1.5,2.1-0.5,3.1c0.8,0.8,1.1,1.9,1,3c-0.1,0.6,1.4,2.6,2.2,3
                                    c1.5,0.4,3.1,0.2,4.4-0.6c1-0.9,0.5-2.6,2.8-1.2s1.4,1.1,3.8-0.2s1-1.4,4.1-3s2.8-1,2.6,1.1s1.1,2.5,2.1,1.8s4-0.8,4.9-0.8
                                    s0.9,0.6,1.9,2.5s0.9,2.1,2,2.8s0.9,0.9,2.1,0.6s2.1,0.9,2.4,2.1c0.3,1.9,0.3,3.9,0.1,5.9c-0.2,1.1-3.9,8-4,8.6s-1.5,3.1,1,2.9
                                    c1.3-0.2,2.7-0.1,4,0.2c0.3,1.1,0.4,2.2,0.5,3.2c-0.1,0.5,1.2,4.8,1.8,5.9c0.4,1.1,1.4,1.8,2.5,1.9c1.1,0,3.8,1.6,3.8,3.1
                                    s0.8,5.8,1.8,6.5s0.4,3.2-0.9,3.2s-2.5,0.8-3.2-0.1s-2.8-1-2.5,0.5s0.8,3.8,1.4,4.5s2.1,5,2.6,6s1.2,4,0.2,4.1s-3.1,0-3.2,0.5
                                    c0.4,1.4,1.1,2.7,2.2,3.8c0.9,0.5,2.6,1.4,2.6,1.4c0.3,1.1,0.4,2.2,0.2,3.4c-0.4,1.4-0.9,2.7-1.6,4c-0.8,0.3-1.6,0.6-2.4,0.8
                                    c-0.8,0.1,0.1,2,0.9,2.8c0.9,1.1,1.6,2.5,2,3.9c0.2,1.1,0.8,2.9,2.6,3.2s2.4-0.1,2.6,1.1c0.2,0.9,0.3,1.8,0.2,2.8
                                    c-0.2,1.4,0.2,2.9,1.1,4c1.5,1.8,3.6,1.6,4.8,1.6s3.9,1.8,4.4,2.5s0.8,3,2,3.9c2.8,1.7,5.6,3.3,8.6,4.6c1.8,0.6,1.9,2.1,2,3.6
                                    c0.2,0.9-0.1,1.8-0.6,2.5c-0.4,1-0.6,2-0.8,3l-0.3,3.5c2.3-0.8,4.6-1.5,6.9-2.2c0.4-0.1,0.8-0.1,1.2-0.2c1.5-0.2,3.2-0.7,4.7-0.9
                                    s3.4-0.2,5.1-0.5c1.2-0.3,2.4-0.6,3.5-0.7c1.4-0.1,2.8,0,4.1,0.1c0.8,0.1,1.7,0.2,2.5,0.3c2,0.4,3.8,1.3,5.9,1.2
                                    c0.1-0.1,0.3-0.1,0.4-0.1c1.1-0.1,1.4,0.5,2.1,1c0.3,0.1,0.7,0.3,1.1,0.3c1.7-0.8,3.4-1.4,5.1-1.9c0.9-0.2,1.8-0.2,2.6-0.4
                                    c0.5-0.1,0.9-0.3,1.3-0.5c0.2-0.3,0.3-0.7,0.3-1.1c-0.2-0.2-0.3-0.6-0.3-0.9c1.3-0.3,2.2,0.8,3.4,0.8c0.8-0.4,1.2-1.5,1.7-2.2
                                    c0.4-0.5,0.9-1,1.4-1.4l0.2-0.6c0.2,0,0.5,0.3,0.6,0.5l0.6,0.1c2.7-2.5,4.6-5.2,8.6-5.3l0.1-0.3c-0.6-0.1-1.1-0.3-1.7-0.5l-0.1-0.6
                                    c0.2-0.3,0.5-0.5,0.8-0.6c1.1,0.2,2.1,0.6,3.1,1.1l0.1,0.6c0.4,0.6,2.8,0.8,3.5,0.7c0-0.6-0.4-1-0.5-1.6c0.1-0.8,1.3-1,1.7-1.8
                                    l0.6,0.1c0.3,0.4,0.7,0.7,1.1,1l0.3-0.4c0.1-0.8-0.1-1.5-0.5-2.2c0.2-1.2,2.7-2.9,3.8-3.2c1-0.3,2.1-0.4,3.2-0.4
                                    c1,0.1,1.7,0.9,2.7,0.9c0.1-0.1,0.1-0.3,0.1-0.4c0-0.6,0-1.3-0.1-1.9c0-0.9,0.2-1.7,0.2-2.6c0-0.2,0-0.4,0-0.7
                                    c-0.1-0.7-0.6-1.2-0.9-1.9c0.1-0.3,0.2-0.7,0.4-0.9l0.6-0.1l0.5,0.2c0.2,0.5,0.4,0.9,0.6,1.4l0.6,0.1c0.5-0.5,1.1-0.9,1.1-1.7
                                    c-0.4-0.4-1-0.3-1.4-0.7c-0.2-0.6-0.2-1.2-0.1-1.8c0.1-0.4,2.1-4.7,2.4-5.2c0.8-1.3,1.8-2.4,2.9-3.3c0.3-0.2,0.7-0.3,1-0.4l0.3-0.4
                                    c0.2-1.4-0.8-3.2-0.4-5.6c0.4-2.2,1.4-3.5,2.3-5.3c0.7-1.7,1.3-3.4,1.8-5.2c0.8-1.9,1.7-3.8,2.8-5.5c0.8-1.6,1.4-3.3,2-5
                                    c0.3-1.2,0.5-2.3,0.7-3.5c0.3-1.3,0.6-2.7,0.9-4c0.2-0.9,0.6-1.8,0.8-2.7s0.3-2,0.5-2.9s1.5-2,2.1-2.8c0.6-1,0.9-2.1,0.9-3.3
                                    c-0.2-0.9-1.7-2.6-0.5-3.5h0.5c1,0.3,0.6,1.4,1.3,2c0.9-0.9,3.4-7.9,3.8-9.4c0.5-2,0.7-4.5,1.6-6.6c-1.5-1.7-3.2-3.3-5.1-4.6
                                    c-0.6-0.3-1.4-0.5-2-0.8c-0.9-0.5-1.6-1.3-2.4-1.8c-1.2-0.6-3-0.3-3.9-1c-0.5-0.4-0.9-1-1.4-1.4c-0.9-0.7-2-0.5-2.9-1.3
                                    s-1.8-2-3.1-2.6c-1.5-0.6-3.3-0.2-4.9-0.9c-1.2-0.5-2.4-1.9-3.9-1.8l-0.9,0.5c-0.2,1,0.1,1.8,0,2.8l-0.1,0.8c0.3,1.9,1,2.3,0.8,4.6
                                    c-0.5,1-1.6,1.6-2.7,1.4c-0.5,0.5-1.1,0.8-1.8,1c-1.7-0.2-1.8-1.9-3.1-2.4c-3.2,0.1-3,4.1-2.2,6.2c0.4,0.9,0.9,1.9,1.4,2.8
                                    c0.7,1.2,1.7,2.2,1.8,3.7c-0.4,1.9-1.5,1.9-2.4,3.2s-0.8,2.9-1.7,3.8c-1.8,1.9-3.2,2.1-5.7,2.7c-1.2,0.3-2.4,0.5-3.7,0.6
                                    c-2.4-1-2-5.5-1.4-7.4s2.1-2.6,0.6-4.9c-1.1-1.7-4.6-7-6.8-7.2c-1.1-0.1-2.4,0.7-3.4,0.7c-0.8,0.1-3.8,0-4.5-0.6
                                    c-1-1.8,0.3-5.4-2.4-6.8l-0.4-1c0.4-0.6,0.6-1.3,0.7-2c0-0.1-0.3-0.8-0.4-0.9c-2.2-1.6-4.5-3-7-4.2c-0.7-0.2-1.5-0.3-2.3-0.6
                                    c-1-0.3-2.1-0.9-3.2-1.1c-0.1,0-0.9,0.2-1,0.2c-1.8-0.2-3.6-0.8-5.1-1.7c-1.7-1.1-1.3-3.2-2.5-4.4s-3.6-0.9-3.6-3.4
                                    c-0.9-1.2-2.8-0.6-4-1.6c-0.5-1.5-0.3-3.2,0.5-4.6c0.1-0.3,0.4-0.6,0.5-0.8c0.5-1.4,0.7-2.8,1.6-4c0.5-0.5,0.9-1,1.2-1.6
                                    c0.4-1.4,1-2.7,1.6-3.9c0.7-1,2.4-1.8,2.8-2.8c0.3-1.6,0.4-3.3,0.1-5l-1.5-1.3L309.6,1154.9z" />
                                <path  class="st0 fill-white" id="ATSIMO_ATSINANANA" d="M394.4,1205.7c-0.6-0.3-1.4-0.5-2-0.8c-0.9-0.5-1.6-1.3-2.4-1.8c-1.2-0.6-3-0.3-3.9-1
                                    c-0.5-0.4-0.9-1-1.4-1.4c-0.9-0.7-2-0.5-2.9-1.3s-1.8-2-3.1-2.6c-1.5-0.6-3.3-0.3-4.9-0.9c-1.2-0.5-2.5-1.9-3.9-1.8l-0.9,0.5
                                    c-0.2,1,0.1,1.9,0,2.8l-0.1,0.8c0.3,1.8,1,2.3,0.8,4.6c-0.5,1-1.6,1.6-2.7,1.4c-0.5,0.5-1.1,0.8-1.8,1c-1.8-0.2-1.8-1.9-3.1-2.4
                                    c-3.2,0.1-3,4.1-2.2,6.2c0.4,0.9,0.8,1.9,1.4,2.8c0.7,1.2,1.7,2.2,1.8,3.7c-0.4,1.9-1.5,1.9-2.4,3.2c-0.8,1.1-0.8,2.9-1.7,3.8
                                    c-1.8,1.9-3.2,2.1-5.7,2.7c-1.2,0.3-2.4,0.5-3.7,0.6c-2.4-1-2-5.5-1.4-7.4s2.1-2.7,0.6-4.9c-1.1-1.7-4.6-7-6.8-7.2
                                    c-1.1-0.1-2.4,0.7-3.4,0.8c-0.8,0.1-3.8,0-4.5-0.6c-1-1.8,0.3-5.4-2.4-6.8l-0.4-1c0.4-0.6,0.6-1.3,0.7-2c0-0.1-0.3-0.8-0.3-0.9
                                    c-2.2-1.6-4.5-3-7-4.2c-0.7-0.2-1.5-0.3-2.2-0.6c-1-0.3-2.1-0.9-3.2-1.1c-0.1,0-0.9,0.2-1,0.2c-1.8-0.2-3.6-0.8-5.1-1.7
                                    c-1.7-1.1-1.3-3.2-2.5-4.4s-3.6-1-3.6-3.4c-0.9-1.3-2.8-0.6-4-1.6c-0.5-1.5-0.3-3.2,0.5-4.6c0.2-0.3,0.4-0.6,0.5-0.9
                                    c0.5-1.4,0.7-2.8,1.6-4c0.5-0.5,0.8-1,1.2-1.6c0.4-1.4,1-2.7,1.6-3.9c0.7-1,2.4-1.8,2.8-2.8c0.3-1.6,0.4-3.2,0.3-4.7
                                    c0,0,5.6,0.2,7.1,0.2s2.2-0.5,2.8,0.9s0.5,1.6,2.5,2.1s3.1,3.1,3.9,3.2c1.5,0.1,3.1,0,4.6-0.2c0.8-0.2,1.2-1.4,3.5-1.4
                                    s5.5-1.5,6.9-2.1s2.1-1,2.1-2.6s-1-3.5-0.1-5.6s-0.5-4.5,2.5-4.4s3.9-0.4,3.1-1.5s-0.5-3.1-0.5-4.1s0-3.5-0.6-4.4
                                    c-0.9-1.9-1.5-4-1.8-6.1c0-1.4-1.1-6-1.1-6.9c-0.1-1.1-0.5-2.2-1.2-3.1c-0.9-1.4-3.1-3.4-1.8-5s1.4-3.9,2.1-4.5s1.5-4,0.2-5.4
                                    s-1.6-2.8-2.9-3.8c-1.1-1-1.9-2.3-2.4-3.8c-0.1-0.6-1.1-1.5-0.6-2.8c0.4-1.3,0.8-2.6,1-3.9c2.2,0.5,2.2-0.4,4.5,0.9l0.6,0.4
                                    c1.4,0.9,1.5,3.2,4,2.3c1.8-0.6,2.7-1.2,2.8-3.2v-0.5l0.4,0.1c0.6,0.1,1.3,0,1.9-0.3c0.7,0.2,1.3,0.6,1.8,1c0.6,0.6,0.9,1.5,1.6,2.2
                                    l0.5,0.4c1.3,1,0.4,1.6,1.3,2.8c1.1,1.2,2.9,1.2,4,0.1c0.6-0.5,0.9-1.3,0.9-2.1c0.3,0,0.6,0,0.8,0l0.4-0.1c0.4-0.2,0.7-0.4,1-0.6
                                    c-0.1,0.2-0.2,0.7-0.5,1.6c-0.8,2.3,2.4,3.4,4.5,3.1l1.5-3c0.3-0.9,0.4-1.9,0.5-2.9c0-1,0.1-2.2,1.8-2c1,0.1,2.1,0.1,3.1-0.1
                                    c0.1-0.8,0.1-1.6,0.1-2.4c0.1-1.7,0-3.5-0.3-5.2c-0.2-0.5-3.2-1.8-1-2.8s2.4-1.5,1.8-3.1c-0.8-2-1.4-4.1-1.6-6.2
                                    c0-1.6-0.5-4.2,1-5.5s1.6-2.2,0.5-3s-0.6-2.5,0-3.4s1.6-2.8-0.5-2.8s-3.1-0.1-2-1.9s1.5-2.5,1.5-3.6s1.1-1.8-0.9-3s-1.6-2.5-1.1-3
                                    s1.6-1.6,0.1-2.8s-1.5-2.8-0.1-3.8c1.2-1,1.7-2.5,1.2-4c-0.4-1.1-2.6-1-3.1-2.5c-0.6-1.4-1.4-2.7-2.5-3.8c-0.8-0.9-1-2.9-1.1-3.8
                                    c0-1-0.8-1.8-1.8-2c-1.1-0.2-2.1-0.9-2.5-2c-0.4-1-2.9-1.6-2-2.8s-0.1-3.6-0.1-3.6c0.1-0.9-0.4-2.4,1.6-2.2s4-0.6,4,0.6
                                    s-0.5,1.5,0.9,2.4c1.4,1.1,3,2.1,4.6,2.9c2.5,1.1,8.8,3.9,9.9,4.9s2.4,0.6,2.4,2.2v5c0,0.8,0.1,1.4,1.8,1.6c1,0.3,2.1,0,2.8-0.9
                                    c0.8-0.8,1.8-1,1.9-0.1s1.2,1.5,1.4-0.2s1-2.5,3.2-2s3,1.2,3,2.5s-0.4,3.2,1.2,3.6s3.9,1.5,4.1,2.1s6.5,6,7.1,6.6s4.8,2.5,5.5,0.9
                                    s3.2-2.2,3.5,0.4s0.6,3.1,1.9,3.1s2.1,0.2,3.5-1s2-1.9,3.2-3.1s5.1-1.8,5.6,0.1s0.9,2.4,2.6,2.6s5.8,0.6,5.8,0.6
                                    c0.1,0.9-0.1,1.9-0.3,2.8c-0.2,1-0.2,2.1-0.4,3.1c-0.3,1.5-0.8,2.9-1.2,4.4c-0.2,0.9-0.4,1.9-0.6,2.8c-0.4,1.1-0.7,2.2-0.9,3.3
                                    c-0.3,2.2-0.4,4.4-0.4,6.5c0.1,1.1,0.1,2.2,0.1,3.3c-0.1,1-0.3,2-0.6,2.9c-0.5,1-0.8,2.1-1,3.2c-0.1,1.5,0.4,3,0.1,4.5
                                    c-0.4,1.4-0.9,2.8-1.5,4.1c-0.2,0.4-0.2,0.8-0.4,1.2c-0.4,0.8-0.8,1.6-1,2.4c-0.5,1.7-0.1,3.4-0.5,5c-0.7,3.1-2.7,5.8-3.8,8.8
                                    c-0.3,0.8-0.6,1.7-1,2.5c-0.8,2.1-0.2,4.6-0.2,6.8c0,1.8-0.3,3.6-0.9,5.3c-0.4,1.1-0.7,2.1-1.1,3.2c-0.2,0.6-0.6,1.2-0.9,1.9
                                    c-0.4,1.3-0.5,2.6-1,3.9c-0.4,1-1,1.9-1.4,2.9c-0.5,1.8-1,3.5-1.7,5.2c-0.9,1.8-2,3.7-2.7,5.6c-0.6,1.5-0.9,3.2-1.5,4.7
                                    c-0.6,1.3-1.1,2.6-1.6,4c-0.1,1.3-0.2,2.7-0.1,4c-0.1,1-0.4,1.9-0.6,2.8c-0.2,1.1-0.3,2.3-0.5,3.5c-0.2,0.9-0.4,1.9-0.6,2.9
                                    c-0.6,2-1.5,3.9-1.6,6c-0.2,2.6,0.2,5.2-0.6,7.8c-0.8,2.7-2.2,4.7-3.2,7.2c-0.6,1.5-1,3.1-1.7,4.6s-1.6,2.5-2.2,3.8
                                    s-1.7,4.7-2.3,5.6c-0.2,0.3-0.6,0.4-0.9,0.5c-0.2-0.2-0.4-0.5-0.6-0.6c-0.4,0.3-0.6,0.7-0.9,1c-0.5,0-1.1-0.1-1.5-0.5l-0.4,0.2
                                    l-0.2,0.5c0.1,0.3,0.3,0.6,0.5,0.9c0.6,0.2,1.2,0.3,1.8,0.1l0.4,0.2l0.1,0.6c-0.6,1.2-1.3,2.4-2,3.6c-0.5,0.9-0.9,1.9-1.4,2.8
                                    c-0.3,0.4-0.6,0.8-0.9,1.3C398,1208.5,396.3,1207,394.4,1205.7L394.4,1205.7z" />
                                <path  class="st0 fill-white" id="VATOVAVY"
                                    d="M509.9,841.3c-0.5,1.9-2.6,9.4-2.9,10.3c-0.8,2.1-1.1,4.3-1.8,6.5c-0.3,0.9-0.4,1.9-0.7,2.7
                                    c-0.4,1-0.6,2.2-1,3.2c-1.1,2.9-2,6-2.7,9c-0.4,1.7-0.8,3.5-1.1,5.2c-0.3,1.4-0.4,2.8-0.6,4.2c-0.1,0.7-0.7,1.3-0.9,1.9
                                    c-0.1,0.4-0.1,0.8-0.2,1.2c-0.2,0.7-0.5,1.4-0.7,2.1c-0.2,1.1-0.4,2.3-0.7,3.4c-0.3,1.1-0.8,2.1-1,3.2c0,0.4-0.1,0.8-0.2,1.2
                                    l-0.6-0.1l-0.5,0.2l-0.3,0.3c-1,0.6-1.4,1.8-1,2.9h0.5c0.2-0.6,0.6-1.1,1.2-1.4h0.6c0.4,0.2,0.6,0.6,0.7,1c0.5,2-1.4,3.9-2.3,5.6
                                    c-0.3,0.6-0.5,1.3-0.6,2c-0.3,1-0.3,2.1-0.5,3.2c-0.2,1.1-0.7,2.1-0.9,3.2c-0.2,1.4-0.5,2.7-0.9,4.1c-0.3,0.8-0.6,1.6-1,2.4
                                    c-0.6,1-1.6,1.8-1.9,2.9c-0.7,2.1,0,4.2-0.2,6.4c-0.3,1.7-0.7,3.4-1.3,5c-0.3,1.2-0.7,2.5-1.1,3.7c-0.2,0.7-0.7,1.3-0.9,1.9
                                    c-0.4,1.2-0.6,2.6-1,3.8c-0.3,0.9-0.6,1.7-1,2.5c-0.3,0.5-0.6,1.1-0.8,1.7c-0.2,0.8-0.6,1.6-0.9,2.5s-0.4,1.8-0.7,2.7
                                    c-0.2,0.7-0.6,1.3-0.8,2c-0.4,1.2-0.8,2.5-1,3.8c-0.1,0.6-0.2,1.2-0.4,1.7c-0.6,1.7-1.4,3.2-1.9,5c-0.1,0.4-0.2,0.7-0.3,1
                                    c-1.1,0.2-2.4,0.5-4.1,0.9c-4.3,0.9-12.3-1-14.6-1.7c-2.4-0.7,1-3.7,0-6.1c-1-2.4-3.1-3.8-7.5-1.4c-4.4,2.4-6.5,3.8-8.6,2.8
                                    s-5.3-2.9-7.4-3.9c-2-1-3.6-0.1-7.3-2.3c-0.5-0.3,0.8,3.1,0,4.1s-12.1,0-13.8,0s2-10.2,2.4-12.9c0.3-2.6-1.7-3.1-4.1-3.1
                                    c-1.8,0-9.7-1.7-13.2-2.4c0-0.2,0-0.4,0-0.6c0.1-1.5-1.1-1.4,0.1-2.2s1.8-2,0.4-3.2s-1.5-1.6-0.4-2.5s0.5-1.1-0.5-2.6
                                    s-0.8-2,0.2-4.1c0.9-1.9,1.4-3.9,1.5-6c0-1.1-0.1-1.5,1.2-1.5c1.4,0,1.3-0.2,1.4-2.5s0.1-6.5-0.9-6.6s-5.4-0.1-6.4-0.5
                                    s-2.2-2.4-2.2-2.4s-0.4-4.1,0-5.5c0.6-1.4,1.6-2.6,3-3.4c1.4-0.9,3.2-0.4,4.1-0.4s2.6-0.5,3,1.1s2.5,2.4,2.5,0.4s0.2-5.8,0.1-6.8
                                    c-0.3-1.1-0.8-2.1-1.5-3c-0.6-1.1-1.3-3,0.6-4.2s3.1-2.6,3-3.9c-0.1-1.2-1.2-4.5,0.8-4.6c1.5,0,3,0.1,4.5,0.2c1.1,0,3.8,0.6,4.8-1.1
                                    s2.1-3.4,1.9-4.1c-0.3-1-0.8-1.9-1.4-2.8c-0.5-0.6-0.5-5-0.5-5.6c0.1-1.4,0.5-2.9,1.2-4.1c0.9-1.1,1.9-3.9,3.9-4.6s3-1.7,1-2.9
                                    s-2.6-2.1-1.4-2.9c1.1-0.8,1.8-1.9,2.2-3.1v0.1c0.1-0.5,1.5-3.7,1.5-3.7c2.8,0.4,2.1,1.2,3.7,2.4c0.4,0.3,1,0.3,1.3,0.8
                                    c0.6,0.9,1.2,2.4,2.5,2.4c0.6-0.1,1.1-0.2,1.7-0.4c1.1-0.2,2.7,0.2,3.6-0.3c0.8-0.7,1.6-1.2,2.6-1.6c1.9-0.6,3.8,0.8,5.9,0.3
                                    c0.6-0.1,1.5-1.4,2.4-1.9c0.8-0.5,1.7-0.7,2.7-0.8c3.4-0.5,3.7,1.4,5.7,3.1c1.1,0.9,3.2,0.7,3.8-0.7c0.2-0.7-0.9-1.6-1-2.4
                                    c-0.3-1.4,0.8-3.3,1.7-4.4l1.7-2.4c0.2-0.3,0.2-1.8,0.5-2.3c0.2-0.6,1-1,1.3-1.4c0.5-0.6-0.4-2.2,1.5-3.2l0.2-0.6
                                    c-0.4-0.9-1.2-1.1-1.1-2.3c0.7-1.3,2.2-2,3.6-1.9c2,0.9,2.2,3.1,3.5,4.8c0.4,0.5,0.9,1,1.4,1.4c0.5,0.3,0.9,0.6,1.4,0.8
                                    c4.6,3.1,6.2-0.3,8.9,0.1c0.9,0.5,0.9,1.2,1.3,1.5c0.7,0.2,1.3,0.5,1.9,0.9c2.5,2.4-0.3,4.9,2,6.7c0.4,0.4,1.8,0.2,2.4,0.4
                                    c1.1,0.4,2.2,0.7,3.3,0.9c2.1,0.2,4.1-0.1,6.1-0.1c0.8,0,1.7,0.2,2.6,0.2C504.5,839.5,509.3,841,509.9,841.3z" />
                                <path  class="st0 fill-white " id="FITOVINANY"
                                    d="M475.4,965.3c-0.4,1.5-0.7,3-1.1,4.5c-0.3,1.1-0.8,2.1-1,3.1c-0.5,1.6-0.8,3.3-1.3,4.9
                                    c-0.6,1.6-1.5,3.2-2.2,4.8c-0.4,1-0.8,2-1.2,3c-0.2,0.7-0.4,1.4-0.6,2.1c-0.5,1.1-1.4,1.9-1.9,2.9c-0.9,1.7-1.8,3.4-2.7,5
                                    c-0.2,0.3-0.3,0.7-0.4,1c-0.3,0.8-0.7,1.6-1,2.4c-0.6,1.6-0.9,3.2-1.5,4.8c-0.9,2.3-2.7,4.7-3.5,6.9c-1.1,3-1.2,6.3-2.3,9.3
                                    c-0.4,1.2-1.5,3.4-1.7,4.5c-0.2,1.3-0.5,2.7-0.9,3.9c-0.5,1-0.8,2-1.1,3.1c-0.1,0.6-0.1,1.2-0.2,1.8c-0.2,1.3-0.6,2.6-1,3.9
                                    c-0.5,1.6-1.6,2.5-2.3,3.9c-0.6,1.1-1,2.2-1.5,3.3c-0.3,0.8-0.3,1.7-0.7,2.7c0,0-4-0.4-5.8-0.6s-2.1-0.8-2.6-2.6
                                    c-0.5-1.9-4.4-1.4-5.6-0.1s-1.9,1.9-3.2,3.1s-2.2,1-3.5,1s-1.6-0.5-1.9-3.1s-2.8-2-3.5-0.4c-0.8,1.6-4.9-0.2-5.5-0.9
                                    c-0.6-0.6-6.9-6-7.1-6.6s-2.5-1.7-4.1-2.1s-1.2-2.4-1.2-3.6s-0.8-2-3-2.5s-3.1,0.2-3.2,2s-1.2,1.1-1.4,0.2c-0.1-0.9-1.1-0.6-1.9,0.1
                                    c-0.6,0.9-1.8,1.2-2.8,0.9c-1.6-0.2-1.8-0.9-1.8-1.6v-5c0-1.6-1.2-1.2-2.4-2.2s-7.4-3.8-9.9-4.9c-1.6-0.8-3.2-1.8-4.6-2.9
                                    c-1.4-0.9-0.9-1.1-1.1-2.8c0,0-0.2-3.5-0.2-4.6s0.6-0.6,1.5-0.6h1.9l2.5-2.6l1.9-2.1c0,0,2.5,1.4,3.4,1.9s1.6,0.8,2,1.4
                                    s1.6,0.5,2.1-0.9s1.6-3.6,1.6-4.6s0.2-1.8,1.6-1.9c1.4-0.1,1.3-0.5,1.6-1.6s0.6-1.5,0.1-2s-3.2-2.3-5.1-3.9
                                    c-1.9-1.6-0.2-2.9-0.2-2.9c0.4-1.3,1.1-2.4,1.9-3.5c1-1,1.1-1.8,3.1-1.8s2.9-0.9,3.1-1.8c0.4-1,0.9-2,1.5-2.9c0.6-1.1,1-2.4,1.2-3.6
                                    c0,0,0.8-1.4,1-1.9c0.3-0.8,0.7-1.6,1.1-2.4c0.5-0.6,0.1-3.1,0-4s0.5-4.4,0-5.8c-0.4-1.1-0.4-2.3,0.2-3.2c0.5-0.9-1.5-3.8,0-4.5
                                    s2,0.1,1.2-2.8s-0.8-3.5,0.4-3.9c1.1-0.4,1.5-3.5,0.2-4.6c-1.1-1-1.6-1.4-1.6-2.4c3.5,0.8,11.4,2.4,13.2,2.4c2.4,0,4.4,0.5,4.1,3.1
                                    c-0.3,2.7-4.1,12.9-2.4,12.9s13,1,13.8,0s-0.5-4.4,0-4.1c3.8,2.2,5.3,1.3,7.3,2.3s5.2,2.9,7.4,3.9c2.1,0.9,4.2-0.4,8.6-2.8
                                    c4.4-2.4,6.5-1,7.5,1.4s-2.4,5.4,0,6.1c2.4,0.7,10.4,2.6,14.6,1.7C473,965.9,474.4,965.6,475.4,965.3z" />
                            </svg>

                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function colorizeRegions() {
            var expRegion = "{{ strtoupper(str_replace([' ', "'", '-'], ['_', '_', '_'], $courriers->exp_post->region)) }}";
        var destRegion = "{{ strtoupper(str_replace([' ', "'", '-'], ['_', '_', '_'], $courriers->dest_post->region)) }}";


            if (expRegion === destRegion) {
                document.getElementById(destRegion.toUpperCase()).classList.toggle('fill-yellow-400');
            } else {
            document.getElementById(expRegion.toUpperCase()).classList.toggle('fill-blue-400');
            document.getElementById(destRegion.toUpperCase()).classList.toggle('fill-green-400');
            }



        }
    </script>

@endSection
