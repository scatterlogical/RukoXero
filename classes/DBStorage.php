<?php

namespace RukoXero {

    class DBStorage
    {
        private static function _CreateTable()
        {
            $query = db_query(
                "CREATE TABLE IF NOT EXISTS api_xero
            (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            value VARCHAR(1530)
            )"
            );
        }

        private static function _CreateVar($name, $value = "")
        {
            return db_query(
                "INSERT INTO api_xero (name, value) 
            SELECT '" . $name . "','" . $value . "' 
            WHERE NOT EXISTS 
            (SELECT name FROM api_xero WHERE name='" . $name . "');"
            );
        }

        private static function _GetVar($name)
        {
            $query = db_query("SELECT value FROM api_xero WHERE name='{$name}'");
            $value = db_fetch_array($query)['value'];
            return $value;
        }

        private static function _SetVar($name, $value)
        {
            return db_query("UPDATE api_xero SET value='" . $value . "' WHERE name='" . $name . "';");
        }

        static function InitVars()
        {
            //create table
            DBStorage::_CreateTable();

            //create variables
            DBStorage::_CreateVar('XERO_CLIENTID');
            DBStorage::_CreateVar('XERO_CLIENTSECRET');
            DBStorage::_CreateVar('XERO_REDIRECTURI');
            DBStorage::_CreateVar('XERO_SCOPES');
            DBStorage::_CreateVar('XERO_STATE');
            DBStorage::_CreateVar('XERO_TOKEN_TOKEN');
            DBStorage::_CreateVar('XERO_TOKEN_EXPIRES');
            DBStorage::_CreateVar('XERO_TOKEN_TENANTID');
            DBStorage::_CreateVar('XERO_TOKEN_REFRESH');
            DBStorage::_CreateVar('XERO_TOKEN_ID');

            if (DBStorage::GetScopes() == "")
                DBStorage::SetScopes("offline_access openid email accounting.settings");

            if (DBStorage::GetRedirectURI() == "") {
                $url = "http" . (!empty($_SERVER['HTTPS']) ? "s" : "") .
                    "://" . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];

                $url = preg_replace("/index.php/i", "plugins/rukoxero/modules/callback.php", $url);

                DBStorage::SetRedirectURI($url);
            }

        }

        static function GetClientID()
        {
            return DBStorage::_GetVar('XERO_CLIENTID');
        }

        static function SetClientID($value)
        {
            return DBStorage::_SetVar('XERO_CLIENTID', $value);
        }

        static function GetClientSecret()
        {
            return DBStorage::_GetVar('XERO_CLIENTSECRET');
        }

        static function SetClientSecret($value)
        {
            return DBStorage::_SetVar('XERO_CLIENTSECRET', $value);
        }

        static function GetRedirectURI()
        {
            return DBStorage::_GetVar('XERO_REDIRECTURI');
        }

        static function SetRedirectURI($value)
        {
            return DBStorage::_SetVar('XERO_REDIRECTURI', $value);
        }

        static function GetToken()
        {
            return [
                'Token' => DBStorage::_GetVar('XERO_TOKEN_TOKEN'),
                'Expires' => DBStorage::_GetVar('XERO_TOKEN_EXPIRES'),
                'TenantID' => DBStorage::_GetVar('XERO_TOKEN_TENANTID'),
                'RefreshToken' => DBStorage::_GetVar('XERO_TOKEN_REFRESH'),
                'IDToken' => DBStorage::_GetVar('XERO_TOKEN_ID')
            ];
        }

        static function SetToken($value)
        {
            DBStorage::_SetVar('XERO_TOKEN_TOKEN', $value['Token']);
            DBStorage::_SetVar('XERO_TOKEN_EXPIRES', $value['Expires']);
            DBStorage::_SetVar('XERO_TOKEN_TENANTID', $value['TenantID']);
            DBStorage::_SetVar('XERO_TOKEN_REFRESH', $value['RefreshToken']);
            DBStorage::_SetVar('XERO_TOKEN_ID', $value['IDToken']);
        }

        static function GetScopes()
        {
            return DBStorage::_GetVar('XERO_SCOPES');
        }

        static function SetScopes($value)
        {
            return DBStorage::_SetVar('XERO_SCOPES', $value);
        }

        static function GetState()
        {
            return DBStorage::_GetVar('XERO_STATE');
        }

        static function SetState($value)
        {
            return DBStorage::_SetVar('XERO_STATE', $value);
        }

    }
}
?>