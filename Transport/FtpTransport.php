<?php

namespace Hexspoor\Transport;

use Hexspoor\Data\Order;
use Hexspoor\Exception\TransportException;

class FtpTransport implements TransportInterface
{
    /** @var string */
    private $server;

    /** @var string */
    private $user;

    /** @var string */
    private $pass;

    /** @var int */
    private $port = 21;

    /** @var int */
    private $timeout = 30;

    /** @var string */
    private $destinationPath = '/';

    /** @var bool */
    private $passive = true;

    /** @var resource */
    private $ftp;

    /**
     * FtpTransport constructor.
     * @param string $server
     * @param string $user
     * @param string $pass
     * @param int $port
     */
    public function __construct($server, $user, $pass)
    {
        $this->server = $server;
        $this->user = $user;
        $this->pass = $pass;
    }

    /**
     * @param int $port
     */
    public function setPort($port=21)
    {
        $this->port = $port;
    }

    /**
     * @param int $timeout
     */
    public function setTimeout($timeout = 30)
    {
        $this->timeout = $timeout;
    }

    /**
     * @param bool $passive
     */
    public function setPassive($passive)
    {
        $this->passive = $passive;
    }

    /**
     * @param string $path
     */
    public function setDestinationPath($path)
    {
        $this->destinationPath = $path;
    }

    public function send($data)
    {
        if ( !is_resource($this->ftp) ) {
            $this->connect();
        }

        $fp = fopen('php://temp','r+');
        if ( !$fp ) {
            throw new TransportException('Failed to create temporary file');
        }

        fputs($fp, $data);
        fseek($fp,0);

        $remoteFile = ltrim($this->destinationPath.'/order-'.(sha1($data)).'.xml','/');

        if ( !ftp_fput($this->ftp, $remoteFile, $fp, FTP_ASCII, 0) ) {
            throw new TransportException('Failed to upload file');
        }

        fclose($fp);
    }

    private function connect()
    {
        $this->ftp = ftp_connect($this->server, $this->port, $this->timeout);
        if (!$this->ftp) {
            throw new TransportException('Failed to connect to server');
        }

        if ( !ftp_login($this->ftp, $this->user, $this->pass) ) {
            throw new TransportException('Failed to login');
        }

        ftp_pasv($this->ftp, $this->passive);
    }
}
