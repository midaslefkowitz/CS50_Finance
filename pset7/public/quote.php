<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $stock = lookup($_POST["symbol"]);
        if ($stock === false)
        {
        	// invalid stock
        	apologize("Are you sure that you meant \"". $_POST["symbol"]."\" we can't seem to find it...");
        }
        else
        {
        	// render quote
        	renderBackend("quote_display.php", ["title" => "Quote", "stock" => $stock]);
        }
    }
    else
    {
        // else render form
        renderBackend("quote_form.php", ["title" => "Quote"]);
    }

?>
