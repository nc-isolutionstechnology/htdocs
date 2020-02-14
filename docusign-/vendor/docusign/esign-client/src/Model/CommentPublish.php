<?php
/**
 * CommentPublish
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
 * CommentPublish Class Doc Comment
 *
 * @category    Class
 * @package     DocuSign\eSign
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class CommentPublish implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'commentPublish';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'string',
        'mentions' => 'string[]',
        'text' => 'string',
        'thread_anchor_keys' => 'map[string,string]',
        'thread_id' => 'string',
        'visible_to' => 'string[]'
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
        'id' => 'id',
        'mentions' => 'mentions',
        'text' => 'text',
        'thread_anchor_keys' => 'threadAnchorKeys',
        'thread_id' => 'threadId',
        'visible_to' => 'visibleTo'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'mentions' => 'setMentions',
        'text' => 'setText',
        'thread_anchor_keys' => 'setThreadAnchorKeys',
        'thread_id' => 'setThreadId',
        'visible_to' => 'setVisibleTo'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'mentions' => 'getMentions',
        'text' => 'getText',
        'thread_anchor_keys' => 'getThreadAnchorKeys',
        'thread_id' => 'getThreadId',
        'visible_to' => 'getVisibleTo'
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
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['mentions'] = isset($data['mentions']) ? $data['mentions'] : null;
        $this->container['text'] = isset($data['text']) ? $data['text'] : null;
        $this->container['thread_anchor_keys'] = isset($data['thread_anchor_keys']) ? $data['thread_anchor_keys'] : null;
        $this->container['thread_id'] = isset($data['thread_id']) ? $data['thread_id'] : null;
        $this->container['visible_to'] = isset($data['visible_to']) ? $data['visible_to'] : null;
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
     * Gets id
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     * @param string $id 
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets mentions
     * @return string[]
     */
    public function getMentions()
    {
        return $this->container['mentions'];
    }

    /**
     * Sets mentions
     * @param string[] $mentions 
     * @return $this
     */
    public function setMentions($mentions)
    {
        $this->container['mentions'] = $mentions;

        return $this;
    }

    /**
     * Gets text
     * @return string
     */
    public function getText()
    {
        return $this->container['text'];
    }

    /**
     * Sets text
     * @param string $text 
     * @return $this
     */
    public function setText($text)
    {
        $this->container['text'] = $text;

        return $this;
    }

    /**
     * Gets thread_anchor_keys
     * @return map[string,string]
     */
    public function getThreadAnchorKeys()
    {
        return $this->container['thread_anchor_keys'];
    }

    /**
     * Sets thread_anchor_keys
     * @param map[string,string] $thread_anchor_keys 
     * @return $this
     */
    public function setThreadAnchorKeys($thread_anchor_keys)
    {
        $this->container['thread_anchor_keys'] = $thread_anchor_keys;

        return $this;
    }

    /**
     * Gets thread_id
     * @return string
     */
    public function getThreadId()
    {
        return $this->container['thread_id'];
    }

    /**
     * Sets thread_id
     * @param string $thread_id 
     * @return $this
     */
    public function setThreadId($thread_id)
    {
        $this->container['thread_id'] = $thread_id;

        return $this;
    }

    /**
     * Gets visible_to
     * @return string[]
     */
    public function getVisibleTo()
    {
        return $this->container['visible_to'];
    }

    /**
     * Sets visible_to
     * @param string[] $visible_to 
     * @return $this
     */
    public function setVisibleTo($visible_to)
    {
        $this->container['visible_to'] = $visible_to;

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


