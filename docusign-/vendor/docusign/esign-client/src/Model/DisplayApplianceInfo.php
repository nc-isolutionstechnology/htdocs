<?php
/**
 * DisplayApplianceInfo
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
 * DisplayApplianceInfo Class Doc Comment
 *
 * @category    Class
 * @package     DocuSign\eSign
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class DisplayApplianceInfo implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'displayApplianceInfo';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'document_data' => '\DocuSign\eSign\Model\DisplayApplianceDocument[]',
        'document_pages' => '\DocuSign\eSign\Model\DisplayApplianceDocumentPage[]',
        'envelope_data' => '\DocuSign\eSign\Model\DisplayApplianceEnvelope',
        'page_data' => '\DocuSign\eSign\Model\DisplayAppliancePage[]',
        'recipient_data' => '\DocuSign\eSign\Model\DisplayApplianceRecipient[]'
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
        'document_data' => 'documentData',
        'document_pages' => 'documentPages',
        'envelope_data' => 'envelopeData',
        'page_data' => 'pageData',
        'recipient_data' => 'recipientData'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'document_data' => 'setDocumentData',
        'document_pages' => 'setDocumentPages',
        'envelope_data' => 'setEnvelopeData',
        'page_data' => 'setPageData',
        'recipient_data' => 'setRecipientData'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'document_data' => 'getDocumentData',
        'document_pages' => 'getDocumentPages',
        'envelope_data' => 'getEnvelopeData',
        'page_data' => 'getPageData',
        'recipient_data' => 'getRecipientData'
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
        $this->container['document_data'] = isset($data['document_data']) ? $data['document_data'] : null;
        $this->container['document_pages'] = isset($data['document_pages']) ? $data['document_pages'] : null;
        $this->container['envelope_data'] = isset($data['envelope_data']) ? $data['envelope_data'] : null;
        $this->container['page_data'] = isset($data['page_data']) ? $data['page_data'] : null;
        $this->container['recipient_data'] = isset($data['recipient_data']) ? $data['recipient_data'] : null;
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
     * Gets document_data
     * @return \DocuSign\eSign\Model\DisplayApplianceDocument[]
     */
    public function getDocumentData()
    {
        return $this->container['document_data'];
    }

    /**
     * Sets document_data
     * @param \DocuSign\eSign\Model\DisplayApplianceDocument[] $document_data 
     * @return $this
     */
    public function setDocumentData($document_data)
    {
        $this->container['document_data'] = $document_data;

        return $this;
    }

    /**
     * Gets document_pages
     * @return \DocuSign\eSign\Model\DisplayApplianceDocumentPage[]
     */
    public function getDocumentPages()
    {
        return $this->container['document_pages'];
    }

    /**
     * Sets document_pages
     * @param \DocuSign\eSign\Model\DisplayApplianceDocumentPage[] $document_pages 
     * @return $this
     */
    public function setDocumentPages($document_pages)
    {
        $this->container['document_pages'] = $document_pages;

        return $this;
    }

    /**
     * Gets envelope_data
     * @return \DocuSign\eSign\Model\DisplayApplianceEnvelope
     */
    public function getEnvelopeData()
    {
        return $this->container['envelope_data'];
    }

    /**
     * Sets envelope_data
     * @param \DocuSign\eSign\Model\DisplayApplianceEnvelope $envelope_data
     * @return $this
     */
    public function setEnvelopeData($envelope_data)
    {
        $this->container['envelope_data'] = $envelope_data;

        return $this;
    }

    /**
     * Gets page_data
     * @return \DocuSign\eSign\Model\DisplayAppliancePage[]
     */
    public function getPageData()
    {
        return $this->container['page_data'];
    }

    /**
     * Sets page_data
     * @param \DocuSign\eSign\Model\DisplayAppliancePage[] $page_data 
     * @return $this
     */
    public function setPageData($page_data)
    {
        $this->container['page_data'] = $page_data;

        return $this;
    }

    /**
     * Gets recipient_data
     * @return \DocuSign\eSign\Model\DisplayApplianceRecipient[]
     */
    public function getRecipientData()
    {
        return $this->container['recipient_data'];
    }

    /**
     * Sets recipient_data
     * @param \DocuSign\eSign\Model\DisplayApplianceRecipient[] $recipient_data 
     * @return $this
     */
    public function setRecipientData($recipient_data)
    {
        $this->container['recipient_data'] = $recipient_data;

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

