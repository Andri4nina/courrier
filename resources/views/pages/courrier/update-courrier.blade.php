@extends('welcome')

@section('content')
    {{ view('pages.layouts.headers') }}
    <div class="w-10/12 mx-auto max-h-screen h-screen flex justify-center">
        <div class=" w-full">
            <h3 class="text-white text-xl font-semibold  flex items-center">
                <a href="{{route('courrier.expediteur')}}" class="flex justify-center items-center"><i class="bx bx-chevron-left"></i></a>
                <p>Courrier/<small>Modification colis</small></p>
            </h3>
            <form action={{ route('courrier.update') }} method="POST" class="w-full mt-10 max-w-6xl">
                @csrf
                @if ($errors->any())
                    <script type="text/javascript">
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'bottom-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'warning',
                            title: 'Veuillez remplir les champs obligatoires'
                        })
                    </script>
                @endif
                <div class="flex justify-between">
                    <div>
                        <div class="mb-8 text-white font-bold items-center flex">
                            <div class="rounded-sm min-h-5 min-w-1 bg-blue-800"></div>
                            <div class="ms-2">Information du courrier</div>
                        </div>
                        <div class="">
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Libelle
                                </div>
                                <div class="w-2/3">
                                    <input type="text"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white" name='libelle'
                                        value={{ $courriers->libelle }}>
                                </div>
                            </div>
                            <div
                                class=" inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Poids
                                </div>
                                <div class="w-2/3">
                                    <input type="text"
                                        class=" w-full text-right bg-transparent pr-10 outline-none text-white"
                                        name='poids' id='poids' onkeyup ="calculerPrix()"
                                        value={{ $courriers->poids }}>
                                </div>
                                <div class="absolute text-white right-1 border-l-2 px-[14px]">
                                    Kg
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Prix
                                </div>
                                <div class="w-2/3">
                                    <input type="prix"
                                        class="w-full text-right bg-transparent pr-10 outline-none text-white"
                                        name="prix" id='prix' value={{ $courriers->prix }}>
                                </div>
                                <div class="absolute text-white right-1 border-l-2 px-[14px]">
                                    AR
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Prov exp
                                </div>
                                <div class="w-2/3">
                                    <input disabled="true" type="tel"
                                        class="w-full text-left bg-transparent pr-3 outline-none uppercase text-white"
                                        name="" value={{ $posteUser->region }}>
                                    <input type="hidden" name="province_exp" value={{ $posteUser->id }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Prov dest
                                </div>
                                <div class="w-2/3">
                                    <select name="province_dest" class="bg-slate-900 w-full uppercase text-white p-0">
                                        @foreach ($postes as $poste)
                                            @if ($poste->region === $courriers->dest_post->region)
                                                <option class="hover:bg-slate-800 uppercase" value="{{ $poste->id }}"
                                                    selected>
                                                    {{ $poste->region }}
                                                </option>
                                            @else
                                                <option class="hover:bg-slate-800 uppercase" value="{{ $poste->id }}">
                                                    {{ $poste->region }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>



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
                                    <input type="text"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white uppercase"
                                        name='nom_exp' value={{{ $courriers->exp->nom }}}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 capitalize flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Prenom
                                </div>
                                <div class="w-2/3">
                                    <input type="text"
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
                                    <input type="text"
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
                                    <input type="email"
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
                                    <input type="tel"
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
                                    <input type="tel"
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
                                    <input type="text"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white uppercase"
                                        name='nom_dest' value={{ $courriers->dest->nom }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Prenom
                                </div>
                                <div class="w-2/3">
                                    <input type="text"
                                        class=" w-full text-left bg-transparent pr-3 outline-none text-white"
                                        name='prenom_dest' value={{ $courriers->dest->prenom }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Adresse
                                </div>
                                <div class="w-2/3">
                                    <input type="text"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                        name="adresse_dest" value={{ $courriers->dest->adresse }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Email
                                </div>
                                <div class="w-2/3">
                                    <input type="email"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                        name="email_dest" value={{ $courriers->dest->email }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Telephone
                                </div>
                                <div class="w-2/3">
                                    <input type="tel"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                        name="tel_dest" value={{ $courriers->dest->tel }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Cin
                                </div>
                                <div class="w-2/3">
                                    <input type="tel"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                        name="cin_dest" value={{ $courriers->dest->cin }}>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full flex justify-end mt-4">
                    <input type="hidden"  name="hidden_id" value={{ $courriers->id }} />
                    <button
                        class="text-sm text-white btn-skin2  bg-blue-800  hover:bg-blue-600 hover:shadow-blue-700 hover:shadow-lg px-4 py-2 rounded-sm ">Enregistrer</button>
                    <button
                        class="ms-2 text-sm text-slate-200  bg-slate-800  hover:bg-slate-600 hover:shadow-slate-700 hover:shadow-lg px-4 py-2 rounded-sm "
                        type="reset">Annuler</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        function calculerPrix() {
            var poids = document.getElementById("poids").value;
            if (poids === '') {
                document.getElementById("prix").value = 0;
            } else {
                var prix = parseFloat(poids) * 5000;
                document.getElementById("prix").value = prix;
            }

        }
    </script>
@endSection
