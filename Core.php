<?php

/**
 * Created by PhpStorm.
 * User: Álvaro
 * Date: 16/08/2017
 * Time: 23:55
 */

require_once('../Settings.php');
require_once('../DevProfiles.php');
require_once('../Classes/Debug.php');
require_once('../Classes/Database.php');
require_once('../Classes/AppLogger.php');

class HugeCore extends Core
{

    public static $clientID;
    public static $clientSecret;

    //Obtener estos datos del php y hacer un metodo para obtener las releases y otras para los tree...

    public static function Load()
    {
        AppLogger::$CurLogger = new AppLogger();
        self::getAction();
    }

    public static function getAction()
    {
        AppLogger::$CurLogger->SetEventId($_REQUEST['action']);
        $req = $_SERVER['REQUEST_METHOD'];
        switch ($req) {
            case 'GET':
                if(isset($_GET["action"]))
                {
                    switch ($_GET["action"])
                    {
                        case "get-tags":
                            $owner = @$_GET['owner'];
                            $repo = @$_GET['repo'];
                            //echo self::GetRequest(self::StrFormat("http://api.github.com/repos/{0}/{1}/git/refs/tags/", $owner, $repo));
                            echo self::GetRequest("http://google.com/");
                            break;
                        case "get-tree":
                            //GET https://api.github.com/repos/Ikillnukes/PCStats/git/trees/master?client_id=$clientId&client_secret=$clientSecret&recursive=1
                            break;
                        default:
                            self::Kill("[GET] Action '".$_GET["action"]."' not set!");
                            break;
                    }
                }
                break;
            default:
                self::Kill(self::StrFormat("Undefined REQUEST_METHOD '{0}' used!", $req));
                break;
        }
    }

}

HugeCore::Load();