<?php
$raamatud = array(
    array(
        'nimi' => 'Enesehinnangu tööraamat teismelistele',
        'autor' => 'Lisa M. Schab',
        'keel' => 'eesti',
        'lk' => 192,
        'hind' => 15.75
    ),
    array(
        'nimi' => 'Põrsas Peppa. Esimesed numbrid',
        'autor' => 'eOne',
        'keel' => 'eesti',
        'lk' => 10,
        'hind' => 25.85
    ),
    array(
        'nimi' => 'Jänku-Jass mängib peitust',
        'autor' => 'Julia Sigarova',
        'keel' => 'eesti',
        'lk' => 12,
        'hind' => 10.15
    )
);

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

function odavamEtte($raamat1, $raamat2){
    if($raamat1['hind'] == $raamat2['hind']){
        return 0;
    } else if($raamat1['hind'] < $raamat2['hind']){
        return -1;
    } else {
        return 1;
    }
}

function kallimEtte($raamat1, $raamat2){
    if($raamat1['hind'] == $raamat2['hind']){
        return 0;
    } else if($raamat1['hind'] > $raamat2['hind']){
        return -1;
    } else {
        return 1;
    }
}

function lkJargi($raamat1, $raamat2){
    if($raamat1['lk'] == $raamat2['lk']){
        return 0;
    } else if($raamat1['lk'] > $raamat2['lk']){
        return -1;
    } else {
        return 1;
    }
}

function filtreeriHinnaJargi($andmed, $algHind, $loppHind){
    $filreerimiseTulemus = array();
    foreach ($andmed as $element){
        if($element['hind'] >= $algHind and $element['hind'] <= $loppHind){
            $filreerimiseTulemus[] = $element;
        }
    }
    return $filreerimiseTulemus;
}



function andmeteSorteerimiseValik(){
    return '
    <form method="get" action="'.$_SERVER['PHP_SELF'].'">
        <select name="sorteerimisValik">
            <option value="odavamEtte">odavam ette</option>    
            <option value="kallimEtte">kallim ette</option>    
            <option value="lkJargi">lehekülje arvu järgi</option>    
        </select>
        <input type="submit" value="Sorteeri">
    </form>
    ';
}

if($_GET['sorteerimisValik'] != null){
    usort($raamatud, $_GET['sorteerimisValik']);
}
//usort($raamatud, 'vordleHinda');
//tabel(filtreeriHinnaJargi($raamatud, 0, 100));
echo andmeteSorteerimiseValik();
tabel($raamatud);
?>
