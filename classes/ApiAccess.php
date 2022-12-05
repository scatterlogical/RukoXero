<?php

namespace RukoXero {

    use XeroAPI;
    use GuzzleHttp;

    /**
     * Returns an authorized instance of the Xero API
     * $api: string specifying which API to return from list:
     * 
     * AccountingApi (default)
     * AssetApi
     * ProjectApi
     * FilesApi
     * PayrollAuApi
     * PayrollNzApi
     * PayrollUkApi
     * AppStoreApi
     */
    function GetAPIInstance(string $api = 'AccountingApi')
    {
        Authentication\RenewToken();

        $token = (string) DBStorage::GetToken()['Token'];
        $config = XeroAPI\XeroPHP\Configuration::getDefaultConfiguration()->setAccessToken($token);

        switch ($api) {
            default:
            case 'AccountingApi':
                $apiInstance = new XeroAPI\XeroPHP\Api\AccountingApi(
                    new GuzzleHttp\Client(),
                    $config
                );
                break;
            case 'AssetApi':
                $apiInstance = new XeroAPI\XeroPHP\Api\AssetApi(
                    new GuzzleHttp\Client(),
                    $config
                );
                break;
            case 'ProjectApi':
                $apiInstance = new XeroAPI\XeroPHP\Api\ProjectApi(
                    new GuzzleHttp\Client(),
                    $config
                );
                break;
            case 'FilesApi':
                $apiInstance = new XeroAPI\XeroPHP\Api\FilesApi(
                    new GuzzleHttp\Client(),
                    $config
                );
                break;
            case 'PayrollAuApi':
                $apiInstance = new XeroAPI\XeroPHP\Api\PayrollAuApi(
                    new GuzzleHttp\Client(),
                    $config
                );
                break;
            case 'PayrollNzApi':
                $apiInstance = new XeroAPI\XeroPHP\Api\PayrollNzApi(
                    new GuzzleHttp\Client(),
                    $config
                );
                break;
            case 'PayrollUkApi':
                $apiInstance = new XeroAPI\XeroPHP\Api\PayrollUkApi(
                    new GuzzleHttp\Client(),
                    $config
                );
                break;
            case 'AppStoreApi':
                $apiInstance = new XeroAPI\XeroPHP\Api\AppStoreApi(
                    new GuzzleHttp\Client(),
                    $config
                );
                break;

        }

        return $apiInstance;
    }

    /**
     * Returns the TenantID to the connected organisation 
     */
    function GetTenantID()
    {
      return (string) DBStorage::GetToken()['TenantID'];
    }

    /**
     * Returns the prefix URI for deeplinking to connected organisation.
     * see https://developer.xero.com/documentation/guides/how-to-guides/deep-link-xero/
     */
    function GetDeepLink()
    {
        $apiInstance = GetAPIInstance();
        $apiResponse = $apiInstance->getOrganisations(GetTenantID());
        $organisation = $apiResponse->getOrganisations()[0];
        $orgshort = $organisation->getShortCode();

        return "https://go.xero.com/organisationlogin/default.aspx?shortcode=".$orgshort;
    }
  
}
?>