<?php
class Category
{
    public int $id;
    public string $name;
    public function __construct(
        $id = 0,
        $name = ''
    ) {
        $this->id = $id;
        $this->name = $name;
    }
}

?>