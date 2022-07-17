@include('component/header')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header card-top">
                    <h2>Student</h2>

                    <div class="col-sm-4 float-start mt-2 mb-2">
                        <input class="form-control" id="search" type="text" name="search" placeholder="Search Student">
                    </div>

                    <div class="float-end mt-2 mb-2">
                        <a class="btn btn-primary primary-btn" href="student/add"><i class="far fa-plus-square"></i></a>
                        &nbsp
                        <a class="btn btn-success success-btn" href="student/student-list">
                            <i class="far fa-arrow-alt-circle-down"></i> Student List
                        </a>
                    </div>
                </div>

                <div class="card-body card-bottom table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>DOB</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Course</th>
                                <th>Date Enrollment</th>
                                <th class="text-center" colspan="3">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="table-data">
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->dob }}</td>
                                    <td>{{ $student->gender }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->phoneNumber }}</td>
                                    <td>{{ $student->address }}</td>
                                    <td>{{ $student->courseName }}</td>
                                    <td>{{ $student->dateEnrollment }}</td>
                                    <td><a class="btn btn-primary primary-btn" href={{ "exammark/add/".$student->id }}><i class="far fa-plus-square"></i> Exam Mark</a></td>
                                    <td><a class="btn btn-secondary secondary-btn" href={{ "student/edit/".$student->id }}><i class="far fa-edit"></i></a></td>
                                    <td><button class="btn btn-danger danger-btn delete-student" value="{{ $student->id }}"><i class="far fa-trash-alt"></i></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $students->links() }}
            </div>

            <div class="text-center">
                <small>Showing {{ $students->firstItem() }} to {{ $students->lastItem() }} of {{ $students->total() }} entries</small>
            </div>
        </div>
    </div>
</div>

@include('component/footer')