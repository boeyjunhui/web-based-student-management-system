@include('component/header')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 mt-4 mb-4">
            <div class="card">
                <div class="card-header card-top">
                    <h2>
                        Edit Exam Mark
                        <a href="/exammark" class="btn btn-danger danger-btn float-end"><i class="fas fa-times"></i></a>
                    </h2>
                </div>
                <div class="card-body card-bottom">
                    <form action="/exammark/edit" method="POST">
                        @csrf

                        @foreach ($examMarks as $examMark)
                            <input type="hidden" name="id" value="{{ $examMark->id }}">

                            <div class="form-group">
                                <label for="student">Student</label>
                                <select class="form-select mt-1" name="student">
                                    <option value="{{ $examMark->studentID }}">{{ $examMark->name }}</option>
                                </select>
                            </div>

                            <div class='form-group mt-4'>
                                <label for="course">Course</label>
                                <select class="form-select mt-1" name="course">
                                    <option value="{{ $examMark->courseID }}">{{ $examMark->courseName }}</option>
                                </select>
                            </div>

                            <div class="form-group mt-4">
                                <label for="subject">Subject</label>
                                <select class="form-select mt-1" name="subject">
                                    <option value="{{ $examMark->subjectID }}">{{ $examMark->subjectName }}</option>
                                </select>
                            </div>

                            <div class="form-group mt-4">
                                <label for="exam_mark">Exam Mark</label>
                                <input class="form-control mt-1" type="number" name="exam_mark" value="{{ old('exam_mark', $examMark->examMark )}}" step="0.01" min="0" max="100" placeholder="Exam Mark">
                                <small class="validation-message">
                                    @error('exam_mark')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                        @endforeach

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