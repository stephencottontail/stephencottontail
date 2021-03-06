/**
 * Accessibility-ready responsive menu.
 */

( function ( document, $, undefined ) {

	$( 'body' ).addClass( 'js' );

	'use strict';

	var genesisSample       = {},
		mainMenuButtonClass = 'menu-toggle',
		subMenuButtonClass  = 'sub-menu-toggle';

	genesisSample.init = function() {
		var toggleButtons = {
			menu : $( '<button />', {
				'class' : mainMenuButtonClass,
				'aria-expanded' : false,
				'aria-pressed' : false,
				'role' : 'button',
				'html' : '<span class="icon">'
				} )
				.append( genesisSample.params.mainMenu )
		};
		if ($( '.nav-primary' ).length > 0 ) {
			$( '.nav-primary' ).before( toggleButtons.menu ); // add the main nav buttons
		} else {
			$( '.nav-header' ).before( toggleButtons.menu );
		}
		$( '.' + mainMenuButtonClass ).each( _addClassID );
		$( window ).on( 'resize.genesisSample', _doResize ).triggerHandler( 'resize.genesisSample' );
		$( '.' + mainMenuButtonClass ).on( 'click.genesisSample-mainbutton', _mainmenuToggle );
	};

	// add nav class and ID to related button
	function _addClassID() {
		var $this = $( this ),
			nav   = $this.next( 'nav' ),
			id    = 'class';
		if ( $( nav ).attr( 'id' ) ) {
			id = 'id';
		}
		$this.attr( 'id', 'mobile-' + $( nav ).attr( id ) );
	}

	// Change Skiplinks and Superfish
	function _doResize() {
		var buttons = $( 'button[id^="mobile-"]' ).attr( 'id' );
		if ( typeof buttons === 'undefined' ) {
			return;
		}
		_changeSkipLink( buttons );
		_maybeClose( buttons );
	}

	/**
	 * action to happen when the main menu button is clicked
	 */
	function _mainmenuToggle() {
		var $this = $( this );
		_toggleAria( $this, 'aria-pressed' );
		_toggleAria( $this, 'aria-expanded' );
		$this.toggleClass( 'activated' );
		$this.next( 'nav, .sub-menu' ).slideToggle( 'fast' );
		$( 'body' ).toggleClass( 'menu-active' );
	}

	/**
	 * modify skip links to match mobile buttons
	 */
	function _changeSkipLink( buttons ) {
		var startLink = 'genesis-nav',
			endLink   = 'mobile-genesis-nav';
		if ( 'none' === _getDisplayValue( buttons ) ) {
			startLink = 'mobile-genesis-nav';
			endLink   = 'genesis-nav';
		}
		$( '.genesis-skip-link a[href^="#' + startLink + '"]' ).each( function() {
			var link = $( this ).attr( 'href' );
			link = link.replace( startLink, endLink );
			$( this ).attr( 'href', link );
		});
	}

	function _maybeClose( buttons ) {
		if ( 'none' !== _getDisplayValue( buttons ) ) {
			return;
		}
		$( '.menu-toggle, .sub-menu-toggle' )
			.removeClass( 'activated' )
			.attr( 'aria-expanded', false )
			.attr( 'aria-pressed', false );
		$( 'nav, .sub-menu' )
			.attr( 'style', '' );
	}

	/**
	 * generic function to get the display value of an element
	 * @param  {id} $id ID to check
	 * @return {string}     CSS value of display property
	 */
	function _getDisplayValue( $id ) {
		var element = document.getElementById( $id ),
			style   = window.getComputedStyle( element );
		return style.getPropertyValue( 'display' );
	}

	/**
	 * Toggle aria attributes
	 * @param  {button} $this     passed through
	 * @param  {aria-xx} attribute aria attribute to toggle
	 * @return {bool}           from _ariaReturn
	 */
	function _toggleAria( $this, attribute ) {
		$this.attr( attribute, function( index, value ) {
			return 'false' === value;
		});
	}

	$(document).ready(function () {
		genesisSample.params = typeof genesisSampleL10n === 'undefined' ? '' : genesisSampleL10n;

		if ( typeof genesisSample.params !== 'undefined' ) {
			genesisSample.init();
		}

	});

})( document, jQuery );
