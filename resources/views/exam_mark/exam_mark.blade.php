@include('component/header')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header card-top">
                    <h2>Exam Mark</h2>

                    <div class="col-sm-4 float-start mt-2 mb-2">
                        <input class="form-control" id="search" type="text" name="search" placeholder="Search Exam Mark">
                    </div>

                    <div class="float-end mt-2 mb-2">
                        <a class="btn btn-success success-btn" href="exammark/student-exam-mark-report">
                            <i class="far fa-arrow-alt-circle-down"></i> Student Exam Mark Report
                        </a>
                        &nbsp
                        <a class="btn btn-success success-btn" href="exammark/subject-exam-mark-report">
                            <i class="far fa-arrow-alt-circle-down"></i> Subject Exam Mark Report
                        </a>
                    </div>
                </div>

                <div class="card-body card-bottom table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student Name</th>
                                <th>Course Name</th>
                                <th>Subject Name</th>
                                <th>Exam Mark</th>
                                <th>Grade</th>
                                <th>GPA</th>
                                <th class="text-center" colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="table-data">
                            @foreach ($examMarks as $examMark)
                                <tr>
                                    <td>{{ $examMark->id }}</td>
                                    <td>{{ $examMark->name }}</td>
                                    <td>{{ $examMark->courseName }}</td>
                                    <td>{{ $examMark->subjectName }}</td>
                                    <td>{{ $examMark->examMark}}%</td>
                                    <td>{{ $examMark->grade }}</td>
                                    <td>{{ number_format($examMark->gpa, 2) }}</td>
                                    <td><a class="btn btn-secondary secondary-btn" href={{ "exammark/edit/".$examMark->id }}><i class="far fa-edit"></i></a></td>
                                    <td><button class="btn btn-danger danger-btn delete-exam-mark" value="{{ $examMark->id }}"><i class="far fa-trash-alt"></i></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $examMarks->links() }}
            </div>

            <div class="text-center">
                <small>Showing {{ $examMarks->firstItem() }} to {{ $examMarks->lastItem() }} of {{ $examMarks->total() }} entries</small>
            </div>
        </div>
    </div>
</div>

@include('component/footer')