@extends('welcome')

@section('content')
    <div class="relative w-10/12 mx-auto max-h-screen h-screen flex justify-center mt-40">
        <div class=" w-full">
            <h3 class="text-white text-3xl font-semibold  flex items-center">
                <a href={{ route('auth.toMenu') }} class="flex justify-center items-center"><i
                        class="bx bx-chevron-left"></i></a>
                <p>Postes</p>
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
                    <h4 class="text-white my-5">Tous les Postes</h4>
                    <hr>
                    <div class="  w-full">
                        <div class=" flex justify-end ">
                            <form action="{{ route('poste.create') }}">
                                <button
                                    class="mt-5 bg-blue-800  hover:bg-blue-600 hover:shadow-blue-700 hover:shadow-lg px-4  py-2 rounded-sm text-white transition-all "><span>Nouvelle
                                        poste +</span></button>
                            </form>
                        </div>

                        <form action="{{ route('poste.index') }}">
                            <div class="flex justify-center items-center relative">
                                <button
                                    class=" w-2/12 bg-blue-800 h-auto  hover:bg-blue-600 hover:shadow-blue-700 hover:shadow-lg px-4  py-2 rounded-sm text-white transition-all ">
                                    <span>Rechercher</span>
                                </button>
                                <div class="w-10/12 inputfield px-4 py-2 my-5 border-b-2">
                                    <input type="text" placeholder="Chercher une poste" name="search"
                                        class="bg-transparent outline-none text-white">
                                </div>
                                <button class="absolute right-2 text-white">
                                    <i class="bx bx-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="relative crud-list">
                    <table class=" text-center min-w-full">
                        <thead class="text-white border-b-4">
                            <tr>
                                <th class="px-4 py-2">Region</th>
                                <th class="px-4 py-2">Boite Postale</th>
                                <th class="px-4 py-2">Adresse</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Telephone</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <div class="relative overflow-hidden">
                            <tbody class=" pt-5 text-white overflow-y-scroll">
                                @if (count($poste) > 0)
                                    @foreach ($poste as $postes)
                                        <tr class="hover:bg-slate-300 hover:text-slate-600  border-b">
                                            <td class="px-4 py-2  ">
                                                {{ $postes->region }}
                                            </td>
                                            <td class="px-4 py-2 ">
                                                {{ $postes->bp }}
                                            </td>
                                            <td class="px-4 py-2  ">
                                                {{ $postes->adresse }}
                                            </td>
                                            <td class="px-4 py-2 ">
                                                {{ $postes->email }}
                                            </td>
                                            <td class="px-4 py-2 ">
                                                {{ $postes->tel }}
                                            </td>
                                            <td class="flex justify-center items-center gap-2 py-2 px-4">
                                                <form action="{{ route('poste.edit', $postes->id) }}">
                                                    <button
                                                        class="w-8 h-8 border text-blue-500 border-blue-500  hover:bg-blue-500 hover:shadow-blue-700 hover:shadow-lg hover:text-white  font-bold "><i
                                                            class="bx bx-pencil"></i></button>
                                                </form>
                                                <form action="{{ route('poste.destroy', $postes->id) }}" method="POST">
                                                    @method('delete')
                                                    @csrf

                                                    <button
                                                        class="w-8 h-8 border text-red-500 border-red-500   hover:bg-red-500 hover:shadow-red-700 hover:shadow-lg hover:text-white font-bold "onclick="deleteConfirm(event)"><i
                                                            class="bx bx-trash"></i></button>
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


                    </table>
                    <div class="mt-20  mb-5 flex justify-center items-center">

                    </div>
                </div>

            </div>




        </div>



    </div>
    {{ view('pages.layouts.header') }}
@endsection
