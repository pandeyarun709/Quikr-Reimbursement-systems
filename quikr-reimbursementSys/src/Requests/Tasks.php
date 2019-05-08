<?php

namespace App\Requests;

class Tasks extends BaseRequest {

    /**
     * @var double
     */
    protected $airFare;

    /**
     * @var double
     */
    protected $roadFare;

    /**
     * @var double
     */
    protected $petrol;

    /**
     * @var double
     */
    protected $telephoneExp;

    /**
     * @var double
     */
    protected $hotelStay;

    /**
     * @var double
     */
    protected $businessMeal;

    /**
     * @var double
     */
    protected $miscelleneous;

    /**
     * @var double
     */
    protected $totalExp;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $startDate;

    /**
     * @var string
     */
    protected $endDate;

    /**
     * @var array
     */
    protected $imageUrls =array();

    /**
     * @return float
     */
    public function getAirFare(): float
    {
        return $this->airFare;
    }

    /**
     * @param float $airFare
     */
    public function setAirFare(float $airFare): void
    {
        $this->airFare = $airFare;
    }

    /**
     * @return float
     */
    public function getRoadFare(): float
    {
        return $this->roadFare;
    }

    /**
     * @param float $roadFare
     */
    public function setRoadFare(float $roadFare): void
    {
        $this->roadFare = $roadFare;
    }

    /**
     * @return float
     */
    public function getPetrol(): float
    {
        return $this->petrol;
    }

    /**
     * @param float $petrol
     */
    public function setPetrol(float $petrol): void
    {
        $this->petrol = $petrol;
    }

    /**
     * @return float
     */
    public function getTelephoneExp(): float
    {
        return $this->telephoneExp;
    }

    /**
     * @param float $telephoneExp
     */
    public function setTelephoneExp(float $telephoneExp): void
    {
        $this->telephoneExp = $telephoneExp;
    }

    /**
     * @return float
     */
    public function getHotelStay(): float
    {
        return $this->hotelStay;
    }

    /**
     * @param float $hotelStay
     */
    public function setHotelStay(float $hotelStay): void
    {
        $this->hotelStay = $hotelStay;
    }

    /**
     * @return float
     */
    public function getBusinessMeal(): float
    {
        return $this->businessMeal;
    }

    /**
     * @param float $businessMeal
     */
    public function setBusinessMeal(float $businessMeal): void
    {
        $this->businessMeal = $businessMeal;
    }

    /**
     * @return float
     */
    public function getMiscelleneous(): float
    {
        return $this->miscelleneous;
    }

    /**
     * @param float $miscelleneous
     */
    public function setMiscelleneous(float $miscelleneous): void
    {
        $this->miscelleneous = $miscelleneous;
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
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * @param string $startDate
     */
    public function setStartDate(string $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->endDate;
    }

    /**
     * @param string $endDate
     */
    public function setEndDate(string $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return array
     */
    public function getImageUrls(): array
    {
        return $this->imageUrls;
    }

    /**
     * @param array $imageUrls
     */
    public function setImageUrls(array $imageUrls): void
    {
        $this->imageUrls = $imageUrls;
    }


}


?>


