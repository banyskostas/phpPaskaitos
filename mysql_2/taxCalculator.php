<?php
const NPD = 149;
const INCOME_TAX = 0.15;
const HEALTH_INSURANCE = 0.06;
const SOCIAL_INSURANCE = 0.03;
const SODRA = 0.3098;
const PAYMENT_TO_WARRANTY_FUND = 0.002;

/**
 * @return int
 */
function getNPD()
{
    return NPD;
}

/**
 * @return int
 */
function getIncomeTax()
{
    return INCOME_TAX;
}

/**
 * @return int
 */
function getHealthInsurance()
{
    return HEALTH_INSURANCE;
}

/**
 * @return int
 */
function getSocialInsurance()
{
    return SOCIAL_INSURANCE;
}

/**
 * @return int
 */
function getSodra()
{
    return SODRA;
}

/**
 * @return int
 */
function getPaymentToWarrantyFund()
{
    return PAYMENT_TO_WARRANTY_FUND;
}

/**
 * @param $salary
 * @return mixed
 */
function calcIncomeTax($salary)
{
    return ($salary - getNPD()) * getIncomeTax();
}

/**
 * @param $salary
 * @return mixed
 */
function calcHealthInsurance($salary)
{
    return $salary * getHealthInsurance();
}

/**
 * @param $salary
 * @return mixed
 */
function calcSocialInsurance($salary)
{
    return $salary * getSocialInsurance();
}

/**
 * @param $salary
 * @return mixed
 */
function calcSalaryAfterTaxes($salary)
{
    return $salary - calcIncomeTax($salary) - calcHealthInsurance($salary) - calcSocialInsurance($salary);
}

/**
 * @param $salary
 * @return mixed
 */
function calcSodra($salary)
{
    return $salary * getSodra();
}

/**
 * @param $salary
 * @return mixed
 */
function calcPaymentToWarrantyFund($salary)
{
    return $salary * getPaymentToWarrantyFund();
}

/**
 * @param $salary
 * @return mixed
 */
function calcPositionPriceTotal($salary)
{
    return $salary + calcSodra($salary) + calcPaymentToWarrantyFund($salary);
}