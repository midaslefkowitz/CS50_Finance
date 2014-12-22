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
        $symbol = $_POST["symbol"];
        $amount_to_sell = $_POST["amount_to_sell"];
        $total_shares = $_POST["total_shares"];
                
        $stock = lookup($symbol);
        $price = $stock["price"];
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
        query("INSERT INTO history (id, transaction, symbol, shares, price) VALUES(?, ?, ?, ?, ?)", $id, 'SELL', $symbol, $total_shares, $price);
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
