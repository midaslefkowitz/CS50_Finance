</br>

<script src="/js/jquery.validate.min.js"></script>
<script>
    $.validator.setDefaults({
				submitHandler: function() {
					$('#sell_form').submit();
				}
			});

    json = {
        portfolio: [
        <?php foreach($portfolio as $position): ?>
            {"symbol":"<?php print($position["symbol"]) ?>", "shares": <?php print($position["total_shares"]) ?>},
        <?php endforeach; ?>
        ]
    };

    $(document).ready(function() {
        $.each(json.portfolio,function(key,value) {
            var option = $('<option />').val(value.symbol).text(value.symbol);
            $("#symbol").append(option);
        });
    
        $("#symbol").on("change", function() {
            var shares;
            $.each(json.portfolio, function(key, value) {
                if (value.symbol === $("#symbol").val()) {
                    shares = value.shares;
                }
            });
            $("#total_shares").val(shares);
        });
        
        $("#sell_form").validate({
            rules: {
            	symbol: "required",
                amount_to_sell: {
                    required: true,
                    min: 1
                }
            },
            messages: {
            	symbol: "Please pick a stock",
                amount_to_sell: {
                	required: "How many do you want to sell?",
                	min: "You have to sell at least one share!"          	
            	}
            }    
        });
    });


</script>
<style>
		
	#sell_form label.error {
		margin-left: 10px;
		width: auto;
		display: block;
		color: red;
	}
</style>

<form action="sell.php" method="post" id="sell_form">
    <fieldset>
        <div class="form-group">
            <label for="symbol">Pick a stock:</label> 
            <select id="symbol" class="form-control" name="symbol">
                <option value=""> </option>

            </select>
        </div>
        
        <div class='form-group'>
            <label for="total_shares">Shares Available:</label>
            <input type="text" id="total_shares" name="total_shares" size="7"readonly />
        </div>
        
        <div class='form-group'>
            <label for="amount_to_sell">Amount to Sell:</label>
            <input type="text" id="amount_to_sell" name="amount_to_sell" size="7" />
        </div>
        
        <!-- 
        TODO 
        verify that have that not greater than total_shares
        -->
        
        
        <div class="form-group">
            <button type="submit" class="btn btn-default">Sell</button>
        </div>
    </fieldset>
</form>

