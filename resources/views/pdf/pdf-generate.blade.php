<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style>
    .table {
        width: 100%;
    }
</style>
<body>
    <table class="table">
        <tr>
            <td style="text-align: left">
                <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('/images/Postman.png')))}}" width="100px"/>
            </td>
            <td style="text-align: right">
                <p><strong style="text-decoration: underline">Facture N</strong> : {{ $courrier -> fact_id }}</p>
                <p><strong style="text-decoration: underline">Date</strong> : {{ date("Y-m-d", strtotime($courrier -> updated_at)) }}</p>
            </td>
        </tr>
    </table>

    <table class="table" style="margin-top: 50px; margin-bottom: 50px">
        <thead>
            <tr>
                <th style="text-align: left; font-size: 20px">Expediteurs</th>
                <th style="text-align: left; font-size: 20px">Destinataire</th>
            </tr>
        </thead>
        <tbody>
            <tr style="font-size: 15px">
                <td style="width: 65%">
                    <p><strong>Nom</strong> : {{$expediteur -> nom}}</p>
                    <p><strong>Prenom</strong> : {{ $expediteur -> prenom }}</p>
                    <p><strong>Code postal</strong> : {{ $poste["post_exp"] -> bp }}</p>
                    <p><strong>Adresse</strong> : {{ $expediteur -> adresse }}</p>
                    <p><strong>Telephone</strong> : {{ $expediteur -> tel }}</p>
                    <p><strong>Email</strong> : {{ $expediteur -> email }}</p>
                </td>
                <td>
                    <p><strong>Nom</strong> : {{$destinataire -> nom}}</p>
                    <p><strong>Prenom</strong> : {{ $destinataire -> prenom }}</p>
                    <p><strong>Code postal</strong> : {{ $poste["post_dest"] -> bp }}</p>
                    <p><strong>Adresse</strong> : {{ $destinataire -> adresse }}</p>
                    <p><strong>Telephone</strong> : {{ $destinataire -> tel }}</p>
                    <p><strong>Email</strong> : {{ $destinataire -> email }}</p>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="table">
        <thead>
            <tr>
                <th>Numero</th>
                <th>Libelle</th>
                <th>Poids en (g)</th>
                <th>Prix par (g)</th>
                <th>Prix total</th>
            </tr>
        </thead>
        <tbody>
            <tr style="text-align: center">
                <td>{{ $courrier -> id }}</td>
                <td>{{ $courrier -> libelle }}</td>
                <td>{{ $courrier -> poids }}</td>
                <td>{{ $courrier -> prix / $courrier -> poids }}</td>
                <td>{{ $courrier -> prix }}</td>
            </tr>
            <tr style="text-align: right">
                <td colspan="5" style="padding-top: 50px; padding-right: 30px">Signature</td>
            </tr>
        </tbody>
    </table>

</body>
</html>