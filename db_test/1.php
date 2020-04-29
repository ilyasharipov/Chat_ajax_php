<?php
$SQL = 'INSERT INTO name_table (name, age) VALUES (\'Artem\', 28)';
$SQL = 'INSERT INTO name_table (name, age) VALUES 
(\'Artem\', 28),
(\'Artem\', 28),
(\'Artem\', 28),
(\'Artem\', 28),
';
//id name age
$SQL = 'INSERT INTO name_table VALUES (1, 28, "Artem")';
echo $SQL; // INSERT INTO name_table (name, age) VALUES ('Artem', 28)
$data = ['name' => 'Artem', 'age' => 28];
$DB->insert_record($name, $data); //array, object
$data -> key //string
$date -> valule //!array !object

$SQL = 'DELETE FROM table_name WHERE id = 20';
$SQL = 'DELETE FROM table_name WHERE name = "Artem" AND age = 28';
$SQL = 'DELETE FROM table_name WHERE name = "Artem" OR age = 28';
$SQL = 'DELETE FROM table_name WHERE name = "Artem" AND age = 28 LIMIT 2';
$SQL = 'DELETE FROM table_name WHERE (name = "Artem" OR name = "maz") AND age = 28';
/*1
20
7
4
30*/
$SQL = 'DELETE FROM table_name 
LIMIT 2';
1
20
$SQL = 'DELETE FROM table_name 
ORDER BY id DESC LIMIT 2';
30 //DEL
20 //DEL
7
4
1
$SQL = 'DELETE FROM table_name 
ORDER BY id LIMIT 2';
1//DEL
4//DEL
7
20
30

$where = ['name' => 'Artem', 'age' => 28];
delete_records(string $name, $where);//array object

$SQL = 'UPDATE `maz_user` SET `Email`="123", "name" = "maz"';
$SQL = 'UPDATE `maz_user` SET `Email`="123", "name" = "maz" WHERE `id`="31"';
$SQL = 'UPDATE `maz_user` SET `Email`="123", "name" = "maz" WHERE name = "Artem"';
$SQL = 'UPDATE `maz_user` SET `Email`="123", "name" = "maz" WHERE name = "Artem" LIMIT 1';
$data = [
	'id' => 2
	'name' => 'maz',
	'age' => 10
];
update_record($name, $data);

$SQL = 'SELECT * FROM name_table';
$SQL = 'SELECT * FROM name_table WHERE id = 2';
get_record($name, $where, string $field = '*');

$SQL = 'SELECT id, age FROM name_table WHERE id = 2';
get_record($name, $where, string $field = 'id, age');

$SQL = 'SELECT id, age FROM name_table WHERE id = 2 ORDER BY id DESC';
$field = 'id, age';
$sort = 'id DESC';
get_records($name, $where, $sort, $field);
get_record_sql($sql);
get_records_sql($sql);

$SQL = 'SELECT id, age FROM name_table ORDER BY id DESC LIMIT 2';