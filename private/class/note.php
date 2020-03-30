<?php
Class Note{

	// function agent_note($order_id){

	// 	$url="https://demo.dev.websavii.com/wp-json/wp/v2/notes";
	// 	$ch = curl_init();
	// 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 	curl_setopt($ch, CURLOPT_URL,$url);
	// 	$result=curl_exec($ch);
	// 	$notes = json_decode($result, true);

	// 	// $agent_notes=array();
	// 	// foreach($notes as $key => $note){
	// 	// 	$agent_note = $note['cmb2']['note_metabox']['note_agent_note_id'];
	// 	// 	if($order_id == $agent_note){
	// 	// 		// $agent_notes[] = array( 'id' => $note['id'], 'title' => $note['title']['rendered'], 'content' => $note['content']['rendered'] );
	// 	// 		$agent_notes=[
	// 	// 			'id' => $note['id']
	// 	// 		];
	// 	// 	}
	// 	// }
	// 	// return $agent_notes;

	// 	$data = array();
	// 	foreach($meta_data as $key => $value)
	// 	{
	// 		if($value->key=="shop_order_mbh_notes_agent")
	// 		{
	// 			if($value->value==)
	// 			$data[] = $epoch;
	// 		}

	// 	}
	// 	return $data;

	// }

	function agent_notes()
	{
		// $agent_notes=array();
		// foreach($notes as $key => $note){
		// 	$agent_note = $note['cmb2']['note_metabox']['note_agent_note_id'];
		// 	if($order_id == $agent_note){
		// 		// $agent_notes[] = array( 'id' => $note['id'], 'title' => $note['title']['rendered'], 'content' => $note['content']['rendered'] );
		// 		$agent_notes=[
		// 			'id' => $note['id']
		// 		];
		// 	}
		// }
		// return $agent_notes;

		$url="https://mabuhayflowers.com/wp-json/wp/v2/notes";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,$url);
		$result=curl_exec($ch);
		//$notes = json_decode($result, true);
		return $notes = json_decode($result, true);
		// return $result;
	}

	function agent_note($order_id){
		// var_dump($order_id);
		// echo $order_id;
		$agent_notes=array();

		$notes = self::agent_notes();
		foreach($notes as $key => $value){
			//var_dump($value['cmb2']['note_metabox']['note_agent_note_id']);
			$agent_id = $value['cmb2']['note_metabox']['note_agent_note_id'];
			if($order_id == $agent_id){
			 	// echo $agent_id;
			 	// $agent_notes=[
			 	// 	'id' => $value['id'],
			 	// 	'title' => $value['title']['rendered'],
			 	// 	'content' => $value['content']['rendered'],
			 	// ];
			 	// return $agent_notes;
			}
		}
		return $agent_notes = array( 'id' => $value['id'], 'title' => $value['title']['rendered'] );
		// foreach($notes as $key => $value){
		//  	$agent_order_id = $value['cmb2']['note_metabox']['note_agent_note_id'];
		//  	if($agent_order_id == $order->id){
		//  		$agent_notes['agent_notes'] = array( 'id' => $value['id'], 'title' => "323" );
		//  	}
		//  }

	}
} 
$note = New Note();