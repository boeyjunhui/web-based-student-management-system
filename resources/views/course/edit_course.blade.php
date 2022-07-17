@include('component/header')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 mt-4 mb-4">
            <div class="card">
                <div class="card-header card-top">
                    <h2>
                        Edit Course
                        <a href="/course" class="btn btn-danger danger-btn float-end"><i class="fas fa-times"></i></a>
                    </h2>
                </div>
                <div class="card-body card-bottom">
                    <form action="/course/edit" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{ $course->id }}">

                        <div class="form-group">
                            <label for="course_name">Course Name</label>
                            <input class="form-control mt-1" type="text" name="course_name" value="{{ old('course_name', $course->courseName) }}" placeholder="Course Name">
                            <small class="validation-message">
                                @error('course_name')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="form-group mt-4">
                            <label for="course_code">Course Code</label>
                            <input class="form-control mt-1" type="text" name="course_code" value="{{ old('course_code', $course->courseCode) }}" placeholder="Course Code">
                            <small class="validation-message">
                                @error('course_code')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="form-group mt-4">
                            <label for="faculty">Faculty</label>
                            <select class="form-select mt-1" name="faculty">
                                <option value="{{ $course->faculty }}" selected>{{ $course->faculty }}</option>
                                <option value="">Select Faculty</option>
                                <option value="Computing, Technology & Games Development">Computing, Technology & Games Development</option>
                                <option value="Design, Advertising & Animation">Design, Advertising & Animation</option>
                                <option value="Engineering">Engineering</option>
                                <option value="Business, Management, Marketing & Tourism">Business, Management, Marketing & Tourism</option>
                                <option value="Accouting, Banking, Finance & Actuarial">Accouting, Banking, Finance & Actuarial</option>
                            </select>
                            <small class="validation-message">
                                @error('faculty')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="form-group mt-4">
                            <label for="course_level">Course Level</label>
                            <select class="form-select mt-1" name="course_level">
                                <option value="{{ $course->courseLevel }}" selected>{{ $course->courseLevel }}</option>
                                <option value="">Select Course Level</option>
                                <option value="Pre-University Foundation">Pre-University Foundation</option>
                                <option value="Pre-Univeristy Diploma">Pre-University Diploma</option>
                                <option value="Undergraduate Degree">Undergraduate Degree</option>
                                <option value="Masters Degree">Masters Degree</option>
                                <option value="Doctor of Philosophy">Doctor of Philosophy</option>
                            </select>
                            <small class="validation-message">
                                @error('course_level')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="form-group mt-4">
                            <label for="course_duration">Course Duration</label>
                            <input class="form-control mt-1" type="text" name="course_duration" value="{{ old('course_duration', $course->courseDuration) }}" placeholder="Course Duration">
                            <small class="validation-message">
                                @error('course_duration')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <br><br>

                        <div class="form-group mt-4">
                            <button class="btn btn-primary primary-btn form-control" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('component/footer')