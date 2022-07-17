<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Course;
use App\Exports\StudentListExport;
use Excel;

class StudentController extends Controller
{
    // get course data
    public function getCourse() {
        $course = Course::all();
        return view('student/add_student', ['courses' => $course]);
    }

    // create student
    public function createStudent(Request $request) {
        $request->validate([
            'name' => ['required', 'max:100'],
            'dob' => ['required'],
            'gender' => ['required'],
            'email' => ['required', 'max:100', 'unique:students,email'],
            'phone_number' => ['required', 'between:10,11', 'unique:students,phoneNumber'],
            'address' => ['required'],
            'course' => ['required'],
            'date_enrollment' => ['required']
        ], [
            'name.required' => 'Please fill in a name!',
            'dob.required' => 'Please select a date of birth!',
            'gender.required' => 'Please select a gender!',
            'email.required' => 'Please fill in an email!',
            'phone_number.required' => 'Please fill in a phone number!',
            'address.required' => 'Please fill in an address!',
            'course.required' => 'Please select a course!',
            'date_enrollment.required' => 'Please select a date enrollment!'
        ]);

        $student = new Student;
        $student->name = $request->name;
        $student->dob = $request->dob;
        $student->gender = $request->gender;
        $student->email = $request->email;
        $student->phoneNumber = $request->phone_number;
        $student->address = $request->address;
        $student->courseID = $request->course;
        $student->dateEnrollment = $request->date_enrollment;
        $student->save();
        return redirect('student');
    }

    // read student
    public function readStudent() {
        $student = DB::table('courses')
        ->join('students', 'courses.id', '=', 'students.courseID')
        ->select('students.*', 'courses.courseName')
        ->orderBy('students.id', 'asc')
        ->paginate(50);

        return view('student/student', ['students' => $student]);
    }

    // get specific student data
    public function getStudent($id) {
        $course = Course::all();

        $student = DB::table('courses')
        ->join('students', 'courses.id', '=', 'students.courseID')
        ->where('students.id', '=', $id)
        ->get();

        return view('student/edit_student', ['courses' => $course], ['students' => $student]);
    }
    
    // update student
    public function updateStudent(Request $request) {
        $request->validate([
            'name' => ['required', 'max:100'],
            'dob' => ['required'],
            'gender' => ['required'],
            'email' => ['required', 'max:100'],
            'phone_number' => ['required', 'between:10,11'],
            'address' => ['required'],
            'course' => ['required'],
            'date_enrollment' => ['required']
        ], [
            'name.required' => 'Please fill in a name!',
            'dob.required' => 'Please select a date of birth!',
            'gender.required' => 'Please select a gender!',
            'email.required' => 'Please fill in an email!',
            'phone_number.required' => 'Please fill in a phone number!',
            'address.required' => 'Please fill in an address!',
            'course.required' => 'Please select a course!',
            'date_enrollment.required' => 'Please select a date enrollment!'
        ]);

        $student = Student::find($request->id);
        $student->name = $request->name;
        $student->dob = $request->dob;
        $student->gender = $request->gender;
        $student->email = $request->email;
        $student->phoneNumber = $request->phone_number;
        $student->address = $request->address;
        $student->courseID = $request->course;
        $student->dateEnrollment = $request->date_enrollment;
        $student->save();
        return redirect('student');
    }

    // delete student
    public function deleteStudent($id) {
        $student = Student::find($id);
        $student->delete();
        return redirect('student');
    }

    // export student list
    public function exportStudentList() {
        return Excel::download(new StudentListExport, 'Student List.csv');
    }
}
