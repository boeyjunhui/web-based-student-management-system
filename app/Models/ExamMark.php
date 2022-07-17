<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ExamMark extends Model
{
    use HasFactory;
    public $timestamps = false;

    // generate student exam mark report
    public static function getStudentExamMarkReport() {
        $studentExamMark = DB::table('exam_marks')
        ->join('students', 'exam_marks.studentID', '=', 'students.id')
        ->join('courses', 'exam_marks.courseID', '=', 'courses.id')
        ->join('subjects', 'exam_marks.subjectID', '=', 'subjects.id')
        ->select(
            'students.id',
            'students.name',
            'courses.courseName',
            DB::raw('COUNT(exam_marks.subjectID)'),
            DB::raw('SUM(exam_marks.examMark)'),
            DB::raw('AVG(exam_marks.examMark)'),
            DB::raw('AVG(exam_marks.gpa)')
        )
        ->groupBy('students.id', 'exam_marks.studentID')
        ->get();

        return $studentExamMark;
    }

    // generate subject exam mark report
    public static function getSubjectExamMarkReport() {
        $subjectExamMark = DB::table('exam_marks')
        ->join('courses', 'exam_marks.courseID', '=', 'courses.id')
        ->join('subjects', 'exam_marks.subjectID', '=', 'subjects.id')
        ->select(
            'subjects.id',
            'subjects.subjectName',
            'subjects.subjectCode',
            DB::raw('SUM(exam_marks.examMark)'),
            DB::raw('AVG(exam_marks.examMark)')
        )
        ->groupBy('subjects.id', 'subjects.subjectName')
        ->get();

        return $subjectExamMark;
    }
}
