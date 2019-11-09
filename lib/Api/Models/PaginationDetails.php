<?php

namespace Fozzy\WinVPS\Api\Models;

use \ArrayAccess;
use \Fozzy\WinVPS\Api\ObjectSerializer;

/**
 * PaginationDetails Model
 *
 * @category Class
 * @package  Fozzy\WinVPS\Api
 * @author   Fozzy Inc.
 */
class PaginationDetails implements ModelInterface, ArrayAccess
{
const DISCRIMINATOR = null;

/**
* The original model name.
*
* @var string
*/
protected static $swaggerModelName = 'PaginationDetails';

/**
* Array of property to type mappings. Used for (de)serialization
*
* @var string[]
*/
protected static $swaggerTypes = [
'total' => 'int',
'limit' => 'int',
'page' => 'int',
'pages' => 'int'];

/**
* Array of property to format mappings. Used for (de)serialization
*
* @var string[]
*/
protected static $swaggerFormats = [
'total' => null,
'limit' => null,
'page' => null,
'pages' => null];

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
'total' => 'total',
'limit' => 'limit',
'page' => 'page',
'pages' => 'pages'];

/**
* Array of attributes to setter functions (for deserialization of responses)
*
* @var string[]
*/
protected static $setters = [
'total' => 'setTotal',
'limit' => 'setLimit',
'page' => 'setPage',
'pages' => 'setPages'];

/**
* Array of attributes to getter functions (for serialization of requests)
*
* @var string[]
*/
protected static $getters = [
'total' => 'getTotal',
'limit' => 'getLimit',
'page' => 'getPage',
'pages' => 'getPages'];

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
    $this->container['total'] = isset($data['total']) ? $data['total'] : null;
    $this->container['limit'] = isset($data['limit']) ? $data['limit'] : null;
    $this->container['page'] = isset($data['page']) ? $data['page'] : null;
    $this->container['pages'] = isset($data['pages']) ? $data['pages'] : null;
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
    * Gets total
    *
    * @return int
    */
    public function getTotal()
    {
    return $this->container['total'];
    }

    /**
    * Sets total
    *
    * @param int $total The total number of entries available in the entire collection
    *
    * @return $this
    */
    public function setTotal($total)
    {
    $this->container['total'] = $total;

    return $this;
    }

    /**
    * Gets limit
    *
    * @return int
    */
    public function getLimit()
    {
    return $this->container['limit'];
    }

    /**
    * Sets limit
    *
    * @param int $limit The number of entries returned per page (default: 50)
    *
    * @return $this
    */
    public function setLimit($limit)
    {
    $this->container['limit'] = $limit;

    return $this;
    }

    /**
    * Gets page
    *
    * @return int
    */
    public function getPage()
    {
    return $this->container['page'];
    }

    /**
    * Sets page
    *
    * @param int $page The page currently returned (default: 1)
    *
    * @return $this
    */
    public function setPage($page)
    {
    $this->container['page'] = $page;

    return $this;
    }

    /**
    * Gets pages
    *
    * @return int
    */
    public function getPages()
    {
    return $this->container['pages'];
    }

    /**
    * Sets pages
    *
    * @param int $pages The total number of pages
    *
    * @return $this
    */
    public function setPages($pages)
    {
    $this->container['pages'] = $pages;

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
