/* display the input rules (Post Job Form) */
function showRules() {
	var rulesWindow = document.getElementById("rulesWindow"); 
	rulesWindow.style.display = "block"; 
}

/* close the pop-up of input rules */
function hideRules() {
	var rulesWindow = document.getElementById("rulesWindow"); 	
	rulesWindow.style.display = "none";  	
}

/* initialize */
function init () {
	var rulesButton = document.getElementById("rulesButton");  
	var rulesCloseButton = document.getElementById("rulesCloseButton");  
		
	rulesButton.onclick = showRules;
	rulesCloseButton.onclick = hideRules;   	
}

window.onload = init;
