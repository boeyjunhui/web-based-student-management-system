<?php

namespace App\Exports;

use App\Models\ExamMark;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubjectExamMarkReportExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(ExamMark::getSubjectExamMarkReport());
    }

    public function headings():array {
        return [
            'ID',
            'Subject Name',
            'Subject Code',
            'Total Exam Mark (%)',
            'Average Exam Mark (%)'
        ];
    }
}
