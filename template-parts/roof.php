<?php
/**
 * The default template for the "roof"
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<ul class="menu simple roof-menu">
	<li class="roof-padding">
		<form method="GET" action="<?php echo site_url('/search'); ?>" role="search">
			<div class="input-group">
				<input type="text" value="<?php echo get_search_query(); ?>" name="q" id="s" placeholder="Search this site" aria-label="search"/>
				<div class="input-group-button">
	    			<input type="submit" class="button" value="&#xf002;">
	  			</div>	
				<label for="s" class="screen-reader-text">
	                Search This Website
	            </label>
			</div>
		</form>
	</li>
	<li class="roof-padding bar"><a href="https://www.jhu.edu/admissions/visit/">Visit</a></li>
	<li class="roof-padding"><a href="http://krieger.jhu.edu/magazine/">A&S Magazine</a></li>
	<li class="button" data-toggle="offCanvasTop1">Explore KSAS <span class="fa fa-bars" aria-hidden="true"></span></li>
	<div class="off-canvas position-top" id="offCanvasTop1" data-off-canvas>
		<div id="global-links" class="row small-up-2 medium-up-3 large-up-3">
			<div class="column column-block">
				<h3>Academics</h3>
				<ul class="vertical menu" role="menu">
					<li role="menuitem"><a href="<?php echo site_url(); ?>/academics/departments-programs-and-centers/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Departments')";>Departments, Programs, and Centers</a></li>
					<li role="menuitem"><a href="<?php echo site_url(); ?>/about/faculty/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Faculty')">Faculty Directory</a></li>
					<li role="menuitem"><a href="<?php echo site_url(); ?>/academics/fields/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Fields of Study')">Fields of Study</a></li>
					<li role="menuitem"><a href="http://www.library.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Libraries')">Libraries</a></li>
					<li role="menuitem"><a href="http://krieger.jhu.edu/academics/majors-minors/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Majors & Minors')">Majors & Minors</a>
				</ul>
			</div>
			<div class="column column-block">
				<h3>Student & Faculty Resources</h3>
				<ul class="vertical menu" role="menu">
					<li role="menuitem"><a href="https://sis.jhu.edu/sswf/" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'ISIS')">Course Listings & Registration</a></li>
					<li role="menuitem"><a href="https://www.jhu.edu/admissions/financial-aid/" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Financial Aid')">Financial Aid</a></li>
					<li role="menuitem"><a href="https://hrnt.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Human Resources')">Human Resources</a></li>
					<li role="menuitem"><a href="http://web.jhu.edu/registrar" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Registrars')">Registrar's Office</a></li>
				</ul>
			</div>
			<div class="column column-block">
				<h3>Across Campus</h3>
				<ul class="vertical menu" role="menu">
					<li role="menuitem"><a href="https://www.jhu.edu/admissions/" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'Admissions')">Admissions Information</a></li>
					<li role="menuitem"><a href="https://www.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'JHU Home')">Johns Hopkins University Website</a></li>
					<li role="menuitem"><a href="https://www.jhu.edu/maps-directions/" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'Maps/Directions')">Maps & Directions</a></li>
					<li role="menuitem"><a href="https://my.jh.edu/portal/web/jhupub" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'myJHU')">myJHU</a></li>
					<li role="menuitem"><a href="http://hub.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'TheHub')">The Hub</a></li>
				</ul>
			</div>
		</div>
	</div>
</ul>