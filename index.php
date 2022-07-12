<?php include('functions.php'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atom Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4380f7e432.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
<form id="form-new">
    <div class="container-fluid">

        <header class="row">

            <div class="col-sm-6">
                <a href="#">Enter Restore Mode</a>
            </div>

            <div class="col-sm-6 text-end">
                Total Time:<span id="tally"></span>
            </div>
        </header>
        <form id="form-new">
            <div class="row">
                <div class="col-10">
                    <input type="text" name="name" id="name" style="width: 100%" placeholder="Enter new task name...">
                </div>

                <div class="col-2 d-grid">
                    <button type="submit" id="submit_button" class="btn btn-success"><?= set_icon('play');?></button>
                </div>
            </div>
        </form>
        <hr>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Task</th>
                <th>Start</th>
                <th>End</th>
                <th>Time</th>
                <th colspan="2">Controls</th>
            </tr>
            </thead>
            <tbody id="log"></tbody>
        </table>
    </div>

    <!-- SCRIPT ################################################################-->
    <script src="atom.tracker.js"></script>
</body>
</html>