<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106124402 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE last_experience (id INT AUTO_INCREMENT NOT NULL, id_pro_background_id INT NOT NULL, year VARCHAR(10) NOT NULL, duration SMALLINT NOT NULL, company VARCHAR(120) NOT NULL, city VARCHAR(255) NOT NULL, job VARCHAR(255) NOT NULL, INDEX IDX_ECE4ABE9A5CA17DE (id_pro_background_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE last_experience ADD CONSTRAINT FK_ECE4ABE9A5CA17DE FOREIGN KEY (id_pro_background_id) REFERENCES pro_background (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE last_experience DROP FOREIGN KEY FK_ECE4ABE9A5CA17DE');
        $this->addSql('DROP TABLE last_experience');
    }
}
