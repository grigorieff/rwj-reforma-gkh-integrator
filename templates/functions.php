<?php

function FormingOverhaulFundEnum($val)
{
    switch ($val) {
        case "1": return "На специальном счете организации";                  break;
        case "2": return "На специальном счете у регионального оператора";    break;
        case "3": return "На счете регионального оператора";                  break;
        case "4": return "Не определен";                                      break;            
    }
}

function HouseType988Enum($val)
{
    switch ($val) {
        case "1": return "Многоквартирный дом ";              break;
        case "2": return "Жилой дом блокированной застройки"; break;
        case "3": return "Общежитие";                         break;      
    }
}

function HouseEnergyEfficiencyClass988Enum($val)
{
    switch ($val) {
        case "1": return "Не присвоен";   break;
        case "2": return "A";             break;
        case "3": return "B++";           break;
        case "4": return "B+";            break;
        case "5": return "C";             break;
        case "6": return "D";             break;
        case "7": return "E";             break;
        case "8": return "F";             break;
    }   
}

function BoolToYesNo($val)
{
    if ($val)
    {
        return "Да";
    }
    else
    {
        return "Нет";
    }
}

function BoolToIsNotIs($val)
{
    if ($val)
    {
        return "Имеется";
    }
    else
    {
        return "Не имеется";
    }   
}

function IsEmptyString($val)
{
    if ($val == "" || $val == " ")
    {
        return "Не заполнено";
    } else
    {
        return $val;
    }
}

function HouseFoundationTypeEnum($val)
{
    switch ($val) { 
        case "1": return "Ленточный";       break;
        case "2": return "Бетонные столбы"; break;
        case "3": return "Свайный";         break;
        case "4": return "Иной";            break;
    }
}

function HouseFloorType988Enum($val)
{
    switch ($val) {
        case "1": return "Железобетонные";  break;
        case "2": return "Деревянные";      break;
        case "3": return "Смешанные";       break;
        case "4": return "Иные";            break;
    }   
}

function HouseWallMaterial988Enum($val)
{
    switch ($val) {
        case "1": return "Каменные, кирпичные"; break;
        case "2": return "Панельные";           break;
        case "3": return "Блочные";             break;
        case "4": return "Смешанные";           break;
        case "5": return "Деревянные";          break;
        case "6": return "Монолитные";          break;
        case "7": return "Иные";                break;            
    }
}

function HouseChuteTypeEnum($val)
{
    switch ($val) {
        case "1": return "Отсутствует";             break;
        case "2": return "Квартирные";              break;
        case "3": return "На лестничной клетке";    break;
    }  
}

function HouseFacadeTypeEnum($val)
{
    switch ($val) {
        case "1": return "Соответствует материалу стен";    break;
        case "2": return "Оштукатуренный";                  break;
        case "3": return "Окрашенный";                      break;
        case "4": return "Облицованный плиткой";            break;
        case "5": return "Облицованный камнем";             break;
        case "6": return "Сайдинг";                         break;
        case "7": return "Иной";                            break;
    }   
}

function HouseRoofTypeEnum($val)
{
    switch ($val) {
        case "1": return "Плоская"; break;
        case "2": return "Скатная"; break;
    }
}

function HouseRoofingTypeEnum($val)
{
    switch ($val) {
        case "1": return "Из волнистых и полуволнистых асбестоцементных листов (шиферная)"; break;
        case "2": return "Из оцинкованной стали";                                           break;
        case "3": return "Из металлочерепицы";                                              break;
        case "4": return "Из профилированного настила";                                     break;
        case "5": return "Из рулонных материалов";                                          break;
        case "6": return "Мягкая (наплавляемая) крыша";                                     break;
        case "7": return "Из иного материала";                                              break;
    }   
}

function HouseElectricalTypeEnum($val)
{
    switch ($val) {
        case "1": return "Отсутствует";     break;
        case "2": return "Центральное";     break;
        case "3": return "Комбинированное"; break;
    }   
}

function HouseHeatingTypeEnum($val)
{
    switch ($val) {
        case "1": return "Отсутствует";                                             break;
        case "2": return "Центральное";                                             break;
        case "3": return "Автономная котельная (крышная, встроенно-пристроенная)";  break;
        case "4": return "Квартирное отопление (квартирный котел)";                 break;
        case "5": return "Печное";                                                  break;
    }       
}

function HouseHotWaterTypeEnum($val)
{
    switch ($val) {
        case "1": return "Отсутствует";                                             break;
        case "2": return "Центральное (открытая система)";                          break;
        case "3": return "Центральное (закрытая система)";                          break;
        case "4": return "Автономная котельная (крышная, встроенно-пристроенная)";  break;
        case "5": return "Квартирное (квартирный котел)";                           break;
        case "6": return "Печное";                                                  break;
    }
}

function HouseColdWaterTypeEnum($val)
{
    switch ($val) {
        case "1": return "Отсутствует"; break;
        case "2": return "Центральное"; break;
        case "3": return "Автономное";  break;
    }
}

function HouseSewerageTypeEnum($val)
{
    switch ($val) {
        case "1": return "Отсутствует"; break;
        case "2": return "Центральное"; break;
        case "3": return "Автономное";  break;
    }
}

function HouseGasTypeEnum($val)
{
    switch ($val) {
        case "1": return "Отсутствует"; break;
        case "2": return "Центральное"; break;
        case "3": return "Автономное";  break;
    }
}

function HouseVentilationTypeEnum($val)
{
    switch ($val) {
        case "1": return "Отсутствует";                     break;
        case "2": return "Приточная вентиляция";            break;
        case "3": return "Вытяжная вентиляция";             break;
        case "4": return "Приточно-вытяжная вентиляция";    break;
    }
}

function HouseFirefightingTypeEnum($val)
{
    switch ($val) {
        case "1": return "Отсутствует";         break;
        case "2": return "Автоматическая";      break;
        case "3": return "Пожарные гидранты";   break;
        case "4": return "Пожарный кран";       break;
    }
}

function HouseDrainageTypeEnum($val)
{
    switch ($val) {
        case "1": return "Отсутствует";             break;
        case "2": return "Наружные водостоки";      break;
        case "3": return "Внутренние водостоки";    break;
        case "4": return "Смешанные";               break;
    }
}

function HouseLiftTypeEnum($val)
{
    switch ($val) {
        case "1": return "Пассажирский";        break;
        case "2": return "Грузовой";            break;
        case "3": return "Грузо-пассажирский";  break;
    }   
}

