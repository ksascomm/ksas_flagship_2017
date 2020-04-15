jQuery(document).ready( function($) {
	$('ul.sub-menu.submenu.is-drilldown-submenu.invisible').attr('aria-label', 'Quicklinks');
	$('.mobile-off-canvas-menu ul').removeAttr('role', 'menu');
	$('.mobile-off-canvas-menu ul').attr('role', 'tree');
	$('.mobile-off-canvas-menu ul li').removeAttr('role', 'menuitem');
	//remove empty <p> from [sidebar-title]Heading Name[/sidebar-title]
	$('.ecpt-page-sidebar .sidebar-content p:empty').remove();
});