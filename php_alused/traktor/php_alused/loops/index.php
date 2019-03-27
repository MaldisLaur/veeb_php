<!DOCTYPE html>
<html lang="et">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Arvud</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
              crossorigin="anonymous">
    </head>
    <body>
        <div class="container text-center">
            <!-- tabel -->
            <table class="table">
                <!-- tabeli header -->
                <thead>
                <tr>
                    <th>arv</th>
                    <th>paaris</th>
                    <th>paaritu</th>
                    <th>algarv</th>
                </tr>
                </thead>
                <tbody>
                <?php
                for($arv = 0; $arv <= 15; $arv++){
                    if($arv % 2 == 0) {
                        $kasPaaris = true;
                    } else {
                        $kasPaaris = false;
                    }
                    $jagaja = 2;
                    if($arv == 0 or $arv == 1) {
                        $kasAlgarv = true;
                    } else {
                        while ($arv % $jagaja != 0) $jagaja++;
                        if ($arv == $jagaja) {
                            $kasAlgarv = true;
                        } else {
                            $kasAlgarv = false;
                        }
                    }
                    echo '
                    <tr>
                        <td>'.$arv.'</td>
                        <td class="paaris">';
                        if($kasPaaris) {
                            echo '<i class="fas fa-angle-down"></i>';
                        }
                        echo '</td>';
                        echo '<td class="paaritu">';
                        if(!$kasPaaris) {
                            echo '<i class="fas fa-angle-down"></i>';
                        }
                        echo '</td>';
                        echo '<td class="algarv">';
                        if($kasAlgarv) {
                            echo '<i class="fas fa-angle-down"></i>';
                        }
                        echo '</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
<?php


