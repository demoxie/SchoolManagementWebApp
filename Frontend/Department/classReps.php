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
        *{
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
<form class="form-inline col-10">
    <button type="submit" class="btn btn-primary save col">Save</button>
    <button type="submit" class="btn btn-primary save col">View Weekly Attendance</button><br><br>
    <hr>
    <div class="table-responsive-sm">
        <table class="table table-hover table-bordered">
            <thead class="thead-light">
            <tr>
                <div class="theading row col-12">
                    <div class="col-3"><img src="../../Backend/Src/Icons/logo.png"></div>

                    <div class="col-6">
                        <h2>AG MODERN NUR/PRI/SEC SCHOOL</h2>
                        <h4>First Term 2020/2021 Session</h4>
                    </div>
                    <div class="col-3"> <h5 class="week" style="text-align: center">Week 5</h5></div>
                </div>
            </tr>
            <tr>


                <br><br>

                <div class="theading row col-12">
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
