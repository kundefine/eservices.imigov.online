<?php
namespace App\KuHelpers;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

abstract class MigrationHelper extends Migration {
    protected $table;
    public function __construct()
    {
        $this->setTable();
    }

    abstract public function setTable();

    protected function dropColumn($column_name) {
        Schema::table($this->table, function (Blueprint $table) use ($column_name) {
            if(Schema::hasColumn($this->table, $column_name)) {
                $table->dropColumn($column_name);
            }
        });
    }

    protected function dropColumns(array $column_names) {
        foreach ($column_names as $column_name) {
            Schema::table($this->table, function (Blueprint $table) use ($column_name) {
                if(Schema::hasColumn($this->table, $column_name)) {
                    $table->dropColumn($column_name);
                }
            });
        }
    }






}
