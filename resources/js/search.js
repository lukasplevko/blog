$(document).ready(function () {
	var availableTags = [

	];
	$.ajax({
		url: "/api/posts",
		success: function (data) {
			$(data).each(function (index, el) {
				availableTags.push({ value: el.title, link: `/post/${el.slug}` })
			})
			$("#searchbar").autocomplete({
				source: availableTags,
				select: function (event, ui) {
					window.location.href = ui.item.link;

				},
				appendTo: '.search__dropdown',
				autofocus: true

			});

		}

	});


});