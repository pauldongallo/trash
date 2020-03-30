<?php

Class Florist{

	function findID($id){
		$url="https://mabuhayflowers.com/wp-json/wp/v2/florists/".$id;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,$url);
		$result=curl_exec($ch);
		$florist = json_decode($result, true);
		// $florist['id'] = $florist['id'];
		$florist=$florist['title']['rendered'];
		return $florist;
	}

	function getAllFlorist(){

		$url="https://mabuhayflowers.com/wp-json/wp/v2/florists?per_page=100";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,$url);
		$result=curl_exec($ch);
		$florists = json_decode($result, true);
		foreach($florists as $note){
			$id = $note['id'];
			$title = $note['title']['rendered'];
			$data[]=[
				'id' => $id,
				'title' => $title,
			];
		}
		return $data;
	}

	public static function find_florist_chart($search){
		$data=[];
		if($search){
			$url="https://mabuhayflowers.com/wp-json/wp/v2/florists";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_URL,$url);
			$result=curl_exec($ch);
			$florists = json_decode($result, true);

			foreach($florists as $florist){
				$title = $florist['title']['rendered'];
				if($search == $title){
					$id = $florist['id'];
					$title = $florist['title']['rendered'];
					$data['florist']=[
						'id' => $id,
						'title' => $title,
					];			
				}
			}
		}
		return $data;
	}

}
$florist = New Florist();
