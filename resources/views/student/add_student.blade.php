@include('component/header')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 mt-4 mb-4">
            <div class="card">
                <div class="card-header card-top">
                    <h2>
                        Add Student
                        <a href="/student" class="btn btn-danger danger-btn float-end"><i class="fas fa-times"></i></a>
                    </h2>
                </div>
                <div class="card-body card-bottom">
                    <form action="/student/add" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control mt-1" type="text" name="name" value="{{ old('name') }}" placeholder="Name" >
                            <small class="validation-message">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="form-group mt-4">
                            <label for="dob">Date of Birth</label>
                            <input class="form-control mt-1" type="date" name="dob" value="{{ old('dob') }}">
                            <small class="validation-message">
                                @error('dob')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="form-group mt-4">
                            <label for="gender">Gender</label>
                            <select class="form-select mt-1" name="gender">
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
                            <input class="form-control mt-1" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                            <small class="validation-message">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="form-group mt-4">
                            <label for="phone_number">Phone Number</label>
                            <input class="form-control mt-1" type="number" name="phone_number" value="{{ old('phone_number') }}" placeholder="Phone Number" >
                            <small class="validation-message">
                                @error('phone_number')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="form-group mt-4">
                            <label for="address">Address</label>
                            <input class="form-control mt-1" type="text" name="address" value="{{ old('address') }}" placeholder="Address" >
                            <small class="validation-message">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="form-group mt-4">
                            <label for="course">Course</label>
                            <select class="form-select mt-1" name="course" >
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
                            <input class="form-control mt-1" type="date" name="date_enrollment" value="{{ old('date_enrollment') }}">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('component/footer')