<?php

namespace Fozzy\WinVPS\Api\Models;

use \ArrayAccess;
use \Fozzy\WinVPS\Api\ObjectSerializer;

/**
 * MachineOSUpdateStatus Model
 *
 * @category Class
 * @package  Fozzy\WinVPS\Api
 * @author   Fozzy Inc.
 */
class MachineOSUpdateStatus implements ModelInterface, ArrayAccess
{
const DISCRIMINATOR = null;

/**
* The original model name.
*
* @var string
*/
protected static $swaggerModelName = 'MachineOS_update_status';

/**
* Array of property to type mappings. Used for (de)serialization
*
* @var string[]
*/
protected static $swaggerTypes = [
'hResult' => 'int',
'rebootRequired' => 'bool',
'resultCode' => 'int',
'updateTime' => 'string'];

/**
* Array of property to format mappings. Used for (de)serialization
*
* @var string[]
*/
protected static $swaggerFormats = [
'hResult' => null,
'rebootRequired' => null,
'resultCode' => null,
'updateTime' => null];

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
'hResult' => 'h_result',
'rebootRequired' => 'reboot_required',
'resultCode' => 'result_code',
'updateTime' => 'update_time'];

/**
* Array of attributes to setter functions (for deserialization of responses)
*
* @var string[]
*/
protected static $setters = [
'hResult' => 'setHResult',
'rebootRequired' => 'setRebootRequired',
'resultCode' => 'setResultCode',
'updateTime' => 'setUpdateTime'];

/**
* Array of attributes to getter functions (for serialization of requests)
*
* @var string[]
*/
protected static $getters = [
'hResult' => 'getHResult',
'rebootRequired' => 'getRebootRequired',
'resultCode' => 'getResultCode',
'updateTime' => 'getUpdateTime'];

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
    $this->container['hResult'] = isset($data['hResult']) ? $data['hResult'] : null;
    $this->container['rebootRequired'] = isset($data['rebootRequired']) ? $data['rebootRequired'] : null;
    $this->container['resultCode'] = isset($data['resultCode']) ? $data['resultCode'] : null;
    $this->container['updateTime'] = isset($data['updateTime']) ? $data['updateTime'] : null;
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
    * Gets hResult
    *
    * @return int
    */
    public function getHResult()
    {
    return $this->container['hResult'];
    }

    /**
    * Sets hResult
    *
    * @param int $hResult hResult
    *
    * @return $this
    */
    public function setHResult($hResult)
    {
    $this->container['hResult'] = $hResult;

    return $this;
    }

    /**
    * Gets rebootRequired
    *
    * @return bool
    */
    public function getRebootRequired()
    {
    return $this->container['rebootRequired'];
    }

    /**
    * Sets rebootRequired
    *
    * @param bool $rebootRequired rebootRequired
    *
    * @return $this
    */
    public function setRebootRequired($rebootRequired)
    {
    $this->container['rebootRequired'] = $rebootRequired;

    return $this;
    }

    /**
    * Gets resultCode
    *
    * @return int
    */
    public function getResultCode()
    {
    return $this->container['resultCode'];
    }

    /**
    * Sets resultCode
    *
    * @param int $resultCode resultCode
    *
    * @return $this
    */
    public function setResultCode($resultCode)
    {
    $this->container['resultCode'] = $resultCode;

    return $this;
    }

    /**
    * Gets updateTime
    *
    * @return string
    */
    public function getUpdateTime()
    {
    return $this->container['updateTime'];
    }

    /**
    * Sets updateTime
    *
    * @param string $updateTime updateTime
    *
    * @return $this
    */
    public function setUpdateTime($updateTime)
    {
    $this->container['updateTime'] = $updateTime;

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
