## Ako rozbehať appku

Otvor projekt vo visual studio code; <br>
Otvor si terminal,
v terminali píš nasledovne príkazy samostatne: <br>

<ul>
	<li><strong>composer install</strong> </li>
	<li><strong>npm install</strong></li>
	<li><strong>npm run dev</strong></li>
<ul>

<h2>po dokončení</h2>
v .env.example prepíš veci na udaje z tvojej ktoru si vytvoríš v php my admin
.env.example premenuj na .env
do terminalu napíš php artisan config:cache
potom
php artisan migrate

potom napíš php artisan serve a vyskočí ti localhost adresa
[Xampp alebo Wamp musia stále bežať v pozadí]
Ak máš nejaké problémy píš mi
