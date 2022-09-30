<?php

namespace App\Imports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostImport implements ToModel, WithHeadingRow
{
    public function model(array $row): Post
    {
        return new Post([
            'title' => $row['titel'],
            'content' => $row['inhalt'],
            'user_id' => $row['benutzer_id'],
            'category_id' => $row['kategorie_id'],
        ]);
    }
}
