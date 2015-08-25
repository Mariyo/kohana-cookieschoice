<style type="text/css">
	<!--

	#cookieschoice {
		position: fixed;
		bottom: 0;
		left: 0;
		z-index: 9999;
		width: 100%;
		padding: 6px;
		background: #fff;
		box-shadow: #121212 2px 2px 14px 2px;
		font-size: 90%;
	}

	#cookieschoice-more-text {
		display: none;
		margin-top: 10px;
	}

	-->
</style>

<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function () {
		// Show more
		document.getElementById('cookieschoice-more').onclick = function () {
			if (document.getElementById('cookieschoice-more-text').style.display !== 'block')
				document.getElementById('cookieschoice-more-text').style.display = 'block';
			else
				document.getElementById('cookieschoice-more-text').style.display = 'none';
		};

		// Hide more & Accept
		document.getElementById('cookieschoice-hide').onclick = document.getElementById('cookieschoice-accept').onclick = function () {
			document.getElementById('cookieschoice').style.display = 'none';
			document.cookie = 'Cookieschoice=' + (new Date().getTime() / 1000 | 0) + ';path=/;domain=<?php echo $domain ?>';
		};

		// Body margin by cookieschoice height
		var cookieschoice = document.getElementById('cookieschoice');
		var cookieschoiceStyle = window.getComputedStyle(cookieschoice);
		var body = document.getElementsByTagName('body')[0];
		var bodyStyle = window.getComputedStyle(body);
		body.style.marginBottom = 30 + parseInt(bodyStyle.getPropertyValue('margin-bottom')) + parseInt(cookieschoiceStyle.getPropertyValue('height')) + 'px';
	});

</script>

<div id="cookieschoice">
	<?php
	echo I18n::get('cookieschoice.text');
	?>
	<div id="cookieschoice-more-text">
		<?php
		echo strtr(I18n::get('cookieschoice.more'), array(':domain' => $domain));
		?>
	</div>
</div>

