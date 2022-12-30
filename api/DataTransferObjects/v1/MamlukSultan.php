<?php

namespace Api\DataTransferObjects\v1;

use OpenApi\Attributes as OA;

#[OA\Schema()]
class MamlukSultan
{
    public function __construct(

    #[OA\Property(property: 'yearFrom', type: 'integer')]
    public int $yearFrom,

    #[OA\Property(property: 'yearTo', type: 'integer')]
    public int $yearTo,

    #[OA\Property(property: 'name', type: 'string')]
    public string $name
    ) {}

}