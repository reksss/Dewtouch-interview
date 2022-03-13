<?php
	class OrderReportController extends AppController{

		public function index(){

			$this->setFlash('Multidimensional Array.');

			$this->loadModel('Order');
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));
			// debug($orders);    

			$this->loadModel('Portion');
			$portions = $this->Portion->find('all',array('conditions'=>array('Portion.valid'=>1),'recursive'=>2));
			// debug($portions );   

		 	$orderKey = array_column($orders, 'Order'); 
			$orderDetailKey = array_column($orders, 'OrderDetail');  
 			$finalIngredients = array();
		 	for( $l = 0; $l< count($orderKey); $l++ ) {   
				$orderQty = array_column($orderDetailKey[$l], 'quantity'); 
				$orderNames = array_column(array_column($orderDetailKey[$l], 'Item'), 'name');   
			 	$key = 0;
			 	foreach ($orderNames as $oName) {  
				    for($i=0;$i<count($portions);$i++) {  
				    	if($oName == $portions[$i]['Item']['name']) { 
				    		$portionIng = array_column($portions[$i]['PortionDetail'], 'Part');  
				    		$porValue = $portions[$i]['PortionDetail'];    
				    		$ingName = array_column($portionIng, 'name');    
				    		asort($ingName); 
				    		$j = 0;
			 				foreach ($ingName as $iN) { 
			 					$addOn = (isset($finalIngredients[$iN])) ? $finalIngredients[$iN] : 0;
				    			$finalIngredients[$iN] = $addOn + $orderQty[$key] * $porValue[$j]['value'];
				    			$j++;
			 				}
				    	}
				    }
				    $key++;
				}  
				$order_reports[$orderKey[$l]['name']] = $finalIngredients;
				$finalIngredients = array();  
			} 

			// // To Do - write your own array in this format
			// $order_reports = array('Order 1' => array(
			// 							'Ingredient A' => 1,
			// 							'Ingredient B' => 12,
			// 							'Ingredient C' => 3,
			// 							'Ingredient G' => 5,
			// 							'Ingredient H' => 24,
			// 							'Ingredient J' => 22,
			// 							'Ingredient F' => 9,
			// 						),
			// 					  'Order 2' => array(
			// 					  		'Ingredient A' => 13,
			// 					  		'Ingredient B' => 2,
			// 					  		'Ingredient G' => 14,
			// 					  		'Ingredient I' => 2,
			// 					  		'Ingredient D' => 6,
			// 					  	),
			// 					);  

			$this->set('order_reports',$order_reports);

			$this->set('title',__('Orders Report'));
		}

		public function Question(){

			$this->setFlash('Multidimensional Array.');

			$this->loadModel('Order');
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));

			// debug($orders);exit;

			$this->set('orders',$orders);

			$this->loadModel('Portion');
			$portions = $this->Portion->find('all',array('conditions'=>array('Portion.valid'=>1),'recursive'=>2));
				
			// debug($portions);exit;

			$this->set('portions',$portions);

			$this->set('title',__('Question - Orders Report'));
		}

	}