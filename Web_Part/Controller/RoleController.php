<?php
require_once("../Model/role.php");

class RoleController
{
    public static function getAll()
    {
        $tab = json_decode(Role::getAll(), true);
        return $tab;
    }
}