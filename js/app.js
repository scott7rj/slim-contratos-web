function clearOnLogoutSystem() {
	$('#dvLoginTxtId').val('');
	$('#dvLoginTxtPwd').val('');
	$('#wrapb2').html('');
	$('#wrapb3').html('');
}
function loginSystem() {
	
	//[TODO] login call here
	$('#wrapb3').html('C999999 - JOSÉ SILVA - CECOP');

	buildMainMenuSystem();	

}
function logoutSystem() {
	clearOnLogoutSystem();
	resetLayoutSystem();
    clearAllBusinessContentSystem();
	$('#dvLoginTxtId').focus();
}
function buildMainMenuSystem() {
	$.get('./menu', {}, function(data) {
        $('#wrapb2').html(data);
        $('#dvMenuTxtPesquisa').focus();
    });
}
function callApi(destination, clearMenuSection) {
	let arr = destination.split("|");
	let url = arr[0];
	let method = arr[1];
	let divtarget = arr[2];
	console.log('url ' + url + ' divtarget '+ divtarget);
	if (method === 'GET') {
		$.get('./'+arr[0], {}, function(data) {
			$(divtarget).html(data);
		});
	} else if (method === 'POST') {
		$.post('./'+arr[0], {}, function(data) {
			$(divtarget).html(data);
		});
	} else if (method === 'PUT') {
		$.put('./'+arr[0], {}, function(data) {
			$(divtarget).html(data);
		});
	} else if (method === 'DELETE') {
		$.delete('./'+arr[0], {}, function(data) {
			$(divtarget).html(data);
		});
	} else {
		alert('Método não configurado, verifique menu.json');
		return;
	}
	if (clearMenuSection) {
	    document.getElementById("dvMenuTxtPesquisa").value = '';
	    document.getElementById("contentDropdown").style.display = "none";  
   }
}