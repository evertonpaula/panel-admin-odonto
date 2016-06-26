<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Exception;
use DB;

class MigrateTenantDb extends Command
{

	protected $signature = 'migrate:tenant {id} {--rb}';
	protected $description = 'Run migratess on a particular tenant database.';

	public function __construct()
	{
		parent::__construct();
	}

	public function fire()
	{
		$id = $this->argument('id');
		$rb = $this->option('rb');

		// confirm before proceeding
		if( !$this->confirm('Do you wish to continue? [y|N]') ) {
			$this->info('Operation canceled successfuly!!!');
			return false;
		}

		if($this->_tenantExists($id)){
			// set db config to informed tenant and reconnects
			$dbName = sprintf( 'db_clinic_%06d', $id );
			Config::set( 'database.connections.mysql.database', $dbName );
			DB::reconnect('mysql');

			if(!$rb) {

				$this->_tenantMigrationsExists();

				$this->call('migrate', [
					'--path' => 'database/migrations/tenant',
					'--database' => 'mysql',
					'--force' => true,
				]);
			}

			if($rb) {
				$this->call('migrate:rollback', [
					'--database' => 'mysql',
				]);
			}

			DB::reconnect('mysql_core');

			$this->info('Operation finish successfuly!!!');
			return true;

		}

		$this->error('Something went wrong!!!');
		$this->error('Probably the database does not exist.!!!');
	}

	private function _tenantExists( $id )
	{
		Config::set( 'database.default', 'mysql' );
		$clinic = DB::table('clinics')->find( $id );

		return !is_null( $clinic );
	}

	private function _tenantMigrationsExists()
	{
		try {
			$this->call('migrate:install', [
				'--database' => 'mysql',
			]);
		} catch (Exception $e) {
			$this->info("Migration alredy exists!!!");
		}
	}
}