function HouseServiceNameEnum($val)
{
    switch ($val) {
        case "1": return "Работы (услуги) по управлению многоквартирным домом";                                                                                                                         break;
        case "2": return "Работы по содержанию помещений, входящих в состав общего имущества в многоквартирном доме";                                                                                   break;
        case "3": return "Работы по обеспечению вывоза бытовых отходов";                                                                                                                                break;
        case "4": return "Работы по содержанию и ремонту конструктивных элементов (несущих конструкций и ненесущих конструкций) многоквартирных домов";                                                 break;
        case "5": return "Работы по содержанию и ремонту оборудования и систем инженерно-технического обеспечения, входящих в состав имущества в многоквартирном доме";                                 break;
        case "6": return "Работы по содержанию и ремонту мусоропроводов в многоквартирном доме";                                                                                                        break;
        case "7": return "Работы по содержанию и ремонту лифта (лифтов) в многоквартирном доме";                                                                                                        break;
        case "8": return "Работы по обеспечению требований пожарной безопасности";                                                                                                                      break;
        case "9": return "Работы по содержанию и ремонту систем дымоудаления и вентиляции";                                                                                                             break;
        case "10":return "Работы по содержанию и ремонту систем внутридомового газового оборудования";                                                                                                  break;            
        case "11":return "Обеспечение устранения аварий на внутридомовых инженерных системах в многоквартирном доме";                                                                                   break;
        case "12":return "Проведение дератизации и дезинсекции помещений, входящих в состав общего имущества в многоквартирном доме";                                                                   break;
        case "13":return "Работы по содержанию земельного участка с элементами озеленения и благоустройства, иными объектами, предназначенными для обслуживания и эксплуатации многоквартирного дома";  break;
        case "14":return "Прочая работа (услуга)";                                                                                                                                                      break;
    }       
}

function HouseCommunalServiceTypeEnum($val)
{
    switch ($val) {
        case "1": return "Холодное водоснабжение";                                      break;
        case "2": return "Горячее водоснабжение";                                       break;
        case "3": return "Водоотведение";                                               break;
        case "4": return "Электроснабжение";                                            break;
        case "5": return "Отопление";                                                   break;
        case "6": return "Газоснабжение";                                               break;
        case "7": return "Холодная вода для нужд ГВС";                                  break;
        case "8": return "Тепловая энергия для подогрева холодной воды для нужд ГВС";   break;
        case "9": return "Газоснабжение для подогрева холодной воды для нужд ГВС";      break;
        case "10":return "Компонент на тепловую энергию для ГВС";                       break; 
    }
}

function CommunalServiceFillingFactEnum($val)
{
    switch ($val) {
        case "1": return "Предоставляется";     break;
        case "2": return "Не предоставляется";  break;
        case "3": return "Прекращено";          break;  
    }
}

function GetCurrentTariff($val)
{
    if ($val)
    {
        asort($val);
        $temp_cost = array_pop($val);
        return $temp_cost;
    } else
    {
        return -1;
    }
}

function UnitOfMeasureEnum($val)
{
    switch ($val) {
        case "1": return "кв.м";                                break;
        case "2": return "пог.м";                               break;
        case "3": return "шт.";                                 break;
        case "4": return "куб.м";                               break;
        case "5": return "Гкал";                                break;
        case "6": return "Гкал/кв.м";                           break;
        case "7": return "Гкал/час";                            break;
        case "8": return "Гкал*час/кв.м";                       break;
        case "9": return "Гкал/год";                            break;
        case "10": return "чел.";                               break;
        case "11": return "ед.";                                break;
        case "12": return "руб.";                               break;
        case "13": return "%";                                  break;
        case "14": return "°С*сут";                             break;
        case "15": return "км";                                 break;
        case "16": return "куб.м/сут.";                         break;
        case "17": return "куб.м/квартира";                     break;
        case "18": return "куб.м/чел.в мес.";                   break;
        case "19": return "Вт/куб.м";                           break;
        case "20": return "кВт";                                break;
        case "21": return "кВА";                                break;
        case "22": return "Вт/(куб.м*°С)";                      break;
        case "23": return "час";                                break;
        case "24": return "дн.";                                break;
        case "25": return "тыс.руб.";                           break;
        case "26": return "м";                                  break;
        case "27": return "кг";                                 break;
        case "28": return "кг/куб.м";                           break;
        case "29": return "мВт";                                break;
        case "30": return "кВт/куб.м";                          break;
        case "31": return "кВт/ч";                              break;
        case "32": return "кВт*ч";                              break;
        case "33": return "руб/куб.м";                          break;
        case "34": return "куб.м/кв.м";                         break;
        case "35": return "кВт.ч/кв.м";                         break;
        case "36": return "руб./Гкал";                          break;
        case "37": return "руб./кВт.ч";                         break;
        case "38": return "Гкал/чел.";                          break;
        case "39": return "Гкал/куб.м";                         break;
        case "40": return "кВт/чел.";                           break;
        case "41": return "кВт*ч/чел.в мес.";                   break;
        case "42": return "руб./1000куб.м.";                    break;
        case "43": return "куб.м/кв.м общ. имущества в мес.";   break;
        case "44": return "кВт*ч/кв.м общ. имущества в мес.";   break;
        default: return "Не заполнено";
    }
}

function CommunalServiceMethodEnum($val)
{
    switch ($val) {
        case "1": return "Предоставляется через договор управления";                break;
        case "2": return "Предоставляется через договор с ТСЖ и ЖСК";               break;
        case "3": return "Предоставляется через прямые договоры с собственниками";  break;
    } 

}

function СommunalServiceFillingFactEnum($val)
{
    switch ($val) {
        case "1": return "Предоставляется";     break;
        case "2": return "Не предоставляется";  break;
        case "3": return "Прекращено";          break;
    }     
}

function InsertHTMLManagementHead($uk_name, $management_contract, $data_target_id)
{
    echo '<div class="well">                
            <div class="row">
                <div class="col-md-4 col-lg-4"><h3>Текущая управляющая организация:</h3></div>
                <div class="col-md-4 col-lg-4"><h3>'.$uk_name.'</h3><br></div>
                <div class="col-md-4 col-lg-4"><h3><button class="btn btn-lg btn-default" data-toggle="collapse" data-target="#'.$data_target_id.'">Подробнее</button></h3></div>
            </div>
            <div class="row">
                <div class="col-md-4 col-lg-4"><p>Данные за период управления:</p></div>
                <div class="col-md-8 col-lg-8"><p>'.date("с d.m.Y по по настоящее время", strtotime($management_contract->date_start)).'</p></div>
            </div>
        </div>';
}

function GetHTMLTable_management_contract_files($files_id)
{
    echo '
        <div class="table-responsive">
            <table class="table table-condensed">
                <tbody>';
    if ($files_id)
	    foreach ($files_id as $id) {
	    	$files = get_file_by_id($id);
            if ($files)
            {            
                foreach ($files as $file) {
                	if (base64_decode($file["name"]) != '') {
        	    		echo '
        	                    <tr>
        	                        <td><a href="'.fileid_to_url($file["id"]).'">'.base64_decode($file["name"]).'</a></td>
        	                    </tr>';
                	}  else {
            		    echo '<tr><td>Файл поставлен в очередь на скачивание.</td></tr>';
            		}
                }
            }
	    }
	else
		echo '<tr><td>'.IsEmptyString('').'</td></tr>';
    echo '
                </tbody>
            </table>
        </div>';
}

