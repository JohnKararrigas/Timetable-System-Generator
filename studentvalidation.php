<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    
    <title>PROGRAM GENERATOR</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <script type="text/javascript" src="assets/jsPDF/dist/jspdf.min.js"></script>
    <script type="text/javascript" src="assets/js/html2canvas.js"></script>
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FONT AWESOME CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- FLEXSLIDER CSS -->
    <link href="assets/css/flexslider.css" rel="stylesheet"/>
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet"/>

</head>
<body>
<br>
<style>
    table {
        margin-top: 20px;
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 2px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #ffffff;
    }

    tr:nth-child(odd) {
        background-color: #ffffff;
    }
</style>
<div id="TT" style="background-color: #FFFFFF">
    <table border="2" cellspacing="3" align="center" id="timetable">
        <caption>
            <strong><br><br>
                <?php
                if (isset($_POST['select_semester'])) {
                    echo "SEMESTER " . $_POST['select_semester'] . " "; 
                    $year = (int)($_POST['select_semester'] / 2) + $_POST['select_semester'] % 2;
                    $r = mysqli_fetch_assoc(mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), "SELECT * from classrooms
                                WHERE status = '$year'"));
                    echo " ( " . $r['name'], " ) ";
                }
                ?>
            </strong>
        </caption>
        <tr>
        <td style="text-align:center">WEEKDAYS</td>
                <td style="text-align:center">8:00-10:00</td>
                <td style="text-align:center">10:00-12:00</td>
                <td style="text-align:center">12:00-1:00</td>
                <td style="text-align:center">1:00-2:00</td>
                <td style="text-align:center">2:00-3:00</td>
                <td style="text-align:center">3:00-5:00</td>
                <td style="text-align:center">5:00-8:00</td>
        </tr>
        <tr>
            <?php
            $table = null;
            if (isset($_POST['select_semester'])) {
                $table = " semester" . $_POST['select_semester'] . " ";
            } else
                echo '</table>';
            if (isset($_POST['select_semester']) && $_POST['select_semester'] % 2 !== 0) {
                $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
                    "SELECT * FROM" . $table);
                $qq = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
                    "SELECT * FROM subjects");
                $days = array('MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY'); 
                $i = -1;
                $str = "<br>";
                if (isset($_POST['select_semester'])) {
                    while ($r = mysqli_fetch_assoc($qq)) {
                        if ($r['isAlloted'] == 1 && $r['semester'] == $_POST['select_semester']) {
                            $str .= $r['subject_code'] . ": " . $r['subject_name'] . " ";
                            if (isset($r['allotedto'])) {
                                $id = $r['allotedto'];
                                $qqq = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
                                    "SELECT * FROM teachers WHERE faculty_number = '$id'");
                                $rr = mysqli_fetch_assoc($qqq);
                                $str .= " " . $rr['alias'] . ": " . $rr['name'] . " ";
                            }
                            if ($r['course_type'] !== "LAB") {
                                $str .= "<br>";
                                continue;
                            } else {
                                $str .= ", ";
                            }
                            
                        }
                    }
                }
                while ($row = mysqli_fetch_assoc($q)) {                                          //problem with semester 4,6,8
                    $i++;
                    echo "
                 <tr><td style=\"text-align:center\">$days[$i]</td>
                 <td style=\"text-align:center\">{$row['period1']}</td>
                <td style=\"text-align:center\">{$row['period2']}</td>
                <td style=\"text-align:center\">{$row['period3']}</td>
                 <td style=\"text-align:center\">{$row['period4']}</td>
                  <td style=\"text-align:center\">{$row['period5']}</td>
                  <td style=\"text-align:center\">LUNCH BREAK</td>
                  <td style=\"text-align:center\">{$row['period6']}</td>
                </tr>\n";
                }
                echo '</table>';
                if (isset($_POST['select_semester'])) {
                    echo "<div align=\"center\">" . "<br>" . $str . "<br>
                            </div>";
                }
                unset($_GET['generated']);
            } else {
                header("location:index.php?generated=false");

            }
            ?>
</div>

</body>
</html>