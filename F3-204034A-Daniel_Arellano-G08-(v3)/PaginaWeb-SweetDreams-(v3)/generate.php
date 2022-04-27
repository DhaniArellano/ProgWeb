<?php

if (isset($_POST['calc_quotation'])) {
    $_fname = $_POST['fname'];
    $_lname = $_POST['lname'];
    $_customerAge = $_POST['customerAge'];
    $_startDate = $_POST['startDate'];
    $_endDate = $_POST['endDate'];

    $_single = $_POST['single'] ?? "";
    $_double = $_POST['double'] ?? "";
    $_triple = $_POST['triple'] ?? "";
    $_suite = $_POST['suite'] ?? "";
    $_salon = $_POST['salon'] ?? "";

    $services = 0;
    $datenow = date('d-m-Y');
    $date1 = date_create($_startDate);
    $date2 = date_create($_endDate);
    $diff = date_diff($date1, $date2);
    $days = $diff->format("%a");

    $single_cost = 0;
    $double_cost = 0;
    $triple_cost = 0;
    $suite_cost = 0; 
    $salon_cost = 0;

    $discount_services = 0;
    $discount_time = 0;
    $discount_days = 0;
    $discount_seniority = 0;
    $applies_seniority = "no";

    setlocale(LC_MONETARY,"es_CO");
    $sum_cost = 0;
    $total_discounts = 0;
    $iva = 0.19;
    $total = 0;
    $total_tax = 0;

    $single_requested = "no";
    $double_requested = "no";
    $triple_requested = "no";
    $suite_requested = "no";
    $salon_requested = "no";

    $msg_form = "";
    
    if ((empty($_single)) && (empty($_double)) && (empty($_triple)) && (empty($_suite)) && (empty($_salon))) {
        $msg_form = "Por favor seleccione al menos un servicio";
    } else {
        if ($date1 >= $date2) {
            $msg_form = "la fecha inicial no puede ser menor o igual que la fecha final";
        } else {
            if($days <= 1 || $days > 365){
                $msg_form = "El tiempo no puede ser mayor a 365 días";    
            }else {
                if (isset($_single) && !empty($_single)) {
                    $services = $services+1;
                    $single_cost = $days * 50000;
                    $single_requested = "si";
                }
                if (isset($_double) && !empty($_double)) {
                    $services = $services+1;
                    $double_cost = $days * 75000;
                    $double_requested = "si";
                }
                if (isset($_triple) && !empty($_triple)) {
                    $services = $services+1;
                    $triple_cost = $days * 100000;
                    $triple_requested = "si";
                }
                if (isset($_suite) && !empty($_suite)) {
                    $services = $services+1;
                    $suite_cost = $days * 300000;
                    $suite_requested = "si";
                }
                if (isset($_salon) && !empty($_salon)) {
                    $services = $services+1;
                    $salon_cost = $days * 3000000;
                    $salon_requested = "si";
                }
                //Daily discount
                if($days == 1){
                    $discount_days = 0;
                }
                //Weekly discount
                if($days >= 7 && $days <30){
                    $discount_days = 0.05;
                }
                //Monthly discount
                if($days >= 30 && $days <60){
                    $discount_days = 0.10;
                }
                //BiMonthly discount
                if($days >=60 && $days <180){
                    $discount_days = 0.15;
                }
                //SemiAnnual discount
                if($days >=180 && $days <365){
                    $discount_days = 0.20;
                }
                //Annual discount
                if($days == 365 ){
                    $discount_days = 0.30;
                }
                //Discount per number of services
                if($services == 1){
                    $discount_services = 0;
                }
                if($services == 2){
                    $discount_services = 0.06;
                }
                if($services == 3){
                    $discount_services = 0.12;
                }
                if($services == 4){
                    $discount_services = 0.18;
                }
                if($services >= 5){
                    $discount_services = 0.20;
                }
                //Discount per Customer Seniority
                if($_customerAge == "new"){
                    $discount_seniority = 0;
                }
                if($_customerAge == "old"){
                    $discount_seniority = 0.17;
                    $applies_seniority = "si";
                }
                $total_discounts = $discount_days + $discount_services + $discount_seniority;
                $sum_cost = $single_cost + $double_cost + $triple_cost + $suite_cost + $salon_cost;
                $total_tax = ($sum_cost * $iva) + $sum_cost;
                $total = $total_tax - ($total_tax * $total_discounts) ;
            }
        
        }
        
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <?php include("head.php"); ?>
<body>
  <div class="container">
    <?php include("header.php"); ?>
    <?php include("navbar.php"); ?>
    <article class="content">
        <h2 id="gen">Cotizacion SweetDreams</h2>
        <p class="error"><strong><?php echo $msg_form ?></strong></p>
        <h3>Resumen</h3>
        <p>Valor (inc. iva): $<?php echo(number_format($total_tax))?> </p>
        <p>Descuentos: $<?php echo(number_format($sum_cost * $iva))?></p>
        <p>Total a pagar: $<?php echo(number_format($total))?></p>
    <h3>Detalle Servicio</h3>
    <table>
        <tr>
            <th>Servicio</th>
            <th>Contratado</th>
            <th>Valor (sin iva)</th>
            <th>Valor (con iva)</th>
        </tr>
        <tr>
            <td>Habitación Sencilla</td>
            <td><?php echo ($single_requested) ?></td>
            <td><?php echo ($single_cost) ?></td>
            <td><?php echo ($single_cost * $iva) + $single_cost ?></td>
        </tr>
        <tr>
            <td>Habitación Doble</td>
            <td><?php echo ($double_requested) ?></td>
            <td><?php echo ($double_cost) ?></td>
            <td><?php echo ($double_cost * $iva) + $double_cost ?></td>
        </tr>
        <tr>
            <td>Habitación triple</td>
            <td><?php echo ($triple_requested) ?></td>
            <td><?php echo ($triple_cost) ?></td>
            <td><?php echo ($triple_cost * $iva) + $triple_cost ?></td>
        </tr>
        <tr>
            <td>Suite Presidencial</td>
            <td><?php echo ($suite_requested) ?></td>
            <td><?php echo ($suite_cost) ?></td>
            <td><?php echo ($suite_cost * $iva) + $suite_cost ?></td>
        </tr>
        <tr>
            <td>Salon de Eventos</td>
            <td><?php echo ($salon_requested) ?></td>
            <td><?php echo ($salon_cost) ?></td>
            <td><?php echo ($salon_cost * $iva) + $salon_cost ?></td>
        </tr>
        <tr>
            <td> Total </td>
            <td>-</td>
            <td><?php echo($sum_cost) ?></td>
            <td><?php echo($total_tax) ?></td>
        </tr>
        </table>
        <h3>Detalle Descuentos</h3>
        <table>
            <tr>
                <th>Descuento</th>
                <th>Concepto</th>
                <th>Porcentaje</th>
            </tr>
            <tr>
                <td>Descuento por tiempo</td>
                <td><?php echo($days." días") ?></td>
                <td><?php echo($discount_days *100 ."%") ?></td>
            </tr>
            <tr>
                <td>Descuento por servicios contratados</td>
                <td><?php echo($services." servicios") ?></td>
                <td><?php echo($discount_services *100 ."%") ?></td>
            </tr>
            <tr>
                <td>Descuento por antiguedad</td>
                <td><?php echo($applies_seniority) ?></td>
                <td><?php echo($discount_seniority *100 ."%") ?></td>
            </tr>
            <tr>
                <td>Total</td>
                <td></td>
                <td><?php echo($total_discounts*100 ."%") ?></td>
            </tr>
        </table>
    </article>
    <?php include("aside.php"); ?>
    <?php include("footer.php"); ?>
  </div>
</body>
</html>