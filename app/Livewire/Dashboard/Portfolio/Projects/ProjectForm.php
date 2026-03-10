<?php

namespace App\Livewire\Dashboard\Portfolio\Projects;

use App\Livewire\Dashboard\Portfolio\BasePortfolioForm;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Validation\Rule;
use Livewire\TemporaryUploadedFile;

class ProjectForm extends BasePortfolioForm
{
    public Project $project;

    public $slug;
    public $title_ar;
    public $title_en;
    public $summary_ar;
    public $summary_en;
    public $description_ar;
    public $description_en;
    public $category;
    public $featured = false;
    public $is_open_source = false;
    public $tags_text;
    public $stack_text;
    public $highlights_ar;
    public $highlights_en;
    public $challenges_ar;
    public $challenges_en;
    public $solutions_ar;
    public $solutions_en;
    public array $metricsRows = [];
    public $cover_image;
    public $og_image;
    public $web_url;
    public $google_play_url;
    public $app_store_url;
    public $repository_url;
    public $case_study_url;
    public $client_name;
    public $project_date;
    public $seo_title_ar;
    public $seo_title_en;
    public $seo_description_ar;
    public $seo_description_en;
    public $seo_keywords_text;
    public $sort_order = 0;

    public array $galleryRows = [];
    public array $removedGalleryImageIds = [];
    public array $new_gallery_images = [];

    public function mount(?Project $project = null): void
    {
        $this->project = $project?->load('images') ?? new Project();
        $this->slug = $this->project->slug;
        $this->title_ar = $this->translationValue($this->project->title, 'ar');
        $this->title_en = $this->translationValue($this->project->title, 'en');
        $this->summary_ar = $this->translationValue($this->project->summary, 'ar');
        $this->summary_en = $this->translationValue($this->project->summary, 'en');
        $this->description_ar = $this->translationValue($this->project->description, 'ar');
        $this->description_en = $this->translationValue($this->project->description, 'en');
        $this->category = $this->project->category;
        $this->featured = (bool) ($this->project->featured ?? false);
        $this->is_open_source = (bool) ($this->project->is_open_source ?? false);
        $this->tags_text = $this->commaSeparatedToText($this->project->tags);
        $this->stack_text = $this->commaSeparatedToText($this->project->stack);
        $this->highlights_ar = $this->translatedLinesToText($this->project->highlights, 'ar');
        $this->highlights_en = $this->translatedLinesToText($this->project->highlights, 'en');
        $this->challenges_ar = $this->translatedLinesToText($this->project->challenges, 'ar');
        $this->challenges_en = $this->translatedLinesToText($this->project->challenges, 'en');
        $this->solutions_ar = $this->translatedLinesToText($this->project->solutions, 'ar');
        $this->solutions_en = $this->translatedLinesToText($this->project->solutions, 'en');
        $this->metricsRows = $this->translatedRowsForForm($this->project->metrics, ['label'], ['value']);
        $this->cover_image = $this->project->cover_image;
        $this->og_image = $this->project->og_image;
        $this->web_url = $this->project->web_url;
        $this->google_play_url = $this->project->google_play_url;
        $this->app_store_url = $this->project->app_store_url;
        $this->repository_url = $this->project->repository_url;
        $this->case_study_url = $this->project->case_study_url;
        $this->client_name = $this->project->client_name;
        $this->project_date = optional($this->project->project_date)->format('Y-m-d');
        $this->seo_title_ar = $this->translationValue($this->project->seo_title, 'ar');
        $this->seo_title_en = $this->translationValue($this->project->seo_title, 'en');
        $this->seo_description_ar = $this->translationValue($this->project->seo_description, 'ar');
        $this->seo_description_en = $this->translationValue($this->project->seo_description, 'en');
        $this->seo_keywords_text = $this->commaSeparatedToText($this->project->seo_keywords);
        $this->sort_order = $this->project->sort_order ?? 0;

        $this->galleryRows = collect($this->project->images ?? [])
            ->map(fn (ProjectImage $image) => [
                'id' => $image->id,
                'image' => $image->image,
                'alt_text_ar' => $this->translationValue($image->alt_text, 'ar'),
                'alt_text_en' => $this->translationValue($image->alt_text, 'en'),
                'sort_order' => $image->sort_order ?? 0,
            ])
            ->values()
            ->all();
    }

