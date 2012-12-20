<?php
require_once 'simpleReport/core/SRParameter.php';
require_once 'simpleReport/Report.php';

SRParameter::set('OPA', true);
Report::from('report.jrxml')->outPut();

/** 
 * Problemas no desenvolvimento
 * 
 * - Um Elemento dentro do outro
 * - Converter XML para Array
 * - Iterator / Fonte de dados
 * - printWhenExpression
 * - parametros
 * - Conversão de tipos
 * - Retornos de erros
*/

?>