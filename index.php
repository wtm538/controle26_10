
<?php

    try 
    {
        //code...connexion base de donnée
        $dbh = new PDO('mysql:host=localhost;dbname=Sample-SQL-File-100rows', 'root','');
        echo "connexion etablie";

        $requete = "SELECT * FROM orders";

        $query = $dbh->query($requete);

        $resultatDeMaQuery = $query->fetchAll($dbh::FETCH_ASSOC);

    } catch (PDOException $e) 
    {
        //si erreur retourner l'erreur
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
?>


<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Controle du 26/10/2022</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src='main.js'></script>
</head>
<body>
    <table class="table">
        <form action="" method="post">
            <?Php if ($_SESSION['class'] === 'Ajouter') : ?>
                <button class="btn btn-primary" type="submit" name="Ajouter">Ajouter</button>
            <?php elseif ($_SESSION['class'] === 'Supprimer') : ?>
                <button class="btn btn-primary" type="submit" name="Supprimer">Supprimer</button>
            <?php endif ?>
        </form>

        <thead>
            <tr>
                <th scope="col">User Details</th>  
                <th scope="col">User Id</th>
                <th scope="col">User Name</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">gender</th>
                <th scope="col">Password</th>
                <th scope="col">Status</th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach ($resultatDeMaQuery as $key => $value) {
                    if ($value["comments"] <> "") {
                        echo "<tr>";
                        echo "<th>" . $value["user_id"] . "</th>";
                        echo "<th>" . $value["username"] . "</th>";
                        echo "<th>" . $value["first_name"] . "</th>";
                        echo "<th>" . $value["last_name"] . "</th>";
                        echo "<th>" . $value["gender"] . "</th>";
                        echo "<th>" . $value["password"] . "</th>";
                        echo "<th>" . $value["status"] . "</th>";
                        echo "</tr>";
                    }
                }
            ?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


</body>
</html>