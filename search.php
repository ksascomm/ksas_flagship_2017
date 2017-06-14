<?php
/**
 * The template for displaying search results pages.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
require_once TEMPLATEPATH . '/library/GoogleSearch.php';
get_header(); ?>

<div class="main-wrap" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>

<article <?php post_class('main-content') ?> id="search-results">
	<header>
		<h1 class="entry-title">Search</h1>
        <p>You are currently searching the Krieger network. Try searching the <a href="https://www.jhu.edu/search/">JHU network</a> for websites beyond KSAS.</p>
	</header>

	<?php
            try {
		$search = new KSAS_GoogleSearch();
		$resultsPageNum = 1;
		if (array_key_exists('resultsPageNum', $_REQUEST) ) {
			$resultsPageNum = $_REQUEST['resultsPageNum'];
		}
		$resultsPerPage = 10;
		$baseQueryURL = 'http://search.johnshopkins.edu/search?site=krieger_collection&client=ksas_frontend';
		$results = $search->query($_REQUEST['q'], $baseQueryURL, $resultsPageNum, $resultsPerPage);

		$hits = $results->getNumHits();
		$displayQuery = $results->getDisplayQuery();
		$docTitle = 'Search Results';
		$sponsored_result = $results->getSponsoredResult();
	?>

	<?php if ($hits > 0 ) { ?>
                <form class="search-form" action="<?php echo site_url('/search'); ?>" method="get">
                    <fieldset>
                        <label>
                            <input type="text" class="input-text" name="q" value="<?php echo $displayQuery ?>" />
                        </label>
                        <input type="submit" class="button" id="search_again" value="Search Krieger Network" />
                            <label for="search_again" class="screen-reader-text">
                            Search Again
                            </label>
                    </fieldset>
                </form>     
                <h2><?php _e( 'Results for:', 'foundationpress' ); ?> "<?php echo $displayQuery ?>"</h2>  
                <p>Results <strong><?php echo $results->getFirstResultNum() ?> - <?php echo $results->getLastResultNum() ?></strong> of about <strong><?php echo $hits ?></strong></p>
           
            <?php if (empty($sponsored_result) == false ) { ?>
    	        <div class="panel callout radius10" id="sponsored">
                    <h2 class="black">Featured Result</h2>
                    <h3><a href="<?php echo $sponsored_result['sponsored_url']; ?>"><?php echo $sponsored_result['sponsored_title']; ?></a><small class="italic"> &mdash;<?php echo $sponsored_result['sponsored_url']; ?></small></h3>
    	        </div>
             <?php } ?>   
            <div id="search-results">
                <ul>
           
                <?php while ($result = $results->getNextResult() ) {
                    // note what results are PDFs
                    $pdfNote = '';
                    if (preg_match('{application/pdf}', $result['mimeType']) ) {
                        $pdfNote = '<span class="black"><span class="fa fa-file-pdf-o" aria-hidden="true"></span> [PDF]</span>  ';
                } ?>
                    <li>
                        <h5><?php echo $pdfNote ?><a href="<?php echo $result['path'] ?>"><?php echo $result['title'] ?></a></h5>
                            <?php if (array_key_exists('description', $result) && $result['description'] ) { ?>
                                <p><?php echo $result['description'] ?></p>
                            <?php } ?>
                        <div class="url"><?php echo $result['path'] ?> - <?php echo $result['sizeHumanReadable'] ?></div>
                    </li>
                    <hr>
            <?php } ?>
                </ul>
            </div>
             
            <div class="section">

                <?php $notices = $results->getNotices(); foreach ($notices as $notice ) { ?>
                    <p class="notice"><?php echo $notice ?></p>
                <?php } ?>

                <ul class="pagination text-center">
                         
                     <?php foreach ($results->getResultsetLinks() as $resultsetLink ) { echo '<li>' . $resultsetLink . '</li>'; } ?>
                    <?php echo '<li>' . $results->getNextLink() . '</li>'; ?> 
                
                </ul>
                 
            </div>
        <?php } else {
        // no hits
        ?>
             
        <?php $notices = $results->getNotices(); foreach ($notices as $notice ) { ?>
            <p class="notice"><?php echo $notice ?></p>
         <?php } ?>
             
             <h3 class="black">There are no pages matching your search.</h3>
                <form class="search-form" action="<?php echo site_url('/search'); ?>" method="get">
                    <fieldset>
                        <label>
                            Search:
                            <input type="text" class="input-text" name="q" value="<?php echo $displayQuery ?>" />
                        </label>
                        <input type="submit" class="button" id="search_again" value="Search Krieger Network" />
                            <label for="search_again" class="screen-reader-text">
                            Search Again
                            </label>
                    </fieldset>
                </form>        

        <?php }// End if().
        } catch (KSAS_GoogleSearchException $e ) {
        $docTitle = 'Search Temporarily Unavailable';
        ?>
        
    <div class="section">
        <p>We're sorry, the search engine is temporarily unavailable. Please try your search again later.</p>
    </div>

    <?php }// End try().
 ?>

</article>

<?php do_action( 'foundationpress_after_content' ); ?>
<?php get_sidebar(); ?>

</div>

<?php get_footer();