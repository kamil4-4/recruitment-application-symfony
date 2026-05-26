<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260525211500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create applications table';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable('applications');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('first_name', 'string', ['length' => 120]);
        $table->addColumn('last_name', 'string', ['length' => 120]);
        $table->addColumn('email', 'string', ['length' => 180]);
        $table->addColumn('position', 'string', ['length' => 180]);
        $table->addColumn('experience_level', 'string', ['length' => 20]);
        $table->addColumn('years_of_experience', 'integer');
        $table->addColumn('technologies', 'text', ['notnull' => false]);
        $table->addColumn('motivation', 'text', ['notnull' => false]);
        $table->addColumn('availability_date', 'date', ['notnull' => false]);
        $table->addColumn('created_at', 'datetime_immutable');
        $table->addColumn('updated_at', 'datetime_immutable');
        $table->setPrimaryKey(['id']);
        $table->addUniqueIndex(['email'], 'UNIQ_APPLICATIONS_EMAIL');
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('applications');
    }
}
