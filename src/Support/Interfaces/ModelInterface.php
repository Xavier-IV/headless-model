<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Zafranudin
 * Date: 3/20/2019
 * Time: 4:37 PM
 */

namespace XavierIV\HeadlessModel\Support\Interfaces;


interface ModelInterface
{
    public function all();

    public function find($id);

    public function destroy($id);

    public function update($id);

    public function create($body = null);
}