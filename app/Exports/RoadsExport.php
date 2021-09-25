<?php

namespace App\Exports;

use App\Constant\PavementType;
use App\Models\Road;
use App\Repositories\Contracts\RoadRepositoryInterface;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Excel;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RoadsExport implements FromCollection, Responsable,
    WithMapping, WithHeadings, WithColumnFormatting,
    WithStyles
{
    use Exportable;

    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = 'road_report.xlsx';

    /**
     * Optional Writer Type
     */
    private $writerType = Excel::XLSX;

    /**
     * Optional headers
     */
    private $headers = [
        'Content-Type' => 'text/csv',
    ];

    public function __construct(RoadRepositoryInterface $road)
    {
        $this->road = $road;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->road->withLatestProgression()->get();
    }

    /**
     * @var Road $invoice
     */
    public function map($road): array
    {
        return [
            $road->name,
            $road->village->name,
            $road->district->name,
            $road->city->name,
            $road->province->name,
            PavementType::$indonesiaText[$road->pavement_type],
            $road->planning->width,
            $road->planning->length,
            $road->budget,
            ($road->ongoing->width ?? 0),
            ($road->ongoing->length ?? 0),
            ($road->cost ?? 0),
            $road->executor,
            $road->executor_contact,
            $road->start_at,
            $road->end_at,
            $road->supervisor,
            $road->problem,
            $road->latestProgression->status,
        ];
    }

    public function headings(): array
    {
        return [
            __('Road Name'),
            __('Village'),
            __('District'),
            __('City'),
            __('Province'),
            __('Pavement Type'),
            __('Road Width'),
            __('Road Length'),
            __('Budget'),
            __('Road Width').' Kontrak',
            __('Road Length').' Kontrak',
            __('Contract Value'),
            __('Executor'),
            __('Executor Contact'),
            __('Start of Contract Date'),
            __('End of Contract Date'),
            __('Supervisor Consultant'),
            __('Problem'),
            'Status',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'I' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'L' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }
}
