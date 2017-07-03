
$('.like').on('click', function(event) {
	event.preventDefault();

	// var photoId = event.target.parentNode.parentNode.dataset['photoid'];
	var isLike = event.target.previousElementSibling == null;
	var photoId = $('img#img_'+$(this).attr('idx')).attr('photo_id');
	var a_id = $(this).attr('id');
	var a_text = $(this).text();

	$.ajax({
		method: 'POST',
		headers: {
      		'X-CSRF-Token': $('meta[name="_token"]').attr('content')
    	},
		url: urlLike,
		data: {isLike: isLike, photoId: photoId, _token: token}
	})
	.done(function(response) {
		//change the page
		// console.log(isLike);
		// event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'Dislike' : 'Like';
		if (a_text == 'Like') {
			$('a#'+a_id).text('Unlike');
			// event.target.nextElementSibling.innerText = 'Dislike';
		} else {
			// event.target.PreviousElementSibling.innerText = 'Like';
			$('a#'+a_id).text('Like');
			
		}

		// if (response == '1')
		// 	$(this).text('Like');
		// else
		// 	$(this).text('Dislike');

		// $(this).text('asdasdasd');

	});

	// console.log(isLike)
});