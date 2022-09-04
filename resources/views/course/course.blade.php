@include('component/header')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header card-top">
                    <h2>Course</h2>

                    <div class="col-sm-4 float-start mt-2 mb-2">
                        <input class="form-control" id="search" type="text" name="search" placeholder="Search Course">
                    </div>

                    <div class="float-end mt-2 mb-2">
                        <a class="btn btn-primary primary-btn" href="course/add"><i class="far fa-plus-square"></i></a>
                        &nbsp
                        <a class="btn btn-success success-btn" href="course/course-list">
                            <i class="far fa-arrow-alt-circle-down"></i> Course List
                        </a>
                    </div>
                </div>

                <div class="card-body card-bottom table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Course Name</th>
                                <th>Course Code</th>
                                <th>Faculty</th>
                                <th>Course Level</th>
                                <th>Course Duration</th>
                                <th class="text-center" colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="table-data">
                            @php $no = 1; @endphp

                            @forelse ($courses as $course)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $course->courseName }}</td>
                                    <td>{{ $course->courseCode }}</td>
                                    <td>{{ $course->faculty }}</td>
                                    <td>{{ $course->courseLevel }}</td>
                                    <td>{{ $course->courseDuration }}</td>
                                    <td><a class="btn btn-secondary secondary-btn" href={{ "course/edit/".$course->id }}><i class="far fa-edit"></i></a></td>
                                    <td><button class="btn btn-danger danger-btn delete-course" value="{{ $course->id }}"><i class="far fa-trash-alt"></i></button></td>
                                </tr>

                                @php $no++; @endphp
                            @empty
                                <tr>
                                    <td colspan="8">No Data Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="d-flex justify-content-center mt-5">
                {{ $courses->links() }}
            </div>

            <div class="text-center">
                <small>Showing {{ $courses->firstItem() }} to {{ $courses->lastItem() }} of {{ $courses->total() }} entries</small>
            </div>
        </div>
    </div>
</div>

@include('component/footer')