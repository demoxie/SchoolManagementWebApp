$(document).ready(function () {
    let clasID, sessionID, termID, admisionNO, tbody = $("#student-list-table tbody"), body = $('body'),
        selections = $('.custom-select-lg');
    $('#class').change(function () {
        clasID = $(this).val();
        if (sessionID !== undefined) {
            fetchStudentWhoCanSeeReult(clasID, sessionID);
        }
    });
    $('#session').change(function () {
        sessionID = $(this).val();
        if (clasID !== undefined) {
            fetchStudentWhoCanSeeReult(clasID, sessionID);
        }
    });

    $('#term').change(function () {
        if (clasID !== undefined && sessionID !== undefined) {
            termID = $(this).val();
        }
    });
    $('#print').click(function () {
        printDiv('result_sheet');
        $('#result').modal('hide');
    });
    $('#print-selected').click(function () {
        $('tbody tr').each(function () {
            //$(this).children().eq(1).css('background-color','black');
            let student_selector = $(this).children('td').first().find('input.selector').is(':checked');
            if (student_selector) {
                admisionNO = $(this).children('td').eq(5).find('.view-result').attr('data-admissionNO');
                //alert(admisionNO);
                fetchResultFromServer(admisionNO, sessionID, termID);
                //window.print();
                /*printDiv('result_sheet');
                $('#result').modal('hide');*/

            }
        });

    });
    $('#select-all').change(function () {

        $('tbody tr').each(function () {
            //$(this).children().eq(1).css('background-color','black');
            let student_selector = $(this).children('td').first().find('input.selector').is(':checked');
            if (!student_selector) {
                $(this).children('td').first().find('input.selector').attr('checked', 'checked');
            } else {
                $(this).children('td').first().find('input.selector').removeAttr('checked');
            }
        });
    });

    function printDiv(el) {

        const restorepage = body.html();
        const printcontent = $('#' + el).clone();
        const enteredtext = selections.val();
        body.empty().html(printcontent);
        window.print();
        //$('#result').modal('hide');
        //window.history.go(-1);
        body.html(restorepage);
        selections.html(enteredtext);


    }


    function fetchStudentWhoCanSeeReult(class_id, session_id) {
        $.post('../../../Backend/ClassLibrary/fetch_students_who_can_see_result.php',
            {classID: class_id, sessionID: session_id}, function (data) {
                // console.log(data);
                tbody.empty();
                let response = JSON.parse(data);
                for (let i in response) {
                    tbody.append(` <tr style="text-align: center;vertical-align: middle;font-weight: bolder">
                <td style="padding: 2px; text-align: center;vertical-align: middle;"><input type="checkbox" class="form-check-input selector"</td>
                <td style="padding: 2px; text-align: center;vertical-align: middle;">${Number(i) + 1}</td>
                <td style="padding: 5px;vertical-align: middle">${response[i]['name']}</td>
                <td style="padding: 2px; text-align: center;vertical-align: middle;">${response[i]['class']}</td>
                <td style="padding: 2px; text-align: center;vertical-align: middle;">${response[i]['Status']}</td>
                <td style="padding: 2px;width: 150px;text-align: center;vertical-align: middle"><a
                            class="btn view-result" data-admissionNO="${response[i]['admissionNO']}"><i class="fas fa-eye fa-1x"></i> &nbsp;&nbsp;View Result</a></td>
                <td style="padding: 2px;width: 150px;text-align: center;vertical-align: middle"><a
                            class="btn send-result" data-studentID="${response[i]['studentID']}"><i class="fas fa-paper-plane fa-1x"></i> &nbsp;&nbsp;Send
                        Result</a></td>
            </tr>`);

                }
                $('.view-result').click(function () {
                    admisionNO = $(this).attr('data-admissionNO');
                    fetchResultFromServer(admisionNO, sessionID, termID);


                    //alert(termID);
                });
                $('.send-result').click(function () {
                    admisionNO = $(this).parent().prev().find('a.view-result').attr('data-admissionNO');
                    // alert(admisionNO);
                });


            });
    }

    function fetchResultFromServer(admission_no, session_id, term_id) {
        //alert(term_id);
        if (termID === undefined) {
            $.post('../../../Backend/ClassLibrary/check_fetch_result.php', {
                admission_no: admission_no,
                sessionID: session_id
            }, function (response) {
                //alert(response);
                presentFullDetailedSessionResult(response);
            });
        } else {
            $.post('../../../Backend/ClassLibrary/check_fetch_result.php', {
                admission_no: admission_no,
                sessionID: session_id,
                termID: term_id
            }, function (response) {
                //alert(response);
                presentFullDetailedTermResult(response);

            });
        }

    }


    ///////////////////////////////////
    ////PREENT FULL SESSION RESULT/////
    ///////////////////////////////////
    let res;

    function presentFullDetailedSessionResult(resultdata) {

        if (resultdata !== 'empty 2') {
            res = JSON.parse(resultdata);
        }
        $('.modal-body').html(function () {
            let partOne = `<div class="container" id="result_sheet">
    <div class="result_header">
        <img src="../../../Backend/Src/Icons/${res['school_info']['school_logo']}" width="100" height="100" id="school_logo" alt="school logo">
        <h2 id="school_name">${res['school_info']['schoolName']}</h2><img src="../../../Backend/Src/uploads/students/${res['passport']}" width="100" height="100" id="passport" alt="student logo">
        <h4 id="postal_address">${res['school_info']['schoolPostalBox']}</h4>
        <h5 id="school_motto">${res['school_info']['schoolMotto']}</h5>
        <div class="stud_details">
         <h5 style="text-decoration: underline;font-weight: bold;margin-bottom: 20px">Annual Student Report Sheet</h5>
            <div class="row">
            <div class="side_bar_buttons">
                <b><p class="titles">Name: </p></b><p class="details">${res['name']}</p></div>
                
                <div class="side_bar_buttons"><b><p class="titles">Gender:</p></b><p class="details">${res['gender']}</p></div>
                
                <div class="side_bar_buttons"><b><p class="titles">Age: </p></b><p class="details">${res['dateOfBirth']}</p></div>
                <div class="side_bar_buttons"><b><p class="titles">Class: </p></b><p class="details">${res['class']}</p></div>
            </div>
           
            
             <div class="row">
            <div class="side_bar_buttons">
                <b><p class="titles">ADMN:</p></b><p class="details">${res['admissionNO']}</p></div>
                
                <div class="side_bar_buttons"><b><p class="titles">Session:</p></b><p class="details">${res['session']}</p></div>
                
                <div class="side_bar_buttons"><b><p class="titles">Term Commenced: </p></b><p class="details">${res['termBegins']}</p></div>
                <div class="side_bar_buttons"><b><p class="titles">Term Ended: </p></b><p class="details">${res['termEnd']}</p></div>
            </div>
           
            
            
            
             <div class="row">
            <div class="side_bar_buttons"><b><p class="titles">Resumption Date: </p></b><p class="details">${res['nextTermBegins']}</p>
            
                </div>
                
                <div class="side_bar_buttons"><b><p class="titles">No of time school opened:</p></b><p class="details">${res['middle_row']['no_of_times_school_opened']}</p>
                </div>
                
                <div class="side_bar_buttons"><b><p class="titles">No of times present: </p></b><p class="details">${res['middle_row']['total_attendance']}</p>
                </div>
                <div class="side_bar_buttons"><b><p class="titles">No of times absent: </p></b><p class="details">${res['middle_row']['no_of_times_absent']}</p></div>
            </div>
           
            
            
             <div class="row">
            <div class="side_bar_buttons">
            <b><p class="titles">Sum Total: </p></b><p class="details">${res['middle_row']['grandTotal']}</p>
                </div>
                  <div class="side_bar_buttons">
                  <b><p class="titles">Average:</p></b><p class="details">${res['middle_row']['average']}</p>
                </div>
                
                <div class="side_bar_buttons"><b><p class="titles">Grade: </p></b><p class="details">${res['middle_row']['grade']}</p></div>
                
                <div class="side_bar_buttons"><b><p class="titles">Position: </p></b><p class="details">${res['middle_row']['position']}</p></div>
                
            </div>
            
            <div class="row">
            <div class="side_bar_buttons">
                <b><p class="titles">Highest class ave: </p></b><p class="details">${res['middle_row']['highestClassAverage']}</p></div>
                
                <div class="side_bar_buttons"><b><p class="titles">Lowest class ave:</p></b><p class="details">${res['middle_row']['lowestClassAverage']}</p></div>
                
                <div class="side_bar_buttons"><b><p class="titles">No of subjects: </p></b><p class="details">${res['middle_row']['no_of_subjects']}</p></div>
                 <div class="side_bar_buttons"><b><p class="titles">No in class: </p></b><p class="details">${res['middle_row']['no_of_students_in_the_class']}</p></div>
                
                
                
            </div>
           
           
        
        </div>
    </div>
    <div class="result_body table-responsive">
        <table class="table1">
            <thead>
                <tr style="text-transform: uppercase">
                <th style="width:23%;text-align: center;vertical-align: middle" colspan="3" >Subject</th>
                <th style="text-align: center;vertical-align: middle;min-width: 30px">1st Term</th>
                <th style="text-align: center;vertical-align: middle">2nd Term</th>
                <th style="text-align: center;vertical-align: middle">3rd Term</th>
                <th style="text-align: center;vertical-align: middle">Total</th>
                <th>Annual Average</th>
                <th style="text-align: center;vertical-align: middle">Grade</th>
                <th style="text-align: center;vertical-align: middle">Position</th>
                <th style="text-align: center;vertical-align: middle">Class Average</th>
                <th style="text-align: center;vertical-align: middle">Comment</th>
                    </tr>
                </thead>
            <tbody>
                <tr style="text-align: center">
                <td colspan="3"></td>
                <td>100</td>
                 <td>100</td>
                  <td>100</td>
                    <td>300</td>
                    <td>100</td>
                    <td></td>
                    <td></td>
                    <td colspan="1">100</td>
                    <td></td>
                </tr>`;
            let partTwo = ``;
            for (let n in res['mainSubjects']) {
                partTwo += `   <tr>
                    <td colspan="3">${res['mainSubjects'][n]['subjectID']}</td>
                     <td style="text-align: center;vertical-align: middle">${res['mainSubjects'][n]['firstTermScore']}</td>
                     <td style="text-align: center;vertical-align: middle">${res['mainSubjects'][n]['secondTermScore']}</td>
                     <td style="text-align: center;vertical-align: middle">${res['mainSubjects'][n]['thirdTermScore']}</td>
                     <td style="text-align: center;vertical-align: middle">${res['mainSubjects'][n]['grandTotal']}</td>
                     <td style="text-align: center;vertical-align: middle">${res['mainSubjects'][n]['average']}</td>
                     <td style="text-align: center;vertical-align: middle">${res['mainSubjects'][n]['grade']}</td>
                    <td style="text-align: center;vertical-align: middle">${res['mainSubjects'][n]['position']}</td>
                    <td style="text-align: center;vertical-align: middle"></td>
                    <td style="text-align: center;vertical-align: middle">${res['mainSubjects'][n]['remark']}</td>
                </tr>`
            }

            let partThree = ``;
            for (let i in res['cs_Subjects']) {
                partThree += `  <tr>
                    <td colspan="3">${res['cs_Subjects'][i]['cs_ID']}</td>
                    <td style="text-align: center;vertical-align: middle" colspan="3"> ${Number(res['cs_Subjects'][i]['firstTermScore']) + Number(res['cs_Subjects'][i]['secondTermScore']) + Number(res['cs_Subjects'][i]['thirdTermScore'])}</td>
                     <td style="text-align: center;vertical-align: middle">${res['cs_Subjects'][i]['grandTotal']}</td>
                     <td style="text-align: center;vertical-align: middle">${res['cs_Subjects'][i]['average']}</td>
                     <td style="text-align: center;vertical-align: middle">${res['cs_Subjects'][i]['grade']}</td>
                    <td style="text-align: center;vertical-align: middle">${res['cs_Subjects'][i]['position']}</td>
                    <td style="text-align: center;vertical-align: middle"></td>
                    <td style="text-align: center;vertical-align: middle">${res['cs_Subjects'][i]['remark']}</td>
                     
                </tr>`;
            }
            let partFour = `
<tr><td colspan="12" style="text-align:center;font-weight:bolder">KEY INTERPRETATIONOF VARIOUS GRADES</td></tr>
<tr style="text-align:center">
    <td></td>
                <td>(0-39) F9(Fail)</td>
                <td>(40-44) E8(Pass)</td>
                <td>(45-49) D7(Pass)</td>
                <td>(50-54) C6(Credit)</td>
                <td>(55-59) C5(Credit)</td>
                <td>(60-64) C4(Credit)</td>
                <td>(65-69) B3(Good)</td>
                <td>(70-74) B2(V.Good)</td>
                <td>(75-100) A(Excellent)</td>
                <td></td>
                <td></td>
                    </tr>
                <tr><td colspan="12"></td></tr>
                
                <tr style="text-align:center;font-weight:bolder">
            <td colspan="3">AFFECTIVE AREAS</td>
                <td>GRADE</td>
                    <td colspan="2"></td>
                <td colspan="3">PSYCHOMOTOR SKILLS RATING</td>
                <td>GRADE</td>
                    <td></td>
                    <td></td>
            </tr>
                <tr><td colspan="3">PUNCTUALITY</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3" style="padding-left:4px">HANDWRITING</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">NEATNESS</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3" style="padding-left:4px">GAMES/SPORT</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">CLASS ATTENTION</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3" style="padding-left:4px">ORATORY</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">CLASS PARTICIPATION</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3" style="padding-left:4px">CREATIVITY</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">FRIENDLINESS</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3" style="padding-left:4px">PERFOMING ARTS</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">HONESTY</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">SELF CONTROL</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">INDUSTRY</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">POLITENESS</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="text-align: center;font-weight:bolder;"><td colspan="12">KEY TO RATING: (OT = OBSERVABALE TRAITS)</td></tr>
                
                <tr style="text-align: left;">
                <td colspan="4"> 5 - Maintains an excellent degree of OT</td>
                    <td colspan="2" style="padding-left:4px"> 4 - Maintain high level of OT</td>
                    <td colspan="2" style="padding-left:4px"> 3 - Acceptable level of OT</td>
                    <td colspan="2" style="padding-left:4px"> 2 - Shows minimal regard for OT</td>
                    <td colspan="2" style="padding-left:3px"> 1 - Has no regard for OT</td>
                    
                </tr>
                <tr>
                <td colspan="9">
                    <b>
                        Form Teacher's Remark:............................................................................................................................................................................</b>
                    <td colspan="3" style="padding-left:4px;"><b>Sign/Date:......................................................</b></td>
                </tr>
                
                
                <tr style="vertical-align: bottom">
                <td colspan="9">
                    <b>
                        Head Teacher's Remark:.............................................................................................................................................................................
                        
                        </b>
                    <td colspan="3" style="padding-left:4px;"><b>Sign/Date:......................................................</b></td>
                </tr>
            
                
            </tbody>
        </table>
    </div>
    </div>`;
            return partOne + partTwo + partThree + partFour;

        });
        $('#result').modal('show');
    }


    //////////////////////////////////////////
    ///////// PRESENT FULL TERM RESULT ///////////
    ////////////////////////////////////////


    function presentFullDetailedTermResult(resultdata) {
        let res;
        if (resultdata !== 'empty 2') {
            res = JSON.parse(resultdata);
        }
        $('.modal-body').html(function () {
            let partOne = `<div class="container" id="result_sheet">
    <div class="result_header">
        <img src="../../../Backend/Src/Icons/${res['school_info']['school_logo']}" width="100" height="100" id="school_logo" alt="school logo">
        <h2 id="school_name">${res['school_info']['schoolName']}</h2><img src="../../../Backend/Src/uploads/students/${res['passport']}" width="100" height="100" id="passport" alt="student passport">
        <h4 id="postal_address">${res['school_info']['schoolPostalBox']}</h4>
        <h5 id="school_motto">${res['school_info']['schoolMotto']}</h5>
        <div class="stud_details">
        <h5 style="text-decoration: underline;font-weight: bold;margin-bottom: 20px">Student Term Report Sheet</h5>
            <div class="row">
            <div class="side_bar_buttons">
                <b><p class="titles">Name: </p></b><p class="details">${res['name']}</p></div>
                
                <div class="side_bar_buttons"><b><p class="titles">Gender:</p></b><p class="details">${res['gender']}</p></div>
                
                <div class="side_bar_buttons"><b><p class="titles">Age: </p></b><p class="details">${res['dateOfBirth']}</p></div>
                <div class="side_bar_buttons"><b><p class="titles">Class: </p></b><p class="details">${res['class']}</p></div>
            </div>
           
            
             <div class="row">
            <div class="side_bar_buttons">
                <b><p class="titles">ADMN:</p></b><p class="details">${res['admissionNO']}</p></div>
                
                <div class="side_bar_buttons"><b><p class="titles">Session:</p></b><p class="details">${res['session']}</p></div>
                <div class="side_bar_buttons"><b><p class="titles">Term: </p></b><p class="details">${res['termID']}</p></div>
                <div class="side_bar_buttons"><b><p class="titles">Term Commenced: </p></b><p class="details">${res['termBegins']}</p></div>
                
            </div>
           
            
            
            
             <div class="row">
             <div class="side_bar_buttons"><b><p class="titles">Term Ended: </p></b><p class="details">${res['termEnd']}</p></div>
            <div class="side_bar_buttons"><b><p class="titles">Resumption Date: </p></b><p class="details">${res['nextTermBegins']}</p>
            
                </div>
                
                <div class="side_bar_buttons"><b><p class="titles">No of time school opened:</p></b><p class="details">${res['middle_row']['no_of_times_school_opened']}</p>
                </div>
                
                <div class="side_bar_buttons"><b><p class="titles">No of times present: </p></b><p class="details">${res['middle_row']['total_attendance']}</p>
                </div>
               
            </div>
           
            
            
             <div class="row">
              <div class="side_bar_buttons"><b><p class="titles">No of times absent: </p></b><p class="details">${res['middle_row']['no_of_times_absent']}</p></div>
            <div class="side_bar_buttons">
            <b><p class="titles">Sum Total: </p></b><p class="details">${res['middle_row']['total']}</p>
                </div>
                  <div class="side_bar_buttons">
                  <b><p class="titles">Average:</p></b><p class="details">${res['middle_row']['average']}</p>
                </div>
                
                <div class="side_bar_buttons"><b><p class="titles">Grade: </p></b><p class="details">${res['middle_row']['grade']}</p></div>
              
            </div>
            
            <div class="row">
            <div class="side_bar_buttons">
                <b><p class="titles">Highest class ave: </p></b><p class="details">${res['middle_row']['highestClassAverage']}</p></div>
                
                <div class="side_bar_buttons"><b><p class="titles">Lowest class ave:</p></b><p class="details">${res['middle_row']['lowestClassAverage']}</p></div>
                
                <div class="side_bar_buttons"><b><p class="titles">No of subjects: </p></b><p class="details">${res['middle_row']['no_of_subjects']}</p></div>
                 <div class="side_bar_buttons"><b><p class="titles">No in class: </p></b><p class="details">${res['middle_row']['no_of_students_in_the_class']}</p></div>
                
                
                
            </div>
           
           
        
        </div>
    </div>
    <div class="result_body table-responsive">
        <table class="table1">
            <thead>
                <tr style="text-transform: uppercase">
                <th style="width:23%;text-align: center;vertical-align: middle" colspan="3" >Subject</th>
                <th style="text-align: center;vertical-align: middle;min-width: 30px" colspan="3">Cont. Assessment</th>
                <th style="text-align: center;vertical-align: middle">Exam</th>
                <th style="text-align: center;vertical-align: middle">Total</th>
                <th style="text-align: center;vertical-align: middle">Grade</th>
                <th style="text-align: center;vertical-align: middle">Position</th>
                <th style="text-align: center;vertical-align: middle">Comment</th>
                    </tr>
                </thead>
            <tbody>
                <tr style="text-align: center">
                <td colspan="3"></td>
                <td>1st CA<br>10</td>
                 <td>2nd CA<br>10</td>
                  <td>3rd CA<br>10</td>
                    <td>70</td>
                    <td>100</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>`;
            let partTwo = ``;
            for (let n in res['mainSubjects']) {
                partTwo += `   <tr>
                    <td colspan="3">${res['mainSubjects'][n]['subjectID']}</td>
                     <td style="text-align: center;vertical-align: middle">${res['mainSubjects'][n]['firstCA']}</td>
                     <td style="text-align: center;vertical-align: middle">${res['mainSubjects'][n]['secondCA']}</td>
                     <td style="text-align: center;vertical-align: middle">${res['mainSubjects'][n]['thirdCA']}</td>
                     <td style="text-align: center;vertical-align: middle">${res['mainSubjects'][n]['exams']}</td>
                     <td style="text-align: center;vertical-align: middle">${res['mainSubjects'][n]['total']}</td>
                    <td style="text-align: center;vertical-align: middle">${res['mainSubjects'][n]['grade']}</td>
                    <td style="text-align: center;vertical-align: middle">${res['mainSubjects'][n]['subjectPosition']}</td>
                    <td style="text-align: center;vertical-align: middle">${res['mainSubjects'][n]['remark']}</td>
                </tr>`
            }

            let partThree = ``;
            for (let i in res['cs_Subjects']) {
                partThree += `  <tr>
                    <td colspan="3">${res['cs_Subjects'][i]['cs_ID']}</td>
                    <td style="text-align: center;vertical-align: middle" colspan="3"> ${Number(res['cs_Subjects'][i]['firstCA']) + Number(res['cs_Subjects'][i]['secondCA']) + Number(res['cs_Subjects'][i]['thirdCA'])}</td>
                     <td style="text-align: center;vertical-align: middle">${res['cs_Subjects'][i]['exams']}</td>
                     <td style="text-align: center;vertical-align: middle">${res['cs_Subjects'][i]['total']}</td>
                    <td style="text-align: center;vertical-align: middle">${res['cs_Subjects'][i]['grade']}</td>
                    <td style="text-align: center;vertical-align: middle">${res['cs_Subjects'][i]['position']}</td>
                    <td style="text-align: center;vertical-align: middle">${res['cs_Subjects'][i]['remark']}</td>
                     
                </tr>`;
            }
            let partFour = `
<tr><td colspan="11" style="text-align:center;font-weight:bolder">KEY INTERPRETATIONOF VARIOUS GRADES</td></tr>
<tr style="text-align:center">
    <td></td>
                <td>(0-39) F9(Fail)</td>
                <td>(40-44) E8(Pass)</td>
                <td>(45-49) D7(Pass)</td>
                <td>(50-54) C6(Credit)</td>
                <td>(55-59) C5(Credit)</td>
                <td>(60-64) C4(Credit)</td>
                <td>(65-69) B3(Good)</td>
                <td>(70-74) B2(V.Good)</td>
                <td>(75-100) A(Excellent)</td>
                <td></td>
                    </tr>
                <tr><td colspan="11"></td></tr>
                
                <tr style="text-align:center;font-weight:bolder">
            <td colspan="3">AFFECTIVE AREAS</td>
                <td>GRADE</td>
                    <td colspan="2"></td>
                <td colspan="3">PSYCHOMOTOR SKILLS RATING</td>
                <td>GRADE</td>
                    <td></td>
            </tr>
                <tr><td colspan="3">PUNCTUALITY</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3" style="padding-left:4px">HANDWRITING</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">NEATNESS</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3" style="padding-left:4px">GAMES/SPORT</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">CLASS ATTENTION</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3" style="padding-left:4px">ORATORY</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">CLASS PARTICIPATION</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3" style="padding-left:4px">CREATIVITY</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">FRIENDLINESS</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3" style="padding-left:4px">PERFOMING ARTS</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">HONESTY</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">SELF CONTROL</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">INDUSTRY</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">POLITENESS</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="text-align: center;font-weight:bolder;"><td colspan="11">KEY TO RATING: (OT = OBSERVABALE TRAITS)</td></tr>
                
                <tr style="text-align: left;">
                <td colspan="3"> 5 - Maintains an excellent degree of OT</td>
                    <td colspan="2" style="padding-left:4px"> 4 - Maintain high level of OT</td>
                    <td colspan="2" style="padding-left:4px"> 3 - Acceptable level of OT</td>
                    <td colspan="2" style="padding-left:4px"> 2 - Shows minimal regard for OT</td>
                    <td colspan="2" style="padding-left:3px"> 1 - Has no regard for OT</td>
                    
                </tr>
                <tr>
                <td colspan="8">
                    <b>
                        Form Teacher's Remark:..............................................................................................................................................................</b>
                    <td colspan="3" style="padding-left:4px;"><b>Sign/Date:......................................................</b></td>
                </tr>
                
                <tr>
                <td colspan="8">
                    <b>
                        Head Teacher's Remark:.............................................................................................................................................................
                        
                        </b>
                    <td colspan="3" style="padding-left:4px;"><b>Sign/Date:......................................................</b></td>
                </tr>
            
            </tbody>
        </table>
    </div>
    <div class="result_footer">
        
    </div>
    </div>`;
            return partOne + partTwo + partThree + partFour;

        });
        $('#result').modal('show');
    }

});