<table>
    <thead>
        <tr>
            <th colspan="5"
                style="font-family: 'Cascadia Mono'; width: 400px; height: 25px; border-bottom: 1px solid black; padding: 15px; text-align: center; vertical-align: center;">
                {{ $judul }}
            </th>
        </tr>
    </thead>
</table>

<table>
    <thead>
        <tr>
            <th
                style="font-family: 'Cascadia Mono'; width: 40px; height: 25px; background-color: #ffe599; border: 1px solid black; padding: 15px; vertical-align: center; text-align: center;">
                No
            </th>
            <th
                style="font-family: 'Cascadia Mono'; width: 400px; height: 25px; background-color: #ffe599; border: 1px solid black; padding: 15px; vertical-align: center; text-align: center;">
                Judul</th>
            <th
                style="font-family: 'Cascadia Mono'; width: 200px; height: 25px; background-color: #ffe599; border: 1px solid black; padding: 15px; vertical-align: center; text-align: center;">
                Penulis</th>
            <th
                style="font-family: 'Cascadia Mono'; width: 200px; height: 25px; background-color: #ffe599; border: 1px solid black; padding: 15px; vertical-align: center; text-align: center;">
                Penerbit</th>
            <th
                style="font-family: 'Cascadia Mono'; width: 100px; height: 25px; background-color: #ffe599; border: 1px solid black; padding: 15px; vertical-align: center; text-align: center;">
                Tahun</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bukus as $buku)
            <tr>
                <td
                    style="font-family: 'Cascadia Mono'; height: 25px; border: 1px solid black; padding: 15px; vertical-align: center; text-align: center;">
                    {{ $loop->iteration }}
                </td>
                <td
                    style="font-family: 'Cascadia Mono'; height: 25px; border: 1px solid black; padding: 15px; vertical-align: center;">
                    {{ $buku->judul }}
                </td>
                <td
                    style="font-family: 'Cascadia Mono'; height: 25px; border: 1px solid black; padding: 15px; vertical-align: center;">
                    {{ $buku->penulis }}
                </td>
                <td
                    style="font-family: 'Cascadia Mono'; height: 25px; border: 1px solid black; padding: 15px; vertical-align: center;">
                    {{ $buku->penerbit->penerbit }}
                </td>
                <td
                    style="font-family: 'Cascadia Mono'; height: 25px; border: 1px solid black; padding: 15px; vertical-align: center; text-align: center;">
                    {{ $buku->tahun }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
