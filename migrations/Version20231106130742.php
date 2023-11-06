<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106130742 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE last_studies (id INT AUTO_INCREMENT NOT NULL, id_educational_background_id INT NOT NULL, year VARCHAR(10) NOT NULL, class VARCHAR(120) NOT NULL, certification VARCHAR(255) NOT NULL, school LONGTEXT NOT NULL, INDEX IDX_A5252677857314E5 (id_educational_background_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE last_studies ADD CONSTRAINT FK_A5252677857314E5 FOREIGN KEY (id_educational_background_id) REFERENCES educational_background (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE last_studies DROP FOREIGN KEY FK_A5252677857314E5');
        $this->addSql('DROP TABLE last_studies');
    }
}
