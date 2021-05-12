<!DOCTYPE html>
<html lang="en">
<head>
    <title>School Calendar Entry</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Pluggins/awesome/css/all.min.css">
    <link rel="icon" href="../../Backend/Src/Icons/rfc-logo.jpg">
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../Scripts/fetch_session.js"></script>
    <script src="../Scripts/add_calendar.js"></script>
    <script src="../Pluggins/awesome/js/all.min.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }
        body{
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        form {
            margin: 5% auto;

        }

        table,th, td {
            text-align: center;
        }

        label {
            font-weight: bold;
        }
        .form-control:hover,
        .form-control:active,
        .form-control:focus,
        .form-select:hover,
        .form-select:active,
        .form-select:focus{
            outline: none;
            appearance: none;
            box-shadow: none;
            border: 1px solid darkgreen;
        }
        .btn{
            background: darkgreen;
            color: white;
            border: none;
        }
        .btn:hover{
            background: limegreen;
            color: white;
        }
        .edit{
            background: darkorange;
            color: white;
        }
        .edit:hover{
            background: orange;
            color: white;
        }
        .delete{
            background: firebrick;
            color: white;
        }
        .delete:hover{
            background: red;
            color: white;
        }
        .control_container{
            display: grid;
            grid-template-columns: auto auto;
            grid-column-gap: 1em;
            grid-row-gap: 1em;
            margin-bottom: 7%;
            border: 4px double #0b2e13;
            border-right-color: orange;
            border-left-color: firebrick;
            border-bottom-color: green;
            padding: 1em;


        }

    </style>
</head>
<body>
<form class="form-inline col-10" method="post" id="calendar_entry_form">
    <div class="control_container" >
        <div class="col">
            <label for="term" class="mr-sm-1">Session</label>
            <select name="session" id="session" class="form-select session">
                <option selected disabled>SESSION</option>

            </select>
        </div>
        <div class="col">
            <label for="term" class="mr-sm-1">Term</label>
            <select id="term" name="term" class="form-select term">
                <option selected disabled>TERM</option>
                <option value="1">First Term</option>
                <option value="2">Second Term</option>
                <option value="3">Third Term</option>
            </select>
        </div>
        <div class="col"><label for="commencement_date" class="mr-sm-1">Commencement Date</label>
            <input type="datetime-local" id="commencement_date" class="form-control commencement_date" name="commencement_date">
        </div>
        <div class="col">
            <label for="closing_date" class="mr-sm-1">Closing Date</label>
            <input type="datetime-local" id="closing_date" class="form-control closing_date" name="closing_date">
        </div>
        <div class="col">
            <label for="next_term_begins" class="mr-sm-1">next_term_begins</label>
            <input type="datetime-local" id="next_term_begins" class="form-control next_term_begins" name="next_term_begins">
        </div>
        <div class="col"><br>
            <button type="button" class="btn col-12" id="add_calendar">Add Calendar</button>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <input type="text" id="search" class="form-control" placeholder="search" name="search">
        </div>
        <div class="col-3" style="float: right; margin-right: 0;">
            <ul class="pagination pagination-md">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </div>

    </div>

    <table class="table table-hover table-bordered">
        <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>SESSION</th>
            <th>TERM</th>
            <th>COMMENCEMENT DATE</th>
            <th>CLOSING DATE</th>
            <th>NEXT TERM BEGINS</th>
            <th></th>
            <th></th>

        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <ul class="pagination pagination-md">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
</form>

</body>
</html>
