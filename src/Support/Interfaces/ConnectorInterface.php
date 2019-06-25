<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Zafranudin
 * Date: 3/20/2019
 * Time: 5:47 PM
 */

namespace XavierIV\HeadlessModel\Support\Interfaces;

interface ConnectorInterface
{
    function get();

    function delete();

    function post();

    function put();

}