function GetHTMLTable_HouseReportClaimsToConsumers($report, $data_target_id)
{
	echo '<div id="'.$data_target_id.'" class="collapse in">';
    echo '<div class="table-responsive">';
    echo '<table class="table table-condensed">';
    echo '  <tbody>';
    echo '      <tr>';
    echo '          <td>1</td>';
    echo '          <td>Направлено претензий потребителям-должникам</td>';
    echo '          <td>'.IsEmptyString($report->sent_claims_count).'</td>';
    echo '      </tr><tr>';    
    echo '          <td>2</td>';
    echo '          <td>Направлено исковых заявлений</td>';
    echo '          <td>'.IsEmptyString($report->filed_actions_count).'</td>';
    echo '      </tr><tr>';
    echo '          <td>3</td>';
    echo '          <td>Получено денежных средств по результатам претензионно-исковой работы</td>';
    echo '          <td>'.IsEmptyString($report->received_cash_amount).'</td>';
    echo '      </tr>';
    echo '  </tbody>';
    echo '</table>';
    echo '</div>';   
}

function GetHTMLTable_HouseReportQualityOfWorkClaims($report, $data_target_id)
{
    echo '  <div id="'.$data_target_id.'" class="collapse in">';
    echo '  <div class="table-responsive">';
    echo '      <table class="table table-condensed">';
    echo '      <tbody>';
    echo '          <tr>';
    echo '              <td>1</td>';
    echo '              <td>Количество поступивших претензий, ед</td>';
    echo '              <td>'.$report->claims_received_count.'</td>';
    echo '          </tr><tr>';
    echo '              <td>2</td>';
    echo '              <td>Количество удовлетворенных претензий, ед.</td>';    
    echo '           <td>'.$report->claims_satisfied_count.'</td>';
    echo '          </tr><tr>';
    echo '              <td>3</td>';
    echo '              <td>Количество претензий, в удовлетворении которых отказано, ед.</td>';
    echo '              <td>'.$report->claims_denied_count.'</td>';
    echo '          </tr><tr>';
    echo '              <td>4</td>';
    echo '              <td>Сумма произведенного перерасчета, руб.</td>';    
    echo '              <td>'.$report->produced_recalculation_amount.'</td>';
    echo '          </tr>';
    echo '      </tbody>';
    echo '      </table>';
    echo '  </div>';      
    echo '  </div>';      
}

function GetCadastralNumbers($cadastral_numbers)
{
    $r = '';
    if ($cadastral_numbers)
    {                                                            
        foreach ($cadastral_numbers as $cad_number)
        {
            $r .= $cad_number->cadastral_number.'<br>'; 
        }
    }    
    return $r;
}


function GetHTMLTable_pasport_general_information($data)
{
    echo '
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Год постройки</td>
                                        <td>'.$data->built_year.'</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Год ввода дома в эксплуатацию</td>
                                        <td>'.$data->exploitation_start_year.'</td>                                        
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Серия, тип постройки здания</td>
                                        <td>'.$data->project_type.'</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Тип дома</td>
                                        <td>'.HouseType988Enum($data->house_type).'</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Способ формирования фонда капитального ремонта</td>
                                        <td>'.FormingOverhaulFundEnum($data->method_of_forming_overhaul_fund).'</td>                   
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Дом признан аварийным</td>
                                        <td>'.BoolToYesNo($data->is_alarm).'</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td><b>Количество этажей:</b></td>
                                        <td></td>                                        
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>- наибольшее, ед.</td>
                                        <td>'.$data->floor_count_max.'</td>                                        
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>- наименьшее, ед.</td>
                                        <td>'.$data->floor_count_min.'</td>                                        
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Количество подъездов, ед.</td>
                                        <td>'.$data->entrance_count.'</td>                                        
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Количество лифтов, ед.</td>
                                        <td>'.$data->elevators_count.'</td>                                        
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td><b>Количество помещений, в том числе:</b></td>
                                        <td>'.$data->flats_count.'</td>                                        
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>- жилых, ед.</td>
                                        <td>'.$data->living_quarters_count.'</td>                                        
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>- нежилых, ед.</td>
                                        <td>'.$data->not_living_quarters_count.'</td>                                        
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td><b>Общая площадь дома, в том числе, кв.м:</b></td>
                                        <td>'.$data->area_total.'</td>                                        
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>- общая площадь жилых помещений, кв.м</td>
                                        <td>'.$data->area_residential.'</td>                                        
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>- общая площадь нежилых помещений, кв.м</td>
                                        <td>'.$data->area_non_residential.'</td>                                        
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>- общая площадь помещений, входящих в состав общего имущества, кв.м</td>
                                        <td>'.$data->area_common_property.'</td>                                        
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td><b>Общие сведения о земельном участке, на котором расположен многоквартирный дом:</b></td>
                                        <td></td>                                        
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>- площадь земельного участка, входящего в состав общего имущества в многоквартирном доме, кв.м</td>
                                        <td>'.$data->area_land.'</td>                                        
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>- площадь парковки в границах земельного участка, кв.м</td>
                                        <td>'.$data->parking_square.'</td>                                        
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Кадастровый номер</h3>
                                                </div>
                                                <div class="panel-body">'.GetCadastralNumbers($data->cadastral_numbers).'</div>
                                            </div>           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>Класс энергетической эффективности</td>
                                        <td>'.HouseEnergyEfficiencyClass988Enum($data->energy_efficiency).'</td>
                                    </tr>                                    
                                    <tr>
                                        <td>14</td>
                                        <td><b>Элементы благоустройства:</b></td>
                                        <td></td>                                        
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>- детская площадка</td>
                                        <td>'.BoolToIsNotIs($data->has_playground).'</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>- спортивная площадка</td>
                                        <td>'.BoolToIsNotIs($data->has_sportsground).'</td>                                        
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>- другое</td>
                                        <td>'.IsEmptyString($data->other_beautification).'</td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>Дополнительная информация</td>
                                        <td>'.IsEmptyString($data->additional_info).'</td>                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>';    
}

function GetHouseFacades($HouseFacades)
{
    if ($HouseFacades) 
    {
        foreach ($HouseFacades as $facade) {
            return HouseFacadeTypeEnum($facade->type);
        }
    } else
        return "Не заполнено";
}

function GetHouseRoofsType($roofs)
{
        if ($roofs)
        {
            foreach ($roofs as $roof)
            {
                return HouseRoofTypeEnum($roof->roof_type);
            }
        } else {
            return "Не заполнено";
        }
}

function GetHouseRoofingType($roofs)
{
    if ($roofs) {
        foreach ($roofs as $roof)
        {
            return HouseRoofingTypeEnum($roof->roofing_type);
        }
    } else {
        return "Не заполнено";
    }
}

