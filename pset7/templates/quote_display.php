<table class="table table-striped">

    <thead>
        <tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
    </thead>

    <tbody>
		<tr>
			<td><?= htmlspecialchars($stock["symbol"]) ?></td>
			<td><?= htmlspecialchars($stock["name"]) ?></td>
			<td><?= htmlspecialchars(number_format($stock["price"],2,'.','')) ?></td>
		</tr>
    </tbody>
</table>
