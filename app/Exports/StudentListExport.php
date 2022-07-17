<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentListExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Student::getStudentList());
    }

    public function headings():array {
        return [
            'ID',
            'Name',
            'Date of Birth',
            'Gender',
            'Email',
            'Phone Number',
            'Address',
            'Course Name',
            'Date Enrollment'
        ];
    }
}
