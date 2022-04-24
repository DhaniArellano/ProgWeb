<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SweetDreams</title>
    <link href="styles.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Beau+Rivage&family=Hurricane&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anek+Bangla:wght@200&family=Beau+Rivage&family=Hurricane&display=swap" rel="stylesheet">
    <script languague="javascript">
      function mostrar(a) {
        cerrar();
        if(a==1){
          document.getElementById("mapaSan").style.display="";
        }
        if(a==2){
          document.getElementById("mapaCarta").style.display="";
        }
        if(a==3){
          document.getElementById("mapaMed").style.display="";
        }
        if(a==4){
          document.getElementById("mapaTun").style.display="";
        }
        if(a==5){
          document.getElementById("mapaCal").style.display="";
        }
      }
      
      function cerrar() {
        document.getElementById("mapaCarta").style.display="none";
        document.getElementById("mapaSan").style.display="none";
        document.getElementById("mapaMed").style.display="none";
        document.getElementById("mapaTun").style.display="none";
        document.getElementById("mapaCal").style.display="none";
      }
    </script>
  </head>