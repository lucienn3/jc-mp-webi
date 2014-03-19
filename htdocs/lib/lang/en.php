<?php


// Login
define("LOGIN_HEAD_TEXT", "Please Sign In");
define("LOGIN_PLACEHOLDER_USERNAME","Userlogin");
define("LOGIN_PLACEHOLDER_PASSWORD", "Password");
define("LOGIN_SINGIN", "Sign In");
define("LOGIN_ERROR_EMPTY","Please insert a password.");
define("LOGIN_ERROR_WRONG_PW","Your password is wrong.");
define("LOGIN_ERROR_WRONG_USER","Your username is wrong.");
define("LOGIN_ERROR_SUCCESS","You´re now logged in.");

// Navigation
define("NAV_INDEX","Serverlist");
define("NAV_ADD","Add Server");
define("NAV_ADMIN_USER","Userlist");
define("NAV_ADMIN_DROP_TITLE","User");
define("NAV_ADMIN_DROP_ADMIN","You're Admin");
define("NAV_ADMIN_DROP_PASSWORD","Change Password");
define("NAV_ADMIN_DROP_LOGOUT","Logout");
define("NAV_ADMIN_SERVER","Server Controll");

// Filesystem Error
 define("FILESYSTEM_ERROR_NOREAD", "The following file is unreadable, please make it readable: ");
 define("FILESYSTEM_ERROR_NOEXECUTE", "The following file is unexecutable or not found, please check this: ");

// Userlist
define("USERLIST_NAME","Username");
define("USERLIST_PERMESSION","Permissions");
define("USERLIST_ACTIVE","Active ?");
define("USERLIST_ACTIVE_TRUE","active");
define("USERLIST_ACTIVE_FALSE","inactive");
define("USERLIST_ACTIONS","actions");
define("USERLIST_ACTIVE_TRUE_TURN","reactivate");
define("USERLIST_ACTIVE_FALSE_TURN","deactivate");
define("USERLIST_CHANGE","change password");
define("USERLIST_PERM","change rights");
define("USERLIST_DEL","delete");
define("USERLIST_ADD","Add User");

// Password change
define("PASSCH_USERMANE","Username");
define("PASSCH_OLDPW","old password");
define("PASSCH_NEWPW","new password");
define("PASSCH_NEWPWA","retype new password");
define("PASSCH_BUTTON","change Password");

// add User
define("ADDUSER_USERMANE","Username");
define("ADDUSER_NEWPW","Password");
define("ADDUSER_NEWPWA","Retype Password");
define("ADDUSER_ADMIN","Admin?");
define("ADDUSER_BUTTON","create User");

// Register
define("REG_ERROR_WRONG_USER","The username is allready taken.");
define("REG_ERROR_WRONG_PASS","Your passwords are not the same and please fill out all fields.");

// delte User
define("DELLUSER_CHECK","delete this user.");
define("DELLUSER_BUTTON","Confirm");

// Serverlist
define("SLIST_STATUS","Online?");
define("SLIST_NAME","Name");
define("SLIST_PORT","Port");
define("SLIST_PLAYERS","Players");
define("SLIST_PUBLIC","Public");
define("SLIST_ACTIONS","Actions");

// ADD SERVER
define("ADD_SERVER_TITLE","create Server");
define("ADD_SERVER_NAME_TITLE","ServerName");
define("ADD_SERVER_NAME_PLACEHOLDER","Name");
define("ADD_SERVER_PORT_TITLE","Serverport");
define("ADD_SERVER_PORT_PLACEHOLDER","Port");
define("ADD_SERVER_CONFIG","Simple Config? ( setup only )");
define("ADD_SERVER_BUTTON","Create");
define("ADD_SERVER_BUTTON_NEXT","Next Step");
define("ADD_SERVER_BUTTON_FINISH","Back to the serverlist");
define("ADD_SERVER_CONFIG_TITLE","Configuration");
define("ADD_SERVER_CONFIG_PLACEHOLDER","Please insert your configuration");
define("ADD_SERVER_ERROR_1","Serverport is allready taken.");
define("ADD_SERVER_ERROR_2","Your form key is out of date. Please try it again.");


?>