    public function rules(): array
    {
        return [
            'slug' => ['required', 'string', 'max:255', Rule::unique('projects', 'slug')->ignore($this->project->id)],
            'title_ar' => ['required', 'string', 'max:255'],
            'title_en' => ['required', 'string', 'max:255'],
            'summary_ar' => ['required', 'string'],
            'summary_en' => ['required', 'string'],
            'description_ar' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'category' => ['nullable', 'string', 'max:100'],
            'featured' => ['boolean'],
            'is_open_source' => ['boolean'],
            'tags_text' => ['nullable', 'string'],
            'stack_text' => ['nullable', 'string'],
            'highlights_ar' => ['nullable', 'string'],
            'highlights_en' => ['nullable', 'string'],
            'challenges_ar' => ['nullable', 'string'],
            'challenges_en' => ['nullable', 'string'],
            'solutions_ar' => ['nullable', 'string'],
            'solutions_en' => ['nullable', 'string'],
            'metricsRows.*.label_ar' => ['nullable', 'string', 'max:255'],
            'metricsRows.*.label_en' => ['nullable', 'string', 'max:255'],
            'metricsRows.*.value' => ['nullable', 'string', 'max:255'],
            'cover_image' => $this->cover_image instanceof TemporaryUploadedFile ? ['nullable', 'image', 'max:4096'] : ['nullable'],
            'og_image' => $this->og_image instanceof TemporaryUploadedFile ? ['nullable', 'image', 'max:4096'] : ['nullable'],
            'web_url' => ['nullable', 'url'],
            'google_play_url' => ['nullable', 'url'],
            'app_store_url' => ['nullable', 'url'],
            'repository_url' => ['nullable', 'url'],
            'case_study_url' => ['nullable', 'url'],
            'client_name' => ['nullable', 'string', 'max:255'],
            'project_date' => ['nullable', 'date'],
            'seo_title_ar' => ['nullable', 'string', 'max:255'],
            'seo_title_en' => ['nullable', 'string', 'max:255'],
            'seo_description_ar' => ['nullable', 'string'],
            'seo_description_en' => ['nullable', 'string'],
            'seo_keywords_text' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'galleryRows.*.alt_text_ar' => ['nullable', 'string', 'max:255'],
            'galleryRows.*.alt_text_en' => ['nullable', 'string', 'max:255'],
            'galleryRows.*.sort_order' => ['nullable', 'integer', 'min:0'],
            'new_gallery_images.*' => ['nullable', 'image', 'max:4096'],
        ];
    }

    public function addMetricRow(): void
    {
        $this->metricsRows[] = [];
    }

    public function removeMetricRow(int $index): void
    {
        unset($this->metricsRows[$index]);
        $this->metricsRows = array_values($this->metricsRows);
    }

    public function removeGalleryRow(int $index): void
    {
        $row = $this->galleryRows[$index] ?? null;
        if ($row && ! empty($row['id'])) {
            $this->removedGalleryImageIds[] = $row['id'];
        }

        unset($this->galleryRows[$index]);
        $this->galleryRows = array_values($this->galleryRows);
    }

