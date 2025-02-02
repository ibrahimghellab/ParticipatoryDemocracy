<?php
require_once("../Model/theme.php");

class ThemeController
{
    public static function getThemeById()
    {
        $tab = json_decode(Theme::getThemeById(), true);
        return $tab;
    }
}