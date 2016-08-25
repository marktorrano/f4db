<?php

/**
 * Erp Model
 *
 * @author Jurjen Beukenhorst <jurjen.beukenhorst@jfs.be>
 * @copyright Copyright (c) Janssens Field Services 2016
 */

namespace App\Library;

use Countable;
use Iterator;
use Log;
use Illuminate\Contracts\Routing\UrlRoutable;

/**
 * Erp Model
 */
class ErpModel implements UrlRoutable, Countable, Iterator
{
    /**
     * Holds the XmlRpc object.
     * @access private
     * @var App\Library\XmlRpc
     */
    private static $xmlRpc;

    /**
     * Holds the name of the object.
     * @access protected
     * @var string
     */
    protected $object;

    /**
     * An array of where arguments.
     * @access private
     * @var array
     */
    private $wheres = [];

    /**
     * An integer with the offset value.
     * @access private
     * @var int
     */
    private $offset = 0;

    /**
     * An integer with the limit value.
     * @access private
     * @var int
     */
    private $limit;

    /**
     * The primary key for the model.
     * @access protected
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @access protected
     * @var bool
     */
    protected $first = true;

    /**
     * @access private
     * @var array
     */
    private $data = [];

    /**
     * create()
     *
     * A simple static alias to easily create a dynamic entity.
     * @param string $object
     * @return self
     */
    public static function create($object)
    {
        return new self($object);
    }

    /**
     * __construct()
     *
     * Sets the object property if it is not set.
     * @param string $object
     */
    public function __construct($object = null, $data = [])
    {
        if (is_null($this->object)) {
            if (is_null($object)) {
                $object = get_called_class();
                $object = (new \ReflectionClass($object))->getShortName();
            }

            $this->object = preg_split('/(?=[A-Z])/', $object, -1, PREG_SPLIT_NO_EMPTY);
            $this->object = strtolower(implode('.', $this->object));
        }

        $this->data = $data;
    }

    /**
     * __callStatic()
     *
     * Adds a dynamic system to a staticly called method.
     * @param string $function
     * @param array $arguments
     * @return mixed
     */
    public static function __callStatic($function, $arguments)
    {
        $entity = get_called_class();

        $object = (new \ReflectionClass($entity))->getShortName();

        $entity = new $entity($object);

        return call_user_func_array([$entity, $function], $arguments);
    }

    /**
     * __call()
     *
     * Dynamicly calls an ERP object.
     * @param string $function
     * @param array $arguments
     * @return mixed
     */
    public function __call($function, $arguments)
    {
        if (in_array($function, [
            'limit', 'offset', 'where', 'search'
        ])) {
            return call_user_func_array([$this, $function], $arguments);
        }

        if (preg_match('/^where./', $function)) {
            $column = str_replace('where', '', $function);
            $arguments = array_merge([strtolower($column)], $arguments);
            return call_user_func_array([$this, 'where'], $arguments);
        }

        return $this->call($function, $arguments);
    }

    /**
     * call()
     *
     * Does the actual calling to ERP.
     * @param string $function
     * @param array $arguments
     * @return self
     */
    public function call($function, $arguments)
    {
        foreach ($arguments as &$argument) {
            if ($argument instanceof self) {
                $argument = $argument->arr();
            }
        }

        $argString = $this->argumentsToString($arguments);

        Log::debug($this->object . ".$function$argString");

        array_unshift($arguments, [$this->object, $function]);

        $this->data = call_user_func_array(
            [$this->xmlRpc(), 'sendXRCallToJFS'], $arguments
        );

        $this->wheres = [];
        $this->offset = 0;
        $this->limit = null;

        return $this;
    }

    /**
     * xmlRpc()
     *
     * Returns the XmlRpc object.
     * @return App\Library\XmlRpc
     */
    public function xmlRpc()
    {
        if (!is_null(self::$xmlRpc)) return self::$xmlRpc;

        return self::$xmlRpc = new XmlRpc;
    }

    /**
     * argumentsToString()
     *
     * Converts an array of arguments to a string.
     * @param array $arguments
     * @return string
     */
    private function argumentsToString($arguments)
    {
        $argString = '';

        if (count($arguments)) {
            foreach ($arguments as $argument) {
                if (empty($argString)) {
                    $argString .= '(';
                } else {
                    $argString .= ', ';
                }

                if (is_array($argument)) {
                    $argString .= json_encode($argument);
                } elseif (is_int($argument)) {
                    $argString .= $argument;
                } else {
                    $argString .= '"' . $argument . '"';
                }
            }
        }

        if (empty($argString)) $argString = '(';

        $argString .= ')';

        return $argString;
    }

