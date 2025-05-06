<?php
namespace App\Services\Dialogue;

enum ResponseKeys : string
{
    case SUCCESS = "success";
    case MESSAGE = "message";
    case DATA = "data";
    case BRAND = "brand";
    case BRANDS = "brands";
}
