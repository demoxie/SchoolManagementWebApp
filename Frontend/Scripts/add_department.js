$(document).ready(function () {
    $('#add_department').click(function () {

        if ($("#departmentname").val() !== '' && $("#hod").val() !== '') {
            $('#addDepartment').trigger('submit');
        } else {
            alert('enter the required fileds');
        }

    });

    $("#addDepartment").on("submit", function (e) {
        e.preventDefault();
        //alert("hey");
        $.ajax({
            url: "../../Backend/ClassLibrary/forwardToSchool.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
//alert(data);
                let depart_data = JSON.parse(data);
                //alert(depart_data[0].departmentName);
                let i;
                for (i in depart_data) {
                    const index = Number(i) + 1;
                    $("tbody").append(`<tr><td>${index}</td><td>${depart_data[i].departmentName}</td>
                          <td>${depart_data[i].HOD_ID}</td><td>${depart_data[i].dateAdded}</td>
                          <td><a class="btn btn-primary save col">Edit</a></td>
                <td><a class="btn btn-primary save col">Delete</a></td></tr>`);
                }
            },
            error: function (data) {
                //alert(data);
            }
        });
    });
});