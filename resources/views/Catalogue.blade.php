


<h1>Our Catalogue</h1>
<h2>products</h2>

<table border=1>
    <thead>
        <tr>
            <th>Nom</th>
            <th scope="col">Prix_initial</th>
            <th scope="col">Prix_avec solde</th>
            <th scope="col">Image</th>
        </tr>
    </thead>
    <tbody>
        @foreach($product as $h )
        <tr>
            <td>{{ $h['titre'] }}  </td>
        <td>{{ $h['prix'] }} DAM</td>
        <td>{{ $h['prix'] -(0.4*$h['prix']) }}DAM</td>
        <td><img src="{{ public_path('imgs/'.$h["image"])}}" height="100px" width="100px" alt="{{ $h['titre'] }}"></td>
    </tr>

        @endforeach
    </tbody>
</table>
