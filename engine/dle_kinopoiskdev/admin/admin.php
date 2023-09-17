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
	<button type="submit" class="btn bg-teal btn-raised position-left"><i class="fa fa-floppy-o position-left"></i>{$lang['user_save']}</button>
</form>

<script>
    $(function() {
    	function ajax_save_option() {
    		var data_form = $('form').serialize();
    		$.post('/engine/ajax/controller.php?mod=kinopoiskdev_save', {data_form: data_form, action: 'options', user_hash: '{$dle_login_hash}'}, function(data) {
    			data = jQuery.parseJSON(data);
    			if (!data.success) {
    				Growl.error({
    					title: 'Ошибка сохранения!',
    					text: 'Проверьте права доступа к файлу настроек'
    				});
    			} else {
    				Growl.info({
    					title: 'Настройки применены!',
    					text: 'Настройки модуля были успешно сохранены',
    					icon: 'success'
    				});
    			}
    		});
    		return false;
    	}

    	$('body').on('submit', 'form', function(e) {
    		e.preventDefault();
    		ajax_save_option();
    		return false;
    	});
    });
</script>
HTML;

?>