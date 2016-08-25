<?php

/**
 * XmlRpc
 *
 * @author Jurjen Beukenhorst <jurjen.beukenhorst@jfs.be>
 * @copyright Copyright (c) Janssens Field Services 2016
 */

namespace App\Library;

/**
 * XmlRpc
 */
class XmlRpc
{
    /**
     * @access private
     * @var \xmlrpc_client
     */
    private $xrClient;

    /**
     * @access private
     * @var \xmlrpcmsg
     */
    private $xrMsg;

    /**
     * @access private
     * @var array
     */
    private static $config;

    /**
     * sendNewXRCall()
     *
     * Boots the XML-RPC system with a specifc method.
     * @param string $methodName
     * @return bool
     */
    public function sendNewXRCall($methodName)
    {
        if (is_null(self::$config)) {
            $connection = config('xmlrpc.connection');
            self::$config = config("xmlrpc.$connection");
        }

        $this->xrClient = new \PhpXmlRpc\Client(
            '/xmlrpc/object', self::$config['url'], self::$config['port']
        );
        $this->xrMsg = new \PhpXmlRpc\Request($methodName);
        $this->encoder = new \PhpXmlRpc\Encoder;

        return true;
    }

    /**
     * addXRParam()
     *
     * Adds a parameter to the XML-RPC system.
     * @param mixed $paramter
     * @return bool
     */
    public function addXRParam($parameter)
    {
        return $this->xrMsg->addParam($this->encoder->encode($parameter));
    }

    /**
     * sendXR()
     *
     * Sends the data trough.
     * @throws App\Exceptions\Erp
     * @return \App\Library\XmlRpcResponse
     */
    public function sendXR()
    {
        $resp = $this->xrClient->send($this->xrMsg);

        if ($resp->faultCode()) {
            throw new \App\Exceptions\Erp($resp->faultString(), $resp->faultCode());
        }

        $result = $resp->value();
        $result = $this->encoder->decode($result);
        //$result = $this->encodeResult($result);
        return $result;
    }

    /**
     * sendXRCallToJFS()
     *
     * Sends a XML-RPC call to the JFS api.
     * @return array
     */
    public function sendXRCallToJFS()
    {
        if(func_num_args() < 1) return false;

        $args = func_get_args();

        $this->sendNewXRCall('execute');

        // Add the database
        $this->addXRParam(self::$config['database']);

        // Add user details
        if (is_int($args[0]) && func_num_args() > 2) {
            $loginUid = array_shift($args);
            $loginPass = array_shift($args);
        } else {
            $loginUid = 2382;
            $loginPass = 'tambayan';
        }

        $this->addXRParam($loginUid);
        $this->addXRParam($loginPass);

        // The method
        $methodFunction = array_shift($args);

        if (is_array($methodFunction)) {
            $this->addXRParam($methodFunction[0]);
            $this->addXRParam($methodFunction[1]);
        } else {
            $this->addXRParam('jfs.aybabtu.webclient');
            $this->addXRParam($methodFunction);
        }

        // Add optionals
        foreach ($args as $arg) {
            $this->addXRParam($arg);
        }

        // Send the stuff
        return $this->sendXR();
    }

    /**
     * encodeResult()
     *
     * @param array $array
     * @return array
     */
    private function encodeResult(array $array)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = $this->encodeResult($value);
            } elseif (is_string($value)) {
                $array[$key] = utf8_encode($value);
            }
        }

        return $array;
    }
}
