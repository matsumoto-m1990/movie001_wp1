<?php
/*
Plugin Name: Hello World
Plugin URI: 
Description: Hello Worldを表示する（森崎作成中）
Version: 1.0.0
Author:oxy
Author URI: http://example.com
License: GPL2
*/
/*  Copyright 2015 Oxy (email : oxy@oxynotes.com)
 
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
     published by the Free Software Foundation.
 
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
 
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
function oxy_hello_world() {
     add_menu_page( 'hoge','hoge','manage_options','myplugin_setting' );
}
add_action( 'admin_menu', 'oxy_hello_world' );
?>