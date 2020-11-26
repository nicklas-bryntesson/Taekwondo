/*
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

/* global tkdScreenReaderText */
/* eslint-env jquery */

( function( $ ) {
	function initMainNavigation( container ) {
		// Add dropdown toggle that displays child menu items.
		const dropdownToggle = $( '<button />', { class: 'dropdown-toggle', 'aria-expanded': false } )
			.append( $( '<span />', { class: 'dropdown-symbol', text: '+' } ) )
			.append( $( '<span />', { class: 'screen-reader-text', text: tkdScreenReaderText.expand } ) );

		container.find( '.menu-item-has-children > a, .page_item_has_children > a' ).after( dropdownToggle );

		container.find( '.dropdown-toggle' ).click( function( e ) {
			const _this = $( this ),
				screenReaderSpan = _this.find( '.screen-reader-text' );
			// eslint-disable-next-line no-undef
			dropdownSymbol = _this.find( '.dropdown-symbol' );
			// eslint-disable-next-line no-undef
			dropdownSymbol.text( dropdownSymbol.text() === '-' ? '+' : '-' );

			e.preventDefault();
			_this.toggleClass( 'toggled-on' );
			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );

			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );

			screenReaderSpan.text( screenReaderSpan.text() === tkdScreenReaderText.expand ? tkdScreenReaderText.collapse : tkdScreenReaderText.expand );
		} );
	}

	initMainNavigation( $( '.main-navigation' ) );

	// eslint-disable-next-line prefer-const
	let masthead = $( '#masthead' );
	const menuToggle = masthead.find( '.menu-toggle' );
	const siteNavigation = masthead.find( '.main-navigation > ul' );

	// Add active class for icon in menu-toggle button

	// Look for .hamburger
	const menuIcon = document.querySelector( '.menu-toggle' );
	const mainNav = document.querySelector( '.main-navigation' );
	// const toggleBtn = document.getElementsByClassName( 'menu-toggle' );

	// On click
	menuIcon.addEventListener( 'click', function() {
	// Toggle class "is-active"
		menuIcon.classList.toggle( 'is-active' );
		// mainNavigation.classList.toggle( 'small-menu-toggled' );
	} );

	// Reset menu if it is toggled on and window resize to above query-tablet
	function resetOnResize( queryTablet ) {
		if ( queryTablet.matches ) { // If media query matches
			// Remove active class on hamburger icon
			menuIcon.classList.remove( 'is-active' );
			// Remove active class on main-navigation
			mainNav.classList.remove( 'toggled-on' );
		}
	} // For some reason the aria-expanded also rests -> Look into this.

	const queryTablet = window.matchMedia( '(min-width: 768px)' );
	resetOnResize( queryTablet );	// Call listener function at run time
	queryTablet.addListener( resetOnResize );

	// Enable menuToggle.
	( function() {
		// Return early if menuToggle is missing.
		if ( ! menuToggle.length ) {
			return;
		}

		// Add an initial values for the attribute.
		menuToggle.add( siteNavigation ).attr( 'aria-expanded', 'false' );

		menuToggle.on( 'click.tkd', function() {
			$( siteNavigation.closest( '.main-navigation' ), this ).toggleClass( 'toggled-on' );

			$( this )
				.add( siteNavigation )
				.attr( 'aria-expanded', $( this ).add( siteNavigation ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
		} );
	}() );

	// Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
	( function() {
		if ( ! siteNavigation.length || ! siteNavigation.children().length ) {
			return;
		}

		// Toggle `focus` class to allow submenu access on tablets.
		function toggleFocusClassTouchScreen() {
			if ( 'none' === $( '.menu-toggle' ).css( 'display' ) ) {
				$( document.body ).on( 'touchstart.tkd', function( e ) {
					if ( ! $( e.target ).closest( '.main-navigation li' ).length ) {
						$( '.main-navigation li' ).removeClass( 'focus' );
					}
				} );

				siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' )
					.on( 'touchstart.tkd', function( e ) {
						const el = $( this ).parent( 'li' );

						if ( ! el.hasClass( 'focus' ) ) {
							e.preventDefault();
							el.toggleClass( 'focus' );
							el.siblings( '.focus' ).removeClass( 'focus' );
						}
					} );
			} else {
				siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' ).unbind( 'touchstart.tkd' );
			}
		}

		if ( 'ontouchstart' in window ) {
			$( window ).on( 'resize.tkd', toggleFocusClassTouchScreen );
			toggleFocusClassTouchScreen();
		}

		siteNavigation.find( 'a' ).on( 'focus.tkd blur.tkd', function() {
			$( this ).parents( '.menu-item, .page_item' ).toggleClass( 'focus' );
		} );
	}() );

	// Add the default ARIA attributes for the menu toggle and the navigations.
	function onResizeARIA() {
		if ( 'block' === $( '.menu-toggle' ).css( 'display' ) ) {
			if ( menuToggle.hasClass( 'toggled-on' ) ) {
				menuToggle.attr( 'aria-expanded', 'true' );
			} else {
				menuToggle.attr( 'aria-expanded', 'false' );
			}

			if ( siteNavigation.closest( '.main-navigation' ).hasClass( 'toggled-on' ) ) {
				siteNavigation.attr( 'aria-expanded', 'true' );
			} else {
				siteNavigation.attr( 'aria-expanded', 'false' );
			}
		} else {
			menuToggle.removeAttr( 'aria-expanded' );
			siteNavigation.removeAttr( 'aria-expanded' );
			menuToggle.removeAttr( 'aria-controls' );
		}
	}

	$( document ).ready( function() {
		$( window ).on( 'load.tkd', onResizeARIA );
		$( window ).on( 'resize.tkd', onResizeARIA );
	} );
}( jQuery ) );
