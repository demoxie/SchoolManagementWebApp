$(document).ready(function () {

    function getDateTime() {
        const today = new Date();

        const date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();

        const time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

        return date + ' ' + time;
    }

    $.get('../../Backend/ClassLibrary/fetch_cs_subject.php', function (data) {
        let result = JSON.parse(data);
        for (let n in result) {
            let sub1 = result[n]['subject1_ID'] === null ? '' : result[n]['subject1_ID'] + '<br>';
            let sub2 = result[n]['subject2_ID'] === null ? '' : result[n]['subject2_ID'] + '<br>';
            let sub3 = result[n]['subject3_ID'] === null ? '' : result[n]['subject3_ID'] + '<br>';
            let sub4 = result[n]['subject4_ID'] === null ? '' : result[n]['subject4_ID'] + '<br>';
            let sub5 = result[n]['subject5_ID'] === null ? '' : result[n]['subject5_ID'] + '<br>';
            let sub6 = result[n]['subject6_ID'] === null ? '' : result[n]['subject6_ID'] + '<br>';
            let sub7 = result[n]['subject7_ID'] === null ? '' : result[n]['subject7_ID'] + '<br>';
            let sub8 = result[n]['subject8_ID'] === null ? '' : result[n]['subject8_ID'] + '<br>';
            $('tbody').append(`<tr>
                <td>${Number(n) + 1}</td>
                <td>${result[n]['cs_Code']}</td>
                <td>${result[n]['cs_Name']}</td>
                <td>${
                sub1 +
                sub2 +
                sub3 +
                sub4 +
                sub5 +
                sub6 +
                sub7 +
                sub8
            }</td>
                <td>
                   ${result[n]['dateCreated']}
                </td>
                <td>
                    <a type="button" class="btn  edit col" data-cs-id="${result[n]['cs_ID']}"><i class="fas fa-edit fa-1x"></i></a>
                </td>
                <td>
                    <a type="button" class="btn delete col" data-cs-id="${result[n]['cs_ID']}"><i class="fas fa-trash-alt fa-1x"></i></a>
                </td>
            </tr>`);
            $('.delete').click(function () {
                let buttonDelete =$(this);
                if(confirm('Are you sure you want to delete this?')){
                let cs_id = $(this).data('cs-id');
                $.post('../../Backend/ClassLibrary/forward_to_subject_delete_cs.php',{cs_id:cs_id},function (resp){
                    if(resp==='true'){
                        buttonDelete.closest('tr').remove();
                        updateRowCount();
                        alert('deleted successfully');
                    }else {
                        alert('unable to delete data');
                    }
                });
                }

            });
        }

    });


    let selectedSubjectName, selectedSubjectID;
    $(".subject").change(function () {
        selectedSubjectName = $(this).find(':selected').text();
        selectedSubjectID = $(this).val();
    });
    $("#add_subject").click(function () {
        if (selectedSubjectName === undefined) {
            alert('Please select subject');
        } else {
            $(".left").append(`<div class="cont col-12"><input type="hidden" class="subID" name="subjectID" value="${selectedSubjectID}"><button type="button" data-subject-id="${selectedSubjectID}" class="selected_subject col-10" name="${selectedSubjectID}">${selectedSubjectName}</button>
                    <i class="fas fa-times col-2 close_icon"></i></div>`);

            $('.cont').click(function () {
                $(this).remove();
            });
        }

    });
    let numberOfTimesAdded = 0;
    let rowCount = 1;
    let previousCode, previousName;
    let code = $('#cs_code');
    let codeName = $('#cs_name');
    $("#add_cs_subject").click(function () {

        if ($.trim($('#cs_code').val()) === '') {
            alert('Add Subject Code');

        } else if ($.trim($('#cs_name').val()) === '') {
            alert('Add Subject Name');

        } else if ($('.left').children().length === 0) {
            alert('Please add subjects');
        } else {
            if (previousCode !== code.val() && previousName !== codeName.val()) {
                let subjectsID = $('.subID').serializeArray();
                let tc = $('#cs_code');
                let tn = $('#cs_name');
                let csCode = tc.val();
                let csName = tn.val();
                //console.log(subjectsID);
                $.post('../../Backend/ClassLibrary/combine_subject_forward_to_subject.php', {
                    subjectsID: subjectsID,
                    csCode: csCode,
                    csName: csName
                }, function (res) {
                    console.log(res);
                    if (res === 'true') {
                        $('tbody').append(`<tr>
                <td>${rowCount}</td>
                <td>${code.val()}</td>
                <td>${codeName.val()}</td>
                <td>${printText()}</td>
                <td>
                   ${getDateTime()}
                </td>
                <td>
                    <a type="button" class="btn  edit col" id="edit"><i class="fas fa-edit fa-1x"></i></a>
                </td>
                <td>
                    <a type="button" class="btn delete col" id="delete"><i class="fas fa-trash-alt fa-1x"></i></a>
                </td>
            </tr>`);
                        $('.delete').click(function () {
                            $(this).closest('tr').remove();
                            updateRowCount();
                        });
                        previousCode = code.val();
                        previousName = codeName.val();
                        rowCount++;
                        $('.left').empty();
                        $('#cs_code').val('');
                        $('#cs_name').val('');
                    }
                });

            } else {
                alert("You're adding the same data, check and re-enter");
            }

        }

    });

    function updateRowCount() {
        const table = document.getElementById("cs_subjects_list");
        const rowcountAfterDelete = document.getElementById("cs_subjects_list").rows.length;
        for (let i = 1; i < rowcountAfterDelete; i++) {
            //table.rows[i].cells[0].innerHTML='';
            table.rows[i].cells[0].innerHTML = i;
        }
    }

    function printText() {
        let m = "";
        $('.left').children('div.cont').each(function (n) {
            //$('.left').children().eq(n).find('button').text();
            m += " " + $('.left').children().eq(n).find('button').text() + "<br>";
        });
        return m;
    }
});