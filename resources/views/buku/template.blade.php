<table>
    <thead>
        <tr>
            <th colspan="5"
                style="font-family: 'Cascadia Mono'; width: 400px; height: 25px; border-bottom: 1px solid black; padding: 15px; text-align: center; vertical-align: center;">
                Template Buku
            </th>
        </tr>
    </thead>
</table>

<table>
    <thead>
        <tr>
            <th
                style="font-family: 'Cascadia Mono'; width: 35px; height: 25px; background-color: #ffe599; border: 1px solid black; padding: 15px; vertical-align: center; text-align: center;">
                ID</th>
            <th
                style="font-family: 'Cascadia Mono'; width: 250px; height: 25px; background-color: #ffe599; border: 1px solid black; padding: 15px; vertical-align: center; text-align: center;">
                Penerbit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($penerbits as $penerbit)
            <tr>
                <td
                    style="font-family: 'Cascadia Mono'; height: 25px; border: 1px solid black; padding: 15px; vertical-align: center; text-align: center;">
                    {{ $penerbit->id }}</td>
                <td
                    style="font-family: 'Cascadia Mono'; height: 25px; border: 1px solid black; padding: 15px; vertical-align: center;">
                    {{ $penerbit->penerbit }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<table>
    <thead>
        <tr>
            <th colspan="2"
                style="font-family: 'Cascadia Mono'; height: 25px; background-color: #ffe599; border: 1px solid black; padding: 15px; vertical-align: center; text-align: center;">
                Judul</th>
            <th
                style="font-family: 'Cascadia Mono'; width: 150px; height: 25px; background-color: #ffe599; border: 1px solid black; padding: 15px; vertical-align: center; text-align: center;">
                Penulis</th>
            <th
                style="font-family: 'Cascadia Mono'; width: 150px; height: 25px; background-color: #ffe599; border: 1px solid black; padding: 15px; vertical-align: center; text-align: center;">
                Penerbit</th>
            <th
                style="font-family: 'Cascadia Mono'; width: 75px; height: 25px; background-color: #ffe599; border: 1px solid black; padding: 15px; vertical-align: center; text-align: center;">
                Tahun</th>
        </tr>
    </thead>
    <tbody>
        @for ($i = 1; $i <= 10; $i++)
            <tr>
                <td colspan="2"
                    style="font-family: 'Cascadia Mono'; height: 25px; border: 1px solid black; padding: 15px; vertical-align: center;">
                </td>
                <td
                    style="font-family: 'Cascadia Mono'; height: 25px; border: 1px solid black; padding: 15px; vertical-align: center;">
                </td>
                <td
                    style="font-family: 'Cascadia Mono'; height: 25px; border: 1px solid black; padding: 15px; vertical-align: center;">
                </td>
                <td
                    style="font-family: 'Cascadia Mono'; height: 25px; border: 1px solid black; padding: 15px; vertical-align: center; text-align: center;">
                </td>
            </tr>
        @endfor
    </tbody>
</table>
