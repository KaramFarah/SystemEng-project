<?php

namespace App\Http\Controllers;

use App\Imports\KnnImport;
use App\Models\CancerTestCases;
use App\Models\Knn;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class KnnController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);

        Excel::import(new KnnImport, $request->file('file'));

        return back()->with('success', 'the file imported successfully.');
    }

    public function index()
    {
        $knns = Knn::get();

        return view('dashboard.cancer', compact('knns'));
    }

    public function massDestroy()
    {
        DB::statement('TRUNCATE TABLE knns');
        // $Knns = Knn::get();
        // foreach ($Knns as $Knn) {
        //     $Knn->delete();
        // }
        return back()->with('success', 'data deleted successfully.');
    }

    public function test()
    {
        return view('dashboard.testknn');
    }

    public function postTest(Request $request)
    {
        $gender = (int) $request->get('gender');
        $age = (int) $request->get('age');
        // $survival_time = (int) $request->get('survival_time');
        $mutations = (int) $request->get('mutations');
        $mutated_genes = (int) $request->get('mutated_genes');
        $tumor_stage = (int) $request->get('tumor_stage');
        $k = (int) $request->get('k');

        $data = Knn::get();

        $result = [];
        foreach ($data as $key => $v) {
            $resGender = pow(($v['gender'] - $gender), 2);
            $resAge = pow(($v['age'] - $age), 2);
            // $resSurvival = pow(($v['survival_time'] - $survival_time), 2);
            $resMutations = pow(($v['mutations'] - $mutations), 2);
            $resMutationsGenes = pow(($v['mutated_genes'] - $mutated_genes), 2);
            $resTumotStage = pow(($v['tumor_stage'] - $tumor_stage), 2);
            $resOperation = sqrt($resGender + $resAge + $resMutations + $resMutationsGenes + $resTumotStage);
            array_push($result, ['id' => $v['id'], 'resOperation' => round($resOperation, 2)]);
        }

        $resOperations = array_column($result, 'resOperation');
        array_multisort($resOperations, SORT_ASC, $result);

        $ids = [];
        for ($i = 0; $i < $k + 1; $i++) {
            $ids[] = $result[$i]['id'];
        }

        $knnResult = Knn::whereIn('id', $ids)->pluck('survival_time');

        $frequencies = $knnResult->countBy();

        $mostFrequentValues = $frequencies->filter(function ($count) use ($frequencies) {
            return $count === $frequencies->max();
        })->keys();

        $survival_time_result = 0;

        if ($mostFrequentValues->count() > 1) {

            $meanValue = 0;
            for ($i = 0; $i < $mostFrequentValues->count(); $i++) {
                $meanValue += $mostFrequentValues[$i];
            }
            $survival_time_result = $meanValue / $mostFrequentValues->count();
        } else {
            $survival_time_result = $mostFrequentValues->first();
        }

        $newCase = new CancerTestCases([
            'gender' => $gender,
            'age' => $age,
            'survival_time' => round($survival_time_result),
            'mutations' => $mutations,
            'mutated_genes' => $mutated_genes,
            'tumor_stage' => $tumor_stage,
        ]);
        $newCase->save();

        return back()->with('success', round($survival_time_result));
    }
}
