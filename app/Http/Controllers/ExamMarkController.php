<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ExamMark;
use App\Exports\StudentExamMarkReportExport;
use App\Exports\SubjectExamMarkReportExport;
use Excel;

class ExamMarkController extends Controller
{
    // get student, course & subject data
    public function getData($id) {
        $student = DB::table('courses')
        ->join('students', 'courses.id', '=', 'students.courseID')
        ->where('students.id', '=', $id)
        ->get();

        $subject = DB::table('courses')
        ->join('students', 'courses.id', '=', 'students.courseID')
        ->join('subjects', 'courses.id', '=', 'subjects.courseID')
        ->where('students.id', '=', $id)
        ->get();

        return view('exam_mark/add_exam_mark', ['students' => $student], ['subjects' => $subject]);
    }

    // create exam mark
    public function createExamMark(Request $request) {
        $request->validate([
            'subject' => ['required'],
            'exam_mark' => ['required', 'max:6']
        ], [
            'subject.required' => 'Please select a subject!',
            'exam_mark.required' => 'Please fill in an exam mark!'
        ]);

        $examMark = new ExamMark;
        $examMark->studentID = $request->student;
        $examMark->courseID = $request->course;
        $examMark->subjectID = $request->subject;
        $examMark->examMark = $request->exam_mark;

        if ($request->exam_mark >= 80.00 && $request->exam_mark <= 100.00) {
            $examMark->grade = "A+ (Distinction)";
        } elseif ($request->exam_mark >= 75.00 && $request->exam_mark <= 79.99) {
            $examMark->grade = "A (Distinction)";
        } elseif ($request->exam_mark >= 70.00 && $request->exam_mark <= 74.99) {
            $examMark->grade = "B+ (Credit)";
        } elseif ($request->exam_mark >= 65.00 && $request->exam_mark <= 69.99) {
            $examMark->grade = "B (Credit)";
        } elseif ($request->exam_mark >= 60.00 && $request->exam_mark <= 64.99) {
            $examMark->grade = "C+ (Pass)";
        } elseif ($request->exam_mark >= 55.00 && $request->exam_mark <= 59.99) {
            $examMark->grade = "C (Pass)";
        } elseif ($request->exam_mark >= 50.00 && $request->exam_mark <= 54.99) {
            $examMark->grade = "C- (Pass)";
        } elseif ($request->exam_mark >= 40.00 && $request->exam_mark <= 49.99) {
            $examMark->grade = "D (Fail Marginal)";
        } elseif ($request->exam_mark >= 30.00 && $request->exam_mark <= 39.99) {
            $examMark->grade = "F+ (Fail)";
        } elseif ($request->exam_mark >= 20.00 && $request->exam_mark <= 29.99) {
            $examMark->grade = "F (Fail)";
        } elseif ($request->exam_mark >= 0.00 && $request->exam_mark <= 19.99) {
            $examMark->grade = "F- (Fail)";
        }

        if ($request->exam_mark >= 80.00 && $request->exam_mark <= 100.00) {
            $examMark->gpa = 4.00;
        } elseif ($request->exam_mark >= 75.00 && $request->exam_mark <= 79.99) {
            $examMark->gpa = 3.70;
        } elseif ($request->exam_mark >= 70.00 && $request->exam_mark <= 74.99) {
            $examMark->gpa = 3.30;
        } elseif ($request->exam_mark >= 65.00 && $request->exam_mark <= 69.99) {
            $examMark->gpa = 3.00;
        } elseif ($request->exam_mark >= 60.00 && $request->exam_mark <= 64.99) {
            $examMark->gpa = 2.70;
        } elseif ($request->exam_mark >= 55.00 && $request->exam_mark <= 59.99) {
            $examMark->gpa = 2.30;
        } elseif ($request->exam_mark >= 50.00 && $request->exam_mark <= 54.99) {
            $examMark->gpa = 2.00;
        } elseif ($request->exam_mark >= 40.00 && $request->exam_mark <= 49.99) {
            $examMark->gpa = 1.70;
        } elseif ($request->exam_mark >= 30.00 && $request->exam_mark <= 39.99) {
            $examMark->gpa = 1.30;
        } elseif ($request->exam_mark >= 20.00 && $request->exam_mark <= 29.99) {
            $examMark->gpa = 1.00;
        } elseif ($request->exam_mark >= 0.00 && $request->exam_mark <= 19.99) {
            $examMark->gpa = 0.00;
        }

        $examMark->save();
        return redirect('exammark');
    }

    // read exam mark
    public function readExamMark() {
        $examMark = DB::table('exam_marks')
        ->join('students', 'exam_marks.studentID', '=', 'students.id')
        ->join('courses', 'exam_marks.courseID', '=', 'courses.id')
        ->join('subjects', 'exam_marks.subjectID', '=', 'subjects.id')
        ->select('exam_marks.*', 'students.name', 'courses.courseName', 'subjects.subjectName')
        ->orderBy('exam_marks.id', 'asc')
        ->paginate(50);

        return view('exam_mark/exam_mark', ['examMarks' => $examMark]);
    }

