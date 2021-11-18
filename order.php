<!DOCTYPE html>
<html lang="de">

<head>
    <title>MyMovie</title>
    <link rel="stylesheet" type="text/css" href="css/w3.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="utf-8">
</head>

<body class="background">

    <header class="w3-padding-large w3-col s12">
        <nav class="fixed-navigation w3-auto">
            <a href="#information"
                class="w3-button w3-border w3-border-white w3-text-white  w3-hover-dark-grey w3-hover-text-aqua w3-margin-right w3-auto">INFORMATION</a>
            <a href="#form"
                class="w3-button w3-border w3-border-white w3-text-white  w3-hover-dark-grey w3-hover-text-aqua w3-margin-right">FORM</a>
            <a href="#canvas"
                class="w3-button w3-border w3-border-white w3-text-white  w3-hover-dark-grey w3-hover-text-aqua w3-margin-right">CANVAS</a>
        </nav>
    </header>

    <article class="w3-padding-large w3-auto w3-white">
        <br>
        <br>
        <br>
        <section class="w3-white">
            <h1>Form</h1>
                <?php
                    // Prüfen, ob alle Personen-Parameter gesetzt sind und kein negativer Wert bestellt wurde.
                    if (!(isset($_POST['name']) && !empty($_POST['name'])
                    && isset($_POST['firstname']) && !empty($_POST['firstname'])
                    && isset($_POST['email']) && !empty($_POST['email'])
                    && isset($_POST['street']) && !empty($_POST['street'])
                    && isset($_POST['number']) && !empty($_POST['number'])
                    && isset($_POST['plz']) && !empty($_POST['plz'])
                    && isset($_POST['village']) && !empty($_POST['village']))) {
                        echo "<p>Fehler: Formular ist nicht vollständig ausgefüllt.</p>";
                    }elseif(!($_POST['anzahl1']>=0 && $_POST['anzahl2']>=0 && $_POST['anzahl3']>=0 && $_POST['anzahl4']>=0 && $_POST['anzahl5']>=0 && $_POST['anzahl6']>=0)){
                    }else{
                        // Speichern in Datenbank
                        $connection = mysqli_connect("localhost:3307", "root", "", "mymovie"); //Achtung: Bei Standardkonfiguration von XAMPP muss der Port entfernt werden, also nur "localhost" anstatt "localhost:3307".
                        $query = "INSERT INTO members (name, firstname, email, street, number, plz, village) VALUES (?, ?, ?, ?, ?, ?, ?)";
                        $statement = mysqli_prepare($connection, $query);
                        mysqli_stmt_bind_param($statement, "sssssis", $_POST["name"], $_POST["firstname"], $_POST["email"], $_POST["street"], $_POST["number"], $_POST["plz"], $_POST["village"]);
                        $execution = mysqli_stmt_execute($statement);

                        // Auslesen aus Datenbank
                        $query = "SELECT name FROM members WHERE id = (SELECT MAX(id) FROM members)";
                        $statement = mysqli_prepare($connection, $query);
                        mysqli_stmt_execute($statement);
                        $res = mysqli_stmt_get_result($statement);
                        $nameRead = "";
                        if($res) {
                            while( $row = mysqli_fetch_assoc($res) ) {
                            $nameRead =  $row['name'];
                            }
                        }else{
                            $nameRead = "liebe / lieber";
                        }

                        // Antwort an User
                        $betrag = $_POST['anzahl1']*9.90 + $_POST['anzahl2']*10.90 + $_POST['anzahl3']*11.90 + $_POST['anzahl4']*6.90 + $_POST['anzahl5']*7.90 + $_POST['anzahl6']*8.90;
                        $betrag = number_format($betrag, 2, '.', '');
                        echo "<p>Hallo " . $nameRead . " ". $_POST['firstname'] . "</p>";
                        echo "<p>Vielen Dank für deine Bestellung.</p>";
                        echo "<p>Deine Daten wurden in unserer Datenbank erfasst.</p>";
                        echo "<p>Die Rechnung wird dir mit der Lieferung zugestellt.</p>";
                        echo "<p>Betrag: " . $betrag . " CHF. </p>";
                        $intRandom = mt_rand(100000, 999999);
                        if(isset($_COOKIE['treueRabatt'])){
                            echo"";
                            echo"Du hast innerhalb von 24 Stunden mehrmals bestellt. Dafür erhältst du den nachfolgenden Treue-Code,
                            den du für den Kauf eines Hörbuchs auf audiobook.ch einlösen kannst: " .$_COOKIE['treueRabatt'] . "<br/>\n";
                        }
                        setcookie("treueRabatt", $intRandom, time() + 60*60*24);
                        }
                ?>
            <br>
            <a href="SemesterarbeitManuelGut.html#form">Zurück zur Seite</a>
            <br>
            <br>
        </section>
    </article>    
</body>

<div class="footer">
    <p>Created by Manuel Gut / HSLU / Backelor Inormatik / WEBT</p>

</div>
</html>