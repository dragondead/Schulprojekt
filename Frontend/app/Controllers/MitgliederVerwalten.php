<?php

namespace App\Controllers;

class MitgliederVerwalten extends BaseController
{
	
	
    public function index()
    {
		$viewData['users'] = $this->getUser();
		$viewData['addresses'] = $this->getAddress();
		
		//print_r($viewData['users']);
		//print_r($viewData['addresses']);
		
		echo view('templates/header');
		echo view('templates/navigation');
        echo view('mitglieder_view', $viewData);
		echo view('templates/footer');
		
    }
	
	private function getUser() {
		$url = "http://schule.tequu.ovh:52050/v1/member";
		$headers = ['x-secret: bihekbnrlkar4324bbdejfjm2'];
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$json = curl_exec($ch);

		$jsonArray = json_decode($json, true);
				
		$users = array();
		foreach ($jsonArray as $element){
			$user = [
				"id" =>$element["id"],
				"fee" => $element["fee"],
				"name" => $element["name"],
				"surname" => $element["surname"],
				"email" => $element["email"],
				"joinedAt" => $element["joinedAt"],
				"exitAt" => $element["exitAt"],
			];
			array_push($users, $user);
		}
		return $users;
	}
	
	private function getAddress() {
		$url = "http://schule.tequu.ovh:52050/v1/member";
		$headers = ['x-secret: bihekbnrlkar4324bbdejfjm2'];
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$json = curl_exec($ch);
		
		$jsonArray = json_decode($json, true);
		
		$addresses = array();
		foreach ($jsonArray as $element){
			$address = [
				"user_id" => $element["id"],
				"id" => $element["address"]["id"],
				"houseNumber" => $element["address"]["houseNumber"],
				"street" => $element["address"]["street"],
				"city" => $element["address"]["city"],
				"zip" => $element["address"]["zip"],
			];
			
			array_push($addresses, $address);
			}
		return $addresses;
	}
	
	public function postUser() {
		
		$lastname = $this->request->getVar('lastname');
		$firstname = $this->request->getVar('firstname');
		$email = $this->request->getVar('email');
		$address = $this->request->getVar('address');
		$fee = $this->request->getVar('fee');
		
		$addressArray1 = explode(", ", $address);
		$addressCity = explode(" ", $addressArray1[0]);
		$addressHouse = explode(" ", $addressArray1[1]);
		
		$addressArray2 = array(
			'houseNumber' => $addressHouse[1],
			'street' => $addressHouse[0],
			'city' => $addressCity[1],
			'zip' => $addressCity[0]
		);
		
		$userJSON = array(
			'fee' => $fee,
			'name' => $firstname,
			'surname' => $lastname,
			'email' => $email,
			'joinedAt' => date("Y-m-d\TH:i:s.v\Z"),
			'exitAt' => "",
			'address' => $addressArray2
		);

		$myJson = json_encode($userJSON);
		
		echo date("Y-m-d\TH:i:s.v\Z");
		echo $myJson;
		
		$url = "http://schule.tequu.ovh:52050/v1/member";
		$headers = ['x-secret: bihekbnrlkar4324bbdejfjm2',
					'Content-Type: application/json',
					'Accept: application/json'];
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $myJson);
		
		$response = curl_exec($ch);
		echo $response;
		
		return redirect()->to('/MitgliederVerwalten');
	}
	
	public function deleteUser() {
		
		$checkBoxes = $this->request->getVar('deleteCheckBox');
		
		print_r($checkBoxes);
		
		foreach($checkBoxes as $checkBox) {
			$deleteURL = "http://schule.tequu.ovh:52050/v1/member/" . $checkBox;
			$headers = ['x-secret: bihekbnrlkar4324bbdejfjm2'];
			
			$delete = curl_init();
			curl_setopt($delete, CURLOPT_CUSTOMREQUEST, "DELETE");
			curl_setopt($delete, CURLOPT_URL, $deleteURL);
			curl_setopt($delete, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($delete, CURLOPT_RETURNTRANSFER, true);
			
			$response = curl_exec($delete);
			
		}
		return redirect()->to('/MitgliederVerwalten');
	}
	
	public function putUser() {
		
		$userID = $this->request->getVar('hiddenID');
		$name = $this->request->getVar('name');
		$surname = $this->request->getVar('surname');
		$email = $this->request->getVar('nameEmail');
		$address = $this->request->getVar('nameAddress');
		$fee = $this->request->getVar('nameFee');
		$joinedAt = $this->request->getVar('joinedAt');
		$exitAt = $this->request->getVar('exitAt');
				
		for($x = 0; count($userID) > $x; $x++){
			
			$addressArray1 = explode(", ", $address[$x]);
			$addressCity = explode(" ", $addressArray1[0]);
			$addressHouse = explode(" ", $addressArray1[1]);

			$userArray = $this->getUserByID($userID[$x]);
			$jsonArray = json_decode($userArray, true);
			$addressID = $jsonArray['address'];
						
			$addressArray2 = array(
				'id' => $addressID['id'],
				'houseNumber' => (int)$addressHouse[1],
				'street' => $addressHouse[0],
				'city' => $addressCity[1],
				'zip' => $addressCity[0]
			);
			
			if($exitAt[$x] == ""){
				$exitAt[$x] = null;
			}
			$userJSON = array(
				'id' => (int)$userID[$x],
				'fee' => (int)$fee[$x],
				'name' => $name[$x],
				'surname' => $surname[$x],
				'email' => $email[$x],
				'joinedAt' => $joinedAt[$x],
				'exitAt' => $exitAt[$x],
				'address' => $addressArray2
			);
			
			$myJson = json_encode($userJSON, JSON_UNESCAPED_UNICODE);
		
			if($myJson != $userArray){
				$this->putUserByID($myJson, $userID[$x]);
			}			
		}
		
		return redirect()->to('/MitgliederVerwalten');
		
	}
	
	private function getUserByID($ID){
		
		$url = "http://schule.tequu.ovh:52050/v1/member/" . $ID;
		$headers = ['x-secret: bihekbnrlkar4324bbdejfjm2'];
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$json = curl_exec($ch);

		if (curl_error($ch)) {
		  echo "curl Fehler: " . curl_error($ch);
		} else if ($json === "") {
		  echo "Das JSON ist leer";
		} else {
		  // Verarbeite die JSON-Daten (z.B. mit json_decode)
		  //echo "Erfolgreich Daten erhalten";
		}
		
		$jsonArray = json_decode($json, true);
		return $json;
	}
	
	private function putUserByID($userJSON, $userID) {
		
		$putURL = "http://schule.tequu.ovh:52050/v1/member/" . $userID;
		$headers = ['x-secret: bihekbnrlkar4324bbdejfjm2', 'Content-Type: application/json', 'Content-Length: ' . strlen($userJSON)];
		
		$put = curl_init();
		curl_setopt($put, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($put, CURLOPT_URL, $putURL);
		curl_setopt($put, CURLOPT_HTTPHEADER,$headers);
		curl_setopt($put, CURLOPT_POSTFIELDS,$userJSON);
		curl_setopt($put, CURLOPT_RETURNTRANSFER, true);
		
		$response = curl_exec($put);
		echo $response;
		
	}
}