function GetHouseAdditionalEquipmentsType($additional_equipments)
{
    if ($additional_equipments) {
        foreach ($additional_equipments as $additional_equipment) {
            $r .= IsEmptyString($additional_equipment->type)."<br>";
        }
        return $r;
    }
    else return "Нет данных";
}

function GetHouseAdditionalEquipmentsDescription($additional_equipments)
{
    if ($additional_equipments)
    {
        foreach ($additional_equipments as $additional_equipment) {
            $r .= IsEmptyString($additional_equipment->description)."<br>";
        }
        return $r;
    }
    else return "Нет данных";
}

function GetHTMLTable_pasport_structural_elements_house($data)
{
    $roofs = $data->roofs;
    echo '
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <tbody>                           
                                    <tr>
                                        <td colspan="3"><b>Фундамент</b></td>  
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Тип фундамента</td>
                                        <td>'.IsEmptyString(HouseFoundationTypeEnum($data->foundation_type)).'</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><b>Стены и перекрытия</b></td>
                                    </tr>
                                    <tr>   
                                        <td>1</td>
                                        <td>Тип перекрытий</td>
                                        <td>'.IsEmptyString(HouseFloorType988Enum($data->floor_type)).'</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Материал несущих стен</td>
                                        <td>'.IsEmptyString(HouseWallMaterial988Enum($data->wall_material)).'</td>                                        
                                    </tr>
                                    <tr> 
                                        <td colspan="3"><b>Подвал</b></td>                                                                    
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Площадь подвала по полу, кв.м</td>
                                        <td>'.$data->area_basement.'</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <b>Мусоропроводы</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Тип мусоропровода</td>
                                        <td>'.IsEmptyString(HouseChuteTypeEnum($data->chute_type)).'</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Количество мусоропроводов, ед.</td>
                                        <td>'.$data->chute_count.'</td>                                        
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <span><b>Фасады</b></span>
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Тип фасада</h3>
                                                </div>
                                                <div class="panel-body">'.GetHouseFacades($data->facades).'</div>
                                            </div>                                              
                                        </td>                                        
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <span><b>Крыши</b></span>
                                            <div class="row">
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="panel panel-primary">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Тип крыши</h3>
                                                        </div>
                                                        <div class="panel-body">'.GetHouseRoofsType($roofs).'</div>
                                                    </div>                                                                               
                                                </div>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="panel panel-primary">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Тип кровли</h3>
                                                        </div>
                                                        <div class="panel-body">'.GetHouseRoofingType($roofs).'</div>
                                                    </div>                                                   
                                                </div>
                                            </div>       
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <span><b>Иное оборудование / конструктивный элемент</b></span>
                                            <div class="row">
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="panel panel-primary">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Вид оборудования / конструктивного элемента</h3>
                                                        </div>
                                                        <div class="panel-body">'.GetHouseAdditionalEquipmentsType($data->additional_equipments).'</div>
                                                    </div>                                                                               
                                                </div>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="panel panel-primary">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Описание дополнительного оборудования / конструктивного элемента</h3>
                                                        </div>
                                                        <div class="panel-body">'.GetHouseAdditionalEquipmentsDescription($data->additional_equipments).'</div>
                                                    </div>                                                   
                                                </div>
                                            </div>       
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
';    
}

function GetHTMLTable_systems_engineerings($data)
{
    echo '
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <tbody>
                                    <tr>
                                        <td colspan="3"><b>Система электроснабжения</b></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Тип системы электроснабжения</td>
                                        <td>'.HouseElectricalTypeEnum($data->electrical_type).'</td>                                        
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Количество вводов в дом, ед.</td>
                                        <td>'.$data->electrical_entries_count.'</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><b>Система теплоснабжения</b></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Тип системы теплоснабжения</td>
                                        <td>'.HouseHeatingTypeEnum($data->heating_type).'</td>                                        
                                    </tr>
                                    <tr>
                                        <td colspan="3"><b>Система горячего водоснабжения</b></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Тип системы горячего водоснабжения</td>
                                        <td>'.HouseHotWaterTypeEnum($data->hot_water_type).'</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><b>Система холодного водоснабжения</b></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Тип системы холодного водоснабжения</td>
                                        <td>'.HouseColdWaterTypeEnum($data->cold_water_type).'</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><b>Система водоотведения</b></td>                                        
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Тип системы водоотведения</td>
                                        <td>'.HouseSewerageTypeEnum($data->sewerage_type).'</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Объем выгребных ям, куб. м.</td>
                                        <td>'.$data->sewerage_cesspools_volume.'</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><b>Система газоснабжения</b></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Тип системы газоснабжения</td>
                                        <td>'.HouseGasTypeEnum($data->gas_type).'</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><b>Система вентиляции</b></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Тип системы вентиляции</td>
                                        <td>'.HouseVentilationTypeEnum($data->ventilation_type).'</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><b>Система пожаротушения</b></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Тип системы пожаротушения</td>
                                        <td>'.HouseFirefightingTypeEnum($data->firefighting_type).'</td>                                        
                                    </tr>
                                    <tr>
                                        <td colspan="3"><b>Система водостоков</b></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Тип системы водостоков</td>
                                        <td>'.HouseDrainageTypeEnum($data->drainage_type).'</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>';    
}

function GetHTMLTable_lifts($data)
{
    $lifts = $data->lifts;
    echo '
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>Номер лифта</td>
                                        <td>Номер подъезда</td>
                                        <td>Тип лифта</td>
                                        <td>Год ввода в эксплуатацию</td>
                                    </tr>
                                </thead>
                                <tbody>';
    if ($lifts->lifts) {
        foreach ($lifts as $lift)
        {
            echo '<tr><td>'.$lift->porch_number.'</td><td>'.$lift->porch_number.'</td><td>'.HouseLiftTypeEnum($lift->type).'</td><td>'.$lift->commissioning_year.'</td></tr>';
        }
    } else {
        echo '<tr><td colspan="4">Нет данных</td></tr></tbody></table></div>';    
    }
}

function MeteringDeviceAvailabilityEnum($id)
{
    switch ($id) {
        case "1": return "Отсутствует, установка не требуется"; break;
        case "2": return "Отсутствует, требуется установка";    break;
        case "3": return "Установлен";                          break;
    }  
}

function HouseMeterTypeEnum($id)
{
    switch ($id) {
        case "1": return "Без интерфейса передачи данных";  break;
        case "2": return "С интерфейсом передачи данных";   break;
    }
}

