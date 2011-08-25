<?php
/*
Plugin Name: Wordpress Search Client
Version: 0.0.1
Plugin URI: http://retrospectiva.deploy.cancaonova.com/projects/search-server
Description: Habilita conteúdo produzido em ambientes Wordpress a ser indexado na CN.
Author: Matheus Muller
Author URI: http://memuller.com
*/

/*
Copyright (c) 2011, Matheus Muller

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

function wpsearch_publish_post($post_id){
  $post = get_post($post_id) ;
  update_option('wpsearch', $post->post_title) ;
}


add_action('publish_post', 'wpsearch_publish_post', 10, 1) ;


?>
