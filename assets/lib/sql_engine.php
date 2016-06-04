<?php

//библиотека для работы по SOAP
require_once(CD_PLUGIN_PATH .'assets/lib/nusoap.php');

function create_table_rwj_reforma_gkh_integrator_house_profile_data_988()
{
	global $wpdb;
	$table_house_profile_data_988 = $wpdb->prefix.'rwj_reforma_gkh_integrator_house_profile_data_988';

	$sql = "
				CREATE TABLE ".$table_house_profile_data_988." (
				  `id` int(11) NOT NULL COMMENT 'Идентификатор дома.',
				  `period_id` int(11) NOT NULL COMMENT 'Идентификатор отчетного приода',
				  `state` int(11) NOT NULL COMMENT '1 - текущий, 2 - архивный',
				  `address` text NOT NULL COMMENT 'Полный адрес дома.',
				  `full_address` text NOT NULL COMMENT 'Адрес дома. Идентификатор для человека.',
				  `last_update` DateTime NOT NULL COMMENT 'Последнее изменение анкеты',
				  `last_task_update` DateTime NOT NULL COMMENT 'Последнее обновление данных',
				  `house_profile_data` text NOT NULL COMMENT 'Массив параметров.',
				  `files` text NOT NULL COMMENT 'Массив файлов.'
				)";
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
}

function create_table_rwj_reforma_gkh_integrator_company_profile()
{
	global $wpdb;
	$table_company_profile = $wpdb->prefix.'rwj_reforma_gkh_integrator_company_profile';

	$sql = "
				CREATE TABLE ".$table_company_profile." (
					`inn` VARCHAR(12) NULL DEFAULT NULL COMMENT 'Инн',
					`reporting_period_id` INT(11) NULL DEFAULT NULL COMMENT 'Отчетный период',
					`name_full` VARCHAR(255) NULL DEFAULT NULL COMMENT 'Полное наименование',
					`name_short` VARCHAR(255) NULL DEFAULT NULL COMMENT 'Краткое наименование юридического лица',
					`company_profile_data` TEXT NULL COMMENT 'Массив данных',
					`last_task_update` TIMESTAMP NOT NULL COMMENT 'Последнее изменение анкеты'
				)";
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
}

function create_table_rwj_reforma_gkh_integrator_files()
{
	global $wpdb;
	$table_files = $wpdb->prefix.'rwj_reforma_gkh_integrator_files';

	$sql = "
				CREATE TABLE ".$table_files." (
					`id` INT(11) NULL DEFAULT NULL COMMENT 'Идентификатор файла',
					`name` VARCHAR(255) NULL DEFAULT NULL COMMENT 'Имя файла',
					`need_update` int(1) NULL DEFAULT NULL COMMENT '0-требуется обновить файлы. 1-файлы обновлены.',
					`wp_id` INT(11) NULL DEFAULT NULL COMMENT 'Идентификатор файла в медиабиблиотеке wordpress',
					`house_id` INT(11) NULL DEFAULT NULL COMMENT 'Идентификатор файла'
				)";
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
}

function delete_table_rwj_reforma_gkh_integrator_house_profile_data_988()
{
	//создадим таблицу для хранения данных 
	global $wpdb;
	$table_house_profile_data_988 = esc_sql($wpdb->prefix.'rwj_reforma_gkh_integrator_house_profile_data_988');

	$wpdb->query("DROP TABLE IF EXISTS $table_house_profile_data_988");
	return $wpdb->show_errors;
}

function delete_table_rwj_reforma_gkh_integrator_company_profile()
{
	//создадим таблицу для хранения данных 
	global $wpdb;
	$table_company_profile = esc_sql($wpdb->prefix.'rwj_reforma_gkh_integrator_company_profile');

	$wpdb->query("DROP TABLE IF EXISTS $table_company_profile");
	return $wpdb->show_errors;
}

function delete_table_rwj_reforma_gkh_integrator_files()
{
	//создадим таблицу для хранения данных 
	global $wpdb;
	$table_files = esc_sql($wpdb->prefix.'rwj_reforma_gkh_integrator_files');

	$wpdb->query("DROP TABLE IF EXISTS $table_files");
	return $wpdb->show_errors;
}

//функция проверяет существует ли запись в базе по запрошиваемогу id-дома и id-периода
function HouseToDataBaseExist($house_id, $state)
{
	global $wpdb;
	$house_profile_988 = $wpdb->prefix.'rwj_reforma_gkh_integrator_house_profile_data_988';

	$count = $wpdb->get_var
	(
		$wpdb->prepare(
			"select count(*) from $house_profile_988 where id = %d and state = %d",
			$house_id,
			$state
		)
	);

	return $count;
}

