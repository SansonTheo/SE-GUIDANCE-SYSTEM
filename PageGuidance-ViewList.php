<!DOCTYPE html>
<?php include "server.php"; ?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/guidance.css">
        <link rel="stylesheet" type="text/css" href="css/profiling.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    </head>
    <body style="min-width: 500px;">
        <div class="title-bar">
            <div class="btn-toggle-nav p-0"  onclick="toggleNav()"><img src="imgs/icon-menu.png" style="height:80%; width:80%;"></div>
            <div class="seal-container"><img src="imgs/wmsu-seal.png"></div>
            <div>View Session</div>
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
            <div class="main-window">
                <div class="window-content" style="flex-direction: column; height:90%; padding:5px;">
                    <div class="sort-buttons">
                        <div>
                            Search by:
                        </div>
                        <div>
                            <span>
                                <input type="text" id="search-student-name" name="search-student-name" placeholder="Student Name. . ." class="search">
                                <input type="text" id="search-counselor-name" name="search-counselor-name" placeholder="Counselor Name. . ." class="search">
                            </span>
                        </div>
                        <div>
                            <span>
                                <input type="text" id="search-date" name="search-date" placeholder="Date. . ." class="search">
                                <input type="text" id="search-teacher-name" name="search-teacher-name" placeholder="Teacher Name. . ." class="search"> &nbsp;
                                <button onclick="searchSession()" class="form-nav-button" style="width:20%; height:30px; border-radius: 10px;">Search</button>
                            </span>
                        </div>
                    </div>
                    <div class="list-window">
                        <table class="list-table" id="session-table" name="session-table">
                            <tr>
                                <td class="date list-label">
                                    Date
                                </td>
                                <td class="time list-label">
                                    Time
                                </td>
                                <td class="counselor list-label">
                                    Counselor
                                </td>
                                <td class="student list-label">
                                    Student(s)
                                </td>
                                <td class="teacher list-label">
                                    Teacher(s)
                                </td>
                                <td class="status list-label">
                                    Status
                                </td>
                            </tr>
                            <?php
                                $record = mysqli_query($link,"SELECT * FROM session");
                                while($session=mysqli_fetch_array($record)):
                                    $sessionid = $session['id'];
                            ?>
                            <tr class="entry" name="entry">
                                <td style="display:none;"><?php echo $session['id']?></td>
                                <td class="date">
                                    <?php echo $session['date']; ?>
                                </td>
                                <td class="time">
                                    <?php echo $session['time']; ?>
                                </td>
                                <?php
                                    $counselorId = $session['counselorid'];
                                    $counselorList = mysqli_query($link,"SELECT * FROM counselor WHERE id=$counselorId");
                                    $counselor = mysqli_fetch_array($counselorList);
                                ?>
                                <td class="counselor">
                                    <?php echo $counselor['firstname']." ".$counselor['lastname']; ?>
                                </td>
                                <?php
                                    $studentRecordQuery = "SELECT * FROM sessionrecord WHERE type='Student' AND sessionid=$sessionid";
                                    $studentRecordList = $link->query($studentRecordQuery);
                                    if ($studentRecordList->num_rows > 0) {
                                ?>
                                <td class="student">
                                    <?php while($studentRecord = mysqli_fetch_array($studentRecordList)):
                                        $currentStudentRecordId = $studentRecord['involvedid'];
                                        $studentEditQuery = "SELECT * FROM student WHERE id=$currentStudentRecordId";
                                        $studentEditList = $link->query($studentEditQuery);
                                        if($studentEdit = mysqli_fetch_array($studentEditList)){
                                            echo $studentEdit['firstname']." ".$studentEdit['lastname'];
                                        }
                                    endwhile; ?>
                                </td>
                                <?php
                                        
                                    }
                                    else{ ?>
                                    <td></td>    
                                    <?php
                                    }
                                ?>
                                <?php
                                    $teacherRecordQuery = "SELECT * FROM sessionrecord WHERE type='Teacher' AND sessionid=$sessionid";
                                    $teacherRecordList = $link->query($teacherRecordQuery);
                                    if ($teacherRecordList->num_rows > 0) {
                                        $l = 0;
                                        
                                            
                                ?>
                                <td class="teacher">
                                    <?php while($teacherRecord = mysqli_fetch_array($teacherRecordList)):
                                        $currentTeacherRecordId = $teacherRecord['involvedid'];
                                        $teacherEditQuery = "SELECT * FROM teacher WHERE id=$currentTeacherRecordId";
                                        $teacherEditList = $link->query($teacherEditQuery);
                                        if($teacherEdit = mysqli_fetch_array($teacherEditList)){
                                            echo $teacherEdit['firstname']." ".$teacherEdit['lastname'];
                                        }
                                    endwhile; ?>
                                </td>
                                <?php
                                        
                                    }
                                    else{ ?>
                                    <td></td>    
                                    <?php
                                    }
                                ?>
                                <td class="status">
                                    <?php
                                        date_default_timezone_set('Asia/Singapore');
                                        $currentDate = strtotime(date("Y-m-d"));
                                        $currentTime = strtotime(date('h:i:s'));
                                        if(strtotime($session['date']) > $currentDate){
                                            echo 'Upcoming';
                                        }
                                        else if(strtotime($session['date']) == $currentDate && strtotime($session['time']) > $currentTime){
                                            echo 'Upcoming Today';
                                        }
                                        else{
                                            echo 'Finished';
                                        }
                                    ?>
                                    
                                </td>
                            </tr>
                            <?php
                                endwhile;
                            ?>
                        </table>
                    </div>
                    <div class="list-button">
                        <div style="flex:50%;"></div>
                        <button class="form-nav-button" id="return">Cancel</button>
                        <div style="width:5px;"></div>
                        <button class="form-nav-button" id="ViewSession">View</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
        <script>
            document.getElementById('return').onclick = function(){
                window.location.href = "PageGuidance-Index.php";
            }
            let value=null;
            $("tr[name='entry']").click(function select(){
                $(this).addClass('selected').siblings().removeClass('selected');    
                value = $(this).find('td:first').html();
                return value;
            });

            if(document.getElementById('ViewSession')!=null){
                var viewButton = document.getElementById('ViewSession');
                viewButton.onclick = function URL() {
                    if(value!=null){
                        window.location.href = 'PageGuidance-View.php?id='+value;
                    }
                    else{
                        alert("No Session Selected!");
                    }
                };
            }

            function searchSession(){
                let counselorFilter = document.getElementById("search-counselor-name").value.toUpperCase();
                let studentFilter = document.getElementById("search-student-name").value.toUpperCase();
                let dateFilter = document.getElementById("search-date").value.toUpperCase();
                let teacherFilter = document.getElementById("search-teacher-name").value.toUpperCase();

                let sessionTable = document.getElementById("session-table");
                let sessionTr = sessionTable.getElementsByTagName("tr");
                
                for (i = 0; i < sessionTr.length; i++) {     
                    if(sessionTr[i].classList.contains("entry")){
                        let tdCounselorName = sessionTr[i].getElementsByTagName("td")[3];
                        let tdStudentName = sessionTr[i].getElementsByTagName("td")[4];
                        let tdDate = sessionTr[i].getElementsByTagName("td")[1];
                        let tdTeacherName = sessionTr[i].getElementsByTagName("td")[5];
                        if (tdCounselorName) {
                            let counselorTxtValue = tdCounselorName.textContent || tdCounselorName.innerText;
                            let studentTxtValue = tdStudentName.textContent || tdStudentName.innerText;
                            let dateTxtValue = tdDate.textContent || tdDate.innerText;
                            let teacherTxtValue = tdTeacherName.textContent || tdTeacherName.innerText;
                            if (counselorTxtValue.toUpperCase().indexOf(counselorFilter) > -1 && studentTxtValue.toUpperCase().indexOf(studentFilter) > -1 && dateTxtValue.toUpperCase().indexOf(dateFilter) > -1 && teacherTxtValue.toUpperCase().indexOf(teacherFilter) > -1) {
                                sessionTr[i].style.display = "table-row";
                            } else {
                                sessionTr[i].style.display = "none";
                            }
                        } 
                    }      
                }
            }
        </script>
    </body>
</html>