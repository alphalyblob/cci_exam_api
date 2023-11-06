<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106105943 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE session ADD id_training_id INT NOT NULL, ADD ending_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4A6EF5526 FOREIGN KEY (id_training_id) REFERENCES training (id)');
        $this->addSql('CREATE INDEX IDX_D044D5D4A6EF5526 ON session (id_training_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4A6EF5526');
        $this->addSql('DROP INDEX IDX_D044D5D4A6EF5526 ON session');
        $this->addSql('ALTER TABLE session DROP id_training_id, DROP ending_at');
    }
}
