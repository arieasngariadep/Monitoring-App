<table>
    <thead>
        <tr>
            <th rowspan="2">ID</th>
            <th rowspan="2">Periode</th>
            <th colspan="2">Sesuai SLA</th>
            <th colspan="2">Tidak Sesuai SLA</th>
            <th rowspan="2">Total</th>
        </tr>
        <tr>
            <th>Jumlah</th>
            <th>%</th>
            <th>Jumlah</th>
            <th>%</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listData as $list)
        <tr>
            <td>{{ $list->id }}</td>
            <td>{{ $list->bulan }}</td>
            <td>{{ $list->jumlah_sesuai }}</td>
            <td>{{ round($list->persentase_sesuai, 2) }} %</td>
            <td>{{ $list->jumlah_tidak_sesuai }}</td>
            <td>{{ round($list->persentase_tidak_sesuai, 2) }} %</td>
            <td>{{ $list->jumlah_komplain }}</td>
        </tr>
        @endforeach
    </tbody>
</table>