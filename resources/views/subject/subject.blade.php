@include('component/header')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header card-top">
                    <h2>Subject</h2>

                    <div class="col-sm-4 float-start mt-2 mb-2">
                        <input class="form-control" id="search" type="text" name="search" placeholder="Search Subject">
                    </div>

                    <div class="float-end mt-2 mb-2">
                        <a class="btn btn-primary primary-btn" href="subject/add"><i class="far fa-plus-square"></i></a>
                        &nbsp
                        <a class="btn btn-success success-btn" href="subject/subject-list">
                            <i class="far fa-arrow-alt-circle-down"></i> Subject List
                        </a>
                    </div>
                </div>

                <div class="card-body card-bottom table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Subject Name</th>
                                <th>Subject Code</th>
                                <th>Course Name</th>
                                <th class="text-center" colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="table-data">
                            @foreach ($subjects as $subject)
                                <tr>
                                    <td>{{ $subject->id}}</td>
                                    <td>{{ $subject->subjectName }}</td>
                                    <td>{{ $subject->subjectCode }}</td>
                                    <td>{{ $subject->courseName }}</td>
                                    <td><a class="btn btn-secondary secondary-btn" href={{ "subject/edit/".$subject->id }}><i class="far fa-edit"></i></a></td>
                                    <td><button class="btn btn-danger danger-btn delete-subject" value="{{ $subject->id }}"><i class="far fa-trash-alt"></i></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $subjects->links() }}
            </div>

            <div class="text-center">
                <small>Showing {{ $subjects->firstItem() }} to {{ $subjects->lastItem() }} of {{ $subjects->total() }} entries</small>
            </div>
        </div>
    </div>
</div>

@include('component/footer')