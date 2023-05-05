<?php


namespace App\DTO;

use App\Interfaces\DTOInterface;

/**
 * Class ProductDTO
 * @package App\DTO
 */
class ProductDTO implements DTOInterface
{
    /**
     * @var mixed|string
     */
    public string $title;
    public string $description;
    public int $price;
    public $new_price;
    public string $alias;
    public int $category_id;
    public string $full_description;
    public bool $new;
    public bool $active;

    /**
     * ProductDTO constructor.
     * @param $request
     */
    public function __construct($request)
    {
        $this->title = $request['title'];
        $this->description = $request['description'];
        $this->price = $request['price'];
        $this->new_price = isset($request['new_price']) ? $request['new_price'] : null;
        $this->alias = $request['alias'];
        $this->category_id = $request['categories'];
        $this->full_description = $request['full_description'];
        $this->new = isset($request['new']) ? true : false;
        $this->active = isset($request['active']) ? true : false;
    }
}
