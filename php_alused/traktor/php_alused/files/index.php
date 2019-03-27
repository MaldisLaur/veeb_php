<?php

function failiKontroll($failiNimi){
    if(file_exists($failiNimi) and is_file($failiNimi) and is_readable($failiNimi)){
        return true;
    }
    return false;
}

function loeFailist($failiNimi){
    $raamatud = array();
    $nimetused = array(
        'nimetus',
        'autor',
        'keel',
        'lk',
        'hind'
    );
    if(failiKontroll($failiNimi)){
        $fp = fopen($failiNimi, 'r');
        $raamat = array();
        while(!feof($fp)){
            $rida = fgets($fp);
            if(trim($rida) != ''){
                $raamat[] = $rida;
            } else {
                $raamat = array_combine($nimetused, $raamat);
                $raamatud[] = $raamat;
                $raamat = array();
            }
        }
        fclose($fp);
    }
    return $raamatud;
}

function tabeliPais($andmed){
    echo '<thead>';
    echo '<tr>';
    foreach ($andmed as $element){
        echo '<th>'.$element.'</th>';
    }
    echo '</tr>';
    echo '</thead>';
}

function tabeliRida($andmed){
    echo '<tr>';
    foreach ($andmed as $elemendiNimetus => $elemendiVaartus){
        echo '<td>'.$elemendiVaartus.'</td>';
    }
    echo '</tr>';
}

function tabel($andmed){
    echo '<table border="1">';
    tabeliPais(array_keys($andmed[0]));
    echo '<tbody>';
    foreach ($andmed as $element){
        tabeliRida($element);
    }
    echo '</tbody>';
    echo '</table>';
}

function lisaAndmedVorm()
{
    echo '
        <form action="'.$_SERVER['PHP_SELF'].'" method="get">
            Nimetus <input type="text" placeholder="Raamatu nimetus" name="nimetus">
            <br>
            Autor <input type="text" placeholder="Raamatu autor" name="autor">
            <br>
            Keel <input type="text" placeholder="Raamatu keel" name="keel">
            <br>
            Lehekülgede arv <input type="text" placeholder="Raamatu lk arv" name="lk">
            <br>
            Hind <input type="text" placeholder="Raamatu hind" name="hind">
            <br>
            <input type="submit" value="Lisa raamat"> 
        </form>
    ';
}

function lisaAndmedFaili($failiNimi){
    if(count($_GET) == 0){
        lisaAndmedVorm();
    } else {
        foreach ($_GET as $nimetus=>$vaartus){
            if(strlen($vaartus) == 0){
                header('Location: '.$_SERVER['PHP_SELF']);
                exit;
            }
        }
        $fp = fopen($failiNimi, 'a');
        foreach ($_GET as $nimetus => $vaartus) {
            fwrite($fp, $vaartus."\n");
        }
        fwrite($fp, "\n");
        fclose($fp);
        header('Location: '.$_SERVER['PHP_SELF']);
    }
}
lisaAndmedFaili('raamatud.txt');
echo '<br>';
tabel(loeFailist('raamatud.txt'));
echo '<br>';


