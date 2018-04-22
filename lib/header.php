<?php

// Add SVG logo
function sc_svg_logo() {
	?>
	<svg class="logo" height="200" width="200" viewBox="0 0 200 200">
		<linearGradient id="water">
			<stop class="stop1" offset="0%" />
			<stop class="stop2" offset="50%" />
		</linearGradient>
		<ellipse class="shape expand" cx="57" cy="75" rx="18" ry="60" />
		<ellipse class="shape expand" cx="143" cy="75" rx="18" ry="60" />
		<ellipse class="shape expand" cx="100" cy="140" rx="85" ry="55" stroke-width="3" />
		<text class="letter" text-anchor="middle" x="100" y="175">S</text>
	</svg>
<?php
}
add_action( 'genesis_header', 'sc_svg_logo' );

// We use a logo, so don't display the text title or description
remove_action( 'genesis_header', 'genesis_do_header' );
