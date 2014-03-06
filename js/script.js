/*----------------------Menu----------------------------------*/
var flyteksempel = new Object();

(function(){

"use strict"

	flyteksempel.login = document.getElementById("login");
	
	var luk = document.getElementById("luk");
	luk.addEventListener("click",lukboxe);

	var logIn = document.getElementById("logIn");
	logIn.addEventListener("click", flytAlleBoxe);


})();

function flytAlleBoxe(){
	flyteksempel.login.classList.add("flyttet");
}
function lukboxe(){
	flyteksempel.login.classList.remove("flyttet");

}
/*----------------------Menu----------------------------------*/

