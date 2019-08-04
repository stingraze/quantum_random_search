<?php
#Copyright (c) 2019 Tsubasa Kato
#Released under the MIT license
#https://opensource.org/licenses/mit-license.php
#
#Parts of code from my quantum random number algorithm enabled search engine in PHP to get random number made by quantum algorithm to feed it to random number algorithm's seed. 
#This code has intentionally been made vague, it is not a complete functioning code. If you would like to get a copy of working code, please send a request to: tsubasa@superai.online
#This script uses Solarium.
#Go to: http://www.superai.online/solr/quantum_rand.php?query=algorithm for a demo that uses this algorithm.
require('./vendor/autoload.php');
$config = array(
    'endpoint' => array(
        'localhost' => array(
            'host' => '127.0.0.1', 'port' => '8983', 'path' => '/solr/name_of_core'
        )
    )
);

$client = new Solarium\Client($config);
$query = $client->createSelect();

$client = new Solarium\Client($config);

$query = $client->createSelect();

// *:* is equivalent to telling solr to returnall docs
$query->setQuery($escaped_solr_query); 

function make_seed($input_val)
{
  list($usec, $sec) = explode(' ', microtime());
  
  return $sec + $input_val + $usec * 1000000;
}

$quantum_rnd = shell_exec('python3.6 /path/to/file/quantum_rand.py');
$quantum_rnd = (float)$quantum_rnd;

#Uncomment below to print for debugging purpose
#print $quantum_rnd;

$randString = mt_rand(0,make_seed($quantum_rnd));

$query->addSort('random_'.$randString, $query::SORT_ASC);
?>
