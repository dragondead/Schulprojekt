

<div class="mainView">
	<form action="MitgliederVerwalten/postUser" method="post" id="form">
		<div class="viewEditMember">
			<button class="memberButton" type="submit" id="addMember">Mitglied Hinzufügen</button>
			<button class="memberButton" type="button" id="add" onclick="addMemberFunction()">Hinzufügen</button>
			<button class="memberButton" type="submit" id="save">Speichern</button>
			<button class="memberButton" type="button" id="change" onclick="changeMemberFunction()">Bearbeiten</button>
			<button class="memberButton" type="submit" id="deleteMember">Mitglieder Löschen</button>
			<button class="memberButton" type="button" id="delete" onclick="deleteMemberFunction()">Löschen</button>
			<button class="memberButton" type="button" id="cancelMember" onclick="cancel()">Abbrechen</button>
		</div>
		
		<div class="viewHeader">
		Mitgliederverwaltung
		</div>
		<div class="viewTable">
			<table id="members">
				<tr id="addMemberLine">
					<th>
						<div><input type="string" class="addMember" name="lastname"></div>
					</th>
					<th>
						<div><input type="string" class="addMember" name="firstname"></div>
					</th>
					<th>
						<div><input type="string" class="addMember" name="email"></div>
					</th>
					<th>
						<div><input type="string" class="addMember" name="address"></div>
					</th>
					<th>
						<div><input type="string" class="addMember" name="fee"></div>
					</th>
				</tr>
				<tr>
					<th id="name">Nachname</th>
					<th id="surname">Vorname</th>
					<th id="email">E-Mail</th>
					<th id="address">Adresse</th>
					<th id="fee">Beitrag</th>
					<th id="joinedAt">Eintritt</th>
					<th id="exitAt">Austritt</th>
				</tr>
				<?php
				foreach ($users as $user){
					$count = 0;
					$stringAddress = "";
					
					if($user['exitAt'] == null) {
						$exitDate = null;
					} else {
						$exitDate = date('Y-m-d', strtotime($user['exitAt']));
					}
					
					foreach ($addresses as $address){
						
						if ($address['user_id'] == $user['id']){
							$stringAddress .= $addresses[$count]['zip'] .= ' ';
							$stringAddress .= $addresses[$count]['city'] .= ', ';
							$stringAddress .= $addresses[$count]['street'] .= ' ';
							$stringAddress .= $addresses[$count]['houseNumber'];
							break;
						}
						$count += 1;
					}
					echo "<tr>";
					echo "<td hidden><input name='hiddenID[]' value=" . $user['id'] . "></td>";
					echo "<td><input class='changeMember' name='surname[]' id='surname" . $user['id'] . "'type='text' value='" . $user['surname'] . "'  disabled></td>";
					echo "<td><input class='changeMember' name='name[]' id='name" . $user['id'] . "' type='text' value='" . $user['name'] . "'  disabled></td>";
					echo "<td><input class='changeMember' name='nameEmail[]' id='email" . $user['id'] . "' type='text' value='" . $user['email'] . "'  disabled></td>";
					echo "<td><input class='changeMember' name='nameFee[]' id='fee" . $user['id'] . "' type='text' value='" . $user['fee'] . "'  disabled></td>";
					echo "<td><input class='changeMember' name='nameAddress[]' id='address" . $user['id'] . "' type='text' value='" . $stringAddress . "'  disabled></td>";
					echo "<td><input class='changeMember' name='joinedAt[]' id='joinedAt" . $user['id'] . "' type='text' value='" . date('Y-m-d', strtotime($user['joinedAt'])) . "'  disabled></td>";
					echo "<td><input class='changeMember' name='exitAt[]' id='exitAt" . $user['id'] . "' type='text' value='" . $exitDate . "'  disabled></td>";
					echo "<td class='checkBoxBorder'><input class='checkBox' id='deleteCheckbox" . $user['id'] . "' type='checkbox' name='deleteCheckBox[]' value=" . $user['id'] . "></td>";
					echo "</tr>";
					
				}
				?>
			</table>
		</div>
	</form>
</div>
<script>
	
	function addMemberToDatabase() {
		
		
		const input = document.querySelectorAll(".addMember");
			input.forEach(input => input.value = "");
	}
	
	function addMemberFunction() {
		console.log(1);
		const element = document.getElementById("cancelMember");
		const style = window.getComputedStyle(element);
		
		document.getElementById("addMemberLine").style.display = "table-row";
		document.getElementById("cancelMember").style.display = "initial";
		document.getElementById("addMember").style.display = "table-row";
		document.getElementById("add").style.display = "none";
		document.getElementById("change").style.display = "none";
		document.getElementById("delete").style.display = "none";
		document.getElementById("form").action = "MitgliederVerwalten/postUser";
	}
	
	function cancel() {
		document.getElementById("addMember").style.display = "none";
		document.getElementById("cancelMember").style.display = "none";
		document.getElementById("addMemberLine").style.display = "none";
		document.getElementById("change").style.display = "initial";
		document.getElementById("delete").style.display = "initial";
		document.getElementById("add").style.display = "initial";
		document.getElementById("save").style.display = "none";
		document.getElementById("deleteMember").style.display = "none";
		
		var inputs = document.getElementsByClassName('changeMember');
		for(var i = 0; i < inputs.length; i++) {
			inputs[i].disabled = true;
		}
		
		var inputs = document.getElementsByClassName('checkBoxBorder');
		for(var i = 0; i < inputs.length; i++) {
			inputs[i].style.display = "none";
		}
	}
	
	function changeMemberFunction() {
		
		document.getElementById("add").style.display = "none";
		document.getElementById("delete").style.display = "none";
		document.getElementById("cancelMember").style.display = "initial";
		document.getElementById("change").style.display = "none";
		document.getElementById("save").style.display = "initial";
		document.getElementById("form").action = "MitgliederVerwalten/putUser";
		
		var inputs = document.getElementsByClassName('changeMember');
		for(var i = 0; i < inputs.length; i++) {
			inputs[i].disabled = false;
		}
		
	}
	
	function deleteMemberFunction() {
		
		document.getElementById("add").style.display = "none";
		document.getElementById("change").style.display = "none";
		document.getElementById("delete").style.display = "none";
		document.getElementById("cancelMember").style.display = "initial";
		document.getElementById("deleteMember").style.display = "initial";
		document.getElementById("form").action = "MitgliederVerwalten/deleteUser";
		
		var inputs = document.getElementsByClassName('checkBoxBorder');
		for(var i = 0; i < inputs.length; i++) {
			inputs[i].style.display = "block";
		}
	}
</script>