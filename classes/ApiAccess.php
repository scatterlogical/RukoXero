<?php

namespace RukoXero {

    use XeroAPI;
    use GuzzleHttp;

    enum XeroApiEnum
    {
        case AccountingApi;
        case AssetApi;
        case ProjectApi;
        case FilesApi;
        case PayrollAuApi;
        case PayrollNzApi;
        case PayrollUkApi;
        case AppStoreApi;
    }
    ;

    /**
     * Returns an authorized instance of the Xero API
     * $api: XeroApiEnum specifying which API to return
     */
    function GetAPIInstance(XeroApiEnum $api = XeroApiEnum::AccountingApi)
    {
        Authentication\RenewToken();

        $token = (string) DBStorage::GetToken()['Token'];
        $config = XeroAPI\XeroPHP\Configuration::getDefaultConfiguration()->setAccessToken($token);

        switch ($api) {
            case XeroApiEnum::AccountingApi:
                $apiInstance = new XeroAPI\XeroPHP\Api\AccountingApi(
                    new GuzzleHttp\Client(),
                    $config
                );
                break;
            case XeroApiEnum::AssetApi:
                $apiInstance = new XeroAPI\XeroPHP\Api\AssetApi(
                    new GuzzleHttp\Client(),
                    $config
                );
                break;
            case XeroApiEnum::ProjectApi:
                $apiInstance = new XeroAPI\XeroPHP\Api\ProjectApi(
                    new GuzzleHttp\Client(),
                    $config
                );
                break;
            case XeroApiEnum::FilesApi:
                $apiInstance = new XeroAPI\XeroPHP\Api\FilesApi(
                    new GuzzleHttp\Client(),
                    $config
                );
                break;
            case XeroApiEnum::PayrollAuApi:
                $apiInstance = new XeroAPI\XeroPHP\Api\PayrollAuApi(
                    new GuzzleHttp\Client(),
                    $config
                );
                break;
            case XeroApiEnum::PayrollNzApi:
                $apiInstance = new XeroAPI\XeroPHP\Api\PayrollNzApi(
                    new GuzzleHttp\Client(),
                    $config
                );
                break;
            case XeroApiEnum::PayrollUkApi:
                $apiInstance = new XeroAPI\XeroPHP\Api\PayrollUkApi(
                    new GuzzleHttp\Client(),
                    $config
                );
                break;
            case XeroApiEnum::AppStoreApi:
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