<?php

namespace Fozzy\WinVPS\Api\Models;

use \ArrayAccess;
use \Fozzy\WinVPS\Api\ObjectSerializer;

/**
 * ProductDefinitionLimits Model
 *
 * @category Class
 * @description Predefined product resources
 * @package  Fozzy\WinVPS\Api
 * @author   Fozzy Inc.
 */
class ProductDefinitionLimits implements ModelInterface, ArrayAccess
{
const DISCRIMINATOR = null;

/**
* The original model name.
*
* @var string
*/
protected static $swaggerModelName = 'ProductDefinition_limits';

/**
* Array of property to type mappings. Used for (de)serialization
*
* @var string[]
*/
protected static $swaggerTypes = [
'diskSize' => 'int',
'ramMin' => 'int',
'ramMax' => 'int',
'cpuPercent' => 'int',
'cpuCores' => 'int',
'bandwidth' => 'int',
'traffic' => 'int'];

/**
* Array of property to format mappings. Used for (de)serialization
*
* @var string[]
*/
protected static $swaggerFormats = [
'diskSize' => null,
'ramMin' => null,
'ramMax' => null,
'cpuPercent' => null,
'cpuCores' => null,
'bandwidth' => null,
'traffic' => null];

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
'diskSize' => 'disk_size',
'ramMin' => 'ram_min',
'ramMax' => 'ram_max',
'cpuPercent' => 'cpu_percent',
'cpuCores' => 'cpu_cores',
'bandwidth' => 'bandwidth',
'traffic' => 'traffic'];

/**
* Array of attributes to setter functions (for deserialization of responses)
*
* @var string[]
*/
protected static $setters = [
'diskSize' => 'setDiskSize',
'ramMin' => 'setRamMin',
'ramMax' => 'setRamMax',
'cpuPercent' => 'setCpuPercent',
'cpuCores' => 'setCpuCores',
'bandwidth' => 'setBandwidth',
'traffic' => 'setTraffic'];

/**
* Array of attributes to getter functions (for serialization of requests)
*
* @var string[]
*/
protected static $getters = [
'diskSize' => 'getDiskSize',
'ramMin' => 'getRamMin',
'ramMax' => 'getRamMax',
'cpuPercent' => 'getCpuPercent',
'cpuCores' => 'getCpuCores',
'bandwidth' => 'getBandwidth',
'traffic' => 'getTraffic'];

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
    $this->container['diskSize'] = isset($data['diskSize']) ? $data['diskSize'] : null;
    $this->container['ramMin'] = isset($data['ramMin']) ? $data['ramMin'] : null;
    $this->container['ramMax'] = isset($data['ramMax']) ? $data['ramMax'] : null;
    $this->container['cpuPercent'] = isset($data['cpuPercent']) ? $data['cpuPercent'] : null;
    $this->container['cpuCores'] = isset($data['cpuCores']) ? $data['cpuCores'] : null;
    $this->container['bandwidth'] = isset($data['bandwidth']) ? $data['bandwidth'] : null;
    $this->container['traffic'] = isset($data['traffic']) ? $data['traffic'] : null;
}

public function setContainer($data)
{
$this->container = $data;
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
    * Gets traffic
    *
    * @return int
    */
    public function getTraffic()
    {
    return $this->container['traffic'];
    }

    /**
    * Sets traffic
    *
    * @param int $traffic traffic
    *
    * @return $this
    */
    public function setTraffic($traffic)
    {
    $this->container['traffic'] = $traffic;

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
