# Fozzy\WinVPS\Api\LocationsApi

All URIs are relative to *https://winvps.fozzy.com/api/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**locationsGet**](LocationsApi.md#locationsget) | **GET** /locations | Returns list of locations available for new machines.

# **locationsGet**
> \Fozzy\WinVPS\Api\Models\LocationDefinition[] locationsGet()

Returns list of locations available for new machines.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKeyAuth
$config = Fozzy\WinVPS\Api\Configuration::getDefaultConfiguration()->setApiKey('Api-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Fozzy\WinVPS\Api\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Api-Key', 'Bearer');

$apiInstance = new Fozzy\WinVPS\Api\Resources\LocationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->locationsGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationsApi->locationsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Fozzy\WinVPS\Api\Models\LocationDefinition[]**](../Model/LocationDefinition.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

