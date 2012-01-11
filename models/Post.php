<?php 
	namespace SearchCN ;
	use Pest as Pest ;
	class Document {

		public $post ; 
		private $client ; 

		function __construct($id) {
			$this->post = get_post($id) ;
			if ($this->is_indexable()) {
				$this->build_client();
				$this->post();
			}
		}

		private function is_indexable(){
			return $this->post->post_type == 'post' && $this->post->post_status == 'publish' ;
		}

		private function build_client(){
			$this->client = new Pest(get_site_option('searchcn_indexer_url')) ;
		}

		private function build_post_arguments(){
			$arguments = array('document[title]' => $this->post->post_title,
				'document[uri]' => get_permalink($this->id),
				'document[exerpt]' => $this->post->post_excerpt
			 );
			 return $arguments ; 
		}

		private function post(){
			$result = $this->client->post( 
				'/documents', $this->build_post_arguments() );
			$this->debug($result);
		}

		private function debug($message){
			update_option('searchcn_debug', $message);
		}
	}
 ?>