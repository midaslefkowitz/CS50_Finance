<table class="table table-striped">

    <thead>
        <tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Price</th>
            <th>TOTAL</th>
        </tr>
    </thead>

    <tbody>

        <?php
            
            
            foreach ($portfolio as $position)
            {

                print("<tr>\n");
                print("<td>".strtoupper($position["symbol"])."</td>");
                print("<td>".$position["name"]."</td>");
                print("<td>".$position["shares"]."</td>");
                print("<td>"."$".(number_format($position["price"],2,'.',''))."</td>");
                print("<td>"."$".(number_format(($position["price"] * $position["shares"]),2,'.',''))."</td>");
            }
        ?>        
        <tr>
            <td colspan="4">CASH</td>
            <td>$<?= (number_format($cash,2,'.','')) ?></td>
        </tr>

    </tbody>

</table>
