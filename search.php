<?php
/**
 * The template for displaying search results pages.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */


require __DIR__ . '/vendor/autoload.php';
/** Mindbreeze Search */
require_once( 'library/mindbreeze-search.php');

// http client 
//find way to not do "array..." on prod!
$http = new HttpExchange\Adapters\Guzzle6(new \GuzzleHttp\Client(array("verify"=> false )));

get_header(); ?>

<div class="main-wrap sidebar-right" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>


<article <?php post_class('main-content') ?> id="search-results overview">


    <?php

    try {

      $query = urlencode($_REQUEST['q']);
      
      // default page number
          $page = 1;

          if (isset($_REQUEST['resultsPageNum']) && $pageAsInt = (int) $_REQUEST['resultsPageNum']) {
            // valid number set in query string
            $page = $pageAsInt;
          }


      // create mindbreeze request
      $request = new MindBreezeRequest($http);
      $request->setQuery($query)->setPage($page);

      $response = $request->send();
      $response->parse(); ?>

      <h1 class="entry-title">Search Results: <strong><?php echo $query; ?></strong></h1>
      <h3>Your Search Returned <?php echo $response->pagination['total'];?> Results</h3>
      
        <ol>
            <?php 

            // display each result
            foreach ($response->records as $record) {
              //print_r($record); die();
            ?>
              <li class="search-result <?php if($record->data->datasource_fqcategory->value->str === 'BestBets:bestbets') : echo 'best-bet'; endif;?>"> 
                <?php if($record->data->datasource_fqcategory->value->str === 'BestBets:bestbets') : ?>
                  <div class="ribbon"><span>FEATURED</span></div>
                <?php endif;?>
                <h4 class="result-title"><a href='<?php echo $record->data->url->value->str; ?>'><?php echo $record->data->title->html; ?></a></h4>
                <p class="result-details">
                  <?php if (!empty ($record->data->description->value->str)) : echo $record->data->description->value->str .'<br />'; endif; ?>
                  <cite><?php echo $record->data->url->value->str; ?></cite>
                  <!--<?php echo $record->data->datasource_fqcategory->value->str;?>-->
                </p>
              <!--<?php echo $record->data->icon->html;?>-->
              </li>
            <hr>
        <?php } ?>

      </ol>
      <?php $site_path = site_url('/search'); ?>
    
      <nav aria-label="Pagination">
         <ul class="pagination">
          <?php 
          if ($response->pagination["prev"]) :
            $newPage = $page - 1 ;
             // an associative array containing the query var and its value
            $params = array('q' => $query, 'resultsPageNum' => $newPage);?>
            <li class="pagination-previous"><a href="<?php echo add_query_arg($params, $site_path);?>">PREV</a></li>
          <?php endif;
          if ($response->pagination["next"]) :
            $newPage = $page + 1 ;
            $params = array('q' => $query, 'resultsPageNum' => $newPage);?>
            <li class="pagination-next"><a href="<?php echo add_query_arg($params, $site_path);?>">NEXT</a></li>
          <?php endif;?>
        </ul>
      </nav>
  <?php } catch (\Exception $e) {

      print_r($e->getMessage());

      // use eceptions to react differently to different errors
      if ($e instanceof Mindbreeze\Exceptions\RequestException) {
        die('qeng undefined');
      } else if ($e instanceOf Mindbreeze\Exceptions\ResponseException) {
        die('error from guzzle');
      }

    }?>

</article>

<?php do_action( 'foundationpress_after_content' ); ?>
<aside class="sidebar">
      <div class="ecpt-page-sidebar">
          <div class="sidebar-content">
            <div class="sidebar_header">
              <h5 class="white">Search JHU Network</h5>
            </div>
            <p>You are currently searching the Krieger network. Try searching the <a href="https://www.jhu.edu/search/">JHU network</a> for websites beyond KSAS.</p>
          </div>
    </div>
</aside>

<?php get_footer();