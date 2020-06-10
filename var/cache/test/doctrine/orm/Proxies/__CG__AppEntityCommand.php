<?php

namespace Proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Command extends \App\Entity\Command implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array<string, null> properties to be lazy loaded, indexed by property name
     */
    public static $lazyPropertiesNames = array (
  'shoppingCartItems' => NULL,
);

    /**
     * @var array<string, mixed> default values of properties to be lazy loaded, with keys being the property names
     *
     * @see \Doctrine\Common\Proxy\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array (
  'shoppingCartItems' => NULL,
);



    public function __construct(?\Closure $initializer = null, ?\Closure $cloner = null)
    {
        unset($this->shoppingCartItems);

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }

    /**
     * 
     * @param string $name
     */
    public function __get($name)
    {
        if (\array_key_exists($name, self::$lazyPropertiesNames)) {
            $this->__initializer__ && $this->__initializer__->__invoke($this, '__get', [$name]);
            return $this->$name;
        }

        trigger_error(sprintf('Undefined property: %s::$%s', __CLASS__, $name), E_USER_NOTICE);

    }

    /**
     * 
     * @param string $name
     * @param mixed  $value
     */
    public function __set($name, $value)
    {
        if (\array_key_exists($name, self::$lazyPropertiesNames)) {
            $this->__initializer__ && $this->__initializer__->__invoke($this, '__set', [$name, $value]);

            $this->$name = $value;

            return;
        }

        $this->$name = $value;
    }

    /**
     * 
     * @param  string $name
     * @return boolean
     */
    public function __isset($name)
    {
        if (\array_key_exists($name, self::$lazyPropertiesNames)) {
            $this->__initializer__ && $this->__initializer__->__invoke($this, '__isset', [$name]);

            return isset($this->$name);
        }

        return false;
    }

    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Command' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Command' . "\0" . 'secondaryId', '' . "\0" . 'App\\Entity\\Command' . "\0" . 'checkOutSessionID', '' . "\0" . 'App\\Entity\\Command' . "\0" . 'totalAmount', '' . "\0" . 'App\\Entity\\Command' . "\0" . 'created', '' . "\0" . 'App\\Entity\\Command' . "\0" . 'state', '' . "\0" . 'App\\Entity\\Command' . "\0" . 'customer', '' . "\0" . 'App\\Entity\\Command' . "\0" . 'commandItems', 'shoppingCartItems'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Command' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Command' . "\0" . 'secondaryId', '' . "\0" . 'App\\Entity\\Command' . "\0" . 'checkOutSessionID', '' . "\0" . 'App\\Entity\\Command' . "\0" . 'totalAmount', '' . "\0" . 'App\\Entity\\Command' . "\0" . 'created', '' . "\0" . 'App\\Entity\\Command' . "\0" . 'state', '' . "\0" . 'App\\Entity\\Command' . "\0" . 'customer', '' . "\0" . 'App\\Entity\\Command' . "\0" . 'commandItems'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Command $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy::$lazyPropertiesDefaults as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

            unset($this->shoppingCartItems);
        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @deprecated no longer in use - generated code now relies on internal components rather than generated public API
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function addCartItem(\App\Entity\ShoppingCartItem $item)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addCartItem', [$item]);

        return parent::addCartItem($item);
    }

    /**
     * {@inheritDoc}
     */
    public function add(\App\Entity\CommandItem $item)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'add', [$item]);

        return parent::add($item);
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setId($id): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', [$id]);

        parent::setId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function getTotalAmount()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTotalAmount', []);

        return parent::getTotalAmount();
    }

    /**
     * {@inheritDoc}
     */
    public function setTotalAmount($totalAmount): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTotalAmount', [$totalAmount]);

        parent::setTotalAmount($totalAmount);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreated()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreated', []);

        return parent::getCreated();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreated($created): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreated', [$created]);

        parent::setCreated($created);
    }

    /**
     * {@inheritDoc}
     */
    public function getState()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getState', []);

        return parent::getState();
    }

    /**
     * {@inheritDoc}
     */
    public function setState($state): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setState', [$state]);

        parent::setState($state);
    }

    /**
     * {@inheritDoc}
     */
    public function getCustomer(): ?\App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCustomer', []);

        return parent::getCustomer();
    }

    /**
     * {@inheritDoc}
     */
    public function setCustomer($customer): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCustomer', [$customer]);

        parent::setCustomer($customer);
    }

    /**
     * {@inheritDoc}
     */
    public function getCommandItems(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCommandItems', []);

        return parent::getCommandItems();
    }

    /**
     * {@inheritDoc}
     */
    public function getCheckOutSessionID(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCheckOutSessionID', []);

        return parent::getCheckOutSessionID();
    }

    /**
     * {@inheritDoc}
     */
    public function setCheckOutSessionID($checkOutSessionID): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCheckOutSessionID', [$checkOutSessionID]);

        parent::setCheckOutSessionID($checkOutSessionID);
    }

    /**
     * {@inheritDoc}
     */
    public function getShoppingCartItems(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getShoppingCartItems', []);

        return parent::getShoppingCartItems();
    }

    /**
     * {@inheritDoc}
     */
    public function getSecondaryId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSecondaryId', []);

        return parent::getSecondaryId();
    }

    /**
     * {@inheritDoc}
     */
    public function setSecondaryId($secondaryId): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSecondaryId', [$secondaryId]);

        parent::setSecondaryId($secondaryId);
    }

}