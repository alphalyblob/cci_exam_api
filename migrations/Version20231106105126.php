<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106105126 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE training (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(80) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training_training_center (training_id INT NOT NULL, training_center_id INT NOT NULL, INDEX IDX_C64B9570BEFD98D1 (training_id), INDEX IDX_C64B957037BE9083 (training_center_id), PRIMARY KEY(training_id, training_center_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE training_training_center ADD CONSTRAINT FK_C64B9570BEFD98D1 FOREIGN KEY (training_id) REFERENCES training (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE training_training_center ADD CONSTRAINT FK_C64B957037BE9083 FOREIGN KEY (training_center_id) REFERENCES training_center (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE training_training_center DROP FOREIGN KEY FK_C64B9570BEFD98D1');
        $this->addSql('ALTER TABLE training_training_center DROP FOREIGN KEY FK_C64B957037BE9083');
        $this->addSql('DROP TABLE training');
        $this->addSql('DROP TABLE training_training_center');
    }
}
