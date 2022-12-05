<?php

use RukoXero\DBStorage as DBStorage;

//When form is posted, open Xero Auth Portal
//do this up here so form reflects updated data
if ($_POST) {
    if (isset($_POST['save'])) {
        DBStorage::SetClientID($_POST['ClientID']);
        DBStorage::SetClientSecret($_POST['ClientSecret']);
        DBStorage::SetRedirectURI($_POST['RedirectURI']);
        DBStorage::SetScopes($_POST['Scopes']);

    } elseif (isset($_POST['connect'])) {
        $auth_url = RukoXero\Authentication\GetAuthPortal();
        echo '<script type="text/javascript">
        var uri = "' . $auth_url . '"
        var left = (screen.width/2 - 300)
        var top = (screen.height/2 - 300)
        var authwindow = window.open(uri, "Xero Auth", 
        "width=600, height=600, scrollbars=yes, resizable=yes, top="+top+", left="+left);
        </script>';

    } else
        echo "Error";

}

//get existing settings from database
$clientId = DBStorage::GetClientID();
$clientSecret = DBStorage::GetClientSecret();
$redirectUri = DBStorage::GetRedirectURI();
$scopes = DBStorage::GetScopes();

//heading, help links and settings form
echo '
    <div style="padding:10px; text-align:center">
        <h1 class="page-title">XeroAPI Connection Administration</h1>
        <a href="https://developer.xero.com/app/manage" target="_blank">Xero Developer App Management</a> | 
        <a href="https://developer.xero.com/documentation/getting-started-guide" target="_blank">Getting Started Guide</a> | 
        <a href="https://developer.xero.com/documentation/guides/oauth2/scopes" target="_blank">About Authorisation Scopes</a> | 
        <a href="https://xeroapi.github.io/xero-php-oauth2/docs/v2/accounting/index.html" target="_blank">Xero API Reference</a>
        <hr>
    </div>
';

//Attempt API call to display connected organisation and prove it's working
try {
    $apiInstance = RukoXero\GetAPIInstance();
    $apiResponse = $apiInstance->getOrganisations(RukoXero\GetTenantID());
    $orgname = $apiResponse->getOrganisations()[0]->getName();

    $deeplink = RukoXero\GetDeepLink();

    $message = 'Connected to Organisation:<br><b>';
    $message .= $orgname . '</b><br>';
    $message .= '<h6><a class="btn btn-primary" href="'.$deeplink.'&redirecturl=/Settings/ConnectedApps/" target="_blank">
                Disconnect</a></h6>';
    
} catch (Exception $e) {
    $error = $e;
    $message = 'No Connected Organisation.';

    echo '
        <style type="text/css">
        label.col-md-3 {margin-left: 10%;}
        input.input-xlarge {margin: auto}
        </style>
        <div style="margin: auto">
            <div style="margin: auto; width:75%">
                <form method="post"> 
                <br>
                <label class="col-md-3 control-label" for="ClientID">ClientID</label>
                <input name="ClientID" id="ClientID" value="' . $clientId . '" type="text" class="form-control input-xlarge fieldtype_input autofocus required noSpace valid" aria-invalid="false">
                <br>
                <label class="col-md-3 control-label" for="ClientSecret">ClientSecret</label>
                <input name="ClientSecret" id="ClientSecret" value="' . $clientSecret . '" type="text" class="form-control input-xlarge fieldtype_input autofocus required noSpace valid" aria-invalid="false">
                <br>
                <label class="col-md-3 control-label" for="RedirectURI">RedirectURI</label>
                <input name="RedirectURI" id="RedirectURI" value="' . $redirectUri . '" type="text" class="form-control input-xlarge fieldtype_input autofocus required noSpace valid" aria-invalid="false">
                <br>
                <label class="col-md-3 control-label" for="Scopes">Scopes</label>
                <input name="Scopes" id="Scopes" rows="3" value="' . $scopes . '" type="text" class="form-control input-xlarge fieldtype_input autofocus required noSpace valid" aria-invalid="false">
            
                <div style="padding:10px; text-align:center">
                    <br>
                    <input class="btn btn-primary" type="submit" name="save" value="Save Configuration">
                    <input class="btn btn-primary" type="submit" name="connect" value="Connect to Xero">
                </div>
            
            </div>
            </div>
            </form> <hr>
        </div>
    ';
}

echo '<div style="padding:10px; text-align:center"><h4>' . $message . '</h4><hr></div>';
        

//if we have an auth code passed in the URL, get our tokens, then refresh with clean url 
//do this down here so any error is displayed at the bottom
if (isset($_GET['state']) && isset($_GET['code'])) {
    RukoXero\Authentication\GetToken($_GET['state'], $_GET['code']);
    $url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'] . '?module=rukoxero/admin_page/index';
    echo '<script type="text/javascript"> window.location.replace("' . $url . '") </script>';
}

//echo $error;

?>