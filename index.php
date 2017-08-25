<?php
$file=fopen('roll.txt','r');

while(!feof($file)){
    
$alldata = fgets($file);
    $pair = explode(' ',$alldata);
    $roll[] = $pair[0];
    $mark[] = trim(preg_replace('/\s\s+/',' ',$pair[1]));   
}
fclose($file);

$average = array_sum($mark)/count($mark);
$star=0;
foreach ($mark as $result){
    if ($result >= 80){
        $star++;
    }
}

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Result Sheet</title>
        <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href="css/responsive.css" rel="stylesheet">
        <link type="text/css" href="style.css" rel="stylesheet">
    </head>

    <body>
        <header>
            <?php include'header.php'; ?>
        </header>
        <section class="work-fild">
            <div class="container">
                <div class="mywork">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="result-show">
                                <table class="table">
                                    <tr>
                                        <td>Average Score: </td>
                                        <td>
                                            <?php echo $average ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Start Mark Student: </td>
                                        <td>
                                            <?php echo $star ?>
                                        </td>
                                    </tr>                                    
                                </table>
                            </div>                            
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="roll">Roll Number</label>
                                    <input type="text" class="form-control" name="roll" id="roll" aria-describedby="emailHelp" placeholder="Enter Your Roll">
                                </div>
                                <div class="result-btn">
                                    <button type="submit" name="submit" class="btn btn-primary">Show Grade</button>
                                </div>
                                <br>
                                <table class="table">
                                    <tr>
                                        <td><h3>Grade Show:</h3> </td>
                                        <td>
                                            <?php
                                        if (isset($_POST['submit'])){
                                                if(in_array($_POST['roll'],$roll)){
                                                $student_id = array_search($_POST['roll'], $roll);
                                                if ($mark[$student_id] >= 80){
                                                echo "<h3>You Got A+</h3>";
                                                }
                                                else if($mark[$student_id] >= 70){
                                                echo "<h3>You Got A</h3>";
                                                }
                                                else if($mark[$student_id] >= 60){
                                                echo "<h3>You Got A-</h3>";
                                                }
                                                else if($mark[$student_id] >= 50){
                                                echo "<h3>You Got B</h3>";
                                                }
                                                else if($mark[$student_id] >= 40){
                                                echo "<h3>You Got C</h3>";
                                                }
                                                else if($mark[$student_id] >= 33){
                                                echo "<h3>You Got D</h3>";
                                                }
                                                else if($mark[$student_id] >= 0){
                                                echo "<h3>Your are Fail</h3>";
                                                }                                                
                                            }
                                            else
                                                {
                                                    echo "<h3>Roll Number Does't Match</h3>";
                                                }
                                        }
                                             ?>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <?php include'footer.php'; ?>
        </footer>



        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>

    </html>