    // get specific exam mark data
    public function getExamMark($id) {
        $examMark = DB::table('exam_marks')
        ->join('students', 'exam_marks.studentID', '=', 'students.id')
        ->join('courses', 'exam_marks.courseID', '=', 'courses.id')
        ->join('subjects', 'exam_marks.subjectID', '=', 'subjects.id')
        ->select('exam_marks.*', 'students.name', 'courses.courseName', 'subjects.subjectName')
        ->where('exam_marks.id', '=', $id)
        ->get();

        return view('exam_mark/edit_exam_mark', ['examMarks' => $examMark]);
    }

    // update exam mark
    public function updateExamMark(Request $request) {
        $request->validate([
            'exam_mark' => ['required', 'max:6']
        ], [
            'exam_mark.required' => 'Please fill in an exam mark!'
        ]);

        $examMark = ExamMark::find($request->id);
        $examMark->studentID = $request->student;
        $examMark->courseID = $request->course;
        $examMark->subjectID = $request->subject;
        $examMark->examMark = $request->exam_mark;

        if ($request->exam_mark >= 80.00 && $request->exam_mark <= 100.00) {
            $examMark->grade = "A+ (Distinction)";
        } elseif ($request->exam_mark >= 75.00 && $request->exam_mark <= 79.99) {
            $examMark->grade = "A (Distinction)";
        } elseif ($request->exam_mark >= 70.00 && $request->exam_mark <= 74.99) {
            $examMark->grade = "B+ (Credit)";
        } elseif ($request->exam_mark >= 65.00 && $request->exam_mark <= 69.99) {
            $examMark->grade = "B (Credit)";
        } elseif ($request->exam_mark >= 60.00 && $request->exam_mark <= 64.99) {
            $examMark->grade = "C+ (Pass)";
        } elseif ($request->exam_mark >= 55.00 && $request->exam_mark <= 59.99) {
            $examMark->grade = "C (Pass)";
        } elseif ($request->exam_mark >= 50.00 && $request->exam_mark <= 54.99) {
            $examMark->grade = "C- (Pass)";
        } elseif ($request->exam_mark >= 40.00 && $request->exam_mark <= 49.99) {
            $examMark->grade = "D (Fail Marginal)";
        } elseif ($request->exam_mark >= 30.00 && $request->exam_mark <= 39.99) {
            $examMark->grade = "F+ (Fail)";
        } elseif ($request->exam_mark >= 20.00 && $request->exam_mark <= 29.99) {
            $examMark->grade = "F (Fail)";
        } elseif ($request->exam_mark >= 0.00 && $request->exam_mark <= 19.99) {
            $examMark->grade = "F- (Fail)";
        }

        if ($request->exam_mark >= 80.00 && $request->exam_mark <= 100.00) {
            $examMark->gpa = 4.00;
        } elseif ($request->exam_mark >= 75.00 && $request->exam_mark <= 79.99) {
            $examMark->gpa = 3.70;
        } elseif ($request->exam_mark >= 70.00 && $request->exam_mark <= 74.99) {
            $examMark->gpa = 3.30;
        } elseif ($request->exam_mark >= 65.00 && $request->exam_mark <= 69.99) {
            $examMark->gpa = 3.00;
        } elseif ($request->exam_mark >= 60.00 && $request->exam_mark <= 64.99) {
            $examMark->gpa = 2.70;
        } elseif ($request->exam_mark >= 55.00 && $request->exam_mark <= 59.99) {
            $examMark->gpa = 2.30;
        } elseif ($request->exam_mark >= 50.00 && $request->exam_mark <= 54.99) {
            $examMark->gpa = 2.00;
        } elseif ($request->exam_mark >= 40.00 && $request->exam_mark <= 49.99) {
            $examMark->gpa = 1.70;
        } elseif ($request->exam_mark >= 30.00 && $request->exam_mark <= 39.99) {
            $examMark->gpa = 1.30;
        } elseif ($request->exam_mark >= 20.00 && $request->exam_mark <= 29.99) {
            $examMark->gpa = 1.00;
        } elseif ($request->exam_mark >= 0.00 && $request->exam_mark <= 19.99) {
            $examMark->gpa = 0.00;
        }

        $examMark->save();
        return redirect('exammark');
    }

    // delete exam mark
    public function deleteExamMark($id) {
        $examMark = ExamMark::find($id);
        $examMark->delete();
        return redirect('exammark');
    }
    
    // export student exam mark report
    public function exportStudentExamMarkReport() {
        return Excel::download(new StudentExamMarkReportExport, 'Student Exam Mark Report.csv');
    }

    // export subject exam mark report
    public function exportSubjectExamMarkReport() {
        return Excel::download(new SubjectExamMarkReportExport, 'Subject Exam Mark Report.csv');
    }
}
