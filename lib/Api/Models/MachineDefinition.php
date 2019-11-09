<?php

namespace Fozzy\WinVPS\Api\Models;

use \ArrayAccess;
use \Fozzy\WinVPS\Api\ObjectSerializer;

/**
 * MachineDefinition Model
 *
 * @category Class
 * @package  Fozzy\WinVPS\Api
 * @author   Fozzy Inc.
 */
class MachineDefinition implements ModelInterface, ArrayAccess
{
const DISCRIMINATOR = null;

/**
* The original model name.
*
* @var string
*/
protected static $swaggerModelName = 'MachineDefinition';

/**
* Array of property to type mappings. Used for (de)serialization
*
* @var string[]
*/
protected static $swaggerTypes = [
'name' => 'string',
'status' => 'string',
'ips' => '\Fozzy\WinVPS\Api\Models\IpDefinition[]',
'os' => '\Fozzy\WinVPS\Api\Models\MachineOS',
'config' => '\Fozzy\WinVPS\Api\Models\MachineConfig'];

/**
* Array of property to format mappings. Used for (de)serialization
*
* @var string[]
*/
protected static $swaggerFormats = [
'name' => null,
'status' => null,
'ips' => null,
'os' => null,
'config' => null];

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
'name' => 'name',
'status' => 'status',
'ips' => 'ips',
'os' => 'os',
'config' => 'config'];

/**
* Array of attributes to setter functions (for deserialization of responses)
*
* @var string[]
*/
protected static $setters = [
'name' => 'setName',
'status' => 'setStatus',
'ips' => 'setIps',
'os' => 'setOs',
'config' => 'setConfig'];

/**
* Array of attributes to getter functions (for serialization of requests)
*
* @var string[]
*/
protected static $getters = [
'name' => 'getName',
'status' => 'getStatus',
'ips' => 'getIps',
'os' => 'getOs',
'config' => 'getConfig'];

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
    $this->container['name'] = isset($data['name']) ? $data['name'] : null;
    $this->container['status'] = isset($data['status']) ? $data['status'] : null;
    $this->container['ips'] = isset($data['ips']) ? $data['ips'] : null;
    $this->container['os'] = isset($data['os']) ? $data['os'] : null;
    $this->container['config'] = isset($data['config']) ? $data['config'] : null;
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
    * Gets name
    *
    * @return string
    */
    public function getName()
    {
    return $this->container['name'];
    }

    /**
    * Sets name
    *
    * @param string $name Machine name and primary Key.
    *
    * @return $this
    */
    public function setName($name)
    {
    $this->container['name'] = $name;

    return $this;
    }

    /**
    * Gets status
    *
    * @return string
    */
    public function getStatus()
    {
    return $this->container['status'];
    }

    /**
    * Sets status
    *
    * @param string $status Current machine status.
    *
    * @return $this
    */
    public function setStatus($status)
    {
    $this->container['status'] = $status;

    return $this;
    }

    /**
    * Gets ips
    *
    * @return \Fozzy\WinVPS\Api\Models\IpDefinition[]
    */
    public function getIps()
    {
    return $this->container['ips'];
    }

    /**
    * Sets ips
    *
    * @param \Fozzy\WinVPS\Api\Models\IpDefinition[] $ips List of IPs assegned to the Machine.
    *
    * @return $this
    */
    public function setIps($ips)
    {
    $this->container['ips'] = $ips;

    return $this;
    }

    /**
    * Gets os
    *
    * @return \Fozzy\WinVPS\Api\Models\MachineOS
    */
    public function getOs()
    {
    return $this->container['os'];
    }

    /**
    * Sets os
    *
    * @param \Fozzy\WinVPS\Api\Models\MachineOS $os os
    *
    * @return $this
    */
    public function setOs($os)
    {
    $this->container['os'] = $os;

    return $this;
    }

    /**
    * Gets config
    *
    * @return \Fozzy\WinVPS\Api\Models\MachineConfig
    */
    public function getConfig()
    {
    return $this->container['config'];
    }

    /**
    * Sets config
    *
    * @param \Fozzy\WinVPS\Api\Models\MachineConfig $config config
    *
    * @return $this
    */
    public function setConfig($config)
    {
    $this->container['config'] = $config;

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
