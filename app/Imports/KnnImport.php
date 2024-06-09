<?php

namespace App\Imports;

use App\Models\Knn;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KnnImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (empty($row)) {
            return;
        }

        if (!(Knn::count() >= 1534)) {
            $gender = isset($row['gender']) ? (int) $row['gender'] : null;
            $age = isset($row['age_at_diagnosis']) ? (int) $row['age_at_diagnosis'] : null;
            $survival_time = isset($row['survival_time_days']) ? (int) $row['survival_time_days'] : null;
            $mutations = isset($row['mutations']) ? (int) $row['mutations'] : null;
            $mutated_genes = isset($row['mutated_genes']) ? (int) $row['mutated_genes'] : null;
            $tumor_stage = isset($row['tumor_stage_at_diagnosis']) ? (int) $row['tumor_stage_at_diagnosis'] : null;

            return new Knn([
                'gender' => $gender,
                'age' => $age,
                'survival_time' => $survival_time,
                'mutations' => $mutations,
                'mutated_genes' => $mutated_genes,
                'tumor_stage' => $tumor_stage,
            ]);
        }
    }
}
