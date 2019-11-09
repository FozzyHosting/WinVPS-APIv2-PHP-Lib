# Fozzy\WinVPS\Api\JobsApi

All URIs are relative to *https://winvps.fozzy.com/api/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**jobsGet**](JobsApi.md#jobsget) | **GET** /jobs | List of all planned and completed commands.
[**jobsIdDelete**](JobsApi.md#jobsiddelete) | **DELETE** /jobs/{id} | Cancel specified Job.
[**jobsIdGet**](JobsApi.md#jobsidget) | **GET** /jobs/{id} | View single Job details.
[**jobsPendingGet**](JobsApi.md#jobspendingget) | **GET** /jobs/pending | List of all planned commands.

# **jobsGet**
> \Fozzy\WinVPS\Api\Models\JobsListResponse jobsGet()

List of all planned and completed commands.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKeyAuth
$host = 'Endpoint from API docs';
$key = 'API key from WinVPS client area';
$config = Fozzy\WinVPS\Api\Configuration::getDefaultConfiguration()->setHost($host)->setApiKey($key);
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Fozzy\WinVPS\Api\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Api-Key', 'Bearer');

$apiInstance = new Fozzy\WinVPS\Api\Resources\JobsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->jobsGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling JobsApi->jobsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Fozzy\WinVPS\Api\Models\JobsListResponse**](../Model/JobsListResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **jobsIdDelete**
> jobsIdDelete($id)

Cancel specified Job.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKeyAuth
$host = 'Endpoint from API docs';
$key = 'API key from WinVPS client area';
$config = Fozzy\WinVPS\Api\Configuration::getDefaultConfiguration()->setHost($host)->setApiKey($key);
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Fozzy\WinVPS\Api\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Api-Key', 'Bearer');

$apiInstance = new Fozzy\WinVPS\Api\Resources\JobsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | 

try {
    $apiInstance->jobsIdDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling JobsApi->jobsIdDelete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**|  |

### Return type

void (empty response body)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **jobsIdGet**
> \Fozzy\WinVPS\Api\Models\JobDetailsResponse jobsIdGet($id)

View single Job details.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKeyAuth
$host = 'Endpoint from API docs';
$key = 'API key from WinVPS client area';
$config = Fozzy\WinVPS\Api\Configuration::getDefaultConfiguration()->setHost($host)->setApiKey($key);
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Fozzy\WinVPS\Api\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Api-Key', 'Bearer');

$apiInstance = new Fozzy\WinVPS\Api\Resources\JobsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | 

try {
    $result = $apiInstance->jobsIdGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling JobsApi->jobsIdGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**|  |

### Return type

[**\Fozzy\WinVPS\Api\Models\JobDetailsResponse**](../Model/JobDetailsResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **jobsPendingGet**
> \Fozzy\WinVPS\Api\Models\JobsListResponse jobsPendingGet()

List of all planned commands.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKeyAuth
$host = 'Endpoint from API docs';
$key = 'API key from WinVPS client area';
$config = Fozzy\WinVPS\Api\Configuration::getDefaultConfiguration()->setHost($host)->setApiKey($key);
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Fozzy\WinVPS\Api\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Api-Key', 'Bearer');

$apiInstance = new Fozzy\WinVPS\Api\Resources\JobsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->jobsPendingGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling JobsApi->jobsPendingGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Fozzy\WinVPS\Api\Models\JobsListResponse**](../Model/JobsListResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

