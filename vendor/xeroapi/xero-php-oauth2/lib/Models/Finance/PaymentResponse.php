<?php
/**
 * PaymentResponse
 *
 * PHP version 5
 *
 * @category Class
 * @package  XeroAPI\XeroPHP
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Xero Finance API
 *
 * The Finance API is a collection of endpoints which customers can use in the course of a loan application, which may assist lenders to gain the confidence they need to provide capital.
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

namespace XeroAPI\XeroPHP\Models\Finance;

use \ArrayAccess;
use \XeroAPI\XeroPHP\FinanceObjectSerializer;
use \XeroAPI\XeroPHP\StringUtil;
use ReturnTypeWillChange;

/**
 * PaymentResponse Class Doc Comment
 *
 * @category Class
 * @package  XeroAPI\XeroPHP
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PaymentResponse implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PaymentResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'payment_id' => 'string',
        'batch_payment_id' => 'string',
        'date' => '\DateTime',
        'amount' => 'double',
        'bank_amount' => 'double',
        'currency_rate' => 'double',
        'invoice' => '\XeroAPI\XeroPHP\Models\Finance\InvoiceResponse',
        'credit_note' => '\XeroAPI\XeroPHP\Models\Finance\CreditNoteResponse',
        'prepayment' => '\XeroAPI\XeroPHP\Models\Finance\PrepaymentResponse',
        'overpayment' => '\XeroAPI\XeroPHP\Models\Finance\OverpaymentResponse'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'payment_id' => 'uuid',
        'batch_payment_id' => 'uuid',
        'date' => 'date',
        'amount' => 'double',
        'bank_amount' => 'double',
        'currency_rate' => 'double',
        'invoice' => null,
        'credit_note' => null,
        'prepayment' => null,
        'overpayment' => null
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
        'payment_id' => 'paymentId',
        'batch_payment_id' => 'batchPaymentId',
        'date' => 'date',
        'amount' => 'amount',
        'bank_amount' => 'bankAmount',
        'currency_rate' => 'currencyRate',
        'invoice' => 'invoice',
        'credit_note' => 'creditNote',
        'prepayment' => 'prepayment',
        'overpayment' => 'overpayment'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'payment_id' => 'setPaymentId',
        'batch_payment_id' => 'setBatchPaymentId',
        'date' => 'setDate',
        'amount' => 'setAmount',
        'bank_amount' => 'setBankAmount',
        'currency_rate' => 'setCurrencyRate',
        'invoice' => 'setInvoice',
        'credit_note' => 'setCreditNote',
        'prepayment' => 'setPrepayment',
        'overpayment' => 'setOverpayment'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'payment_id' => 'getPaymentId',
        'batch_payment_id' => 'getBatchPaymentId',
        'date' => 'getDate',
        'amount' => 'getAmount',
        'bank_amount' => 'getBankAmount',
        'currency_rate' => 'getCurrencyRate',
        'invoice' => 'getInvoice',
        'credit_note' => 'getCreditNote',
        'prepayment' => 'getPrepayment',
        'overpayment' => 'getOverpayment'
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
        $this->container['payment_id'] = isset($data['payment_id']) ? $data['payment_id'] : null;
        $this->container['batch_payment_id'] = isset($data['batch_payment_id']) ? $data['batch_payment_id'] : null;
        $this->container['date'] = isset($data['date']) ? $data['date'] : null;
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['bank_amount'] = isset($data['bank_amount']) ? $data['bank_amount'] : null;
        $this->container['currency_rate'] = isset($data['currency_rate']) ? $data['currency_rate'] : null;
        $this->container['invoice'] = isset($data['invoice']) ? $data['invoice'] : null;
        $this->container['credit_note'] = isset($data['credit_note']) ? $data['credit_note'] : null;
        $this->container['prepayment'] = isset($data['prepayment']) ? $data['prepayment'] : null;
        $this->container['overpayment'] = isset($data['overpayment']) ? $data['overpayment'] : null;
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
     * Gets payment_id
     *
     * @return string|null
     */
    public function getPaymentId()
    {
        return $this->container['payment_id'];
    }

    /**
     * Sets payment_id
     *
     * @param string|null $payment_id Xero Identifier of payment
     *
     * @return $this
     */
    public function setPaymentId($payment_id)
    {

        $this->container['payment_id'] = $payment_id;

        return $this;
    }



    /**
     * Gets batch_payment_id
     *
     * @return string|null
     */
    public function getBatchPaymentId()
    {
        return $this->container['batch_payment_id'];
    }

    /**
     * Sets batch_payment_id
     *
     * @param string|null $batch_payment_id Xero Identifier of batch payment. Present if the payment was created as part of a batch.
     *
     * @return $this
     */
    public function setBatchPaymentId($batch_payment_id)
    {

        $this->container['batch_payment_id'] = $batch_payment_id;

        return $this;
    }



    /**
     * Gets date
     *
     * @return \DateTime|null
     */
    public function getDate()
    {
        return $this->container['date'];
    }

    /**
     * Sets date
     *
     * @param \DateTime|null $date Date the payment is being made (YYYY-MM-DD) e.g. 2009-09-06
     *
     * @return $this
     */
    public function setDate($date)
    {

        $this->container['date'] = $date;

        return $this;
    }



    /**
     * Gets amount
     *
     * @return double|null
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param double|null $amount The amount of the payment
     *
     * @return $this
     */
    public function setAmount($amount)
    {

        $this->container['amount'] = $amount;

        return $this;
    }



    /**
     * Gets bank_amount
     *
     * @return double|null
     */
    public function getBankAmount()
    {
        return $this->container['bank_amount'];
    }

    /**
     * Sets bank_amount
     *
     * @param double|null $bank_amount The bank amount of the payment
     *
     * @return $this
     */
    public function setBankAmount($bank_amount)
    {

        $this->container['bank_amount'] = $bank_amount;

        return $this;
    }



    /**
     * Gets currency_rate
     *
     * @return double|null
     */
    public function getCurrencyRate()
    {
        return $this->container['currency_rate'];
    }

    /**
     * Sets currency_rate
     *
     * @param double|null $currency_rate Exchange rate when payment is received. Only used for non base currency invoices and credit notes e.g. 0.7500
     *
     * @return $this
     */
    public function setCurrencyRate($currency_rate)
    {

        $this->container['currency_rate'] = $currency_rate;

        return $this;
    }



    /**
     * Gets invoice
     *
     * @return \XeroAPI\XeroPHP\Models\Finance\InvoiceResponse|null
     */
    public function getInvoice()
    {
        return $this->container['invoice'];
    }

    /**
     * Sets invoice
     *
     * @param \XeroAPI\XeroPHP\Models\Finance\InvoiceResponse|null $invoice invoice
     *
     * @return $this
     */
    public function setInvoice($invoice)
    {

        $this->container['invoice'] = $invoice;

        return $this;
    }



    /**
     * Gets credit_note
     *
     * @return \XeroAPI\XeroPHP\Models\Finance\CreditNoteResponse|null
     */
    public function getCreditNote()
    {
        return $this->container['credit_note'];
    }

    /**
     * Sets credit_note
     *
     * @param \XeroAPI\XeroPHP\Models\Finance\CreditNoteResponse|null $credit_note credit_note
     *
     * @return $this
     */
    public function setCreditNote($credit_note)
    {

        $this->container['credit_note'] = $credit_note;

        return $this;
    }



    /**
     * Gets prepayment
     *
     * @return \XeroAPI\XeroPHP\Models\Finance\PrepaymentResponse|null
     */
    public function getPrepayment()
    {
        return $this->container['prepayment'];
    }

    /**
     * Sets prepayment
     *
     * @param \XeroAPI\XeroPHP\Models\Finance\PrepaymentResponse|null $prepayment prepayment
     *
     * @return $this
     */
    public function setPrepayment($prepayment)
    {

        $this->container['prepayment'] = $prepayment;

        return $this;
    }



    /**
     * Gets overpayment
     *
     * @return \XeroAPI\XeroPHP\Models\Finance\OverpaymentResponse|null
     */
    public function getOverpayment()
    {
        return $this->container['overpayment'];
    }

    /**
     * Sets overpayment
     *
     * @param \XeroAPI\XeroPHP\Models\Finance\OverpaymentResponse|null $overpayment overpayment
     *
     * @return $this
     */
    public function setOverpayment($overpayment)
    {

        $this->container['overpayment'] = $overpayment;

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
            FinanceObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }
}


