<?php
/**
 * PermissionProfile
 *
 * PHP version 5
 *
 * @category Class
 * @package  DocuSign\eSign
 * @author   Swaagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * DocuSign REST API
 *
 * The DocuSign REST API provides you with a powerful, convenient, and simple Web services API for interacting with DocuSign.
 *
 * OpenAPI spec version: v2.1
 * Contact: devcenter@docusign.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace DocuSign\eSign\Model;

use \ArrayAccess;

/**
 * PermissionProfile Class Doc Comment
 *
 * @category    Class
 * @package     DocuSign\eSign
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class PermissionProfile implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'permissionProfile';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'modified_by_username' => 'string',
        'modified_date_time' => 'string',
        'permission_profile_id' => 'string',
        'permission_profile_name' => 'string',
        'settings' => '\DocuSign\eSign\Model\AccountRoleSettings',
        'user_count' => 'string',
        'users' => '\DocuSign\eSign\Model\UserInformation[]'
    ];

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'modified_by_username' => 'modifiedByUsername',
        'modified_date_time' => 'modifiedDateTime',
        'permission_profile_id' => 'permissionProfileId',
        'permission_profile_name' => 'permissionProfileName',
        'settings' => 'settings',
        'user_count' => 'userCount',
        'users' => 'users'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'modified_by_username' => 'setModifiedByUsername',
        'modified_date_time' => 'setModifiedDateTime',
        'permission_profile_id' => 'setPermissionProfileId',
        'permission_profile_name' => 'setPermissionProfileName',
        'settings' => 'setSettings',
        'user_count' => 'setUserCount',
        'users' => 'setUsers'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'modified_by_username' => 'getModifiedByUsername',
        'modified_date_time' => 'getModifiedDateTime',
        'permission_profile_id' => 'getPermissionProfileId',
        'permission_profile_name' => 'getPermissionProfileName',
        'settings' => 'getSettings',
        'user_count' => 'getUserCount',
        'users' => 'getUsers'
    ];

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    public static function setters()
    {
        return self::$setters;
    }

    public static function getters()
    {
        return self::$getters;
    }

    

    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['modified_by_username'] = isset($data['modified_by_username']) ? $data['modified_by_username'] : null;
        $this->container['modified_date_time'] = isset($data['modified_date_time']) ? $data['modified_date_time'] : null;
        $this->container['permission_profile_id'] = isset($data['permission_profile_id']) ? $data['permission_profile_id'] : null;
        $this->container['permission_profile_name'] = isset($data['permission_profile_name']) ? $data['permission_profile_name'] : null;
        $this->container['settings'] = isset($data['settings']) ? $data['settings'] : null;
        $this->container['user_count'] = isset($data['user_count']) ? $data['user_count'] : null;
        $this->container['users'] = isset($data['users']) ? $data['users'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];
        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properteis are valid
     */
    public function valid()
    {
        return true;
    }


    /**
     * Gets modified_by_username
     * @return string
     */
    public function getModifiedByUsername()
    {
        return $this->container['modified_by_username'];
    }

    /**
     * Sets modified_by_username
     * @param string $modified_by_username 
     * @return $this
     */
    public function setModifiedByUsername($modified_by_username)
    {
        $this->container['modified_by_username'] = $modified_by_username;

        return $this;
    }

    /**
     * Gets modified_date_time
     * @return string
     */
    public function getModifiedDateTime()
    {
        return $this->container['modified_date_time'];
    }

    /**
     * Sets modified_date_time
     * @param string $modified_date_time 
     * @return $this
     */
    public function setModifiedDateTime($modified_date_time)
    {
        $this->container['modified_date_time'] = $modified_date_time;

        return $this;
    }

    /**
     * Gets permission_profile_id
     * @return string
     */
    public function getPermissionProfileId()
    {
        return $this->container['permission_profile_id'];
    }

    /**
     * Sets permission_profile_id
     * @param string $permission_profile_id 
     * @return $this
     */
    public function setPermissionProfileId($permission_profile_id)
    {
        $this->container['permission_profile_id'] = $permission_profile_id;

        return $this;
    }

    /**
     * Gets permission_profile_name
     * @return string
     */
    public function getPermissionProfileName()
    {
        return $this->container['permission_profile_name'];
    }

    /**
     * Sets permission_profile_name
     * @param string $permission_profile_name 
     * @return $this
     */
    public function setPermissionProfileName($permission_profile_name)
    {
        $this->container['permission_profile_name'] = $permission_profile_name;

        return $this;
    }

    /**
     * Gets settings
     * @return \DocuSign\eSign\Model\AccountRoleSettings
     */
    public function getSettings()
    {
        return $this->container['settings'];
    }

    /**
     * Sets settings
     * @param \DocuSign\eSign\Model\AccountRoleSettings $settings
     * @return $this
     */
    public function setSettings($settings)
    {
        $this->container['settings'] = $settings;

        return $this;
    }

    /**
     * Gets user_count
     * @return string
     */
    public function getUserCount()
    {
        return $this->container['user_count'];
    }

    /**
     * Sets user_count
     * @param string $user_count 
     * @return $this
     */
    public function setUserCount($user_count)
    {
        $this->container['user_count'] = $user_count;

        return $this;
    }

    /**
     * Gets users
     * @return \DocuSign\eSign\Model\UserInformation[]
     */
    public function getUsers()
    {
        return $this->container['users'];
    }

    /**
     * Sets users
     * @param \DocuSign\eSign\Model\UserInformation[] $users 
     * @return $this
     */
    public function setUsers($users)
    {
        $this->container['users'] = $users;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
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
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(\DocuSign\eSign\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\DocuSign\eSign\ObjectSerializer::sanitizeForSerialization($this));
    }
}

