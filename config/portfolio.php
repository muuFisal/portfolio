<?php

return [
    'editable_sections' => [
        'about' => [
            'label_key' => 'portfolio-about',
            'description_key' => 'portfolio-about-description',
            'group' => 'core',
            'permission_view' => 'portfolio_about_view',
            'permission_update' => 'portfolio_about_update',
        ],
        'home.hero' => [
            'label_key' => 'portfolio-hero-section',
            'description_key' => 'portfolio-hero-description',
            'group' => 'home',
            'permission_view' => 'portfolio_home_sections_view',
            'permission_update' => 'portfolio_home_sections_update',
        ],
        'home.highlights' => [
            'label_key' => 'portfolio-highlights-section',
            'description_key' => 'portfolio-highlights-description',
            'group' => 'home',
            'permission_view' => 'portfolio_home_sections_view',
            'permission_update' => 'portfolio_home_sections_update',
        ],
        'home.featured_projects' => [
            'label_key' => 'portfolio-featured-projects-section',
            'description_key' => 'portfolio-featured-projects-description',
            'group' => 'home',
            'permission_view' => 'portfolio_home_sections_view',
            'permission_update' => 'portfolio_home_sections_update',
        ],
        'home.process' => [
            'label_key' => 'portfolio-process-section',
            'description_key' => 'portfolio-process-description',
            'group' => 'home',
            'permission_view' => 'portfolio_home_sections_view',
            'permission_update' => 'portfolio_home_sections_update',
        ],
        'home.skills_showcase' => [
            'label_key' => 'portfolio-skills-showcase-section',
            'description_key' => 'portfolio-skills-showcase-description',
            'group' => 'home',
            'permission_view' => 'portfolio_home_sections_view',
            'permission_update' => 'portfolio_home_sections_update',
        ],
        'home.open_source' => [
            'label_key' => 'portfolio-open-source-section',
            'description_key' => 'portfolio-open-source-description',
            'group' => 'home',
            'permission_view' => 'portfolio_home_sections_view',
            'permission_update' => 'portfolio_home_sections_update',
        ],
        'contact.info' => [
            'label_key' => 'portfolio-contact-info-section',
            'description_key' => 'portfolio-contact-info-description',
            'group' => 'core',
            'permission_view' => 'portfolio_home_sections_view',
            'permission_update' => 'portfolio_home_sections_update',
        ],
    ],
    'home_sections' => [
        'home.hero',
        'home.highlights',
        'home.featured_projects',
        'home.process',
        'home.skills_showcase',
        'home.open_source',
    ],
    'comment_statuses' => [
        'pending',
        'approved',
        'rejected',
    ],
    'contact_statuses' => [
        'new',
        'read',
        'replied',
        'archived',
    ],
    'seo_robots' => [
        'index,follow',
        'index,nofollow',
        'noindex,follow',
        'noindex,nofollow',
    ],
    'project_categories' => [
        'web',
        'fintech',
        'open-source',
    ],
];
