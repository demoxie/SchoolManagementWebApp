<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css">
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.jsjquery.min.js"></script>
    <script src="../Pluggins/Jquery/popper.min.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        form {
            margin: 2% auto;

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

        img {
            width: 150px;
            height: 150px;
            object-fit: contain;
            margin-left: 0;
            margin-top: 0;
        }
    </style>
</head>

<body>
<form class="form-inline col-10">

    <div class="table-responsive-sm">
        <table class="table table-hover table-bordered">
            <thead class="thead-light">
            <tr>
                <div class="theading row col-12">
                    <div class="col-3"><img src="../../Backend/Src/Icons/logo.png"></div>

                    <div class="col-8">
                        <h1>AG MODERN NUR/PRI/SEC SCHOOL</h1>
                        <h4 style="text-decoration: underline">RESULT CHECKER</h4>
                    </div>

                </div>
            </tr>
            <tr>


                <br><br>

                <div class="row">
                    <div class="col">
                        <select class="form-control col">
                            <option selected>Session</option>
                            <option value="science">Science</option>
                            <option value="art">Art</option>
                            <option value="commercial">Commercial</option>
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-control col">
                            <option selected>Term</option>
                            <option value="science">Science</option>
                            <option value="art">Art</option>
                            <option value="commercial">Commercial</option>
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-control col">
                            <option selected>Department</option>
                            <option value="science">Science</option>
                            <option value="art">Art</option>
                            <option value="commercial">Commercial</option>
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-control col">
                            <option selected>Class</option>
                            <option value="science">Science</option>
                            <option value="art">Art</option>
                            <option value="commercial">Commercial</option>
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary" name="addsubject col">Fetch Result</button>
                    </div>
                </div>
                <hr>
            </tr>
            <div class="theading row col-12">
                <div class="className col-3"><input type="text" class="form-control" id="search" name="search"
                                                    placeholder="Search by admissionNO, Names, or session">
                </div>

                <div class="date col">
                    <ul class="pagination pagination-md justify-content-end">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </div>
            </div>
            <tr>
                <th>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    </div>
                </th>
                <th>S/N</th>
                <th>CLASS NAME</th>
                <th>DEPARTMENT</th>
                <th>FORM MASTER</th>
                <th></th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    </div>
                </td>
                <td>1</td>
                <td>Primary 5</td>
                <td>Science</td>
                <td>Emmanuel Buba</td>
                <td>
                    <a class="btn btn-primary save col"><i class="fas fa-eye"></i>View</a>
                </td>
                <td>
                    <a class="btn btn-primary save col"><i class="fas fa-eye"></i>Print</a>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    </div>
                </td>
                <td>1</td>
                <td>Primary 5</td>
                <td>Science</td>
                <td>Emmanuel Buba</td>
                <td>
                    <a class="btn btn-primary save col"><i class="fas fa-eye"></i>View</a>
                </td>
                <td>
                    <a class="btn btn-primary save col"><i class="fas fa-eye"></i>Print</a>
                </td>
            </tr>

            </tbody>
            <tfoot class="">

            </tfoot>
        </table>
        <ul class="pagination pagination-md justify-content-end">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </div>
    <hr>

</form>

</body>

<!-- Mirrored from www.w3schools.com/bootstrap4/tryit.asp?filename=trybs_form_inline&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Sep 2020 08:11:15 GMT -->

</html>