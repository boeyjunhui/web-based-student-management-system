<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="{{asset('css/styles.css')}}" type="text/css" rel="stylesheet">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        
        <title>Student Management System</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dar px-4 header">
            <a class="navbar-brand" href="/student">SMS</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="/student">Student</a>
                    <a class="nav-item nav-link" href="/course">Course</a>
                    <a class="nav-item nav-link" href="/subject">Subject</a>
                    <a class="nav-item nav-link" href="/exammark">Exam Mark</a>
                </div>
            </div>
            
            {{-- <a class="nav-item nav-link text-muted float-end" href="">Logout</a> --}}
          </nav>