<?php

namespace App\Exports;

use App\Models\Biota;
use App\Models\Track;
use App\Models\TrackDetail;
use App\Models\LaporanNelayan;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class ExportReport implements FromCollection, WithMultipleSheets
{
    private $param_start_date;
    private $param_end_date;

    public function __construct($param_start_date = null, $param_end_date = null)
    {
        $this->param_start_date = $param_start_date;
        $this->param_end_date = $param_end_date;
    }

    public function collection()
    {
        return collect([
            [
                'title' => 'Reports',
                'headers' => ['Rentang Waktu', 'Total Biota Tercatat', 'Total Hasil Tracker', 'Total Laporan Nelayan Masuk'],
                'data' => [
                    [
                        'Rentang Waktu' => $this->getTanggalTercatat(),
                        'Total Biota Tercatat' => $this->getTotalBiota(),
                        'Total Hasil Tracker' => $this->getTotalHasilTrack(),
                        'Total Laporan Nelayan Masuk' => $this->getTotalLaporanNelayan(),
                    ],  
                ],
            ],
            [
                'title' => 'Biota',
                'headers' => ['ID', 'Jenis Biota', 'Nama Biota', 'Deskripsi', 'Tanggal Tercatat'],
                'data' => $this->getDataBiota(),
            ],
            [
                'title' => 'Tracks',
                'headers' => ['ID', 'Tanggal', 'Nama Lokasi', 'Nama Biota', 'Latitude', 'Longitude', 'Keterangan'],
                'data' => $this->getDataTrack(),
            ],
            [
                'title' => 'Laporan Nelayan',
                'headers' => ['ID', 'Tanggal', 'Nama Lokasi', 'Jenis Temuan', 'Isi Laporan'],
                'data' => $this->getDataLaporanNelayan(),
            ],
        ]);
    }

    private function getTanggalTercatat()
    {
        if ($this->param_start_date === null && $this->param_end_date === null) {
            $tanggal_tercatat = 'Semua periode';
        } else if ($this->param_start_date === null || $this->param_end_date === null) {
            if ($this->param_start_date === null){
                $tanggal_tercatat = '??? - '.$this->param_end_date;
            } else {
                $tanggal_tercatat = $this->param_start_date.' - ???';
            }
        } else {
            $tanggal_tercatat = $this->param_start_date.' - '.$this->param_end_date;
        }
        
        return $tanggal_tercatat;
    }

    private function getTotalBiota()
    {
        $query = Biota::query();

        if ($this->param_start_date !== null && $this->param_end_date !== null) {
            $query->whereBetween('created_at', [$this->param_start_date, $this->param_end_date]);
        }

        return $query->count();
    }

    private function getTotalHasilTrack()
    {
        $query = TrackDetail::with('track')
        ->whereHas('track', function ($query) {
            $query->where('is_valid', '=', 1);
        });

        if ($this->param_start_date !== null && $this->param_end_date !== null) {
            $query->whereBetween('created_at', [$this->param_start_date, $this->param_end_date]);
        }
        
        return $query->count();
    }

    private function getTotalLaporanNelayan()
    {
        $query = LaporanNelayan::query();

        if ($this->param_start_date !== null && $this->param_end_date !== null) {
            $query->whereBetween('created_at', [$this->param_start_date, $this->param_end_date]);
        }

        return $query->count();
    }

    private function getDataBiota()
    {
        $query = DB::table('biotas')
        ->join('jenis_biotas', 'biotas.id_jenis_biota', '=', 'jenis_biotas.id')
        ->select('biotas.id', 'jenis_biotas.jenis_biota', 'biotas.nama_biota', 'biotas.deskripsi', 'biotas.created_at');

        if ($this->param_start_date !== null && $this->param_end_date !== null) {
            $query->whereBetween('biotas.created_at', [$this->param_start_date, $this->param_end_date]);
        }

        return $query->get();
    }

    private function getDataTrack()
    {
        $query = DB::table('track_details')
        ->join('tracks', 'track_details.id_track', '=', 'tracks.id')
        ->join('biotas', 'track_details.id_biota', '=', 'biotas.id')
        ->join('lokasis', 'track_details.id_lokasi', '=', 'lokasis.id')
        ->select('track_details.id', 'tracks.tanggal', 'lokasis.nama_lokasi', 'biotas.nama_biota', 'track_details.latitude', 'track_details.longitude', 'track_details.keterangan')
        ->where('tracks.is_valid', '=', 1);

        if ($this->param_start_date !== null && $this->param_end_date !== null) {
            $query->whereBetween('track_details.created_at', [$this->param_start_date, $this->param_end_date]);
        }

        return $query->get();
    }

    private function getDataLaporanNelayan()
    {
        $query = DB::table('laporan_nelayans')
        ->join('lokasis', 'laporan_nelayans.id_lokasi', '=', 'lokasis.id')
        ->join('jenis_temuan_nelayans', 'laporan_nelayans.id_jenis_temuan', '=', 'jenis_temuan_nelayans.id')
        ->select('laporan_nelayans.id', 'laporan_nelayans.tanggal', 'lokasis.nama_lokasi', 'jenis_temuan_nelayans.jenis_temuan', 'laporan_nelayans.isi_laporan');

        if ($this->param_start_date !== null && $this->param_end_date !== null) {
            $query->whereBetween('laporan_nelayans.created_at', [$this->param_start_date, $this->param_end_date]);
        }

        return $query->get();
    }

    public function sheets(): array
    {
        $sheets = [];

        foreach ($this->collection() as $dataSet) {
            $sheets[] = new ExportSheet($dataSet['title'], $dataSet['headers'], $dataSet['data']);
        }

        return $sheets;
    }
}

class ExportSheet implements FromCollection, WithHeadings, WithTitle
{
    protected $title;
    protected $headers;
    protected $data;

    public function __construct($title, $headers, $data)
    {
        $this->title = $title;
        $this->headers = $headers;
        $this->data = $data;
    }

    public function collection()
    {
        $collection = collect([]);

        foreach ($this->data as $item) {
            $collection->push((array)$item);
        }

        return $collection;
    }

    public function headings(): array
    {
        return $this->headers;
    }

    public function title(): string
    {
        return $this->title;
    }
}