function GetHTMLTable_metering_devices($metering_devices)
{
    echo '
                        <div class="table-responsive">    
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td><b>Вид коммунального ресурса</b></td>
                                        <td><b>Наличие прибора учета</b></td>
                                        <td><b>Единица измерения</b></td>
                                        <td><b>Дата ввода в эксплуатацию</b></td>
                                        <td><b>Дополнительная информация</b></td>
                                    </tr>
                                </thead>
                                <tbody>';
    if ($metering_devices)
    {
    	$btn_id = 1;
        foreach ($metering_devices as $device) {
            echo '<tr>';
            echo '  <td>'.HouseCommunalServiceTypeEnum($device->communal_resource_type).'</td>';
            // Если счетчик установлен
            if ($device->availability=='3'){
                echo '  <td>'.MeteringDeviceAvailabilityEnum($device->availability).'</td>';
                echo '  <td>'.UnitOfMeasureEnum($device->unit_of_measurement).'</td>';
                echo '  <td>'.IsEmptyString($device->commissioning_date).'</td>';
                echo '  <td><input type="button" class="btn btn-xs btn-default" data-toggle="collapse" data-target="#meting_devise_btn_'.$btn_id.'" value="Подробнее"></td>';
            } else
                echo '  <td colspan="4">'.MeteringDeviceAvailabilityEnum($device->availability).'</td>';
            echo '</tr>';
            if ($device->availability=='3'){
                echo '                
	                <tr id="meting_devise_btn_'.$btn_id.'" class="collapse">	            
	                	<td colspan="5">		                	
			                <div class="table-responsive">
				                <table class="table table-condensed">
				                	<tbody>
						                <tr>
						                	<td>Тип прибора учета</td>
						                	<td>'.HouseMeterTypeEnum($device->meter_type).'</td>
						                </tr>
						                <tr>	
						                	<td>Дата поверки / замены прибора учета</td>
						                	<td>'.IsEmptyString($device->calibration_date).'</td>
						                </tr>
						            </tbody>
						        </table>
						    </div>
						</td>    						
					</tr>';				
            }
            $btn_id++;
        }
    } else {
        echo '<tr><td colspan="5">Не заполнено</td></tr>';
    }
    echo '
                                </tbody>
                            </table>
                        </div>
    ';
}

function GetHTMLTable_management_organization($management_contract, $house_files, $data_target_id){
    echo '
    					<div id="'.$data_target_id.'" class="collapse in">
	                        <div class="table-responsive">
	                            <table class="table table-condensed">
	                                <tbody>
	                                    <tr>
	                                        <td>1</td>
	                                        <td>Дата начала управления</td>
	                                        <td>'.date("d.m.Y", strtotime($management_contract->date_start)).'</td>
	                                    </tr>
	                                    <tr>
	                                        <td>2</td>
	                                        <td>Основание управления</td>
	                                        <td>'.$management_contract->management_reason.'</td>
	                                    </tr>
	                                    <tr>
	                                        <td>3</td>
	                                        <td colspan="2"><b>Документ, подтверждающий выбранный способ управления:</b></td>
	                                    </tr>
	                                    <tr>
	                                        <td></td>
	                                        <td>- Наименование документа</td>
	                                        <td>'.$management_contract->management_reason.'</td>
	                                    </tr>
	                                    <tr>
	                                        <td></td>
	                                        <td>- Дата и номер документа</td>
	                                        <td>'.$management_contract->confirm_method_document_number.' от '.date("d.m.Y", strtotime($management_contract->date_start)).'</td>
	                                    </tr>
	                                    <tr>
	                                        <td>4</td>
	                                        <td colspan="2"><b>Договор управления:</b></td>
	                                    </tr>
	                                    <tr>
	                                        <td></td>
	                                        <td>- Дата заключения договора управления</td>
	                                        <td>'.date("d.m.Y", strtotime($management_contract->management_contract_date)).'</td>             
	                                    </tr>
	                                    <tr>
	                                        <td></td>
	                                        <td><b>Копия договора управления</b></td>
	                                        <td></td>
	                                    </tr>
	                                    <tr>
	                                    	<td colspan="3">';
	    GetHTMLTable_management_contract_files($house_files);
	    echo '
	                                    	</td>
	                                    </tr>
	                                </tbody>
	                            </table>
	                        </div>
	                    </div>';
}

function GetHTMLTable_management_samples($services, $data_target_id){
    echo '
						<div id="'.$data_target_id.'" class="collapse in">    
	                        <div class="table-responsive">
	                            <table class="table table-condensed">';
    if ($services)
    { 
    	$btn_id = 1;
        foreach ($services as $service) {
            echo '
	                                <thead>
	                                    <tr>
	                                        <td>Наименование работы (услуги)</td>
	                                        <td>Годовая плановая стоимость работ (услуг) (руб.)</td>
	                                        <td></td>                                        
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                    <tr>
	                                        <td>'.HouseServiceNameEnum($service->name).'</td>
	                                        <td>'.IsEmptyString($service->plan_cost_per_unit).'</td>
	                                        <td><button class="btn btn-xs btn-default" data-toggle="collapse" data-target="#management_samples_2_2_'.$btn_id.'">Подробнее</button></td>
	                                    </tr>
	                                    <tr id="#management_samples_2_2_'.$btn_id.'" class="collapse">
	                                        <td colspan="3">
	                                            <div class="panel panel-primary">
	                                                <div class="panel-heading">
	                                                    <h3 class="panel-title">История стоимости услуги</h3>
	                                                </div>
	                                                <div class="panel-body">
	                                                    <div class="table-responsive">
	                                                        <table class="table table-condensed">
	                                                            <thead>
	                                                                <tr>
	                                                                    <td>Год предоставления работы / услуги</td>
	                                                                    <td>Годовая плановая стоимость работ (услуг) (руб)</td>
	                                                                </tr>
	                                                            </thead>
	                                                            <tbody>
	                                                                <tr>
	                                                                    <td></td>
	                                                                    <td>'.IsEmptyString($service->plan_cost_per_unit).'</td>
	                                                                </tr>
	                                                            </tbody>
	                                                        </table>
	                                                    </div>
	                                                </div>
	                                            </div> 
	                                        </td>
	                                    </tr>
	                                </tbody>';
	            $btn_id++;
        	}
        } else {
            echo '
	                                <tr>
	                                    <td colspan="3">Не заполнено</td>
	                                </tr>';
        }
    echo '
	                            </table>
	                        </div>
	                    </div>';
}

