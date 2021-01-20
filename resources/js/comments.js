
var textArea = document.querySelector('.comment__area');
var submitBtn = document.querySelector('.comment__btn');


const Comment = (function () {

	const axios = require('axios').default;
	var path = window.location.pathname;
	var commentSection = document.querySelector('.comment__list');


	function mountComments (response, isAddedByUser) {
		var li = '';
		if (isAddedByUser) {
			let data = response.data;
			let index = data.length - 1;
			li = document.createElement('li');
			li.classList.add('comment__list-item');
			li.innerHTML = `${data[index].user} | ${data[index].comment}`;
			commentSection.appendChild(li);
			li.scrollIntoView({ behavior: "smooth", block: "center" });
		} else {
			var data = response.data;
			data.forEach(data => {
				li = document.createElement('li');
				li.classList.add('comment__list-item');
				li.innerHTML = `${data.user} | ${data.comment}`;
				commentSection.appendChild(li);
			});

		}

	}

	function initComments () {

		axios.get(`${path}/api/comments`).then(function (response) {
			mountComments(response, false)
		})
	}
	function getComments (response) {

		axios.get(`${path}/api/comments`).then(function (response) {
			mountComments(response, true)
		})
	}
	function postComments () {
		var tagsToReplace = {
			'&': '&amp;',
			'<': '&lt;',
			'>': '&gt;'
		};

		function replaceTag (tag) {
			return tagsToReplace[tag] || tag;
		}

		function safe_tags_replace (str) {
			return str.replace(/[&<>]/g, replaceTag);
		}
		let text = textArea.value;

		var safeText = safe_tags_replace(text);
		axios.post(`${path}/comment`, {
			comment: safeText,
		}).then(function () {
			textArea.value = '';
			getComments();
		});
	}


	function addComment (e) {

		e.preventDefault();
		postComments();
	}
	function submitOnEnter (e) {
		if (e.keyCode === 13) {

			postComments()
		}
	}

	return {
		addComment: addComment,
		submitOnEnter: submitOnEnter,
		initComments: initComments
	}

}())


window.addEventListener('load', Comment.initComments);