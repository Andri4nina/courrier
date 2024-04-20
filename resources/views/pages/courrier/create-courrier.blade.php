@extends("welcome")

@section("content")
{{ view('pages.layouts.headers') }}
<div class="w-10/12 mx-auto max-h-screen h-screen flex justify-center">
    <div class=" w-full">
        <h3 class="text-white text-xl font-semibold  flex items-center">
            <a href="/Menu" class="flex justify-center items-center"><i
                    class="bx bx-chevron-left"></i></a>
            <p>Courrier/<small>create</small></p>
        </h3>
        <form action="courrier/create" method="POST" class="w-full mt-10 max-w-6xl">
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
                                <input type="text" class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                    name='libelle' value={{ old('region') }}>
                            </div>
                        </div>
                        <div
                            class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                            <div class="text-white w-1/3 border-r">
                                Poids
                            </div>
                            <div class="w-2/3">
                                <input type="text" class=" w-full text-left bg-transparent pr-3 outline-none text-white"
                                    name='poids' value={{ old('adresse') }}>
                            </div>
                        </div>
                        <div
                            class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                            <div class="text-white w-1/3 border-r">
                                Prix
                            </div>
                            <div class="w-2/3">
                                <input type="prix" class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                    name="bp" value={{ old('bp') }}>
                            </div>
                        </div>
                        <div
                            class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                            <div class="text-white w-1/3 border-r">
                                Prov exp
                            </div>
                            <div class="w-2/3">
                                <input type="tel" class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                    name="province_exp" value={{ old('tel') }}>
                            </div>
                        </div>
                        <div
                            class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                            <div class="text-white w-1/3 border-r">
                                Prov dest
                            </div>
                            <div class="w-2/3">
                                <input type="tel" class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                    name="province_dest" value={{ old('tel') }}>
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
                                <input type="text" class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                    name='nom' value={{ old('region') }}>
                            </div>
                        </div>
                        <div
                            class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                            <div class="text-white w-1/3 border-r">
                                Prenom
                            </div>
                            <div class="w-2/3">
                                <input type="text" class=" w-full text-left bg-transparent pr-3 outline-none text-white"
                                    name='prenom' value={{ old('adresse') }}>
                            </div>
                        </div>
                        <div
                            class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                            <div class="text-white w-1/3 border-r">
                                Adresse
                            </div>
                            <div class="w-2/3">
                                <input type="text" class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                    name="adresse" value={{ old('bp') }}>
                            </div>
                        </div>
                        <div
                            class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                            <div class="text-white w-1/3 border-r">
                                Email
                            </div>
                            <div class="w-2/3">
                                <input type="email" class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                    name="email" value={{ old('email') }}>
                            </div>
                        </div>
                        <div
                            class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                            <div class="text-white w-1/3 border-r">
                                Telephone
                            </div>
                            <div class="w-2/3">
                                <input type="tel" class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                    name="tel" value={{ old('tel') }}>
                            </div>
                        </div>
                        <div
                            class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                            <div class="text-white w-1/3 border-r">
                                Cin
                            </div>
                            <div class="w-2/3">
                                <input type="tel" class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                    name="cin" value={{ old('tel') }}>
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
                                <input type="text" class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                    name='nom' value={{ old('region') }}>
                            </div>
                        </div>
                        <div
                            class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                            <div class="text-white w-1/3 border-r">
                                Prenom
                            </div>
                            <div class="w-2/3">
                                <input type="text" class=" w-full text-left bg-transparent pr-3 outline-none text-white"
                                    name='prenom' value={{ old('adresse') }}>
                            </div>
                        </div>
                        <div
                            class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                            <div class="text-white w-1/3 border-r">
                                Adresse
                            </div>
                            <div class="w-2/3">
                                <input type="text" class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                    name="adresse" value={{ old('bp') }}>
                            </div>
                        </div>
                        <div
                            class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                            <div class="text-white w-1/3 border-r">
                                Email
                            </div>
                            <div class="w-2/3">
                                <input type="email" class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                    name="email" value={{ old('email') }}>
                            </div>
                        </div>
                        <div
                            class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                            <div class="text-white w-1/3 border-r">
                                Telephone
                            </div>
                            <div class="w-2/3">
                                <input type="tel" class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                    name="tel" value={{ old('tel') }}>
                            </div>
                        </div>
                        <div
                            class="inputfield w-full px-4 relative py-1 mb-5 border-b-2 flex justify-between items-center gap-2">
                            <div class="text-white w-1/3 border-r">
                                Cin
                            </div>
                            <div class="w-2/3">
                                <input type="tel" class="w-full text-left bg-transparent pr-3 outline-none text-white"
                                    name="cin" value={{ old('tel') }}>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                
                <button
                    class="text-sm text-white btn-skin2  bg-blue-800  hover:bg-blue-600 hover:shadow-blue-700 hover:shadow-lg px-4 py-2 rounded-sm ">Enregistrer</button>
                <button
                    class="ms-2 text-sm text-slate-200  bg-slate-800  hover:bg-slate-600 hover:shadow-slate-700 hover:shadow-lg px-4 py-2 rounded-sm "
                    type="reset">Annuler</button>
            </div>
        </form>
    </div>
</div>
@endSection