function GetHTMLTable_management_utilities($communal_services, $data_target_id)
{
    echo '
    					<div id="'.$data_target_id.'" class="collapse in">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td><b>Вид коммунальной услуги</b></td>
                                        <td><b>Факт предоставления услуги</b></td>
                                        <td><b>Тариф (цена) (руб.)</b></td>
                                        <td><b>Единица измерения</b></td>
                                        <td><b>Лицо, осуществляющее поставку коммунального ресурса</b></td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>';
    if ($communal_services)
    {
    	$btn_id = 1;
        foreach ($communal_services as $communal_service) {
            if ($communal_service->filling_fact=="1")
            {
                $current_cost = GetCurrentTariff($costs);
                $costs = $communal_service->costs;
                echo '
                                    <tr>
                                        <td>'.HouseCommunalServiceTypeEnum($communal_service->type).'</td>
                                        <td>'.CommunalServiceFillingFactEnum($communal_service->filling_fact).'</td>
                                        <td>'.IsEmptyString($current_cost->tariff).'</td>
                                        <td>'.UnitOfMeasureEnum($costs->unit_of_measurement).'</td>
                                        <td>'.$communal_service->provider_name.'</td>
                                        <td><button class="btn btn-xs btn-default" data-toggle="collapse" data-target="#management_utilities_2_3_'.$btn_id.'">Подробнее</button></td>
                                    </tr>';
                } else {
                    echo '
                                    <tr>
                                        <td>'.HouseCommunalServiceTypeEnum($communal_service->type).'</td>
                                        <td colspan="4">'.CommunalServiceFillingFactEnum($communal_service->filling_fact).'</td>
                                    </tr>';
                }
                echo '
                                    <tr id="management_utilities_2_3_'.$btn_id.'" class="collapse">
                                        <td colspan="6">
                                            <div class="table-responsive">
                                                <table class="table table-condensed">
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>ИНН лица, осуществляющего поставку коммунального ресурса</td>
                                                            <td>'.$communal_service->provider_inn.'</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Дополнительная информация о лице, осуществляющего поставку коммунального ресурса</td>
                                                            <td>'.IsEmptyString($communal_service->profider_additional_info).'</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Основание предоставления услуги</td>
                                                            <td>'.CommunalServiceMethodEnum($communal_service->service_method).'</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Реквизиты договора на поставку коммунального ресурса</td>
                ';
                if ($communal_service->supplied_via_management_organization)
                {
                    echo "<td>Поставляется через управляющую организацию</td>";
                } else {
                    if ($communal_service->supply_contract_date!=" ") {
                        echo '<td>'.date(IsEmptyString($communal_service->supply_contract_number)).'</td>';
                    }
                    else {
                        echo '<td>'.date(IsEmptyString($communal_service->supply_contract_number)." от d.m.Y", strtotime($communal_service->supply_contract_date)).'</td>';
                    }

                }   
                echo '
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Нормативно-правовой акт, устанавливающий тариф</td>';
                if ($communal_service->legal_act_of_tariff_date!="") {
                    echo '<td>'.date(IsEmptyString($communal_service->legal_act_of_tariff_number)." от d.m.Y", strtotime($communal_service->legal_act_of_tariff_date)).'</td>';
                }
                else {                                                          
                    echo '<td>'.IsEmptyString($communal_service->legal_act_of_tariff_number).'</td>';
                }
                echo '
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>Дата начала действия тарифа</td>';
                if ($current_cost->tariff_start_date != "")  
                {
                    echo '<td>'.date("d.m.Y", strtotime($current_cost->tariff_start_date)).'</td>';
                } else
                    echo '<td>'.IsEmptyString($current_cost->tariff_start_date).'</td>';
                    echo '
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>Описание дифференциации тарифов в случаях, предусмотренных законодательством Российской Федерации о государственном регулировании цен (тарифов)</td>
                                                            <td>'.IsEmptyString($communal_service->tariff_description).'</td>
                                                        </tr>
                                                        <tr>
                                                            <td>8</td>
                                                            <td>История стоимости услуги</td>
                                                            <td><button class="btn btn-xs btn-default" data-toggle="collapse" data-target="#management_utilities_2_3_8'.$btn_id.'">Подробнее</button></td>
                                                        </tr>
                                                        <tr id="management_utilities_2_3_8'.$btn_id.'" class="collapse">';

					$costs = $data->costs;
					if ($costs) {
						echo '
	                                                        <td colspan="3">
	                                                        	<div class="table-responsive">
	                                                        		<table class="table-bordered">
	                                                        			<thead>	
	                                                        				<tr>
	                                                        					<td>Дата начала действия тарифа</td>
	                                                        					<td>Единицы измерения</td>
	                                                        					<td>Тариф (цена) (руб.)</td>
	                                                        				</tr>
	                                                        			</thead>
	                                                        			<tbody>';						
						foreach ($costs as $cost) {
							echo '	
	                                                        				<tr>
	                                                        					<td>'.$cost->tariff_start_date.'</td>
                                                        						<td>'.UnitOfMeasureEnum($cost->unit_of_measurement).'</td>
                                                        						<td>'.$cost->tariff.'</td>
                                                        					</tr>';
                        }
                        echo '
                                                        				</tbody>	
                                                        			</table>
                                                        		</div>
                                                       		</td>';
					} else {
                        echo '
                                                        	<td colspan="3">'.IsEmptyString('').'</td>';
                    }
                    echo '
                                                        </tr>
                                                        <tr>
                                                            <td>9</td>
                                                            <td><b>Норматив потребления коммунальной услуги в жилых помещениях:</b></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>- Норматив потребления коммунальной услуги в жилых помещениях</td>
                                                            <td>'.IsEmptyString($communal_service->consumption_norm).'</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>   
                                                            <td>- Единица измерения норматива потребления услуги</td>
                                                            <td>'.UnitOfMeasureEnum($communal_service->consumption_norm_unit_of_measurement).'</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>- Дополнительно</td>
                                                            <td>'.IsEmptyString($communal_service->consumption_norm_additional_info).'</td>
                                                        </tr>
                                                        <tr>
                                                            <td>10</td>
                                                            <td><b>Норматив потребления коммунальной услуги на общедомовые нужды:</b></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>- Норматив потребления коммунальной услуги на общедомовые нужды</td>
                                                            <td>'.IsEmptyString($communal_service->consumption_norm_on_common_needs).'</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>- Единица измерения норматива потребления услуги</td>
                                                            <td>'.IsEmptyString($communal_service->consumption_norm_on_common_needs_unit_of_measurement).'</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>- Дополнительно</td>
                                                            <td>'.IsEmptyString($communal_service->consumption_norm_on_common_needs_additional_info).'</td>
                                                        </tr>
                                                        <tr>
                                                            <td>11</td>
                                                            <td>Нормативно-правовой акт, устанавливающий норматив потребления коммунальной услуги</td>
                                                            <td><button class="btn btn-xs btn-default" data-toggle="collapse" data-target="#management_utilities_2_3_11'.$btn_id.'">Подробнее</button></td>
                                                        </tr>
                                                        <tr id="management_utilities_2_3_11'.$btn_id.'" class="collapse">
                                                            <td colspan="3">
                                                                <table class="table table-condensed">
                                                                    <thead>
                                                                        <tr>
                                                                            <td>Дата нормативно-правового акта</td>
                                                                            <td>Номер нормативно-правового акта</td>
                                                                            <td>Наименование принявшего акт органа</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>';
                    $normative_acts = $communal_service->normative_acts; 
                    if ($normative_acts) {
                        foreach ($normative_acts as $normative_act) {
                            echo "<tr>";
                            echo "<td>".date("d.m.Y", strtotime($normative_act->document_date))."</td>";
                            echo "<td>".$normative_act->document_number."</td>";
                            echo "<td>".$normative_act->document_organization_name."</td>";
                            echo "</tr>";
                        }
                    } else echo '<tr><td colspan="3">Не заполнено</td></tr>';
                    echo '
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>';
            $btn_id++;
        }
    }
    echo '
                                </tbody>
                            </table>
                        </div>
                    </div>';
}

