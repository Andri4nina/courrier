@extends('welcome')

@section('content')
    {{ view('pages.layouts.headers') }}
    <div class="relative w-10/12 mx-auto max-h-screen h-screen flex justify-center ">
        <div class=" w-full">
            <h3 class="text-white text-xl font-semibold  flex items-center">
                <a href={{ route('auth.toMenu') }} class="flex justify-center items-center"><i
                        class="bx bx-chevron-left"></i></a>
                <p>Utilisateurs</p>
            </h3>

            @if ($message = Session::get('success'))
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
                        icon: 'success',
                        title: '{{ $message }}'
                    })
                </script>
            @endif


            <div class="bounceslideInFromRight p-5 min-w-4xl crud-card">
                <div class="top-card">
                    <div class=" text-white font-bold items-center flex gap-2">
                        <div class="rounded-sm min-h-5 min-w-1 bg-blue-800"></div>
                        <h4 class="text-white my-5">Tous les Colis et Courriers recu par notre postes</h4>
                    </div>

                    <hr>
                    <div class="  w-full">
                        <form action="{{ route('courrier.destinataire') }}">
                            <div class="flex justify-center items-center relative">
                                <button
                                    class=" w-2/12 bg-blue-800 h-auto  hover:bg-blue-600 hover:shadow-blue-700 hover:shadow-lg px-4  py-2 rounded-sm text-white transition-all ">
                                    <span>Rechercher</span>
                                </button>
                                <div class="w-10/12 inputfield px-4 py-2 my-5 border-b-2">
                                    <input type="text" placeholder="Chercher un colis" name="search"
                                        class="w-full bg-transparent outline-none text-white">
                                </div>
                                <button class="absolute right-2 text-white">
                                    <i class="bx bx-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="relative crud-list ">
                    @if ($count > 0)
                        @foreach ($courriers as $courriers)
                            <div class="  text-white grid grid-cols-3 gap-2 w-11/12 mx-auto">
                                <div>
                                    <div class="mb-8 text-white font-bold items-center flex">
                                        <div class="rounded-sm min-h-5 min-w-1 bg-blue-800"></div>
                                        <div class="ms-2">Information du courrier</div>
                                    </div>
                                    <div class="grid grid-cols-1 gap-4">

                                        <div>

                                            <div class="">
                                                <div
                                                    class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                                    <div class="text-white w-1/3 border-r">
                                                        Libelle
                                                    </div>
                                                    <div class="w-2/3">
                                                        <input type="text"
                                                            class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                                            name='libelle' value={{ $courriers->libelle }}
                                                            @disabled(true)>
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
                                                            value={{ $courriers->poids }} @disabled(true)>
                                                    </div>
                                                    <div class="absolute text-white right-1 border-l-2 px-5">
                                                        g
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
                                                            name="prix" id='prix' value={{ $courriers->prix }}
                                                            @disabled(true)>
                                                    </div>
                                                    <div class="absolute text-white right-1 border-l-2 px-[14px]">
                                                        AR
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="mb-2 text-white font-bold items-center flex">
                                                <div class="rounded-sm min-h-5 min-w-1 bg-blue-800"></div>
                                                <div class="ms-2">Action</div>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <div>Rappel</div>
                                                <div>
                                                    <button
                                                        class=" bg-blue-800 h-auto  hover:bg-blue-600 hover:shadow-blue-700 hover:shadow-lg px-4  py-2 rounded-sm text-white transition-all">Email</button>
                                                    <button
                                                        class=" bg-blue-800 h-auto  hover:bg-blue-600 hover:shadow-blue-700 hover:shadow-lg px-4  py-2 rounded-sm text-white transition-all">Telephone</button>

                                                </div>


                                            </div>
                                            <div class="mt-5 grid grid-cols-2">
                                                <div>
                                                    <h2>Reception</h2>
                                                    <div>

                                                    </div>

                                                </div>

                                                <div class="flex justify-center gap-2">
                                                    <form action="">
                                                        <button
                                                            class="w-8 h-8 border text-blue-500 border-blue-500  hover:bg-blue-500 hover:shadow-blue-700 hover:shadow-lg hover:text-white  font-bold "><i
                                                                class="bx bx-pencil"></i></button>
                                                    </form>
                                                    <form action="" method="POST">
                                                        @method('delete')
                                                        @csrf

                                                        <button
                                                            class="w-8 h-8 border text-red-500 border-red-500   hover:bg-red-500 hover:shadow-red-700 hover:shadow-lg hover:text-white font-bold "onclick="deleteConfirm(event)"><i
                                                                class="bx bx-trash"></i></button>
                                                    </form>
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
                                                <input type="text"
                                                    class="w-full text-left bg-transparent pr-3 outline-none text-white uppercase"
                                                    name='nom_exp' value={{ $courriers->exp->nom }}
                                                    @disabled(true)>
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
                                                    name='prenom_exp' value={{ $courriers->exp->prenom }}
                                                    @disabled(true)>
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
                                                    name="adresse_exp" value={{ $courriers->exp->adresse }}
                                                    @disabled(true)>
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
                                                    name="email_exp" value={{ $courriers->exp->email }}
                                                    @disabled(true)>
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
                                                    name="tel_exp" value={{ $courriers->exp->tel }}
                                                    @disabled(true)>
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
                                                    name="cin_exp" value={{ $courriers->exp->cin }}>
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
                                                    name='nom_exp' value={{ $courriers->dest->nom }}
                                                    @disabled(true)>
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
                                                    name='prenom_exp' value={{ $courriers->dest->prenom }}
                                                    @disabled(true)>
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
                                                    name="adresse_exp" value={{ $courriers->dest->adresse }}
                                                    @disabled(true)>
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
                                                    name="email_exp" value={{ $courriers->dest->email }}
                                                    @disabled(true)>
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
                                                    name="tel_exp" value={{ $courriers->dest->tel }}
                                                    @disabled(true)>
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
                                                    name="cin_exp" value={{ $courriers->dest->cin }}>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-5">
                        @endforeach
                    @else
                        <div class="absolute top-14 left-1/2 -translate-x-1/2 text-white text-center">
                            <p>Aucun enregistrement existant ou ne correspond a votre recherche</p>
                        </div>
                    @endif
                </div>

            </div>




        </div>



    </div>
    <script type="text/javascript">
        window.deleteConfirm = function(e) {
            e.preventDefault();
            var form = e.target.form;
            Swal.fire({
                title: 'Etes vous sur de vouloir supprimer cet utilisateur ?',
                text: "Vous ne pouvez plus retourner en arriere!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1F9B4F',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimer!',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        }
    </script>
@endsection
