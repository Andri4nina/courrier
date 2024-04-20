@extends('welcome')

@section('content')
{{ view('pages.layouts.headers') }}
    <div class="w-10/12 mx-auto max-h-screen h-screen flex justify-center mt-40">
        <div class=" w-full">
            <h3 class="text-white text-3xl font-semibold  flex items-center">
                <a href={{ route('poste.index') }} class="flex justify-center items-center"><i
                        class="bx bx-chevron-left"></i></a>
                <p>Postes / <small>Modification</small></p>
            </h3>
            <form action="{{ route('poste.update') }}" method="POST" class="w-full mt-20 max-w-6xl">
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
                <input type="hidden" name="hidden_id" value='{{ $poste->id }}'>
                <div class="w-1/2 mx-auto grid grid-cols-1 gap-2">
                    <div class="">
                        <div
                            class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                            <div class="text-white w-1/3 border-r">
                                Region
                            </div>
                            <div class="w-2/3">
                                <input type="text" class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                    name='region' value={{ $poste->region }}>
                            </div>
                        </div>





                        <div
                            class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                            <div class="text-white w-1/3 border-r">
                                Adresse
                            </div>
                            <div class="w-2/3">
                                <input type="text" class=" w-full text-left bg-transparent pr-3 outline-none text-white"
                                    name='adresse' value={{ $poste->adresse }}>
                            </div>
                        </div>
                        <div
                            class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                            <div class="text-white w-1/3 border-r">
                                Boite postale
                            </div>
                            <div class="w-2/3">
                                <input type="text" class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                    name="bp" value={{ $poste->bp }}>
                            </div>
                        </div>
                        <div
                            class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                            <div class="text-white w-1/3 border-r">
                                Email
                            </div>
                            <div class="w-2/3">
                                <input type="email" class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                    name="email" value={{ $poste->email }}>
                            </div>
                        </div>
                        <div
                            class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                            <div class="text-white w-1/3 border-r">
                                Telephone
                            </div>
                            <div class="w-2/3">
                                <input type="tel" class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                    name="tel" value={{ $poste->tel }}>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 my-10 gap-5 w-fit mx-auto  ">
                    <button
                        class="text-white btn-skin2  bg-green-500  hover:bg-green-600 hover:shadow-green-700 hover:shadow-lg px-4 py-2 rounded-md ">Enregistrer</button>
                    <button
                        class="  text-slate-200  bg-slate-800  hover:bg-slate-600 hover:shadow-slate-700 hover:shadow-lg px-4 py-2 rounded-md "
                        type="reset">Annuler</button>
                </div>
            </form>
        </div>
        
    </div>
@endsection