function GetHouseLastUpdate($house_id, $state)
{
	global $wpdb;
	$house_profile_988 = $wpdb->prefix.'rwj_reforma_gkh_integrator_house_profile_data_988';

	return $wpdb->get_var
	(
		$wpdb->prepare(
			"select last_update from $house_profile_988 where id = %d and state = %d limit 1",
			$house_id,
			$state
		)
	);	
}

//функция проверяет существует ли запись в базе по запрошиваемогу ИНН и id-периода
function CompanyProfileToDataBaseExist($inn, $id)
{
	global $wpdb;
	$company_profile = $wpdb->prefix.'rwj_reforma_gkh_integrator_company_profile';

	$count = $wpdb->get_var
	(
		$wpdb->prepare(
			"select count(*) from $company_profile where inn = '%s' and reporting_period_id = %d",
			$inn,
			$id
		)
	);

	return $count;
}

//заполнение соответствующей таблици в нашей БД
function soap_exchange_data()
{
	set_time_limit (300);
	ini_set("memory_limit","64M");

	global $wpdb;
	$house_profile_988 = $wpdb->prefix.'rwj_reforma_gkh_integrator_house_profile_data_988';
	$company_profile_table	= $wpdb->prefix.'rwj_reforma_gkh_integrator_company_profile';

	$url = get_option('rwj_reforma_gkh_soap_url');

	$client = new SoapClient($url, array('encoding'=>'utf8'));
	
	$login_params = array(
		'login' => get_option('rwj_reforma_gkh_integrator_login'),
		'password' => get_option('rwj_reforma_gkh_integrator_password')
	);

	$localTimezone = new DateTimeZone('Europe/Moscow');
	date_default_timezone_set('Europe/Moscow');
	$last_task_update = new DateTime(date('Y-m-d H:i:s'));
	$last_task_update->setTimezone($localTimezone);
	
	$session_guid = $client->__soapCall('Login', $login_params);

	$headerbody = array(
			'authenticate' => $session_guid
	);

	$header = new SoapHeader($url, 'authenticate', $session_guid);
	$client->__setSoapHeaders($header);

	$PeriodList = $client->__soapCall('GetReportingPeriodList', array());
	$HouseList = $client->__soapCall('GetHouseList', array('inn' => (string)get_option('rwj_reforma_gkh_integrator_inn')));

	if ($PeriodList)	
		foreach ($PeriodList as $Period) {
			if ($Period->state == 1) {
				$company_profile = $client->__soapCall('GetCompanyProfile988', array('inn' => (string)get_option('rwj_reforma_gkh_integrator_inn'), 'reporting_period_id' => $Period->id));
				if (CompanyProfileToDataBaseExist($company_profile->inn, $Period->id) == 0) {
					$wpdb->insert(
						$company_profile_table,
						array( 
							'inn'					=>	esc_sql($company_profile->inn), 
							'reporting_period_id'	=>	esc_sql($Period->id), 
							'name_full'				=>	esc_sql(base64_encode($company_profile->name_full)),
							'name_short'			=>	esc_sql(base64_encode($company_profile->name_short)),
							'company_profile_data'	=>	esc_sql(base64_encode(serialize($company_profile->company_profile_data))),
							'last_task_update'		=>	esc_sql($last_task_update->format('Y-m-d H:i:s'))
						),
						array( 
							'%s', 
							'%d', 
							'%s', 
							'%s',
							'%s',
							'%s'
						)
					);
				} else {
					$wpdb->update(
						$company_profile_table,
						array( 
							'name_full'				=>	esc_sql(base64_encode($company_profile->name_full)),
							'name_short'			=>	esc_sql(base64_encode($company_profile->name_short)),
							'company_profile_data'	=>	esc_sql(base64_encode(serialize($company_profile->company_profile_data))),
							'last_task_update'		=>	esc_sql($last_task_update->format('Y-m-d H:i:s'))
						),	
						array(
							'inn'					=>	esc_sql($company_profile->inn),
							'reporting_period_id'	=>	esc_sql($Period->id)
						),
						array( '%s', '%s', '%s', '%s' ),
						array( '%d', '%d' )
					);
				}

				foreach ($HouseList as $House) {

					$HouseProfile988 = $client->__soapCall('GetHouseProfile988', array('house_id' => $House->house_id, 'reporting_period_id' => $Period->id));	

					$data = $HouseProfile988->house_profile_data;
					$management_contract = $data->management_contract;
					$management_contract_files = $management_contract->management_contract_files;
					$full_address = $HouseProfile988->full_address;

					if ($management_contract_files)		
					{	
						unset($house_files);
						foreach ($management_contract_files as $file_id)
						{
							$house_files[] = (int)$file_id;
							if (FileIdToDataBaseExists((int)$file_id) == 0){
								insert_table_rwj_reforma_gkh_integrator_files($House->house_id, array('id' => (int)$file_id, 'need_update' => 0));
							}
						}
					}
					
					
					if ($full_address->building=="" && $full_address->block=="" && $full_address->letter=="") {
						$full_addr = $full_address->region_short_name.'. '.$full_address->region_formal_name.', '.
									$full_address->city1_short_name.'. '.$full_address->city1_formal_name.', '.
									$full_address->street_short_name.'. '.$full_address->street_formal_name.', '.
									$full_address->house_number;
						$short_addr = $full_address->street_formal_name.'_'.$full_address->house_number;
					} elseif ($full_address->building!="") {
						$full_addr = $full_address->region_short_name.'. '.$full_address->region_formal_name.', '.
									$full_address->city1_short_name.'. '.$full_address->city1_formal_name.', '.
									$full_address->street_short_name.'. '.$full_address->street_formal_name.', '.
									$full_address->house_number.'/'.$full_address->building;
						$short_addr = $full_address->street_formal_name.'_'.$full_address->house_number.'/'.$full_address->building;
					} elseif ($full_address->block!="") {
						$full_addr = $full_address->region_short_name.'. '.$full_address->region_formal_name.', '.
								$full_address->city1_short_name.'. '.$full_address->city1_formal_name.', '.
								$full_address->street_short_name.'. '.$full_address->street_formal_name.', '.
								$full_address->house_number.' к. '.$full_address->block;
						$short_addr = $full_address->street_formal_name.'_'.$full_address->house_number.'_к.'.$full_address->block;
					} elseif ($full_address->letter!="") {
						$full_addr = $full_address->region_short_name.'. '.$full_address->region_formal_name.', '.
								$full_address->city1_short_name.'. '.$full_address->city1_formal_name.', '.
								$full_address->street_short_name.'. '.$full_address->street_formal_name.', '.
								$full_address->house_number.'-'.$full_address->letter;
						$short_addr = $full_address->street_formal_name.'_'.$full_address->house_number.'-'.$full_address->letter;
					}

					$last_update = date('Y-m-d H:i:s', strtotime($HouseProfile988->last_update));

					if (HouseToDataBaseExist($House->house_id, $Period->state) == 0) {
						// esc_sql - очистка переменной от SQLиньекций
						$wpdb->insert (
							$house_profile_988,
							array( 
								'id'					=>	esc_sql($HouseProfile988->house_id), 
								'period_id'				=>	esc_sql($Period->id), 
								'state'					=>	esc_sql($Period->state),
								'address'				=>	esc_sql(base64_encode($short_addr)),
								'full_address'			=>	esc_sql(base64_encode($full_addr)), 
								'last_update'			=>	esc_sql($last_update), 
								'last_task_update'		=>	esc_sql($last_task_update->format('Y-m-d H:i:s')),
								'house_profile_data'	=>	esc_sql(base64_encode(serialize($data))),
								'files'					=>	esc_sql(base64_encode(serialize($house_files)))
							),
							array( 
								'%d', 
								'%d', 
								'%d', 
								'%s',
								'%s',
								'%s',
								'%s',
								'%s',
								'%s' 
							)
						);

						echo '<h2>'.$full_address->street_formal_name.'_'.$full_address->house_number.'</h2>';
					} else {					
						if ($last_update!=get_last_update_house_profile($HouseProfile988->house_id, $Period->state)) {							
							$wpdb->update(
								$house_profile_988,
								array(
									'period_id'				=>	esc_sql($Period->id), 
									'address'				=>	esc_sql(base64_encode($short_addr)),
									'full_address'			=>	esc_sql(base64_encode($full_addr)), 
									'last_update'			=>	esc_sql($last_update), 
									'last_task_update'		=>	esc_sql($last_task_update->format('Y-m-d H:i:s')),
									'house_profile_data'	=>	esc_sql(base64_encode(serialize($data))),
									'files'					=>	esc_sql(base64_encode(serialize($house_files)))
								),
								array(
									'id'					=>	esc_sql($HouseProfile988->house_id),
									'state'					=>	esc_sql($Period->state)
								),
								array( '%d', '%s', '%s', '%s', '%s', '%s', '%s' ),
								array( '%d', '%d' )
							);

							set_null_need_update((int)$HouseProfile988->house_id);
						}
						echo '<h2>'.$last_update.' != '.get_last_update_house_profile($HouseProfile988->house_id, $Period->state).'</h2>';
					}
				}
			}
		}

	$logout = $client->__soapCall('Logout', array());
}

