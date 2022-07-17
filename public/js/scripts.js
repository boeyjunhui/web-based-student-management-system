// filter and search
$(document).ready(function(){
    $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#table-data tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    });
});

// delete student
$(document).ready(function () {
    $('.delete-student').click(function (event) {
        event.preventDefault();

        confirmDialog = confirm("Are you sure to delete this student?");

        if (confirmDialog) {
            var studentID = $(this).val();

            $.ajax({
                type: "GET",
                url: "student/delete/" + studentID,
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    });
});

// delete course
$(document).ready(function () {
    $('.delete-course').click(function (event) {
        event.preventDefault();

        confirmDialog = confirm("Are you sure to delete this course?");

        if (confirmDialog) {
            var courseID = $(this).val();

            $.ajax({
                type: "GET",
                url: "course/delete/" + courseID,
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    });
});

// delete subject
$(document).ready(function () {
    $('.delete-subject').click(function (event) {
        event.preventDefault();

        confirmDialog = confirm("Are you sure to delete this subject?");

        if (confirmDialog) {
            var subjectID = $(this).val();

            $.ajax({
                type: "GET",
                url: "subject/delete/" + subjectID,
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    });
});

// delete exam mark
$(document).ready(function () {
    $('.delete-exam-mark').click(function (event) {
        event.preventDefault();

        confirmDialog = confirm("Are you sure to delete this exam mark?");

        if (confirmDialog) {
            var examMarkID = $(this).val();

            $.ajax({
                type: "GET",
                url: "exammark/delete/" + examMarkID,
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    });
});