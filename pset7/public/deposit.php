<?php
    // configuration
    require("../includes/config.php");
    
    // query database for positions
    $id = $_SESSION["id"];
    $cash = getUserCash($id);
    
    // if form submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $deposit = $_POST["deposit"];

        // update db
        query("UPDATE users SET cash = cash + ? WHERE id = ?", $deposit, $id);
        // redirect to portfolio
        redirect("portfolio.php");
    }
    
    // else render form
    else
    {
        renderBackend("deposit_form.php", [
        "cash" => $cash,
        "title" => "Portfolio"]);
    }
?>
