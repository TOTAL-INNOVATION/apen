<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\DB;

class PanelService
{
    public function totals(): array
    {
        $totalUsers = DB::table('users')->count();
        $totalArticles = DB::table('articles')->count();
        $totalApprovals = DB::table('approvals')->count();
        $totalExpertSearches = DB::table('expert_searches')->count();
        $totalStatements = DB::table('statements')->count();
        $totalMessages = DB::table('messages')->count();

        return compact(
            'totalUsers',
            'totalArticles',
            'totalApprovals',
            'totalExpertSearches',
            'totalStatements',
            'totalMessages',
        );
    }
}
