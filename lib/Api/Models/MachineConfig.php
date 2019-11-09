<?php

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
'ramMax' => 'int'];

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
'ramMax' => null];

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
'ramMax' => 'ram_max'];

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
'ramMax' => 'setRamMax'];

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
'ramMax' => 'getRamMax'];

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
