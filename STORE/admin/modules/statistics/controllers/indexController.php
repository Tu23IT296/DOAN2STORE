<?php

function construct()
{
	load_model('index');
}

function indexAction()
{
	$data = getStatisticsData();
	load_view('list', $data);
}
function listAction()
{
	$data = getStatisticsData(); 
	load_view('list', $data); 
}
