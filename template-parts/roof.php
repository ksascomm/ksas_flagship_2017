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
		<form method="GET" action="<?php echo esc_url( home_url( '/search' ) ); ?>" role="search" aria-label="Utility Bar Search">
			<div class="input-group">
				<label for="utility-search" class="screen-reader-text">
	                Search This Website
	            </label>
				<input type="text" name="q" id="utility-search" placeholder="Search this site" aria-label="Search This Website"/>
				<div class="input-group-button">
	    			<button type="submit" class="button" aria-label="search"><span class="fas fa-search"></span></button>
	  			</div>	
			</div>
		</form>
	</li>
	<li class="roof-padding bar"><a href="https://www.jhu.edu/admissions/visit/" target="_blank" rel="noopener" aria-label="Visit Us">Visit</a></li>
	<li class="roof-padding"><a href="https://krieger.jhu.edu/magazine/" target="_blank" rel="noopener" aria-label="Arts & Sciences Magazine">A&S Magazine</a></li>
	<li><a class="button" id="explore-jhu" href="#" aria-label="Explore KSAS" data-toggle="offCanvasTop1">Explore JHU <span class="fas fa-bars" aria-hidden="true"></span></a></li>
</ul>

<div class="off-canvas position-top" id="offCanvasTop1" data-off-canvas aria-hidden="true">
	<div id="global-links" class="row small-up-2 medium-up-3 large-up-3">
	<h1 class="show-for-sr">Explore KSAS</h1>
		<div class="column column-block">
			<h2>Inside the Krieger School</h2>
			<ul class="vertical menu" role="menu">
				<li role="menuitem"><a href="<?php echo site_url(); ?>/academics/departments-programs-and-centers/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Departments')">Departments, Programs, and Centers</a></li>
				<li role="menuitem"><a href="<?php echo site_url(); ?>/people/faculty-directory/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Faculty')">Faculty Directory</a></li>
				<li role="menuitem"><a href="<?php echo site_url(); ?>/academics/fields/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Fields of Study')">Fields of Study</a></li>
				<li role="menuitem"><a href="https://krieger.jhu.edu/academics/majors-minors/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Majors & Minors')">Majors & Minors</a></li>
			</ul>
		</div>
		<div class="column column-block">
			<h2>Student & Faculty Resources</h2>
			<ul class="vertical menu" role="menu">
				<li role="menuitem"><a href="http://e-catalog.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Academic Catalog')">Academic Catalog</a></li>
				<li role="menuitem"><a href="https://livejohnshopkins.sharepoint.com/sites/KSASFacultyHandbook" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Faculty Handbook')">Faculty Handbook <span class="fas fa-sign-in-alt"></span></a></li>
				<li role="menuitem"><a href="https://studentaffairs.jhu.edu/registrar" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Registrars')">Registrar's Office</a></li>
				<li role="menuitem"><a href="https://policies.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Policy Library')">University Policies & Document Library <span class="fas fa-sign-in-alt"></span></a></li>	
			</ul>
		</div>
		<div class="column column-block">
			<h2>Across Campus</h2>
			<ul class="vertical menu" role="menu">
				<li role="menuitem"><a href="https://www.jhu.edu/admissions/" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'Admissions')">Admissions & Aid</a></li>
				<li role="menuitem"><a href="https://www.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'JHU Home')">Johns Hopkins University Website</a></li>
				<li role="menuitem"><a href="https://www.jhu.edu/maps-directions/" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'Maps/Directions')">Maps & Directions</a></li>
				<li role="menuitem"><a href="https://my.jh.edu/portal/web/jhupub" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'myJHU')">myJHU</a></li>
			</ul>
		</div>
		<button class="close-button" aria-label="Close menu" type="button" data-close>
		  <span aria-hidden="true">&times;</span>
		</button>			
	</div>
</div>