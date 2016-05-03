$("#ville").change(event => {
	alert("rien");
	$.get(`townlocalitechanges`, function(res, sta){
		$("#town").empty();
		res.forEach(element => {
			$("#commune").append(`<option value=${element.id}> "rien "</option>`);
		});
	});
});