<script src="/js/jquery.validate.min.js"></script>
<script>
    $.validator.setDefaults({
		submitHandler: function() {
			$('#deposit_form').submit();
		}
	});
	
	$(document).ready(function() {
        $("#deposit_form").validate({
            rules: {
                deposit: {
                    required: true,
                    min: 1
                }
            },
            messages: {
                deposit: {
                	required: "Please enter a dollar amount",
                	min: "You have to deposit at least $1"          	
            	}
            }    
        });
    });
</script>	
<style>
	#deposit_form label.error {
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

<form action="deposit.php" method="post" id="deposit_form">
    <fieldset>
        <div class="form-group">
            <input class="form-control" name="deposit" placeholder="Amount" type="text"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Deposit</button>
        </div>
    </fieldset>
</form>
