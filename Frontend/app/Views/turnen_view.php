<div class="mainView">
	<div class="viewHeader">
	Turnen
	<div id="partnerHeader">Teilnehmer</div>
	</div>
	<div class="viewTable">
		<div class="information">
			<div class="item">Abteilungsleiter:</div>
			<div class="value">input</div>
			<div class="item">Trainingszeiten:</div>
			<div class="value">input</div>
			<div class="item">Anschrift:</div>
			<div class="value">input</div>
		</div>
		<div>
			<button class="sportsButton" id="addSportsman" onclick="addSportsman()">Hinzufügen</button>
			<button class="sportsButton" id="save">Speichern</button>
			<button class="sportsButton" id="cancel" onclick="cancel()">Abbrechen</button>
			<button class="sportsButton" id="removeSportsman" onclick="deleteSportsman()">Entfernen</button>
		</div>
		<div class="table">
			<table id="sportsman">
				<tr id="addSportsmanLine">
					<th>
						<div><input type="string" class="inputSportsman"></div>
					</th>
					<th>
						<div><input type="string" class="inputSportsman"></div>
					</th>
				</tr>
				<tr>
					<th>Nachname</th>
					<th>Vorname</th>
				</tr>
				<tr>
					<td>Test</td>
					<td>Test</td>
				</tr>
				<tr>
					<td>Test</td>
					<td>Test</td>
				</tr>
				<tr>
					<td>Test</td>
					<td>Test</td>
				</tr>
				<tr>
					<td>Test</td>
					<td>Test</td>
				</tr>
				<tr>
					<td>Test</td>
					<td>Test</td>
				</tr>
				<tr>
					<td>Test</td>
					<td>Test</td>
				</tr>
				<tr>
					<td>Test</td>
					<td>Test</td>
				</tr>
				<tr>
					<td>Test</td>
					<td>Test</td>
				</tr>
				<tr>
					<td>Test</td>
					<td>Test</td>
				</tr>
				<tr>
					<td>Test</td>
					<td>Test</td>
				</tr>
				<tr>
					<td>Test</td>
					<td>Test</td>
				</tr>
				<tr>
					<td>Test</td>
					<td>Test</td>
				</tr>
				<tr>
					<td>Test</td>
					<td>Test</td>
				</tr>
				<tr>
					<td>Test</td>
					<td>Test</td>
				</tr>
				<tr>
					<td>Test</td>
					<td>Test</td>
				</tr>
				<tr>
					<td>Test</td>
					<td>Test</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<script>
	function addSportsman() {
		console.log(1);
		const element = document.getElementById("cancel");
		const style = window.getComputedStyle(element);
		
		if(style.display === "none") {
			console.log(2);
			document.getElementById("cancel").style.display = "initial";
			document.getElementById("save").style.display = "initial";
			document.getElementById("addSportsmanLine").style.display = "table-row";
			document.getElementById("addSportsman").style.display = "none";
			document.getElementById("removeSportsman").style.display = "none";
			
		}else{
			
			
			console.log(3);
			const input = document.querySelectorAll(".addMember");
			input.forEach(input => input.value = "");
		}
	}
	
	function cancel() {
		document.getElementById("cancel").style.display = "none";
		document.getElementById("removeSportsman").style.display = "initial";
		document.getElementById("addSportsman").style.display = "initial";
		document.getElementById("save").style.display = "none";
		document.getElementById("addSportsmanLine").style.display = "none";
		
		var inputs = document.getElementsByClassName('changeMember');
		for(var i = 0; i < inputs.length; i++) {
			inputs[i].disabled = true;
		}
		
		document.getElementById("checkBoxBorder").style.border = "none";
		document.getElementById("checkBoxBorder").style.background = "none";
		document.getElementById("deleteCheckbox").style.display = "none";
	}
	
	function deleteSportsman() {
		
		document.getElementById("cancel").style.display = "initial";
		document.getElementById("save").style.display = "none";
		document.getElementById("addSportsmanLine").style.display = "table-row";
		document.getElementById("addSportsman").style.display = "none";
		document.getElementById("removeSportsman").style.display = "initial";		
	}
</script>