<?php

// white list routes

use System\Application;

$app = Application::getInstance();


//ssl Cirtificate

$app->route->add('/.well-known/acme-challenge/ByRVNu-6dGSzB_HTiYRWlqq_5I5CEmM7nq1xtjMad_w', 'Ssl@index1');
$app->route->add('/.well-known/acme-challenge/eJ70ymlaTkIP_HCHjTpFxN8FLiprnrFouHou6a1d_Zk', 'Ssl@index2');//ssl Cirtificate

//pay susccses and canceled

$app->route->add('/pay/2y10SMf9soZWai0IJOIDFZPFOedYxiXrzzYKvueO4FfQwwvaxNYIg3Zsq', 'PaySucs'); // suc
$app->route->add('/pay/sucs', 'PaySucs@sucs'); // suc
$app->route->add('/pay/2y10kykd4YB1vxmd4GsmgDxzWew0FCZ3oPOC9g7ot7hs9OmAx7JSdLKqz', 'PayCancel'); // cancel

// Home

$app->route->add('/', 'Home');
$app->route->add('/vs', 'Home@load');
$app->route->add('/online', 'Home@online');
$app->route->add('/submit/Trail', 'Home@submitTrail', 'post');
$app->route->add('/submit/contact', 'Home@submitContact', 'post');

// Admin Routes

$app->route->add('/hmzd', 'Admin/Login');
$app->route->add('/hmzd/login/submit', 'Admin/Login@submit', 'POST');

$app->route->add('/hmzd/dashboard', 'Admin/Dashboard'); 
$app->route->add('/hmzd/dashboard/sendReqMsg', 'Admin/Dashboard@sendReqMsg');
$app->route->add('/hmzd/dashboard/sendTrailMsg', 'Admin/Dashboard@sendTrailMsg');
$app->route->add('/hmzd/req', 'Admin/Req');
$app->route->add('/hmzd/req/sendMsg', 'Admin/Req@sendMsg');
$app->route->add('/hmzd/customers', 'Admin/Customers');
$app->route->add('/hmzd/customers/sendMsg', 'Admin/Customers@sendMsg');
$app->route->add('/hmzd/adminLogs', 'Admin/AdminLogs');
$app->route->add('/hmzd/offers', 'Admin/Offers');
$app->route->add('/hmzd/offers/addoffers', 'Admin/Offers@addOffer');
$app->route->add('/hmzd/offers/updateOffers', 'Admin/Offers@updateOffers');
$app->route->add('/hmzd/offers/deleteOffers', 'Admin/Offers@deleteOffer');
$app->route->add('/hmzd/profits', 'Admin/Profits');
$app->route->add('/hmzd/trails', 'Admin/Trails');
$app->route->add('/hmzd/trails/sendMsg', 'Admin/Trails@sendMsg');
$app->route->add('/hmzd/visters', 'Admin/Visters');
$app->route->add('/hmzd/actions', 'Admin/AdminActions');
$app->route->add('/hmzd/seo', 'Admin/Seo');
$app->route->add('/hmzd/seo/update-dscr', 'Admin/Seo@updateSeoDscr');
$app->route->add('/hmzd/seo/update-words', 'Admin/Seo@updateSeoWords');
$app->route->add('/hmzd/cccam/update-code', 'Admin/Cccam@updateCccamCode');
$app->route->add('/hmzd/cccam', 'Admin/Cccam');


// Not found page

$app->route->add('/404', 'Error/NotFound');
$app->route->notFound('/404');

// logout




