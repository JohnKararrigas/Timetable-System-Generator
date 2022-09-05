<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>

    <title>PROGRAM GENERATOR</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FONT AWESOME CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- FLEXSLIDER CSS -->
    <link href="assets/css/flexslider.css" rel="stylesheet"/>
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet"/>
    
</head>
<body>

<!-- here starts the navigation bar -->
<div class="navbar navbar-inverse navbar-fixed-top " id="menu">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="navbar-collapse collapse move-me">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="addteachers.php">ADD TEACHERS</a></li>
                <li><a href="addsubjects.php">ADD SUBJECTS</a></li>
                <li><a href="addclassrooms.php">ADD CLASSROOMS</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">ALLOTMENT
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href=allotsubjects.php>THEORY</a>
                        </li>
                        <li>
                            <a href=allotLab.php>LAB</a>
                        </li>
                        <li>
                            <a href=allotclasses.php>CLASSROOMS</a>
                        </li>
                    </ul>
                </li>
                <li><a href="generatetimetable.php">GENERATE TIMETABLE</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">LOGOUT</a></li>
            </ul>

        </div>
    </div>
</div>
<!--navigation bar ends-->
<br>
<form action="allotmentLabForm.php" method="post" style="margin-top: 100px">
    <div align="center">
        <select name="tobealloted" class="list-group-item">
            <?php
            include 'connection.php';
            $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
                "SELECT * FROM subjects WHERE course_type = 'LAB'");
            $row_count = mysqli_num_rows($q);
            if ($row_count) {
                $mystring = '
         <option selected disabled>Select Subject</option>';                                   //picks the subject
                while ($row = mysqli_fetch_assoc($q)) {
                    if ($row['isAlloted'] == 1)
                        continue;
                    $mystring .= '<option value="' . $row['subject_code'] . '">' . $row['subject_name'] . '</option>';
                }

                echo $mystring;
            }
            ?>
        </select>
    </div>
                                                       
    <div align="center" style="margin-top: 5px">
        <select name="toalloted" class="list-group-item">
            <?php
            include 'connection.php';

            $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
                "SELECT * FROM teachers ");
            $row_count = mysqli_num_rows($q);
            if ($row_count) {
                $mystring = '
         <option selected disabled>Select Teacher</option>';                                               //picks the teacher
                while ($row = mysqli_fetch_assoc($q)) {
                    $mystring .= '<option value="' . $row['faculty_number'] . '">' . $row['name'] . '</option>';
                }

                echo $mystring;
            }
            ?>
        </select>
    </div>

    </div>
    <div align="center" style="margin-top: 10px">
        <button type="submit" class="btn btn-success btn-lg">Allot</button>               <!--allot button-->
    </div>
</form>


<?php
include 'connection.php';
if (isset($_GET['name'])) {
    $id = $_GET['name'];
    $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
        "UPDATE subjects  SET isAlloted = '0' , allotedto = '' WHERE subject_code = '$id' ");   
}    
?>
<script>
    function deleteHandlersForPractical() {
        var table = document.getElementById("allotedpracticalstable");
        var rows = table.getElementsByTagName("tr");
        for (i = 0; i < rows.length; i++) {
            var currentRow = table.rows[i];                                           //delete function
                                                                                           
            var createDeleteHandler =
                function (row) {
                    return function () {
                        var cell = row.getElementsByTagName("td")[0];
                        var id = cell.innerHTML;                                               //pop up window for sure
                        var x;
                        if (confirm("Are You Sure?") == true) {
                            
                            window.location.href = "allotLab.php?name=" + id;
                        }

                    };
                };
            currentRow.cells[4].onclick = createDeleteHandler(currentRow);              
        }
    }
</script>
<style>
    table {
        margin-top: 70px;
        margin-bottom: 50px;
        font-family: arial, sans-serif;
        border-collapse: collapse;
        margin-left: 80px;
        width: 90%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<table id=allotedpracticalstable>
    <caption><strong>LAB ALLOTMENT</strong></caption>                        
    <tr>
        <th width="130">Subject Code</th>
        <th width=200>Subject Title</th>
        <th width="120">Teacher's ID</th>
        <th width="300">Teacher's Name</th>
        <th width="40">Action</th>
    </tr>
    <tbody>
    <?php
    include 'connection.php';
    $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),                                 //here becomes the allotation
        "SELECT * FROM subjects");

    while ($row = mysqli_fetch_assoc($q)) {                                
        if ($row['isAlloted'] == 0)
            continue;
        if (!($row['course_type'] == "LAB"))
            continue;
        $teacher_id1 = $row['allotedto'];
        
        $t1 = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
            "SELECT name FROM teachers WHERE faculty_number = '$teacher_id1'");
        $trow1 = mysqli_fetch_assoc($t1);
        
        echo "<tr><td>{$row['subject_code']}</td>
                    <td>{$row['subject_name']}</td>
                    <td>{$row['allotedto']}</td>
                    <td>{$trow1['name']}</td>
                    
                   <td>
                    <button>Delete</button></td>                              
                    </tr>\n";
    }
    echo "<script>deleteHandlersForPractical();</script>";
    ?>
    </tbody>
</table>

<!--some scripts-->
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/jquery.flexslider.js"></script>
<script src="assets/js/scrollReveal.js"></script>
<script src="assets/js/jquery.easing.min.js"></script>
<script src="assets/js/custom.js"></script>


</body>
</html>