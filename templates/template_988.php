<?php 
date_default_timezone_set('Europe/Moscow'); 
define( 'CD_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
require_once(CD_PLUGIN_PATH .'templates/functions.php');

$management_contract = $house_data->management_contract;
$management_contract_files = $management_contract->management_contract_files;

// main-tab-3
$report = $house_data->report;
//$report_common                      = $report->common;
$report_communal_service            = $report->communal_service;
$report_claims_to_consumers         = $report->claims_to_consumers;
$house_report_quality_of_work_claims= $report->house_report_quality_of_work_claims;

?>


<div class="rwj-reforma-gkh-integrator">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-lg-4">
            <div id="rwj-integrator-ymap" style="width: 300px; height: 266px"></div>
        </div> 
        <div class="col-md-8 col-lg-8">
            <div class="row">
                <h2>Анкета дома <span id="full_address"><?php echo $full_address; ?></span></h2>
                <br>
                <div class="col-md-6 col-lg-6">
                    <table class="table table-condensed">
                        <tbody>
                            <tr><td>Общая площадь дома, кв.м</td><td><?php echo $house_data->area_total; ?></td></tr>
                            <tr><td>Наибольшее количество этажей</td><td><?php echo $house_data->floor_count_max; ?></td></tr>
                            <tr><td>Год ввода в эксплуатацию</td><td><?php echo $house_data->exploitation_start_year; ?></td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6 col-lg-6">
                    <table class="table table-condensed">
                        <tbody>
                            <tr><td>Последнее изменение анкеты</td><td><?php echo date("d.m.Y в H:i", strtotime($last_update) ); ?></td></tr>
                            <tr><td>Дата начала обслуживания дома</td><td><?php echo date("d.m.Y", strtotime($management_contract->date_start)); ?></td></tr>
                        </tbody>
                    </table>
                </div>                    
            </div>    
        </div>
    </div>
    <div class="row">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a data-toggle="tab" href="#main-tab-1">Паспорт</a></li>
            <li role="presentation"><a data-toggle="tab" href="#main-tab-2">Управление</a></li>
            <li role="presentation"><a data-toggle="tab" href="#main-tab-3">Отчеты по управлению</a></li>             
        </ul>
        <div class="tab-content">
            <div id="main-tab-1" class="tab-pane fade in active">
                <ul class="nav nav-tabs sub-nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a data-toggle="tab" href="#main-tab-1-tab-1">ОБЩИЕ СВЕДЕНИЯ</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#main-tab-1-tab-2">КОНСТРУКТИВНЫЕ ЭЛЕМЕНТЫ ДОМА</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#main-tab-1-tab-3">ИНЖЕНЕРНЫЕ СИСТЕМЫ</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#main-tab-1-tab-4">ЛИФТЫ</a></li>                
                    <li role="presentation"><a data-toggle="tab" href="#main-tab-1-tab-5">ПРИБОРЫ УЧЕТА</a></li>                
                </ul>    
                <div class="tab-content">
                    <div id="main-tab-1-tab-1" class="tab-pane fade in active">
                        <?php GetHTMLTable_pasport_general_information($house_data); ?>
                    </div>
                    <div id="main-tab-1-tab-2" class="tab-pane fade">
                        <?php GetHTMLTable_pasport_structural_elements_house($house_data); ?>
                    </div>
                    <div id="main-tab-1-tab-3" class="tab-pane fade">
                        <?php GetHTMLTable_systems_engineerings($house_data); ?>
                    </div>
                    <div id="main-tab-1-tab-4" class="tab-pane fade">
                        <?php GetHTMLTable_lifts($house_data); ?>
                    </div>
                    <div id="main-tab-1-tab-5" class="tab-pane fade">
                        <?php GetHTMLTable_metering_devices($house_data->metering_devices); ?>
                    </div>                    
                </div>
            </div>
            <div id="main-tab-2" class="tab-pane fade">
                <ul class="nav nav-tabs sub-nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a data-toggle="tab" href="#main-tab-2-tab-1">УПРАВЛЯЮЩАЯ ОРГАНИЗАЦИЯ</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#main-tab-2-tab-2">ВЫПОЛНЯЕМЫЕ РАБОТЫ (УСЛУГИ)</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#main-tab-2-tab-3">КОММУНАЛЬНЫЕ УСЛУГИ</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#main-tab-2-tab-4">ОБЩЕЕ ИМУЩЕСТВО</a></li>                
                    <li role="presentation"><a data-toggle="tab" href="#main-tab-2-tab-5">СВЕДЕНИЯ О КАПИТАЛЬНОМ РЕМОНТЕ</a></li>                
                    <li role="presentation"><a data-toggle="tab" href="#main-tab-2-tab-6">ОБЩИЕ СОБРАНИЯ</a></li>                
                </ul>                
                <div class="tab-content">
                    <div id="main-tab-2-tab-1" class="tab-pane fade in active"> 
                    <?php 
                        InsertHTMLManagementHead($company_name, $management_contract, 'management_organization_2_1'); 
                        GetHTMLTable_management_organization($house_data->management_contract, $files, 'management_organization_2_1');
                    ?>
                    </div>
                    <div id="main-tab-2-tab-2" class="tab-pane">                
                    <?php 
                        InsertHTMLManagementHead($company_name, $management_contract, 'SAMPLES_2_2'); 
                        GetHTMLTable_management_samples($house_data->services, 'SAMPLES_2_2');
                    ?>
                    </div>
                    <div id="main-tab-2-tab-3" class="tab-pane">                
                    <?php
                        InsertHTMLManagementHead($company_name, $management_contract, 'management_utilities_2_3'); 
                        GetHTMLTable_management_utilities($house_data->communal_services, 'management_utilities_2_3');
                    ?>
                    </div>
                    <div id="main-tab-2-tab-4" class="tab-pane">
                    <?php
                        InsertHTMLManagementHead($company_name, $management_contract, 'total_assets_2_4'); 
                        GetHTMLTable_total_assets($house_data->common_properties, 'total_assets_2_4');
                    ?>
                    </div>
                    <div id="main-tab-2-tab-5" class="tab-pane">                
                    <?php  
                        InsertHTMLManagementHead($company_name, $management_contract, 'overhaul_2_5'); 
                        GetHTMLTable_information_on_verhaul($house_data->overhaul, 'overhaul_2_5');
                    ?>
                    </div>
                    <div id="main-tab-2-tab-6" class="tab-pane">
                    <?php  
                        InsertHTMLManagementHead($company_name, $management_contract, 'general_meetings_2_6'); 
                        GetHTMLTable_general_meetings($house_data->common_meetings, 'general_meetings_2_6');
                    ?>
                    </div>                    
                </div>
            </div>
            <div id="main-tab-3" class="tab-pane fade">
                <ul class="nav nav-tabs sub-nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a data-toggle="tab" href="#main-tab-3-tab-1">ОБЩАЯ ИНФОРМАЦИЯ</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#main-tab-3-tab-2">ВЫПОЛНЕННЫЕ РАБОТЫ</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#main-tab-3-tab-3">ПРЕТЕНЗИИ ПО КАЧЕСТВУ РАБОТ</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#main-tab-3-tab-4">КОММУНАЛЬНЫЕ УСЛУГИ</a></li>                
                    <li role="presentation"><a data-toggle="tab" href="#main-tab-3-tab-5">ОБЪЕМЫ ПО КОММУНАЛЬНЫМ УСЛУГАМ</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#main-tab-3-tab-6">ПРЕТЕНЗИОННО-ИСКОВАЯ РАБОТА</a></li>
                </ul> 
                <div class="tab-content">
                    <div id="main-tab-3-tab-1" class="tab-pane fade in active">
                    <?php
                        InsertHTMLManagementHead($company_name, $management_contract, 'report_common_3_1'); 
                        GetHTMLTable_general_information($report->common, 'report_common_3_1');
                    ?>
                    </div>
                    <div id="main-tab-3-tab-2" class="tab-pane">
                    <?php 
                        InsertHTMLManagementHead($company_name, $management_contract, ''); 
                    ?>
                    </div>
                    <div id="main-tab-3-tab-3" class="tab-pane">
                    <?php 
                        InsertHTMLManagementHead($company_name, $management_contract, 'report_quality_of_work_claims_3_3'); 
                        GetHTMLTable_HouseReportQualityOfWorkClaims($report->house_report_quality_of_work_claims, 'report_quality_of_work_claims_3_3'); 
                    ?>
                    </div>
                    <div id="main-tab-3-tab-4" class="tab-pane">
                    <?php
                        InsertHTMLManagementHead($company_name, $management_contract, 'report_common_3_4');
                        GetHTMLTable_utilities($report->common, 'report_common_3_4');
                    ?>    
                    </div>                  
                    <div id="main-tab-3-tab-5" class="tab-pane">
                    <?php 
                        InsertHTMLManagementHead($company_name, $management_contract, 'communal_services_3_5');
                        GetHTMLTable_volume_public_services($house_data->communal_services, 'communal_services_3_5');
                    ?>    
                    </div>
                    <div id="main-tab-3-tab-6" class="tab-pane">
                    <?php 
                        InsertHTMLManagementHead($company_name, $management_contract, 'report_claims_to_consumers_3_6');
                        GetHTMLTable_HouseReportClaimsToConsumers($house_data->communal_services, 'report_claims_to_consumers_3_6');
                    ?>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>   