<header class="flex m-5 items-center justify-between">
    <a href="#">
        <div class="top-5 left-5 flex justify-center gap-5 items-center">
            <div class="h-24 w-24 rotate-45  Logo ">
                <img src="{{ asset('images/Postman.png')}}" alt="LogoPosteman" class="-rotate-45 w-full h-full object-fill">
            </div>
            <div class="text-white text-3xl font-lilita">
                PosteMan
            </div>
        </div>
    </a>
    <div class="text-white flex justify-center items-center gap-2">
        <span class="font-semibold">
        @auth
        {{\Illuminate\Support\Facades\Auth::user()->name }}
        @endauth

        </span> <i class="text-xl bx bx-user"></i>
     </div>
</header>
