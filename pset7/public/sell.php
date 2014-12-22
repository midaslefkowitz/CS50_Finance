<?php
    // configuration
    require("../includes/config.php");
    
    // query database for positions
    $id = $_SESSION["id"];
    $portfolio = query("SELECT * FROM portfolio WHERE id = ?", $id);
    
    $positions = [];
    foreach ($portfolio as $position)
    {
         $positions[] = [
            "symbol" => $position["symbol"],
            "total_shares" => $position["shares"]
          ];
    }
    
    // if form submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $stock = lookup($_POST["symbol"]);
 
        $amount_to_sell = $_POST["amount_to_sell"];
        $symbol = $_POST["symbol"];
 
        $price = $stock["price"];
        $total_shares = $_POST["total_shares"];
        $proceeds = $amount_to_sell * $price;

        if ($amount_to_sell > $total_shares)
        {
            apologize("Sorry, you can't sell ".$amount_to_sell." shares of ".$symbol." since you only own ".$total_shares." shares.");
        }
        
        // sell shares
        else if ($amount_to_sell == $total_shares)
        {
            query("DELETE FROM portfolio WHERE id = ? AND symbol = ?", $id, $symbol);
        }
        else
        {
            query("UPDATE portfolio SET shares = shares - ? WHERE id = ? AND symbol = ?", $amount_to_sell, $id, $symbol);
        }
        // update cash
        query("UPDATE users SET cash = cash + ? WHERE id = ?", $proceeds, $id);
        
        // redirect to portfolio
        redirect("portfolio.php");
    }
    
    // else render form
    else
    {
        renderBackend("sell_form.php", [
        "portfolio" => $positions,
        "title" => "Sell"]);
    }
?>
