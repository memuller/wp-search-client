<?php 
	namespace SearchCN ;
	
	class BatchIndexer {

		public $post, $author ; 
		private $client ; 

		function __construct($id='all') {
			global $wpdb ;
			if ($id == 'all') {
				$blogs = $wpdb->get_col("select blog_id from $wpdb->prefix where public = 1 and archived = 0");
				foreach ($blogs as $blog) {
					new BatchIndexer($blog) ;
				}
			} else {
				switch_to_blog($id);
				foreach (get_posts(array( 'numberposts' => -1, 'fields' => 'ids' )) as $i => $post) {
					new Document($post) ;
				}
			}
			restore_current_blog();
		}
	}
 ?>