<?php
require_once('mysql.php');

const AVG = 'AVG';
const MIN = 'MIN';
const MAX = 'MAX';

/**
 * @return array|string
 */
function getCompanyWorkersCount()
{
    $result = getOne('SELECT COUNT(*) AS `count` FROM users');
    return $result['count'];
}

/**
 * @param string $type
 * @return int|string
 */
function getSalary($type)
{
    $result = getOne('SELECT ' . $type . '(salary) AS `salary` FROM users');
    return $result ? number_format($result['salary'], 2) : 0;
}

/**
 * @param int $position
 * @param array $positions
 * @return int|string
 */
function getPositionMinSalary($position, $positions)
{
    $salary = 0;
    if (array_key_exists($position, $positions)) {
        $result = getOne('SELECT MIN(salary) AS `salary` FROM users WHERE position = ' . $position);
        return $result ? number_format($result['salary'], 2) : 0;
    }
    return $salary;
}

/**
 * @param int $position
 * @param array $positions
 * @return int
 */
function getPositionUsersCount($position, $positions)
{
    $count = 0;
    if (array_key_exists($position, $positions)) {
        $result = getOne('SELECT COUNT(*) AS `count` FROM users WHERE position = ' . $position);
        return $result ? $result['count'] : 0;
    }
    return $count;
}

/**
 * @return float|int
 */
function getAvgSalary()
{
    return getSalary(AVG);
}

/**
 * @return int|string
 */
function getMinSalary()
{
    return getSalary(MIN);
}

/**
 * @return int|string
 */
function getMaxSalary()
{
    return getSalary(MAX);
}
