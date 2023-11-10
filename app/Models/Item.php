<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $with = ['category', 'author'];
public function scopeSortByNameAsc($query)
{
    return $query->orderBy('name', 'asc');
}
 public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('name', 'like', '%' . $search . '%')
            )
        );
        $query->when($filters['category'] ?? false, fn($query, $category) =>
        $query->whereHas('category', fn ($query) =>
            $query->where('slug', $category)
        )
    );

    $query->when($filters['author'] ?? false, fn($query, $author) =>
        $query->whereHas('author', fn ($query) =>
            $query->where('username', $author)
        )
    );
}
public function category()
{
    return $this->belongsTo(Category::class);
}
public function author()
{
    return $this->belongsTo(User::class, 'user_id');
}
public function priority()
{
    return $this->belongsTo(Priority::class);
}
}
