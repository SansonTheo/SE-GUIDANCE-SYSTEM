<!DOCTYPE html>
<?php include "server.php"?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/guidance.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    </head>
    <body>
        <div class="title-bar">
            <div class="btn-toggle-nav p-0"  onclick="toggleNav()"><img src="imgs/icon-menu.png" style="height:80%; width:80%; border-radius: 0px;"></div>
            <div class="seal-container"><img src="imgs/wmsu-seal.png"></div>
            <div>Guidance Counseling</div>
        </div>
        <aside class="nav-sidebar">
            <ul>
                <li><span>menu</span></li>
                <li><a href="Page-Guidance-Index.php"><img src="imgs/icon-home.png">home</a></li>
                <li><a href="PageStudentProfiling-Index.html"><img src="imgs/icon-student.png">profiling index</a></li>
                <li><a href="PageGuidance-Index.php"><img src="imgs/icon-counseling.png">counseling index</a></li>
                <li><a href="Page-Login.php"><img src="imgs/icon-logout.png">logout</a></li>
            </ul>
        </aside>
        <div class="main-page">
            <div class="main-window" style="display:flex;">
                <div class="window-content" style="height:95%; width:90%; background-color:transparent; border:none; flex-direction:row; border-radius:0px; overflow:hidden;">
                    <div class="button-container" id="upcoming">
                        <div class="guidance-upcoming-container">
                            <div style="flex:15%; width:90%; color:white; margin-top:20px; display:flex; align-items: center; font-size:35px;">Upcoming Counseling</div>
                            <div class="upcoming-sessions-window">
                                <?php
                                    $record = mysqli_query($link,"SELECT * FROM session WHERE date >= CURRENT_DATE() AND date <= DATE_ADD(CURRENT_DATE(),INTERVAL 7 DAY)");
                                    while($session=mysqli_fetch_array($record)):
                                        $sessionid = $session['id'];
                                ?>
                                <div>
                                    <h4><?php echo date("l",strtotime($session['date']))." ".$session['date']; ?> 13/03/21</h1>
                                    <h5>Time: <?php echo $session['time']; ?> </h2>
                                    <?php
                                        $counselorId = $session['counselorid'];
                                        $counselorList = mysqli_query($link,"SELECT * FROM counselor WHERE id=$counselorId");
                                        $counselor = mysqli_fetch_array($counselorList);
                                    ?>
                                    <h5>Counselor: <?php echo $counselor['firstname']." ".$counselor['lastname'] ?></h2>
                                </div>
                                <?php
                                    endwhile;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="container w-100" style="flex:50%; height:100%;">
                        <div class="row h-50 m-0 align-items-center no-gutters guidance-button-container">
                            <div onclick="window.location='PageGuidance-Add.php';" class="col-5">
                                <img src="imgs/icon-addGuidance.png">
                                <p>Add Session</p>
                            </div>
                            <div onclick="window.location='PageGuidance-ViewList.php';" class="col-5 offset-1">
                                <img src="imgs/icon-deleteGuidance.png">
                                <p>Delete Session</p>
                            </div>
                        </div>
                        <div class="row h-50 m-0 align-items-center guidance-button-container">
                            <div onclick="window.location='PageGuidance-ViewList.php';" class="col-5">
                                <img src="imgs/icon-editGuidance.png">
                                <p>Edit Session</p>
                            </div>
                            <div onclick="window.location='PageGuidance-ViewList.php';" class="col-5 offset-1">
                                <img src="imgs/icon-viewGuidance.png">
                                <p>View Sessions</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
    </body>
</html>