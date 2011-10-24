<?php 
	namespace SearchCN ;
	use Pest as Pest ;
	class Document {

		const server_addr = "http://fedora:3000" ;
		public $post ; 
		private $client ; 

		function __construct($id) {
			$this->post = get_post($id) ;
			if ($this->is_indexable()) {				
				$this->index();
			}
		}

		private function is_indexable(){
			return $this->post->post_type == 'post' && $this->post->post_status == 'publish' ;
		}

		private function build_client(){
			$this->client = new Pest(self::server_addr) ;
		}

		private function build_post_arguments(){
			$arguments = array('document[title]' => $this->post->post_title,
				'document[uri]' => get_permalink($this->id),
				'document[exerpt]' => $this->post->post_excerpt
			 );
			 return $arguments ; 
		}

		private function index(){
			$this->build_client();
			$result = $this->client->post( 
				'/documents', $this->build_post_arguments() );
			$this->debug($result);
		}

		private function debug($message){
			update_option('search_debug', $message);
		}
	}
 ?>