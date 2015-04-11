<?php
function transtext()
{
	echo T_("enable");              // Enum enable
	echo T_("disable");             // Enum disable
	echo T_("expire");              // Enum expire

	// ------------------------------------------------------------------- Table blacklists
	echo T_("blacklists");          // Table blacklists
	echo T_("blacklist");           // blacklist
	echo T_("id");                  // id
	echo T_("cat");                 // blacklist_cat
	echo T_("name");                // blacklist_name
	echo T_("counter");             // blacklist_counter
	echo T_("status");              // blacklist_status
	echo T_("modified");            // date_modified

	// ------------------------------------------------------------------- Table reserves
	echo T_("reserves");            // Table reserves
	echo T_("reserve");             // reserve
	echo T_("cat");                 // reserves_cat
	echo T_("name");                // reserves_name
	echo T_("counter");             // reserves_counter
	echo T_("status");              // reserves_status
	echo T_("hidden");              // Enum hidden

	// ------------------------------------------------------------------- Table urls
	echo T_("urls");                // Table urls
	echo T_("url");                 // url
	echo T_("long");                // url_long
	echo T_("clicks");              // url_clicks
	echo T_("created");             // url_created
	echo T_("status");              // url_status
	echo T_("special");             // url_special

	// ------------------------------------------------------------------- Table users
	echo T_("users");               // Table users
	echo T_("user");                // user
	echo T_("nickname");            // user_nickname

}
?>