<table>
    <thead>
        <tr>
            <th rowspan="2">ID</th>
            <th rowspan="2">Wilayah</th>
            <th rowspan="2">New Merchant</th>
            <th rowspan="2">EDC Terpasang</th>
            <th rowspan="2">% EDC Terpasang</th>
            <th colspan="2">EDC Belum Terpasang</th>
            <th rowspan="2">% Belum Terpasang</th>
            <th rowspan="2">Failed</th>
            <th rowspan="2">Pending</th>
            <th rowspan="2">% Gagal Pasang</th>
        </tr>
        <tr>
            <th>Sudah SPK</th>
            <th>Belum SPK</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listData as $list)
        <tr>
            <td>{{ $list->id }}</td>
            <td>{{ $list->wilayah }}</td>
            <td>{{ $list->new_merchant }}</td>
            <td>{{ $list->edc_terpasang }}</td>
            <td>{{ round($list->persentase_edc_terpasang, 2) }} %</td>
            <td>{{ $list->belum_pasang_sudah_spk }}</td>
            <td>{{ $list->belum_pasang_belum_spk }}</td>
            <td>{{ round($list->belum_pasang_sudah_spk, 2) }} %</td>
            <td>{{ $list->failed }}</td>
            <td>{{ $list->pending }}</td>
            <td>{{ round($list->persentase_gagal_pasang, 2) }} %</td>
        </tr>
        @endforeach
    </tbody>
</table>