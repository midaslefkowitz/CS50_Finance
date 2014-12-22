<?php
    // configuration
    require("../includes/config.php"); 
    
    $id = $_SESSION["id"];
    $history = query("SELECT * FROM history WHERE id = ?", $id);
    
    $log = [];
    foreach ($history as $transaction)
    {
        $log[] = [
            "transaction" => $transaction["transaction"],
            "date/time" => $transaction["date/time"],
            "symbol" => $transaction["symbol"],
            "shares" => $transaction["shares"],
            "price" => $transaction["price"]
        ];
    }
    
    // render portfolio
    renderBackend("log.php", [
        "log" => $log,
        "title" => "History"]);
?>
