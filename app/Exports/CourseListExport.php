<?php

namespace App\Exports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CourseListExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Course::getCourseList());
    }

    public function headings():array {
        return [
            'ID',
            'Course Name',
            'Course Code',
            'Faculty',
            'Course Level',
            'Course Duration'
        ];
    }
}
