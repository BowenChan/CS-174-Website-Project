<pre><?php
	require_once('multiple_sort.php');
	$sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
	
	switch($sort)
	{
		case 'ttl':
			$order = 'title ASC';
			break;
		case 'lgnth':
			$order = 'videolength ASC';
			break;
		case 'rsltn':
			$order = 'highestresolution DESC';
			break;
		case 'lang':
			$order = 'language ASC';
			break;						
		case 'vwcnt':
			$order = 'viewcount ASC';
			break;	
		case 'vtype':
			$order = 'videotype ASC';
			break;
		default:
			$order = 'id ASC';
			$sort = 'id';
			break;
	}
	if(isset($vidarr)){
		$vidarr = $vidarr;
	}
	else
		$vidarr =0;

	if($vidarr == 0)
	{
	$constr = isset($_GET['constr']) ? $_GET['constr'] : "";
	switch($constr)
	{
		//resolution
		case '144':
			$constr1 = "WHERE `highestresolution` = '144'";
			break;
		case '240':
			$constr1 = "WHERE `highestresolution` = '240'";
			break;
		case '360':
			$constr1 = "WHERE `highestresolution` = '360'";
			break;
		case '480':
			$constr1 = "WHERE `highestresolution` = '480'";
			break;
		case '720':
			$constr1 = "WHERE `highestresolution` = '720'";
			break;
		case '1080':
			$constr1 = "WHERE `highestresolution` = '1080'";
			break;

		//Language
		case 'eng':
			$constr1 = "WHERE `language` = 'English'";
			break;
		case 'none':
			$constr1 = "WHERE `language` = 'Non-English'";
			break;
			
		//Length
		case '10':
			$constr1 = "WHERE `videolength` > 0 AND `videolength` <= 10";
			break; 
		case '20':
			$constr1 = "WHERE `videolength` => 10 AND `videolength` <= 20";
			break; 
		case '40':
			$constr1 = "WHERE `videolength` => 20 AND `videolength` <= 40";
			break; 
		case '60':
			$constr1 = "WHERE `videolength` => 40 AND `videolength` <= 60";
			break; 
		case '61':
			$constr1 = "WHERE `videolength` => 60";
			break; 
			
		//View Count
		case '75':
			$constr1 = "WHERE `viewcount` >= 50000 AND `viewcount` <= 75000";
			break;
		case '100':
			$constr1 = "WHERE `viewcount` >= 75001 AND `viewcount` <= 100000";
			break;
		case '125':
			$constr1 = "WHERE `viewcount` >= 100001 AND `viewcount` <= 125000";
			break;
		case '150':
			$constr1 = "WHERE `viewcount` >= 125001 AND `viewcount` <= 150000";
			break;
		case '151':
			$constr1 = "WHERE `viewcount` >= 151001";
			break;				
			
		//Type
		case 'tut':
			$constr1 = "WHERE `videotype` LIKE '%Tutorial%'";
			break;
		case 'ent':
			$constr1 = "WHERE `videotype` LIKE '%Entertainment%'";
			break;
		case 'app':
			$constr1 = "WHERE `videotype` LIKE '%Application%'";
			break;
		case 'wep':
			$constr1 = "WHERE `videotype` LIKE '%Weapon%'";
			break;
		case 'gro':
			$constr1 = "WHERE `videotype` LIKE '%Group Demo%'";
			break;
		case 'oth':
			$constr1 = "WHERE `videotype` LIKE '%Others%'";
			break;
		default:
			$constr1 = "";
			break;
		
		}
	}
	else
	{
	
		$constr1 = "WHERE ";
		$j = 0;
	while(count($vidarr) > $j)
	{
	switch($vidarr[$j])
	{
		//resolution
		case '144':
			$constr1 .= "`highestresolution` = '144'";
			break;
		case '240':
			$constr1 .= "`highestresolution` = '240'";
			break;
		case '360':
			$constr1 .= "`highestresolution` = '360'";
			break;
		case '480':
			$constr1 .= "`highestresolution` = '480'";
			break;
		case '720':
			$constr1 .= "`highestresolution` = '720'";
			break;
		case '1080':
			$constr1 .= "`highestresolution` = '1080'";
			break;

		//Language
		case 'eng':
			$constr1 .= "`language` = 'English'";
			break;
		case 'none':
			$constr1 .= "`language` = 'Non-English'";
			break;
			
		//Length
		case '10':
			$constr1 .= "`videolength` > '0' AND `videolength` <= '10'";
			break; 
		case '20':
			$constr1 .= "`videolength` >= '10' AND `videolength` <= '20'";
			break; 
		case '40':
			$constr1 .= "`videolength` >= 20 AND `videolength` <= 40";
			break; 
		case '60':
			$constr1 .= "`videolength` >= 40 AND `videolength` <= 60";
			break; 
		case '61':
			$constr1 .= "`videolength` >= 60";
			break; 
			
		//View Count
		case '75':
			$constr1 .= "`viewcount` >= 50000 AND `viewcount` <= 75000";
			break;
		case '100':
			$constr1 .=  "`viewcount` >= 75001 AND `viewcount` <= 100000";
			break;
		case '125':
			$constr1 .= "`viewcount` >= 100001 AND `viewcount` <= 125000";
			break;
		case '150':
			$constr1 .= "`viewcount` >= 125001 AND `viewcount` <= 150000";
			break;
		case '151':
			$constr1 .= "`viewcount` >= 151001";
			break;				
			
		//Type
		case 'tut':
			$constr1 .= "`videotype` LIKE '%Tutorial%'";
			break;
		case 'ent':
			$constr1 .= "`videotype` LIKE '%Entertainment%'";
			break;
		case 'app':
			$constr1 .= "`videotype` LIKE '%Application%'";
			break;
		case 'wep':
			$constr1 .= "`videotype` LIKE '%Weapon%'";
			break;
		case 'gro':
			$constr1 .= "`videotype` LIKE '%Group Demo%'";
			break;
		case 'oth':
			$constr1 .= "`videotype` LIKE '%Others%'";
			break;
		default:
			break;
		}
		if($j + 1 < count($vidarr))
		{
			$constr1 .= " AND ";
		}
		$j++;
	}
	}
?></pre>