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


require_once('vendors/pest/Pest.php') ;
#require_once('vendors/haml/HamlParser.class.php') ;
require_once('models/Post.php');
require_once('models/BatchIndexer.php');
require_once('presenters/Options.php');

define(SearchCNViewsPath, ABSPATH.'wp-content/plugins/wp-search-client/views/');

// Hook when posts are published, calling new Document($post_id) .
function wpsearchcli_publish_post($post_id){
  $post = new SearchCN\Document($post_id) ;
}
add_action('publish_post', 'wpsearchcli_publish_post', 10, 1) ;

// Adds an admin page, calling OptionsPresenter::present() .
function wpsearchcli_options_menu(){
	add_submenu_page( 'settings.php', 'Indexing Settings', 'Indexing', 'manage_network', 'indexing', 'SearchCN\OptionsPresenter::present'  );
}
add_action( 'network_admin_menu', 'wpsearchcli_options_menu' ) ;


?>