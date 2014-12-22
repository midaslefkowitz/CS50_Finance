<?php
    // configuration
    require("../includes/config.php");
    
    // query database for positions
    $id = $_SESSION["id"];
    $cash = getUserCash($id);
    
    // if form submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $shares = $_POST["shares"];
        $symbol = strtoupper($_POST["symbol"]);
        $stock = lookup($symbol);
        
        // ensure symbol is valid
        if ($stock === false)
        {
            apologize("Are you sure that you meant \"". $symbol."\" we can't seem to find it...");
        }
        if (!preg_match("/^\d+$/", $_POST["shares"]))
        {
            apologize("You can only buy whole shares (no fractional purchases allowed)");
        }
        
        $price = $stock["price"];
        // ensure enough money
        $total_cost = $price * $shares;
        if ($total_cost > $cash)
        {
            apologize("Your cash balance of $".$cash." won't cover ".$shares." shares of ".$stock["name"]);
        }
        // update db
        query("INSERT INTO portfolio (id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares) ", $id, $symbol, $shares);
        query("UPDATE users SET cash = cash - ? WHERE id = ?", $total_cost, $id);
        // redirect to portfolio
        redirect("portfolio.php");
    }
    
    // else render form
    else
    {
        renderBackend("buy_form.php", [
        "cash" => $cash,
        "title" => "Buy"]);
    }
?>
