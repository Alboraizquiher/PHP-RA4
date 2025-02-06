
 <!--1) Exercise1.php
 Create a form that allows you to manage the amount of soda or milk in a supermarket. (2 points)
a) The name of the worker using the application must be kept.
b) You must be able to add and remove milk or soda by selecting from a list
c) It must be controlled that more units cannot be removed than there are, in that
case show error.
 -->

 <?php
session_start();

if (isset($_POST['reset'])) {
    session_destroy();  //Eliminate all session data
    header("Location: Ejercicio1.php");  //Recharge the page to clean the values
    exit();
}

//Initialize session variables if they do not exist
if (!isset($_SESSION['worker'])) {
    $_SESSION['worker'] = '';
}
if (!isset($_SESSION['softDrink'])) {
    $_SESSION['softDrink'] = 0;
}
if (!isset($_SESSION['milk'])) {
    $_SESSION['milk'] = 0;
}

//send the form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $worker = $_POST['worker'];
    $product = $_POST['drink']; //corrects to "product"
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;

    //save the worker's name in the session
    $_SESSION['worker'] = $worker;

    //add products
    if (isset($_POST['add'])) {
        switch ($product) {
            case 'milk':
                $_SESSION['milk'] += $quantity;
                break;
            case 'soft_drink':
                $_SESSION['softDrink'] += $quantity;
                break;
            default:
                echo "<p style='color:red;'>Error: Producto no encontrado.</p>";
                break;
        }
    }

    //remove products
    if (isset($_POST['remove'])) {
        switch ($product) {
            case 'milk':
                if ($_SESSION['milk'] >= $quantity) {
                    $_SESSION['milk'] -= $quantity;
                } else {
                    echo "<p style='color:red;'>Error: No puedes eliminar más unidades de las que hay.</p>";
                }
                break;
            case 'soft_drink':
                if ($_SESSION['softDrink'] >= $quantity) {
                    $_SESSION['softDrink'] -= $quantity;
                } else {
                    echo "<p style='color:red;'>Error: No puedes eliminar más unidades de las que hay.</p>";
                }
                break;
            default:
                echo "<p style='color:red;'>Error: Producto no encontrado.</p>";
                break;
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Supermarket Management</title>
    <style>
        .buttons {
            margin-left: 45%;
            margin-right: 35%;
        }
        .buttons button {
            margin: 1px;
        }
    </style>
</head>

<body>
    <h1>Supermarket Management</h1>
    <form action="Ejercicio1.php" method="POST">
        <label for="worker">Worker name:</label>
        <input type="text" id="worker" name="worker" value="<?php echo $_SESSION['worker']; ?>"><br><br>

        <h2>Choose product:</h2>
        <select name="drink" id="drink">
            <option value="soft_drink">Soft Drink</option>
            <option value="milk">Milk</option>
        </select>

        <h2>Product quantity:</h2>
        <input type="number" id="quantity" name="quantity" min="1" required><br><br>

        <input type="submit" value="Add" name="add">
        <input type="submit" value="Remove" name="remove">
        
    </form>
    <form action="Ejercicio1.php" method="POST">
    <input type="submit" value="Reset" name="reset">
    </form>

    <h2>Inventory:</h2>
    <p>Worker: <?php echo $_SESSION['worker']; ?></p>
    <p>Units of Milk: <?php echo $_SESSION['milk']; ?></p>
    <p>Units of Soft Drink: <?php echo $_SESSION['softDrink']; ?></p>
</body>

</html>
