<table>
    <thead>
        <tr>
            <th colspan="2"
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
                Penerbit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($penerbits as $penerbit)
            <tr>
                <td
                    style="font-family: 'Cascadia Mono'; height: 25px; border: 1px solid black; padding: 15px; vertical-align: center; text-align: center;">
                    {{ $loop->iteration }}
                </td>
                <td
                    style="font-family: 'Cascadia Mono'; height: 25px; border: 1px solid black; padding: 15px; vertical-align: center;">
                    {{ $penerbit->penerbit }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
