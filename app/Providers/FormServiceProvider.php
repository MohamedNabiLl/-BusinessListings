<?php

namespace App\Providers;
use Form;

use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('bsText', 'components.form.text', ['name', 'value', 'attributes']);
        Form::component('bsTextArea', 'components.form.textarea', ['name', 'value', 'attributes']);
        Form::component('bsSubmit', 'components.form.submit', ['value' => 'submit', 'attributes']);
        Form::component('hidden', 'components.form.hidden', ['name', 'value', 'attributes']);
    }
}
