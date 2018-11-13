<?php
    $fechaCierre = "F. Cierre:";
    $fechaAnulacion = "F. Anulacion:";
?>
                        
<html>
    <head>
        <title>PDF</title>
        <link href="../Assets/pdf/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        
    </head>
    <body>
        <div class="container">
            <table class="table">
                <tr>
                    <td>
                       
                    </td>
                </tr>
                <tr class="table-active">
                    <td style="width: 10%;">
                        <strong>Nro Orden:</strong> 
                    </td>
                    <td>OR25641</td>
                    <td>
                        <strong>F. Registro:</strong>
                    </td>
                    <td>
                        <strong>
                            <?= $fechaCierre;?>
                        </strong>
                        
                    </td>
                </tr>
            </table>
            <table class="table">
                <tr>
                    <td style="width: 15%;">
                        <strong>Propietario:</strong>
                    </td>
                    <td>
                        Jesus Arrieche
                    </td>
                </tr>
            </table>
      
        </div>
    </body>
</html>
