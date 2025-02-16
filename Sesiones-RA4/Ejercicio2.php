<?php
session_start();

if (isset($_SESSION['array'])) {
 
    $_SESSION['array'][] = [10,20,30];

}
if (isset($_POST['modify'])) {
    $position = $_POST['position'];
    $value = $_POST['value'];
}

if (isset($_SESSION['array'][$position])) {
    $_SESSION['array'][$position] = $value;
}else{
    echo "<p style='color:red;'>Error: No existe la posición.</p>";
}

if (isset($_POST['average'])) {
    $sum = array_sum($_SESSION['array']);
    $count = count($_SESSION['array']);
    $average = $sum / $count;
    echo "<p style='color:green;'>La media es: $average</p>";
}
if (isset($_POST['reset'])) {
    $_SESSION['array'] = [10,20,30];
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify</title>
</head>
<body>
    <h1>Modify array</h1>
    <form method="post">

    position: <input type="text" name="position" min="0" max="2" required><br>
    nuevo: <input type="number" name="value" required><br>
    <input type="submit" name="modify" value="Modify">
    <input type="submit" name="average" value="Average">
    <input type="submit" name="reset" value="Reset">

    </form>
    <h2>Array actual:</h2>
    <p><?php echo implode(',',$_SESSION['array']) ?></p>
    
</body>
</html>