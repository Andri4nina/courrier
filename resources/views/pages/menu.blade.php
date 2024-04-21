@extends('welcome')




@section('content')
    {{ view('pages.layouts.headers') }}
   


    <div class="w-full max-h-screen h-screen relative flex justify-center">
        <div class=" gap-12 flex justify-center items-start">
            <div>
                <div class="bg-slate-50 w-full gap-2 mb-2 dashboard">
                    <div class="w-full h-full">
                        <div class="h-36  w-full" id="chartContainer">
                            <canvas id="myChart" style="width: 100%; height: 100%;"></canvas>
                        </div>
                    </div>
                </div>

                <div class="flex gap-2">
                    <div class="grid grid-cols-2 gap-2">
                        <div
                            class="overflow-hidden relative bg-blue-600  hover:bg-blue-400 hover:shadow-blue-700 hover:shadow-lg   text-white  w-36 h-36 cursor-pointer group">
                            <a href={{ route('courrier.index') }}
                                class="relative w-full h-full flex justify-center items-center">

                                <div
                                    class="text-2xl absolute top-5 left-5 -translate-x-1/2 -translate-y-1/2 text-slate-50   group-hover:text-blue-500">
                                    <i class="bx bx-plus "></i>
                                </div>
                                <div class="z-10 font-medium">Nouvelle Colis </div>
                            </a>
                        </div>
                        <div
                            class="overflow-hidden relative bg-green-600  hover:bg-green-400 hover:shadow-green-700 hover:shadow-lg   text-white  w-36 h-36 cursor-pointer group">
                            <a href="#" class="relative w-full h-full flex justify-center items-center">
                                <div
                                    class="text-2xl absolute top-5 left-5 -translate-x-1/2 -translate-y-1/2 text-slate-50  group-hover:text-green-500">
                                    <i class="bx bx-archive-in"></i>
                                </div>
                                <div class="z-10">Archive</div>
                            </a>
                        </div>
                        <div
                            class="overflow-hidden relative bg-green-600  hover:bg-green-400 hover:shadow-green-700 hover:shadow-lg   text-white  w-36 h-36 cursor-pointer group">
                            <a href="#" class="relative w-full h-full flex justify-center items-center">
                                <div
                                    class="text-2xl absolute top-5 left-5 -translate-x-1/2 -translate-y-1/2 text-slate-50 group-hover:text-green-500">
                                    <i class="bx bxs-truck"></i>
                                </div>
                                <div class="z-10 text-center">Liste de colis <br> envoyer</div>
                            </a>
                        </div>
                        <div
                            class="overflow-hidden relative bg-yellow-600  hover:bg-yellow-400 hover:shadow-yellow-700 hover:shadow-lg   text-white  w-36 h-36 cursor-pointer group">
                            <a href="#" class="relative w-full h-full flex justify-center items-center">
                                <div
                                    class="text-2xl absolute top-5 left-5 -translate-x-1/2 -translate-y-1/2 text-slate-50  group-hover:text-yellow-500">
                                    <i class="bx bx-check"></i>
                                </div>
                                <div class="z-10 text-center">Liste de colis <br> recu</div>
                            </a>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="flex justify-center items-center w-36 h-36">

                        </div>
                        <div
                            class="overflow-hidden relative bg-purple-600  hover:bg-purple-400 hover:shadow-purple-700 hover:shadow-lg   text-white  w-36 h-36 cursor-pointer group">
                            <a href="#" class="relative w-full h-full flex justify-center items-center">
                                <div
                                    class="text-2xl absolute top-5 left-5 -translate-x-1/2 -translate-y-1/2 text-slate-50  group-hover:text-purple-500">
                                    <i class="bx bx-group"></i>
                                </div>
                                <div class="z-10 text-center">Nos Clients</div>
                            </a>
                        </div>
                        <div
                            class="overflow-hidden relative bg-blue-600  hover:bg-blue-400 hover:shadow-blue-700 hover:shadow-lg   text-white  w-36 h-36 cursor-pointer group">
                            <a href={{ route('poste.index') }}
                                class="relative w-full h-full flex justify-center items-center">
                                <div
                                    class="text-2xl absolute top-5 left-5 -translate-x-1/2 -translate-y-1/2 text-slate-50  group-hover:text-blue-500">
                                    <i class="bx bxs-building-house"></i>
                                </div>
                                <div class="z-10 text-center">Les Postes</div>
                            </a>
                        </div>
                        <div
                            class="overflow-hidden relative bg-green-600  hover:bg-green-400 hover:shadow-green-700 hover:shadow-lg   text-white  w-36 h-36 cursor-pointer group">
                            <a href={{ route('user.index') }}
                                class="relative w-full h-full flex justify-center items-center">
                                <div
                                    class="text-2xl absolute top-5 left-5 -translate-x-1/2 -translate-y-1/2 text-slate-50  group-hover:text-green-500">
                                    <i class="bx bx-user"></i>
                                </div>
                                <div class="z-10 text-center">Utilisateurs</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative h-full">
                <div class="grid grid-cols-1 gap-2">
                    <div class="text-white flex justify-center items-center w-36 h-36">
                        <div class="relative w-full h-full  clock">
                            <div class="wrap">
                                <span class="hour"></span>
                                <span class="minute"></span>
                                <span class="second"></span>
                                <span class="dot"></span>

                            </div>


                        </div>
                    </div>
                    <div class="bg-blue-600  hover:bg-blue-400 hover:shadow-blue-700 hover:shadow-lg  flex flex-col text-white mx-auto justify-center items-center w-36 h-36" id="calendar">
                        <div class="w-full flex justify-center text-xl font-light capitalize" id="month">Avril 2024</div>
                        <div class="w-full flex justify-center text-2xl" id="day">21</div>
                        <div class="w-full flex justify-center text-lg" id="dayOfWeek">Dimanche</div>
                    </div>
                    <div class="flex justify-end items-end w-36 h-36">
                        <div class="grid grid-cols-2 gap-2">
                            <div
                                class="cursor-pointer  bg-blue-600  hover:bg-blue-400 hover:shadow-blue-700 hover:shadow-lg h-6 w-6 rounded-md text-slate-200 flex justify-center items-center">
                                <i class="bx bx-info-circle"></i>
                            </div>
                            <div class="relative cursor-pointer  bg-slate-600  hover:bg-slate-400 hover:shadow-slate-700 hover:shadow-lg h-6 w-6 rounded-md text-slate-200 flex justify-center items-center"
                                id="parametre">
                                <i class="bx bx-cog"></i>
                                <div class=" bg-slate-600 rounded-sm absolute bottom-8 w-[150px] transition-all h-0 overflow-hidden"
                                    id="params">
                                    <ul class="grid">
                                    @auth
                                        <a href="{{ route('parametre.index', \Illuminate\Support\Facades\Auth::user()->id) }}">
                                            <li class="border-b-2 border-white px-4 py-2 hover:bg-slate-800">Parametre</li>
                                        </a>
                                    @endauth


                                        @auth
                                            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <li class="border-b-2 border-white px-4 py-2 hover:bg-slate-800"
                                                    onclick="logoutConfirm(event)">Se déconnecter</li>
                                            </form>
                                        @endauth
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script>
        var inc = 1000;
        clock();
        function clock() {
            const date = new Date();
            const hours = ((date.getHours() + 11) % 12 + 1);
            const minutes = date.getMinutes();
            const seconds = date.getSeconds();

            const hour = hours * 30;
            const minute = minutes * 6;
            const second = seconds * 6;

            document.querySelector('.hour').style.transform = `rotate(${hour}deg)`
            document.querySelector('.minute').style.transform = `rotate(${minute}deg)`
            document.querySelector('.second').style.transform = `rotate(${second}deg)`
        }

        setInterval(clock, inc);
    </script>


    <script>
        const icon = document.getElementById('parametre');
        const dropdown = document.getElementById('params');

        // Fonction pour basculer l'affichage du menu déroulant
        function toggleDropdown() {
            dropdown.classList.toggle('h-0');
            dropdown.classList.toggle('h-[82px]');
        }

        // Ajouter un écouteur d'événements pour le clic sur l'icône
        icon.addEventListener('click', (event) => {
            event
                .stopPropagation(); // Empêcher la propagation de l'événement pour éviter la fermeture immédiate du menu
            toggleDropdown();
        });

        // Ajouter un écouteur d'événements pour le clic sur le document
        document.addEventListener('click', (event) => {
            const target = event.target;
            // Si l'élément cliqué n'est ni l'icône ni le menu déroulant, fermer le menu déroulant
            if (!icon.contains(target) && !dropdown.contains(target)) {
                dropdown.classList.add('h-0');
                dropdown.classList.remove('h-[82px]');
            }
        });
    </script>


    <script type="text/javascript">
        window.logoutConfirm = function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Êtes-vous sûr de vouloir vous déconnecter ?',
                text: "Vous serez déconnecté de votre session actuelle.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1F9B4F',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, me déconnecter',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {

                    const form = document.querySelector('#logout-form');

                    form.submit();
                }
            })
        }
    </script>


    <script>

        function getDayOfWeek(date) {
            const daysOfWeek = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
            return daysOfWeek[date.getDay()];
        }


        const currentDate = new Date();


        const monthElement = document.getElementById('month');
        const dayElement = document.getElementById('day');
        const dayOfWeekElement = document.getElementById('dayOfWeek');


        monthElement.textContent = currentDate.toLocaleString('default', { month: 'long' }) + ' ' + currentDate.getFullYear();
        dayElement.textContent = currentDate.getDate();
        dayOfWeekElement.textContent = getDayOfWeek(currentDate);
    </script>


    <script>

        const data = {
            labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet'],
            expeditions: [25, 30, 28, 35, 40, 38, 42],
            receptions: [20, 22, 24, 28, 30, 32, 35]
        };

        // Configuration du graphique
        const config = {
            type: 'bar',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Colis expédiés',
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                    data: data.expeditions,
                }, {
                    label: 'Colis reçus',
                    backgroundColor: 'rgba(255, 255, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: data.receptions,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: ''
                    }
                }
            },
        };

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, config);
    </script>
@endsection
