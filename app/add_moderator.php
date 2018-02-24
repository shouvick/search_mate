<?php require_once "../service/validation_service.php"; ?>
<?php require_once "../service/person_service.php"; ?>

<hr/>
<a href="admin.php">HOME</a>
<?php
    if(isset($_GET['id'])){
        $personId = trim($_GET['id']);
        $person = getPersonById($personId);
        if(isset($person)==false){
            echo "<hr/>";
            die();
        }
    }
    else{
        echo "<hr/>";
        die();
    }

    $id = $person['id'];
    $name = $person['name'];
    $password = $person['pass'];
    $moderator = "moderator";
    //$name = $person['name'];

    $person['id'] = $id;
    $person['name'] = $name;
    $person['pass'] = $password;
    $person['type'] = $moderator;

    //echo $pass;
    $check = checkModeratorToDb($person['id']);
    //echo $check;

    if($check = checkModeratorToDb($person['id']))
    {
        echo "ALREADY MODERATOR";
    }
    elseif(editPerson($person))
    {
    	echo "Moderator Added";
    }
    else
    {
    	echo "Not Added";
    }

    



?>