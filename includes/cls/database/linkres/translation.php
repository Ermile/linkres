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
	echo T_("hidden");              // Enum hidden

	// ------------------------------------------------------------------- Table urls
	echo T_("urls");                // Table urls
	echo T_("url");                 // url
	echo T_("long");                // url_long
	echo T_("longmd5");             // url_longmd5
	echo T_("short");               // url_short
	echo T_("clicks");              // url_clicks
	echo T_("created");             // url_created
	echo T_("status");              // url_status
	echo T_("user");                // user_id

	// ------------------------------------------------------------------- Table users
	echo T_("users");               // Table users
	echo T_("user");                // user
	echo T_("nickname");            // user_nickname

}
?>