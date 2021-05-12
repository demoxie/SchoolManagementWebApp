<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STUDENT PROFILE LIST</title>
    <link rel="icon" href="../../../Backend/Src/Icons/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="../../Pluggins/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../Pluggins/awesome/css/all.min.css">
    <link rel="stylesheet" href="../../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Stylesheets/confirm_delete_modal.css">
    <link rel="stylesheet" href="../../Stylesheets/profile_card.css">
    <link rel="stylesheet" href="../../Stylesheets/print.css">
    <script src="../../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../../Scripts/fetch_class.js"></script>
    <script src="../../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <script src="../../Pluggins/Jquery/popper.min.js"></script>
    <script src="../../Scripts/student_profile_list_crud.js"></script>

    <style>
        * {
            box-sizing: border-box;
        }


        .table-responsive {
            margin: 30px 0;
            height: 100vh;
        }

        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            font-size: 15px;
            padding-bottom: 10px;
            margin: 10px auto;
            min-height: 45px;
        }

        .table-title h2 {
            margin: auto 0;
            font-size: 24px;
        }

        .table-title select {
            border-color: #ddd;
            border-width: 0 0 1px 0;
            padding: 3px 10px 3px 5px;
            margin: auto 5px;
        }

        .table-title .show-entries {
            margin: auto 0;
        }

        .top_container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-flow: row nowrap;
        }

        .search-box {
            float: right;
        }

        .search-box .input-group {
            min-width: 200px;
            right: 0;
        }

        .search-box .input-group-addon, .search-box input {
            border-color: #ddd;
            border-radius: 0;
        }

        .search-box .input-group-addon {
            border: none;
            background: transparent;
            z-index: 9;
        }

        .search-box input {
            height: 34px;
            padding-left: 28px;
            box-shadow: none !important;
            border-width: 0 0 1px 0;
        }

        .search-box input:focus {
            border-color: #3FBAE4;
        }

        .search-box i {
            color: #a0a5b1;
            font-size: 19px;
            position: relative;
            top: 2px;
            left: -10px;
        }

        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child {
            width: 130px;
        }

        table.table td a {
            color: #a0a5b1;
            display: inline-block;
            margin-inline: 8px;
        }

        table.table td a.view {
            color: #03A9F4;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #E34724;
        }

        table.table td i {
            font-size: 19px;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            padding: 0 10px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 30px !important;
            text-align: center;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }

        input:hover,
        select:focus,
        input:active,
        select:hover,
        input:focus,
        .close_down:focus,
        .close:focus,
        .close_down:hover,
        .btn:hover {
            outline: 0 !important;
            -webkit-appearance: none;
            box-shadow: none !important;
        }

        .close {
            border: none;
            font-size: 20px;
            background: none;
            color: black;
            font-weight: bold;
        }

        .modal-header {
            display: flex;
            justify-content: flex-end;
            padding-block: 0;
            border-bottom: none;
        }

        .close::after {
            clear: right;
            content: '';
        }

        .close_down {
            background: #bcd0c7;
            color: black;
            border-radius: 15px;
            padding: 20px 25px;
            padding-block: 0;
            border: 1px solid darkred;
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
            font-weight: bold;
        }

        .choice_container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 25vw;
            margin: 30px auto;
        }

        .myclass {
            border: 1px solid;
            border-radius: 0;
            background: darkgreen;
            color: white;
            padding-block: 10px;
        }

        option:first-child {
            font-weight: bold !important;
            text-transform: uppercase;
            text-indent: 49%;
        }

        .school_name {
            text-align: center;
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
            font-weight: bold;
            color: darkorange;
            text-shadow: -2px 0 darkgreen, 0 2px darkgreen, 2px 0 darkgreen, 0 -2px darkgreen;
        }

        .header_block {
            padding-block: 0;
            background: #c0c6c4;
        }

        .header_text {
            color: black;
            font-weight: bold;
            margin-top: 2px;
            text-align: center;
            text-transform: uppercase;

        }
    </style>

