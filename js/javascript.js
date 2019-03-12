function sair() {
	var x;
	var r = confirm("Tem certeza que deseja sair?");
	if (r == true) {
		document.getElementById("sair").href = "../php/quebra_sessao.php";
	} else {

	}
}

function chamarTodos(){
	document.getElementById(queryChamados).value = "todos";
}
function chamarPendentes(){
	document.getElementById(queryChamados).value = "pendentes";
}
function chamarSolucionados{
	document.getElementById(queryChamados).value = "finalizado";
}