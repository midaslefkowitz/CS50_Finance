$(document).ready(function() {
    var title = document.getElementById("title").textContent.trim().toLowerCase();
	var li = document.getElementById(title);
	$(li).addClass('active');
});
