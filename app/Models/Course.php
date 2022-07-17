<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    use HasFactory;
    public $timestamps = false;

    // generate course list
    public static function getCourseList() {
        $courseList = DB::table('courses')
        ->select('courses.*')
        ->orderBy('courses.id', 'asc')
        ->get();

        return $courseList;
    }
}
