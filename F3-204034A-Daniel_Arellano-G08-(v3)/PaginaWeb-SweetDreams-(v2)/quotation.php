<!DOCTYPE html>
<html lang="es">
<?php include("head.php"); ?>
<body>
  <div class="container">
    <?php include("header.php"); ?>
    <?php include("navbar.php"); ?>
    <article class="content">
    <h2>Cotizacion SweetDreams</h2>
    <form action="generate.php" method="POST" role="form" enctype="multipart/form-data">
        <fieldset>
            <legend>Información Cliente</legend>
            <label for="fname">Nombre: <input type="text" id="fname" name="fname" placeholder="Pepito"></label>
            <label for="lname">Apellido: <input type="text" id="lname" name="lname" placeholder="Perez"></label><br>
            <input type="radio" id="newCustomer" name="customerAge" checked="checked" value="new">
            <label for="lname">Nuevo Cliente</label><br>
            <input type="radio" id="oldCustomer" name="customerAge" value="old">
            <label for="lname">Cliente Antiguo</label><br>

        </fieldset>
        <fieldset>
            <legend>Tipo de servicio</legend>
            <input type="checkbox" name="single" id="single" >
            <label for="single">Sencilla</label><br>
            <input type="checkbox" name="double" id="double">
            <label for="double">Doble</label><br>
            <input type="checkbox" name="triple" id="triple">
            <label for="triple">Triple</label><br>
            <input type="checkbox" name="suite" id="suite">
            <label for="suite">Suite</label><br>
            <input type="checkbox" name="salon" id="salon">
            <label for="salon">Salon de eventos</label><br>
        </fieldset>
        <fieldset>
            <legend>Fecha Reservacion</legend>
            <input type="date" id="startDate" name="startDate" value="<?php echo date('Y-m-d') ?>" required>
            <label for="startDate">Fecha Inicio</label><br>
            <input type="date" id="endDate" name="endDate" value="" required>
            <label for="endDate">Fecha Salida</label><br>
        </fieldset>
        <input type="submit" name="calc_quotation" value="Cotizar">
    </form>
    <p><?php $msg_form ?></p>
    </article>
    <?php include("aside.php"); ?>
    <?php include("footer.php"); ?>
  </div>
</body>

</html>