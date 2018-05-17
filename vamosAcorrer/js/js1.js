var alt= medioArbol(5);

document.getElementById("demo").innerHTML = alt;

function medioArbol(altura)
{
	var arbol="<br>";
for (var i = 1; i<= altura; i++) { 
    arbol += '*'.repeat(i) + "<br>";
	
} 	
return arbol;
}
