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
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $vertical;

    /**
     * @var string
     */
    protected $department;

    /**
     * @var string
     */
    protected $designation;

    /**
     * @var int
     */
    protected $managerId;

    /**
     * @var string
     */
    protected $managerName;

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
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
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
    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @param string $department
     */
    public function setDepartment(string $department): void
    {
        $this->department = $department;
    }

    /**
     * @return string
     */
    public function getDesignation(): string
    {
        return $this->designation;
    }

    /**
     * @param string $designation
     */
    public function setDesignation(string $designation): void
    {
        $this->designation = $designation;
    }

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
    public function getManagerName(): string
    {
        return $this->managerName;
    }

    /**
     * @param string $managerName
     */
    public function setManagerName(string $managerName): void
    {
        $this->managerName = $managerName;
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



