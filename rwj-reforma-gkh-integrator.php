<?php
/*
Plugin Name: rwj-reforma-gkh-integrator
Plugin URI: http://realwebjob.ru/rwj-reforma-gkh-integrator
Description: The plugin is designed to receive data from the site reformagkh.ru.
Version: 0.0.1
Author: Pavel Nikitin
Author URI: http://realwebjob.ru

Copyright 2015 Pavel Nikitin  (email: sayrom43@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Define plugin constants
define( 'CD_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_VERSION', '0.0.1' );
define( 'RWJ_REFORMA_GKH_INTEGRATOR_ENABLE_CACHE', true );

//мой движок для работы с базой, типа разделяю логику!
require_once(CD_PLUGIN_PATH .'assets/lib/sql_engine.php');
require_once( ABSPATH . 'wp-admin/includes/image.php' );
require_once( ABSPATH . 'wp-admin/includes/file.php' );
require_once( ABSPATH . 'wp-admin/includes/media.php' );

register_activation_hook(__FILE__, 		'rwj_reforma_gkh_integrator_activate');			//хук, срабатывает в момент активации плагина

add_action('admin_menu', 'rwj_reforma_gkh_integrator_create_menu');						//регистрируем пункт меню в панели управления
add_action('media_buttons', 'rwj_reforma_gkh_integrator_add_button', 15);				//добавим в редактор кнопку, для более удобной вставки шоткодов
// волшебная константа "15" - это приоритет, чем ниже приоритет тем выше будет отображаться кнопка.

add_action('wp_enqueue_scripts', 'rwj_reforma_gkh_integrator_scripts');
add_action('admin_enqueue_scripts', 'rwj_reforma_gkh_integrator_admin_scripts');

add_action('init', 'rwj_reforma_gkh_integrator_run');

add_filter( 'cron_schedules', 'cron_add_new' );											//регистрируем новые временные интервал для обновления каждые 5 минут и еженедельного
add_action('rwj_integrator_update_data_hook', 'rwj_update_data_task');					
add_action('rwj_integrator_download_file_hook', 'rwj_download_file');

register_deactivation_hook(__FILE__,	'rwj_reforma_gkh_integrator_deactivate');



function rwj_reforma_gkh_integrator_activate()											//хук, срабатывает в момент деактивации плагина
{
	define('ALTERNATE_WP_CRON', true);
																						// Создание необходимых для работы плагина таблиц в БД
	create_table_rwj_reforma_gkh_integrator_company_profile();							// Таблица для хранения информации о УК
	create_table_rwj_reforma_gkh_integrator_house_profile_data_988();					// Таблица для хранения профилей домов
	create_table_rwj_reforma_gkh_integrator_files();									// Таблица файлов

	//Параметры которые будет хранить WP, в своей внутренней таблице
	add_option('rwj_reforma_gkh_integrator_inn', 'Не задано');							// ИНН ук
	add_option('rwj_reforma_gkh_integrator_login', 'Не задано');						// Логин который предоставляет сайт www.reformagkh.ru
	add_option('rwj_reforma_gkh_integrator_password', 'Не задано');						// Пароль
	add_option('rwj_reforma_gkh_integrator_interval', 'Не задано');						// Временной интервал, как часто проверять изменения 
	add_option('rwj_reforma_gkh_soap_url', 'https://api.reformagkh.ru/api/wsdl');		
	add_option('rwj_reforma_gkh_integrator_full_address', '');

	if ( ! wp_next_scheduled( 'rwj_integrator_download_file_hook' )) {					// запускаем событие если оно еще не запущено, скачивать необходимые файлы каждые 5 минут
			wp_schedule_event( time(), five_minutes, 'rwj_integrator_download_file_hook' );
	}
}

function rwj_reforma_gkh_integrator_create_menu()
{
	add_options_page(
		'Интеграция данных с сайта reformagkh.ru',	//Текст, который будет использован в теге title на странице, настроек.
		'Интеграция (reformagkh.ru)',				//Текст, который будет использован в качестве называния для пункта меню.
		'manage_options',							//Название права доступа для пользователя, чтобы ему был показан этот пункт меню. Было - 8.
		//http://codex.wordpress.org/Roles_and_Capabilities#Capability_vs._Role_Table
		'rwj-reforma-gkh-integrator',				//Идентификатор меню. Нужно вписывать уникальную строку, пробелы не допускаются.Можно, также указать путь от папки плагина до файла, который будет отвечать за страницу настроек плагина, пр. my-plugin/options.php. В этом случае, следующий параметр указывать не обязательно.
		'rwj_reforma_gkh_integrator_options_page'	//Название функции, которая отвечает за код страницы этого пункта меню.
	);

	//add_action( 'admin_init', 'register_admin_menu_settings' );	
}

function rwj_reforma_gkh_integrator_add_button($args = array())
{
	// Check access
	if ( function_exists('current_user_can') && current_user_can('mange_options') ) 
	{
		die(_e('Hacker?', 'rwj_reforma_gkh_integrator'));
	}
	//plugins_url( 'assets/images/icon.png', __FILE__)
	?>
	<button class="btn btn-default" type="button" data-toggle="modal" data-target="#rwj-reforma-gkh-integrator-bootstrap-wrapper-shotcodes-form"><img src="<? echo plugins_url( 'assets/images/icon.png', __FILE__); ?>" alt="">Вставить шоткод</button>
	<div class="rwj-reforma-gkh-integrator-bootstrap-wrapper">		
		<div id="rwj-reforma-gkh-integrator-bootstrap-wrapper-shotcodes-form" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"><?echo __('Вставка шоткодов rwj-reforma-gkh-integrator', 'rwj-reforma-gkh-integrator'); ?></h4>
						<button class="close" type="button" data-dismiss="modal">×</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label for="selectShotCodeType"><? echo __('Тип шоткода', 'rwj-reforma-gkh-integrator'); ?></label>
								<select class="form-control" id="selectShotCodeType">
									<option>1</option>
								</select>
							</div>
							<div class="form-group">
								<label for="selectShotCodes"><? echo __('Шоткоды', 'rwj-reforma-gkh-integrator'); ?></label>
								<select class="form-control" id="selectShotCodes">
									<option>1</option>								
								</select>
							</div>
							<div class="form-group">
								<p><button type="button" class="btn btn-primary btn-lg"><? echo __('Вставить', 'rwj-reforma-gkh-integrator'); ?></button></p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div><?
	wp_enqueue_media();

	echo $button;
}

function rwj_reforma_gkh_integrator_options_page()
{
	echo "<h2>Основные настройки интеграции</h2>";
	rwj_reforma_gkh_integrator_change_organization();
	
	echo "<h3>Состояние базы:</h3>";
	rwj_reforma_gkh_integrator_get_table_house_profile_data_988();
}

function SelectedByInterval($value)
{
	if (get_option('rwj_reforma_gkh_integrator_interval') == $value) 
	{
		return ' selected';
	}
	else
		return '';
}

function rwj_reforma_gkh_integrator_change_organization()
{
	if (isset($_POST['rwj_reforma_gkh_integrator_base_setup_btn']))
	{
		// Проверка пользователя, а может ли он делать изменения
		if ( function_exists('current_user_can') && current_user_can('mange_options') )
			die(_e('Hacker?', 'rwj_reforma_gkh_integrator'));
		// Проверка, была ли отправка через нашу форму 	
		if (function_exists('check_admin_referer'))
		{
			check_admin_referer('rwj_reforma_gkh_integrator_base_setup');
		}
		
		$rwj_reforma_gkh_integrator_inn = $_POST['rwj_reforma_gkh_integrator_inn'];
		$rwj_reforma_gkh_integrator_login = $_POST['rwj_reforma_gkh_integrator_login'];
		$rwj_reforma_gkh_integrator_password = $_POST['rwj_reforma_gkh_integrator_password'];
		$rwj_reforma_gkh_integrator_interval = $_POST['rwj_reforma_gkh_integrator_interval'];
		
		update_option('rwj_reforma_gkh_integrator_inn', $rwj_reforma_gkh_integrator_inn);
		update_option('rwj_reforma_gkh_integrator_login', $rwj_reforma_gkh_integrator_login);
		update_option('rwj_reforma_gkh_integrator_password', $rwj_reforma_gkh_integrator_password);
		update_option('rwj_reforma_gkh_integrator_interval', $rwj_reforma_gkh_integrator_interval);

		wp_clear_scheduled_hook('rwj_integrator_update_data_hook');
		if ( ! wp_next_scheduled( 'rwj_integrator_update_data_hook' )) {
			wp_schedule_event( time(), get_option('rwj_reforma_gkh_integrator_interval'), 'rwj_integrator_update_data_hook' );
		}

		//rwj_download_file();
	}?>
	<div class="rwj-reforma-gkh-integrator-bootstrap-wrapper">
	<? echo "<form name='rwj_reforma_gkh_integrator_base_setup' method='post' action='".$_SERVER['PHP_SELF']."?page=rwj-reforma-gkh-integrator&amp;updated=true'>";
	// внутреняя кухня wordpress - защита от хакеров
	if (function_exists('wp_nonce_field'))
	{
		wp_nonce_field('rwj_reforma_gkh_integrator_base_setup');
	}?>		
		<div class="form-group">
			<td style='text-align:right;'>Инн организации:</td>
			<td><input type='text' name='rwj_reforma_gkh_integrator_inn' value='<? echo get_option('rwj_reforma_gkh_integrator_inn'); ?>'></td>
			<td style='color:#666666;'><i>Инн организации по которой требуется запрашивать информацию с сайта reformagkh.ru.</i></td>
		</div>
		<div class="form-group">
			<td style='text-align:right;'>Логин:</td>
			<td><input type='text' name='rwj_reforma_gkh_integrator_login' value='<? echo get_option('rwj_reforma_gkh_integrator_login'); ?>'></td>
			<td style='color:#666666;'><i>Логин для получения данных с сайта reformagkh.ru</i></td>
		</div>
		<div class="form-group">
			<td style='text-align:right;'>Пароль:</td>
			<td><input type='password' name='rwj_reforma_gkh_integrator_password' value='<? echo get_option('rwj_reforma_gkh_integrator_password'); ?>'></td>
			<td style='color:#666666;'><i>Пароль для получения данных с сайта reformagkh.ru</i></td>
		</div>
		<div class="form-group">
			<td style='text-align:right;'>Интервал:</td>
			<td>
				<select name='rwj_reforma_gkh_integrator_interval' style='width:170px; height:25px'>
					<option value='manually'".SelectedByInterval('manually').">В ручную</option>
					<option value='five_minutes'".SelectedByInterval('five_minutes').">Каждые 5 минут</option>
					<option value='hourly'".SelectedByInterval('hourly').">Ежечасно</option>
					<option value='twicedaily'".SelectedByInterval('twicedaily').">Дважды в день</option>
					<option value='daily'".SelectedByInterval('daily').">Ежедневно</option>
					<option value='weekly'".SelectedByInterval('weekly').">Еженедельно</option>
				</select>
			</td>					
			<td style='color:#666666;'><i>Как часто производить получение данных с сервера reformagkh.ru</i></td>
		</div>
		<div class="form-group">
			<td>&nbsp;</td>
			<td style='text-align:center'>
				<input type='submit' name='rwj_reforma_gkh_integrator_base_setup_btn' value='Сохранить' style='width:140px; height:25px'/>
			</td>
			<td>&nbsp;</td>
		</div>
	</div><?
}


//заполнение соответствующей таблици в нашей БД
function rwj_reforma_gkh_integrator_get_table_house_profile_data_988()
{
	if (isset($_POST['rwj_reforma_gkh_integrator_get_house_profile_988_btn']) )
	{
		// Проверка пользователя, а может ли он делать изменения
		if ( function_exists('current_user_can') && current_user_can('mange_options') )
			die(_e('Hacker?', 'rwj-reforma-gkh-integrator'));
		// Проверка, была ли отправка через нашу форму 	
		if (function_exists('check_admin_referer'))
		{
			check_admin_referer('rwj_reforma_gkh_integrator_get_table_house_profile_data_988');
		}	
		
		soap_exchange_data();

	}
	
	// Форма информации о организации
	echo "<form name='rwj_reforma_gkh_integrator_get_table_house_profile_data_988' method='post' action='".$_SERVER['PHP_SELF']."?page=rwj-reforma-gkh-integrator&amp;updated=true'>";
	
	// внутреняя кухня wordpress - защита от хакеров
	if (function_exists('wp_nonce_field'))
	{
		wp_nonce_field('rwj_reforma_gkh_integrator_get_table_house_profile_data_988');
	}
	
	echo 
		"<table>
			<tr>
				<td>&nbsp;</td>
				<td style='text-align:center'>
					<input type='submit' name='rwj_reforma_gkh_integrator_get_house_profile_988_btn' value='Получить данные' style='width:140px; height:25px'/>
				</td>
				<td>&nbsp;</td>
			</tr>
		</table>";
}

function rwj_reforma_gkh_integrator_run()
{	
	//Зарегистрируем наш шорткод, при установке плагина
	add_shortcode( 'house_profile_988', 'shortcode_house_profile_988' );
}

function rwj_reforma_gkh_integrator_scripts()
{
    wp_register_script('rwj_reforma_gkh_integrator_jquery',		'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
    wp_register_script('rwj_reforma_gkh_integrator_html5shiv',	'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js');
    wp_register_script('rwj_reforma_gkh_integrator_respond',	'https://oss.maxcdn.com/respond/1.4.2/respond.min.js');
    wp_register_script('rwj_reforma_gkh_integrator_bootstrap',	plugins_url( '/assets/js/bootstrap.min.js', __FILE__ ));
    wp_register_script('rwj_reforma_gkh_integrator_bootstrap_hack', plugins_url('assets/js/bootstrap-hack.js', __FILE__), false, '1.0.0', false);
	wp_register_script('rwj_reforma_gkh_integrator_ymaps_api',	'https://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU');	

	$script_params = array(
    	'full_address' => get_option('rwj_reforma_gkh_integrator_full_address')
	);
	wp_register_script('rwj_reforma_gkh_integrator_ymaps',	plugins_url( '/assets/js/rwj-integrator-ymap.js', __FILE__ ));
	wp_localize_script('rwj_reforma_gkh_integrator_ymaps', 'rwj_reforma_gkh_integrator_options', $script_params);

    
	wp_enqueue_script('rwj_reforma_gkh_integrator_jquery');
	wp_enqueue_script('rwj_reforma_gkh_integrator_html5shiv');
	wp_enqueue_script('rwj_reforma_gkh_integrator_respond');
	wp_enqueue_script('rwj_reforma_gkh_integrator_bootstrap');
	wp_enqueue_script('rwj_reforma_gkh_integrator_bootstrap_hack');
	wp_enqueue_script('rwj_reforma_gkh_integrator_ymaps_api');
	wp_enqueue_script('rwj_reforma_gkh_integrator_ymaps');
}

function rwj_reforma_gkh_integrator_admin_scripts()
{
	wp_register_script('rwj_reforma_gkh_integrator_admin_jquery',		'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
	wp_register_script('rwj_reforma_gkh_integrator_admin_bootstrap',	plugins_url( '/assets/js/bootstrap.min.js', __FILE__ ));
	wp_register_script('rwj_reforma_gkh_integrator_admin_bootstrap_hack', plugins_url('assets/js/bootstrap-hack.js', __FILE__), false, '1.0.0', false);

	wp_enqueue_script('rwj_reforma_gkh_integrator_admin_jquery');
	wp_enqueue_script('rwj_reforma_gkh_integrator_admin_bootstrap');
	wp_enqueue_script('rwj_reforma_gkh_integrator_admin_bootstrap_hack');	
}

function view($tmpl, $vals){
	extract($vals);
	ob_start();
	include($tmpl);
	$r = ob_get_contents();
	ob_end_clean();
	return $r;
}

function shortcode_house_profile_988($atts) {
	$addr = $atts["address"];
	$state = $atts["state"];
		
	$house_profile = get_house_profile_988($addr, $state);
	$company_name = get_company_name(true);

	if ($house_profile) {
		foreach ($house_profile as $house) {
			$full_address = base64_decode($house["full_address"]);			
			update_option('rwj_reforma_gkh_integrator_full_address', $full_address);			

			$house_profile_data = unserialize( base64_decode($house["house_profile_data"]) );
			$files = unserialize(base64_decode($house["files"]));

			return view(
				CD_PLUGIN_PATH .'templates/template_988.php',
				array(
					'full_address'	=> $full_address, 
					'last_update'	=> $house["last_update"],	
					'house_data'	=> $house_profile_data,
					'company_name'	=> base64_decode($company_name),
					'files'			=> $files
				)
			);
		}
	} else
		return "<h2>"._e('Data requested address missing in the database', 'rwj_reforma_gkh_integrator')."</h2>";
		// перевод: Данные по запрашиваему адресу отсутствуют в базе данных
}

function rwj_reforma_gkh_integrator_deactivate()
{
	delete_table_rwj_reforma_gkh_integrator_company_profile();
	delete_table_rwj_reforma_gkh_integrator_house_profile_data_988();
	delete_table_rwj_reforma_gkh_integrator_files();

	delete_option('rwj_reforma_gkh_integrator_inn');
	delete_option('rwj_reforma_gkh_integrator_login');
	delete_option('rwj_reforma_gkh_integrator_password');
	delete_option('rwj_reforma_gkh_integrator_interval');
	delete_option('rwj_reforma_gkh_integrator_full_address');
	delete_option('rwj_reforma_gkh_soap_url');
	delete_option('rwj_integrator_update_data_hook');

	remove_shortcode( 'house_profile_988');
	wp_clear_scheduled_hook('rwj_integrator_update_data_hook');
	wp_clear_scheduled_hook('rwj_integrator_download_file_hook');
}

function rwj_update_data_task()
{
	soap_exchange_data();
}

function rwj_download_file()
{
	$file_id = get_file_id_need_download();

	if ($file_id != 0) {
		set_time_limit (300);
		ini_set("memory_limit","64M");

		$url = get_option('rwj_reforma_gkh_soap_url');

		$client = new SoapClient($url, array('encoding'=>'utf8'));
		
		$login_params = array(
			'login' => get_option('rwj_reforma_gkh_integrator_login'),
			'password' => get_option('rwj_reforma_gkh_integrator_password')
		);

		$session_guid = $client->__soapCall('Login', $login_params);

		$headerbody = array(
				'authenticate' => $session_guid
		);

		$header = new SoapHeader($url, 'authenticate', $session_guid);
		$client->__setSoapHeaders($header);

		$file = $client->__soapCall('GetFileByID', array('file_id' => (int)$file_id));

		$tmpfname = tempnam(CD_PLUGIN_PATH.'files/', 'rwj');
		file_put_contents($tmpfname, base64_decode($file->data));
		$file_array = array();
		$file_array['name'] = $file->name;
		$file_array['tmp_name'] = $tmpfname;
		$wp_id = media_handle_sideload( $file_array, 0 );
		update_rwj_reforma_gkh_integrator_files_table(array('id' => (int)$file_id, 'name' => $file->name, 'need_update' => 1, 'wp_id' => $wp_id));
		@unlink( $file_array['tmp_name'] );
		@unlink( $tmpfname );

		$logout = $client->__soapCall('Logout', array());
	}
}

function cron_add_new( $schedules ) {
	$schedules['weekly'] = array(
		'interval' => 604800,
		'display' => 'Еженедельно'
	);
	$schedules['five_minutes'] = array(
		'interval' => 300,
		'display' => 'Каждые 5 минут'
	);
	return $schedules;	
}

?>