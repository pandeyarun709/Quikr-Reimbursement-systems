<?php

namespace App\Requests;

class FormRequest extends BaseRequest {

    /**
     * @var int
     */
    protected $id;

    /**
     * @var
     */
    protected $toFetch;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getToFetch()
    {
        return $this->toFetch;
    }

    /**
     * @param mixed $toFetch
     */
    public function setToFetch($toFetch): void
    {
        $this->toFetch = $toFetch;
    }


}

?>