<?php

namespace App\Livewire\Dashboard\Portfolio\Comments;

use App\Livewire\Dashboard\Portfolio\BasePortfolioTable;
use App\Models\PortfolioComment;
use App\Utils\ImageManger;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CommentData extends BasePortfolioTable
{
    protected function query(): Builder
    {
        return PortfolioComment::query()->latest();
    }

    protected function viewName(): string
    {
        return 'dashboard.portfolio.comments.comment-data';
    }

    protected function resolveRecord(int $id): Model
    {
        return PortfolioComment::query()->findOrFail($id);
    }

    protected function deletePermission(): string
    {
        return 'portfolio_comments_delete';
    }

    protected function searchColumns(): array
    {
        return ['name', 'email', 'role', 'comment', 'source', 'status'];
    }

    public function updateStatus(int $id, string $status): void
    {
        $this->authorizeDashboardPermission('portfolio_comments_moderate');

        $comment = PortfolioComment::query()->findOrFail($id);
        $comment->status = $status;
        $comment->approved_at = $status === 'approved' ? now() : null;
        $comment->save();

        $this->notifySuccess(__('dashboard.update-successfully'));
    }

    public function toggleFeatured(int $id): void
    {
        $this->authorizeDashboardPermission('portfolio_comments_update');

        $comment = PortfolioComment::query()->findOrFail($id);
        $comment->update(['featured' => ! $comment->featured]);

        $this->notifySuccess(__('dashboard.update-successfully'));
    }

    protected function deleteRecord(Model $record): void
    {
        app(ImageManger::class)->deleteImage($record->avatar);
        parent::deleteRecord($record);
    }
}
