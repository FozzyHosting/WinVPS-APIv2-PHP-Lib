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

namespace Fozzy\WinVPS\Api\Models;

use \ArrayAccess;
use \Fozzy\WinVPS\Api\ObjectSerializer;

/**
 * MachineConfig Model
 *
 * @category Class
 * @description Machine resources. Includes both additional resources and default product-defined resources.
 * @package  Fozzy\WinVPS\Api
 * @author   Fozzy Inc.
 */
class MachineConfig implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original model name.
      *
      * @var string
      */
    protected static $swaggerModelName = 'MachineConfig';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'bandwidth' => 'int',
'cpuCores' => 'int',
'cpuPercent' => 'int',
'diskSize' => 'int',
'ramMin' => 'int',
'ramMax' => 'int'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'bandwidth' => null,
'cpuCores' => null,
'cpuPercent' => null,
'diskSize' => null,
'ramMin' => null,
'ramMax' => null    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'bandwidth' => 'bandwidth',
'cpuCores' => 'cpu_cores',
'cpuPercent' => 'cpu_percent',
'diskSize' => 'disk_size',
'ramMin' => 'ram_min',
'ramMax' => 'ram_max'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'bandwidth' => 'setBandwidth',
'cpuCores' => 'setCpuCores',
'cpuPercent' => 'setCpuPercent',
'diskSize' => 'setDiskSize',
'ramMin' => 'setRamMin',
'ramMax' => 'setRamMax'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'bandwidth' => 'getBandwidth',
'cpuCores' => 'getCpuCores',
'cpuPercent' => 'getCpuPercent',
'diskSize' => 'getDiskSize',
'ramMin' => 'getRamMin',
'ramMax' => 'getRamMax'    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['bandwidth'] = isset($data['bandwidth']) ? $data['bandwidth'] : null;
        $this->container['cpuCores'] = isset($data['cpuCores']) ? $data['cpuCores'] : null;
        $this->container['cpuPercent'] = isset($data['cpuPercent']) ? $data['cpuPercent'] : null;
        $this->container['diskSize'] = isset($data['diskSize']) ? $data['diskSize'] : null;
        $this->container['ramMin'] = isset($data['ramMin']) ? $data['ramMin'] : null;
        $this->container['ramMax'] = isset($data['ramMax']) ? $data['ramMax'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets bandwidth
     *
     * @return int
     */
    public function getBandwidth()
    {
        return $this->container['bandwidth'];
    }

    /**
     * Sets bandwidth
     *
     * @param int $bandwidth bandwidth
     *
     * @return $this
     */
    public function setBandwidth($bandwidth)
    {
        $this->container['bandwidth'] = $bandwidth;

        return $this;
    }

    /**
     * Gets cpuCores
     *
     * @return int
     */
    public function getCpuCores()
    {
        return $this->container['cpuCores'];
    }

    /**
     * Sets cpuCores
     *
     * @param int $cpuCores cpuCores
     *
     * @return $this
     */
    public function setCpuCores($cpuCores)
    {
        $this->container['cpuCores'] = $cpuCores;

        return $this;
    }

    /**
     * Gets cpuPercent
     *
     * @return int
     */
    public function getCpuPercent()
    {
        return $this->container['cpuPercent'];
    }

    /**
     * Sets cpuPercent
     *
     * @param int $cpuPercent cpuPercent
     *
     * @return $this
     */
    public function setCpuPercent($cpuPercent)
    {
        $this->container['cpuPercent'] = $cpuPercent;

        return $this;
    }

    /**
     * Gets diskSize
     *
     * @return int
     */
    public function getDiskSize()
    {
        return $this->container['diskSize'];
    }

    /**
     * Sets diskSize
     *
     * @param int $diskSize diskSize
     *
     * @return $this
     */
    public function setDiskSize($diskSize)
    {
        $this->container['diskSize'] = $diskSize;

        return $this;
    }

    /**
     * Gets ramMin
     *
     * @return int
     */
    public function getRamMin()
    {
        return $this->container['ramMin'];
    }

    /**
     * Sets ramMin
     *
     * @param int $ramMin ramMin
     *
     * @return $this
     */
    public function setRamMin($ramMin)
    {
        $this->container['ramMin'] = $ramMin;

        return $this;
    }

    /**
     * Gets ramMax
     *
     * @return int
     */
    public function getRamMax()
    {
        return $this->container['ramMax'];
    }

    /**
     * Sets ramMax
     *
     * @param int $ramMax ramMax
     *
     * @return $this
     */
    public function setRamMax($ramMax)
    {
        $this->container['ramMax'] = $ramMax;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
