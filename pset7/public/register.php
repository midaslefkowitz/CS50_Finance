<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $result = query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 0)", $_POST["username"], crypt($_POST["password"]));
        if ($result === false)
        {
        	apologize("Sorry, somebody took that username before you. Better Luck next time.");
        }
        else
        {
        	$rows = query("SELECT LAST_INSERT_ID() AS id");
        	$id = $rows[0]["id"];
        	$_SESSION["id"] = $id;
        	redirect("index.php");
        }
    }
    else
    {
        // else render form
        renderRegister("register_form.php", ["title" => "Register"]);
    }

?>
