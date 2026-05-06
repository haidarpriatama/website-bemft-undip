<?php

namespace App\Filament\Pages;

use Livewire\TemporaryUploadedFile;
use Reworck\FilamentSettings\Pages\Settings as PagesSettings;
use Spatie\Valuestore\Valuestore;

class Settings extends PagesSettings
{

    protected static bool $shouldRegisterNavigation = false;

    public function mount(): void
    {
        $this->form->fill(
            Valuestore::make(
                config('filament-settings.path')
            )->all()
        );
    }

    public function submit(): void
    {
        $this->validate();


        foreach ($this->data as $key => $data) {
            if ($key === 'navbar' && isset($data['logo'])) {
                $path = '';
                foreach ($data['logo'] as $file) {
                    if($file instanceof TemporaryUploadedFile) {
                        $path = str_replace('public/', '', $file->store('public/navbarlogo'));
                    } else {
                        $path = $file;
                    }
                }
                $data['logo'] = $path;
            }
            Valuestore::make(
                config('filament-settings.path')
            )->put($key, $data);
        }

        $this->notify('success', 'Saved!');
    }
}
