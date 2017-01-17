<?php

namespace Core;

Interface ICore {

    const DS              = DIRECTORY_SEPARATOR;

    const ROOT            =  '';

    const APP_PATH        = self::ROOT . "app". self::DS;

    const FW_PATH         = self::ROOT . "framework" . self::DS;

    const PUBLIC_PATH     = self::ROOT . "public" . self::DS;

    const CONFIG_PATH     = self::APP_PATH . "config" . self::DS;

    const CONTROLLER_PATH = self::APP_PATH . "controllers" . self::DS;

    const MODEL_PATH      = self::APP_PATH . "models" . self::DS;

    const VIEW_PATH       = self::APP_PATH . "views" . self::DS;

    const CORE_PATH       = self::FW_PATH . "core" . self::DS;

    const DB_PATH         = self::FW_PATH . "database" . self::DS;

    const LIB_PATH        = self::FW_PATH . "libs" . self::DS;

    const HELPER_PATH     = self::FW_PATH . "helpers" . self::DS;

    const DATA_PATH       = self::APP_PATH . "data" . self::DS;

}