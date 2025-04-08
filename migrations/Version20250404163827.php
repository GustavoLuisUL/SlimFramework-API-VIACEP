<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250404163827 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Criacao do Schema de registro de CEPs';
    }

    public function up(Schema $schema): void
    {
        $schemaManager = $this->connection->createSchemaManager();

        if (! $schemaManager->tablesExist(['cep'])) {
            $this->addSql('
                CREATE TABLE cep (
                    id BIGINT AUTO_INCREMENT PRIMARY KEY,
                    nome VARCHAR(255) NOT NULL
                )
            ');
        }
    }

    public function down(Schema $schema): void
    {
        $schemaManager = $this->connection->createSchemaManager();

        if ($schemaManager->tablesExist(['cep'])) {
            $this->addSql('DROP TABLE cep');
        }

    }
}
