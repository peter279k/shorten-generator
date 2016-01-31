$(function() {
	$("#post-url").click(function() {
		if ($("#longUrl").val() == "") {
			$(".container").append('<div class="form-group alert alert-warning">'+
  				'<strong>Oops!</strong> 尚未輸入網址 !'+
			"</div>");
		}
		else {
			$.post("/shorten-generator/", {"longUrl": $("#longUrl").val(), ""}, function(response) {

			});
		}
	});
});