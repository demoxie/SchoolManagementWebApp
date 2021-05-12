$(function () {
    const tbody = $('tbody');
    let select_all = $('input#select_all'),
        classArray = ['nur 1', 'nur 2', 'nur 3', 'pri 1', 'pri 2', 'pri 3', 'pri 4', 'pri 5', 'pri 6', 'jss 1', 'jss 2', 'jss 3', 'ss 1', 'ss 2', 'ss 3'],
        currentClass, curClass, nextClass, currentStatus, nextStatus, classArm, selectedOptions, tableRows, studClass,
        current_class, sessionID, classID, selector, studentID, studentCurrentClass, studentPreviousClass, affectedRow, studentCurrentStatus, status, termID;
    $.get('../../../Backend/ClassLibrary/fetch_students_from_status.php', function (data) {
        //console.log(data);
        let result = JSON.parse(data);
        printRows(result);

        //tableRows = $('tbody tr');
        toggleAllSelectors();
        toggleEachSelector();
        promoteAnIndividual();
        demoteAnIndividual();
        withdrawAnIndividual();
        expellAnIndividual();
        deleteAnIndividual();
        searchForAnIndividual();
        //promoteSelectedIndividuals();
        demoteSelectedIndividuals();
        withdrawSelectedIndividuals();
        expellSelectedIndividuals();
        deleteSelectedIndividuals();

    });
    let currentTableState = $('tbody').html();
    $('#class').change(function (e) {
        classID = $(this).val();
        searchByClassSessionTerm(classID, sessionID);
    });
    $('#session').change(function (e) {
        sessionID = $(this).val();
        searchByClassSessionTerm(classID, sessionID);
    });
    $('#term').change(function (e) {
        termID = $(this).val();

    });

    function reWriteTableSerialNumber() {

        let indexVal = 0;
        $('tbody tr').each(function () {
            indexVal++;
            $(this).children('td').eq(1).empty().html(indexVal);

        });
    }

    function searchByClassSessionTerm(classID, sessionID) {
        $.post('../../../Backend/ClassLibrary/fetch_status_by_class_and_session.php', {
            classID: classID,
            sessionID: sessionID
        }, function (data) {
            //console.log(data);
            let result = JSON.parse(data);
            printRows(result);
            promoteAnIndividual();
            demoteAnIndividual();
            withdrawAnIndividual();
            expellAnIndividual();
            deleteAnIndividual();
            searchForAnIndividual();
            promoteSelectedIndividuals();
            demoteSelectedIndividuals();
            withdrawSelectedIndividuals();
            expellSelectedIndividuals();
            deleteSelectedIndividuals();

        });
    }

    function promoteAnIndividual() {
        $('.promote').click(function () {
            currentClass = $(this).parent().prev().prev().prev().html();
            curClass = currentClass.toLocaleLowerCase().slice(0, -1);
            classArm = currentClass.slice(currentClass.length - 1);
            currentStatus = $(this).parent().prev().html();
            nextStatus = $(this).parent().prev().html('Promoted');
            for (let i in classArray) {
                if (curClass === classArray[i]) {
                    i++;
                    if (i <= classArray.length - 1) {
                        nextClass = classArray[i].toUpperCase();
                        $(this).parent().prev().prev().prev().html(nextClass + classArm);
                        $(this).parent().prev().prev().html(currentClass);
                        affectedRow = $(this).closest('tr').children('td');
                        studentID = affectedRow.eq(0).find('input.select').attr('data-studentID');
                        submitChangedStatus(studentID, studentCurrentClass = nextClass + classArm, currentClass, studentCurrentStatus = 'Promoted', sessionID, termID, classID);
                        //alert(id);
                    }

                } else {

                }
            }

        });

    }

    function demoteAnIndividual() {
        $('.demote').click(function () {
            currentClass = $(this).parent().prev().prev().prev().prev().html();
            curClass = currentClass.toLocaleLowerCase().slice(0, -1);
            classArm = currentClass.slice(currentClass.length - 1);
            //alert(classArm);
            currentStatus = $(this).parent().prev().html();
            nextStatus = $(this).parent().prev().prev().html('Demoted');
            for (let i in classArray) {
                if (curClass === classArray[i]) {
                    nextClass = classArray[i].toUpperCase();
                    //write current class
                    $(this).parent().prev().prev().prev().prev().html(nextClass + classArm);
                    $(this).parent().prev().prev().prev().html(currentClass);
                    affectedRow = $(this).closest('tr').children('td');
                    studentID = affectedRow.eq(0).find('input.select').attr('data-studentID');
                    submitChangedStatus(studentID, studentCurrentClass = nextClass + classArm, currentClass, studentCurrentStatus = 'Demoted', sessionID, termID, classID);

                } else {
                    //alert(item[i]);
                }
            }
        });

    }

    function withdrawAnIndividual() {
        $('.withdraw').click(function () {
            currentStatus = $(this).parent().prev().prev().html();
            nextStatus = $(this).parent().prev().prev().prev().html('Withdrawn');
            studentCurrentClass = $(this).parent().prev().prev().prev().prev().prev().html();
            studentPreviousClass = $(this).parent().prev().prev().prev().prev().html();
            affectedRow = $(this).closest('tr').children('td');
            studentID = affectedRow.eq(0).find('input.select').attr('data-studentID');
            submitChangedStatus(studentID, studentCurrentClass, studentPreviousClass, studentCurrentStatus = 'Withdrawn', sessionID, termID, classID);
        });

    }

    function expellAnIndividual() {
        $('.expell').click(function () {
            currentStatus = $(this).parent().prev().prev().prev().html();
            nextStatus = $(this).parent().prev().prev().prev().prev().html('Expelled');
            studentCurrentClass = $(this).parent().prev().prev().prev().prev().prev().prev().html();
            studentPreviousClass = $(this).parent().prev().prev().prev().prev().prev().html();
            affectedRow = $(this).closest('tr').children('td');
            studentID = affectedRow.eq(0).find('input.select').attr('data-studentID');
            submitChangedStatus(studentID, studentCurrentClass, studentPreviousClass, studentCurrentStatus = 'Expelled', sessionID, termID, classID);
        });

    }

    function deleteAnIndividual() {
        $('.delete').click(function () {
            currentStatus = $(this).parent().prev().prev().prev().prev().html();
            nextStatus = $(this).parent().prev().prev().prev().prev().prev().html('Account deleted');
            studentCurrentClass = $(this).parent().prev().prev().prev().prev().prev().prev().prev().html();
            studentPreviousClass = $(this).parent().prev().prev().prev().prev().prev().prev().html();
            affectedRow = $(this).closest('tr').children('td');
            studentID = affectedRow.eq(0).find('input.select').attr('data-studentID');
            submitChangedStatus(studentID, studentCurrentClass, studentPreviousClass, studentCurrentStatus = 'Account deleted', sessionID, termID, classID);
        });
    }

    function searchForAnIndividual() {
        $('#search').keyup(function () {
            let keyword = $.trim($(this).val()).toLocaleLowerCase();
            //alert('po');
            let i = 0;
            tableRows.each(function (index) {
                let names = $(this).children().eq(2).html().toLocaleLowerCase();

                if (keyword !== '') {
                    if (names.includes(keyword)) {
                        i++;
                        tableRows.eq(index).show(function () {
                            $(this).children('td').eq(1).html(i);
                        });
                        //reWriteTableSerialNumber();
                    } else {

                        tableRows.eq(index).hide();
                    }
                } else {
                    i = 0;
                    tableRows.eq(index).show();
                    reWriteTableSerialNumber();
                }

            });
        });
    }

    function promoteSelectedIndividuals() {
        $('button#promote_selected').click(function () {
            tableRows.each(function (i) {
                selectedOptions = $(this).children('td').first('td').find('input.select').is(':checked');
                if (selectedOptions) {
                    currentClass = $(this).children().eq(3).html();
                    curClass = currentClass.toLocaleLowerCase().slice(0, -1);
                    classArm = currentClass.slice(currentClass.length - 1);
                    currentStatus = $(this).children().eq(5).html();
                    nextStatus = $(this).children().eq(5).html('Promoted');
                    for (let i in classArray) {
                        if (curClass === classArray[i]) {
                            i++;
                            if (i <= classArray.length - 1) {
                                nextClass = classArray[i].toUpperCase();
                                $(this).children().eq(3).html(nextClass + classArm);
                                $(this).children().eq(4).html(currentClass);
                                studentID = $(this).children('td').eq(0).find('input.select').attr('data-studentID');
                                submitChangedStatus(studentID, studentCurrentClass = nextClass + classArm, currentClass, studentCurrentStatus = 'Promoted', sessionID, termID, classID);

                            }
                        } else {
                            //alert(item[i]);
                        }
                    }

                }
            });

        });
    }


    function demoteSelectedIndividuals() {
        $('button#demote_selected').click(function () {
            tableRows.each(function (i) {
                selectedOptions = $(this).children('td').first('td').find('input.select').is(':checked');
                if (selectedOptions) {
                    currentClass = $(this).children().eq(3).html();
                    curClass = currentClass.toLocaleLowerCase().slice(0, -1);
                    classArm = currentClass.slice(currentClass.length - 1);
                    //alert(classArm);
                    currentStatus = $(this).children().eq(5).html();
                    nextStatus = $(this).children().eq(5).html('Demoted');
                    for (let i in classArray) {
                        if (curClass === classArray[i]) {
                            nextClass = classArray[i].toUpperCase();
                            //write current class
                            $(this).children().eq(4).html(currentClass);

                        } else {
                            //alert(item[i]);
                        }
                    }
                }
            });

        });
    }

    function withdrawSelectedIndividuals() {
        $('button#withdraw_selected').click(function () {
            tableRows.each(function (i) {
                selectedOptions = $(this).children('td').first('td').find('input.select').is(':checked');
                if (selectedOptions) {
                    currentStatus = $(this).children().eq(5).html();
                    nextStatus = $(this).children().eq(5).html('Withdrawn');
                }
            });

        });
    }

    function expellSelectedIndividuals() {
        $('button#expell_selected').click(function () {
            tableRows.each(function (i) {
                selectedOptions = $(this).children('td').first('td').find('input.select').is(':checked');
                if (selectedOptions) {
                    currentStatus = $(this).children().eq(5).html();
                    nextStatus = $(this).children().eq(5).html('Expelled');
                }
            });

        });
    }

    function deleteSelectedIndividuals() {
        $('button#delete_selected').click(function () {
            tableRows.each(function (i) {
                selectedOptions = $(this).children('td').first('td').find('input.select').is(':checked');
                if (selectedOptions) {
                    currentStatus = $(this).children().eq(5).html();
                    nextStatus = $(this).children().eq(5).html('Account deleted');
                }
            });

        });
    }

    function toggleEachSelector() {
        $('.select').change(function () {
            if ($(this).is(':checked')) {
                $(this).css({
                    "background-color": "darkgreen",
                    "border": "none"
                });
            } else {
                $(this).css({
                    "background-color": "white",
                    "border": "1px solid #ccc"
                });
            }
        });
    }

    function toggleAllSelectors() {
        select_all.change(function () {
            let mainSelector = $(this);
            tbody.children('tr').each(function () {
                selector = $(this).children('td').first().find('input.select');
                if (!selector.is(':checked')) {
                    selector.attr('checked', 'checked');
                    selector.css({
                        "background-color": "darkgreen",
                        "border": "none"
                    });
                    mainSelector.css({
                        "background-color": "darkgreen",
                        "border": "1px solid white"
                    });
                } else {
                    selector.removeAttr('checked');
                    selector.css({
                        "background-color": "white",
                        "border": "1px solid #ccc"
                    });

                    mainSelector.css({
                        "background-color": "white",
                        "border": "1px solid white"
                    });
                }

            });

        });
    }

    function printRows(result) {
        tbody.empty();
        for (let i in result) {
            //alert(result[i]['studentID']);
            tbody.append(`<tr>
                 <td><input type="checkbox" class="form-check-input select" data-studentID="${result[i]['studentID']}"></td>
                 <td>${Number(i) + 1}</td>
                 <td>${result[i]['name']}</td>
                 <td>${result[i]['currentClass']}</td>
                 <td>${result[i]['0']['previousClass']}</td>
                 <td>${result[i]['Status']}</td>
                 <td><a class="btn promote"><i class="fas fa-arrow-up"></i></a></td>
                 <td><a class="btn demote"><i class="fas fa-arrow-down"></i></a></td>
                 <td><a class="btn withdraw"><i class="fas fa-remove-format"></i></a></td>
                 <td><a class="btn expell"><i class="fas fa-walking"></i></a></td>
                 <td><a class="btn delete"><i class="fas fa-trash-alt"></i></a></td>
             </tr>`);
        }
        tableRows = $('tbody tr');
        toggleEachSelector();
        /*let affectedRow = tbody.children('tr').first('tr').children('td');
                        let id = affectedRow.eq(0).find('input.select').attr('data-studentID');
                        alert(id);
        //sendID();*/
    }

    function submitChangedStatus(studentID, studentCurrentClass, currentClass, status, sessionID, termID, classID) {
        $.post('../../../Backend/ClassLibrary/forward_to_change_student_status.php', {
            studentID: studentID,
            currentClass: studentCurrentClass,
            previousClass: currentClass,
            status: status,
            sessionID: sessionID,
            termID: termID,
            classID: classID
        }, function (res) {
            console.log(res);
        });

    }
    /*function sendID(id){
        return id;
    }
*/


});