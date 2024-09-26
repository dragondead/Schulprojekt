

<div class="mainView">
	<div class="viewEditMember">
		<button class="memberButton" id="add" onclick="addMemberLine()">Hinzufügen</button>
		<button class="memberButton" id="cancelMember" onclick="cancel()">Abbrechen</button>
		<button class="memberButton" id="save" onclick="save()">Speichern</button>
		<button class="memberButton" id="change" onclick="changeMember()">Bearbeiten</button>
		<button class="memberButton" id="delete" onclick="deleteMember()">Löschen</button>
	</div>
	<div class="viewHeader">
	Mitgliederverwaltung
	</div>
	<div class="viewTable">
		<table id="members">
			<tr id="addMemberLine">
				<th>
					<div><input type="string" class="addMember"></div>
				</th>
				<th>
					<div><input type="string" class="addMember"></div>
				</th>
				<th>
					<div><input type="string" class="addMember"></div>
				</th>
				<th>
					<div><input type="string" class="addMember"></div>
				</th>
				<th>
					<div><input type="string" class="addMember"></div>
				</th>
				<th>
					<div><input type="string" class="addMember"></div>
				</th>
				<th>
					<div><input type="string" class="addMember"></div>
				</th>
			</tr>
			<tr>
				<th>Nachname</th>
				<th>Vorname</th>
				<th>Sportart</th>
				<th>Adresse</th>
				<th>Beitrag</th>
				<th>Eintritt</th>
				<th>Austritt</th>
			</tr>
			<tbody>
				<td><input class="changeMember" type="text" value="${row.name}" disabled></td>
				<td><input class="changeMember" type="text" value="${row.surname}" disabled></td>
				<td><input class="changeMember" type="text" value="${row.sports}" disabled></td>
				<td><input class="changeMember" type="text" value="${row.address}" disabled></td>
				<td><input class="changeMember" type="text" value="${row.fee}" disabled></td>
				<td><input class="changeMember" type="text" value="${row.joinedAt}" disabled></td>
				<td><input class="changeMember" type="text" value="${row.exitAt}" disabled></td>
				<td id="checkBoxBorder"><input id="deleteCheckbox" class="checkBox" type="checkbox"></td>
			</tbody>
		</table>
	</div>
</div>
<script>

	window.onload = getMember();
	
	function addMemberLine() {
		console.log(1);
		const element = document.getElementById("cancelMember");
		const style = window.getComputedStyle(element);
		
		if(style.display === "none") {
			console.log(2);
			document.getElementById("cancelMember").style.display = "initial";
			document.getElementById("addMemberLine").style.display = "table-row";
			document.getElementById("change").style.display = "none";
			document.getElementById("delete").style.display = "none";
			
		}else{
			
			
			console.log(3);
			const input = document.querySelectorAll(".addMember");
			input.forEach(input => input.value = "");
		}
	}
	
	function cancel() {
		document.getElementById("cancelMember").style.display = "none";
		document.getElementById("addMemberLine").style.display = "none";
		document.getElementById("change").style.display = "initial";
		document.getElementById("delete").style.display = "initial";
		document.getElementById("add").style.display = "initial";
		document.getElementById("save").style.display = "none";
		
		var inputs = document.getElementsByClassName('changeMember');
		for(var i = 0; i < inputs.length; i++) {
			inputs[i].disabled = true;
		}
		
		document.getElementById("checkBoxBorder").style.border = "none";
		document.getElementById("checkBoxBorder").style.background = "none";
		document.getElementById("deleteCheckbox").style.display = "none";
	}
	
	function changeMember() {
		
		document.getElementById("add").style.display = "none";
		document.getElementById("delete").style.display = "none";
		document.getElementById("cancelMember").style.display = "initial";
		document.getElementById("change").style.display = "none";
		document.getElementById("save").style.display = "initial";
		
		var inputs = document.getElementsByClassName('changeMember');
		for(var i = 0; i < inputs.length; i++) {
			inputs[i].disabled = false;
		}
		
	}
	
	function deleteMember() {
		
		document.getElementById("add").style.display = "none";
		document.getElementById("change").style.display = "none";
		document.getElementById("cancelMember").style.display = "initial";
		
		document.getElementById("checkBoxBorder").style.border = "1px solid #333";
		document.getElementById("checkBoxBorder").style.background = "#333";
		document.getElementById("deleteCheckbox").style.display = "table-row";
		
	}
	
	function getMember() {
		
		//const response = await fetch("");
		//const daten = await response.json();
		//const tableBody = document.querySelector('#members tbody');
		
		daten.forEach(row => {
			
			const tr = document.createElement("tr");
			
			tr.innerHTML = `
				<td><input type="text" value="${row.name}" disabled></td>
				<td><input type="text" value="${row.surname}" disabled></td>
				<td><input type="text" value="${row.sports}" disabled></td>
				<td><input type="text" value="${row.address}" disabled></td>
				<td><input type="text" value="${row.fee}" disabled></td>
				<td><input type="text" value="${row.joinedAt}" disabled></td>
				<td><input type="text" value="${row.exitAt}" disabled></td>
			`;
			
			tableBody.appendChild(tr);
		})
		
	}
</script>