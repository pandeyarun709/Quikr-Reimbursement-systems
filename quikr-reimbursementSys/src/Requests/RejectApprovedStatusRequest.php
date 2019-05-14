<?php

namespace App\Requests;


class RejectApprovedStatusRequest extends BaseRequest {

    /**
     * @var int
     */
    protected $managerId;

    /**
     * @var int
     */
    protected $financeId;

    /**
     * @var int
     */
    protected $formId;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $comment;

    /**
     * @return int
     */
    public function getManagerId(): int
    {
        return $this->managerId;
    }

    /**
     * @param int $managerId
     */
    public function setManagerId(int $managerId): void
    {
        $this->managerId = $managerId;
    }

    /**
     * @return int
     */
    public function getFinanceId(): int
    {
        return $this->financeId;
    }

    /**
     * @param int $financeId
     */
    public function setFinanceId(int $financeId): void
    {
        $this->financeId = $financeId;
    }


    /**
     * @return int
     */
    public function getFormId(): int
    {
        return $this->formId;
    }

    /**
     * @param int $formId
     */
    public function setFormId(int $formId): void
    {
        $this->formId = $formId;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }


}


?>