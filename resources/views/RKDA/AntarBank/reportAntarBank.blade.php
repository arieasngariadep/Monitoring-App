<table>
    <thead>
        <tr>
            <th rowspan="4">ID</th>
            <th rowspan="4">Tanggal</th>
            <th colspan="24">HAK</th>
            <th colspan="24">KEWAJIBAN</th>
        </tr>
        <tr>
            <th colspan="10">WD (BNI AS ACQ)</th>
            <th rowspan="2" colspan="2">TOTAL WD</th>
            <th colspan="10">TRF (BNI AS DEST)</th>
            <th rowspan="2" colspan="2">TOTAL TRF</th>
            <th colspan="10">WD (BNI AS ISS)</th>
            <th rowspan="2" colspan="2">TOTAL WD</th>
            <th colspan="10">TRF TRF (BNI AS ISS)</th>
            <th rowspan="2" colspan="2">TOTAL TRF</th>
        </tr>
        <tr>
            <th colspan="2">LINK</th>
            <th colspan="2">MP</th>
            <th colspan="2">PRIMA</th>
            <th colspan="2">BERSAMA</th>
            <th colspan="2">ALTO</th>
            <th colspan="2">LINK</th>
            <th colspan="2">MP</th>
            <th colspan="2">PRIMA</th>
            <th colspan="2">BERSAMA</th>
            <th colspan="2">ALTO</th>
            <th colspan="2">LINK</th>
            <th colspan="2">MP</th>
            <th colspan="2">PRIMA</th>
            <th colspan="2">BERSAMA</th>
            <th colspan="2">ALTO</th>
            <th colspan="2">LINK</th>
            <th colspan="2">MP</th>
            <th colspan="2">PRIMA</th>
            <th colspan="2">BERSAMA</th>
            <th colspan="2">ALTO</th>
        </tr>
        <tr>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
            <th>TRX</th>
            <th>AMOUNT</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listData as $list)
        <tr>
            <td>{{ $list->id }}</td>
            <td>{{ $list->tanggal }}</td>
            <td>{{ $list->hak_trx_wd_link }}</td>
            <td>{{ $list->hak_amount_wd_link }}</td>
            <td>{{ $list->hak_trx_wd_mp }}</td>
            <td>{{ $list->hak_amount_wd_mp }}</td>
            <td>{{ $list->hak_trx_wd_prima }}</td>
            <td>{{ $list->hak_amount_wd_prima }}</td>
            <td>{{ $list->hak_trx_wd_bersama }}</td>
            <td>{{ $list->hak_amount_wd_bersama }}</td>
            <td>{{ $list->hak_trx_wd_alto }}</td>
            <td>{{ $list->hak_amount_wd_alto }}</td>
            <td>{{ $list->total_hak_trx_wd }}</td>
            <td>{{ $list->total_hak_amount_wd }}</td>
            <td>{{ $list->hak_trx_trf_link }}</td>
            <td>{{ $list->hak_amount_trf_link }}</td>
            <td>{{ $list->hak_trx_trf_mp }}</td>
            <td>{{ $list->hak_amount_trf_mp }}</td>
            <td>{{ $list->hak_trx_trf_prima }}</td>
            <td>{{ $list->hak_amount_trf_prima }}</td>
            <td>{{ $list->hak_trx_trf_bersama }}</td>
            <td>{{ $list->hak_amount_trf_bersama }}</td>
            <td>{{ $list->hak_trx_trf_alto }}</td>
            <td>{{ $list->hak_amount_trf_alto }}</td>
            <td>{{ $list->total_hak_trx_trf }}</td>
            <td>{{ $list->total_hak_amount_trf }}</td>           
            <td>{{ $list->kwj_trx_wd_link }}</td>
            <td>{{ $list->kwj_amount_wd_link }}</td>
            <td>{{ $list->kwj_trx_wd_mp }}</td>
            <td>{{ $list->kwj_amount_wd_mp }}</td>
            <td>{{ $list->kwj_trx_wd_prima }}</td>
            <td>{{ $list->kwj_amount_wd_prima }}</td>
            <td>{{ $list->kwj_trx_wd_bersama }}</td>
            <td>{{ $list->kwj_amount_wd_bersama }}</td>
            <td>{{ $list->kwj_trx_wd_alto }}</td>
            <td>{{ $list->kwj_amount_wd_alto }}</td>
            <td>{{ $list->total_kwj_trx_wd }}</td>
            <td>{{ $list->total_kwj_amount_wd }}</td>
            <td>{{ $list->kwj_trx_trf_link }}</td>
            <td>{{ $list->kwj_amount_trf_link }}</td>
            <td>{{ $list->kwj_trx_trf_mp }}</td>
            <td>{{ $list->kwj_amount_trf_mp }}</td>
            <td>{{ $list->kwj_trx_trf_prima }}</td>
            <td>{{ $list->kwj_amount_trf_prima }}</td>
            <td>{{ $list->kwj_trx_trf_bersama }}</td>
            <td>{{ $list->kwj_amount_trf_bersama }}</td>
            <td>{{ $list->kwj_trx_trf_alto }}</td>
            <td>{{ $list->kwj_amount_trf_alto }}</td>
            <td>{{ $list->total_kwj_trx_trf }}</td>
            <td>{{ $list->total_kwj_amount_trf }}</td>
        </tr>
        @endforeach
    </tbody>
</table>