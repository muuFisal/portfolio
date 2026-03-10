<?php

namespace App\Services\Api\Portfolio;

use App\Repositories\Api\Portfolio\PortfolioCareerRepository;
use App\Repositories\Api\Portfolio\PortfolioContentRepository;
use App\Repositories\Api\Portfolio\PortfolioProjectRepository;

class PortfolioContentService
{
    public function __construct(
        protected PortfolioContentRepository $contentRepository,
        protected PortfolioCareerRepository $careerRepository,
        protected PortfolioProjectRepository $projectRepository,
    ) {
    }

    public function settings()
    {
        return $this->contentRepository->getSettings();
    }

    public function navigation()
    {
        return $this->contentRepository->getNavigation();
    }

    public function seoPage(string $pageKey)
    {
        return $this->contentRepository->getSeoPage($pageKey);
    }

    public function profile()
    {
        return $this->contentRepository->getProfile();
    }

    public function about(): array
    {
        return [
            'profile' => $this->contentRepository->getProfile(),
            'section' => $this->contentRepository->getSection('about'),
            'highlights' => $this->contentRepository->getAchievements(),
        ];
    }

    public function hero(): array
    {
        return [
            'profile' => $this->contentRepository->getProfile(),
            'settings' => $this->contentRepository->getSettings(),
            'section' => $this->contentRepository->getSection('home.hero'),
        ];
    }

    public function highlights(): array
    {
        return [
            'section' => $this->contentRepository->getSection('home.highlights'),
            'items' => $this->contentRepository->getAchievements(),
        ];
    }

    public function featuredProjects(): array
    {
        return [
            'section' => $this->contentRepository->getSection('home.featured_projects'),
            'items' => $this->projectRepository->featured(),
        ];
    }

    public function process(): array
    {
        return [
            'section' => $this->contentRepository->getSection('home.process'),
        ];
    }

    public function skillsShowcase(): array
    {
        return [
            'section' => $this->contentRepository->getSection('home.skills_showcase'),
            'items' => $this->careerRepository->skills(true),
        ];
    }

    public function openSource(): array
    {
        return [
            'section' => $this->contentRepository->getSection('home.open_source'),
        ];
    }

    public function contactInfo(): array
    {
        return [
            'profile' => $this->contentRepository->getProfile(),
            'settings' => $this->contentRepository->getSettings(),
            'section' => $this->contentRepository->getSection('contact.info'),
        ];
    }
}
