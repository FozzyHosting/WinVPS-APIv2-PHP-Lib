<?php

/**
 * Fozzy Windows VPS resellers API
 *
 * Application Programming Interface (API) allows clients to manage the Windows VPS machines lifecycle.  ## Endpoint  `https://winvps.fozzy.com/api/v2/`  ## Authentication  To access the API, an existing client of Fozzy Inc. should be registered as Windows VPS Reseller by the company tech support through the ticket or using Sales Email. After that, the client will have an access to the winvps.fozzy.com and will be able to get an API Token (Signature) in `Settings -> API` section of main menu.  If you have already used the previous API version, then the token is known to you.  Note that the Token grants full access to your account and should be protected the same way you would protect your password. Also you can reset the Token on the receipt page.  To use the Token you should pass it to `Api-Key` header of each request like this:  ` curl -H 'API-KEY: TOKEN' https://winvps.fozzy.com/api/v2/products `  ## Content-Type  API v2 supports `application/json`, `application/x-www-form-urlencoded` and `multipart/form-data` content types.  In the first case HTTP request must be JSON-encoded with the body as a valid JSON string. The othres are default POST types with content in key=value format.  The response always has `application/json` type and contains JSON-encoded payload.  ## Response  A successful response will be returned as a JSON object with at least one of the following top-level members: - `data` - the document’s “primary data” - `error` - error message - `pagination` - pagination details  The members data and error cannot coexist in the same document.  ### Codes   - `200 OK` - Everything worked as expected.  - `201 Created` - The request was successful and a resource was created. This is typically a response from a POST request to create a resource which runs immediately.  - `202 Accepted` - The request has been accepted for processing. This is typically a response from a POST request that is handled async in our system, such as a request for some machine command.  - `204 No Content` - The request was successful but the response body is empty. This is typically a response from a DELETE request to delete a resource or cancel the command.  - `400 Bad Request` - A required parameter or the request is invalid.  - `403 Unauthorized` - The authentication credentials are invalid.  - `404 Not Found` - The requested resource doesn’t exist.  - `500 Server error` - something went wrong. Please contact our support team.  ### Examples  #### Error:  ```json {   \"error\": \"Error message\" } ```  #### Success - retrieve single record:  ```json {   \"data\": {     \"id\": 1,     \"name\": \"String\"   } } ```   #### Success - retrieve multiple records:  ```json {   \"data\": [     {       \"id\": 1,       \"name\": \"String\"     }, {       \"id\": 2,       \"name\": \"String\"     }   ],   \"pagination\": {     \"total\": 10,   } } ```  To simplify understanding the `data` and `pagination` attribute will be omitted in the all next response definitions below.  #### Success - response for some delayed action:  ```json {   \"data\": {     \"name\": \"String\",     \"jobs\": [       {         \"id\": 0,         \"parent_id\": 0,         \"machine_id\": 0,         \"type\": \"string\",         \"status\": \"string\",         \"start_time\": \"string\"       }     ]   } } ```  ## Pagination  Any API endpoint that returns a list of items requires pagination. By default we will return `50` records from any listing endpoint.  If an API endpoint returns a list of items, then it will include an additional object with pagination information.  The pagination information contains the following details:   - `total` - The total number of entries available in the entire collection  - `limit` - The number of entries returned per page (default: 50)  - `page` - The page currently returned (default: 1)  - `pages` - The total number of pages  To go through the pages you need to pass additional GET parameter `page` with the number of page wanted.  ## Entities meaning  ### Product  A product is a resources set with which a VPS will be created by default. This is a resources such ads CPU cores count, CPU power in percents of the maximum available limit, RAM minimum and maximum values, Disk Size etc.  ### Template  Template is an operating system version for VPS.  ### Brand  Brand is a set of custom software which installs on the machine automatically. Currently this set can be created only through the request to our administrators.  ### Location  Location is a list of regions in which the new VPS creation is available.  ### Job  Job is a command to perform specific actions on the machine such as creation, starting, changing, terminating, etc. Since most actions cannot be performed instantly, they are all queued and executed one after another. You will receive an additional property `jobs` in your response if any request generates new queue positions.  ### Machine  Machine is a virtual private server (VPS) which used to your own needs. Each Mahine has Operating System defined by **Template** installed on the server in a data center in a country specified by **Location** option. The machine has some specified by **Product** resources which can be used by your software installed automatically by the **Brand** option or manually from the RDP interface.
 *
 * OpenAPI spec version: 2.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.12-SNAPSHOT
 */

namespace Fozzy\WinVPS\Api\Resources;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\RequestOptions;
use Fozzy\WinVPS\Api\ApiException;
use Fozzy\WinVPS\Api\Configuration;
use Fozzy\WinVPS\Api\Resource;
use Fozzy\WinVPS\Api\HeaderSelector;
use Fozzy\WinVPS\Api\ObjectSerializer;

/**
 * MachinesApi Resource
 *
 * @category Class
 * @package  Fozzy\WinVPS\Api
 * @author   Fozzy Inc.
 */
class MachinesApi extends Resource
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    private $pagination = null;
    private $paginationCurrentPage = 1;
    private $paginationLimit = 50;

    public function paginationSetLimit($limit)
    {
        $this->paginationLimit = $limit;
}

public function paginationSetPage($num)
{
$this->paginationCurrentPage = $num;
}

public function paginationNext()
{
$this->paginationCurrentPage = $this->paginationCurrentPage + 1;

if (!$this->pagination || $this->paginationCurrentPage > $this->pagination->pages) {
$this->paginationCurrentPage = 1;
return false;
}
}

public function paginationPrev()
{
$this->paginationCurrentPage = $this->paginationCurrentPage - 1;

if ($this->paginationCurrentPage < 1) {
$this->paginationCurrentPage = 1;
return false;
}
}

public function paginationGetTotal()
{
return $this->pagination ? $this->pagination->total : null;
}
public function paginationGetPage()
{
return $this->pagination ? $this->pagination->page : null;
}
public function paginationGetPages()
{
return $this->pagination ? $this->pagination->pages : null;
}
public function paginationHasMore()
{
return $this->pagination ? $this->pagination->pages > $this->pagination->page : null;
}

/**
* @param ClientInterface $client
* @param Configuration   $config
* @param HeaderSelector  $selector
*/
public function __construct(
ClientInterface $client = null,
Configuration $config = null,
HeaderSelector $selector = null
) {
parent::__construct();
$this->client = $client ?: new Client();
$this->config = $config ?: new Configuration();
$this->headerSelector = $selector ?: new HeaderSelector();
}

