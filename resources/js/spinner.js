(function () {

	let spinner = document.querySelector('#spinner');
	let logo = document.querySelectorAll('#logo path');

	spinner.scrollIntoView(true);
	document.body.classList.add('scroll--off')

	function hideSpinner () {
		spinner.classList.remove('spinner--active')
		document.body.classList.remove('scroll--off')

	}
	window.addEventListener('load', (event) => {
		setTimeout(() => {

			hideSpinner();
		}, 900);


	})

	return {

	}
}())