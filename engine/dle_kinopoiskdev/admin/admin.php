<?php

/*
=====================================================
 (c) 2023 DLE-KinopoiskDev @mdwit and @webcubic
-----------------------------------------------------
 https://kinopoisk.dev/ | https://openmovieapi.dev/
-----------------------------------------------------
 This code is protected by copyright
=====================================================
*/

if ( !defined( 'DATALIFEENGINE' ) OR !defined( 'LOGGED_IN' )) {
	die( 'Hacking attempt!' );
}

require_once ENGINE_DIR . '/dle_kinopoiskdev/data/config.php';
require_once ENGINE_DIR . '/dle_kinopoiskdev/functions/admin.php';

echoheader( "<span class=\"text-semibold\">Parser API KinopoiskDev</span>", 'Настройка модуля парсер кинопоиск (kinopoisk.dev)' );

echo <<<HTML
<div class="navbar navbar-default navbar-component navbar-xs systemsettings">
	<ul class="nav navbar-nav visible-xs-block">
		<li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-tabs"><i class="fa fa-bars"></i></a></li>
	</ul>
	<div class="navbar-collapse collapse" id="navbar-tabs">
		<ul class="nav navbar-nav">
			<li class="active"><a onclick="ChangeOption(this, 'settings');" class="tip" title="Основные настройки модуля"><i class="fa fa-cog"></i> Основные настройки</a></li>
		</ul>
	</div>
</div>

<form action="" method="post" class="systemsettings">
    <div id="settings" class="panel panel-flat">
        <div class="panel-body border-bottom">Общие настройки модуля</div>
        <table class="table table-striped">
HTML;

showRow('Введите ваш API токен от kinopoisk.dev:', 'Вы можете написать боту <a href="https://t.me/kinopoiskdev_bot" target="_blank" rel="noreferrer">в телеграм</a>, он выдаст вам бесплатный токен от сервиса.', showInput(['settings[kinopoiskdev_token]', 'text', $config_kinopoiskdev['settings']['kinopoiskdev_token']]));

echo <<<HTML
	    </table>
	</div>
</form>
HTML;

?>