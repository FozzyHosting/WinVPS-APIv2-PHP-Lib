<?php

namespace Fozzy\WinVPS\Api\Models;

use \ArrayAccess;
use \Fozzy\WinVPS\Api\ObjectSerializer;

/**
 * MachineNonReinstallableFields Model
 *
 * @category Class
 * @package  Fozzy\WinVPS\Api
 * @author   Fozzy Inc.
 */
class MachineNonReinstallableFields implements ModelInterface, ArrayAccess
{
const DISCRIMINATOR = null;

/**
* The original model name.
*
* @var string
*/
protected static $swaggerModelName = 'MachineNonReinstallableFields';

/**
* Array of property to type mappings. Used for (de)serialization
*
* @var string[]
*/
protected static $swaggerTypes = [
'diskType' => 'string',
'locationId' => 'int'];

/**
* Array of property to format mappings. Used for (de)serialization
*
* @var string[]
*/
protected static $swaggerFormats = [
'diskType' => null,
'locationId' => null];

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
'diskType' => 'disk_type',
'locationId' => 'location_id'];

/**
* Array of attributes to setter functions (for deserialization of responses)
*
* @var string[]
*/
protected static $setters = [
'diskType' => 'setDiskType',
'locationId' => 'setLocationId'];

/**
* Array of attributes to getter functions (for serialization of requests)
*
* @var string[]
*/
protected static $getters = [
'diskType' => 'getDiskType',
'locationId' => 'getLocationId'];

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

const DISK_TYPE_HDD = 'hdd';
const DISK_TYPE_SSD = 'ssd';

    /**
    * Gets allowable values of the enum
    *
    * @return string[]
    */
    public function getDiskTypeAllowableValues()
    {
    return [
    self::DISK_TYPE_HDD,
self::DISK_TYPE_SSD,    ];
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
    $this->container['diskType'] = isset($data['diskType']) ? $data['diskType'] : null;
    $this->container['locationId'] = isset($data['locationId']) ? $data['locationId'] : null;
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

            $allowedValues = $this->getDiskTypeAllowableValues();
            if (!is_null($this->container['diskType']) && !in_array($this->container['diskType'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
            "invalid value for 'diskType', must be one of '%s'",
            implode("', '", $allowedValues)
            );
            }

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
    * Gets diskType
    *
    * @return string
    */
    public function getDiskType()
    {
    return $this->container['diskType'];
    }

    /**
    * Sets diskType
    *
    * @param string $diskType Server disk type. HDD or SSD.
    *
    * @return $this
    */
    public function setDiskType($diskType)
    {
        $allowedValues = $this->getDiskTypeAllowableValues();
            if (!is_null($diskType) && !in_array($diskType, $allowedValues, true)) {
            throw new \InvalidArgumentException(
            sprintf(
            "Invalid value for 'diskType', must be one of '%s'",
            implode("', '", $allowedValues)
            )
            );
            }
    $this->container['diskType'] = $diskType;

    return $this;
    }

    /**
    * Gets locationId
    *
    * @return int
    */
    public function getLocationId()
    {
    return $this->container['locationId'];
    }

    /**
    * Sets locationId
    *
    * @param int $locationId Primary Location ID.
    *
    * @return $this
    */
    public function setLocationId($locationId)
    {
    $this->container['locationId'] = $locationId;

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
