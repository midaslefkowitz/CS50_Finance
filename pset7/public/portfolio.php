<?php
    // configuration
    require("../includes/config.php"); 
    
    // query database for positions
    $id = $_SESSION["id"];
    $positions = query("SELECT * FROM portfolio WHERE id = ?", $id);
    
    // store positions and stock info in array
    $portfolio = [];
    foreach ($positions as $position)
    {
        $stock = lookup($position["symbol"]);
        if ($stock !== false)
        {
            $portfolio[] = [
                "symbol" => $position["symbol"],
                "name" => $stock["name"],
                "shares" => $position["shares"],
                "price" => $stock["price"]
            ];
        }
    }
    
    // get user cash balance
    $cash_rows = query("SELECT cash FROM users WHERE id = ?", $id);
    $cash_row = $cash_rows[0];
    $cash = $cash_row["cash"];
    
    //
    
    // render portfolio
    renderBackend("portfolio.php", [
        "cash" => $cash,
        "portfolio" => $portfolio,
        "title" => "Portfolio"]);
?>
