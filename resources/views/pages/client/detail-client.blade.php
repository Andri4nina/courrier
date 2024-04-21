@extends('welcome')

@section('content')
    {{ view('pages.layouts.headers') }}
    <div class="w-10/12 mx-auto max-h-screen h-screen flex justify-center">
        <div class=" w-full">
            <h3 class="text-white text-xl font-semibold  flex items-center">
                <a href={{ route('client.index') }} class="flex justify-center items-center"><i
                        class="bx bx-chevron-left"></i></a>
                <p>Clients / <small>Detail</small></p>
            </h3>
            <div class="grid grid-cols-2 ">
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
                                <input disabled type="text"
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
                                <input disabled type="text"
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
                                <input disabled type="text"
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
                                <input disabled type="text"
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
                                <input disabled type="email"
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
                                <input disabled type="tel"
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
                                <input disabled type="text"
                                    class="w-full text-left bg-transparent pr-3 outline-none text-white" name="cin"
                                    value={{ $client->cin }}>
                            </div>
                        </div>
                    </div>



                </div>

                <div class="grid grid-cols-1">


                    <div class="grid grid-cols-2 items-center">
                        <div>
                            <canvas id="expediesChart" width="300" height="300"></canvas>
                        </div>
                        <div>
                            <canvas id="recusChart" width="300" height="300"></canvas>
                        </div>
                    </div>
                    <div class="w-1/2 flex justify-center mx-auto pt-5">
                        <img src="{{ asset('images/svg/Design stats-amico.svg') }}" alt="">
                    </div>
                </div>
            </div>



        </div>

    </div>

    <script>
        // Données de test (à remplacer par vos données réelles)
        const expediesData = {
            labels: ["Expédiés", "Autres"],
            datasets: [{
                label: 'Nombre de colis expédiés',
                data: [12, 88],
                backgroundColor: ['#FF6384', '#36A2EB'],
                borderWidth: 1
            }],
        };

        const recusData = {
            labels: ["Reçus", "Autres"],
            datasets: [{
                label: 'Nombre de colis reçus',
                data: [8, 92],
                backgroundColor: ['#FF6384', '#36A2EB'],
                borderWidth: 1
            }]
        };

        // Création des graphiques
        const expediesChartCanvas = document.getElementById('expediesChart').getContext('2d');
        const recusChartCanvas = document.getElementById('recusChart').getContext('2d');

        new Chart(expediesChartCanvas, {
            type: 'doughnut',
            data: expediesData,
            options: {
                cutout: '80%',
                plugins: {
                    title: {
                        display: true,
                        text: 'Nombre de colis expédiés',
                        color: "white"
                    }
                }
            }
        });

        new Chart(recusChartCanvas, {
            type: 'doughnut',
            data: recusData,
            options: {
                cutout: '80%',
                plugins: {
                    title: {
                        display: true,
                        text: 'Nombre de colis reçus',
                        color: "white"
                    }
                }
            }
        });
    </script>
@endsection
