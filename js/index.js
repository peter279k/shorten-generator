$(function() {
	$("#post-url").click(function() {
		if ($("#longUrl").val() == "") {
			$(".container").append('<div class="alert alert-warning">'+
  			'<strong>Oops!</strong> 尚未輸入網址 !'+
			"</div>");
		}
	});
});