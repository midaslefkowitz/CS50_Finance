<table class="table table-striped">

    <thead>
        <tr>
            <th>Transaction</th>
            <th>Date/Time</th>
            <th>Symbol</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>

    <tbody>
        <?php
            foreach ($log as $transaction)
            {
                print("<tr>\n");
                print("<td>".strtoupper($transaction["transaction"])."</td>");
                print("<td>".$transaction["date/time"]."</td>");
                print("<td>".$transaction["symbol"]."</td>");
                print("<td>".$transaction["shares"]."</td>");
                print("<td>"."$".(number_format($transaction["price"],2,'.',''))."</td>");
            }
        ?>
    </tbody>
</table>
