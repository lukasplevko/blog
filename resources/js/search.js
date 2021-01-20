(function () {
	const axios = require('axios').default;
	const searchbar = document.querySelector('#searchbar');
	const dropdown = document.querySelector('.search__dropdown');
	const ball = document.querySelector('.search__ball');
	const ul = document.createElement('ul');


	searchbar.addEventListener('keyup', findArticles);
	var data = {};
	axios.get('/api/posts').then((response) => { data = response })

	function createElements (item) {
		var li = document.createElement('li');
		var a = document.createElement('a');

		a.href = `/post/${item.slug}`;
		a.innerText = item.title;
		li.appendChild(a);
		ul.appendChild(li);
	}

	function findArticles (e) {
		var query = searchbar.value;
		var results = [];
		if (e.keyCode == 8 && searchbar.value == '' && ul.hasChildNodes()) {
			ul.childNodes.forEach(child => {
				child.remove();
			})

		}
		data.data.forEach(item => {
			if (query != '') {
				if (item.title.toLowerCase().includes(query.toLowerCase())) {
					results.push(item);
				}
			}
		})

		if (results.length == 0 && ul.hasChildNodes()) {
			ul.childNodes.forEach(child => {
				child.remove();
			})
		}
		if (results.length > 0 && ul.hasChildNodes()) {
			ul.childNodes.forEach(child => {
				child.remove();
			})
		}

		if (results.length > 0) {
			dropdown.classList.add('search__dropdown--active');
			ball.classList.add('search__ball--active');

		} else if (e.keyCode == 27) {
			dropdown.classList.remove('search__dropdown--active');
			ball.classList.remove('search__ball--active');
			searchbar.value = '';
		}
		else {
			dropdown.classList.remove('search__dropdown--active');
			ball.classList.remove('search__ball--active');
		}
		results.forEach(item => {

			createElements(item)

		})
		dropdown.appendChild(ul);
		if (results.length < ul.childNodes.length) {
			ul.childNodes.forEach(child => {
				child.remove();
			});

		}




	}



}())