<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
    <link rel="stylesheet" href="../../Pluggins/Bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../../Pluggins/Bootstrap/css/bootstrap-theme.min.css" >
    <link rel="stylesheet" href="../../Pluggins/Table/css/dataTables.bootstrap.min.css" >
    <link rel="icon" type="image/png" href="../../../Backend/Src/Icons/webdamn.png" >
    <script src="../../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <title>CRUD Table</title>
    <script src="../../Pluggins/Table/js/jquery.dataTables.min.js"></script>
    <script src="../../Pluggins/Table/js/dataTables.bootstrap.min.js"></script>
    <script src="../../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <script src="../../Pluggins/Table/js/data.js"></script>

</head>
<body>


        <div class="container contact">
            <h2>Example: Datatables Add Edit Delete with Ajax, PHP & MySQL</h2>
            <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="panel-title"></h3>
                        </div>
                        <div class="col-md-2" align="right">
                            <button type="button" name="add" id="addEmployee" class="btn btn-success btn-xs">Add Employee</button>
                        </div>
                    </div>
                </div>
                <table id="employeeList" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Skills</th>
                            <th>Address</th>
                            <th>Designation</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div id="employeeModal" class="modal fade">
                <div class="modal-dialog">
                    <form method="post" id="employeeForm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><i class="fa fa-plus"></i> Edit User</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group"> <label for="empName" class="control label">Name</label>
                                    <input type="text" class="form-control" id="empName" name="empName" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="empAge" class="control-label">Age</label>
                                    <input type="number" class="form-control" id="empAge" name="empAge" placeholder="Age">
                                </div>
                                <div class="form-group">
                                    <label for="empSkills" class="control-label">Skills</label>
                                    <input type="text" class="form-control" id="empSkills" name="empSkills" placeholder="Skills" required>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="control-label">Address</label>
                                    <textarea class="form-control" rows="5" id="address" name="address"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="designation" class="control-label">Designation</label>
                                    <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="empId" id="empId" />
                                <input type="hidden" name="action" id="action" value="" />
                                <input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="alert alert-info">
                <strong>tutorial !</strong> <a href="http://www.codingcage.com/">Coding Cage</a>!
            </div>
        </div>

</body>
</html>