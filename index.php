<!DOCTYPE html>
<?php
require_once '_connec.php';

$pdo = new \PDO(DSN, USER, PASS);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friends</title>
</head>

<body>
    <ul>
        <li>Ross Geller</li>
        <li>Monica Geller</li>
        <li>Phoebe Buffay</li>
        <li>Joey Tribbiani</li>
    </ul>

    <form action="fomulaire" method="post">
        <ul>
            <li>
                <label for="firstname">Firstname</label>
                <input type="text" id="firstname" name="firstname" required />
            </li>
            <li>
                <label for="lastname">Lastname</label>
                <input type="text" id="lastname" name="lastname" required />
            </li>
        </ul>
        <div class="button">
            <button type="submit">submit</button>
            <?php
            $firstname = trim($_POST['firstname']);
            $lastname = trim($_POST['lastname']);

            $query = 'INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)';
            $statement = $pdo->prepare($query);

            $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
            $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);

            $statement->execute();
            ?>

        </div>
    </form>

</body>

</html>