<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css">
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../Scripts/add_department.js"></script>
    <script src="../Pluggins/Jquery/popper.min.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>

    <style>
        *{
            box-sizing: border-box;
        }
        form {
            margin: 5% auto;

        }

        table, thead, tfoot, th, tr, td {
            text-align: center;
        }

        h2 {
            text-align: center;
        }

        .date{
            float: right;
            text-align: right;
            margin-right: 0;
        }
        .className{
            float: left;
            text-align: left;
            margin-left: 0;
        }
        .formaster{
            float: none;
            text-align: center;
            margin: auto;
        }

        h4{
            text-align: center;
        }
        .week{
            float: right;
            text-align: right;
            border-radius: 5px;
            border: 1px solid darkred;
            padding: 2px 15px;
            background-color: red;
            color: whitesmoke;
            margin-top: auto;
            margin-bottom: auto;
        }
        img{
            width: 150px;
            height: 150px;
            object-fit: contain;
            margin-left: 0;
            margin-top: 0;
        }
        .form-control:hover,
        .form-control:active,
        .form-control:focus,
        .btn:hover,
        .btn:active,
        .btn:focus{
            outline: none !important;
            appearance: none !important;
            box-shadow: none !important;
            
        }
        .btn{
            background: darkgreen;
            color: white;
        }
        .btn:hover{
            color:white;
            background: limegreen;
        }


    </style>
</head>
<body>
<form id="addDepartment" class="form-inline col-10" method="post" role="form" enctype="multipart/form-data">

    <div class="table-responsive-sm">
        <table class="table table-hover table-bordered">
            <thead class="thead-light">
            <tr>
                <div class="theading row col-12">
                    <div class="col-3"><img src="../../Backend/Src/Icons/logo.png"></div>

                    <div class="col-8">
                        <h1>AG MODERN NUR/PRI/SEC SCHOOL</h1>

                    </div>

                </div>
            </tr>
            <tr>
               
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" id="departmentname" placeholder="Department name" name="department_name" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="hod" placeholder="HOD's name" name="department_hod" required>
                    </div>
                    <div class="col">
                        <button type="button" class="btn " id="add_department" name="add_department col">Add Department</button>
                    </div>
                </div>
                <hr>
            </tr>
            <div class="theading row col-12">
                <div class="className col-3"><input type="text" class="form-control" id="search" name="search" placeholder="Search by department or hod">
                </div>

                <div class="date col"><ul class="pagination pagination-md justify-content-end">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul></div>
            </div>
            <tr>
                <th>S/N</th>
                <th>Department name</th>
                <th>HOD</th>
                <th>Date Added</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot></tfoot>
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
