<?php

namespace App\Exports;

use App\Models\Subject;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubjectListExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Subject::getSubjectList());
    }

    public function headings():array {
        return [
            'ID',
            'Subject Name',
            'Subject Code',
            'Course Name'
        ];
    }
}
