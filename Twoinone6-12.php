<html>
<head>
    <title>การสร้างฟอร์มในการรับค่าเพื่อการตาราง</title>
    <script>
        function validateTableInput() {
            let row = document.forms["tableForm"]["row"].value;
            let column = document.forms["tableForm"]["column"].value;

            if (isNaN(row) || row <= 0) {
                alert("กรุณากรอกจำนวนแถวเป็นตัวเลขที่มากกว่า 0");
                return false;
            }
            if (isNaN(column) || column <= 0) {
                alert("กรุณากรอกจำนวนคอลัมน์เป็นตัวเลขที่มากกว่า 0");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<form name="tableForm" method="post" onsubmit="return validateTableInput()">
    <table border="1" align="center" width="400">
        <tr>
            <td colspan="2" align="center">
                <big>ทดสอบการใช้ Control Structure</big>
            </td>
        </tr>
        <tr>
            <td align="right">Enter row:</td>
            <td><input type="text" name="row" size="15" /></td>
        </tr>
        <tr>
            <td align="right">Enter column:</td>
            <td><input type="text" name="column" size="15" /></td>
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
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['row']) && isset($_POST['column'])) {
    $row = $_POST['row'];
    $column = $_POST['column'];

    if (is_numeric($row) && is_numeric($column) && $row > 0 && $column > 0) {
        $rowMax = intval($row);
        $colMax = intval($column);

        echo "<table align='center' border='4' width='300'>";
        for ($r = 1; $r <= $rowMax; $r++) {
            echo "<tr>";
            for ($c = 1; $c <= $colMax; $c++) {
                if ($r == $c) {
                    echo "<td align='center'><font color='#33ff66'>";
                    echo "$r,$c</font></td>";
                } else {
                    echo "<td align='center'> $r,$c </td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color:red;text-align:center;'>กรุณากรอกตัวเลขที่ถูกต้องสำหรับแถวและคอลัมน์</p>";
    }
}
?>
</body>
</html>
