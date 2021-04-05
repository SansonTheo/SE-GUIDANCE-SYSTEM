<!DOCTYPE html>
<?php include "server.php"?>

<?php
$placeholderName = "";
$placeholderDepartment = "";
$placeholderCollege = "";
$placeholderLevel = "";
if(isset($_POST['search']))
{
    $nameToSearch = $_POST['search-student-name'];
    $departmentToSearch = $_POST['search-department-name'];
    $collegeToSearch = $_POST['search-college-name'];
    $levelToSearch = $_POST['search-level'];
    $placeholderName = $nameToSearch;
    $placeholderDepartment = $departmentToSearch;
    $placeholderCollege = $collegeToSearch;
    $placeholderLevel = $levelToSearch;
    // search in all table columns
    // using concat mysql function
    $search_result = "SELECT * FROM student WHERE CONCAT(COALESCE(firstname,''),' ', COALESCE(middlename,''), ' ', COALESCE(lastname,'')) LIKE '%".$nameToSearch."%' AND department LIKE '%".$departmentToSearch."%' AND college LIKE '%".$collegeToSearch."%' AND level LIKE '%".$levelToSearch."%'";
}
else{
    $search_result = "SELECT * FROM student";
}

?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
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
                        <div style="font-size:25px;">
                            Search by:
                        </div>
                        <div>
                            <span style="white-space: nowrap;">
                                <form id="searchForm" action="PageStudentProfiling-ViewList.php" method="post">
                                    <input type="text" id="search-student-name" name="search-student-name" placeholder="Student Name. . ." class="search" style="width:15%;" value="<?php echo $placeholderName ?>">
                                    <input type="text" id="search-department-name" name="search-department-name" placeholder="Department. . ." class="search" style="width:15%;" value="<?php echo $placeholderDepartment ?>">
                                    <input type="checkbox" id="sort-sex" name="sort-sex" style="margin-left:1%;">
                                    <label style="margin-left:1%;" for="sort-sex">Sex</label>
                                    <input type="checkbox" id="sort-religion" name="sort-religion" style="margin-left:1%;">
                                    <label style="margin-left:1%;" for="sort-religion">Religion</label>
                                    <input type="checkbox" id="sort-sessions" name="sort-sesssions" style="margin-left:1%;">
                                    <label style="margin-left:1%;" for="sort-sessions">No. of Sessions</label>
                                </form>
                            </span>
                        </div>
                        <div>
                            <span>
                                <input form="searchForm" type="text" id="search-level" name="search-level" placeholder="Level. . ." class="search" style="width:15%;" value="<?php echo $placeholderLevel ?>">
                                <input form="searchForm" type="text" id="search-college-name" name="search-college-name" placeholder="College. . ." class="search" style="width:15%;" value="<?php echo $placeholderCollege ?>"> &nbsp;
                                <button form="searchForm" class="form-nav-button" type="submit" name="search" style="width:20%; height:30px; border-radius: 10px;">Search</button>
                                <button form="searchForm" class="form-nav-button" type="submit" name="clear" style="width:20%; height:30px; border-radius: 10px;">Clear</button>
                            </span>
                        </div>
                    </div>
                    <div class="list-window">
                        <table class="list-table">
                            <tr>
                                <td class="student-id list-label">
                                    ID
                                </td>
                                <td class="student-name list-label">
                                    Name
                                </td>
                                <td class="student-department list-label">
                                    Department
                                </td>
                                <td class="student-level list-label">
                                    Yr. Level
                                </td>
                                <td class="student-college list-label">
                                    College
                                </td>
                                <td class="student-sex list-label">
                                    Sex
                                </td>
                                <td class="student-religion list-label">
                                    Religion
                                </td>
                                <td class="student-sessions list-label">
                                    No. of Sessions
                                </td>
                            </tr>
                            <?php
                                    $searchResult = $link->query($search_result); 
                                    if ($searchResult->num_rows > 0) {
                                        while($row = mysqli_fetch_array($searchResult)): ?>

                            <tr name="entry">
                                <td style="display:none;"><?php echo $row['id']?></td>
                                <td class="student-id">
                                    <?php echo $row['studentid']; ?>
                                </td>
                                <td class="student-name">
                                    <?php $fullname = $row['firstname']." ".$row['middlename']." ".$row['lastname'];
                                          echo $fullname; ?>
                                </td>
                                <td class="student-department">
                                    <?php echo $row['department']; ?>
                                </td>
                                <td class="student-level">
                                    <?php echo $row['level']; ?>
                                </td>
                                <td class="student-college">
                                    <?php echo $row['college']; ?>
                                </td>
                                <td class="student-sex">
                                    <?php echo $row['sex']; ?>
                                </td>
                                <td class="student-religion">
                                    <?php echo $row['religion']; ?>
                                </td>
                                <td class="student-sessions">
                                    0
                                </td>
                                <?php 	    
                                        endwhile;
                                    }
                                    mysqli_close($link);?>
                            </tr>
                        </table>
                    </div>
                    <div class="list-button">
                        <div style="flex:50%;"></div>
                        <button id="return" class="form-nav-button">Cancel</button>
                        <div style="width:5px;"></div>
                        <button id="ViewStudent" class="form-nav-button">View</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
        <script src="js/profiling.js"></script>
        <script>
            document.getElementById('return').onclick = function(){
                window.location.href = "PageStudentProfiling-Index.html";
            }

            let value=null;
            $("tr[name='entry']").click(function select(){
                $(this).addClass('selected').siblings().removeClass('selected');    
                value = $(this).find('td:first').html();
                return value;
            });

            if(document.getElementById('ViewStudent')!=null){
                var viewButton = document.getElementById('ViewStudent');
                viewButton.onclick = function URL() {
                    if(value!=null){
                        window.location.href = 'PageStudentProfiling-View.php?id='+value;
                    }
                    else{
                        alert("No Student Selected!");
                    }
                };
            }
        </script>
    </body>
</html>