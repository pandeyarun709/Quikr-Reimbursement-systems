<?php

namespace App\Requests;

class AddExpenseRequest extends  BaseRequest {

    /**
     * @var  int
     */
    protected $empId;

    /**
     * @var string
     */
    protected $empName;

    /**
     * @var double
     */
    protected $totalExp;

    /**
     * @var Tasks[]
     */
    protected $tasks = array();

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
     * @return string
     */
    public function getEmpName(): string
    {
        return $this->empName;
    }

    /**
     * @param string $empName
     */
    public function setEmpName(string $empName): void
    {
        $this->empName = $empName;
    }

    /**
     * @return float
     */
    public function getTotalExp(): float
    {
        return $this->totalExp;
    }

    /**
     * @param float $totalExp
     */
    public function setTotalExp(float $totalExp): void
    {
        $this->totalExp = $totalExp;
    }

    /**
     * @return Tasks[]
     */
    public function getTasks(): array
    {
        return $this->tasks;
    }

    /**
     * @param Tasks[] $tasks
     */
    public function setTasks(array $tasks): void
    {
        $this->tasks[] = $tasks;
    }


}

?>



