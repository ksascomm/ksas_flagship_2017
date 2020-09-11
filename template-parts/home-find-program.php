<?php
/**
 * The default template for displaying homepage program finder
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<div class="intro" role="main">
	<div class="fp-intro">
		<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
		<article class="home-content programs" id="post-<?php the_ID(); ?>" aria-label="About">
			<h1>
				<span class="fa-stack fa-lg hide-for-small-only">
					<span class="fa fa-circle fa-stack-2x"></span>
					<span class="far fa-lightbulb fa-stack-1x fa-inverse" aria-hidden="true"></span>
				</span>
				Find Your Program. <span class="skyblue">Pursue Your Passions.</span>
			</h1>
			<div class="hide-for-large">
				<?php the_content(); ?>
			</div>
		</article>
		<div class="row hide-for-small-only small-up-1 medium-up-2 large-up-5">	
			<div class="grid">
				<figure class="effect-oscar">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/frontpage/bg-program-boxes.jpg" alt="Departments" aria-hidden="true">
					<figcaption>
						<h2>Departments</h2>
						<p>Explore 50-plus departments, programs, centers, and institutes</p>
						<a href="academics/departments-programs-and-centers/" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Departments');"> <p>Explore our Departments</p></a>
					</figcaption>			
				</figure>
				<figure class="effect-oscar">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/frontpage/bg-program-boxes.jpg" alt="Majors & Minors" aria-hidden="true">
					<figcaption>
						<h2>Majors & Minors</h2>
						<p>Choose from more than 60 undergraduate majors and minors</p>							
						<a href="academics/majors-minors/" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Majors/Minors');"><p>Explore our academic majors and minors</p></a>
					</figcaption>			
				</figure>
				<figure class="effect-oscar">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/frontpage/bg-program-boxes.jpg" alt="Undergraduate" aria-hidden="true">
					<figcaption>
						<h2>Undergraduate</h2>
						<p>See all Krieger School undergraduate fields of study</p>
						<a href="academics/fields/#filter=.undergrad_program" data-filter=".undergrad_program" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Undergraduate');"><p>See all Krieger School study fields</p></a>
					</figcaption>			
				</figure>
				<figure class="effect-oscar">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/frontpage/bg-program-boxes.jpg" alt="Graduate Full-Time" aria-hidden="true">
					<figcaption>
						<h2>Graduate Full-Time</h2>
						<p>Master's and doctoral programs at the Krieger School</p>
						<a href="academics/fields/#filter=.full_time_program" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Graduate FT');"><p>Masters and Doctorate programs</p></a>
					</figcaption>			
				</figure>
				<figure class="effect-oscar">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/frontpage/bg-program-boxes.jpg" alt="Graduate Part-Time" aria-hidden="true">
					<figcaption>
						<h2>Graduate Part-Time</h2>
						<p>Advanced Academic Programs offers online master's programs and graduate certificates</p>
						<a href="academics/fields/#filter=.part_time_program" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Graduate PT');"><p>Online Masters & Certificates</p></a>
					</figcaption>			
				</figure>
				<figure class="effect-oscar">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/frontpage/bg-program-boxes.jpg" alt="Explore" aria-hidden="true">
					<figcaption>
						<h2>Explore All of JHU</h2>
						<p>Search the other 8 divisions at Johns Hopkins University</p>
						<a href="https://www.jhu.edu/academics/" target="_blank" onclick="ga('send', 'event', 'Fields', 'Homepage', 'JHU.edu');" rel="noreferrer noopener"><p>Search JHU</p></a>
					</figcaption>			
				</figure>							
			</div>
		</div>

		<div class="row show-for-small hide-for-medium">
			<ul class="vertical menu programs">
				<li><a class="button" href="academics/departments-programs-and-centers/" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Departments Mobile');">Departments</a></li>
				<li><a class="button" href="academics/majors-minors/" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Majors/Minors Mobile');">Majors & Minors</a></li>
				
				<li><a class="button" href="academics/fields/#filter=.undergrad_program" data-filter=".undergrad_program" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Undergraduate Mobile');">Undergraduate</a></li>
				<li><a class="button" href="academics/fields/#filter=.full_time_program" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Graduate FT Mobile');">Graduate Full-Time</a></li>
				<li><a class="button" href="academics/fields/#filter=.full_time_program" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Graduate PT Mobile');">Graduate Part-Time</a></li>
				<li><a class="button" href="https://www.jhu.edu/academics/" onclick="ga('send', 'event', 'Fields', 'Homepage', 'JHU.edu Mobile');">Explore All of JHU</a></li>
			</ul>
		</div>
	</div>
</div>