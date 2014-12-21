</br>


<form action="sell.php" method="post">
    <fieldset>
        <div class="form-group">
            <label for="symbol">Pick a stock:</label> 
            <select id="symbol" class="form-control" name="symbol">
                <option value=""> </option>
                <?php
                    foreach ($portfolio as $position)
                    {
                        print("<option value='".$position["symbol"]."'>".$position["symbol"]."</option>");
                    }
                ?>
            </select>
        </div>
        
        <div class='form-group' name='total_shares'>
        <?php
            foreach ($portfolio as $position)
            {
                print("<div id='".$position["symbol"]."'style='display:none'>");
                print("".$position["total_shares"]."</div>");
            }
        ?>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Sell</button>
        </div>
    </fieldset>
</form>