</head>
<body>
<h1 class="school_name">AG MODERN NUR/PRI/SEC SCHOOL ASHAKACEM</h1>
<div class="container" style="padding-top: 10px;border-radius: 10px;border: 2px dashed darkred;margin-top: 40px;">
    <div class="choice_container">

        <select class="selectpicker form-control myclass" name="class" id="class">
            <option selected disabled>-- SELECT CLASS --</option>
        </select>

    </div>

        <div class="table-wrapper">

            <div class="table-title">
                <div class="top_container">
                    <div class="col-xs-4 myinput_container">
                        <div class="show-entries">
                            <span>Show</span>
                            <select>
                                <option>5</option>
                                <option>10</option>
                                <option>15</option>
                                <option>20</option>
                            </select>
                            <span>entries</span>
                        </div>
                    </div>
                    <div class="col-xs-4 myinput_container">
                        <h2 class="text-center">Student Profile</h2>
                    </div>
                    <div class="col-xs-4 myinput_container">
                        <div class="search-box">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-search fa-xs"></i></span>
                                <input type="text" class="form-control" id="search" placeholder="Search&hellip;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
            <table class="table table-bordered" id="stud_list_table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name <i class="fa fa-sort"></i></th>
                    <th>Admission number<i class="fa fa-sort"></th>
                    <th>Gender <i class="fa fa-sort"></i></th>
                    <th>Class<i class="fa fa-sort"></th>
                    <th>Status <i class="fa fa-sort"></i></th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            </div>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>