//возвращает информацию по запрашиваемому дому
function get_house_profile_988($house_addr, $state)
{
	global $wpdb;

	$house_profile = $wpdb->get_results(
		$wpdb->prepare(
			"
				select
					id,
					period_id,
					full_address,
					last_update,
					house_profile_data,
					files
				from
					{$wpdb->prefix}rwj_reforma_gkh_integrator_house_profile_data_988	
				where
					address = '%s' and state = %d
			",
			base64_encode($house_addr),
			$state
		),
		'ARRAY_A'
	);

	return $house_profile;
}


//возвращает название УК из профиля оргнизации
function get_company_name($get_short)
{
	global $wpdb;
	$company_profile = $wpdb->prefix.'rwj_reforma_gkh_integrator_company_profile';

	if ($get_short) {
		$company_name = $wpdb->get_var
		(
			$wpdb->prepare(
				"
					select 
						name_short 
					from 
						$company_profile
				",
				$field_name
			)
		);
	} else {
		$company_name = $wpdb->get_var
		(
			$wpdb->prepare(
				"
					select 
						name_full
					from 
						$company_profile
				",
				$field_name
			)
		);
	}	
	return $company_name;		
}

function FileIdToDataBaseExists($id)
{
	global $wpdb;
	$table_files = $wpdb->prefix.'rwj_reforma_gkh_integrator_files';

	$count = $wpdb->get_var
	(
		$wpdb->prepare(
			"select count(*) from $table_files where id = %d",
			$id
		)
	);

	return $count;
}

