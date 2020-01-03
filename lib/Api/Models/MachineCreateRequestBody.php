<?php

namespace Fozzy\WinVPS\Api\Models;
use \Fozzy\WinVPS\Api\ObjectSerializer;

/**
 * MachineCreateRequestBody Model
 *
 * @category Class
 * @package  Fozzy\WinVPS\Api
 * @author   Fozzy Inc.
 */
class MachineCreateRequestBody extends MachineEditableFields 
{
const DISCRIMINATOR = null;

/**
* The original model name.
*
* @var string
*/
protected static $swaggerModelName = 'MachineCreateRequestBody';

/**
* Array of property to type mappings. Used for (de)serialization
*
* @var string[]
*/
protected static $swaggerTypes = [
'templateId' => 'int',
'brandId' => 'int',
'diskType' => 'string',
'locationId' => 'int',
'addDisk' => 'int',
'addRam' => 'int',
'addCpu' => 'int',
'addBand' => 'int',
'autoStart' => 'int',
'addIpv6' => 'int'];

/**
* Array of property to format mappings. Used for (de)serialization
*
* @var string[]
*/
protected static $swaggerFormats = [
'templateId' => null,
'brandId' => null,
'diskType' => null,
'locationId' => null,
'addDisk' => null,
'addRam' => null,
'addCpu' => null,
'addBand' => null,
'autoStart' => null,
'addIpv6' => null];

/**
* Array of property to type mappings. Used for (de)serialization
*
* @return array
*/
public static function swaggerTypes()
{
return self::$swaggerTypes + parent::swaggerTypes();
}

/**
* Array of property to format mappings. Used for (de)serialization
*
* @return array
*/
public static function swaggerFormats()
{
return self::$swaggerFormats + parent::swaggerFormats();
}

/**
* Array of attributes where the key is the local name,
* and the value is the original name
*
* @var string[]
*/
protected static $attributeMap = [
'templateId' => 'template_id',
'brandId' => 'brand_id',
'diskType' => 'disk_type',
'locationId' => 'location_id',
'addDisk' => 'add_disk',
'addRam' => 'add_ram',
'addCpu' => 'add_cpu',
'addBand' => 'add_band',
'autoStart' => 'auto_start',
'addIpv6' => 'add_ipv6'];

/**
* Array of attributes to setter functions (for deserialization of responses)
*
* @var string[]
*/
protected static $setters = [
'templateId' => 'setTemplateId',
'brandId' => 'setBrandId',
'diskType' => 'setDiskType',
'locationId' => 'setLocationId',
'addDisk' => 'setAddDisk',
'addRam' => 'setAddRam',
'addCpu' => 'setAddCpu',
'addBand' => 'setAddBand',
'autoStart' => 'setAutoStart',
'addIpv6' => 'setAddIpv6'];

/**
* Array of attributes to getter functions (for serialization of requests)
*
* @var string[]
*/
protected static $getters = [
'templateId' => 'getTemplateId',
'brandId' => 'getBrandId',
'diskType' => 'getDiskType',
'locationId' => 'getLocationId',
'addDisk' => 'getAddDisk',
'addRam' => 'getAddRam',
'addCpu' => 'getAddCpu',
'addBand' => 'getAddBand',
'autoStart' => 'getAutoStart',
'addIpv6' => 'getAddIpv6'];

/**
* Array of attributes where the key is the local name,
* and the value is the original name
*
* @return array
*/
public static function attributeMap()
{
return parent::attributeMap() + self::$attributeMap;
}

/**
* Array of attributes to setter functions (for deserialization of responses)
*
* @return array
*/
public static function setters()
{
return parent::setters() + self::$setters;
}

/**
* Array of attributes to getter functions (for serialization of requests)
*
* @return array
*/
public static function getters()
{
return parent::getters() + self::$getters;
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
* Constructor
*
* @param mixed[] $data Associated array of property values
*                      initializing the model
*/
public function __construct(array $data = null)
{
    parent::__construct($data);

    $this->container['templateId'] = isset($data['templateId']) ? $data['templateId'] : null;
    $this->container['brandId'] = isset($data['brandId']) ? $data['brandId'] : null;
    $this->container['diskType'] = isset($data['diskType']) ? $data['diskType'] : null;
    $this->container['locationId'] = isset($data['locationId']) ? $data['locationId'] : null;
    $this->container['addDisk'] = isset($data['addDisk']) ? $data['addDisk'] : null;
    $this->container['addRam'] = isset($data['addRam']) ? $data['addRam'] : null;
    $this->container['addCpu'] = isset($data['addCpu']) ? $data['addCpu'] : null;
    $this->container['addBand'] = isset($data['addBand']) ? $data['addBand'] : null;
    $this->container['autoStart'] = isset($data['autoStart']) ? $data['autoStart'] : null;
    $this->container['addIpv6'] = isset($data['addIpv6']) ? $data['addIpv6'] : null;
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
    $invalidProperties = parent::listInvalidProperties();

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
    * Gets templateId
    *
    * @return int
    */
    public function getTemplateId()
    {
    return $this->container['templateId'];
    }

    /**
    * Sets templateId
    *
    * @param int $templateId Primary Template ID.
    *
    * @return $this
    */
    public function setTemplateId($templateId)
    {
    $this->container['templateId'] = $templateId;

    return $this;
    }

    /**
    * Gets brandId
    *
    * @return int
    */
    public function getBrandId()
    {
    return $this->container['brandId'];
    }

    /**
    * Sets brandId
    *
    * @param int $brandId Primary Brand ID.
    *
    * @return $this
    */
    public function setBrandId($brandId)
    {
    $this->container['brandId'] = $brandId;

    return $this;
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
    * Gets addDisk
    *
    * @return int
    */
    public function getAddDisk()
    {
    return $this->container['addDisk'];
    }

    /**
    * Sets addDisk
    *
    * @param int $addDisk Additional disk saze.
    *
    * @return $this
    */
    public function setAddDisk($addDisk)
    {
    $this->container['addDisk'] = $addDisk;

    return $this;
    }

    /**
    * Gets addRam
    *
    * @return int
    */
    public function getAddRam()
    {
    return $this->container['addRam'];
    }

    /**
    * Sets addRam
    *
    * @param int $addRam Additional RAM size in MB.
    *
    * @return $this
    */
    public function setAddRam($addRam)
    {
    $this->container['addRam'] = $addRam;

    return $this;
    }

    /**
    * Gets addCpu
    *
    * @return int
    */
    public function getAddCpu()
    {
    return $this->container['addCpu'];
    }

    /**
    * Sets addCpu
    *
    * @param int $addCpu Additional CPU cores count.
    *
    * @return $this
    */
    public function setAddCpu($addCpu)
    {
    $this->container['addCpu'] = $addCpu;

    return $this;
    }

    /**
    * Gets addBand
    *
    * @return int
    */
    public function getAddBand()
    {
    return $this->container['addBand'];
    }

    /**
    * Sets addBand
    *
    * @param int $addBand Additional bandwidth.
    *
    * @return $this
    */
    public function setAddBand($addBand)
    {
    $this->container['addBand'] = $addBand;

    return $this;
    }

    /**
    * Gets autoStart
    *
    * @return int
    */
    public function getAutoStart()
    {
    return $this->container['autoStart'];
    }

    /**
    * Sets autoStart
    *
    * @param int $autoStart autoStart
    *
    * @return $this
    */
    public function setAutoStart($autoStart)
    {
    $this->container['autoStart'] = $autoStart;

    return $this;
    }

    /**
    * Gets addIpv6
    *
    * @return int
    */
    public function getAddIpv6()
    {
    return $this->container['addIpv6'];
    }

    /**
    * Sets addIpv6
    *
    * @param int $addIpv6 addIpv6
    *
    * @return $this
    */
    public function setAddIpv6($addIpv6)
    {
    $this->container['addIpv6'] = $addIpv6;

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
