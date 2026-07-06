<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class AmbulanceJournal extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'tasks',
        'images',
        'videos',
        'links',
        'journal_date',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'tasks' => 'array',
            'images' => 'array',
            'videos' => 'array',
            'links' => 'array',
            'journal_date' => 'date',
        ];
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected static function booted(): void
    {
        static::creating(function (AmbulanceJournal $journal) {
            if (empty($journal->{$journal->getKeyName()})) {
                $journal->{$journal->getKeyName()} = self::generateShortId();
            }
        });

        // Hapus file yang dihapus dari form saat edit
        static::saving(function (AmbulanceJournal $journal) {
            $old = $journal->getOriginal('images') ?? [];
            $new = $journal->images ?? [];
            $removed = array_diff($old, $new);
            foreach ($removed as $file) {
                Storage::disk('public')->delete($file);
            }
        });

        // Hapus semua file saat record dihapus
        static::deleting(function (AmbulanceJournal $journal) {
            foreach ($journal->images ?? [] as $file) {
                Storage::disk('public')->delete($file);
            }
        });
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    // Ubah link video (YouTube, Vimeo, Google Drive, dll) jadi URL embed untuk iframe
    public static function toEmbedVideoUrl(string $url): string
    {
        if (preg_match('/(?:youtube\.com\/watch\?v=|youtube\.com\/shorts\/|youtu\.be\/)([\w-]+)/', $url, $m)) {
            return "https://www.youtube.com/embed/{$m[1]}";
        }

        if (preg_match('/vimeo\.com\/(\d+)/', $url, $m)) {
            return "https://player.vimeo.com/video/{$m[1]}";
        }

        if (preg_match('/drive\.google\.com\/file\/d\/([\w-]+)/', $url, $m)) {
            return "https://drive.google.com/file/d/{$m[1]}/preview";
        }

        return $url;
    }

    // Karakter yang dipakai untuk ID pendek — hindari 0/O dan 1/I/L yang mirip
    private const SHORT_ID_CHARS = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';

    public static function generateShortId(): string
    {
        $chars = self::SHORT_ID_CHARS;
        $result = '';
        for ($i = 0; $i < 5; $i++) {
            $result .= $chars[random_int(0, strlen($chars) - 1)];
        }

        return $result;
    }
}