function GetHTMLTable_total_assets($common_properties, $data_target_id)
{	
	echo '
	       			<div id="'.$data_target_id.'" class="collapse in">';
    if ($common_properties) {
        echo '

                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td>Наименование объекта общего имущества</td>
                                        <td>Назначение объекта общего имущества</td>
                                        <td>Площадь объекта</td>
                                        <td>Общее имущество сдается в аренду</td>
                                    </tr>
                                </thead>                                
                                <tbody>';
        foreach ($common_properties as $common_property) {
            $rents = $common_property->rent;
            echo '
                            <tr>
                                <td>'.IsEmptyString($common_property->name).'</td>
                                <td>'.IsEmptyString($common_property->function).'</td>
                                <td>'.IsEmptyString($common_property->area).'</td>';

            if ($rents) { 
                echo '
                				<td><button class="btn btn-sm btn-default" data-toggle="collapse" data-target="#rents">Подробнее</button></td>
                			</tr>
                			<tr id="rents" class="collapse">
                				<td colspan="4">
                                <div class="table-responsive">
                                <table class="table table-condensed">
                                    <tbody>';
                foreach ($rents as $rent) {
                    echo '
                                        <tr>
                                            <td>1</td>
                                            <td>Наименование владельца (пользователя)</td>
                                            <td>'.IsEmptyString($rent->provider_name).'</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>ИНН владельца (пользователя)</td>
                                            <td>'.IsEmptyString($rent->provider_inn).'</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Номер договора</td>
                                            <td>'.IsEmptyString($rent->contract_number).'</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Дата договора</td>
                                            <td>'.IsEmptyString(date("d.m.Y", strtotime($rent->contract_date))).'</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Дата начала действия договора</td>
                                            <td>'.IsEmptyString($rent->contract_started_date).'</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Стоимость по договору в месяц, руб.</td>
                                            <td>'.IsEmptyString($rent->cost_per_month).'</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Дата протокола общего собрания собственников помещений</td>
                                            <td>'.IsEmptyString($rent->common_meeting_protocol_date).'</td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Номер протокола общего собрания собственников помещений</td>
                                            <td>'.IsEmptyString($rent->common_meeting_protocol_number).'</td>
                                        </tr>';
                }
                echo '
                                    </tbody>
                                </table>
                                </div>
                				</td>
                			</tr>';
            } else {
        		echo '
                				<td>Нет</td>
                            </tr>';
    		}
    	}
   		echo '
                            </tbody>
                        </table>
                    </div>
                </div>';
    } else {
        echo '<div class="alert alert-warning" role="alert"><strong>Общее имущество собственников помещений в многоквартирном доме не используется.</strong></div>';
    }
    echo '</div>';
}

function GetHTMLTable_information_on_verhaul($overhaul, $data_target_id)
{
	echo '
					<div id="'.$data_target_id.'" class="collapse in">';
    if ($overhaul) {
        echo '
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>ИНН владельца специального счета</td>
                                        <td>'.IsEmptyString($overhaul->provider_inn).'</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Наименование владельца специального счета</td>
                                        <td>'.IsEmptyString($overhaul->provider_name).'</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Дата протокола общего собрания собственников помещений, на котором принято решение о способе формирования фонда капитального ремонта</td>
                                        <td>'.IsEmptyString(date("d.m.Y", strtotime($overhaul->common_meeting_protocol_date))).'</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Номер протокола общего собрания собственников помещений, на котором принято решение о способе формирования фонда капитального ремонта</td>
                                        <td>'.IsEmptyString($overhaul->common_meeting_protocol_number).'</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Размер взноса на капитальный ремонт на 1 кв. м в соответствии с решением общего собрания собственников помещений в многоквартирном доме, руб.</td>
                                        <td>'.IsEmptyString($overhaul->payment_amount_for_1sm).'</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Дополнительная информация</td>
                                        <td>'.IsEmptyString($overhaul->additional_info).'</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>';
    } else {
        echo '<div class="alert alert-warning" role="alert"><strong>Специальный счет на обеспечение проведения капитального ремонта общего имущества в многоквартирных домах не имеется.</strong></div>';   
    }
    echo '
    				</div>';
}

function GetHTMLTable_general_meetings($common_meetings, $data_target_id)
{
	echo '
					<div id="'.$data_target_id.'" class="collapse in">';
    if ($common_meetings) {
        echo '
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td>Дата протокола общего собрания</td>
                                        <td>Номер протокола общего собрания</td>
                                    </tr>                                   
                                </thead>
                                <tbody>';
        foreach ($common_meetings as $common_meeting)
        {
            echo '
                                    <tr>
                                        <td>'.date("d.m.Y", strtotime($common_meeting->protocol_date)).'</td>
                                        <td>'.IsEmptyString($common_meeting->protocol_number).'</td>
                                    </tr>';
        }
        echo '
                                </tbody>
                            </table>
                        </div>';
    } else {
        echo '<div class="alert alert-warning" role="alert"><strong>Нет данных</strong></div>';
    }
    echo '
    				</div>';
}

function GetHTMLTable_general_information($report_common, $data_target_id)
{
	echo '
                        <div id="'.$data_target_id.'" class="collapse in">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Авансовые платежи потребителей (на начало периода), руб.</td>
                                        <td>'.IsEmptyString($report_common->cash_balance_beginning_period_consumers_overpayment).'</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Переходящие остатки денежных средств (на начало периода), руб.</td>
                                        <td>'.IsEmptyString($report_common->cash_balance_beginning_period).'</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Задолженность потребителей (на начало периода), руб.</td>
                                        <td>'.IsEmptyString($report_common->cash_balance_beginning_period_consumers_arrears).'</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><b>Начислено за услуги (работы) по содержанию и текущему ремонту, в том числе:</b></td>
                                        <td>'.IsEmptyString($report_common->charged_for_services).'</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>- за содержание дома, руб.</td>
                                        <td>'.IsEmptyString($report_common->charged_for_maintenance_of_house).'</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>- за текущий ремонт, руб.</td>
                                        <td>'.IsEmptyString($report_common->charged_for_maintenance_work).'</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>- за услуги управления, руб.</td>
                                        <td>'.IsEmptyString($report_common->charged_for_management_service).'</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td><b>Получено денежных средств, в том числе:</b></td>
                                        <td>'.IsEmptyString($report_common->received_cash).'</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>- денежных средств от собственников/нанимателей помещений, руб</td>
                                        <td>'.IsEmptyString($report_common->received_cash_from_owners).'</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>- целевых взносов от собственников/нанимателей помещений, руб.</td>
                                        <td>'.IsEmptyString($report_common->received_target_payment_from_owners).'</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>- субсидий, руб.</td>
                                        <td>'.IsEmptyString($report_common->received_subsidies).'</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>- денежных средств от использования общего имущества, руб.</td>
                                        <td>'.IsEmptyString($report_common->received_from_use_of_common_property).'</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>- прочие поступления, руб.</td>
                                        <td>'.IsEmptyString($report_common->received_from_other).'</td>                                       
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td><b>Всего денежных средств с учетом остатков, руб.</b></td>
                                        <td>'.IsEmptyString($report_common->cash_total).'</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Авансовые платежи потребителей (на конец периода), руб.</td>
                                        <td>'.IsEmptyString($report_common->cash_balance_ending_period_consumers_overpayment).'</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Переходящие остатки денежных средств (на конец периода), руб.</td>
                                        <td>'.IsEmptyString($report_common->cash_balance_ending_period).'</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Задолженность потребителей (на конец периода), руб.</td>
                                        <td>'.IsEmptyString($report_common->cash_balance_ending_period_consumers_arrears).'</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    	</div>';  
}

