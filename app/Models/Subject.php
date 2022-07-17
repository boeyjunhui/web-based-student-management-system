<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subject extends Model
{
    use HasFactory;
    public $timestamps = false;

    // generate subject list
    public static function getSubjectList() {
        $subjectList = DB::table('courses')
        ->join('subjects', 'courses.id', '=', 'subjects.courseID')
        ->select(
            'subjects.id',
            'subjects.subjectName',
            'subjects.subjectCode',
            'courses.courseName'
        )
        ->orderBy('subjects.id', 'asc')
        ->get();

        return $subjectList;
    }
}
