OBS: 

Deixei tudo em 1 pagina so no front pra nao precisar instalar o npm com o mix js, mas sei muito bem sobre separar os script e estilos do html principal
Os scripts de importação tb estão tudo na mesma pagina, mas naturalmente pra um projeto grande criaria um layout pra extender nas paginas usando por exemplo o @extends('layouts.app').
Não usei o UUID por que sei que precisa fazer umas alterações no laravel e js(os - atrapalha no parse) pra funfar direito, e nao quis perder muito tempo nisso.
Nao usei o Vue pq é um projeto muito pequeno e nao justifica as configurações do vue.
Usei o DataTables e bootstrap pra estilização das paginas

Pra rodar o projeto, é so da o composer install, rodar o php artisan key:generate caso precise configurar um banco rodar o php artisan migrate e php artisan serve e ser feliz.