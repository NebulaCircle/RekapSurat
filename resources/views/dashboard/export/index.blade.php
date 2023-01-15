<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table {
        width: 60%;
        margin: auto;
    }

    th {
        padding: 10px;
    }
</style>

<body>



    <br><br>
    @php
        $m = date('m');
        $y = date('Y');
        $d = cal_days_in_month(1, $m, $y);
    @endphp
    @php
        $montNum = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
        
    @endphp
    <table border="1">
        <tr>
            <th style="width: 20px;" rowspan="3">No</th>
            <th style="min-width: 100px;" rowspan="3">Nama Siswa</th>
            <th colspan="{{ $d }}" style="text-align: left;">Bulan {{ $montNum[$bulan] }}</th>
            <th rowspan="2" colspan="3">Jumlah</th>
        </tr>
        <tr>
            <th colspan="{{ $d }}" style="text-align: left;">tanggal</th>
        </tr>
        <tr>

            @for ($i = 1; $i <= $d; $i++)
                <th style="width: 2px;">{{ $i }}</th>
            @endfor
            <th style="width: 2px;">S</th>
            <th style="width: 2px;">I</th>
            <th style="width: 2px;">A</th>
        </tr>

        @foreach ($siswa as $s)
            <tr>
                <td>
                    <center>
                        {{ $loop->iteration }} </center>
                </td>
                <td style="min-width: 200px;max-width:250px;">{{ $s->nama_lengkap }}</td>

                @for ($i = 1; $i <= $d; $i++)
                    @php
                        $idSiswaArray = [];
                        foreach ($rekap as $r) {
                            $idSiswaArray[] = $r->id_siswa;
                        }
                    @endphp
                    <td style="min-width: 200px;max-width:250px;">
                        <center>
                            @foreach ($rekap as $r)
                                @if ($r->id_siswa == $s->id)
                                    @if (date('d', strtotime($r->tanggal)) == $i)
                                        {{ $r->status == 'sakit' ? 'S' : ($r->status == 'izin' ? 'I' : ($r->status == 'alpa' ? 'A' : '')) }}
                                    @endif
                                @endif
                            @endforeach
                        </center>
                    </td>
                @endfor
                @php
                    $S = 0;
                    $I = 0;
                    $A = 0;
                    
                    foreach ($rekap as $r) {
                        if ($r->id_siswa == $s->id) {
                            if ($r->status == 'sakit') {
                                $S++;
                            }
                            if ($r->status == 'izin') {
                                $I++;
                            }
                            if ($r->status == 'alpa') {
                                $A++;
                            }
                        }
                    }
                @endphp
                <td>
                    <center>
                        {{ $S }}
                    </center>
                </td>
                <td>
                    <center>
                        {{ $I }}</center>
                </td>
                <td>
                    <center>
                        {{ $A }}</center>
                </td>
            </tr>
        @endforeach


    </table>
</body>

</html>
