### Geração de migreations com validação de existencias de schema no banco de dados.

```php
<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version{{timestamp}} extends AbstractMigration
{
    public function getDescription(): string
    {
        return '{{descricao}}';
    }

    public function up(Schema $schema): void
    {
        $schemaManager = $this->connection->createSchemaManager();

        if (! $schemaManager->tablesExist(['example'])) {
            $this->addSql('
                CREATE TABLE example (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    nome VARCHAR(255) NOT NULL
                )
            ');
        }
    }

    public function down(Schema $schema): void
    {
        $schemaManager = $this->connection->createSchemaManager();

        if ($schemaManager->tablesExist(['example'])) {
            $this->addSql('DROP TABLE example');
        }
    }
}

```
----

### A fração de codigo a seguir faz com que o codigo verifique se a tabela a ser criada ja é existente e não permite a execução do trecho de migração:

```php
public function up(Schema $schema): void
    {
        $schemaManager = $this->connection->createSchemaManager();

        if (! $schemaManager->tablesExist(['example'])) {
            $this->addSql('
                CREATE TABLE example (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    nome VARCHAR(255) NOT NULL
                )
            ');
        }
    }
```
----


### a fração seguinte faz com que a execução da remoção da tabela na migração faça uma busca de validação de existencia da tebela antes de fazer o drop :

```php 
$schemaManager = $this->connection->createSchemaManager();

        public function down(Schema $schema): void
    {
        $schemaManager = $this->connection->createSchemaManager();

        if ($schemaManager->tablesExist(['example'])) {
            $this->addSql('DROP TABLE example');
        }
    }
```