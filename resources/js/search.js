$(document).ready(function () {
	var availableTags = [

	];
	$.ajax({
		url: "/api/posts",
		success: function (data) {
			$(data).each(function (index, el) {
				availableTags.push({ label: el.title, value: `/post/${el.slug}` })
			})
			$("#searchbar").autocomplete({
				source: availableTags,
				select: function (event, ui) {
					window.location.href = ui.item.value;
				},
				appendTo: '.search__dropdown',
				autofocus: true

			});

		}

	});


});