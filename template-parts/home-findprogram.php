<div class="intro" role="main">
	<div class="fp-intro">
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
			<div class="entry-content programs">
				<h1>
					<span class="fa-stack fa-lg">
						<span class="fa fa-circle fa-stack-2x"></span>
						<span class="fa fa-lightbulb-o fa-stack-1x fa-inverse" aria-hidden="true"></span>
					</span>
					Find Your Program. <span class="skyblue">Pursue Your Passions.</span>
				</h1>
				
				<div class="home-content hide-for-small-only">
					<?php the_content(); ?>
				</div>

				<div class="row hide-for-small-only small-up-1 medium-up-2 large-up-5">	
						<div class="grid">
							<figure class="effect-sarah">
								<img src="<?php echo get_template_directory_uri() ?>/assets/images/frontpage/dept.jpg" class="" alt="">
								<figcaption>
									<div>
										<h2>Departments</h2>
										<p>Explore the 50-plus departments, programs, centers, and institutes.</p>
									</div>
									<a href="academics/departments-programs-and-centers" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Departments');"> <p>Explore our Departments</p></a>
								</figcaption>			
							</figure>
							<figure class="effect-sarah">
								<img src="<?php echo get_template_directory_uri() ?>/assets/images/frontpage/major.jpg" class="" alt="">
								<figcaption>
									<div>
										<h2>Majors <span>&</span> Minors</h2>
										<p>Choose from more than 60 undergraduate majors and minors.</p>
									</div>
									<a href="academics/majors-minors" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Majors/Minors');"><p>Explore our academic majors and minors</p></a>
								</figcaption>			
							</figure>
							<figure class="effect-sarah">
								<img src="<?php echo get_template_directory_uri() ?>/assets/images/frontpage/under.jpg" class="" alt="">
								<figcaption>
									<div>
										<h2>Undergraduate Fields of Study</h2>
										<p>Explore all of Krieger's undergraduate academic offerings</p>
									</div>
									<a href="academics/fields/#filter=.undergrad_program" data-filter=".undergrad_program" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Undergraduate');"><p>Explore all 22 academic departments</p></a>
								</figcaption>			
							</figure>
							<figure class="effect-sarah">
								<img src="<?php echo get_template_directory_uri() ?>/assets/images/frontpage/gradft.jpg" class="" alt="">
								<figcaption>
									<div>
										<h2>Graduate Full Time <span>Masters & Doctorates</span></h2>
										<p>Offered through KSAS</p>
									</div>
									<a href="academics/fields/#filter=.full_time_program" data-filter=".full_time_program" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Graduate FT');"><p>Explore all 22 academic departments</p></a>
								</figcaption>			
							</figure>
							<figure class="effect-sarah">
								<img src="<?php echo get_template_directory_uri() ?>/assets/images/frontpage/gradpt.jpg" class="" alt="">
								<figcaption>
									<div>
										<h2>Graduate Part Time <br><span>Online Masters & Certificates</span></h2>
										<p>Offered through AAP</p>
									</div>
									<a href="academics/fields/#filter=.part_time_program" data-filter=".full_time_program" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Graduate PT');"><p>Explore all 22 academic departments</p></a>
								</figcaption>			
							</figure>
							<figure class="effect-sarah">
								<img src="<?php echo get_template_directory_uri() ?>/assets/images/frontpage/dept.jpg" class="" alt="">
								<figcaption>
									<div>
										<h2>Explore all of <br><span>Johns Hopkins</span></h2>
										<p>Search the other 8 divisions within Johns Hopkins University</p>
									</div>
									<a href="academics/fields/#filter=.part_time_program" data-filter=".full_time_program" onclick="ga('send', 'event', 'Fields', 'Homepage', 'Graduate PT');"><p>Search JHU</p></a>
								</figcaption>			
							</figure>							
						</div>
				</div>

				<div class="row show-for-small hide-for-medium">
					<ul class="vertical menu programs">
						<li><a class="button" href="#">Undergraduate</a></li>
						<li><a class="button" href="#">Full-Time Masters & Doctorates</a></li>
						<li><a class="button" href="#">Part-Time Online Masters & Certificates</a></li>
						<li><a class="button" href="#">List of Departments</a></li>
						<li><a class="button" href="#">List of Majors & Minors</a></li>
					</ul>
				</div>
				
			</div>
		</div>
	</div>
</div>