$(function () {
    const tbody = $('tbody');
    let select_all = $('input#select_all'),
        classArray = ['pre-nursery', 'nur 1', 'nur 2', 'pri 1', 'pri 2', 'pri 3', 'pri 4', 'pri 5', 'pri 6', 'jss 1', 'jss 2', 'jss 3', 'ss 1', 'ss 2', 'ss 3'],
        currentClass, curClass, nextClass, currentStatus, nextStatus, classArm, selectedOptions, tableRows,
        mainSelector,
        current_sessionID, next_sessionID, classID, selector, studentID, studentCurrentClass, studentPreviousClass,
        affectedRow, studentCurrentStatus,
        termID;
    $('#class').change(function () {
        classID = $(this).val();
        //alert(current_sessionID);
        searchByClassSessionTerm(classID, current_sessionID);
    });
    $('#current_session').change(function () {
        current_sessionID = $(this).val();
        searchByClassSessionTerm(classID, current_sessionID);
    });
    $('#next_session').change(function () {
        next_sessionID = $(this).val();
        //alert(next_sessionID);
        //searchByClassSessionTerm(classID, next_sessionID);
    });
    $('#term').change(function () {
        termID = $(this).val();

    });

    function reWriteTableSerialNumber() {

        let indexVal = 0;
        $('tbody tr').each(function () {
            indexVal++;
            $(this).children('td').eq(1).empty().html(indexVal);

        });
    }

    function searchByClassSessionTerm(classID, current_sessionID) {

        $.post('../../../Backend/ClassLibrary/fetch_status_by_class_and_session.php', {
            classID: classID,
            current_sessionID: current_sessionID
        }, function (data) {
            //console.log(data);
            let result = JSON.parse(data);
            printRows(result);
            toggleEachSelector();
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
            if (validateForSubmission() === 'true') {
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
                            submitChangedStatus(studentID, studentCurrentClass = nextClass + classArm, currentClass, studentCurrentStatus = 'Promoted', next_sessionID, termID);
                            //alert(id);
                        }

                    } else {

                    }
                }
            } else {
                //alert(item[i]);
            }

        });

    }

    function demoteAnIndividual() {
        $('.demote').click(function () {
            if (validateForSubmission() === 'true') {
                currentClass = $(this).parent().prev().prev().prev().prev().html();
                curClass = currentClass.toLocaleLowerCase().slice(0, -1);
                classArm = currentClass.slice(currentClass.length - 1);
                //alert(classArm);
                currentStatus = $(this).parent().prev().html();
                nextStatus = $(this).parent().prev().prev().html('Repeated');
                for (let i in classArray) {
                    if (curClass === classArray[i]) {
                        nextClass = classArray[i].toUpperCase();
                        //write current class
                        $(this).parent().prev().prev().prev().prev().html(nextClass + classArm);
                        $(this).parent().prev().prev().prev().html(currentClass);
                        affectedRow = $(this).closest('tr').children('td');
                        studentID = affectedRow.eq(0).find('input.select').attr('data-studentID');
                        submitChangedStatus(studentID, studentCurrentClass = nextClass + classArm, currentClass, studentCurrentStatus = 'Repeated', next_sessionID, termID);

                    } else {
                        //alert(item[i]);
                    }
                }
            } else {
                alert('select next session and term');
            }
        });

    }

    function withdrawAnIndividual() {
        $('.withdraw').click(function () {
            if (validateForSubmission() === 'true') {
                currentStatus = $(this).parent().prev().prev().html();
                nextStatus = $(this).parent().prev().prev().prev().html('Withdrawn');
                studentCurrentClass = $(this).parent().prev().prev().prev().prev().prev().html();
                studentPreviousClass = $(this).parent().prev().prev().prev().prev().html();
                affectedRow = $(this).closest('tr').children('td');
                studentID = affectedRow.eq(0).find('input.select').attr('data-studentID');
                submitChangedStatus(studentID, studentCurrentClass, studentPreviousClass, studentCurrentStatus = 'Withdrawn', next_sessionID, termID);
            } else {
                alert('select next session and term');
            }
        });

    }

    function expellAnIndividual() {
        $('.expell').click(function () {
            if (validateForSubmission() === 'true') {
                currentStatus = $(this).parent().prev().prev().prev().html();
                nextStatus = $(this).parent().prev().prev().prev().prev().html('Expelled');
                studentCurrentClass = $(this).parent().prev().prev().prev().prev().prev().prev().html();
                studentPreviousClass = $(this).parent().prev().prev().prev().prev().prev().html();
                affectedRow = $(this).closest('tr').children('td');
                studentID = affectedRow.eq(0).find('input.select').attr('data-studentID');
                submitChangedStatus(studentID, studentCurrentClass, studentPreviousClass, studentCurrentStatus = 'Expelled', next_sessionID, termID);
            } else {
                alert('select next session and term');
            }
        });
    }

    function deleteAnIndividual() {
        $('.delete').click(function () {
            if (validateForSubmission() === 'true') {
                if (confirm('Are you sure you want to delete this student?')) {
                    currentStatus = $(this).parent().prev().prev().prev().prev().html();
                    nextStatus = $(this).parent().prev().prev().prev().prev().prev().html('Account deleted');
                    studentCurrentClass = $(this).parent().prev().prev().prev().prev().prev().prev().prev().html();
                    studentPreviousClass = $(this).parent().prev().prev().prev().prev().prev().prev().html();
                    affectedRow = $(this).closest('tr').children('td');
                    studentID = affectedRow.eq(0).find('input.select').attr('data-studentID');
                    submitChangedStatus(studentID, studentCurrentClass, studentPreviousClass, studentCurrentStatus = 'Account deleted', next_sessionID, termID);
                    deleteStudentRecord(studentID);
                }
            } else {
                alert('select next session and term');
            }

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
            tableRows.each(function () {
                selectedOptions = $(this).children('td').first('td').find('input.select').is(':checked');
                if (selectedOptions) {
                    if (validateForSubmission() === 'true') {
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
                                    submitChangedStatus(studentID, studentCurrentClass = nextClass + classArm, currentClass, studentCurrentStatus = 'Promoted', next_sessionID, termID);

                                }
                            } else {
                                //alert(item[i]);
                            }
                        }
                    } else {
                        alert('select next session and term');
                    }

                }
            });

        });
    }


    function demoteSelectedIndividuals() {
        $('button#demote_selected').click(function () {
            tableRows.each(function () {
                selectedOptions = $(this).children('td').first('td').find('input.select').is(':checked');
                if (selectedOptions) {
                    if (validateForSubmission() === 'true') {
                        currentClass = $(this).children().eq(3).html();
                        curClass = currentClass.toLocaleLowerCase().slice(0, -1);
                        classArm = currentClass.slice(currentClass.length - 1);
                        //alert(classArm);
                        currentStatus = $(this).children().eq(5).html();
                        nextStatus = $(this).children().eq(5).html('Repeated');
                        for (let i in classArray) {
                            if (curClass === classArray[i]) {
                                nextClass = classArray[i].toUpperCase();
                                //write current class
                                $(this).children().eq(4).html(currentClass);
                                studentID = $(this).children('td').eq(0).find('input.select').attr('data-studentID');
                                submitChangedStatus(studentID, studentCurrentClass = nextClass + classArm, currentClass, studentCurrentStatus = 'Repeated', next_sessionID, termID);
                            } else {
                                //alert(item[i]);
                            }
                        }
                    } else {
                        alert('select next session and term');
                    }


                }
            });

        });
    }

    function withdrawSelectedIndividuals() {
        $('button#withdraw_selected').click(function () {
            tableRows.each(function () {
                selectedOptions = $(this).children('td').first('td').find('input.select').is(':checked');
                if (selectedOptions) {
                    if (validateForSubmission() === 'true') {
                        currentStatus = $(this).children().eq(5).html();
                        nextStatus = $(this).children().eq(5).html('Withdrawn');
                        studentCurrentClass = $(this).children().eq(3).html();
                        currentClass = $(this).children().eq(4).html();
                        studentID = $(this).children('td').eq(0).find('input.select').attr('data-studentID');
                        submitChangedStatus(studentID, studentCurrentClass, currentClass, studentCurrentStatus = 'Withdrawn', next_sessionID, termID);
                    } else {
                        alert('select next session and term');
                    }

                }
            });

        });
    }

    function expellSelectedIndividuals() {
        $('button#expell_selected').click(function () {
            tableRows.each(function () {
                selectedOptions = $(this).children('td').first('td').find('input.select').is(':checked');
                if (selectedOptions) {
                    if (validateForSubmission() === 'true') {
                        currentStatus = $(this).children().eq(5).html();
                        nextStatus = $(this).children().eq(5).html('Expelled');
                        studentCurrentClass = $(this).children().eq(3).html();
                        currentClass = $(this).children().eq(4).html();
                        studentID = $(this).children('td').eq(0).find('input.select').attr('data-studentID');
                        submitChangedStatus(studentID, studentCurrentClass, currentClass, studentCurrentStatus = 'Expelled', next_sessionID, termID);
                    } else {
                        alert('select next session and term');
                    }

                }
            });

        });
    }

    function deleteSelectedIndividuals() {
        $('button#delete_selected').click(function () {
            tableRows.each(function () {
                selectedOptions = $(this).children('td').first('td').find('input.select').is(':checked');
                if (selectedOptions) {
                    if (validateForSubmission() === 'true') {
                        if (confirm('Are you sure you want to delete this student?') === true) {
                            currentStatus = $(this).children().eq(5).html();
                            nextStatus = $(this).children().eq(5).html('Account deleted');
                            studentCurrentClass = $(this).children().eq(3).html();
                            currentClass = $(this).children().eq(4).html();
                            studentID = $(this).children('td').eq(0).find('input.select').attr('data-studentID');
                            submitChangedStatus(studentID, studentCurrentClass, currentClass, studentCurrentStatus = 'Account deleted', next_sessionID, termID);
                            deleteStudentRecord(studentID);
                        }
                    } else {
                        alert('select next session and term');
                    }


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
            mainSelector = $(this);
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

    }

    toggleAllSelectors();

    function submitChangedStatus(studentID, studentCurrentClass, currentClass, status, sessionID, termID) {
        $.post('../../../Backend/ClassLibrary/forward_to_change_student_status.php', {
            studentID: studentID,
            currentClass: studentCurrentClass,
            previousClass: currentClass,
            status: status,
            next_sessionID: next_sessionID,
            termID: termID
        }, function (res) {
            console.log(res);
        });

    }

    function deleteStudentRecord(studentID) {
        $.post('../../../Backend/ClassLibrary/forward_to_delete_stud_record.php', {
            ID: studentID
        }, function (res) {
            console.log(res);
        });

    }

    function validateForSubmission() {
        //alert(termID);
        if (termID === undefined && next_sessionID === undefined) {
            return 'false';
        } else {
            return 'true';
        }

    }


});