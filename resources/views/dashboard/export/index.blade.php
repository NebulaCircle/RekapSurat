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
</style>

<body>



    <br><br>
    @php
        $m = $bulan;
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
            <th></th>
            <th></th>
            <th colspan="15"
                style="text-align: center;vertical-align: top;border-top:5px solid black;border-left:5px solid black;border-right:5px solid black">
                <b style="font-weight: bold">SMK NEGERI 1 BONDOWOSO</b>
            </th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th style="text-align: center;vertical-align: top;border-left:5px solid black;border-right:5px solid black"
                colspan="15">Jl. HOS.Cokroaminoto 110 Bondowoso</th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th style="text-align: center;vertical-align: top;border-bottom:5px solid black;border-left:5px solid black;border-right:5px solid black"
                colspan="15"><i style="font-weight: 500">Telp./Fax
                    (0332) 431201 e-mail: smkn1_bws@yahoo.co.id</i>
            </th>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>

            <th width="11" colspan="{{ $d }}" rowspan="3"
                style="text-transform: uppercase;font-weight: bold;font-size: 20px;width: 100px;text-align: center;vertical-align: middle">
                REKAPITULASI
                KETERLAMBATAN DAN
                ABSENSI PESERTA DIDIK <br> SEMESTER
                {{ $rekap[0]->tahunAjaran->semester == 'genap' ? 'GENAP' : 'GANJIL' }} TAHUN AJARAN
                {{ $rekap[0]->tahunAjaran->tahun_ajaran }}</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr>
            <td></td>
            <td colspan="10">Kelas / Keahlian</td>
            <td>:</td>
            <td colspan="15">{{ $rekap[0]->siswa->kelas->kelas }} {{ $rekap[0]->siswa->kelas->jurusan->nama_jurusan }}
                {{ $rekap[0]->siswa->kelas->no_kelas }}
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="10">Wali Kelas</td>
            <td>:</td>
            <td colspan="15">{{ $rekap[0]->walikelas->nama_lengkap }}</td>
        </tr>
        <tr></tr>
        <tr>
            <th style="font-size:13px;width: 20px;text-align: center;vertical-align: middle;font-weight:bold;border: 5px solid black"
                rowspan="3">No</th>
            <th style="font-size:13px;text-align: center;vertical-align: middle;font-weight:bold;border: 5px solid black"
                rowspan="3" colspan="10">Nama
                Siswa</th>
            <th colspan="{{ $d }}"
                style="font-size:13px;text-align: left;font-weight:bold;border: 5px solid #0000">
                Bulan {{ $montNum[$bulan] }} {{ date('Y', strtotime($rekap[0]->tanggal)) }}
            </th>
            <th rowspan="2" colspan="4"
                style="font-size:13px;text-align: center;vertical-align: middle;font-weight:bold;border: 5px solid black">
                Jumlah
            </th>
        </tr>
        <tr>
            <th colspan="{{ $d }}"
                style="font-size:13px;text-align: left;font-weight:bold;border: 5px solid black">Tanggal
            </th>
        </tr>
        <tr>

            @for ($i = 1; $i <= $d; $i++)
                <th style="font-size:13px;width: 2px;text-align:center;font-weight:bold;border: 5px solid black">
                    {{ $i }}
                </th>
            @endfor
            <th style="font-size:13px;width: 2px;text-align: center;font-weight:bold;border: 5px solid black">S</th>
            <th style="font-size:13px;width: 2px;text-align: center;font-weight:bold;border: 5px solid black">I</th>
            <th style="font-size:13px;width: 2px;text-align: center;font-weight:bold;border: 5px solid black">A</th>
            <th style="font-size:13px;width: 2px;text-align: center;font-weight:bold;border: 5px solid black">T</th>
        </tr>

        @foreach ($siswa as $s)
            <tr>
                <td style="text-align: center;border: 5px solid black">
                    <center>
                        {{ $loop->iteration }} </center>
                </td>
                <td colspan="10" style="min-width: 200px;max-width:250px;border: 5px solid black">
                    {{ $s->nama_lengkap }}</td>

                @for ($i = 1; $i <= $d; $i++)
                    <td
                        style="min-width: 200px;max-width:250px;text-align: center;border: 5px solid black;background-color:{{ date('D', strtotime("$y-$m-$i")) === 'Sun' || date('D', strtotime("$y-$m-$i")) === 'Sat' ? 'black' : '' }}">
                        @foreach ($rekap as $r)
                            @if ($r->id_siswa == $s->id)
                                @if (date('d', strtotime($r->tanggal)) == $i)
                                    {{ $r->status == 'sakit' ? 'S' : ($r->status == 'izin' ? 'I' : (($r->status == 'alpa' ? 'A' : $r->status == 'terlambat') ? 'T' : '')) }}
                                @else
                                @endif
                            @endif
                        @endforeach
                    </td>
                @endfor
                @php
                    $S = 0;
                    $I = 0;
                    $A = 0;
                    $T = 0;
                    
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
                            if ($r->status == 'terlambat') {
                                $T++;
                            }
                        }
                    }
                @endphp
                <td style="vertical-align: middle;text-align:center;border: 5px solid black">
                    <center>
                        {{ $S }}
                    </center>
                </td>
                <td style="vertical-align: middle;text-align:center;border: 5px solid black">
                    <center>
                        {{ $I }}</center>
                </td>
                <td style="vertical-align: middle;text-align:center;border: 5px solid black">
                    <center>
                        {{ $A }}</center>
                </td>
                <td style="vertical-align: middle;text-align:center;border: 5px solid black">
                    <center>
                        {{ $T }}</center>
                </td>
            </tr>
        @endforeach

        @php
            $siswcount = count($siswa);
            $count = 40;
            
            $loop = 40 - $siswcount;
            $no = $siswcount + 1;
        @endphp


        @for ($s = 1; $s <= $loop; $s++)
            <tr>
                <td style="text-align: center;border: 5px solid black">
                    <center>
                        {{ $no++ }} </center>
                </td>
                <td colspan="10" style="min-width: 200px;max-width:250px;border: 5px solid black">
                    0</td>

                @for ($i = 1; $i <= $d; $i++)
                    <td
                        style="min-width: 200px;max-width:250px;text-align: center;border: 5px solid black;background-color:{{ date('D', strtotime("$y-$m-$i")) === 'Sun' || date('D', strtotime("$y-$m-$i")) === 'Sat' ? 'black' : '' }}">
                        0
                    </td>
                @endfor

                <td style="vertical-align: middle;text-align:center;border: 5px solid black">
                    0
                </td>
                <td style="vertical-align: middle;text-align:center;border: 5px solid black">
                    0
                </td>
                <td style="vertical-align: middle;text-align:center;border: 5px solid black">
                    0
                </td>
                <td style="vertical-align: middle;text-align:center;border: 5px solid black">
                    0
                </td>
            </tr>
        @endfor



        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="7">Wali Kelas</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="7">Guru Bimbingan Konseling</td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="7" style="text-decoration: underline;font-weight: bold">
                {{ $rekap[0]->walikelas->nama_lengkap }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

            <td colspan="7" style="text-decoration: underline;font-weight: bold">
                {{ $rekap[0]->bk->nama_lengkap }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="7" style="">NIP.</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

            <td colspan="7" style="">NIP.</td>
        </tr>
    </table>
</body>

</html>
