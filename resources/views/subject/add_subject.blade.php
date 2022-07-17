@include('component/header')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 mt-4 mb-4">
            <div class="card">
                <div class="card-header card-top">
                    <h2>
                        Add Subject
                        <a href="/subject" class="btn btn-danger danger-btn float-end"><i class="fas fa-times"></i></a>
                    </h2>
                </div>
                <div class="card-body card-bottom">
                    <form action="/subject/add" method="POST">
                        @csrf
                        
                        <div class='form-group'>
                            <label for="course">Course</label>
                            <select class="form-select mt-1" name="course">
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
                            <label for="subject_name">Subject Name</label>
                            <input class="form-control mt-1" type="text" name="subject_name" value="{{ old('subject_name') }}" placeholder="Subject Name">
                            <small class="validation-message">
                                @error('subject_name')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="form-group mt-4">
                            <label for="suject_code">Subject Code</label>
                            <input class="form-control mt-1" type="text" name="subject_code" value="{{ old('subject_code') }}" placeholder="Subject Code">
                            <small class="validation-message">
                                @error('subject_code')
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