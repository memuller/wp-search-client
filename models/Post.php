<?php 
	namespace SearchCN ;
	use Pest as Pest ;
	class Document {
		
		public $id ;

		public $author_email ;
		public $author_name ;
		
		public $title ;
		public $content ;
		public $excerpt ;
		public $comments_count ; 
		
		public $category_name ;
		public $tags ;

		function __construct($id) {
			$pest = new Pest(get_option('siteurl')) ;
			$post = get_post($id) ;

			$this->title = $post->post_title ;

			$request = $pest->get('/') ;

			update_option('wpsearch', $request);
		}
	}
 ?>