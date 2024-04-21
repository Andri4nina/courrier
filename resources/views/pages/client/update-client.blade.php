@extends('welcome')

@section('content')
    {{ view('pages.layouts.headers') }}
    <div class="w-10/12 mx-auto max-h-screen h-screen flex justify-center">
        <div class=" w-full">
            <h3 class="text-white text-xl font-semibold  flex items-center">
                <a href={{ route('client.index') }} class="flex justify-center items-center"><i
                        class="bx bx-chevron-left"></i></a>
                <p>Clients / <small>Modification</small></p>
            </h3>
            <div class="grid grid-cols-2">

                <form action="{{ route('client.update') }}" method="POST" class="w-full mt-10 max-w-4xl">
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
                    <div>
                        <div class="mb-8 text-white font-bold items-center flex">
                            <div class="rounded-sm min-h-5 min-w-1 bg-blue-800"></div>
                            <div class="ms-2">Information du client</div>
                        </div>
                        <div class="">
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Nom
                                </div>
                                <div class="w-2/3">
                                    <input type="text"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white" name='nom'
                                        value={{ $client->nom }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Prenom
                                </div>
                                <div class="w-2/3">
                                    <input type="text"
                                        class=" w-full text-left bg-transparent pr-3 outline-none text-white" name='prenom'
                                        value={{ $client->prenom }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Province
                                </div>
                                <div class="w-2/3">
                                    <input type="text"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white" name="province"
                                        value={{ $client->province }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Adresse
                                </div>
                                <div class="w-2/3">
                                    <input type="text"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white" name="adresse"
                                        value={{ $client->adresse }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Email
                                </div>
                                <div class="w-2/3">
                                    <input type="email"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white" name="email"
                                        value={{ $client->email }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Telephone
                                </div>
                                <div class="w-2/3">
                                    <input type="tel"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white" name="tel"
                                        value={{ $client->tel }}>
                                </div>
                            </div>
                            <div
                                class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                                <div class="text-white w-1/3 border-r">
                                    Cin
                                </div>
                                <div class="w-2/3">
                                    <input type="text"
                                        class="w-full text-left bg-transparent pr-3 outline-none text-white" name="cin"
                                        value={{ $client->cin }}>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 my-10 gap-5 w-fit mx-auto  ">

                        <input type="hidden" name="hidden_id" value={{ $client->id }} />
                        <button
                            class="text-white btn-skin2  bg-blue-500  hover:bg-blue-600 hover:shadow-blue-700 hover:shadow-lg px-4 py-2 rounded-md ">Enregistrer</button>
                        <button
                            class="  text-slate-200  bg-slate-800  hover:bg-slate-600 hover:shadow-slate-700 hover:shadow-lg px-4 py-2 rounded-md "
                            type="reset">Annuler</button>
                    </div>

                </form>
                <div class="w-1/2 flex justify-center mx-auto pt-5">
                    <img src="{{ asset('images/svg/Post office-pana.svg') }}" alt="">
                </div>





            </div>

        </div>

    </div>
@endsection
