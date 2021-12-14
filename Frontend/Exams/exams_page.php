<!--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../_css/exam.css" type="text/css">
    <title> Paper One </title>
</head>

<body>



    <div class="container">

        <form class="exam form col-12" role="form">

            <h2 class="paper-type col-lg-6 col-md-8 col-sm-10">

            </h2>
            <p class="instruction"><u>Instruction:</u><i> Answer all question in this section. All questions carries equal marks.</i></p>

            <div class="page col-12">
                <ol class="question-container col-12">


                    echo '<div class="radio">
                        <label class="answer-text control-label radio-inline col-12" for="opt-A">A&nbsp;<input class="option-btn" type="radio" name="optradio" id="opt-A">'.' '.$optionA.'</label>
                    </div>
                    <div class="radio">
                        <label class="answer-text control-label radio-inline col-12" for="opt-B">B&nbsp;<input class="option-btn" type="radio" name="optradio" id="opt-B">'.' '.$optionB.'</label>
                    </div>
                    <div class="radio">
                        <label class="answer-text control-label col-12" for="opt-C">C&nbsp;<input class="option-btn" type="radio" name="optradio" id="opt-C">'.' '.$optionC.'</label>
                    </div>
                    <div class="radio">
                        <label class="answer-text control-label col-12" for="opt-D">D&nbsp;<input class="option-btn" type="radio" name="optradio" id="opt-D">'.' '.$optionD.'</label>
                    </div>';
                    if($optionE !=''){
                        echo '<div class="radio">
                        <label class="answer-text control-label col-12" for="opt-E">E&nbsp;<input class="option-btn" type="radio" name="optradio" id="opt-E">'.' '.$optionE.'</label>
                    </div>';
                    }
                echo '</li>';
                     echo '</div>';
                     
                }
                
                ?>

                </ol>

            </div>
            <div class="btnContainer">
                <button type="button" class="previous btn btn-default col-3" id="previous">Previous</button>
                <span></span>
                <button type="button" class="next btn btn-default col-3" id="next">Next</button>
            </div>



        </form>

    </div>





    <script src="../_js/jquery-3.5.1.js" type="application/javascript"></script>
    <script src="../js/bootstrap.min.js" type="application/javascript"></script>

</body>

</html>-->