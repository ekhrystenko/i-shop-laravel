<?php


namespace App\DTO;

use App\Interfaces\DTOInterface;

/**
 * Class CategoryDTO
 * @package App\DTO
 */
class CategoryDTO implements DTOInterface
{
    /**
     * @var mixed|string
     */
    public string $title;
    public string $alias;
    public bool $active;

    /**
     * CategoryDTO constructor.
     * @param $request
     */
    public function __construct($request)
    {
        $this->title = $request['title'];
        $this->alias = $request['alias'];
        $this->active = isset($request['active']) ? true : false;
    }
}
