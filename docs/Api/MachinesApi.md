# Fozzy\WinVPS\Api\MachinesApi

All URIs are relative to *https://winvps.fozzy.com/api/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**machinesGet**](MachinesApi.md#machinesget) | **GET** /machines | Returns machines list in short form.
[**machinesNameAddIpPost**](MachinesApi.md#machinesnameaddippost) | **POST** /machines/{name}/add_ip | Send unary machine command
[**machinesNameCommandPost**](MachinesApi.md#machinesnamecommandpost) | **POST** /machines/{name}/{command} | Send single command which does not need additional options.
[**machinesNameDelete**](MachinesApi.md#machinesnamedelete) | **DELETE** /machines/{name} | Terminate machine
[**machinesNameGet**](MachinesApi.md#machinesnameget) | **GET** /machines/{name} | Returns machine details
[**machinesNameJobsGet**](MachinesApi.md#machinesnamejobsget) | **GET** /machines/{name}/jobs | Returns list of jobs assigned to machine.
[**machinesNamePost**](MachinesApi.md#machinesnamepost) | **POST** /machines/{name} | Reinstall machine
[**machinesNamePut**](MachinesApi.md#machinesnameput) | **PUT** /machines/{name} | Update machine details
[**machinesNameUsersGet**](MachinesApi.md#machinesnameusersget) | **GET** /machines/{name}/users | Returns list of additional system users.
[**machinesPost**](MachinesApi.md#machinespost) | **POST** /machines | Create new machine.
[**machinesRunningGet**](MachinesApi.md#machinesrunningget) | **GET** /machines/running | Returns list of currently running machines.
[**machinesStoppedGet**](MachinesApi.md#machinesstoppedget) | **GET** /machines/stopped | Returns list of currently stopped or suspended machines.

# **machinesGet**
> \Fozzy\WinVPS\Api\Models\MachinesListResponse machinesGet()

Returns machines list in short form.

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

$apiInstance = new Fozzy\WinVPS\Api\Resources\MachinesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->machinesGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MachinesApi->machinesGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Fozzy\WinVPS\Api\Models\MachinesListResponse**](../Model/MachinesListResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **machinesNameAddIpPost**
> \Fozzy\WinVPS\Api\Models\MachineAddIpResponse machinesNameAddIpPost($name)

Send unary machine command

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

$apiInstance = new Fozzy\WinVPS\Api\Resources\MachinesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$name = "name_example"; // string | 

try {
    $result = $apiInstance->machinesNameAddIpPost($name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MachinesApi->machinesNameAddIpPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**|  |

### Return type

[**\Fozzy\WinVPS\Api\Models\MachineAddIpResponse**](../Model/MachineAddIpResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **machinesNameCommandPost**
> \Fozzy\WinVPS\Api\Models\MachineCommandResultResponse machinesNameCommandPost($name, $command)

Send single command which does not need additional options.

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

$apiInstance = new Fozzy\WinVPS\Api\Resources\MachinesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$name = "name_example"; // string | Machine name.
$command = "command_example"; // string | Command key.

try {
    $result = $apiInstance->machinesNameCommandPost($name, $command);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MachinesApi->machinesNameCommandPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Machine name. |
 **command** | **string**| Command key. |

### Return type

[**\Fozzy\WinVPS\Api\Models\MachineCommandResultResponse**](../Model/MachineCommandResultResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **machinesNameDelete**
> \Fozzy\WinVPS\Api\Models\MachineCommandResultResponse machinesNameDelete($name)

Terminate machine

Creates machine deletion jobs. This action can be cancelled in two days.

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

$apiInstance = new Fozzy\WinVPS\Api\Resources\MachinesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$name = "name_example"; // string | 

try {
    $result = $apiInstance->machinesNameDelete($name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MachinesApi->machinesNameDelete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**|  |

### Return type

[**\Fozzy\WinVPS\Api\Models\MachineCommandResultResponse**](../Model/MachineCommandResultResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **machinesNameGet**
> \Fozzy\WinVPS\Api\Models\MachineDetailsResponse machinesNameGet($name)

Returns machine details

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

$apiInstance = new Fozzy\WinVPS\Api\Resources\MachinesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$name = "name_example"; // string | 

try {
    $result = $apiInstance->machinesNameGet($name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MachinesApi->machinesNameGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**|  |

### Return type

[**\Fozzy\WinVPS\Api\Models\MachineDetailsResponse**](../Model/MachineDetailsResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **machinesNameJobsGet**
> \Fozzy\WinVPS\Api\Models\JobsListResponse machinesNameJobsGet($name)

Returns list of jobs assigned to machine.

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

$apiInstance = new Fozzy\WinVPS\Api\Resources\MachinesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$name = "name_example"; // string | 

try {
    $result = $apiInstance->machinesNameJobsGet($name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MachinesApi->machinesNameJobsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**|  |

### Return type

[**\Fozzy\WinVPS\Api\Models\JobsListResponse**](../Model/JobsListResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **machinesNamePost**
> \Fozzy\WinVPS\Api\Models\MachineCommandResultResponse machinesNamePost($body, $name)

Reinstall machine

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

$apiInstance = new Fozzy\WinVPS\Api\Resources\MachinesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Fozzy\WinVPS\Api\Models\MachineReinstallRequestBody(); // \Fozzy\WinVPS\Api\Models\MachineReinstallRequestBody | 
$name = "name_example"; // string | 

try {
    $result = $apiInstance->machinesNamePost($body, $name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MachinesApi->machinesNamePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Fozzy\WinVPS\Api\Models\MachineReinstallRequestBody**](../Model/MachineReinstallRequestBody.md)|  |
 **name** | **string**|  |

### Return type

[**\Fozzy\WinVPS\Api\Models\MachineCommandResultResponse**](../Model/MachineCommandResultResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **machinesNamePut**
> \Fozzy\WinVPS\Api\Models\MachineDetailsResponse machinesNamePut($body, $name)

Update machine details

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

$apiInstance = new Fozzy\WinVPS\Api\Resources\MachinesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Fozzy\WinVPS\Api\Models\MachineUpdateRequestBody(); // \Fozzy\WinVPS\Api\Models\MachineUpdateRequestBody | 
$name = "name_example"; // string | 

try {
    $result = $apiInstance->machinesNamePut($body, $name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MachinesApi->machinesNamePut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Fozzy\WinVPS\Api\Models\MachineUpdateRequestBody**](../Model/MachineUpdateRequestBody.md)|  |
 **name** | **string**|  |

### Return type

[**\Fozzy\WinVPS\Api\Models\MachineDetailsResponse**](../Model/MachineDetailsResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **machinesNameUsersGet**
> \Fozzy\WinVPS\Api\Models\MachineUsersListResponse machinesNameUsersGet($name)

Returns list of additional system users.

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

$apiInstance = new Fozzy\WinVPS\Api\Resources\MachinesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$name = "name_example"; // string | 

try {
    $result = $apiInstance->machinesNameUsersGet($name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MachinesApi->machinesNameUsersGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**|  |

### Return type

[**\Fozzy\WinVPS\Api\Models\MachineUsersListResponse**](../Model/MachineUsersListResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **machinesPost**
> \Fozzy\WinVPS\Api\Models\MachineCreateResponse machinesPost($body)

Create new machine.

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

$apiInstance = new Fozzy\WinVPS\Api\Resources\MachinesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Fozzy\WinVPS\Api\Models\MachineCreateRequestBody(); // \Fozzy\WinVPS\Api\Models\MachineCreateRequestBody | Optional description in *Markdown*

try {
    $result = $apiInstance->machinesPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MachinesApi->machinesPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Fozzy\WinVPS\Api\Models\MachineCreateRequestBody**](../Model/MachineCreateRequestBody.md)| Optional description in *Markdown* |

### Return type

[**\Fozzy\WinVPS\Api\Models\MachineCreateResponse**](../Model/MachineCreateResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **machinesRunningGet**
> \Fozzy\WinVPS\Api\Models\MachinesListResponse machinesRunningGet()

Returns list of currently running machines.

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

$apiInstance = new Fozzy\WinVPS\Api\Resources\MachinesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->machinesRunningGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MachinesApi->machinesRunningGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Fozzy\WinVPS\Api\Models\MachinesListResponse**](../Model/MachinesListResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **machinesStoppedGet**
> \Fozzy\WinVPS\Api\Models\MachinesListResponse machinesStoppedGet()

Returns list of currently stopped or suspended machines.

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

$apiInstance = new Fozzy\WinVPS\Api\Resources\MachinesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->machinesStoppedGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MachinesApi->machinesStoppedGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Fozzy\WinVPS\Api\Models\MachinesListResponse**](../Model/MachinesListResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

