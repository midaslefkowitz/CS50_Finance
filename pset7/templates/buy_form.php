<script src="/js/jquery.validate.min.js"></script>
<script>
    $.validator.setDefaults({
		submitHandler: function() {
			$('#buy_form').submit();
		}
	});
	
	$(document).ready(function() {
        $("#buy_form").validate({
            rules: {
            	symbol: "required",
                shares: {
                    required: true,
                    min: 1
                }
            },
            messages: {
            	symbol: "Please enter a symbol",
                shares: {
                	required: "How many do you want to buy?",
                	min: "You have to buy at least one share!"          	
            	}
            }    
        });
    });
</script>			
<style>
	#buy_form label.error {
		margin-left: 10px;
		width: auto;
		display: block;
		color: red;
	}
</style>			
</br>
<table class="table">
    <tbody>
        <tr class="success">
            <td>Cash Balance:</td>
            <td id="cash_balace">$<?= (number_format($cash,2,'.','')) ?></td>
        </tr>
    </tbody>
</table>

<form action="buy.php" method="post" id="buy_form">
    <fieldset>
        <div class="form-group">
            <input class="form-control" name="symbol" placeholder="Symbol" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="shares" placeholder="Shares" type="text"/>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-default">Buy</button>
        </div>
    </fieldset>
</form>
