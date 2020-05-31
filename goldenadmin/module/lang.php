<?php
$sqlMenu="SELECT * FROM tbl_Menu where lang=".$_SESSION["lang"];
$r = mysql_query($sqlMenu,$cnn);
	if ($rowMenu = mysql_fetch_array($r))
	{
		$Menu_Home			=$rowMenu["Menu_Home"];
		$Menu_About			=$rowMenu["Menu_About"];
		$Menu_New			=$rowMenu["Menu_New"];
		$Menu_Service		=$rowMenu["Menu_Service"];
		$Menu_Contact		=$rowMenu["Menu_Contact"];
		$Menu_Search		=$rowMenu["Menu_Search"];
		$Menu_Car			=$rowMenu["Menu_Car"];
		$Menu_Tour			=$rowMenu["Menu_Tour"];
		$Menu_Travel		=$rowMenu["Menu_Travel"];
		$Menu_Ticket		=$rowMenu["Menu_Ticket"];
		$Menu_Hotel			=$rowMenu["Menu_Hotel"];
		$Menu_Visa			=$rowMenu["Menu_Visa"];
		$Menu_Restaurent	=$rowMenu["Menu_Restaurent"];
		$Menu_Useful		=$rowMenu["Menu_Useful"];
		$Menu_Webinfo		=$rowMenu["Menu_Webinfo"];
		$Menu_Support		=$rowMenu["Menu_Support"];
		$Menu_Rate			=$rowMenu["Menu_Rate"];
		$Menu_Price			=$rowMenu["Menu_Price"];
		$Menu_Stock			=$rowMenu["Menu_Stock"];
		$Menu_Boadcast		=$rowMenu["Menu_Boadcast"];
		$Menu_Lottery		=$rowMenu["Menu_Lottery"];
		$Menu_Visited		=$rowMenu["Menu_Visited"];
		$Menu_Online		=$rowMenu["Menu_Online"];
		//===========================================
		$Menu_SystemManager	=$rowMenu["Menu_SystemManager"];
		$Menu_System		=$rowMenu["Menu_System"];
		$Menu_Changpass		=$rowMenu["Menu_Changpass"];
		$Menu_Add			=$rowMenu["Menu_Add"];
		$Menu_Edit			=$rowMenu["Menu_Edit"];
		$Menu_Del			=$rowMenu["Menu_Del"];
		$Menu_SubItem		=$rowMenu["Menu_SubItem"];
		$Menu_Logout		=$rowMenu["Menu_Logout"];
		//===========================================
		$Menu_Location		=$rowMenu["Menu_Location"];
		$Menu_Noth			=$rowMenu["Menu_Noth"];
		$Menu_Center		=$rowMenu["Menu_Center"];
		$Menu_South			=$rowMenu["Menu_South"];
		$Menu_Title			=$rowMenu["Menu_Title"];
		//===========================================
		$Menu_ContactInfo	=$rowMenu["Menu_ContactInfo"];
		$Menu_Name			=$rowMenu["Menu_Name"];
		$Menu_Address		=$rowMenu["Menu_Address"];
		$Menu_Tel			=$rowMenu["Menu_Tel"];
		$Menu_Email			=$rowMenu["Menu_Email"];
		$Menu_Content		=$rowMenu["Menu_Content"];
		$Menu_Send			=$rowMenu["Menu_Send"];
		$Menu_Cancel		=$rowMenu["Menu_Cancel"];
		$Menu_Detail		=$rowMenu["Menu_Detail"];
		$Menu_Other			=$rowMenu["Menu_Other"];
		$Menu_Print			=$rowMenu["Menu_Print"];
		$Menu_SendtoFriend	=$rowMenu["Menu_SendtoFriend"];
		$Menu_Adv			=$rowMenu["Menu_Adv"];
	}
?>