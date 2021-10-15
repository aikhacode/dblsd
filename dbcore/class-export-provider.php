<?php
namespace LSD\Migration;

interface ExportInterface
{
    public function export();
}

class Export_To_JSON implements ExportInterface
{
    private $source;

    public function __construct($source)
    {
        $this->source = $source;
    }

    public function export()
    {
        $result = "JSON : " . json_encode($this->source);
        return $result;
    }
}

class Export_To_CSV implements ExportInterface
{
    private $source;

    public function __construct($source)
    {
        $this->source = $source;
    }

    public function export()
    {
        $result = "CSV : " . json_encode($this->source);
        return $result;
    }
}