function insert_table_rwj_reforma_gkh_integrator_files($house_id, $element)
{
	global $wpdb;
	$table_files = $wpdb->prefix.'rwj_reforma_gkh_integrator_files';

	$wpdb->insert(
		$table_files,
		array( 
			'id'			=>	esc_sql($element["id"]), 
			'need_update'	=>	esc_sql($element["need_update"]),
			'house_id'		=>	esc_sql($house_id)
		),
		array( 
			'%d', 
			'%d',
			'%d'
		)
	);
}

function get_file_id_need_download()
{
	global $wpdb;
	$table_files = $wpdb->prefix.'rwj_reforma_gkh_integrator_files';

	$id = $wpdb->get_var(
		$wpdb->prepare(
			"select id from $table_files where need_update = %d limit 1",
			0
		)
	);
	if ($id) {	
		return $id;
	} else {
		return 0;
	}
}

function update_rwj_reforma_gkh_integrator_files_table($element)
{
	global $wpdb;
	$table_files = $wpdb->prefix.'rwj_reforma_gkh_integrator_files';

	$wpdb->update(
		$table_files,
		array(
			'name'				=>	esc_sql(base64_encode($element["name"])),
			'need_update'		=>	esc_sql($element["need_update"]),
			'wp_id'				=>	esc_sql($element["wp_id"])
		),
		array(
			'id'				=>	esc_sql($element["id"])
		),
		array( '%s', '%d', '%d'),
		array( '%d' )
	);
}

function get_file_by_id($id)
{
	global $wpdb;
	$table_files = $wpdb->prefix.'rwj_reforma_gkh_integrator_files';

	$file = $wpdb->get_results(
		$wpdb->prepare(
			"select * from $table_files where id = %d limit 1",
			$id
		),
		'ARRAY_A'
	);

	return $file;
}

function fileid_to_url($id)
{
	$files = get_file_by_id($id);
	if ($files)
		foreach ($files as $file) {
			return get_post_field('guid', $file["wp_id"]);
		}
	
}

function get_last_update_house_profile($house_id, $state)
{
	global $wpdb;
	$table = $wpdb->prefix.'rwj_reforma_gkh_integrator_house_profile_data_988';

	return $wpdb->get_var(
		$wpdb->prepare(
			"select last_update from wp_rwj_reforma_gkh_integrator_house_profile_data_988 where id = %d and state = %d limit 1",
			esc_sql($house_id),
			esc_sql($state)
		)		
	);
}

function set_null_need_update($house_id)
{
	global $wpdb;
	$table_files = $wpdb->prefix.'rwj_reforma_gkh_integrator_files';	

	$wpdb->update(
		$table_files,
		array(
			'need_update'		=>	0
		),
		array(
			'house_id'				=>	esc_sql($house_id)
		),
		array( '%d' ),
		array( '%d' )
	);
}

?>