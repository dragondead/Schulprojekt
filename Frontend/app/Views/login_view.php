<div class="loginContainer">
	<div class="loginWrapper">
		<h1>Mitglieder und Sportartenverwaltung</h1>

		<div class="formLogin">            
            <form action="" method="post">
				<div class="formGroupFirst">
					<label class="inputLabel">E-Mail</label>
                    <input class="inputField" type="email" name="email" value="">
				</div>

				<div class="formGroup">
					<label class="inputLabel">Passwort</label>
                    <input class="inputField" type="password" name="password">                 
				</div>

				<div class="formGroupButton">
					<input type="submit" class="loginButton" value="Login" onclick="checkLogIn()">
				</div>

				<!--                  
                 https://www.positronx.io/codeigniter-authentication-login-and-registration-tutorial/
                 https://www.youtube.com/results?search_query=codeigniter+4+login
                 
                 -->

			</form>
		</div>
	</div>
</div>
<script>
function checkLogIn(){
	document.write("Hello World");
	window.location.href = "Home";
}
</script>
