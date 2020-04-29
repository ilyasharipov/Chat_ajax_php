$(document).ready(function() {

	$('#chat_text_send').click(function() {
		// body...
		var chat_text = $('#chat_text').val();
		$.ajax({
			method: "POST",
			url: "chat_answer.php",
			data: {
				type: "send_message",
				message: chat_text,
				session_key: session_key
			}
		}).done(function (answer) {
			// body...
			// $('#chat_message').html( answer );
			$('#chat_text').val('');
		});
	});
	
	function app_message(data) {
		// body...
		var msg = "<div>" + data.date + " " + data.login + " : " + data.message + "</div>";
		// console.log( msg );
		$('#chat_message').append( msg );
	}

	function render_users(users) {
		// body...
		var html = "";
		for (var i = 0; i < users.length; i++) {
			html += "<div>"+ users[i].login +"</div>";
		}
		$('#chat_users').html( html );
	}

	setInterval(function() {
		// body...
		console.log( last_time );
		$.ajax({
			method: "POST",
			url: "chat_answer.php",
			dataType: "json",
			data: {
				type: "get_message",
				last_time: last_time
			}
		}).done(function( answer ) {
			// body...
			console.log( answer.users );
			render_users(answer.users);
			var n = answer.message.length;
			for (var i = 0; i < n; i++) {
				app_message(answer.message[i]);
				if ( i == n -1 ) {
					last_time = answer.message[i].unix;
				}
			}
			// $('#chat_message').html( answer );
		});
	}, 500);
	//------------------------------------
});