<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Subject;
use App\Models\Course;
use App\Exports\SubjectListExport;
use Excel;

class SubjectController extends Controller
{
    // get course data
    public function getCourse() {
        $course = Course::all();
        return view('subject/add_subject', ['courses' => $course]);
    }

    // create subject
    public function createSubject(Request $request) {
        $request->validate([
            'course' => ['required'],
            'subject_name' => ['required', 'max:100'],
            'subject_code' => ['required', 'max:20']
        ], [
            'course.required' => 'Please select a course!',
            'subject_name.required' => 'Please fill in a subject name!',
            'subject_code.required' => 'Please fill in a subject code!'
        ]);

        $subject = new Subject;
        $subject->courseID = $request->course;
        $subject->subjectName = $request->subject_name;
        $subject->subjectCode = $request->subject_code;
        $subject->save();
        return redirect('subject');
    }

    // read subject
    public function readSubject() {
        $subject = DB::table('courses')
        ->join('subjects', 'courses.id', '=', 'subjects.courseID')
        ->select('subjects.*', 'courses.courseName', 'courses.courseCode')
        ->orderBy('subjects.id', 'asc')
        ->paginate(20);

        return view('subject/subject', ['subjects' => $subject]);
    }

    // get specific subject data
    public function getSubject($id) {
        $course = Course::all();
        $subject = DB::table('courses')
        ->join('subjects', 'courses.id', '=', 'subjects.courseID')
        ->where('subjects.id', '=', $id)
        ->get();

        return view('subject/edit_subject', ['courses' => $course], ['subjects' => $subject]);
    }

    // update subject
    public function updateSubject(Request $request) {
        $request->validate([
            'course' => ['required'],
            'subject_name' => ['required', 'max:100'],
            'subject_code' => ['required', 'max:20']
        ], [
            'course.required' => 'Please select a course!',
            'subject_name.required' => 'Please fill in a subject name!',
            'subject_code.required' => 'Please fill in a subject code!'
        ]);
        
        $subject = Subject::find($request->id);
        $subject->courseID = $request->course;
        $subject->subjectName = $request->subject_name;
        $subject->subjectCode = $request->subject_code;
        $subject->save();
        return redirect('subject');
    }

    // delete subject
    public function deleteSubject($id) {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect('subject');
    }

    // export subject list
    public function exportSubjectList() {
        return Excel::download(new SubjectListExport, 'Subject List.csv');
    }
}
