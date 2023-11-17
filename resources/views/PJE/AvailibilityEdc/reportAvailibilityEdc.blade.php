<table>
    <thead>
        <tr>
            <th rowspan="2">ID</th>
            <th rowspan="2">Bulan</th>
            <th rowspan="2">Total MID</th>
            <th rowspan="2">Total TID</th>
            <th colspan="2">Jumlah TID</th>
            <th rowspan="2">% Availability per Bulan</th>
            <th rowspan="2">% Availability (YtD)</th>
        </tr>
        <tr>
            <th>Tidak Trx Dalam 30 Hari</th>
            <th>Trx Dalam 30 Hari</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listData as $list)
        <tr>
            <td>{{ $list->id }}</td>
            <td>{{ $list->bulan }}</td>
            <td>{{ $list->total_mid }}</td>
            <td>{{ $list->total_tid }}</td>
            <td>{{ $list->tid_tidak_trx }}</td>
            <td>{{ $list->tid_trx }}</td>
            <td>{{ round($list->availability_bulan, 2) }} %</td>
            <td>{{ round($list->availability_ytd, 2) }} %</td>
        </tr>
        @endforeach
    </tbody>
</table>