<!--1) Ejercicio01.php - 
Crea un formulario que permita gesƟonar la canƟdad de refresco o
leche que hay en un supermercado. (2 puntos)
a) Se debe mantener el nombre del trabajador que está uƟlizando la aplicación.
b) Se debe poder añadir y quitar leche o refresco seleccionando de una lista
c) Se debe controlar que no se pueden quitar mas unidades de las que haya, en ese
caso mostrar error.
 -->

 <?php
 session_start(); 
// when user click on a button(if form POST has been submitted )
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           // get data from form 
            $worker = $_POST['worker'] ;
             $product = $_POST['prodcut'];
             $quantity = $_POST['quantity'];
             
            
        // save worker data
        $_SESSION['worker'] = $worker; 
        // detect button
        // to add products
        if (isset($_POST['add'])) {
            //evaluate product
            switch ($product) {
                case 'milk':
                    $_SESSION['milk'] += $quantity;
                    break;
                
                case 'soft_drink':
                    $_SESSION['softDrink'] += $quantity;
                    break;
                default:
                    echo "product not found";
                    break;
            }
        }
        
            
                
            // add quantity to corresponding product

            if (isset($_POST['add'])) {
                switch ($product) {
                    case 'milk':
                        $_SESSION['milk']+=$quantity;
                        break;
                    case 'softDrink':
                        $_SESSION['softDrink']+=$quantity;
                        break;
                    default:
                        # code...
                        break;
                }

            //to remove products

        }elseif (isset($_POST['remove'])) {
 
            switch ($product) {
                case 'milk':
                    if ($_SESSION['milk'] - $quantity < 0) {
                        echo "<br> <font color= 'red'> <p> Error: It is impossible remove more quantity than we have in store.</p></dont>";
                    } else {
                        $_SESSION['milk'] -= $quantity;
                    }
                    break;
                case 'softDrink':
                    if ($_SESSION['softDrink'] - $quantity < 0) {
                        echo "<br> <font color= 'red'> <p> Error: It is impossible remove more quantity than we have in store.</p></dont>";
                    } else {
                        $_SESSION['softDrink'] -= $quantity;
                    }                        break;
                default:
                echo "<br> <font color= 'red'> <p> Error: Product not found.</p></dont>";
                    break;
            }
            }
}

//initialize session variables
if (!isset($_SESSION['worker'])) {
    $_SESSION['worker'] = '';
}
if (!isset($_SESSION['softDrink'])) {
    $_SESSION['softDrink'] = 0;
    
}
if (!isset($_SESSION['milk'])) {
    $_SESSION['milk'] = 0;
}
 



 ?>
 <!DOCTYPE html>
 <html>

 <head>

<title>Supermarket management</title>
<style>

.buttons{
    margin-left: 45%;
    margin-right: 35%;

}
.buttons button{
    margin: 1px;
}

</style>
 </head>

 <body>
    <h1 style="text-align:center">Supermarket management</h1>
    <form action="Ejercicio1.php" method="POST"></form>
    <Label for="worker"> Worker name:</Label>
    <input type="text" id="worker" name="worker" value="<?php echo isset($_POST['worker'])?$_POST['worker'] :''; ?>"><br><br>
    <h2 style="text-align:center">Choose product:</h2>
        <select name="drink" id="drink">
            <option value="soft_drink">Soft Drink</option>
            <option value="milk">milk</option>
        </select>
        

    <h2 style="text-align:center">Product quantity:</h2>

        <input type="number" id="quantity" name="quantity" min="1" ><br><br>
        <input type="submit" value="add" name="add">
        <input type="submit" value="remove" name="remove">
        <input type="reset" value="reset">>
    </form>

    <h2 style="text-align:center">Inventary:</h2>
    <p>worker: <?php echo isset($_SESSION['worker'])? $_SESSION['worker'] : '';?></ph>
    <p>units milk: <?php isset($_SESSION['milk'])? $_SESSION['milk'] : '';?></p>
    <p>units soft drink: <?php isset($_SESSION['softDrink'])? $_SESSION['softDrink'] : '';?></p>
<!-- form with 3 buttons -->
<!-- list values worjer,milk,softdrink... -->
 </body>

 </html>