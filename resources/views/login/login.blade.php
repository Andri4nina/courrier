@extends('welcome')

@section("content")
<div class="flex m-5 items-center justify-between">
    <a href="#">
        <div class="top-5 left-5 flex justify-center gap-5 items-center">
            <div class="h-24 w-24 rotate-45  Logo ">
                <img src="{{ asset('images/Postman.png')}}" alt="LogoPosteman" class="-rotate-45 w-full h-full object-fill">
            </div>
            <div class="text-white text-3xl font-lilita font-semibold">
                PosteMan
            </div>
        </div>
    </a>
    <div class="flex gap-2 items-center">
        <label class="text-white text-sm" for="">Lieu :</label>
        <br>
        <select name="region_select" id="region_select" class="outline-none py-2 px-4 rounded-sm bg-blue-800 text-white text-sm font-bold hover:cursor-pointer hover:shadow-lg hover:shadow-blue-700">
            <option class="py-2 px-4 border-b-2 border-white h-4"></option>

            @foreach ($postes as $poste)
                <option class="py-2 px-4 border-b-2 border-white h-4" value="{{ $poste->id }}">{{ $poste->region }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="max-h-screen h-screen w-full relative flex justify-center mt-8">
    <div class="absolute top-[380px] right-5 grid grid-cols-2 gap-2">
        <button class="bg-red-800 hover:bg-red-600 hover:shadow-red-700 hover:shadow-lg rounded-sm p-2 h-10 w-10 transition-all"><i class="text-white bx bx-power-off"></i></button>
    </div>
    <div class="w-60 text-center" >
    <form action={{ route('auth.dologin') }}  method="post" >
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
                        title: 'Champs vide ou invalide'
                      })
                </script>

                @endif
        <i class="bx bx-user-circle text-center text-9xl text-white"></i>
        <div class="inputfield py-1 my-5 border-b-2">
            <input name="name" type="text" placeholder="Nom Utilisateur" class="text-sm w-full bg-transparent outline-none text-white">
        </div>
        <div class="inputfield py-1 my-5 border-b-2">
            <input name="email" type="text" placeholder="Email" class="text-sm w-full bg-transparent outline-none text-white">
        </div>
        <div class="inputfield py-1 my-5 border-b-2">
            <input name="mdp" type="password" placeholder="Mot de passe" class="text-sm w-full bg-transparent outline-none text-white">
        </div>

        <input type="hidden" id="poste_id" name="poste_id" >
        <button class="font-bold text-sm mt-5 bg-blue-800  hover:bg-blue-600 hover:shadow-blue-700 hover:shadow-lg px-4  py-2 rounded-sm text-white transition-all">
            Se Connecter
        </button>

    </form>

    </div>
</div>

<script>
    document.getElementById('region_select').addEventListener('change', function() {
        var selectedRegionId = this.value;
        document.getElementById('poste_id').value = selectedRegionId;
    });
</script>
@endsection
