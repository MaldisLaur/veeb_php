<?php
// formi sisu
function vorm(){
    return '
    <form method="get" action="'.$_SERVER['PHP_SELF'].'">
                <h3>Kera</h3>
                <div>
                    <div>
                        <label>Kera</label>
                        <input type="text" placeholder="kera raadius" name="keraRaadius">
                    </div>
                </div>
                <h3>Silinder</h3>
                <div>
                    <div>
                        <label>Silinder</label>
                        <input type="text" placeholder="silindri raadius" name="silindriRaadius">
                    </div>
                    <div>
                        <label>Silinder</label>
                        <input type="text" placeholder="silindri kõrgus" name="silindriKorgus">
                    </div>
                </div>
                <h3>Koonus</h3>
                <div>
                    <div>
                        <label>Koonus</label>
                        <input type="text" placeholder="koonuse raadius" name="koonuseRaadius">
                    </div>
                    <div>
                        <label>Silinder</label>
                        <input type="text" placeholder="koonuse kõrgus" name="koonuseKorgus">
                    </div>
                </div>
                <div>
                    <button type="submit">Submit</button>
                </div>
            </form>
    ';
}

// ruumalate arvutused
function keraRuumala($keraRaadius){
    return 4/3 * pi() * pow($keraRaadius, 3);
}
function koonuseRuumala($koonuseRaadius, $koonuseKorgus){
    return 1/3 * pi() * pow($koonuseRaadius, 2) * $koonuseKorgus;
}
function silindriRuumala($silindriRaadius, $silindriKorgus){
    return pi() * pow($silindriRaadius, 2) * $silindriKorgus;
}
// andmete väljastamine
function valjasta($ruumala){
    return round($ruumala, 2).' cm<sup>3</sup><br>';
}

// andmete kontroll ja töötlus
if(count($_GET) != 0) {
    foreach ($_GET as $nimetus => $vaartus) {
        if (strlen($_GET[$nimetus]) == 0) {
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }
    }
    // vormist andmed töötlus
    echo 'Kera ruumala on ' . valjasta(keraRuumala($_GET['keraRaadius']));
    echo 'Silindri ruumala on ' . valjasta(silindriRuumala($_GET['silindriRaadius'], $_GET['silindriKorgus']));
    echo 'Koonuse ruumala on ' . valjasta(koonuseRuumala($_GET['koonuseRaadius'], $_GET['koonuseKorgus']));
    echo '<a href="'.$_SERVER['PHP_SELF'].'">Arvuta uuesti</a><br>';
} else {
    //väljastame andmed
    echo vorm();
}
