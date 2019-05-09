<?php

//tables
CREATE TABLE `worker` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`firstname` varchar(100) NOT NULL,
`lastname` varchar(100) NOT NULL,
`middlename` varchar(100) NOT NULL,
`department_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

CREATE TABLE `department` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(100) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


//Выводит название отделов, в которых имеется 5 и более сотрудников
SELECT name FROM `worker`
JOIN department ON worker.department_id=department.id
GROUP BY department_id
HAVING COUNT(*) >= 5;

//Выводит 2 столбца, в первом выводится название отдела, во втором id всех сотрудников данного отдела, перечисленные через запятую
SELECT name, GROUP_CONCAT(worker.id) AS worker_ids FROM `worker`
JOIN department ON worker.department_id=department.id
GROUP BY department_id;

/*********************************************************/
/*********************************************************/
//хранение информации телефонного справочника
CREATE TABLE `people` (
    `id` int NOT NUll AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `phones` (
    `id` int NOT NUll AUTO_INCREMENT,
    `number` int(11) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `people_phones` (
    people_id int NOT NULL REFERENCES people(id),
    phone_id int NOT NULL REFERENCES phones(id),
    PRIMARY KEY (people_id, phone_id)
);