function GetHTMLTable_utilities($report_common, $data_target_id)
{
	echo '
                    <div id="'.$data_target_id.'" class="collapse in">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                            	<tbody>                    	
                            		<tr>
                            			<td>1</td>
                            			<td>Авансовые платежи потребителей (на начало периода), руб.</td>
                            			<td>'.IsEmptyString($report_common->cash_balance_beginning_period_consumers_overpayment).'</td>
                            		</tr>
                            		<tr>
                            			<td>2</td>
                            			<td>Переходящие остатки денежных средств (на начало периода), руб.</td>
                            			<td>'.IsEmptyString($report_common->cash_balance_beginning_period).'</td>
                            		</tr>
                            		<tr>
                            			<td>3</td>
                            			<td>Задолженность потребителей (на начало периода), руб.</td>
                            			<td>'.IsEmptyString($report_common->cash_balance_beginning_period_consumers_arrears).'</td>
                            		</tr>
                            		<tr>
                            			<td>4</td>
                            			<td>Авансовые платежи потребителей (на конец периода), руб.</td>
                            			<td>'.IsEmptyString($report_common->balance_ending_period_consumers_overpayment).'</td>
                            		</tr>
                            		<tr>
                            			<td>5</td>
                            			<td>Переходящие остатки денежных средств (на конец периода), руб.</td>
                            			<td>'.IsEmptyString($report_common->balance_ending_period).'</td>
                            		</tr>
                            		<tr>
                            			<td>6</td>
                            			<td>Задолженность потребителей (на конец периода), руб.</td>
                            			<td>'.IsEmptyString($report_common->balance_ending_period_consumers_arrears).'</td>
                            		</tr>
                            		<tr>
                            			<td>7</td>
                            			<td>Количество поступивших претензий, ед.</td>
                            			<td>'.IsEmptyString($report_common->claims_received_count).'</td>
                            		</tr>
                            		<tr>
                            			<td>8</td>
                            			<td>Количество удовлетворенных претензий, ед.</td>
                            			<td>'.IsEmptyString($report_common->claims_satisfied_count).'</td>
                            		</tr>
                            		<tr>
                            			<td>9</td>
                            			<td>Количество претензий, в удовлетворении которых отказано, ед.</td>
                            			<td>'.IsEmptyString($report_common->claims_denied_count).'</td>
                            		</tr>
                            		<tr>
                            			<td>10</td>
                            			<td>Сумма произведенного перерасчета, руб.</td>
                            			<td>'.IsEmptyString($report_common->produced_recalculation_amount).'</td>
                            		</tr>
                            	</tbody>
                            </table>
                        </div>	
                    </div>
	';
}

function GetHTMLTable_volume_public_services($communal_services, $data_target_id)
{
	echo '
                    <div id="'.$data_target_id.'" class="collapse in">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<td>Вид коммунальной услуги</td>
										<td>Факт предоставления</td>
										<td>Единица измерения</td>
										<td>Начислено потребителям (руб.)</td>
										<td></td>
									</tr>
								</thead>
								<tbody>';
	if ($communal_services) {
        $btn_id = 1;
		foreach ($communal_services as $communal_service) {
			$volumes_report = $communal_service->volumes_report;
			// таблица заполняется если коммунальная услуга предоставляется!
			if ($communal_service->filling_fact=="1") {
				echo '
									<tr>
										<td>'.HouseCommunalServiceTypeEnum($communal_service->type).'</td>
										<td>'.CommunalServiceFillingFactEnum($communal_service->filling_fact).'</td>
										<td>'.UnitOfMeasureEnum($communal_service->consumption_norm_on_common_needs_unit_of_measurement).'</td>
										<td>'.IsEmptyString($volumes_report->accrued_consumer).'</td>
										<td><button class="btn btn-xs btn-default" data-toggle="collapse" data-target="#filling_fact_3_5_1'.$btn_id.'">Подробнее</button></td>
									</tr>
									<tr id="filling_fact_3_5_1'.$btn_id.'" class="collapse">
										<td colspan="5">
											<div class="table-responsive">
												<table class="table table-condensed">
													<tbody>
														<tr>
															<td>1</td>	
															<td>Общий объем потребления, нат. показ.</td>
															<td>'.IsEmptyString($volumes_report->total_volume).'</td>
														</tr>
														<tr>
															<td>2</td>
															<td>Оплачено потребителями, руб.</td>
															<td>'.IsEmptyString($volumes_report->paid_by_consumers_amount).'</td>
														</tr>
														<tr>
															<td>3</td>
															<td>Задолженность потребителей, руб.</td>
															<td>'.IsEmptyString($volumes_report->consumer_arrears).'</td>										
														</tr>
														<tr>
															<td>4</td>
															<td>Начислено поставщиком (поставщиками) коммунального ресурса, руб.</td>
															<td>'.IsEmptyString($volumes_report->cash_to_provider_payment).'</td>										
														</tr>
														<tr>
															<td>5</td>
															<td>Оплачено поставщику (поставщикам) коммунального ресурса, руб.</td>
															<td>'.IsEmptyString($volumes_report->paid_to_supplier_amount).'</td>
														</tr>
														<tr>
															<td>6</td>
															<td>Задолженность перед поставщиком (поставщиками) коммунального ресурса, руб.</td>
															<td>'.IsEmptyString($volumes_report->arrear_to_supplier_amount).'</td>
														</tr>
														<tr>
															<td>7</td>
															<td>Суммы пени и штрафов, уплаченные поставщику(поставщикам) коммунального ресурса, руб.</td>
															<td>'.IsEmptyString($volumes_report->total_penalties).'</td>
														</tr>
													</tbody>
												</table>
											</div>
										</td>
									</tr>';
			}
            $btn_id++;
		}
	} else {
		echo '<tr><td colspan="5">'.IsEmptyString('').'</td></tr>';
	}
	echo '
								</tbody>
							</table>
						</div>
                    </div>';
}

?>