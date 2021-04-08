$(document).ready(function () {
    let isClicked = 0;
    let st_ID;

    $('[data-toggle="tooltip"]').tooltip();
    $('#upper_profile_close_btn,#cancel_profile_view').click(function () {
        $('#myModal').modal('hide');

    });
    $('#cancel_btn,#close_confirm').click(function () {
        $('#comfirmDeleteModal').modal('hide');
    });
    // $('.delete').tooltip({trigger: "hover"});
    // Animate select box length
    const searchInput = $(".search-box input");
    const inputGroup = $(".search-box .input-group");
    const boxWidth = inputGroup.width();
    searchInput.focus(function () {
        inputGroup.animate({
            width: "300"
        });
    }).blur(function () {
        inputGroup.animate({
            width: boxWidth
        });
    });
    // let classid = $('#class').val();
    $.post('../../../Backend/ClassLibrary/fetchAllStudents.php', function (result) {
        let resData = JSON.parse(result);
        const gender = (stud_gender) => {
            switch (stud_gender) {
                case 'Female':
                    return 'Female  <i style="float: right" class="fas fa-female"></i>';
                case 'Male':
                    return 'Male  <i style="float: right" class="fas fa-male"></i>';
                default:
                    return '';
            }

        };
        for (let x in resData) {
            $('tbody').append(`<tr>
                        <td>${Number(x) + 1}</td><td>${resData[x].name}</td><td>${resData[x].AdmissionNO}</td><td>${gender(resData[x].gender)}</td>
                        <td>${resData[x].class}</td><td class="status_col">${resData[x].Status}</td>
                        <td style="text-align: center;font-size: 10px">
                        <a href="#" class="view" title="View" data-toggle="tooltip" data-student-id="${resData[x].studentID}"><i class="fa fa-eye"></i></a>
                        <a href="#" class="edit" title="Edit" data-toggle="tooltip" data-student-id="${resData[x].studentID}"><i class="fa fa-pen"></i></a>
                        <a href="#" class="delete" title="Delete" data-toggle="tooltip" data-student-id="${resData[x].studentID}"><i class="fa fa-trash"></i></a>
                    </td></tr>`);
        }

        $(".view").click(function () {
            let ID = $(this).data('student-id');
            st_ID = $(this).data('student-id');
            //alert(st_ID)
            hideButtons();
            fetchRecord(ID);
        });
        $(".edit").click(function () {
            let ID = $(this).data('student-id');
            st_ID = $(this).data('student-id');
            showButtons();
            fetchRecord(ID);
        });
        $('#delete_btn').click(function () {
            $('#comfirmDeleteModal').modal('hide');
            $('tbody').find('td a').eq(isClicked).closest('tr').remove();
            updateRowCount();
            $.post('../../../Backend/ClassLibrary/forward_to_delete_stud_record.php', {ID: st_ID}, function (res) {
                alert(res);
            });


        });
        $(".delete").click(function () {
            isClicked = $(this).index();
            st_ID = $(this).data('student-id');
            $('#comfirmDeleteModal').modal('show');
            //confirm("Are you sure you want to delete the student record?")

        });

    });

    function updateRowCount() {
        const table = document.getElementById("stud_list_table");
        const rowcountAfterDelete = document.getElementById("stud_list_table").rows.length;
        for (let i = 1; i < rowcountAfterDelete; i++) {
            //table.rows[i].cells[0].innerHTML='';
            table.rows[i].cells[0].innerHTML = i;
        }
    }

    function fetchRecord(id) {

        $.post('../../../Backend/ClassLibrary/forward_to_fetch_student_data.php', {ID: id}, function (data) {
            let studData = JSON.parse(data);
            $('#stud_name').val(studData['name']);
            $('#gender').val(studData['gender']);
            $('#dob').val(studData['dateOfBirth']);
            $('#address').val(studData['guardianResidentialAddress']);
            $('#year_admitted').val(studData['yearApproved']);
            $('#admission_no').val(studData['admissionNO']);
            $('#stud_class').val(studData['class'])
            $('#religion').val(studData['religion']);
            $('#state_of_origin').val(studData['stateOfOrigin']);
            $('#lga').val(studData['l_g_a']);
            $('#p_name').val(studData['guardianName']);
            $('#p_phone').val(studData['guardianPhone']);
            $('#p_email').val(studData['guardianEmail']);
            $('#stud_id').val(id);
            $('#passport_container').html(studData['passport']);
            $('#myModal').modal('show');
            $('#passport').click(function () {
                alert('ok');
            })

        });
    }


    function hideButtons() {
        $('#print_btn').removeClass('col').addClass('col-3');
        $('#save_btn,#update_btn').hide();


    }

    function showButtons() {
        $('#print_btn').removeClass('col-3').addClass('col');
        $('#save_btn,#update_btn').show();

    }

    $('#update_btn').click(function () {
        $('.data-details').removeAttr('readonly');
    });
    $('#save_btn').click(function () {
        $('.data-details').attr('readonly', 'readonly');
    });
    $('#print_btn').click(function () {
        printDiv('card');
        $('.bottom_buttons').show();
    });


    /* function printDiv(divName) {
         $('.bottom_buttons').hide();
         fetchRecord(st_ID);
         let printContents = document.getElementById(divName).innerHTML;
         let originalContents = document.body.innerHTML;
         document.body.innerHTML = printContents;
         window.print();
         document.body.innerHTML = originalContents;
     }*/
    function printDiv(el) {
        const restorepage = $('body').html();
        const printcontent = $('#' + el).clone();
        const enteredtext = $('input').val();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
        $('input').html(enteredtext);
    }

    $('#class').change(function () {
        let input, filter, table, tr, td, i, txtValue;
        //input = document.getElementById("class");
        filter = $(this).find(':selected').text().toUpperCase();
        //table = $("#stud_list_table");
        tr = $('#stud_list_table tr');
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[4];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }

            }

        }
        updateRowCount();

    });
    $('#passport').click(function () {
        alert('ok');
    });


    $('#save_btn').click(function () {

        let name = $('#stud_name').val();
        let gender = $('#gender').val();
        let date_of_birth = $('#dob').val();
        let address = $('#address').val();
        let year_admitted = $('#year_admitted').val();
        let admissionNO = $('#admission_no').val();
        let myclass = $('#class').val();
        let religion = $('#religion').val();
        let stateOfOrigin = $('#state_of_origin').val();
        let lga = $('#lga').val();
        let p_name = $('#p_name').val();
        let p_phone = $('#p_phone').val()
        let p_email = $('#p_email').val();
        let ID = $('#stud_id').val();

        $.post('../../../Backend/ClassLibrary/forward_to_student_to_save.php', {
            STUDENTID: ID,
            NAME: name,
            GENDER: gender,
            DATE_OF_BIRTH: date_of_birth,
            ADDRESS: address,
            YEAR_ADMITTED: year_admitted,
            ADMISSION_NO: admissionNO,
            MYCLASS: myclass,
            RELIGION: religion,
            STATE_OF_ORIGIN: stateOfOrigin,
            LGA: lga,
            P_NAME: p_name,
            P_PHONE: p_phone,
            P_EMAIL: p_email
        }, function (res) {
            alert(res);
        });
    });


});