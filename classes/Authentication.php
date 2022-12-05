<?php

//ini_set('display_errors', 'On');

namespace RukoXero\Authentication {

  use XeroAPI;
  use GuzzleHttp;
  use RukoXero\DBStorage as DBStorage;

  //Automatically create our global variables in the database
  DBStorage::InitVars();


  function GetAuthPortal()
  {
    $provider = new \League\OAuth2\Client\Provider\GenericProvider([
      'clientId' => DBStorage::GetClientID(),
      'clientSecret' => DBStorage::GetClientSecret(),
      'redirectUri' => DBStorage::GetRedirectURI(),
      'urlAuthorize' => 'https://login.xero.com/identity/connect/authorize',
      'urlAccessToken' => 'https://identity.xero.com/connect/token',
      'urlResourceOwnerDetails' => 'https://api.xero.com/api.xro/2.0/Organisation'
    ]);

    $options = [
      // 'scope' => ['openid email profile offline_access assets projects accounting.settings accounting.transactions accounting.contacts accounting.journals.read accounting.reports.read accounting.attachments']
      'scope' => DBStorage::GetScopes()
    ];

    // This returns the authorizeUrl with necessary parameters applied (e.g. state).
    $authorizationUrl = $provider->getAuthorizationUrl($options);

    // Save the state generated for you and store it to the session.
    // For security, on callback we compare the saved state with the one returned to ensure they match.
    DBStorage::SetState($provider->getState());

    // Redirect the user to the authorization URL.
    return $authorizationUrl;

  }

  function GetToken($state, $code)
  {
    // Check given state against previously stored one to mitigate CSRF attack
    if ($state !== DBStorage::GetState()) {
      echo "Invalid State";
      DBStorage::SetState('');
      exit('Invalid state');
    }

    try {
      $provider = new \League\OAuth2\Client\Provider\GenericProvider([
        'clientId' => DBStorage::GetClientID(),
        'clientSecret' => DBStorage::GetClientSecret(),
        'redirectUri' => DBStorage::GetRedirectURI(),
        'urlAuthorize' => 'https://login.xero.com/identity/connect/authorize',
        'urlAccessToken' => 'https://identity.xero.com/connect/token',
        'urlResourceOwnerDetails' => 'https://api.xero.com/api.xro/2.0/Organisation'
      ]);

      $accessToken = $provider->getAccessToken('authorization_code', [
        'code' => $code
      ]);

      $config = XeroAPI\XeroPHP\Configuration::getDefaultConfiguration()->setAccessToken((string) $accessToken->getToken());

      $identityInstance = new XeroAPI\XeroPHP\Api\IdentityApi(
        new GuzzleHttp\Client(),
        $config
      );

      $result = $identityInstance->getConnections();

      // Save my tokens, expiration tenant_id
      DBStorage::SetToken([
        'Token' => $accessToken->getToken(),
        'Expires' => $accessToken->getExpires(),
        'TenantID' => $result[0]->getTenantId(),
        'RefreshToken' => $accessToken->getRefreshToken(),
        'IDToken' => $accessToken->getValues()["id_token"]
      ]);
    } catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {
      echo "Authentication callback invalid or expired";
      exit();
    }

  }

  function RenewToken(bool $renewNow = false)
  {
    if (time() > DBStorage::GetToken()['Expires'] || $renewNow == true) {
      $provider = new \League\OAuth2\Client\Provider\GenericProvider([
        'clientId' => DBStorage::GetClientID(),
        'clientSecret' => DBStorage::GetClientSecret(),
        'redirectUri' => DBStorage::GetRedirectURI(),
        'urlAuthorize' => 'https://login.xero.com/identity/connect/authorize',
        'urlAccessToken' => 'https://identity.xero.com/connect/token',
        'urlResourceOwnerDetails' => 'https://api.xero.com/api.xro/2.0/Organisation'
      ]);

      $newAccessToken = $provider->getAccessToken('refresh_token', [
        'refresh_token' => DBStorage::GetToken()['RefreshToken']
      ]);

      //echo 'New Token: ' . $newAccessToken->getToken();

      DBStorage::SetToken([
        'Token' => $newAccessToken->getToken(),
        'Expires' => $newAccessToken->getExpires(),
        'TenantID' => DBStorage::GetToken()["TenantID"],
        'RefreshToken' => $newAccessToken->getRefreshToken(),
        'IDToken' => $newAccessToken->getValues()["id_token"]
      ]);

    }

  }

}
?>