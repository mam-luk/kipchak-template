<?php

namespace Api\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;
use OpenApi\Attributes as OA;


 #[OA\Schema()]
class MamlukSultan extends DataTransferObject
{
    #[OA\Property(property: 'yearFrom', type: 'integer')]
    #[NumberBetween(1250, 1500)]
    public int $yearFrom;

    #[OA\Property(property: 'yearTo', type: 'integer')]
    #[NumberBetween(1250, 1500)]
    public int $yearTo;

    #[OA\Property(property: 'name', type: 'string')]
    public string $name;

}