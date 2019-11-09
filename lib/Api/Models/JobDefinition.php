<?php

namespace Fozzy\WinVPS\Api\Models;

use \ArrayAccess;
use \Fozzy\WinVPS\Api\ObjectSerializer;

/**
 * JobDefinition Model
 *
 * @category Class
 * @package  Fozzy\WinVPS\Api
 * @author   Fozzy Inc.
 */
class JobDefinition implements ModelInterface, ArrayAccess
{
const DISCRIMINATOR = null;

/**
* The original model name.
*
* @var string
*/
protected static $swaggerModelName = 'JobDefinition';

/**
* Array of property to type mappings. Used for (de)serialization
*
* @var string[]
*/
protected static $swaggerTypes = [
'id' => 'int',
'parentId' => 'int',
'machineId' => 'int',
'type' => 'string',
'status' => 'string',
'startTime' => 'string'];

/**
* Array of property to format mappings. Used for (de)serialization
*
* @var string[]
*/
protected static $swaggerFormats = [
'id' => null,
'parentId' => null,
'machineId' => null,
'type' => null,
'status' => null,
'startTime' => null];

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
'id' => 'id',
'parentId' => 'parent_id',
'machineId' => 'machine_id',
'type' => 'type',
'status' => 'status',
'startTime' => 'start_time'];

/**
* Array of attributes to setter functions (for deserialization of responses)
*
* @var string[]
*/
protected static $setters = [
'id' => 'setId',
'parentId' => 'setParentId',
'machineId' => 'setMachineId',
'type' => 'setType',
'status' => 'setStatus',
'startTime' => 'setStartTime'];

/**
* Array of attributes to getter functions (for serialization of requests)
*
* @var string[]
*/
protected static $getters = [
'id' => 'getId',
'parentId' => 'getParentId',
'machineId' => 'getMachineId',
'type' => 'getType',
'status' => 'getStatus',
'startTime' => 'getStartTime'];

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
    $this->container['id'] = isset($data['id']) ? $data['id'] : null;
    $this->container['parentId'] = isset($data['parentId']) ? $data['parentId'] : null;
    $this->container['machineId'] = isset($data['machineId']) ? $data['machineId'] : null;
    $this->container['type'] = isset($data['type']) ? $data['type'] : null;
    $this->container['status'] = isset($data['status']) ? $data['status'] : null;
    $this->container['startTime'] = isset($data['startTime']) ? $data['startTime'] : null;
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
    * Gets id
    *
    * @return int
    */
    public function getId()
    {
    return $this->container['id'];
    }

    /**
    * Sets id
    *
    * @param int $id Job primary ID. Can be used to show Job details or cancel the command
    *
    * @return $this
    */
    public function setId($id)
    {
    $this->container['id'] = $id;

    return $this;
    }

    /**
    * Gets parentId
    *
    * @return int
    */
    public function getParentId()
    {
    return $this->container['parentId'];
    }

    /**
    * Sets parentId
    *
    * @param int $parentId ID of the last Job before the current one. Since the commands are executed sequentially, parent ID can be used to monitor the progress of command processing.
    *
    * @return $this
    */
    public function setParentId($parentId)
    {
    $this->container['parentId'] = $parentId;

    return $this;
    }

    /**
    * Gets machineId
    *
    * @return int
    */
    public function getMachineId()
    {
    return $this->container['machineId'];
    }

    /**
    * Sets machineId
    *
    * @param int $machineId ID of the machine Job created for.
    *
    * @return $this
    */
    public function setMachineId($machineId)
    {
    $this->container['machineId'] = $machineId;

    return $this;
    }

    /**
    * Gets type
    *
    * @return string
    */
    public function getType()
    {
    return $this->container['type'];
    }

    /**
    * Sets type
    *
    * @param string $type Defines the command which be executed.
    *
    * @return $this
    */
    public function setType($type)
    {
    $this->container['type'] = $type;

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
    * @param string $status Command status.
    *
    * @return $this
    */
    public function setStatus($status)
    {
    $this->container['status'] = $status;

    return $this;
    }

    /**
    * Gets startTime
    *
    * @return string
    */
    public function getStartTime()
    {
    return $this->container['startTime'];
    }

    /**
    * Sets startTime
    *
    * @param string $startTime Time after which the command can be started. The Job will not be started before this time but can be started some time later when the queue reaches its completion.
    *
    * @return $this
    */
    public function setStartTime($startTime)
    {
    $this->container['startTime'] = $startTime;

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
