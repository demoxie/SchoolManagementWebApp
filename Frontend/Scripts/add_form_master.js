$(document).ready(function () {
    'use strict';
    $('tbody').empty();
    let form_masterID;
    $.get("../../../Backend/ClassLibrary/fetch_all_form_masters.php", (data) => {
        const server_response = JSON.parse(data);
        for (let i in server_response) {
            //alert(server_response[i]['formMasterID']);
            $('tbody').append(`<tr>
                <td>${Number(i) + 1}</td>
                <td><input class="formaster-id" type="hidden" value="${server_response[i]['formMasterID']}">${server_response[i]['staffName']}</td>
                <td>${server_response[i]['class']}</td>
                <td><a class="btn edit" data-form-masterID="${server_response[i]['formMasterID']}"><i class="edit-icon fas fa-edit"></i></a></td>
                <td><a class="btn delete" data-form-masterID="${server_response[i]['formMasterID']}"><i class=" delete-icon fas fa-trash-alt"></i></a></td>
            </tr>`);


        }
        $('.delete').click(function (e) {
            e.preventDefault();
            form_masterID = $(this).parent().parent().find('input.formaster-id').val();
            let d = $(this);
            //alert(form_masterID);
            if (confirm('Are you sure you want delete this?')) {
                $.post('../../../Backend/ClassLibrary/forward_to_staffs_delete_formaster.php', {form_masterID: form_masterID}, function (res) {
                    alert(res);
                    d.closest('tr').remove();
                    reWriteTableSerialNumber();

                });
            }
        });

    });


    $("#add_formaster").click(function () {

        if ($('#class').val() === '' || $('#department').val() === '' || $('#form_master').val() === '') {
            alert('Please fill the required fields');

        } else {

            $(this).trigger('submit');
            $('#add_formmaster_form').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "../../../Backend/ClassLibrary/forward_to_add_formaster.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        const server_response = JSON.parse(data);
                        $('tbody').empty();
                        for (let i in server_response) {
                            $('tbody').append(`<tr>
                <td>${Number(1)}</td>
                <td><input class="formaster-id" type="hidden">${server_response[i]['staffName']}</td>
                <td>${server_response[i]['class']}</td>
                <td><a class="btn edit" data-form-masterID="${server_response[i]['formMasterID']}"><i class="edit-icon fas fa-edit"></i></a></td>
                <td><a class="btn delete" data-form-masterID="${server_response[i]['formMasterID']}"><i class=" delete-icon fas fa-trash-alt"></i></a></td>
            </tr>`);
                        }

                        $('.delete').click(function (e) {
                            e.preventDefault();
                            form_masterID = $(this).parent().parent().find('input.formaster-id').val();
                            let d = $(this);
                            if (confirm('Are you sure you want delete this?')) {
                                $.post('../../../Backend/ClassLibrary/forward_to_staffs_delete_formaster.php', {form_masterID: form_masterID}, function (res) {
                                    alert(res);
                                    d.closest('tr').remove();
                                    reWriteTableSerialNumber();

                                });

                            }


                        });

                        /*alert(data);*/
                    },
                    error: function (data) {

                    }
                });
            });
        }

    });

    function reWriteTableSerialNumber() {
        let table = $('table tbody');
        table.children('tr').each(function (index) {
            $(this).children('td').first('td').empty().html(Number(Number(index) + 1));
        });
    }
});