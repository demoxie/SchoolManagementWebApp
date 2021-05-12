<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css">
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../Scripts/session.js"></script>
    <script src="../Pluggins/Jquery/popper.min.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        form {
            margin: 5% auto;

        }

        table,
        thead,
        tfoot,
        th,
        tr,
        td {
            text-align: center;
        }

        h2 {
            text-align: center;
        }


        h4 {
            text-align: center;
        }

        label {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <form class="form-inline col-10" id="session-form" method="post" enctype="multipart/form-data" role="form">
        <div class="row" style="margin-bottom: 30px">
            <div class="col">
                <label for="session" class="mr-sm-1">Session</label>
                <input type="text" class="form-control" id="session" placeholder="E.g 2019/2020..." name="session">
            </div>
            <div class="col">
                <label for="commencementdate" class="mr-sm-1">Commencement Date</label>
                <input type="date" id="commencementdate" class="form-control" name="commencementdate">
            </div>
            <div class="col">
                <label for="endingdate" class="mr-sm-1">Ending Date</label>
                <input type="date" id="endingdate" class="form-control" name="endingdate">
            </div>
            <div class="col"><br>
                <button type="submit" class="btn btn-primary col-12" name="addSession">Add Session</button>
            </div>
        </div>
        <div class="row col">
            <div class="one col-3">
                <input type="text" id="search" class="form-control" placeholder="search" name="search">
            </div>
            <div class="two col-3">
                <ul class="pagination pagination-md justify-content-end">
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
                    <th>S/N</th>
                    <th>Session</th>
                    <th>Term</th>
                    <th>Commencement Date</th>
                    <th>Ending Date</th>
                    <th></th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2019/2020</td>
                    <td>First Term</td>
                    <td>2019</td>
                    <td>2020</td>
                    <td>
                        <button type="button" class="btn btn-primary col-12" name="edit">Edit</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary col-12" name="delete">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2019/2020</td>
                    <td>First Term</td>
                    <td>2019</td>
                    <td>2020</td>
                    <td>
                        <button type="button" class="btn btn-primary col-12" name="edit">Edit</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary col-12" name="delete">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>2019/2020</td>
                    <td>First Term</td>
                    <td>2019</td>
                    <td>2020</td>
                    <td>
                        <button type="button" class="btn btn-primary col-12" name="edit">Edit</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary col-12" name="delete">Delete</button>
                    </td>
                </tr>
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

<!-- Mirrored from www.w3schools.com/bootstrap4/tryit.asp?filename=trybs_form_inline&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Sep 2020 08:11:15 GMT -->

</html>