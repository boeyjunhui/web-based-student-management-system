<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Exports\CourseListExport;
use Excel;

class CourseController extends Controller
{
    // create course
    public function createCourse(Request $request) {
        $request->validate([
            'course_name' => ['required', 'max:100', 'unique:courses,courseName'],
            'course_code' => ['required', 'max:20', 'unique:courses,courseCode'],
            'faculty' => ['required'],
            'course_level' => ['required'],
            'course_duration' => ['required', 'max:30']
        ], [
            'course_name.required' => 'Please fill in a course name!',
            'course_code.required' => 'Please fill in a course code!',
            'faculty.required' => "Please select a faculty!",
            'course_level.required' => 'Please select a course level!',
            'course_duration.required' => 'Please fill in a course duration!'
        ]);

        $course = new Course;
        $course->courseName = $request->course_name;
        $course->courseCode = $request->course_code;
        $course->faculty = $request->faculty;
        $course->courseLevel = $request->course_level;
        $course->courseDuration = $request->course_duration;
        $course->save();
        return redirect('course');
    }

    // read course
    public function readCourse() {
        $course = DB::table('courses')
        ->select('courses.*')
        ->orderBy('courses.id', 'asc')
        ->paginate(10);

        return view('course/course', ['courses' => $course]);
    }

    // get specific course data
    public function getCourse($id) {
        $course = Course::find($id);
        return view('course/edit_course', ['course' => $course]);
    }

    // update course
    public function updateCourse(Request $request) {
        $request->validate([
            'course_name' => ['required', 'max:100'],
            'course_code' => ['required', 'max:20'],
            'faculty' => ['required'],
            'course_level' => ['required'],
            'course_duration' => ['required', 'max:30']
        ], [
            'course_name.required' => 'Please fill in a course name!',
            'course_code.required' => 'Please fill in a course code!',
            'faculty.required' => 'Please select a faculty!',
            'course_level.required' => 'Please select a course level!',
            'course_duration.required' => 'Please fill in a course duration!'
        ]);

        $course = Course::find($request->id);
        $course->courseName = $request->course_name;
        $course->courseCode = $request->course_code;
        $course->faculty = $request->faculty;
        $course->courseLevel = $request->course_level;
        $course->courseDuration = $request->course_duration;
        $course->save();
        return redirect('course');
    }

    // delete course
    public function deleteCourse($id) {
        $course = Course::find($id);
        $course->delete();
        return redirect('course');
    }

    // export course list
    public function exportCourseList() {
        return Excel::download(new CourseListExport, 'Course List.csv');
    }
}
