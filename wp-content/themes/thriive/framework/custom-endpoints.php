<?php
	
// Endpoint for call connecting API
function call_connecting_endpoint() {
	register_rest_route( 'mo/v1', '/thriive-call-connection/', array(
		'methods' => 'POST',
		'callback' => 'my_operator_call_connection',
	) );
}
// Endpoint for call disconnecting API
function call_disconnecting_endpoint() {
	register_rest_route( 'mo/v1', '/thriive-call-disconnection/', array(
		'methods' => 'POST',
		'callback' => 'my_operator_call_disconnection',
	) );
}	
// Endpoint for webhook after call connected API
// function call_wac_endpoint() {
// 	register_rest_route( 'mo/v1', '/webhook-after-call/', array(
// 		'methods' => 'POST',
// 		'callback' => 'my_operator_wac',
// 	) );
// }