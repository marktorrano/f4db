<?php

namespace App\Library\Graylog;

use Gelf\Logger as GelfLogger;
use Gelf\Publisher as GelfPublisher;
use Gelf\Transport\UdpTransport;
use Illuminate\Http\Request;

/**
 * Client
 */
class Client
{
    /**
     * @access private
     * @var array
     */
    private $context;

    /**
     * __construct()
     *
     * @param array $config
     */
    public function __construct(Request $request, array $config)
    {
        $this->request = $request;
        $transport = new UdpTransport($config['host'], $config['port'], UdpTransport::CHUNK_SIZE_LAN);
        $publisher = new GelfPublisher;
        $publisher->addTransport($transport);
        $this->log = new GelfLogger($publisher, $config['facility']);
    }

    /**
     * setContext()
     *
     * @param array $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * log()
     *
     * Sends a log message
     * @param string $level
     * @param string $message
     * @param array $context
     * @return array
     */
    public function log($level, $message, array $context = [])
    {
        $context = $this->context->build($context);
        $context = array_merge($context['tags'], $context['extra']);

        $request = $this->request;
        $context['url'] = $request->fullUrl();

        if ($route = $request->route()) {
            $action = explode('@', $route->getActionName());

            if (count($action) === 2) {
                $context['controller'] = $action[0];
                $context['action'] = $action[1];
            }
        }

        if ($request) { $context['isAjax'] = $request->ajax(); }
        $context['xmlrpc-connection'] = config('xmlrpc.connection');
        $context['debug'] = config('app.debug');
        $context['environment'] = config('app.env');

        try {
            $log = $this->log->log($level, $message, $context);
        } catch (\Exception $e) {
            //dd($e);
            return;
        }

        return $log;
    }
}
