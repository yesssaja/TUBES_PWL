<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

abstract class BaseSeeder extends Seeder
{
    protected function upsertAndGetId(string $table, array $where, array $data): ?int
    {
        if (!Schema::hasTable($table)) {
            return null;
        }

        $columns = Schema::getColumnListing($table);

        $filteredWhere = collect($where)
            ->filter(fn ($value, $key) => in_array($key, $columns))
            ->toArray();

        $filteredData = collect($data)
            ->filter(fn ($value, $key) => in_array($key, $columns))
            ->toArray();

        if (empty($filteredData)) {
            return null;
        }

        $query = DB::table($table);

        foreach ($filteredWhere as $key => $value) {
            $query->where($key, $value);
        }

        $existingId = null;

        if (!empty($filteredWhere) && in_array('id', $columns)) {
            $existingId = $query->value('id');
        }

        if ($existingId) {
            DB::table($table)->where('id', $existingId)->update($filteredData);
            return $existingId;
        }

        if (in_array('id', $columns)) {
            return DB::table($table)->insertGetId($filteredData);
        }

        DB::table($table)->insert($filteredData);

        return null;
    }

    protected function enumValue(string $table, string $column, array $preferredValues): ?string
    {
        if (!Schema::hasTable($table) || !Schema::hasColumn($table, $column)) {
            return null;
        }

        $databaseName = DB::getDatabaseName();

        $result = DB::select("
            SELECT COLUMN_TYPE 
            FROM information_schema.COLUMNS
            WHERE TABLE_SCHEMA = ?
            AND TABLE_NAME = ?
            AND COLUMN_NAME = ?
            LIMIT 1
        ", [$databaseName, $table, $column]);

        if (empty($result)) {
            return $preferredValues[0] ?? null;
        }

        $type = $result[0]->COLUMN_TYPE ?? '';

        if (preg_match("/^enum\((.*)\)$/", $type, $matches)) {
            $values = str_getcsv($matches[1], ',', "'");

            foreach ($preferredValues as $preferred) {
                if (in_array($preferred, $values)) {
                    return $preferred;
                }
            }

            return $values[0] ?? null;
        }

        return $preferredValues[0] ?? null;
    }
}