/**
* @return Configuration
*/
public function getConfig()
{
return $this->config;
}

        /**
        * Operation machinesGet
            *
            * Returns machines list in short form.
        *
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return \Fozzy\WinVPS\Api\Models\InlineResponse200[]
        */
        public function machinesGet()
        {
        list($response) = $this->machinesGetWithHttpInfo();
            return $response;
        }

        /**
        * Operation machinesGetWithHttpInfo
            *
            * Returns machines list in short form.
        *
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return array of \Fozzy\WinVPS\Api\Models\InlineResponse200[], HTTP status code, HTTP response headers (array of strings)
        */
        public function machinesGetWithHttpInfo()
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\InlineResponse200[]';
        $request = $this->machinesGetRequest();

        try {
        $options = $this->createHttpClientOption();
        try {
        $response = $this->client->send($request, $options);
        } catch (RequestException $e) {
        throw new ApiException(
        "[{$e->getCode()}] {$e->getMessage()}",
        $e->getCode(),
        $request,
        $e->getResponse() ? $e->getResponse()->getHeaders() : null,
        $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
        );
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
        $url = '';

        if (method_exists($request, 'getUri')) {
        $url = $request->getUri();
        }

        if (method_exists($request, 'getUrl')) {
        $url = $request->getUrl();
        }

        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $url
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if (!in_array($returnType, ['string','integer','bool'])) {
            $content = json_decode($content);
            }
            }

            if (!empty($content) && is_object($content) && property_exists($content, 'pagination')) {
            $this->pagination = $content->pagination;
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];

        } catch (ApiException $e) {

        $body = $e->getResponseBody();
        $data = ObjectSerializer::deserialize(
        $body,
        '\Fozzy\WinVPS\Api\Models\ErrorResponse',
        $e->getResponseHeaders()
        );
        try {
        $content = $body->getContents();
        if ($content) {
        $content = json_decode($content, true);
        }
        if (!empty($content) && is_array($content) && !empty($content['error'])) {
        $data->setError($content['error']);
        }
        } catch (\Exception $e) {
        }
        $e->setResponseObject($data);

        throw $e;
        }
        }

        /**
        * Operation machinesGetAsync
        *
        * Returns machines list in short form.
        *
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesGetAsync()
        {
        return $this->machinesGetAsyncWithHttpInfo()
        ->then(
        function ($response) {
        return $response[0];
        }
        );
        }

        /**
        * Operation machinesGetAsyncWithHttpInfo
        *
        * Returns machines list in short form.
        *
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesGetAsyncWithHttpInfo()
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\InlineResponse200[]';
        $request = $this->machinesGetRequest();

        return $this->client
        ->sendAsync($request, $this->createHttpClientOption())
        ->then(
        function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if ($returnType !== 'string') {
            $content = json_decode($content);
            }
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];
        },
        function ($exception) {
        $response = $exception->getResponse();
        $statusCode = $response->getStatusCode();
        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $exception->getRequest()->getUri()
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }
        );
        }

        /**
        * Create request for operation 'machinesGet'
        *
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Psr7\Request
        */
        protected function machinesGetRequest()
        {

        $resourcePath = '/machines';
        $formParams = [];
        $queryParams = [
        'page' => $this->paginationCurrentPage,
        'limit' => $this->paginationLimit,
        ];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;

        if ($multipart) {
        $headers = $this->headerSelector->selectHeadersForMultipart(
        ['application/json']
        );
        } else {
        $headers = $this->headerSelector->selectHeaders(
        ['application/json'],
        []
        );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
        // $_tempBody is the method argument, if present
        $httpBody = $_tempBody;
        // \stdClass has no __toString(), so we should encode it manually
        if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($httpBody);
        }
        } elseif (count($formParams) > 0) {
        if ($multipart) {
        $multipartContents = [];
        foreach ($formParams as $formParamName => $formParamValue) {
        $multipartContents[] = [
        'name' => $formParamName,
        'contents' => $formParamValue
        ];
        }
        // for HTTP post (form)
        $httpBody = new MultipartStream($multipartContents);

        } elseif ($headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($formParams);

        } else {
        // for HTTP post (form)
        $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
        }
        }

                // this endpoint requires API key authentication
                $apiKey = $this->config->getApiKeyWithPrefix('Api-Key');
                if ($apiKey !== null) {
                $headers['Api-Key'] = $apiKey;
                }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
        $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
        $defaultHeaders,
        $headerParams,
        $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return $this->createRequest(
        'GET',
        $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
        $headers,
        $httpBody
        );
        }

        /**
        * Operation machinesNameAddIpPost
            *
            * Send unary machine command
        *
            * @param  string $name name (required)
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return \Fozzy\WinVPS\Api\Models\InlineResponse2003
        */
        public function machinesNameAddIpPost($name)
        {
        list($response) = $this->machinesNameAddIpPostWithHttpInfo($name);
            return $response;
        }

        /**
        * Operation machinesNameAddIpPostWithHttpInfo
            *
            * Send unary machine command
        *
            * @param  string $name (required)
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return array of \Fozzy\WinVPS\Api\Models\InlineResponse2003, HTTP status code, HTTP response headers (array of strings)
        */
        public function machinesNameAddIpPostWithHttpInfo($name)
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\InlineResponse2003';
        $request = $this->machinesNameAddIpPostRequest($name);

        try {
        $options = $this->createHttpClientOption();
        try {
        $response = $this->client->send($request, $options);
        } catch (RequestException $e) {
        throw new ApiException(
        "[{$e->getCode()}] {$e->getMessage()}",
        $e->getCode(),
        $request,
        $e->getResponse() ? $e->getResponse()->getHeaders() : null,
        $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
        );
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
        $url = '';

        if (method_exists($request, 'getUri')) {
        $url = $request->getUri();
        }

        if (method_exists($request, 'getUrl')) {
        $url = $request->getUrl();
        }

        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $url
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if (!in_array($returnType, ['string','integer','bool'])) {
            $content = json_decode($content);
            }
            }

            if (!empty($content) && is_object($content) && property_exists($content, 'pagination')) {
            $this->pagination = $content->pagination;
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];

        } catch (ApiException $e) {

        $body = $e->getResponseBody();
        $data = ObjectSerializer::deserialize(
        $body,
        '\Fozzy\WinVPS\Api\Models\ErrorResponse',
        $e->getResponseHeaders()
        );
        try {
        $content = $body->getContents();
        if ($content) {
        $content = json_decode($content, true);
        }
        if (!empty($content) && is_array($content) && !empty($content['error'])) {
        $data->setError($content['error']);
        }
        } catch (\Exception $e) {
        }
        $e->setResponseObject($data);

        throw $e;
        }
        }

        /**
        * Operation machinesNameAddIpPostAsync
        *
        * Send unary machine command
        *
            * @param  string $name (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesNameAddIpPostAsync($name)
        {
        return $this->machinesNameAddIpPostAsyncWithHttpInfo($name)
        ->then(
        function ($response) {
        return $response[0];
        }
        );
        }

        /**
        * Operation machinesNameAddIpPostAsyncWithHttpInfo
        *
        * Send unary machine command
        *
            * @param  string $name (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesNameAddIpPostAsyncWithHttpInfo($name)
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\InlineResponse2003';
        $request = $this->machinesNameAddIpPostRequest($name);

        return $this->client
        ->sendAsync($request, $this->createHttpClientOption())
        ->then(
        function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if ($returnType !== 'string') {
            $content = json_decode($content);
            }
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];
        },
        function ($exception) {
        $response = $exception->getResponse();
        $statusCode = $response->getStatusCode();
        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $exception->getRequest()->getUri()
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }
        );
        }

        /**
        * Create request for operation 'machinesNameAddIpPost'
        *
            * @param  string $name (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Psr7\Request
        */
        protected function machinesNameAddIpPostRequest($name)
        {
                // verify the required parameter 'name' is set
                if ($name === null || (is_array($name) && count($name) === 0)) {
                throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling machinesNameAddIpPost'
                );
                }

        $resourcePath = '/machines/{name}/add_ip';
        $formParams = [];
        $queryParams = [
        'page' => $this->paginationCurrentPage,
        'limit' => $this->paginationLimit,
        ];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


            // path params
            if ($name !== null) {
            $resourcePath = str_replace(
            '{' . 'name' . '}',
            ObjectSerializer::toPathValue($name),
            $resourcePath
            );
            }

        // body params
        $_tempBody = null;

        if ($multipart) {
        $headers = $this->headerSelector->selectHeadersForMultipart(
        ['application/json']
        );
        } else {
        $headers = $this->headerSelector->selectHeaders(
        ['application/json'],
        []
        );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
        // $_tempBody is the method argument, if present
        $httpBody = $_tempBody;
        // \stdClass has no __toString(), so we should encode it manually
        if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($httpBody);
        }
        } elseif (count($formParams) > 0) {
        if ($multipart) {
        $multipartContents = [];
        foreach ($formParams as $formParamName => $formParamValue) {
        $multipartContents[] = [
        'name' => $formParamName,
        'contents' => $formParamValue
        ];
        }
        // for HTTP post (form)
        $httpBody = new MultipartStream($multipartContents);

        } elseif ($headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($formParams);

        } else {
        // for HTTP post (form)
        $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
        }
        }

                // this endpoint requires API key authentication
                $apiKey = $this->config->getApiKeyWithPrefix('Api-Key');
                if ($apiKey !== null) {
                $headers['Api-Key'] = $apiKey;
                }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
        $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
        $defaultHeaders,
        $headerParams,
        $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return $this->createRequest(
        'POST',
        $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
        $headers,
        $httpBody
        );
        }

        /**
        * Operation machinesNameCommandPost
            *
            * Send single command which does not needs additional options.
        *
            * @param  string $name Machine name. (required)
            * @param  string $command Command key. (required)
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return \Fozzy\WinVPS\Api\Models\InlineResponse2021
        */
        public function machinesNameCommandPost($name, $command)
        {
        list($response) = $this->machinesNameCommandPostWithHttpInfo($name, $command);
            return $response;
        }

        /**
        * Operation machinesNameCommandPostWithHttpInfo
            *
            * Send single command which does not needs additional options.
        *
            * @param  string $name Machine name. (required)
            * @param  string $command Command key. (required)
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return array of \Fozzy\WinVPS\Api\Models\InlineResponse2021, HTTP status code, HTTP response headers (array of strings)
        */
        public function machinesNameCommandPostWithHttpInfo($name, $command)
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\InlineResponse2021';
        $request = $this->machinesNameCommandPostRequest($name, $command);

        try {
        $options = $this->createHttpClientOption();
        try {
        $response = $this->client->send($request, $options);
        } catch (RequestException $e) {
        throw new ApiException(
        "[{$e->getCode()}] {$e->getMessage()}",
        $e->getCode(),
        $request,
        $e->getResponse() ? $e->getResponse()->getHeaders() : null,
        $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
        );
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
        $url = '';

        if (method_exists($request, 'getUri')) {
        $url = $request->getUri();
        }

        if (method_exists($request, 'getUrl')) {
        $url = $request->getUrl();
        }

        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $url
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if (!in_array($returnType, ['string','integer','bool'])) {
            $content = json_decode($content);
            }
            }

            if (!empty($content) && is_object($content) && property_exists($content, 'pagination')) {
            $this->pagination = $content->pagination;
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];

        } catch (ApiException $e) {

        $body = $e->getResponseBody();
        $data = ObjectSerializer::deserialize(
        $body,
        '\Fozzy\WinVPS\Api\Models\ErrorResponse',
        $e->getResponseHeaders()
        );
        try {
        $content = $body->getContents();
        if ($content) {
        $content = json_decode($content, true);
        }
        if (!empty($content) && is_array($content) && !empty($content['error'])) {
        $data->setError($content['error']);
        }
        } catch (\Exception $e) {
        }
        $e->setResponseObject($data);

        throw $e;
        }
        }

        /**
        * Operation machinesNameCommandPostAsync
        *
        * Send single command which does not needs additional options.
        *
            * @param  string $name Machine name. (required)
            * @param  string $command Command key. (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesNameCommandPostAsync($name, $command)
        {
        return $this->machinesNameCommandPostAsyncWithHttpInfo($name, $command)
        ->then(
        function ($response) {
        return $response[0];
        }
        );
        }

        /**
        * Operation machinesNameCommandPostAsyncWithHttpInfo
        *
        * Send single command which does not needs additional options.
        *
            * @param  string $name Machine name. (required)
            * @param  string $command Command key. (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesNameCommandPostAsyncWithHttpInfo($name, $command)
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\InlineResponse2021';
        $request = $this->machinesNameCommandPostRequest($name, $command);

        return $this->client
        ->sendAsync($request, $this->createHttpClientOption())
        ->then(
        function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if ($returnType !== 'string') {
            $content = json_decode($content);
            }
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];
        },
        function ($exception) {
        $response = $exception->getResponse();
        $statusCode = $response->getStatusCode();
        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $exception->getRequest()->getUri()
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }
        );
        }

        /**
        * Create request for operation 'machinesNameCommandPost'
        *
            * @param  string $name Machine name. (required)
            * @param  string $command Command key. (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Psr7\Request
        */
        protected function machinesNameCommandPostRequest($name, $command)
        {
                // verify the required parameter 'name' is set
                if ($name === null || (is_array($name) && count($name) === 0)) {
                throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling machinesNameCommandPost'
                );
                }
                // verify the required parameter 'command' is set
                if ($command === null || (is_array($command) && count($command) === 0)) {
                throw new \InvalidArgumentException(
                'Missing the required parameter $command when calling machinesNameCommandPost'
                );
                }

        $resourcePath = '/machines/{name}/{command}';
        $formParams = [];
        $queryParams = [
        'page' => $this->paginationCurrentPage,
        'limit' => $this->paginationLimit,
        ];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


            // path params
            if ($name !== null) {
            $resourcePath = str_replace(
            '{' . 'name' . '}',
            ObjectSerializer::toPathValue($name),
            $resourcePath
            );
            }
            // path params
            if ($command !== null) {
            $resourcePath = str_replace(
            '{' . 'command' . '}',
            ObjectSerializer::toPathValue($command),
            $resourcePath
            );
            }

        // body params
        $_tempBody = null;

        if ($multipart) {
        $headers = $this->headerSelector->selectHeadersForMultipart(
        ['application/json']
        );
        } else {
        $headers = $this->headerSelector->selectHeaders(
        ['application/json'],
        []
        );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
        // $_tempBody is the method argument, if present
        $httpBody = $_tempBody;
        // \stdClass has no __toString(), so we should encode it manually
        if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($httpBody);
        }
        } elseif (count($formParams) > 0) {
        if ($multipart) {
        $multipartContents = [];
        foreach ($formParams as $formParamName => $formParamValue) {
        $multipartContents[] = [
        'name' => $formParamName,
        'contents' => $formParamValue
        ];
        }
        // for HTTP post (form)
        $httpBody = new MultipartStream($multipartContents);

        } elseif ($headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($formParams);

        } else {
        // for HTTP post (form)
        $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
        }
        }

                // this endpoint requires API key authentication
                $apiKey = $this->config->getApiKeyWithPrefix('Api-Key');
                if ($apiKey !== null) {
                $headers['Api-Key'] = $apiKey;
                }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
        $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
        $defaultHeaders,
        $headerParams,
        $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return $this->createRequest(
        'POST',
        $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
        $headers,
        $httpBody
        );
        }

        /**
        * Operation machinesNameDelete
            *
            * Terminate machine
        *
            * @param  string $name name (required)
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return \Fozzy\WinVPS\Api\Models\InlineResponse2021
        */
        public function machinesNameDelete($name)
        {
        list($response) = $this->machinesNameDeleteWithHttpInfo($name);
            return $response;
        }

        /**
        * Operation machinesNameDeleteWithHttpInfo
            *
            * Terminate machine
        *
            * @param  string $name (required)
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return array of \Fozzy\WinVPS\Api\Models\InlineResponse2021, HTTP status code, HTTP response headers (array of strings)
        */
        public function machinesNameDeleteWithHttpInfo($name)
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\InlineResponse2021';
        $request = $this->machinesNameDeleteRequest($name);

        try {
        $options = $this->createHttpClientOption();
        try {
        $response = $this->client->send($request, $options);
        } catch (RequestException $e) {
        throw new ApiException(
        "[{$e->getCode()}] {$e->getMessage()}",
        $e->getCode(),
        $request,
        $e->getResponse() ? $e->getResponse()->getHeaders() : null,
        $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
        );
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
        $url = '';

        if (method_exists($request, 'getUri')) {
        $url = $request->getUri();
        }

        if (method_exists($request, 'getUrl')) {
        $url = $request->getUrl();
        }

        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $url
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if (!in_array($returnType, ['string','integer','bool'])) {
            $content = json_decode($content);
            }
            }

            if (!empty($content) && is_object($content) && property_exists($content, 'pagination')) {
            $this->pagination = $content->pagination;
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];

        } catch (ApiException $e) {

        $body = $e->getResponseBody();
        $data = ObjectSerializer::deserialize(
        $body,
        '\Fozzy\WinVPS\Api\Models\ErrorResponse',
        $e->getResponseHeaders()
        );
        try {
        $content = $body->getContents();
        if ($content) {
        $content = json_decode($content, true);
        }
        if (!empty($content) && is_array($content) && !empty($content['error'])) {
        $data->setError($content['error']);
        }
        } catch (\Exception $e) {
        }
        $e->setResponseObject($data);

        throw $e;
        }
        }

        /**
        * Operation machinesNameDeleteAsync
        *
        * Terminate machine
        *
            * @param  string $name (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesNameDeleteAsync($name)
        {
        return $this->machinesNameDeleteAsyncWithHttpInfo($name)
        ->then(
        function ($response) {
        return $response[0];
        }
        );
        }

        /**
        * Operation machinesNameDeleteAsyncWithHttpInfo
        *
        * Terminate machine
        *
            * @param  string $name (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesNameDeleteAsyncWithHttpInfo($name)
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\InlineResponse2021';
        $request = $this->machinesNameDeleteRequest($name);

        return $this->client
        ->sendAsync($request, $this->createHttpClientOption())
        ->then(
        function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if ($returnType !== 'string') {
            $content = json_decode($content);
            }
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];
        },
        function ($exception) {
        $response = $exception->getResponse();
        $statusCode = $response->getStatusCode();
        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $exception->getRequest()->getUri()
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }
        );
        }

        /**
        * Create request for operation 'machinesNameDelete'
        *
            * @param  string $name (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Psr7\Request
        */
        protected function machinesNameDeleteRequest($name)
        {
                // verify the required parameter 'name' is set
                if ($name === null || (is_array($name) && count($name) === 0)) {
                throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling machinesNameDelete'
                );
                }

        $resourcePath = '/machines/{name}';
        $formParams = [];
        $queryParams = [
        'page' => $this->paginationCurrentPage,
        'limit' => $this->paginationLimit,
        ];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


            // path params
            if ($name !== null) {
            $resourcePath = str_replace(
            '{' . 'name' . '}',
            ObjectSerializer::toPathValue($name),
            $resourcePath
            );
            }

        // body params
        $_tempBody = null;

        if ($multipart) {
        $headers = $this->headerSelector->selectHeadersForMultipart(
        ['application/json']
        );
        } else {
        $headers = $this->headerSelector->selectHeaders(
        ['application/json'],
        []
        );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
        // $_tempBody is the method argument, if present
        $httpBody = $_tempBody;
        // \stdClass has no __toString(), so we should encode it manually
        if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($httpBody);
        }
        } elseif (count($formParams) > 0) {
        if ($multipart) {
        $multipartContents = [];
        foreach ($formParams as $formParamName => $formParamValue) {
        $multipartContents[] = [
        'name' => $formParamName,
        'contents' => $formParamValue
        ];
        }
        // for HTTP post (form)
        $httpBody = new MultipartStream($multipartContents);

        } elseif ($headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($formParams);

        } else {
        // for HTTP post (form)
        $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
        }
        }

                // this endpoint requires API key authentication
                $apiKey = $this->config->getApiKeyWithPrefix('Api-Key');
                if ($apiKey !== null) {
                $headers['Api-Key'] = $apiKey;
                }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
        $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
        $defaultHeaders,
        $headerParams,
        $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return $this->createRequest(
        'DELETE',
        $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
        $headers,
        $httpBody
        );
        }

        /**
        * Operation machinesNameGet
            *
            * Returns machine details
        *
            * @param  string $name name (required)
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return \Fozzy\WinVPS\Api\Models\MachineDefinition
        */
        public function machinesNameGet($name)
        {
        list($response) = $this->machinesNameGetWithHttpInfo($name);
            return $response;
        }

        /**
        * Operation machinesNameGetWithHttpInfo
            *
            * Returns machine details
        *
            * @param  string $name (required)
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return array of \Fozzy\WinVPS\Api\Models\MachineDefinition, HTTP status code, HTTP response headers (array of strings)
        */
        public function machinesNameGetWithHttpInfo($name)
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\MachineDefinition';
        $request = $this->machinesNameGetRequest($name);

        try {
        $options = $this->createHttpClientOption();
        try {
        $response = $this->client->send($request, $options);
        } catch (RequestException $e) {
        throw new ApiException(
        "[{$e->getCode()}] {$e->getMessage()}",
        $e->getCode(),
        $request,
        $e->getResponse() ? $e->getResponse()->getHeaders() : null,
        $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
        );
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
        $url = '';

        if (method_exists($request, 'getUri')) {
        $url = $request->getUri();
        }

        if (method_exists($request, 'getUrl')) {
        $url = $request->getUrl();
        }

        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $url
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if (!in_array($returnType, ['string','integer','bool'])) {
            $content = json_decode($content);
            }
            }

            if (!empty($content) && is_object($content) && property_exists($content, 'pagination')) {
            $this->pagination = $content->pagination;
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];

        } catch (ApiException $e) {

        $body = $e->getResponseBody();
        $data = ObjectSerializer::deserialize(
        $body,
        '\Fozzy\WinVPS\Api\Models\ErrorResponse',
        $e->getResponseHeaders()
        );
        try {
        $content = $body->getContents();
        if ($content) {
        $content = json_decode($content, true);
        }
        if (!empty($content) && is_array($content) && !empty($content['error'])) {
        $data->setError($content['error']);
        }
        } catch (\Exception $e) {
        }
        $e->setResponseObject($data);

        throw $e;
        }
        }

        /**
        * Operation machinesNameGetAsync
        *
        * Returns machine details
        *
            * @param  string $name (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesNameGetAsync($name)
        {
        return $this->machinesNameGetAsyncWithHttpInfo($name)
        ->then(
        function ($response) {
        return $response[0];
        }
        );
        }

        /**
        * Operation machinesNameGetAsyncWithHttpInfo
        *
        * Returns machine details
        *
            * @param  string $name (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesNameGetAsyncWithHttpInfo($name)
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\MachineDefinition';
        $request = $this->machinesNameGetRequest($name);

        return $this->client
        ->sendAsync($request, $this->createHttpClientOption())
        ->then(
        function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if ($returnType !== 'string') {
            $content = json_decode($content);
            }
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];
        },
        function ($exception) {
        $response = $exception->getResponse();
        $statusCode = $response->getStatusCode();
        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $exception->getRequest()->getUri()
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }
        );
        }

        /**
        * Create request for operation 'machinesNameGet'
        *
            * @param  string $name (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Psr7\Request
        */
        protected function machinesNameGetRequest($name)
        {
                // verify the required parameter 'name' is set
                if ($name === null || (is_array($name) && count($name) === 0)) {
                throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling machinesNameGet'
                );
                }

        $resourcePath = '/machines/{name}';
        $formParams = [];
        $queryParams = [
        'page' => $this->paginationCurrentPage,
        'limit' => $this->paginationLimit,
        ];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


            // path params
            if ($name !== null) {
            $resourcePath = str_replace(
            '{' . 'name' . '}',
            ObjectSerializer::toPathValue($name),
            $resourcePath
            );
            }

        // body params
        $_tempBody = null;

        if ($multipart) {
        $headers = $this->headerSelector->selectHeadersForMultipart(
        ['application/json']
        );
        } else {
        $headers = $this->headerSelector->selectHeaders(
        ['application/json'],
        []
        );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
        // $_tempBody is the method argument, if present
        $httpBody = $_tempBody;
        // \stdClass has no __toString(), so we should encode it manually
        if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($httpBody);
        }
        } elseif (count($formParams) > 0) {
        if ($multipart) {
        $multipartContents = [];
        foreach ($formParams as $formParamName => $formParamValue) {
        $multipartContents[] = [
        'name' => $formParamName,
        'contents' => $formParamValue
        ];
        }
        // for HTTP post (form)
        $httpBody = new MultipartStream($multipartContents);

        } elseif ($headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($formParams);

        } else {
        // for HTTP post (form)
        $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
        }
        }

                // this endpoint requires API key authentication
                $apiKey = $this->config->getApiKeyWithPrefix('Api-Key');
                if ($apiKey !== null) {
                $headers['Api-Key'] = $apiKey;
                }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
        $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
        $defaultHeaders,
        $headerParams,
        $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return $this->createRequest(
        'GET',
        $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
        $headers,
        $httpBody
        );
        }

        /**
        * Operation machinesNameJobsGet
            *
            * Returns list of jobs assigned to machine.
        *
            * @param  string $name name (required)
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return \Fozzy\WinVPS\Api\Models\JobDefinition[]
        */
        public function machinesNameJobsGet($name)
        {
        list($response) = $this->machinesNameJobsGetWithHttpInfo($name);
            return $response;
        }

        /**
        * Operation machinesNameJobsGetWithHttpInfo
            *
            * Returns list of jobs assigned to machine.
        *
            * @param  string $name (required)
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return array of \Fozzy\WinVPS\Api\Models\JobDefinition[], HTTP status code, HTTP response headers (array of strings)
        */
        public function machinesNameJobsGetWithHttpInfo($name)
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\JobDefinition[]';
        $request = $this->machinesNameJobsGetRequest($name);

        try {
        $options = $this->createHttpClientOption();
        try {
        $response = $this->client->send($request, $options);
        } catch (RequestException $e) {
        throw new ApiException(
        "[{$e->getCode()}] {$e->getMessage()}",
        $e->getCode(),
        $request,
        $e->getResponse() ? $e->getResponse()->getHeaders() : null,
        $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
        );
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
        $url = '';

        if (method_exists($request, 'getUri')) {
        $url = $request->getUri();
        }

        if (method_exists($request, 'getUrl')) {
        $url = $request->getUrl();
        }

        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $url
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if (!in_array($returnType, ['string','integer','bool'])) {
            $content = json_decode($content);
            }
            }

            if (!empty($content) && is_object($content) && property_exists($content, 'pagination')) {
            $this->pagination = $content->pagination;
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];

        } catch (ApiException $e) {

        $body = $e->getResponseBody();
        $data = ObjectSerializer::deserialize(
        $body,
        '\Fozzy\WinVPS\Api\Models\ErrorResponse',
        $e->getResponseHeaders()
        );
        try {
        $content = $body->getContents();
        if ($content) {
        $content = json_decode($content, true);
        }
        if (!empty($content) && is_array($content) && !empty($content['error'])) {
        $data->setError($content['error']);
        }
        } catch (\Exception $e) {
        }
        $e->setResponseObject($data);

        throw $e;
        }
        }

        /**
        * Operation machinesNameJobsGetAsync
        *
        * Returns list of jobs assigned to machine.
        *
            * @param  string $name (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesNameJobsGetAsync($name)
        {
        return $this->machinesNameJobsGetAsyncWithHttpInfo($name)
        ->then(
        function ($response) {
        return $response[0];
        }
        );
        }

        /**
        * Operation machinesNameJobsGetAsyncWithHttpInfo
        *
        * Returns list of jobs assigned to machine.
        *
            * @param  string $name (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesNameJobsGetAsyncWithHttpInfo($name)
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\JobDefinition[]';
        $request = $this->machinesNameJobsGetRequest($name);

        return $this->client
        ->sendAsync($request, $this->createHttpClientOption())
        ->then(
        function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if ($returnType !== 'string') {
            $content = json_decode($content);
            }
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];
        },
        function ($exception) {
        $response = $exception->getResponse();
        $statusCode = $response->getStatusCode();
        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $exception->getRequest()->getUri()
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }
        );
        }

        /**
        * Create request for operation 'machinesNameJobsGet'
        *
            * @param  string $name (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Psr7\Request
        */
        protected function machinesNameJobsGetRequest($name)
        {
                // verify the required parameter 'name' is set
                if ($name === null || (is_array($name) && count($name) === 0)) {
                throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling machinesNameJobsGet'
                );
                }

        $resourcePath = '/machines/{name}/jobs';
        $formParams = [];
        $queryParams = [
        'page' => $this->paginationCurrentPage,
        'limit' => $this->paginationLimit,
        ];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


            // path params
            if ($name !== null) {
            $resourcePath = str_replace(
            '{' . 'name' . '}',
            ObjectSerializer::toPathValue($name),
            $resourcePath
            );
            }

        // body params
        $_tempBody = null;

        if ($multipart) {
        $headers = $this->headerSelector->selectHeadersForMultipart(
        ['application/json']
        );
        } else {
        $headers = $this->headerSelector->selectHeaders(
        ['application/json'],
        []
        );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
        // $_tempBody is the method argument, if present
        $httpBody = $_tempBody;
        // \stdClass has no __toString(), so we should encode it manually
        if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($httpBody);
        }
        } elseif (count($formParams) > 0) {
        if ($multipart) {
        $multipartContents = [];
        foreach ($formParams as $formParamName => $formParamValue) {
        $multipartContents[] = [
        'name' => $formParamName,
        'contents' => $formParamValue
        ];
        }
        // for HTTP post (form)
        $httpBody = new MultipartStream($multipartContents);

        } elseif ($headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($formParams);

        } else {
        // for HTTP post (form)
        $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
        }
        }

                // this endpoint requires API key authentication
                $apiKey = $this->config->getApiKeyWithPrefix('Api-Key');
                if ($apiKey !== null) {
                $headers['Api-Key'] = $apiKey;
                }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
        $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
        $defaultHeaders,
        $headerParams,
        $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return $this->createRequest(
        'GET',
        $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
        $headers,
        $httpBody
        );
        }

        /**
        * Operation machinesNamePost
            *
            * Reinstall machine
        *
            * @param   $body body (required)
            * @param  string $name name (required)
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return \Fozzy\WinVPS\Api\Models\InlineResponse2001
        */
        public function machinesNamePost($body, $name)
        {
        list($response) = $this->machinesNamePostWithHttpInfo($body, $name);
            return $response;
        }

        /**
        * Operation machinesNamePostWithHttpInfo
            *
            * Reinstall machine
        *
            * @param   $body (required)
            * @param  string $name (required)
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return array of \Fozzy\WinVPS\Api\Models\InlineResponse2001, HTTP status code, HTTP response headers (array of strings)
        */
        public function machinesNamePostWithHttpInfo($body, $name)
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\InlineResponse2001';
        $request = $this->machinesNamePostRequest($body, $name);

        try {
        $options = $this->createHttpClientOption();
        try {
        $response = $this->client->send($request, $options);
        } catch (RequestException $e) {
        throw new ApiException(
        "[{$e->getCode()}] {$e->getMessage()}",
        $e->getCode(),
        $request,
        $e->getResponse() ? $e->getResponse()->getHeaders() : null,
        $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
        );
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
        $url = '';

        if (method_exists($request, 'getUri')) {
        $url = $request->getUri();
        }

        if (method_exists($request, 'getUrl')) {
        $url = $request->getUrl();
        }

        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $url
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if (!in_array($returnType, ['string','integer','bool'])) {
            $content = json_decode($content);
            }
            }

            if (!empty($content) && is_object($content) && property_exists($content, 'pagination')) {
            $this->pagination = $content->pagination;
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];

        } catch (ApiException $e) {

        $body = $e->getResponseBody();
        $data = ObjectSerializer::deserialize(
        $body,
        '\Fozzy\WinVPS\Api\Models\ErrorResponse',
        $e->getResponseHeaders()
        );
        try {
        $content = $body->getContents();
        if ($content) {
        $content = json_decode($content, true);
        }
        if (!empty($content) && is_array($content) && !empty($content['error'])) {
        $data->setError($content['error']);
        }
        } catch (\Exception $e) {
        }
        $e->setResponseObject($data);

        throw $e;
        }
        }

        /**
        * Operation machinesNamePostAsync
        *
        * Reinstall machine
        *
            * @param   $body (required)
            * @param  string $name (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesNamePostAsync($body, $name)
        {
        return $this->machinesNamePostAsyncWithHttpInfo($body, $name)
        ->then(
        function ($response) {
        return $response[0];
        }
        );
        }

        /**
        * Operation machinesNamePostAsyncWithHttpInfo
        *
        * Reinstall machine
        *
            * @param   $body (required)
            * @param  string $name (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesNamePostAsyncWithHttpInfo($body, $name)
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\InlineResponse2001';
        $request = $this->machinesNamePostRequest($body, $name);

        return $this->client
        ->sendAsync($request, $this->createHttpClientOption())
        ->then(
        function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if ($returnType !== 'string') {
            $content = json_decode($content);
            }
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];
        },
        function ($exception) {
        $response = $exception->getResponse();
        $statusCode = $response->getStatusCode();
        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $exception->getRequest()->getUri()
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }
        );
        }

        /**
        * Create request for operation 'machinesNamePost'
        *
            * @param   $body (required)
            * @param  string $name (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Psr7\Request
        */
        protected function machinesNamePostRequest($body, $name)
        {
                // verify the required parameter 'body' is set
                if ($body === null || (is_array($body) && count($body) === 0)) {
                throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling machinesNamePost'
                );
                }
                // verify the required parameter 'name' is set
                if ($name === null || (is_array($name) && count($name) === 0)) {
                throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling machinesNamePost'
                );
                }

        $resourcePath = '/machines/{name}';
        $formParams = [];
        $queryParams = [
        'page' => $this->paginationCurrentPage,
        'limit' => $this->paginationLimit,
        ];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


            // path params
            if ($name !== null) {
            $resourcePath = str_replace(
            '{' . 'name' . '}',
            ObjectSerializer::toPathValue($name),
            $resourcePath
            );
            }

        // body params
        $_tempBody = null;
            if (isset($body)) {
            $_tempBody = $body;
            }

        if ($multipart) {
        $headers = $this->headerSelector->selectHeadersForMultipart(
        ['application/json']
        );
        } else {
        $headers = $this->headerSelector->selectHeaders(
        ['application/json'],
        ['application/json', 'application/x-www-form-urlencoded']
        );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
        // $_tempBody is the method argument, if present
        $httpBody = $_tempBody;
        // \stdClass has no __toString(), so we should encode it manually
        if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($httpBody);
        }
        } elseif (count($formParams) > 0) {
        if ($multipart) {
        $multipartContents = [];
        foreach ($formParams as $formParamName => $formParamValue) {
        $multipartContents[] = [
        'name' => $formParamName,
        'contents' => $formParamValue
        ];
        }
        // for HTTP post (form)
        $httpBody = new MultipartStream($multipartContents);

        } elseif ($headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($formParams);

        } else {
        // for HTTP post (form)
        $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
        }
        }

                // this endpoint requires API key authentication
                $apiKey = $this->config->getApiKeyWithPrefix('Api-Key');
                if ($apiKey !== null) {
                $headers['Api-Key'] = $apiKey;
                }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
        $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
        $defaultHeaders,
        $headerParams,
        $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return $this->createRequest(
        'POST',
        $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
        $headers,
        $httpBody
        );
        }

        /**
        * Operation machinesNamePut
            *
            * Update machine details
        *
            * @param   $body body (required)
            * @param  string $name name (required)
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return \Fozzy\WinVPS\Api\Models\MachineDefinition
        */
        public function machinesNamePut($body, $name)
        {
        list($response) = $this->machinesNamePutWithHttpInfo($body, $name);
            return $response;
        }

        /**
        * Operation machinesNamePutWithHttpInfo
            *
            * Update machine details
        *
            * @param   $body (required)
            * @param  string $name (required)
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return array of \Fozzy\WinVPS\Api\Models\MachineDefinition, HTTP status code, HTTP response headers (array of strings)
        */
        public function machinesNamePutWithHttpInfo($body, $name)
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\MachineDefinition';
        $request = $this->machinesNamePutRequest($body, $name);

        try {
        $options = $this->createHttpClientOption();
        try {
        $response = $this->client->send($request, $options);
        } catch (RequestException $e) {
        throw new ApiException(
        "[{$e->getCode()}] {$e->getMessage()}",
        $e->getCode(),
        $request,
        $e->getResponse() ? $e->getResponse()->getHeaders() : null,
        $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
        );
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
        $url = '';

        if (method_exists($request, 'getUri')) {
        $url = $request->getUri();
        }

        if (method_exists($request, 'getUrl')) {
        $url = $request->getUrl();
        }

        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $url
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if (!in_array($returnType, ['string','integer','bool'])) {
            $content = json_decode($content);
            }
            }

            if (!empty($content) && is_object($content) && property_exists($content, 'pagination')) {
            $this->pagination = $content->pagination;
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];

        } catch (ApiException $e) {

        $body = $e->getResponseBody();
        $data = ObjectSerializer::deserialize(
        $body,
        '\Fozzy\WinVPS\Api\Models\ErrorResponse',
        $e->getResponseHeaders()
        );
        try {
        $content = $body->getContents();
        if ($content) {
        $content = json_decode($content, true);
        }
        if (!empty($content) && is_array($content) && !empty($content['error'])) {
        $data->setError($content['error']);
        }
        } catch (\Exception $e) {
        }
        $e->setResponseObject($data);

        throw $e;
        }
        }

        /**
        * Operation machinesNamePutAsync
        *
        * Update machine details
        *
            * @param   $body (required)
            * @param  string $name (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesNamePutAsync($body, $name)
        {
        return $this->machinesNamePutAsyncWithHttpInfo($body, $name)
        ->then(
        function ($response) {
        return $response[0];
        }
        );
        }

        /**
        * Operation machinesNamePutAsyncWithHttpInfo
        *
        * Update machine details
        *
            * @param   $body (required)
            * @param  string $name (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesNamePutAsyncWithHttpInfo($body, $name)
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\MachineDefinition';
        $request = $this->machinesNamePutRequest($body, $name);

        return $this->client
        ->sendAsync($request, $this->createHttpClientOption())
        ->then(
        function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if ($returnType !== 'string') {
            $content = json_decode($content);
            }
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];
        },
        function ($exception) {
        $response = $exception->getResponse();
        $statusCode = $response->getStatusCode();
        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $exception->getRequest()->getUri()
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }
        );
        }

        /**
        * Create request for operation 'machinesNamePut'
        *
            * @param   $body (required)
            * @param  string $name (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Psr7\Request
        */
        protected function machinesNamePutRequest($body, $name)
        {
                // verify the required parameter 'body' is set
                if ($body === null || (is_array($body) && count($body) === 0)) {
                throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling machinesNamePut'
                );
                }
                // verify the required parameter 'name' is set
                if ($name === null || (is_array($name) && count($name) === 0)) {
                throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling machinesNamePut'
                );
                }

        $resourcePath = '/machines/{name}';
        $formParams = [];
        $queryParams = [
        'page' => $this->paginationCurrentPage,
        'limit' => $this->paginationLimit,
        ];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


            // path params
            if ($name !== null) {
            $resourcePath = str_replace(
            '{' . 'name' . '}',
            ObjectSerializer::toPathValue($name),
            $resourcePath
            );
            }

        // body params
        $_tempBody = null;
            if (isset($body)) {
            $_tempBody = $body;
            }

        if ($multipart) {
        $headers = $this->headerSelector->selectHeadersForMultipart(
        ['application/json']
        );
        } else {
        $headers = $this->headerSelector->selectHeaders(
        ['application/json'],
        ['application/json', 'application/x-www-form-urlencoded']
        );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
        // $_tempBody is the method argument, if present
        $httpBody = $_tempBody;
        // \stdClass has no __toString(), so we should encode it manually
        if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($httpBody);
        }
        } elseif (count($formParams) > 0) {
        if ($multipart) {
        $multipartContents = [];
        foreach ($formParams as $formParamName => $formParamValue) {
        $multipartContents[] = [
        'name' => $formParamName,
        'contents' => $formParamValue
        ];
        }
        // for HTTP post (form)
        $httpBody = new MultipartStream($multipartContents);

        } elseif ($headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($formParams);

        } else {
        // for HTTP post (form)
        $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
        }
        }

                // this endpoint requires API key authentication
                $apiKey = $this->config->getApiKeyWithPrefix('Api-Key');
                if ($apiKey !== null) {
                $headers['Api-Key'] = $apiKey;
                }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
        $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
        $defaultHeaders,
        $headerParams,
        $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return $this->createRequest(
        'PUT',
        $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
        $headers,
        $httpBody
        );
        }

        /**
        * Operation machinesNameUsersGet
            *
            * Returns list of additional system users.
        *
            * @param  string $name name (required)
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return \Fozzy\WinVPS\Api\Models\InlineResponse2002[]
        */
        public function machinesNameUsersGet($name)
        {
        list($response) = $this->machinesNameUsersGetWithHttpInfo($name);
            return $response;
        }

        /**
        * Operation machinesNameUsersGetWithHttpInfo
            *
            * Returns list of additional system users.
        *
            * @param  string $name (required)
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return array of \Fozzy\WinVPS\Api\Models\InlineResponse2002[], HTTP status code, HTTP response headers (array of strings)
        */
        public function machinesNameUsersGetWithHttpInfo($name)
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\InlineResponse2002[]';
        $request = $this->machinesNameUsersGetRequest($name);

        try {
        $options = $this->createHttpClientOption();
        try {
        $response = $this->client->send($request, $options);
        } catch (RequestException $e) {
        throw new ApiException(
        "[{$e->getCode()}] {$e->getMessage()}",
        $e->getCode(),
        $request,
        $e->getResponse() ? $e->getResponse()->getHeaders() : null,
        $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
        );
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
        $url = '';

        if (method_exists($request, 'getUri')) {
        $url = $request->getUri();
        }

        if (method_exists($request, 'getUrl')) {
        $url = $request->getUrl();
        }

        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $url
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if (!in_array($returnType, ['string','integer','bool'])) {
            $content = json_decode($content);
            }
            }

            if (!empty($content) && is_object($content) && property_exists($content, 'pagination')) {
            $this->pagination = $content->pagination;
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];

        } catch (ApiException $e) {

        $body = $e->getResponseBody();
        $data = ObjectSerializer::deserialize(
        $body,
        '\Fozzy\WinVPS\Api\Models\ErrorResponse',
        $e->getResponseHeaders()
        );
        try {
        $content = $body->getContents();
        if ($content) {
        $content = json_decode($content, true);
        }
        if (!empty($content) && is_array($content) && !empty($content['error'])) {
        $data->setError($content['error']);
        }
        } catch (\Exception $e) {
        }
        $e->setResponseObject($data);

        throw $e;
        }
        }

        /**
        * Operation machinesNameUsersGetAsync
        *
        * Returns list of additional system users.
        *
            * @param  string $name (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesNameUsersGetAsync($name)
        {
        return $this->machinesNameUsersGetAsyncWithHttpInfo($name)
        ->then(
        function ($response) {
        return $response[0];
        }
        );
        }

        /**
        * Operation machinesNameUsersGetAsyncWithHttpInfo
        *
        * Returns list of additional system users.
        *
            * @param  string $name (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesNameUsersGetAsyncWithHttpInfo($name)
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\InlineResponse2002[]';
        $request = $this->machinesNameUsersGetRequest($name);

        return $this->client
        ->sendAsync($request, $this->createHttpClientOption())
        ->then(
        function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if ($returnType !== 'string') {
            $content = json_decode($content);
            }
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];
        },
        function ($exception) {
        $response = $exception->getResponse();
        $statusCode = $response->getStatusCode();
        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $exception->getRequest()->getUri()
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }
        );
        }

        /**
        * Create request for operation 'machinesNameUsersGet'
        *
            * @param  string $name (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Psr7\Request
        */
        protected function machinesNameUsersGetRequest($name)
        {
                // verify the required parameter 'name' is set
                if ($name === null || (is_array($name) && count($name) === 0)) {
                throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling machinesNameUsersGet'
                );
                }

        $resourcePath = '/machines/{name}/users';
        $formParams = [];
        $queryParams = [
        'page' => $this->paginationCurrentPage,
        'limit' => $this->paginationLimit,
        ];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


            // path params
            if ($name !== null) {
            $resourcePath = str_replace(
            '{' . 'name' . '}',
            ObjectSerializer::toPathValue($name),
            $resourcePath
            );
            }

        // body params
        $_tempBody = null;

        if ($multipart) {
        $headers = $this->headerSelector->selectHeadersForMultipart(
        ['application/json']
        );
        } else {
        $headers = $this->headerSelector->selectHeaders(
        ['application/json'],
        []
        );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
        // $_tempBody is the method argument, if present
        $httpBody = $_tempBody;
        // \stdClass has no __toString(), so we should encode it manually
        if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($httpBody);
        }
        } elseif (count($formParams) > 0) {
        if ($multipart) {
        $multipartContents = [];
        foreach ($formParams as $formParamName => $formParamValue) {
        $multipartContents[] = [
        'name' => $formParamName,
        'contents' => $formParamValue
        ];
        }
        // for HTTP post (form)
        $httpBody = new MultipartStream($multipartContents);

        } elseif ($headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($formParams);

        } else {
        // for HTTP post (form)
        $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
        }
        }

                // this endpoint requires API key authentication
                $apiKey = $this->config->getApiKeyWithPrefix('Api-Key');
                if ($apiKey !== null) {
                $headers['Api-Key'] = $apiKey;
                }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
        $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
        $defaultHeaders,
        $headerParams,
        $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return $this->createRequest(
        'GET',
        $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
        $headers,
        $httpBody
        );
        }

        /**
        * Operation machinesPost
            *
            * Create new machine.
        *
            * @param   $body Optional description in *Markdown* (required)
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return \Fozzy\WinVPS\Api\Models\InlineResponse202
        */
        public function machinesPost($body)
        {
        list($response) = $this->machinesPostWithHttpInfo($body);
            return $response;
        }

        /**
        * Operation machinesPostWithHttpInfo
            *
            * Create new machine.
        *
            * @param   $body Optional description in *Markdown* (required)
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return array of \Fozzy\WinVPS\Api\Models\InlineResponse202, HTTP status code, HTTP response headers (array of strings)
        */
        public function machinesPostWithHttpInfo($body)
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\InlineResponse202';
        $request = $this->machinesPostRequest($body);

        try {
        $options = $this->createHttpClientOption();
        try {
        $response = $this->client->send($request, $options);
        } catch (RequestException $e) {
        throw new ApiException(
        "[{$e->getCode()}] {$e->getMessage()}",
        $e->getCode(),
        $request,
        $e->getResponse() ? $e->getResponse()->getHeaders() : null,
        $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
        );
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
        $url = '';

        if (method_exists($request, 'getUri')) {
        $url = $request->getUri();
        }

        if (method_exists($request, 'getUrl')) {
        $url = $request->getUrl();
        }

        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $url
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if (!in_array($returnType, ['string','integer','bool'])) {
            $content = json_decode($content);
            }
            }

            if (!empty($content) && is_object($content) && property_exists($content, 'pagination')) {
            $this->pagination = $content->pagination;
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];

        } catch (ApiException $e) {

        $body = $e->getResponseBody();
        $data = ObjectSerializer::deserialize(
        $body,
        '\Fozzy\WinVPS\Api\Models\ErrorResponse',
        $e->getResponseHeaders()
        );
        try {
        $content = $body->getContents();
        if ($content) {
        $content = json_decode($content, true);
        }
        if (!empty($content) && is_array($content) && !empty($content['error'])) {
        $data->setError($content['error']);
        }
        } catch (\Exception $e) {
        }
        $e->setResponseObject($data);

        throw $e;
        }
        }

        /**
        * Operation machinesPostAsync
        *
        * Create new machine.
        *
            * @param   $body Optional description in *Markdown* (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesPostAsync($body)
        {
        return $this->machinesPostAsyncWithHttpInfo($body)
        ->then(
        function ($response) {
        return $response[0];
        }
        );
        }

        /**
        * Operation machinesPostAsyncWithHttpInfo
        *
        * Create new machine.
        *
            * @param   $body Optional description in *Markdown* (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesPostAsyncWithHttpInfo($body)
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\InlineResponse202';
        $request = $this->machinesPostRequest($body);

        return $this->client
        ->sendAsync($request, $this->createHttpClientOption())
        ->then(
        function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if ($returnType !== 'string') {
            $content = json_decode($content);
            }
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];
        },
        function ($exception) {
        $response = $exception->getResponse();
        $statusCode = $response->getStatusCode();
        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $exception->getRequest()->getUri()
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }
        );
        }

        /**
        * Create request for operation 'machinesPost'
        *
            * @param   $body Optional description in *Markdown* (required)
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Psr7\Request
        */
        protected function machinesPostRequest($body)
        {
                // verify the required parameter 'body' is set
                if ($body === null || (is_array($body) && count($body) === 0)) {
                throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling machinesPost'
                );
                }

        $resourcePath = '/machines';
        $formParams = [];
        $queryParams = [
        'page' => $this->paginationCurrentPage,
        'limit' => $this->paginationLimit,
        ];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;
            if (isset($body)) {
            $_tempBody = $body;
            }

        if ($multipart) {
        $headers = $this->headerSelector->selectHeadersForMultipart(
        ['application/json']
        );
        } else {
        $headers = $this->headerSelector->selectHeaders(
        ['application/json'],
        ['application/json', 'application/x-www-form-urlencoded']
        );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
        // $_tempBody is the method argument, if present
        $httpBody = $_tempBody;
        // \stdClass has no __toString(), so we should encode it manually
        if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($httpBody);
        }
        } elseif (count($formParams) > 0) {
        if ($multipart) {
        $multipartContents = [];
        foreach ($formParams as $formParamName => $formParamValue) {
        $multipartContents[] = [
        'name' => $formParamName,
        'contents' => $formParamValue
        ];
        }
        // for HTTP post (form)
        $httpBody = new MultipartStream($multipartContents);

        } elseif ($headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($formParams);

        } else {
        // for HTTP post (form)
        $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
        }
        }

                // this endpoint requires API key authentication
                $apiKey = $this->config->getApiKeyWithPrefix('Api-Key');
                if ($apiKey !== null) {
                $headers['Api-Key'] = $apiKey;
                }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
        $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
        $defaultHeaders,
        $headerParams,
        $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return $this->createRequest(
        'POST',
        $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
        $headers,
        $httpBody
        );
        }

        /**
        * Operation machinesRunningGet
            *
            * Returns list of currently running machines.
        *
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return \Fozzy\WinVPS\Api\Models\InlineResponse200[]
        */
        public function machinesRunningGet()
        {
        list($response) = $this->machinesRunningGetWithHttpInfo();
            return $response;
        }

        /**
        * Operation machinesRunningGetWithHttpInfo
            *
            * Returns list of currently running machines.
        *
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return array of \Fozzy\WinVPS\Api\Models\InlineResponse200[], HTTP status code, HTTP response headers (array of strings)
        */
        public function machinesRunningGetWithHttpInfo()
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\InlineResponse200[]';
        $request = $this->machinesRunningGetRequest();

        try {
        $options = $this->createHttpClientOption();
        try {
        $response = $this->client->send($request, $options);
        } catch (RequestException $e) {
        throw new ApiException(
        "[{$e->getCode()}] {$e->getMessage()}",
        $e->getCode(),
        $request,
        $e->getResponse() ? $e->getResponse()->getHeaders() : null,
        $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
        );
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
        $url = '';

        if (method_exists($request, 'getUri')) {
        $url = $request->getUri();
        }

        if (method_exists($request, 'getUrl')) {
        $url = $request->getUrl();
        }

        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $url
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if (!in_array($returnType, ['string','integer','bool'])) {
            $content = json_decode($content);
            }
            }

            if (!empty($content) && is_object($content) && property_exists($content, 'pagination')) {
            $this->pagination = $content->pagination;
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];

        } catch (ApiException $e) {

        $body = $e->getResponseBody();
        $data = ObjectSerializer::deserialize(
        $body,
        '\Fozzy\WinVPS\Api\Models\ErrorResponse',
        $e->getResponseHeaders()
        );
        try {
        $content = $body->getContents();
        if ($content) {
        $content = json_decode($content, true);
        }
        if (!empty($content) && is_array($content) && !empty($content['error'])) {
        $data->setError($content['error']);
        }
        } catch (\Exception $e) {
        }
        $e->setResponseObject($data);

        throw $e;
        }
        }

        /**
        * Operation machinesRunningGetAsync
        *
        * Returns list of currently running machines.
        *
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesRunningGetAsync()
        {
        return $this->machinesRunningGetAsyncWithHttpInfo()
        ->then(
        function ($response) {
        return $response[0];
        }
        );
        }

        /**
        * Operation machinesRunningGetAsyncWithHttpInfo
        *
        * Returns list of currently running machines.
        *
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesRunningGetAsyncWithHttpInfo()
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\InlineResponse200[]';
        $request = $this->machinesRunningGetRequest();

        return $this->client
        ->sendAsync($request, $this->createHttpClientOption())
        ->then(
        function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if ($returnType !== 'string') {
            $content = json_decode($content);
            }
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];
        },
        function ($exception) {
        $response = $exception->getResponse();
        $statusCode = $response->getStatusCode();
        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $exception->getRequest()->getUri()
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }
        );
        }

        /**
        * Create request for operation 'machinesRunningGet'
        *
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Psr7\Request
        */
        protected function machinesRunningGetRequest()
        {

        $resourcePath = '/machines/running';
        $formParams = [];
        $queryParams = [
        'page' => $this->paginationCurrentPage,
        'limit' => $this->paginationLimit,
        ];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;

        if ($multipart) {
        $headers = $this->headerSelector->selectHeadersForMultipart(
        ['application/json']
        );
        } else {
        $headers = $this->headerSelector->selectHeaders(
        ['application/json'],
        []
        );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
        // $_tempBody is the method argument, if present
        $httpBody = $_tempBody;
        // \stdClass has no __toString(), so we should encode it manually
        if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($httpBody);
        }
        } elseif (count($formParams) > 0) {
        if ($multipart) {
        $multipartContents = [];
        foreach ($formParams as $formParamName => $formParamValue) {
        $multipartContents[] = [
        'name' => $formParamName,
        'contents' => $formParamValue
        ];
        }
        // for HTTP post (form)
        $httpBody = new MultipartStream($multipartContents);

        } elseif ($headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($formParams);

        } else {
        // for HTTP post (form)
        $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
        }
        }

                // this endpoint requires API key authentication
                $apiKey = $this->config->getApiKeyWithPrefix('Api-Key');
                if ($apiKey !== null) {
                $headers['Api-Key'] = $apiKey;
                }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
        $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
        $defaultHeaders,
        $headerParams,
        $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return $this->createRequest(
        'GET',
        $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
        $headers,
        $httpBody
        );
        }

        /**
        * Operation machinesStoppedGet
            *
            * Returns list of currently stopped or suspended machines.
        *
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return \Fozzy\WinVPS\Api\Models\InlineResponse200[]
        */
        public function machinesStoppedGet()
        {
        list($response) = $this->machinesStoppedGetWithHttpInfo();
            return $response;
        }

        /**
        * Operation machinesStoppedGetWithHttpInfo
            *
            * Returns list of currently stopped or suspended machines.
        *
        *
        * @throws \Fozzy\WinVPS\Api\ApiException on non-2xx response
        * @throws \InvalidArgumentException
        * @return array of \Fozzy\WinVPS\Api\Models\InlineResponse200[], HTTP status code, HTTP response headers (array of strings)
        */
        public function machinesStoppedGetWithHttpInfo()
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\InlineResponse200[]';
        $request = $this->machinesStoppedGetRequest();

        try {
        $options = $this->createHttpClientOption();
        try {
        $response = $this->client->send($request, $options);
        } catch (RequestException $e) {
        throw new ApiException(
        "[{$e->getCode()}] {$e->getMessage()}",
        $e->getCode(),
        $request,
        $e->getResponse() ? $e->getResponse()->getHeaders() : null,
        $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
        );
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
        $url = '';

        if (method_exists($request, 'getUri')) {
        $url = $request->getUri();
        }

        if (method_exists($request, 'getUrl')) {
        $url = $request->getUrl();
        }

        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $url
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if (!in_array($returnType, ['string','integer','bool'])) {
            $content = json_decode($content);
            }
            }

            if (!empty($content) && is_object($content) && property_exists($content, 'pagination')) {
            $this->pagination = $content->pagination;
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];

        } catch (ApiException $e) {

        $body = $e->getResponseBody();
        $data = ObjectSerializer::deserialize(
        $body,
        '\Fozzy\WinVPS\Api\Models\ErrorResponse',
        $e->getResponseHeaders()
        );
        try {
        $content = $body->getContents();
        if ($content) {
        $content = json_decode($content, true);
        }
        if (!empty($content) && is_array($content) && !empty($content['error'])) {
        $data->setError($content['error']);
        }
        } catch (\Exception $e) {
        }
        $e->setResponseObject($data);

        throw $e;
        }
        }

        /**
        * Operation machinesStoppedGetAsync
        *
        * Returns list of currently stopped or suspended machines.
        *
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesStoppedGetAsync()
        {
        return $this->machinesStoppedGetAsyncWithHttpInfo()
        ->then(
        function ($response) {
        return $response[0];
        }
        );
        }

        /**
        * Operation machinesStoppedGetAsyncWithHttpInfo
        *
        * Returns list of currently stopped or suspended machines.
        *
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Promise\PromiseInterface
        */
        public function machinesStoppedGetAsyncWithHttpInfo()
        {
        $returnType = '\Fozzy\WinVPS\Api\Models\InlineResponse200[]';
        $request = $this->machinesStoppedGetRequest();

        return $this->client
        ->sendAsync($request, $this->createHttpClientOption())
        ->then(
        function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
            $content = $responseBody; //stream goes to serializer
            } else {
            $content = $responseBody->getContents();
            if ($returnType !== 'string') {
            $content = json_decode($content);
            }
            }

            return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
            ];
        },
        function ($exception) {
        $response = $exception->getResponse();
        $statusCode = $response->getStatusCode();
        throw new ApiException(
        sprintf(
        '[%d] Error connecting to the API (%s)',
        $statusCode,
        $exception->getRequest()->getUri()
        ),
        $statusCode,
        $request,
        $response->getHeaders(),
        $response->getBody()
        );
        }
        );
        }

        /**
        * Create request for operation 'machinesStoppedGet'
        *
        *
        * @throws \InvalidArgumentException
        * @return \GuzzleHttp\Psr7\Request
        */
        protected function machinesStoppedGetRequest()
        {

        $resourcePath = '/machines/stopped';
        $formParams = [];
        $queryParams = [
        'page' => $this->paginationCurrentPage,
        'limit' => $this->paginationLimit,
        ];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;

        if ($multipart) {
        $headers = $this->headerSelector->selectHeadersForMultipart(
        ['application/json']
        );
        } else {
        $headers = $this->headerSelector->selectHeaders(
        ['application/json'],
        []
        );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
        // $_tempBody is the method argument, if present
        $httpBody = $_tempBody;
        // \stdClass has no __toString(), so we should encode it manually
        if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($httpBody);
        }
        } elseif (count($formParams) > 0) {
        if ($multipart) {
        $multipartContents = [];
        foreach ($formParams as $formParamName => $formParamValue) {
        $multipartContents[] = [
        'name' => $formParamName,
        'contents' => $formParamValue
        ];
        }
        // for HTTP post (form)
        $httpBody = new MultipartStream($multipartContents);

        } elseif ($headers['Content-Type'] === 'application/json') {
        $httpBody = \GuzzleHttp\json_encode($formParams);

        } else {
        // for HTTP post (form)
        $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
        }
        }

                // this endpoint requires API key authentication
                $apiKey = $this->config->getApiKeyWithPrefix('Api-Key');
                if ($apiKey !== null) {
                $headers['Api-Key'] = $apiKey;
                }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
        $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
        $defaultHeaders,
        $headerParams,
        $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return $this->createRequest(
        'GET',
        $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
        $headers,
        $httpBody
        );
        }

/**
* Create http client option
*
* @throws \RuntimeException on file opening failure
* @return array of http client options
*/
protected function createHttpClientOption()
{
$options = [];
if ($this->config->getDebug()) {
$options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
if (!$options[RequestOptions::DEBUG]) {
throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
}
}

return $options;
}
}
