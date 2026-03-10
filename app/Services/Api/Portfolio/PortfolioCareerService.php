<?php

namespace App\Services\Api\Portfolio;

use App\Repositories\Api\Portfolio\PortfolioCareerRepository;

class PortfolioCareerService
{
    public function __construct(protected PortfolioCareerRepository $careerRepository)
    {
    }

    public function experiences()
    {
        return $this->careerRepository->experiences();
    }

    public function skills()
    {
        return $this->careerRepository->skills();
    }

    public function events()
    {
        return $this->careerRepository->events();
    }

    public function testimonials()
    {
        return $this->careerRepository->testimonials();
    }
}
