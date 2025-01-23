<!--1) Ejercicio01.php - 
Crea un formulario que permita gesƟonar la canƟdad de refresco o
leche que hay en un supermercado. (2 puntos)
a) Se debe mantener el nombre del trabajador que está uƟlizando la aplicación.
b) Se debe poder añadir y quitar leche o refresco seleccionando de una lista
c) Se debe controlar que no se pueden quitar mas unidades de las que haya, en ese
caso mostrar error.
 -->

 <?php
// when user click on a button(if form POST has been submitted )
        // get data from form

        // save worker data
        // detect button

        //detect button
            // to add products
                //evaluate product
                // add quantity to corresponding product

            //to remove products
                //evaluate product
                // check if quantity is not greater than current one
                // substract from quantity to corresponding product


session_start(); 
 // Procesar el formulario si se envía
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedDrink = $_POST['drink'] ?? 'None';
    
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quantity = $_POST['quantity'] ?? 1; // Valor por defecto si no se recibe ninguno
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

    <h2 style="text-align:center">Choose product:</h2>

<form method="post" action="" style="text-align:center">
        
        <select name="drink" id="drink">
            <option value="soft_drink">Soft Drink</option>
            <option value="milk">milk</option>
        </select>
        <button type="submit">Submit</button>
    </form>
    <h2 style="text-align:center">Product quantity:</h2>

    <form method="post" action="" style="text-align:center">

        <input type="number" id="quantity" name="quantity" min="1" max="100" value="1" required>
        <button type="submit">Submit</button>
    </form>
<br>
     <div class="buttons">
    <button type="button">add</button>
    
    <button type="button">remove</button>
    <button type="button">reset</button>
    </div>
    <h2 style="text-align:center">Inventary:</h2>
    
<!-- form with 3 buttons -->
<!-- list values worjer,milk,softdrink... -->
 </body>

 </html>