<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>
<form method="POST" action="generatecode.php" name="registration">
    <div>
        <input type="text" placeholder="First Name" name="firstName">
    </div>
    <div>
        <input type="text" placeholder="Last Name" name="lastName">
    </div>
    <div>
        <input type="date" placeholder="Birth Date" name="date" min="1920-01-01" max="2022-3-30">
    </div>
    <div>
        <input type="text" name="email" placeholder="Email: example@gmail.com" id="email">
    </div>
    <div>
        <input type="radio" value="Male" name="gender" onClick="return false" onMouseDown="rC(this)">Male
        <input type="radio" value="Female" name="gender" onClick="return false" onMouseDown="rC(this)">Female
    </div>
    <div>
        <input type="password" placeholder="Password"  name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="pass">
        <i class="bi bi-eye-slash" id="togglePassword"></i>
    </div>
    <div>
        <input type="password" placeholder="Password Again" name="passwordAgain" id="pass1">
    </div>
    <div>
        <a href="index.php">Back</a>
        <input type="submit" value="Submit" name="Reg">
    </div>
</form>
<script >
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#pass");
    const password1 = document.querySelector("#pass1");

        togglePassword.addEventListener("click", function() {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            password1.setAttribute("type", type);
            this.classList.toggle("bi-eye");
        });
    rC = function(radioEl) {
	if(radioEl.checked == true) {
		radioEl.checked = false;
		return false;
	}
	else {
		radioEl.checked = true;
		return true;
	}
}
</script>