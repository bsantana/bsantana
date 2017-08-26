// setup everything when document is ready
jQuery(document).ready(function($) {
	// connect to hover event of <a> in .livelinks
	$('.post_title a').hover(function(e) {
		this.tip = "Recent posts from " + this.href + "will be displayed here...";
		$(this).append('<div id="lb_popup">' + this.tip + '</div>');

		// get coordinates
		var mouseX = e.pageX || (e.clientX ? e.clientX
		+ document.body.scrollLeft: 0);
		var mouseY = e.pageY || (e.clientY ? e.clientY
		+ document.body.scrollTop: 0);
		// move the top left corner to the left and down
		mouseX -= 260;
		mouseY += 5;
		// position our div
		$('#lb_popup')
			.css({
				left: mouseX + "px",
				top: mouseY + "px",
				background: "yellow"
			});
		// show it using a fadeIn function
		$('#lb_popup').fadeIn(800);

		this.onclick = function(e) {
			e.preventDefault();

			$.ajax({
				type: "GET",
				url: LiverollSettings.plugin_url + '/wp-live-blogroll-ajax.php',
				timeout: 3000,
				data:
				{
					link_url: this.href
				},
				success: function(msg)
				{
					jQuery('#lb_popup').html(msg);
					jQuery('#lb_popup').fadeIn(300);
					alert("Sucesso");
				},
				error: function(msg)
				{
					jQuery('#lb_popup').html('Error: ' + msg.responseText);
					alert("Error");
				}
			})
		}
	},
	function() {
		// remove it
		$(this).children().remove();
	});
});