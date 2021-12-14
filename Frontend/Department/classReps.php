<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Stylesheets/top-nav-bar.css">
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css">
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../Pluggins/Jquery/popper.min.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        form {
            margin: 10% auto;

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
        }
        img{
            width: 150px;
            height: 150px;
            object-fit: contain;
            margin-left: 0;
            margin-top: 0;
        }


    </style>
</head>
<body>
<!--Top Nav-bar-->
<div id="top-nav-bar">
    <div id="nav-item-container">
        <a class="btn nav-btn"><i class="fas fa-home"></i>&nbsp;&nbsp;&nbsp;&nbsp;Home</a>
        <a class="btn nav-btn"><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</a>
    </div>
    <div id="user">
        <a class="btn nav-btn"><i class="fas fa-user-circle"></i>&nbsp;&nbsp;&nbsp;logout</a>
    </div>

</div>
<!--Ends here-->
<form class="form-inline col-10">
    <button type="submit" class="btn btn-primary save col">Save</button>
    <button type="submit" class="btn btn-primary save col">View Weekly Attendance</button>
    <br><br>
    <hr>
    <div class="table-responsive-sm">
        <table class="table table-hover table-bordered">
            <thead class="thead-light">

            <tr>


                <br><br>

                <div class="above_table_row row col-12">
                    <div class="className col"><h6><strong>CLASS:</strong> Primary Four A</h6></div>
                    <div class="formaster col"><h6><strong>FORM MASTER:</strong> Mr. Samson Madaki</h6></div>
                    <div class="date col"><h6><strong>DATE:</strong> 16th April, 2021</h6></div>
                </div>
            </tr>
            <tr>
                <th>S/N</th>
                <th>ADMISSION NO</th>
                <th>NAMES</th>
                <th>MORNING</th>
                <th>AFTERNOON</th>
                <th>REASON BEING ABSENT</th>
                <th>TOTAL</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>1</td>
                <td>AG/NUR/20-21/0983761</td>
                <td>Musa Joseph</td>
                <td>
                    <div class="form-check-inline">
                        <input type="checkbox" class="form-check-input" id="check2" name="vehicle2" value="something">
                    </div>
                </td>
                <td>
                    <div class="form-check-inline">

                        <input type="checkbox" class="form-check-input" id="check2" name="vehicle2" value="something">

                    </div>
                </td>
                <td>
                    Sick
                </td>
                <td>1</td>
            </tr>
            <tr>
                <td>1</td>
                <td>AG/NUR/20-21/0983761</td>
                <td>Musa Joseph</td>
                <td>
                    <div class="form-check-inline">
                        <input type="checkbox" class="form-check-input" id="check2" name="vehicle2" value="something">
                    </div>
                </td>
                <td>
                    <div class="form-check-inline">

                        <input type="checkbox" class="form-check-input" id="check2" name="vehicle2" value="something">

                    </div>
                </td>
                <td>
                    Sick
                </td>
                <td>1</td>
            </tr>

            </tbody>
            <tfoot class="">

            </tfoot>
        </table>
    </div>
    <hr>
    <button type="submit" class="btn btn-primary save col">Save</button>
    <button type="submit" class="btn btn-primary save col">View Weekly Attendance</button>

</form>

</body>

<!-- Mirrored from www.w3schools.com/bootstrap4/tryit.asp?filename=trybs_form_inline&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Sep 2020 08:11:15 GMT -->
</html>
