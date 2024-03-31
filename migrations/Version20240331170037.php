<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240331170037 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE villes ADD pays_id INT NOT NULL');
        $this->addSql('ALTER TABLE villes ADD CONSTRAINT FK_19209FD8A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('CREATE INDEX IDX_19209FD8A6E44244 ON villes (pays_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE villes DROP FOREIGN KEY FK_19209FD8A6E44244');
        $this->addSql('DROP INDEX IDX_19209FD8A6E44244 ON villes');
        $this->addSql('ALTER TABLE villes DROP pays_id');
    }
}
