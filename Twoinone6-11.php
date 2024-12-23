<html>
<head>
    <title>การคำนวณเกรด</title>
    <script>
        function validateForm() {
            let hw = document.forms["gradeForm"]["hw"].value;
            let midterm = document.forms["gradeForm"]["midterm"].value;
            let final = document.forms["gradeForm"]["final"].value;

            if (isNaN(hw) || hw < 0 || hw > 30) {
                alert("กรุณากรอกคะแนน Homework ระหว่าง 0-30");
                return false;
            }
            if (isNaN(midterm) || midterm < 0 || midterm > 35) {
                alert("กรุณากรอกคะแนน Midterm ระหว่าง 0-35");
                return false;
            }
            if (isNaN(final) || final < 0 || final > 35) {
                alert("กรุณากรอกคะแนน Final ระหว่าง 0-35");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<form name="gradeForm" method="get" onsubmit="return validateForm()">
    <table border="1" align="center" width="500">
        <tr>
            <td colspan="2" align="center">
                <big>การคำนวณเกรด</big>
            </td>
        </tr>
        <tr>
            <td>Enter Homework (0-30):</td>
            <td><input type="text" name="hw" size="15" /></td>
        </tr>
        <tr>
            <td>Enter Midterm (0-35):</td>
            <td><input type="text" name="midterm" size="15" /></td>
        </tr>
        <tr>
            <td>Enter Final (0-35):</td>
            <td><input type="text" name="final" size="15" /></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="OK" />
                <input type="reset" value="Clear" />
            </td>
        </tr>
    </table>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['hw']) && isset($_GET['midterm']) && isset($_GET['final'])) {
    $hw = $_GET['hw'];
    $midterm = $_GET['midterm'];
    $final = $_GET['final'];

    if (!is_numeric($hw) || $hw < 0 || $hw > 30 || !is_numeric($midterm) || $midterm < 0 || $midterm > 35 || !is_numeric($final) || $final < 0 || $final > 35) {
        echo "<p style='color:red;text-align:center;'>Invalid input. Please ensure all scores are within their respective ranges.</p>";
    } else {
        echo "<p><b>ข้อมูลคะแนน</b><br />";
        echo "Homework: <i>$hw</i><br />";
        echo "Midterm: <i>$midterm</i><br />";
        echo "Final: <i>$final</i><br />";

        $total = $hw + $midterm + $final;
        echo "Total Score: $total<br />";

        if ($total >= 80) {
            echo "Result Grade: A<br />";
        } elseif ($total >= 75) {
            echo "Result Grade: B+<br />";
        } elseif ($total >= 70) {
            echo "Result Grade: B<br />";
        } elseif ($total >= 65) {
            echo "Result Grade: C+<br />";
        } elseif ($total >= 60) {
            echo "Result Grade: C<br />";
        } elseif ($total >= 55) {
            echo "Result Grade: D+<br />";
        } elseif ($total >= 50) {
            echo "Result Grade: D<br />";
        } else {
            echo "Result Grade: F<br />";
        }

        echo "<br /><a href=''> <big>Back</big></a></p>";
    }
}
?>
</body>
</html>
