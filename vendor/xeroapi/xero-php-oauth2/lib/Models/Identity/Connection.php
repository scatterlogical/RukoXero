<?php
/**
 * Connection
 *
 * PHP version 5
 *
 * @category Class
 * @package  XeroAPI\XeroPHP
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Xero OAuth 2 Identity Service API
 *
 * These endpoints are related to managing authentication tokens and identity for Xero API
 *
 * Contact: api@xero.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.4.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace XeroAPI\XeroPHP\Models\Identity;

use \ArrayAccess;
use \XeroAPI\XeroPHP\IdentityObjectSerializer;
use \XeroAPI\XeroPHP\StringUtil;
use ReturnTypeWillChange;

/**
 * Connection Class Doc Comment
 *
 * @category Class
 * @package  XeroAPI\XeroPHP
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class Connection implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Connection';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'tenant_id' => 'string',
        'auth_event_id' => 'string',
        'tenant_type' => 'string',
        'tenant_name' => 'string',
        'created_date_utc' => '\DateTime',
        'updated_date_utc' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'id' => 'uuid',
        'tenant_id' => 'uuid',
        'auth_event_id' => 'uuid',
        'tenant_type' => null,
        'tenant_name' => null,
        'created_date_utc' => 'date-time',
        'updated_date_utc' => 'date-time'
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'id' => 'id',
        'tenant_id' => 'tenantId',
        'auth_event_id' => 'authEventId',
        'tenant_type' => 'tenantType',
        'tenant_name' => 'tenantName',
        'created_date_utc' => 'createdDateUtc',
        'updated_date_utc' => 'updatedDateUtc'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'tenant_id' => 'setTenantId',
        'auth_event_id' => 'setAuthEventId',
        'tenant_type' => 'setTenantType',
        'tenant_name' => 'setTenantName',
        'created_date_utc' => 'setCreatedDateUtc',
        'updated_date_utc' => 'setUpdatedDateUtc'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'tenant_id' => 'getTenantId',
        'auth_event_id' => 'getAuthEventId',
        'tenant_type' => 'getTenantType',
        'tenant_name' => 'getTenantName',
        'created_date_utc' => 'getCreatedDateUtc',
        'updated_date_utc' => 'getUpdatedDateUtc'
    ];

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
        return self::$openAPIModelName;
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
        $this->container['tenant_id'] = isset($data['tenant_id']) ? $data['tenant_id'] : null;
        $this->container['auth_event_id'] = isset($data['auth_event_id']) ? $data['auth_event_id'] : null;
        $this->container['tenant_type'] = isset($data['tenant_type']) ? $data['tenant_type'] : null;
        $this->container['tenant_name'] = isset($data['tenant_name']) ? $data['tenant_name'] : null;
        $this->container['created_date_utc'] = isset($data['created_date_utc']) ? $data['created_date_utc'] : null;
        $this->container['updated_date_utc'] = isset($data['updated_date_utc']) ? $data['updated_date_utc'] : null;
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
     * @return string|null
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string|null $id Xero identifier
     *
     * @return $this
     */
    public function setId($id)
    {

        $this->container['id'] = $id;

        return $this;
    }



    /**
     * Gets tenant_id
     *
     * @return string|null
     */
    public function getTenantId()
    {
        return $this->container['tenant_id'];
    }

    /**
     * Sets tenant_id
     *
     * @param string|null $tenant_id Xero identifier of organisation
     *
     * @return $this
     */
    public function setTenantId($tenant_id)
    {

        $this->container['tenant_id'] = $tenant_id;

        return $this;
    }



    /**
     * Gets auth_event_id
     *
     * @return string|null
     */
    public function getAuthEventId()
    {
        return $this->container['auth_event_id'];
    }

    /**
     * Sets auth_event_id
     *
     * @param string|null $auth_event_id Identifier shared across connections authorised at the same time
     *
     * @return $this
     */
    public function setAuthEventId($auth_event_id)
    {

        $this->container['auth_event_id'] = $auth_event_id;

        return $this;
    }



    /**
     * Gets tenant_type
     *
     * @return string|null
     */
    public function getTenantType()
    {
        return $this->container['tenant_type'];
    }

    /**
     * Sets tenant_type
     *
     * @param string|null $tenant_type Xero tenant type (i.e. ORGANISATION, PRACTICE)
     *
     * @return $this
     */
    public function setTenantType($tenant_type)
    {

        $this->container['tenant_type'] = $tenant_type;

        return $this;
    }



    /**
     * Gets tenant_name
     *
     * @return string|null
     */
    public function getTenantName()
    {
        return $this->container['tenant_name'];
    }

    /**
     * Sets tenant_name
     *
     * @param string|null $tenant_name Xero tenant name
     *
     * @return $this
     */
    public function setTenantName($tenant_name)
    {

        $this->container['tenant_name'] = $tenant_name;

        return $this;
    }



    /**
     * Gets created_date_utc
     *
     * @return \DateTime|null
     */
    public function getCreatedDateUtc()
    {
        return $this->container['created_date_utc'];
    }

    /**
     * Sets created_date_utc
     *
     * @param \DateTime|null $created_date_utc The date when the user connected this tenant to your app
     *
     * @return $this
     */
    public function setCreatedDateUtc($created_date_utc)
    {

        $this->container['created_date_utc'] = $created_date_utc;

        return $this;
    }



    /**
     * Gets updated_date_utc
     *
     * @return \DateTime|null
     */
    public function getUpdatedDateUtc()
    {
        return $this->container['updated_date_utc'];
    }

    /**
     * Sets updated_date_utc
     *
     * @param \DateTime|null $updated_date_utc The date when the user most recently connected this tenant to your app. May differ to the created date if the user has disconnected and subsequently reconnected this tenant to your app.
     *
     * @return $this
     */
    public function setUpdatedDateUtc($updated_date_utc)
    {

        $this->container['updated_date_utc'] = $updated_date_utc;

        return $this;
    }


    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    #[\ReturnTypeWillChange]
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
    #[\ReturnTypeWillChange]
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
    #[\ReturnTypeWillChange]
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
    #[\ReturnTypeWillChange]
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
        return json_encode(
            IdentityObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }
}


