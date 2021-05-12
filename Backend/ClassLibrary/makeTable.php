<!DOCTYPE html>
<html lang="en">
<head>
    <title>Continous Assessment Score Sheet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../Frontend/Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="../../Backend/Src/Icons/logo.jpg">
    <script src="../../Frontend/Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../../Frontend/Pluggins/Jquery/popper.min.js"></script>
    <script src="../../Frontend/Pluggins/Bootstrap/js/bootstrap.min.js"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        form {
            margin: 1% auto;

        }

        table, thead, tfoot, th, tr, td {
            text-align: center;
            padding: 0;
            font-size-adjust: auto;
        }

        h2, h4 {
            text-align: center;
            font-size-adjust: auto;
        }

        .date {
            float: right;
            text-align: right;
            margin-right: 0;
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

        img {
            width: 150px;
            height: 150px;
            object-fit: contain;
            margin-left: 0;
            margin-top: 0;
        }

        .title {
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 100px;
        }

        tr td {
            vertical-align: middle;
            padding: 0;
            clear: both;
        }

        .form-check-inline {
            margin: 0 0 0 0;
        }

        input {
            text-align: center;
            font-size-adjust: auto;
            padding: 0;
        }

        .upper-save {


            margin-left: 10px;
            display: block;

        }

        .names, .total {
            border-style: none;
            font-size: 20px;
            font-size-adjust: auto;
        }

        .choice select {
            margin: auto 10px;
        }


    </style>
</head>
<body>
<form class="form-inline col-10" id="ca_entry_form" method="post" enctype="multipart/form-data" role="form">

    <div class="table-responsive-sm">
        <table class="table table-hover table-bordered">

            <tr>


                <div class="theading row col-12">
                    <div class="className col"><h6><strong>CLASS:</strong> Primary Four A</h6></div>
                    <div class="formaster col"><h6><strong>FORM MASTER:</strong> Mr. Samson Madaki</h6></div>
                    <div class="date col"><h6><strong>DATE: </strong></h6></div>
                </div>
                <hr>
            </tr>
            <div class="row">
                <button type="submit" class="btn btn-primary upper-save col-2">Save</button>
            </div>
            <hr>
            <div class="theading row col-12">
                <div class="className col-3"><input type="text" class="form-control" id="search" name="search"
                                                    placeholder="Search Names">
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
            <thead>
            <tr style="background-color: skyblue;">
                <th class="thed">S/N</th>
                <th class="th_names">NAMES</th>
                <th class="th_ca1">1st CA</th>
                <th class="th_ca2">2nd CA</th>
                <th class="th_ca3">3rd CA</th>
                <th class="th_total">Total</th>
            </tr>
            </thead>

            <tbody>

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
    <button type="submit" class="btn btn-primary save col-2">Save</button>


</form>
<script>
    $(document).ready(function () {
        alert("he");
        for (let i = 0; i < 5; i++) {
            $("tbody").append("<tr><td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr>");
        }
       
        $("tr").each(function () {
            
             $(this).children("td").first("td").each(function () {

                $(this).append('<input class="form-control" type="hidden">');

            });

            $(this).children("td").first("td").siblings("td").first("td").each(function () {

                $(this).append('<input class="form-control" type="hidden">');

            });
            $(this).children("td").first("td").siblings("td").first("td").next().each(function () {

                $(this).append('<input class="form-control" type="text">');

            });
            $(this).children("td").first("td").siblings("td").first("td").next().next().each(function () {

                $(this).append('<input class="form-control" type="text">');

            });
            $(this).children("td").first("td").siblings("td").first("td").next().next().next().each(function () {

                $(this).append('<input class="form-control" type="text">');

            });
            $(this).children("td").first("td").siblings("td").first("td").next().next().next().next().each(function () {

                $(this).append('<input class="form-control" type="text">');

            });
            
            
           
        });

        $("tr").each(function () {
            $(this).children("td").last().each(function () {
                $(this).children("input").attr("disabled","readonly");
            });
        });
         var firstCA_Array = [];
        var secondCA_Array = [];
        var thirdCA_Array = [];
        var total_Array = [];
        var sum_Array = [];
        $("button[type='submit']").click(function (e){
            //alert("he");
            e.preventDefault();
        $("tr").each(function () {
            $(this).children("td").first().siblings().first().next().each(function () {
                firstCA_Array.push(Number($.trim($(this).children("input").val())));
            });

            $(this).children("td").first().siblings().first().next().next().each(function () {
                secondCA_Array.push(Number($.trim($(this).children("input").val())));
            });

            $(this).children("td").first().siblings().first().next().next().next().each(function () {
                thirdCA_Array.push(Number($.trim($(this).children("input").val())));
            });

            $(this).children("td").first().siblings().first().next().next().next().next().each(function () {
                total_Array.push(Number($.trim($(this).children("input").val())));
            });

            var result = Sum(firstCA_Array,secondCA_Array,thirdCA_Array);
            for(let x in result){
            $(this).children("td").first().siblings().first().next().next().next().next().each(function () {

                    $(this).children("input").val(result[x]);

            });
            }
        });



    });


        function Sum(firstCA = [], secondCA = [], thirdCA = []) {

            for (const x in firstCA) {

                const sum = firstCA[x] + secondCA[x] + thirdCA[x];
                sum_Array.push(sum);

            }
            return sum_Array;
        }



        $.ajax({
            url: "../../Backend/ClassLibrary/ca_Sheet_forwardToAssessment.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                var ret = JSON.parse(data);
                var i;
                alert(ret);
                for (i in ret) {
                    var c = Number(i) + 1;
                    $("tbody").append(
                        '<tr><td>'+c +'</td><td><input type="text" class="names" disabled name="Name[]" value="'+ret[i].name + '"></td><td><div class="form-check-inline col"><input type="text" class="form-control ca'+i+'" name="CA['+ret[i].studentID+'][ca1]"></div></td>' + '<td><div class="form-check-inline col"><input type="text" class="form-control ca'+i+'" name="CA[' + ret[i].studentID +'][ca2]"></div></td><td><div class="form-check-inline col"><input type="text" class="form-control ca' +i +'" name="CA[' + ret[i].studentID + '][ca3]" ></div></td><td><div class="form-check-inline col"><input type="text" class="form-control total' + i +'" disabled name="Total[' + ret.studentID + ']" value="" placeholder="0.00"></div></td></tr>');

                    $("tr td div input.ca"+i+"").keyup(function() {
                        var ca = [];
                        $("tr td .ca" + i + "").each(function() {
                            ca.push($(this).val());
                        });
                        var sum = 0;
                        for (i = 0; i < ca.length; i++) {
                            sum = sum + Number(ca[i]);
                        }
                        $("tr td .total" + i + "").val(sum);
                    });
                }


            },
            error: function(data) {
                alert(data);
            }
        });



    });
</script>
</body>

<!-- Mirrored from www.w3schools.com/bootstrap4/tryit.asp?filename=trybs_form_inline&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Sep 2020 08:11:15 GMT -->
</html>
