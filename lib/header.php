<?php

// Add SVG logo
function sc_svg_logo() {
	?>
	<svg height="400" width="200" viewBox="0 0 100 100">
		<linearGradient id="water">
			<stop class="stop1" offset="0%" />
			<stop class="stop2" offset="50%" />
		</linearGradient>
		<ellipse class="shape expand" cx="25" cy="15" rx="8" ry="30" />
		<ellipse class="shape expand" cx="57" cy="15" rx="8" ry="30" />
		<ellipse class="shape expand" cx="41" cy="53" rx="35" ry="25" stroke-width="3" />
		<text class="letter" x ="20" y="80">S</text>
	</svg>
<?php
}
add_action( 'genesis_header', 'sc_svg_logo' );

// We use a logo, so don't display the text title or description
remove_action( 'genesis_header', 'genesis_do_header' );
