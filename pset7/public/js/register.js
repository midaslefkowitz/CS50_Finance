$.validator.setDefaults({
				submitHandler: function() {
					$('#registration').submit();
				}
			});

$().ready(function(){

    $("#registration").validate({
        rules: {
        	username: "required",
            password: "required",
            confirmation: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
        	username: "Please enter a username",
            password: "Please enter a password",
            confirmation: {
            	required: "Please enter valid confirm password",
            	equalTo: "Please enter the same password as above"            	
        	}
        }    
    });
});
