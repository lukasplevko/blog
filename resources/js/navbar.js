(function () {
	let buttons = document.querySelectorAll('.nav-item--login');

	if (loggedIn) {
		buttons.forEach(btn => {
			btn.classList.add('nav-item--visible');
		})
	}
}())