    /**
     * where()
     *
     * Sets a where argument for the search function.
     * @param string $column
     * @param string $type
     * @param mixed $value
     * @param self
     */
    protected function where($column, $type, $value = null)
    {
        if (is_null($value)) {
            $value = $type;
            $type = '=';
        }

        $this->wheres[] = [$column, $type, $value];

        return $this;
    }

    /**
     * offset()
     *
     * Sets an offset argument for the search function.
     * @param int $offset
     * @return self
     */
    protected function offset($offset)
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * limit()
     *
     * Sets a limit argument for the search function.
     * @param int $limit
     * @return self
     */
    protected function limit($limit)
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * search()
     *
     * Does a search request.
     * @param array $query
     * @return \App\Library\XmlRpcResponse
     */
    private function search($query = null)
    {
        if (is_null($query)) {
            $query = $this->wheres;
        }

        $arguments = [$query];

        if (!is_null($this->limit)) {
            $arguments[] = $this->offset;
            $this->offset = 0;

            $arguments[] = $this->limit;
            $this->limit = null;
        } elseif ($this->offset !== 0) {
            $arguments[] = $this->offset;
            $this->offset = 0;
        }

        return $this->call('search', $arguments);
    }

    public function first()
    {
        if (
            count($this->wheres) === 1
            && $this->wheres[0][0] === $this->primaryKey
            && $this->first
        ) {
            $this->first = false;
            $this->data[$this->primaryKey] = $this->wheres[0][2];
            return $this;
        }

        if (
            count($this->wheres) === 1
            && $this->wheres[0][0] === $this->primaryKey
        ) {
            $id = $this->wheres[0][2];
        } else {
            if (!$this->first && !empty($this->data)) {
                return $this->data[0];
            }

            $this->first = false;
            $id = $this->limit(1)->search()->first();
        }

        if (is_object($id)) {
            throw new \App\Exceptions\Erp("Error Processing Request", 1);
        }

        return $this->read((int) $id, func_get_args());
    }

    /**
     * getRouteKeyName()
     *
     * Get the route key for the model.
     * @return string
     */
    public function getRouteKeyName()
    {
        return $this->getKeyName();
    }

    public function getKey()
    {
        return $this->{$this->getKeyName()};
    }

    /**
     * getKeyName()
     *
     * Get the primary key for the model.
     * @return string
     */
    public function getKeyName()
    {
        return $this->primaryKey;
    }

    /**
     * Get the value of the model's route key.
     *
     * @return mixed
     */
    public function getRouteKey()
    {
        return dd($this->getRouteKeyName());
    }

    // Overload methods \\
    /**
     * __isset()
     *
     * Is triggered by calling isset() or empty() on inaccessible properties.
     * @param string $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    /**
     * __set()
     *
     * @return void
     * @author
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * __get()
     *
     * Is utilized for reading data from inaccessible properties.
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        if (is_array($this->data[$name])) {
            return new self($this->object, $this->data[$name]);
        }

        return $this->data[$name];
    }

    // Countable method \\
    /**
     * count()
     *
     * Allows the count function to be used to count the object.
     * @return int
     */
    public function count()
    {
        return count($this->data);
    }

    // Iterator methods \\
    /**
     * current()
     *
     * Return the current element.
     * @return mixed
     */
    public function current()
    {
        $data = current($this->data);

        if (is_array($data)) {
            return new self($this->object, $data);
        }

        return $data;
    }

    /**
     * next()
     *
     * Move forward to next element.
     */
    public function next()
    {
        return next($this->data);
    }

    /**
     * key()
     *
     * Return the key of the current element.
     * @return mxied Returns scalar on success, or NULL on failure.
     */
    public function key()
    {
        return key($this->data);
    }

    /**
     * valid()
     *
     * Checks if current position is valid.
     * @return bool Returns TRUE on success or FALSE on failure.
     */
    public function valid()
    {
        $key = key($this->data);
        return ($key !== NULL && $key !== FALSE);
    }

    /**
     * rewind()
     *
     * Rewind the Iterator to the first element.
     */
    public function rewind()
    {
        return reset($this->data);
    }

    // Other \\
    /**
     * json()
     *
     * Returns the data in json format.
     * @return string
     */
    public function json()
    {
        return json_encode($this->data);
    }

    /**
     * get()
     *
     * Returns the data in the original format.
     * @return array
     */
    public function get()
    {
        return $this->data;
    }

    /**
     * object()
     *
     * Returns the data in object format.
     * @return object
     */
    public function object()
    {
        return json_decode(json_encode($this->data), false);
    }

    /**
     * viewArray()
     *
     * @return array
     */
    public function viewArray()
    {
        $array = [];

        foreach ($this->data as $key => $value) {
            $array[$key] = $this->{$key};
        }

        return $array;
    }
}
