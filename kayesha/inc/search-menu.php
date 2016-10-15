<?php

function menu_fix_on_search_page( $query ) {
   if(is_search()){
       $query->set( 'post_type', array(
        'attachment', 'post', 'nav_menu_item', 'film', 'music'
          ));
         return $query;
         }
   }
if( !is_admin() ) add_filter( 'pre_get_posts', 'menu_fix_on_search_page' );
