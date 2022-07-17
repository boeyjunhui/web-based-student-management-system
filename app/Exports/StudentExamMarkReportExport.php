<?php

namespace App\Exports;

use App\Models\ExamMark;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExamMarkReportExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(ExamMark::getStudentExamMarkReport());
    }

    public function headings():array {
        return [
            'ID',
            'Student Name',
            'Course Name',
            'Total Subjects',
            'Total Exam Marks (%)',
            'Average Exam Marks (%)',
            'CGPA'
        ];
    }
}
