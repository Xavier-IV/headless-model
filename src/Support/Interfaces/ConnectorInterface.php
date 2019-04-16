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
    public function all();

    public function find($id);

    public function destroy($id);

    public function create();

}