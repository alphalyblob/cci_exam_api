<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106104412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE training_center (id INT AUTO_INCREMENT NOT NULL, city VARCHAR(120) NOT NULL, postcode VARCHAR(10) NOT NULL, region VARCHAR(50) NOT NULL, address VARCHAR(255) NOT NULL, phone VARCHAR(30) NOT NULL, name VARCHAR(255) NOT NULL, matricule VARCHAR(255) DEFAULT NULL, label VARCHAR(80) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training_center_training_center (training_center_source INT NOT NULL, training_center_target INT NOT NULL, INDEX IDX_FC2B3C914C4109CF (training_center_source), INDEX IDX_FC2B3C9155A45940 (training_center_target), PRIMARY KEY(training_center_source, training_center_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE training_center_training_center ADD CONSTRAINT FK_FC2B3C914C4109CF FOREIGN KEY (training_center_source) REFERENCES training_center (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE training_center_training_center ADD CONSTRAINT FK_FC2B3C9155A45940 FOREIGN KEY (training_center_target) REFERENCES training_center (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE training_center_training_center DROP FOREIGN KEY FK_FC2B3C914C4109CF');
        $this->addSql('ALTER TABLE training_center_training_center DROP FOREIGN KEY FK_FC2B3C9155A45940');
        $this->addSql('DROP TABLE training_center');
        $this->addSql('DROP TABLE training_center_training_center');
    }
}
