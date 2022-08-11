<?php

namespace App\Console\Migration;

use Illuminate\Database\Schema\Blueprint;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TravelDatabase extends ConsoleMigration
{
    /**
     * @return string
     */
    protected function getConnectionName(): string
    {
        return 'sqlite';
    }

    /**
     * @return void
     */
    protected function configure()
    {
        $this->setName('travel:create-database');
        $this->setDescription('Create the travel database');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<info>Starting migration</info>');

        $output->writeln('<comment>Droping tables...</comment>');
        $this->dropIfExists();

        $output->writeln('<comment>Creating tables...</comment>');
        $this->createTables();

        $output->writeln('<comment>Inserting data...</comment>');

        return Command::SUCCESS;
    }

    private function dropIfExists()
    {
        $this->schemaBuilder->dropIfExists('travel');
        $this->schemaBuilder->dropIfExists('route');
    }

    private function createTables()
    {
        if (!$this->schemaBuilder->hasTable('travel')) {
            $this->schemaBuilder->create('travel', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->string('title', 255)->unique();
                $table->dateTime('created_at');
                $table->dateTime('updated_at');
                $table->softDeletes();
            });
        }

        if (!$this->schemaBuilder->hasTable('route')) {
            $this->schemaBuilder->create('route', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->foreignId('travel_id')->references('id')->on('travel');
                $table->point('from');
                $table->point('to');
                $table->dateTime('created_at');
                $table->dateTime('updated_at');
                $table->softDeletes();
            });
        }
    }
}