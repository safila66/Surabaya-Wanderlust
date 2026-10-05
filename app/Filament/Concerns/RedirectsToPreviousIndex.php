<?php

namespace App\Filament\Concerns;

use Livewire\Attributes\Locked;

trait RedirectsToPreviousIndex
{
    // URL daftar sebelumnya, lengkap dengan ?page=2, search, dll.
    #[Locked]
    public ?string $previousUrl = null;

    // Dipanggil otomatis oleh Livewire saat halaman dibuka
    public function mountRedirectsToPreviousIndex(): void
    {
        $previous = url()->previous();
        $indexUrl = static::getResource()::getUrl('index');

        // Hanya simpan kalau datang dari halaman daftar resource ini
        if (str_starts_with($previous, $indexUrl)) {
            $this->previousUrl = $previous;
        }
    }

    protected function getPreviousIndexUrl(): string
    {
        return $this->previousUrl ?? static::getResource()::getUrl('index');
    }

    protected function getRedirectUrl(): ?string
    {
        return $this->getPreviousIndexUrl();
    }
}