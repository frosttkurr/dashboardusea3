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
    public function collection()
    {
        return collect([
            [
                'title' => 'Reports',
                'headers' => ['Total Biota Tercatat', 'Total Hasil Tracker', 'Total Laporan Nelayan Masuk'],
                'data' => [
                    [
                        'Total Biota Tercatat' => Biota::count(),
                        'Total Hasil Tracker' => TrackDetail::with('track')
                            ->whereHas('track', function ($query) {
                                $query->where('is_valid', '=', 1);
                            })
                            ->count(),
                        'Total Laporan Nelayan Masuk' => LaporanNelayan::count(),
                    ],  
                ],
            ],
            [
                'title' => 'Biota',
                'headers' => ['ID', 'Jenis Biota', 'Nama Biota', 'Deskripsi'],
                'data' => DB::table('biotas')
                    ->join('jenis_biotas', 'biotas.id_jenis_biota', '=', 'jenis_biotas.id')
                    ->select('biotas.id', 'jenis_biotas.jenis_biota', 'biotas.nama_biota', 'biotas.deskripsi')
                    ->get(),
            ],
            [
                'title' => 'Tracks',
                'headers' => ['ID', 'Tanggal', 'Nama Lokasi', 'Nama Biota', 'Latitude', 'Longitude', 'Keterangan'],
                'data' => DB::table('track_details')
                    ->join('tracks', 'track_details.id_track', '=', 'tracks.id')
                    ->join('biotas', 'track_details.id_biota', '=', 'biotas.id')
                    ->join('lokasis', 'track_details.id_lokasi', '=', 'lokasis.id')
                    ->select('track_details.id', 'tracks.tanggal', 'lokasis.nama_lokasi', 'biotas.nama_biota', 'track_details.latitude', 'track_details.longitude', 'track_details.keterangan')
                    ->where('tracks.is_valid', '=', 1)
                    ->get(),
            ],
            [
                'title' => 'Laporan Nelayan',
                'headers' => ['ID', 'Tanggal', 'Nama Lokasi', 'Jenis Temuan', 'Isi Laporan'],
                'data' => DB::table('laporan_nelayans')
                    ->join('lokasis', 'laporan_nelayans.id_lokasi', '=', 'lokasis.id')
                    ->join('jenis_temuan_nelayans', 'laporan_nelayans.id_jenis_temuan', '=', 'jenis_temuan_nelayans.id')
                    ->select('laporan_nelayans.id', 'laporan_nelayans.tanggal', 'lokasis.nama_lokasi', 'jenis_temuan_nelayans.jenis_temuan', 'laporan_nelayans.isi_laporan')
                    ->get(),
            ],
        ]);
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
