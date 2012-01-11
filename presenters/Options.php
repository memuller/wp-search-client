<?php 
	namespace SearchCN ;

	class OptionsPresenter {
		
		// "routes" stuff to their appropriate function.
		static function present(){
			if (isset($_POST['submit'])) {
				self::post() ; 
			} else {
				self::index() ;
			}
		}

		// form post, updating options.
		static function post(){
			check_admin_referer('searchcn_update_options') ;

			if ($_POST['reindex_all_sites']) {
				new BatchIndexer() ;
			}
			update_site_option('searchcn_indexer_url', $_POST['indexer_url']) ;
			self::index();
		}

		// prints the options page
		static function index(){
			$indexer_url = get_site_option('searchcn_indexer_url') ;

			$flash = self::handle_flash_messages() ;

			require_once SearchCNViewsPath . 'options.php' ;
		}

		// == Helper methods.
		// sets an array with information to be used when printing flash messages.
		static function handle_flash_messages(){
			if (isset($_POST['submit'])) {
				if (isset($_POST['reindex_all_sites'])) {
					return array( 'type' => 'updated', 'text' => __('Reindexing of all sites is underway.') ) ;
				}

				return array( 'type' => 'updated', 'text' => __('Options Saved.') ) ;
			} else {
				return false ;
			}
		}
	}

 ?>