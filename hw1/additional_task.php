<?php

function get_all_tasks(){
    return [
        [
            'title'=>'Задача 1',
            'date'=>date_create('yesterday'),
            'participants'=>['Артур', 'Полина'],
            'closed'=>false
        ],
        [
            'title'=>'Задача 2',
            'date'=>date_create('tomorrow'),
            'participants'=>[],
            'closed'=>false
        ],
        [
            'title'=>'Задача 3',
            'date'=>date_create(),
            'participants'=>['Артур', 'Глеб'],
            'closed'=>false
        ],
        [
            'title'=>'Задача 4',
            'date'=>date_create('yesterday'),
            'participants'=>['Павел', 'Полина'],
            'closed'=>true
        ]
    ];
}

// Задача 1:
// Написать функцию, которая принимает массив и возвращает новый массив,
// в который войдут:
// 1.1. новые задачи (Дата задачи > date_create())
// 1.2. закрытые задачи (со значением closed равным true)
// 1.3. невыполненные задачи (со значением closed равным false и датой меньше date_create())
function manage_task ($array){
    foreach ($array as $task){
        if (($task['date'] > date_create()) || ($task['closed']=== true)
            || (($task['closed'] === false) and ($task['date']< date_create())) ) $new_arr[] = $task;
    }
return $new_arr;
}
var_dump(manage_task(get_all_tasks()));
// Задача 2:
// Написать функцию, которая принимает массив и возвращает новый массив,
// в который войдут задачи, в которых имя участника равно значению $name:
function get_tasks_by_name($array, $name){
    // реализация
    foreach ($array as $task){
        if (in_array("$name", $task['participants'])) $new_arr[] =$task;
    }
    return $new_arr;
}
var_dump(get_tasks_by_name(get_all_tasks(), 'Глеб'));