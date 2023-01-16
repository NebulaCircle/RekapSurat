<?php

namespace App\Exports;

use App\Models\Rekap;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Siswa;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class RekapExport implements ShouldAutoSize,FromView,WithColumnWidths,WithDrawings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct() {
        $this->bulan = Request()->bulan;
        $this->kelas = Request()->id_kelas;
        $this->tahun_ajaran = Request()->tahun_ajaran;
    }
    public function view(): View
    {
        $rekap = Rekap::with(['siswa'])->whereHas('siswa',function($e){
            $e->where('id_kelas',$this->kelas);
            $e->whereMonth('tanggal',$this->bulan);
            
        })->get();
        if ($this->tahun_ajaran) {
             $rekap = Rekap::with(['siswa'])
                        ->whereHas('siswa',function($e){
                        $e->where('id_kelas',$this->kelas);
                    })
                    ->with(['tahunAjaran'])
                        ->whereHas('tahunAjaran',function($e){
                        $e->where('id',$this->tahun_ajaran);
                    })
                    ->get();
        }

        $siswa = Siswa::where('id_kelas',$this->kelas)->get();
        $bulan = $this->bulan;

        if($this->tahun_ajaran){
        return view('dashboard.export.rekap-persemester',compact('rekap','siswa','bulan'));
            
        }
        return view('dashboard.export.index',compact('rekap','siswa','bulan'));
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/img/logo-smk.png'));
        $drawing->setHeight(45);
        $drawing->setCoordinates('S3');
        
        $drawing2 = new Drawing();
        $drawing2->setName('Logo');
        $drawing2->setDescription('This is my logo');
        $drawing2->setPath(public_path('/img/jawaTimur-logo.png'));
        $drawing2->setHeight(55);
        $drawing2->setCoordinates('A3');

        return [$drawing,$drawing2];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('J10')->getAlignment()->setWrapText(true);
    }

        public function columnWidths(): array
    {
        return [
            'A' => 3,
            'C' => 4,            
            'D' => 4,            
            'E' => 4,            
            'F' => 4,            
            'G' => 4,            
            'H' => 4,            
            'I' => 4,            
            'J' => 4,            
            'K' => 4,            
            'L' => 4,            
            'M' => 4,            
            'N' => 4,            
            'O' => 4,            
            'P' => 4,            
            'Q' => 4,            
            'R' => 4,            
            'S' => 4,            
            'T' => 4,            
            'U' => 4,            
            'V' => 4,            
            'W' => 4,            
            'X' => 4,            
            'Y' => 4,            
            'Z' => 4,            
            'AA' => 4,
            'AB' => 4,
            'AC' => 4,            
            'AD' => 4,            
            'AE' => 4,            
            'AF' => 4,            
            'AG' => 4,            
            'AH' => 4,            
            'AI' => 4,            
            'AJ' => 4,            
            'AK' => 4,            
            'AL' => 4,            
            'AM' => 4,            
            'AN' => 4,            
            'AO' => 4,            
            'AP' => 4,            
            'AQ' => 4,            
            'AR' => 4,            
            'AS' => 4,            
            'AT' => 4,            
            'AU' => 4,            
            'AV' => 4,            
            'AW' => 4,            
            'AX' => 4,            
            'AY' => 4,            
            'AZ' => 4,            
        ];
    }
}
