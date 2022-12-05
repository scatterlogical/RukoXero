# RukoXero
Xero API integration plugin for Rukovoditel

- https://www.rukovoditel.net/
- https://www.xero.com/ 

## About
RukoXero is a plugin for Rukovoditel to access the Xero API from within PHP scripts.  
It handles the OAuth2 authentication process, and presents a simple interface to make API calls to Xero.  

## Installation and Setup
Clone the respository to your **rukovoditel\plugins** directory, and in **rukovoditel\config\server.php**, 
add 'RukoXero' to the available plugins definition, so it looks like this:
`define('AVAILABLE_PLUGINS','ext,RukoXero');`  

XeroAPI Menu option should now be available to *administrators only*.
![image](https://user-images.githubusercontent.com/3754911/205526124-3c826cee-d819-4071-ad80-e84d75882be2.png)

Follow the [Xero Developer App Management](https://developer.xero.com/app/manage) link, 
and create a new application as per the [Getting Started Guide](https://developer.xero.com/documentation/getting-started-guide).  
Select Web App, and for the URI, you will need to enter the full address to **/plugins/rukoxero/modules/callback.php**

Eg. `https://test.com/rukovoditel/plugins/rukoxero/modules/callback.php`

Once you have created your app, go to the app configuration page:  
![image](https://user-images.githubusercontent.com/3754911/205526950-5480ad69-090e-4e40-ba7c-143c336884a5.png)  

From here you can copy your ClientID and generate a ClientSecret to enter into the RukoXero configuration page, along with the same RedirectURI.  
![image](https://user-images.githubusercontent.com/3754911/205527148-576b769e-cca9-49be-a5f4-9c0d94136d08.png)  


You will need to review the scopes you will require access to, 
[see here for information on scopes](https://developer.xero.com/documentation/guides/oauth2/scopes).  
You must include the **offline_access** scope to be able to obtain a refresh token to maintain an offline connection.

Now you can save your configuration and attempt connection to Xero.  

A window will popup with the Xero OAuth2 Authentication Portal, requesting permission and selection of the organisation you wish to connect to.
Please note that at this time, RukoXero **only allows for connection to one organisation at a time**.  

Once you have approved the permissions, the popup will close and you will be directed back to the RukoXero configuration page, 
hopefully displaying a successful connection to your organisation.  
![image](https://user-images.githubusercontent.com/3754911/205528041-72423b51-af2c-476a-ab1b-c3fd3e9ebc0e.png)


## API Access
The XeroAPI should now be accessible through any PHP scripting sections within Rukovoditel.  

The basic syntax for accessing API calls is as such:  
```
$AccountingApi = RukoXero\GetApiInstance(RukoXero\XeroApiEnum::AccountingApi);
$contacts = $AccountingApi->getContacts(RukoXero\GetTenantID());
echo $contacts[0];
```

`RukoXero\GetApiInstance()` retrieves an authorized instance to the Xero API, selected by RukoXero\XeroApiEnum. This defaults to **AccountingApi**.
The other options are:
- AssetApi
- ProjectApi
- FilesApi
- PayrollAuApi
- PayrollNzApi
- PayrollUkApi
- AppStoreApi

Once you have received your API instance, you can make calls by providing the required TenantID with RukoXero\GetTenantID().  
[See here for Xero's API Reference](https://xeroapi.github.io/xero-php-oauth2/docs/v2/accounting/index.html).

## Deep Links
Finally a function is provided for accessing deep links within your Xero Organisation. [See here for more info on deep links](https://developer.xero.com/documentation/guides/how-to-guides/deep-link-xero/).  
`RukoXero\GetDeepLink()` will provide the prefix with your Organisation's shortcode to construct a deep link to pages within Xero.  

Just append the redirect required, eg. `$connectedAppsLink = RukoXero\GetDeepLink() . "&redirecturl=/Settings/ConnectedApps/";`
