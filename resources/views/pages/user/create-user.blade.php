@extends('welcome')

@section('content')
{{ view('pages.layouts.headers') }}
    <div class="w-10/12 mx-auto max-h-screen h-screen flex justify-center ">
        <div class=" w-full">
            <h3 class="text-white text-xl font-semibold  flex items-center">
                <a href={{ route('user.index') }} class="flex justify-center items-center"><i
                        class="bx bx-chevron-left"></i></a>
                <p>Utilisateurs / <small>Creation</small></p>
            </h3>
            <div class="grid grid-cols-2">
            <div>
                <form action="{{ route('user.store') }}" method="POST" class="w-full mt-10 max-w-4xl">
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
                    <div class=" text-white font-bold items-center flex gap-2 mb-5">
                        <div class="rounded-sm min-h-5 min-w-1 bg-blue-800"></div>
                        <h2 class="text-white text-base">Information de l'utilisateur</h2>

                    </div>


                    <div class="w-11/12 mx-auto grid grid-cols-1 gap-2">
                        <div class="">
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Nom utilisateur
                                </div>
                                <div class="w-2/3">
                                    <input type="text" class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                        name='name' value={{ old('name') }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Email
                                </div>
                                <div class="w-2/3">
                                    <input type="text" class=" w-full text-left bg-transparent pr-3 outline-none text-white"
                                        name='Email' value={{ old('Email') }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Mot de passe
                                </div>
                                <div class="w-2/3">
                                    <input type="text" class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                        name="mdp" value={{ old('mdp') }}>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="grid grid-cols-2 my-10 gap-5 w-fit mx-auto  ">
                        <input type="hidden" name="poste_id"/>
                        <button
                            class="text-white btn-skin2  bg-blue-500  hover:bg-blue-600 hover:shadow-blue-700 hover:shadow-lg px-4 py-2 rounded-md ">Enregistrer</button>
                        <button
                            class="  text-slate-200  bg-slate-800  hover:bg-slate-600 hover:shadow-slate-700 hover:shadow-lg px-4 py-2 rounded-md "
                            type="reset">Annuler</button>
                    </div>

                </form>

                <div class="w-1/2 flex justify-center mx-auto pt-5">
                    <img src="{{ asset('images/svg/New entries-bro.svg') }}" alt="">
                </div>
            </div>



                <div class="mt-10">
                    <div class=" text-white font-bold items-center flex gap-2">
                        <div class="rounded-sm min-h-5 min-w-1 bg-blue-800"></div>
                        <h2 class="text-white text-base">Veuillez Selectionner la zone ou l'utilisateur travail</h2>

                    </div>
                     <table class=" text-center min-w-full">
                        <thead class="text-white border-b-4">
                            <tr>
                                <th class="px-4 py-2">Region</th>
                                <th class="px-4 py-2">Boite Postale</th>
                                <th class="px-4 py-2">Adresse</th>
                            </tr>
                        </thead>
                        <div class="relative overflow-hidden">
                            <tbody class=" pt-5 text-white overflow-y-scroll">
                                @foreach ($postes as $poste)
                                    <tr class="cursor-pointer hover:bg-slate-800 hover:text-slate-50  border-b">
                                        <td class="px-4 py-2" data-poste-id="{{ $poste->id }}">
                                            {{ $poste->region }}
                                        </td>
                                        <td class="px-4 py-2" data-poste-id="{{ $poste->id }}">
                                            {{ $poste->bp }}
                                        </td>
                                        <td class="px-4 py-2" data-poste-id="{{ $poste->id }}">
                                            {{ $poste->adresse }}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </div>


                    </table>

                </div>
            </div>

        </div>

    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                row.addEventListener('click', () => {
                    rows.forEach(r => {
                        r.classList.remove('bg-blue-500', 'text-white');
                    });
                    row.classList.add('bg-blue-500', 'text-white');
                    const posteId = row.querySelector('td').dataset.posteId;
                    document.querySelector('input[name="poste_id"]').value = posteId;
                });
            });
        });
    </script>

@endsection
