<?php

class FileUploadController extends AppController {
  	public function index() {
		$post = '';
		if($this->request->is('post')) {  
			if(!empty($this->request->data['FileUpload']['file']['name'])) { 
				$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
				if(in_array($this->request->data['FileUpload']['file']['type'],$mimes)) { 
					$filename = $this->request->data['FileUpload']['file']['name'];   
					$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION)); 
					if( $ext == "csv" ) {
		 				$row = 1;
						if (($handle = fopen($this->request->data['FileUpload']['file']['tmp_name'], "r")) !== FALSE) {
						    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
						        $row++;
						        for ($c=0; $c < count($data); $c++) {  
						        	if($c == 0) {
						        		if($data[0] !== "Name") { 
											$post = array(
											    'name' => $data[0]
											    ,'email' => $data[1]
											    ,"valid" => 1
											    ,"created" => date("Y-m-d H:i:s")
											    ,"modified" =>date("Y-m-d H:i:s")
											); 
											if($this->FileUpload->saveAll($post)) {							 
												$this->set('title', __('File Uploaded successfuly'));
											}
											else {							 
												$this->set('title', __('Failed to upload'));
											}
						        		}
						        	} 
						        }  
						    }
						    fclose($handle);
						}
					}   
	 			}
	 			else {
	 				$this->set('title', __('Sorry, mime type not allowed'));   		 
				}

				$file_uploads = $this->FileUpload->find('all');
				$this->set(compact('file_uploads')); 
			}
			else {
				$this->set('title', __('Fail to upload file!'));   		
			}
		}
		else {
			$this->set('title', __('Please choose a file to upload'));  
		} 
	}
}
?>