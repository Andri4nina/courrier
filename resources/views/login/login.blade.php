@extends('welcome')

@section("content")
<div class="max-h-screen h-screen w-full relative flex justify-center items-center">
    <div class="absolute top-5 right-5 ">
        <div class="inputfield px-4 py-1 border-b-2">
            <input type="text" placeholder="Lieux" class="bg-transparent outline-none text-white">
        </div>
    </div>
    
    <a href="#">
        <div class="absolute top-5 left-5 flex justify-center gap-5 items-center">
            <div class=" h-16 w-16  border rotate-45  Logo ">
                <img src="{{ asset('images/Postman.png')}}" alt="LogoPosteman" class="-rotate-45 w-full h-full object-fill">
            </div>
            <div class="text-white text-3xl font-semibold">
                PosteMan
            </div>
        </div>
    </a>

    <div class="absolute bottom-5 right-5 grid grid-cols-2 gap-2">
        <button class="bg-cyan-600 hover:bg-cyan-400 hover:shadow-cyan-700 hover:shadow-lg rounded-sm p-2 h-10 w-10 transition-all"><i class="text-white bx bx-info-circle"></i></button>
        <button class="bg-red-800 hover:bg-red-600 hover:shadow-red-700 hover:shadow-lg rounded-sm p-2 h-10 w-10 transition-all"><i class="text-white bx bx-power-off"></i></button>
    </div>


    <div class="w-60 text-center" >
    <form action="{{  route('auth.dologin') }}" method="post" >
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
        <div class="inputfield px-4 py-1 my-5 border-b-2">
            <input type="text" placeholder="Nom Utilisateur" class="bg-transparent outline-none text-white">
        </div>
        <div class="inputfield px-4 py-1 my-5 border-b-2">
            <input type="text" placeholder="Email" class="bg-transparent outline-none text-white">
        </div>
        <div class="inputfield px-4 py-1 my-5 border-b-2">
            <input type="password" placeholder="Mot de passe" class="bg-transparent outline-none text-white">
        </div>

        <input type="hidden" name="post_localisation">
        <button class="mt-5 bg-blue-800  hover:bg-blue-600 hover:shadow-blue-700 hover:shadow-lg px-4  py-2 rounded-sm text-white transition-all">
            Se Connecter
        </button>

    </form>

    </div>
</div>
@endsection
