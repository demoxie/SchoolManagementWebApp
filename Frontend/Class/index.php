<!DOCTYPE html>
<html lang="en">

<head>
    <title>Class Entry Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="../../Backend/Src/Icons/rfc-logo.jpg" />
    <link rel="stylesheet" href="../Pluggins/awesome/css/all.min.css">
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../Pluggins/awesome/js/all.min.js"></script>
    <script src="../Scripts/add_class.js"></script>
    <script src="../Scripts/fetch_departments.js"></script>
   <!-- <script src="../Scripts/search_teachers.js"></script>-->
    <script src="../Scripts/search_class_rep.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>

    <style>
        * {
            box-sizing: border-box;
            
        }

        form {
            margin: 5% auto;

        }
        body{
            font-size: calc(0.5%-10px);
        }
        th{
            
        }

        table,
        th,
        tr,
        td {
            text-align: center;
            vertical-align: middle;
            font-size: 0.8rem;
        }

        .className {
            float: left;
            text-align: left;
            margin-left: 0;
        }

        .formaster {
            float: none;
            text-align: center;
            margin: auto;
        }

        .form-control:hover,
        .form-control:active,
        .form-control:focus,
        .form-select:hover,
        .form-select:active,
        .form-select:focus,
        .btn:hover,
        .btn:active,
        .btn:focus {
            outline: none !important;
            appearance: none !important;
            box-shadow: none !important;

        }
        .btn:active,
        .btn:focus,
        .form-select:hover,
        .form-select:active {
            border: 1px solid darkgreen;
        }


        #input_container {
            display: grid;
            grid-template-columns: auto auto auto;
            grid-row-gap: 1em;
            margin: auto;
        }
        .add_btn_container{
            grid-column: 2 / span 1;
        }
        .promote{
            background-color: darkgreen;
        }
        .demote{
            background-color: orangered;
        }

        @media screen and (max-width:720px) and (min-width: 577px) {
            #input_container {
                display: grid;
                grid-template-columns: auto auto;
            }
            .add_btn_container{
                grid-column: 1 / span 2;
            }
        }

            @media screen and (max-width:576px) {
                #input_container {
                    display: grid;
                    grid-template-columns: auto;
                }
                .add_btn_container{
                    grid-column: 1 / span 1;
                }

                .search_result_container {
                    display: flex;
                    flex-flow: column wrap;
                    position: absolute;
                    z-index: 999;
                    margin-bottom: 0;
                    background-color: lightgray;
                    overflow: auto;
                    height: 100px;
                    border: 1px solid #ccc;

                }

                .search_result_item {
                    padding: 10px 10px;
                    border: 1px solid black;
                    color: black;
                }

                .search_result_item:hover {
                    background-color: limegreen;
                    color: white;
                    cursor: pointer;
                }
            }
    </style>
</head>

<body>
    <form id="add_class_form" class="form-inline col-10" method="post" role="form" enctype="multipart/form-data">

        <div class="row" id="input_container">
            <div class="col">
                <input type="text" class="form-control col-12" id="class_name" placeholder="class name e.g Nursery 1" name="class_name" required>
            </div>
            <div class="col">
                <select class="form-select col-12" id="class_arm" name="class_arm" required>
                    <option selected disabled>CLASS ARM</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                </select>

            </div>
            <div class="col">
                <select class="form-select col-12" id="department" name="department" required>
                    <option selected disabled>DEPARTMENT</option>
                </select>

            </div>
            <div class="col">
                <input type="text" class="form-control col-12" id="class_title" placeholder="class title e.g the golds" name="class_title">
            </div>
            <div class="col">
                <input type="text" class="form-control col-12" id="population" placeholder="population e.g 20" name="population">
            </div>
            <div class="col" id="class_rep_container">
                 <input type="hidden" id="student-id" name="student-id">
                <input type="text" class="form-control col-12" id="class_rep" placeholder="class rep name" name="class_rep">
                <div class="class_rep_search_result col-12"></div>
            </div>

            <div class="col add_btn_container">
                <button type="button" class="btn col-12" id="add_class">Add Class</button>
            </div>
        </div>
        <hr>

        <div class="theading row col-12">
            <div class="className col-3"><input type="text" class="form-control" id="search" name="search" placeholder="Search by department or hod">
            </div>
        </div>
        <div class="col">
            <ul class="pagination pagination-md justify-content-end">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </div>

        <div class="table-responsive-sm">
            <table class="table table-hover table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>CLASS NAME</th>
                        <th>CLASS ARM</th>
                        <th>DEPARMENT</th>
                        <th>CLASS TITLE</th>
                        <th>POPULATION</th>
                        <th>CLASS REP</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Nursery 1</td>
                        <td>A</td>
                        <td>General</td>
                        <td>Peace House</td>
                        <td>20</td>
                        <td>Aaron Jeremiah</td>
                        <td><a class="btn edit"><i class="edit-icon fas fa-edit"></i></a></td>
                        <td><a class="btn delete"><i class=" delete-icon fas fa-trash-alt"></i></a></td>
                    </tr>

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

</html>