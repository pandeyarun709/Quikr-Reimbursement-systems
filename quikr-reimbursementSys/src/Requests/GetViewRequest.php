<?php

namespace App\Requests;

class GetViewRequest extends BaseRequest {

    /**
     * @var int
     */
    protected $managerId;

    /**
     * @var string
     */
    protected $managerStatus="pending";

    /**
     * @var string
     */
    protected $vertical;

    /**
     * @var string
     */
    protected $month = "0";

    /**
     * @var string
     */
    protected $year = "0";

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
     * @return string
     */
    public function getManagerStatus(): string
    {
        return $this->managerStatus;
    }

    /**
     * @param string $managerStatus
     */
    public function setManagerStatus(string $managerStatus): void
    {
        $this->managerStatus = $managerStatus;
    }

    /**
     * @return string
     */
    public function getVertical(): string
    {
        return $this->vertical;
    }

    /**
     * @param string $vertical
     */
    public function setVertical(string $vertical): void
    {
        $this->vertical = $vertical;
    }

    /**
     * @return string
     */
    public function getMonth(): string
    {
        return $this->month;
    }

    /**
     * @param string $month
     */
    public function setMonth(string $month): void
    {
        $this->month = $month;
    }

    /**
     * @return string
     */
    public function getYear(): string
    {
        return $this->year;
    }

    /**
     * @param string $year
     */
    public function setYear(string $year): void
    {
        $this->year = $year;
    }




}


?>


