@extends('welcome')

@section('content')
    {{ view('pages.layouts.headers') }}
    <div class="relative w-10/12 mx-auto max-h-screen h-screen flex justify-center ">
        <div class=" w-full">
            <h3 class="text-white text-xl font-semibold  flex items-center">
                <a href={{ route('auth.toMenu') }} class="flex justify-center items-center"><i
                        class="bx bx-chevron-left"></i></a>
                <p>Archives</p>
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
                        <h4 class="text-white my-5">Tous les Colis et Courriers recus par nos clients</h4>
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
                    <table class=" text-center min-w-full">
                        <thead class="text-white border-b-4">
                            <tr>
                                <th class="px-4 py-2">Type de colis</th>
                                <th class="px-4 py-2">Date de depot</th>
                                <th class="px-4 py-2">Region de depart</th>
                                <th class="px-4 py-2">Region de destination</th>
                                <th class="px-4 py-2">Rappel</th>
                                <th class="px-4 py-2">Reception</th>
                                <th class="px-4 py-2">Facture</th>
                            </tr>
                        </thead>
                        <div class="relative overflow-hidden">
                            <tbody class=" pt-5 text-white overflow-y-scroll">
                                @if ($count > 0)
                                    @foreach ($courriers as $courriers)
                                        <tr class="hover:bg-slate-800 hover:text-slate-50   border-b">
                                            <td class="px-4 py-2 capitalize">
                                                <a href={{ route('courrier.detail', $courriers->id) }}>
                                                    {{ $courriers->libelle }}</a>
                                            </td>
                                            <td class="px-4 py-2 ">
                                                {{ $courriers->created_at->format('d/m/Y') }}
                                            </td>
                                            <td class="px-4 py-2 ">
                                                {{ $courriers->exp_Post->region }}
                                            </td>

                                            <td class="px-4 py-2 ">
                                                {{ $courriers->dest_Post->region }}
                                            </td>
                                            <td class="px-4 py-2 ">
                                                <div class="flex justify-center items-center gap-2">
                                                    <div class="relative group">
                                                        <form action="">
                                                            <button
                                                                class="w-8 h-8 border text-purple-500 border-purple-500  hover:bg-purple-500 hover:shadow-purple-700 hover:shadow-lg hover:text-white  font-bold ">
                                                                <i class="bx bx-message-square-dots"></i>
                                                            </button>
                                                        </form>
                                                        <p
                                                            class="absolute w-20 -top-3 left-1/2 -translate-x-1/2  opacity-0 group-hover:opacity-100 group-hover:-translate-y-1/2 duration-700  text-sm rounded-sm border-purple-500  bg-purple-500 shadow-purple-700 hover:shadow-lg text-white">
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
                                                            class="absolute w-20 -top-3 left-1/2 -translate-x-1/2  opacity-0 group-hover:opacity-100 group-hover:-translate-y-1/2 duration-700  text-sm rounded-sm border-yellow-500  bg-yellow-500 shadow-yellow-700 hover:shadow-lg text-white">
                                                            par Email</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-2 ">
                                                <form action="{{ route('courrier.reception') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name='hidden_id' value="{{ $courriers->id }}">
                                                    <div class="flex justify-center items-center gap-2">
                                                        <label
                                                            class="relative h-8 w-12 cursor-pointer [-webkit-tap-highlight-color:_transparent]"
                                                            for="switch" @disabled(true)>
                                                            <input disabled class="form-checkbox peer sr-only" id="switch" type="checkbox" id="status" name="status" @if ($courriers->status === 1) @checked(true)  @endif   onchange="publishConfirm(event)"/>
                                                            <span
                                                                class="absolute inset-0 m-auto h-2 rounded-full bg-green-400"></span>
                                                            <span
                                                                class="absolute inset-y-0 start-0 m-auto size-6 rounded-full bg-green-600 transition-all peer-checked:start-6 peer-checked:[&amp;_>_*]:scale-0">
                                                                <span
                                                                    class="absolute inset-0 m-auto size-4 rounded-full bg-green-300 transition">
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </form>
                                            </td>
                                            <td class="px-4 py-2">
                                                <form action="">
                                                    <button
                                                        class="w-8 h-8 border text-slate-500 border-slate-500  hover:bg-slate-500 hover:shadow-slate-700 hover:shadow-lg hover:text-white  font-bold ">
                                                        <i class="bx bx-printer"></i>
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
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
                    title: 'Etes vous sur de vouloir supprimer ce courrier ?',
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

        <script>
            window.publishConfirm = function(e) {
               var form = e.target.form;
               var checkbox = form.querySelector('.form-checkbox');

               if (checkbox.checked==true) {
                       Swal.fire({
                           title: 'Etes vous sur que le client a bien recu son colis ?',
                           text:'vous ne pouvez plus revenir en arriere ',
                           icon: 'warning',
                           showCancelButton: true,
                           confirmButtonColor: '#1F9B4F',
                           cancelButtonColor: '#d33',
                           confirmButtonText: 'Oui!',
                           cancelButtonText: 'Annuler'
                       }).then((result) => {
                           if (result.isConfirmed) {
                           form.submit();
                           }else{
                               checkbox.checked = false;
                           }
                       })
                   }
               }

        </script>
    @endsection
