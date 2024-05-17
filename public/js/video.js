video.addEventListener('ended', () =>{

	$.ajax({
		headers: {
			// POSTのときはトークンの記述がないと"419 (unknown status)"になるので注意
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
		type:'POST',
		url:'addLog/' + movie_id,
		dataType: 'json',
	}).done(function (results){
		// 成功したときのコールバック
	}).fail(function(jqXHR, textStatus, errorThrown){
		// 失敗したときのコールバック
	}).always(function() {
		// 成否に関わらず実行されるコールバック
	});
});
