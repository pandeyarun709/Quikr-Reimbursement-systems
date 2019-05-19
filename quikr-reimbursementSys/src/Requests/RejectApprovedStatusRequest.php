<?php

namespace App\Requests;


class RejectApprovedStatusRequest extends BaseRequest {

    /**
     * @var int
     */
    protected $updaterId;

    /**
     * @var int
     */
    protected $updaterName;

    /**
     * @var int
     */
    protected $udpaterEmail;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var int
     */
    protected $empId;

    /**
     * @var int
     */
    protected $formId;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string|null
     */
    protected $comment;

    /**
     * @return int
     */
    public function getUpdaterId(): int
    {
        return $this->updaterId;
    }

    /**
     * @param int $updaterId
     */
    public function setUpdaterId(int $updaterId): void
    {
        $this->updaterId = $updaterId;
    }

    /**
     * @return int
     */
    public function getUpdaterName(): int
    {
        return $this->updaterName;
    }

    /**
     * @param int $updaterName
     */
    public function setUpdaterName(int $updaterName): void
    {
        $this->updaterName = $updaterName;
    }

    /**
     * @return int
     */
    public function getUdpaterEmail(): int
    {
        return $this->udpaterEmail;
    }

    /**
     * @param int $udpaterEmail
     */
    public function setUdpaterEmail(int $udpaterEmail): void
    {
        $this->udpaterEmail = $udpaterEmail;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getEmpId(): int
    {
        return $this->empId;
    }

    /**
     * @param int $empId
     */
    public function setEmpId(int $empId): void
    {
        $this->empId = $empId;
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
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     */
    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }
}


?>