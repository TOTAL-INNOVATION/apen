<?php

declare (strict_types = 1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    protected $signature   = 'make:sitemap';
    protected $description = 'Generate sitemap';

    public function handle()
    {
        $sitemap = SitemapGenerator::create(
            config('app.url')
        )->getSitemap();

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
