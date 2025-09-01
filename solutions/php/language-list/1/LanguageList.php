<?php

function language_list(string ...$list):array
{    
    return $list;
}

function add_to_language_list(array $list, string $newidioma):array
{
   $list[]=$newidioma;  
    return $list;
}
function prune_language_list(array $list):array{
    array_shift($list);
    return $list;
}
function current_language(array $list):string{
        return $list[0];
}
function language_list_length(array $list):int{
    return count($list);
}