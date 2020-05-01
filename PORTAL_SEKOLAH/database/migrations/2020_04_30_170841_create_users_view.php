<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class CreateUsersView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW users AS SELECT
                        CONCAT('u-', CONVERT(id,VARCHAR(20))) AS id,
                        id AS id_user,
                        'user' As role,
                        name,
                        user_name AS email,
                        email_verified_at,
                        password,
                        remember_token,
                        created_at,
                        updated_at
                    FROM user
                    UNION ALL 
                    SELECT
                        CONCAT('c-', CONVERT(id,VARCHAR(20))) AS id,
                        id AS id_user,
                        'calon_siswa' AS role,
                        name,
                        user_name AS email,
                        email_verified_at,
                        password,
                        remember_token,
                        created_at,
                        updated_at
                    FROM ppdb_user");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW users");
    }
}
