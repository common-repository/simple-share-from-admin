<?php
/*
Plugin Name: Simple Share from Admin
Plugin URI: http://www.moscowcoffeereview.com/programming/simple-share-from-admin-wordpress-plugin/
Description: Adds simple links to manually share an individual post on Twitter or Facebook from the list of posts page in the admin interface. Nothing automatic - share just the stuff you want, when you feel like it.
Version: 1.0
Author: CoffeeMatt
Author URI: http://moscowcoffeereview.com/programming
*/

// This tells Wordpress to add something custom to the post management table
add_filter('manage_posts_columns', 'new_post_sharing_column', 5);

// And this is the custom thing being added, a new column with the heading 'Sharing'
function new_post_sharing_column($cols){
$cols['new_post_sharing'] = __('Sharing');
return $cols;
}

// For each post displayed in the posts table, this get called to fill in the Sharing column
add_action('manage_posts_custom_column', 'new_share_column', 5, 2);

// This actualy builds and displays the particular Twitter and Facebook share links
function new_share_column($col, $id){
switch($col){
  case 'new_post_sharing':
  $permalink = get_permalink($id);
  echo '<a href="https://twitter.com/intent/tweet?text=' . get_post($id)->post_title . '. ' . $permalink . '" target="_blank">Tweet this Post</a>' . '<br />'
    . '<a href="http://www.facebook.com/sharer/sharer.php?u=' . $permalink . '" target="_blank">Share on Facebook</a>';
  break;
  }
}

?>