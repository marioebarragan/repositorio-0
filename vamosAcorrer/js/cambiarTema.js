$(function(){
	var claseActual = getCookie("currentClass");
	var clasePrevia = claseActual == "dark-mode" ? "light-mode" : "dark-mode";
	//$("#body").removeClass(clasePrevia);
	//$("#body").addClass(claseActual);
	$("#body").toggleClass(claseActual + " " + clasePrevia);
});

function setTheme() {
  var body = document.getElementById("body");
  var currentClass = body.className;
  body.className = currentClass == "dark-mode" ? "light-mode" : "dark-mode";
  setCookie("currentClass", body.className, 365);  
}