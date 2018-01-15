<?php
const POSITION_DIRECTOR = 1;
const POSITION_PROGRAMMER = 2;
const POSITION_CLEANER = 3;

$positions = [
    POSITION_DIRECTOR => [
        'id' => POSITION_DIRECTOR,
        'title' => 'Direktorius/e'
    ],
    POSITION_PROGRAMMER => [
        'id' => POSITION_PROGRAMMER,
        'title' => 'Programuotojas/a'
    ],
    POSITION_CLEANER => [
        'id' => POSITION_CLEANER,
        'title' => 'Valytojas/a'
    ]
];

/**
 * @param int $id
 * @param array $positions
 * @return null|array
 */
function getPositionByID($id, $positions)
{
    $position = null;
    if (array_key_exists($id, $positions)) {
        $position =  $positions[$id];
    }
    return $position;
}