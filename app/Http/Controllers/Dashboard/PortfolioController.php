<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\ContactMessage;
use App\Models\Event;
use App\Models\Experience;
use App\Models\PortfolioComment;
use App\Models\PortfolioNavLink;
use App\Models\PortfolioPage;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;

class PortfolioController extends Controller
{
    public function settings()
    {
        return view('dashboard.portfolio.settings.index');
    }

    public function profile()
    {
        return view('dashboard.portfolio.profile.index');
    }

    public function about()
    {
        return view('dashboard.portfolio.about.index', [
            'sectionKey' => 'about',
            'sectionMeta' => config('portfolio.editable_sections.about'),
        ]);
    }

    public function sections()
    {
        return view('dashboard.portfolio.sections.index', [
            'sections' => collect(config('portfolio.home_sections'))
                ->mapWithKeys(fn (string $key) => [$key => config('portfolio.editable_sections.' . $key)])
                ->all(),
            'contactSection' => config('portfolio.editable_sections.contact.info'),
        ]);
    }

    public function editSection(string $key)
    {
        $sectionMeta = config('portfolio.editable_sections.' . $key);
        abort_unless($sectionMeta, 404);

        return view('dashboard.portfolio.sections.edit', [
            'sectionKey' => $key,
            'sectionMeta' => $sectionMeta,
        ]);
    }

    public function navigation()
    {
        return view('dashboard.portfolio.navigation.index');
    }

    public function createNavigation()
    {
        return view('dashboard.portfolio.navigation.form', [
            'link' => null,
        ]);
    }

    public function editNavigation(PortfolioNavLink $link)
    {
        return view('dashboard.portfolio.navigation.form', compact('link'));
    }

    public function seoPages()
    {
        return view('dashboard.portfolio.seo.index');
    }

    public function createSeoPage()
    {
        return view('dashboard.portfolio.seo.form', [
            'page' => null,
        ]);
    }

    public function editSeoPage(PortfolioPage $page)
    {
        return view('dashboard.portfolio.seo.form', compact('page'));
    }

    public function projects()
    {
        return view('dashboard.portfolio.projects.index');
    }

    public function createProject()
    {
        return view('dashboard.portfolio.projects.form', [
            'project' => null,
        ]);
    }

    public function editProject(Project $project)
    {
        return view('dashboard.portfolio.projects.form', compact('project'));
    }

    public function showProject(Project $project)
    {
        $project->load('images');

        return view('dashboard.portfolio.projects.show', compact('project'));
    }

    public function achievements()
    {
        return view('dashboard.portfolio.achievements.index');
    }

    public function createAchievement()
    {
        return view('dashboard.portfolio.achievements.form', [
            'achievement' => null,
        ]);
    }

    public function editAchievement(Achievement $achievement)
    {
        return view('dashboard.portfolio.achievements.form', compact('achievement'));
    }

    public function experiences()
    {
        return view('dashboard.portfolio.experiences.index');
    }

    public function createExperience()
    {
        return view('dashboard.portfolio.experiences.form', [
            'experience' => null,
        ]);
    }

    public function editExperience(Experience $experience)
    {
        return view('dashboard.portfolio.experiences.form', compact('experience'));
    }

    public function skills()
    {
        return view('dashboard.portfolio.skills.index');
    }

    public function createSkill()
    {
        return view('dashboard.portfolio.skills.form', [
            'skill' => null,
        ]);
    }

    public function editSkill(Skill $skill)
    {
        return view('dashboard.portfolio.skills.form', compact('skill'));
    }

    public function events()
    {
        return view('dashboard.portfolio.events.index');
    }

    public function createEvent()
    {
        return view('dashboard.portfolio.events.form', [
            'event' => null,
        ]);
    }

    public function editEvent(Event $event)
    {
        return view('dashboard.portfolio.events.form', compact('event'));
    }

    public function testimonials()
    {
        return view('dashboard.portfolio.testimonials.index');
    }

    public function createTestimonial()
    {
        return view('dashboard.portfolio.testimonials.form', [
            'testimonial' => null,
        ]);
    }

    public function editTestimonial(Testimonial $testimonial)
    {
        return view('dashboard.portfolio.testimonials.form', compact('testimonial'));
    }

    public function comments()
    {
        return view('dashboard.portfolio.comments.index');
    }

    public function showComment(int $id)
    {
        $comment = PortfolioComment::query()->withTrashed()->findOrFail($id);

        return view('dashboard.portfolio.comments.show', compact('comment'));
    }

    public function contacts()
    {
        return view('dashboard.portfolio.contacts.index');
    }

    public function showContact(ContactMessage $contact)
    {
        return view('dashboard.portfolio.contacts.show', compact('contact'));
    }
}
