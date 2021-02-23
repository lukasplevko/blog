const { comment } = require("postcss");

var path = window.location.pathname;
$(document).ready(function () {
	$('#comments-container').comments({
		postCommentOnEnter: true,
		enableReplying: false,
		enableNavigation: false,
		enableUpvoting: false,
		profilePictureURL: 'https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png',
		getComments: function (success, error) {

			axios.get(`${path}/api/comments`)
				.then(function (response) {

					success(response.data)


				})
				.catch(function (error) {

					console.log(error);
				})
				.then(function () {
					// always executed
				});

		},
		deleteComment: function (commentJSON, success, error) {
			axios.delete(`${path}/comment/` + commentJSON.id, {


			})
				.then(function (response) {
					success(commentJSON)
				})
				.catch(function (error) {
					console.log(error);
				});
		},
		putComment: function (commentJSON, success, error) {

			axios.put(`${path}/comment/` + commentJSON.id, {
				content: commentJSON.content,
				comment_id: commentJSON.id,

			})
				.then(function (response) {
					success(commentJSON)
				})
				.catch(function (error) {
					console.log(error);
				});
		},
		postComment: function (commentJSON, success, error) {
			let axiosConfig = {
				headers: {
					'Content-Type': 'application/json;charset=UTF-8',
					"Access-Control-Allow-Origin": "*",
				}
			};
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type: "POST",
				url: `${path}/comment`,
				data: {
					content: commentJSON.content,
					comment_id: commentJSON.id
				},
				success: success(commentJSON),

			});
			// axios.post(`${path}/comment`, {
			// 	content: commentJSON.content,
			// 	comment_id: commentJSON.id,

			// }, axiosConfig)
			// 	.then(function (response) {
			// 		success(commentJSON)
			// 	})
			// 	.catch(function (error) {
			// 		console.log(error);
			// 	});
		},
	});

})
