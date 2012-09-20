<?php

$entity = elgg_extract('entity', $vars);

$actor = get_entity($entity->from_guid);
$object = get_entity($entity->object_guid);
if($object){
	//$objectOwner = get_entity($object->getOwnerGUID());
	$subtype = $object->getSubtype();
	
	$description = $entity->description;
	if (strlen($description) > 60){
	  $description = substr($entity->description,0,75) . '...' ;
	} 
	
	$buyer = elgg_view('output/url', array('href'=>$actor->getURL(), 'text'=>$actor->name));
	$object = elgg_view('output/url', array('href'=>$object->getURL(), 'text'=> $object_title));
	
	$body .= elgg_echo('pay:notification:withdraw', array($object));
	
	$body .= "<br/>";
		
	$body .= "<span class='notify_time'>" . elgg_view_friendly_time($entity->time_created) . "</span>";
	
	echo $body;

}