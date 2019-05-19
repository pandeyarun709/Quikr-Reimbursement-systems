<?php

namespace App\Models;




class User
{

    protected $id;

    protected $empid;

    protected $name;

    protected $email;

    protected $location;

    protected $designation;

    protected $managerName;

    protected $department;

    protected $managerEmail;

    protected $managerId;

    protected $vertical;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmpid()
    {
        return $this->empid;
    }

    /**
     * @param mixed $empid
     */
    public function setEmpid($empid): void
    {
        $this->empid = $empid;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location): void
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @param mixed $designation
     */
    public function setDesignation($designation): void
    {
        $this->designation = $designation;
    }

    /**
     * @return mixed
     */
    public function getManagerName()
    {
        return $this->managerName;
    }

    /**
     * @param mixed $managerName
     */
    public function setManagerName($managerName): void
    {
        $this->managerName = $managerName;
    }

    /**
     * @return mixed
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param mixed $department
     */
    public function setDepartment($department): void
    {
        $this->department = $department;
    }

    /**
     * @return mixed
     */
    public function getManagerEmail()
    {
        return $this->managerEmail;
    }

    /**
     * @param mixed $managerEmail
     */
    public function setManagerEmail($managerEmail): void
    {
        $this->managerEmail = $managerEmail;
    }

    /**
     * @return mixed
     */
    public function getVertical()
    {
        return $this->vertical;
    }

    /**
     * @param mixed $vertical
     */
    public function setVertical($vertical): void
    {
        $this->vertical = $vertical;
    }

    /**
     * @return mixed
     */
    public function getManagerId()
    {
        return $this->managerId;
    }

    /**
     * @param mixed $managerId
     */
    public function setManagerId($managerId): void
    {
        $this->managerId = $managerId;
    }

    /**
     * @return array
     */
    public function getAllProperties(): array {
        return get_object_vars($this);

    }
}
