<?php

class MindBreezeRequest extends \Mindbreeze\Request
{
  public $url = 'https://search.jh.edu:23440/api/v2/search';

  public $properties = [
    'title',                  // document title
    'Description',            // meta descriotion
    'content',                // query matching content
    'url',                    // document url
    'icon',                    // screenshot
    'datasource/fqcategory',  // is this a best bet?
  ];
}