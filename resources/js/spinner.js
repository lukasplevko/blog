(function () {
	let spinner = document.querySelector('#spinner');
	let logo = document.querySelectorAll('#logo path');
	document.body.style.overflow = "hidden";

	spinner.scrollIntoView();

	function hideSpinner () {
		spinner.classList.remove('spinner--active')
		document.body.style.overflowY = "scroll"

	}
	window.addEventListener('load', (event) => {
		setTimeout(() => {

			hideSpinner();
		}, 900);


	})

	return {

	}
}())