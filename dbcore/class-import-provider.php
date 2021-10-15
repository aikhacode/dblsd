<?php
namespace LSD\Migration;

interface ImportInterface
{
    public function import();
}

class Import_From_JSON implements ImportInterface
{
    private $source;

    public function __construct($source)
    {
        $this->source = $source;
    }

    public function import()
    {
        $result = json_decode($this->source);
        return $result;
    }
}


class Import_From_CSV implements ImportInterface
{
    private $source;

    public function __construct($source)
    {
        $this->source = $source;
    }

    public function import()
    {
        return explode(",", $this->source);
    }
}
