<?php

class Serial
{
    private string $serial;

    /**
     * Construct
     * @param string $serial It is Uuid v4
     */
    public function __construct(string $serial)
    {
       if($this->checkValid($serial))
       {
            $this->serial = $serial;
       }else{
            throw new Exception("Invalid Serial number");
       }
    }

    /**
     * UUIDv4 generation and return Serial object
     * @return Serial
     */
    static function generate() :self
    {
        $bytes = random_bytes(16);

        $bytes[6] = chr(ord($bytes[6]) & 0x0f | 0x40);
        $bytes[8] = chr(ord($bytes[8]) & 0x3f | 0x80);

        $serial = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($bytes), 4));

        return new self($serial);
    }

    static private function checkValid(string $serial)
    {   
        $pattern = '/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i';
        return preg_match($pattern, $serial);
    }

    /**
     * Get the value of serial
     *
     * @return string
     */
    public function getSerial(): string
    {
        return $this->serial;
    }
}