<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" style="height: 25px;padding-top: 0;margin-top: 0">
                <input type="button" class="close" id="upper_profile_close_btn" value="&times;">
            </div>
            <!-- Modal body -->
            <div class="modal-body" id="modal-body" style="padding-inline: 0;padding-top: 0;margin-top: 0">
                <div class="container-fluid card" id="card" style="border: none;padding-top: 0">
                    <div id="passport_container"
                         style="margin: 0 auto;display: flex;justify-content: center;align-items: center"></div>

                    <div class="information" style="margin-top: 10px">
                        <div class="row col-11 header_block"><h5 class="header_text">Personal Details</h5></div>
                        <div class="row col-11">
                            <div class="block col-sm-12 col-md-4 col-lg-4">
                                <h5 class="block-content">Name</h5>
                            </div>
                            <div class="data col-sm-12 col-md-8 col-lg-8">
                                <input type="text" class="data-details col-12" name="stud_name" id="stud_name"
                                       value="James Wakirwa" readonly="readonly">
                            </div>
                        </div>
                        <div class="row col-11">
                            <div class="block col-sm-12 col-md-4 col-lg-4">
                                <h5 class="block-content">Gender</h5>
                            </div>
                            <div class="data col-sm-12 col-md-8 col-lg-8">
                                <input type="text" class="data-details col-12" name="gender" id="gender" value="Male"
                                       readonly="readonly">
                            </div>
                        </div>
                        <div class="row col-11">
                            <div class="block col-sm-12 col-md-4 col-lg-4">
                                <h5 class="block-content">Date of Birth</h5>
                            </div>
                            <div class="data col-sm-12 col-md-8 col-lg-8">
                                <input type="date" class="data-details col-12" name="dob" id="dob" value=""
                                       readonly="readonly">
                            </div>
                        </div>
                        <div class="row col-11">
                            <div class="block col-sm-12 col-md-4 col-lg-4">
                                <h5 class="block-content">Address</h5>
                            </div>
                            <div class="data col-sm-12 col-md-8 col-lg-8">
                                <input type="text" class="data-details col-12" name="address" id="address"
                                       value="Ungwan Alheri AshakaCem, Funakaye LGA, Gombe State" readonly="readonly">
                            </div>
                        </div>
                        <div class="row col-11">
                            <div class="block col-sm-12 col-md-4 col-lg-4">
                                <h5 class="block-content">Year Admitted</h5>
                            </div>
                            <div class="data col-sm-12 col-md-8 col-lg-8">
                                <input type="text" class="data-details col-12" name="year_admitted" id="year_admitted"
                                       value="15th April, 2000" readonly="readonly">
                            </div>
                        </div>
                        <div class="row col-11">
                            <div class="block col-sm-12 col-md-4 col-lg-4">
                                <h5 class="block-content">Admission NO</h5>
                            </div>
                            <div class="data col-sm-12 col-md-8 col-lg-8">
                                <input type="text" class="data-details col-12" name="admission_no" id="admission_no"
                                       value="AG-STA-3849583" readonly="readonly">
                            </div>
                        </div>

                        <div class="row col-11">
                            <div class="block col-sm-12 col-md-4 col-lg-4">
                                <h5 class="block-content">Class</h5>
                            </div>
                            <div class="data col-sm-12 col-md-8 col-lg-8">
                                <input type="text" class="data-details col-12" name="class" id="stud_class"
                                       value="Primary 4" readonly="readonly">
                            </div>
                        </div>
                        <div class="row col-11">
                            <div class="block col-sm-12 col-md-4 col-lg-4">
                                <h5 class="block-content">Religion</h5>
                            </div>
                            <div class="data col-sm-12 col-md-8 col-lg-8">
                                <input type="text" class="data-details col-12" name="religion" id="religion"
                                       value="Primary 4" readonly="readonly">
                            </div>
                        </div>

                        <div class="row col-11">
                            <div class="block col-sm-12 col-md-4 col-lg-4">
                                <h5 class="block-content">State Of Origin</h5>
                            </div>
                            <div class="data col-sm-12 col-md-8 col-lg-8">
                                <input type="text" class="data-details col-12" name="state_of_origin"
                                       id="state_of_origin" value="Primary 4" readonly="readonly">
                            </div>
                        </div>
                        <div class="row col-11">
                            <div class="block col-sm-12 col-md-4 col-lg-4">
                                <h5 class="block-content">Lga Of Origin</h5>
                            </div>
                            <div class="data col-sm-12 col-md-8 col-lg-8">
                                <input type="text" class="data-details col-12" name="lga" id="lga" value="Primary 4"
                                       readonly="readonly">
                            </div>
                        </div>
                        <div class="row col-11 header_block"><h5 class="header_text"
                                                                 style="text-align: center;text-transform: uppercase">
                                Parent's Details</h5></div>
                        <div class="row col-11">
                            <div class="block col-sm-12 col-md-4 col-lg-4">
                                <h5 class="block-content">Parent's Name</h5>
                            </div>
                            <div class="data col-sm-12 col-md-8 col-lg-8">
                                <input type="text" class="data-details col-12" name="p_name" id="p_name"
                                       value="Primary 4" readonly="readonly">
                            </div>
                        </div>
                        <div class="row col-11">
                            <div class="block col-sm-12 col-md-4 col-lg-4">
                                <h5 class="block-content">Parent's Phone</h5>
                            </div>
                            <div class="data col-sm-12 col-md-8 col-lg-8">
                                <input type="text" class="data-details col-12" name="p_phone" id="p_phone"
                                       value="Primary 4" readonly="readonly">
                            </div>
                        </div>
                        <div class="row col-11">
                            <div class="block col-sm-12 col-md-4 col-lg-4">
                                <h5 class="block-content">Parent's Email</h5>
                            </div>
                            <div class="data col-sm-12 col-md-8 col-lg-8">
                                <input type="text" class="data-details col-12" name="p_email" id="p_email"
                                       value="Primary 4" readonly="readonly">
                                <input type="hidden" class="data-details col-12" name="stud_id" id="stud_id" value="">
                            </div>
                        </div>

                    </div>

                    <div class="container-fluid bottom_buttons">
                        <a class="btn btn-danger btn-lg col" id="update_btn" data-student-id=""><i
                                    class="fas fa-edit"></i>&nbsp;&nbsp;Edit</a>&nbsp;&nbsp;
                        <a class="btn btn-danger btn-lg col" id="save_btn" data-student-id=""><i
                                    class="fas fa-save"></i>&nbsp;&nbsp;Save</a>&nbsp;&nbsp;
                        <a class="btn btn-danger btn-lg col" id="print_btn" data-student-id=""><i
                                    class="fas fa-print"></i>&nbsp;&nbsp;Print</a>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer" style="border-top: none">
                <button type="button" class="btn btn-info close_down" id="cancel_profile_view" data-dismiss="modal">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>




<!-- Modal HTML -->
<div id="comfirmDeleteModal" class="modal fade">
    <div class="modal-dialog modal-confirm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <div class="icon-box" style="margin: auto">
                    <i class="fas fa-close fa-lg" style="text-align: center;line-height: 45px;"></i>
                </div>
                <h4 class="modal-title w-100">Are you sure?</h4>
                <button type="button" class="close" id="close_confirm" data-dismiss="modal" aria-hidden="true">&times;
                </button>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete these records? This process cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" id="cancel_btn" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="delete_btn">Delete</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>