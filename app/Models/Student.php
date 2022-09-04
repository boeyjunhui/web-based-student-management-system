<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;

    // generate student list
    public static function getStudentList() {
        $studentList = DB::table('courses')
        ->join('students', 'courses.id', '=', 'students.courseID')
        ->select(
            'students.id',
            'students.name',
            'students.dob',
            'students.gender',
            'students.email',
            'students.phoneNumber',
            'students.address',
            'courses.courseName',
            'students.dateEnrollment'
        )
        ->orderBy('students.id', 'asc')
        ->get();

        return $studentList;
    }
}