    public function submit(): void
    {
        $this->authorizeDashboardPermission($this->project->exists ? 'portfolio_projects_update' : 'portfolio_projects_create');

        $data = $this->validate();

        $this->project->cover_image = $this->storeImage($this->cover_image, $this->project->cover_image, 'uploads/portfolio/projects');
        $this->project->og_image = $this->storeImage($this->og_image, $this->project->og_image, 'uploads/portfolio/projects');
        $this->project->fill([
            'slug' => $data['slug'],
            'title' => $this->toTranslation($data['title_ar'], $data['title_en']),
            'summary' => $this->toTranslation($data['summary_ar'], $data['summary_en']),
            'description' => $this->toTranslation($data['description_ar'] ?? '', $data['description_en'] ?? '', true),
            'category' => $data['category'] ?? null,
            'featured' => (bool) $data['featured'],
            'is_open_source' => (bool) $data['is_open_source'],
            'tags' => $this->commaSeparated($data['tags_text'] ?? null),
            'stack' => $this->commaSeparated($data['stack_text'] ?? null),
            'highlights' => $this->translatedLines($data['highlights_ar'] ?? null, $data['highlights_en'] ?? null),
            'challenges' => $this->translatedLines($data['challenges_ar'] ?? null, $data['challenges_en'] ?? null),
            'solutions' => $this->translatedLines($data['solutions_ar'] ?? null, $data['solutions_en'] ?? null),
            'metrics' => $this->translatedRows($this->metricsRows, ['label'], ['value']),
            'web_url' => $data['web_url'] ?? null,
            'google_play_url' => $data['google_play_url'] ?? null,
            'app_store_url' => $data['app_store_url'] ?? null,
            'repository_url' => $data['repository_url'] ?? null,
            'case_study_url' => $data['case_study_url'] ?? null,
            'client_name' => $data['client_name'] ?? null,
            'project_date' => $data['project_date'] ?? null,
            'seo_title' => $this->toTranslation($data['seo_title_ar'] ?? '', $data['seo_title_en'] ?? '', true),
            'seo_description' => $this->toTranslation($data['seo_description_ar'] ?? '', $data['seo_description_en'] ?? '', true),
            'seo_keywords' => $this->commaSeparated($data['seo_keywords_text'] ?? null),
            'sort_order' => (int) ($data['sort_order'] ?? 0),
        ]);

        $this->project->save();

        $this->syncGalleryImages();
        $this->notifySuccess($this->project->wasRecentlyCreated ? __('dashboard.add-successfully') : __('dashboard.update-successfully'));
    }

    protected function syncGalleryImages(): void
    {
        if ($this->removedGalleryImageIds !== []) {
            $images = ProjectImage::query()
                ->where('project_id', $this->project->id)
                ->whereIn('id', $this->removedGalleryImageIds)
                ->get();

            foreach ($images as $image) {
                $this->imageManager->deleteImage($image->image);
                $image->delete();
            }
        }

        foreach ($this->galleryRows as $row) {
            if (empty($row['id'])) {
                continue;
            }

            ProjectImage::query()
                ->where('project_id', $this->project->id)
                ->whereKey($row['id'])
                ->update([
                    'alt_text' => $this->toTranslation($row['alt_text_ar'] ?? '', $row['alt_text_en'] ?? '', true),
                    'sort_order' => (int) ($row['sort_order'] ?? 0),
                ]);
        }

        $startSort = (int) ProjectImage::query()->where('project_id', $this->project->id)->max('sort_order');

        foreach ($this->new_gallery_images as $index => $image) {
            if (! $image instanceof TemporaryUploadedFile) {
                continue;
            }

            ProjectImage::query()->create([
                'project_id' => $this->project->id,
                'image' => $this->imageManager->uploadImage('uploads/portfolio/projects/gallery', $image, 'public'),
                'alt_text' => $this->toTranslation(
                    ($this->title_ar ?: $this->slug) . ' gallery',
                    ($this->title_en ?: $this->slug) . ' gallery'
                ),
                'sort_order' => $startSort + $index + 10,
            ]);
        }

        $this->new_gallery_images = [];
        $this->removedGalleryImageIds = [];
        $this->project->load('images');
        $this->galleryRows = collect($this->project->images)
            ->map(fn (ProjectImage $image) => [
                'id' => $image->id,
                'image' => $image->image,
                'alt_text_ar' => $this->translationValue($image->alt_text, 'ar'),
                'alt_text_en' => $this->translationValue($image->alt_text, 'en'),
                'sort_order' => $image->sort_order ?? 0,
            ])
            ->values()
            ->all();
    }

    public function render()
    {
        return view('dashboard.portfolio.projects.project-form');
    }
}
