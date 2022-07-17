@include('component/header')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 mt-4 mb-4">
            <div class="card">
                <div class="card-header card-top">
                    <h2>
                        Edit Student
                        <a href="/student" class="btn btn-danger danger-btn float-end"><i class="fas fa-times"></i></a>
                    </h2>
                </div>
                <div class="card-body card-bottom">
                    <form action="/student/edit" method="POST">
                        @csrf

                        @foreach ($students as $student)
                            <input type="hidden" name="id" value="{{ $student->id }}">

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control mt-1" type="text" name="name" value="{{ old('name', $student->name) }}" placeholder="Name">
                                <small class="validation-message">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>

                            <div class="form-group mt-4">
                                <label for="dob">Date of Birth</label>
                                <input class="form-control mt-1" type="date" name="dob" value="{{ old('dob', $student->dob) }}">
                                <small class="validation-message">
                                    @error('dob')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>

                            <div class="form-group mt-4">
                                <label for="gender">Gender</label>
                                <select class="form-select mt-1" name="gender">
                                    <option value="{{ $student->gender }}" selected>{{ $student->gender }}</option>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <small class="validation-message">
                                    @error('gender')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>

                            <div class="form-group mt-4">
                                <label for="email">Email</label>
                                <input class="form-control mt-1" type="email" name="email" value="{{ old('email', $student->email )}}" placeholder="Email">
                                <small class="validation-message">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>

                            <div class="form-group mt-4">
                                <label for="phone_number">Phone Number</label>
                                <input class="form-control mt-1" type="number" name="phone_number" value="{{ old('phone_number', $student->phoneNumber) }}" placeholder="Phone Number">
                                <small class="validation-message">
                                    @error('phone_number')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>

                            <div class="form-group mt-4">
                                <label for="address">Address</label>
                                <input class="form-control mt-1" type="text" name="address" value="{{ old('address', $student->address) }}" placeholder="Address">
                                <small class="validation-message">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>

                            <div class="form-group mt-4">
                                <label for="course">Course</label>
                                <select class="form-select mt-1" name="course">
                                    <option value="{{ $student->courseID }}">{{ $student->courseName }}</option>
                                    <option value="">Select Course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->courseName }}</option>
                                    @endforeach
                                </select>
                                <small class="validation-message">
                                    @error('course')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>

                            <div class="form-group mt-4">
                                <label for="date_enrollment">Date Enrollment</label>
                                <input class="form-control mt-1" type="date" name="date_enrollment" value="{{ old('date_enrollment', $student->dateEnrollment) }}">
                                <small class="validation-message">
                                    @error('date_enrollment')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>

                            <br><br>

                            <div class="form-group mt-4">
                                <button class="btn btn-primary primary-btn form-control" type="submit">Save</button>
                            </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('component/footer')