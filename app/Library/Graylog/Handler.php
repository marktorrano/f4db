<?php

namespace App\Library\Graylog;

use Psr\Log\AbstractLogger;

/**
 * Handler
 */
class Handler extends AbstractLogger
{
    /**
     * @access private
     * @var Client
     */
    protected $graylog;

    /**
     * __construct()
     *
     * @param Client $graylog
     * @param ContextBuilder $context
     */
    public function __construct(Client $graylog, ContextBuilder $context)
    {
        $this->graylog = $graylog;

        $this->graylog->setContext($context);
    }

    /**
     * log()
     *
     * @param string $level
     * @param string $message
     * @param array $context
     * @return array
     */
    public function log($level, $message, array $context = [])
    {
        return $this->graylog->log($level, $message, $context);
    }
}
