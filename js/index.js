$(function() {
	$("#post-url").click(function() {
		if ($("#longUrl").val() == "") {
			$(".container").append('<div class="form-group alert alert-warning">'+
  				'<strong>Oops!</strong> 尚未輸入網址 !'+
			"</div>");
		}
		else if($("#sel-service").val() === "no-sel") {
			$(".container").append('<div class="form-group alert alert-warning">'+
  				'<strong>Oops!</strong> 尚未選擇縮網服務 !'+"</div>");	
		}
		else {
			//post url to process shorten
			var data = {
				"longUrl":$("#longUrl").val(),
				"sel-service":$("#sel-service").val()
			};
			
			$.post("/shorten-generator/post/url", data, function(response) {
				console.log(response);
			});
		}
	});
});