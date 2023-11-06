<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106130429 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE diploma (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE educational_background (id INT AUTO_INCREMENT NOT NULL, id_diploma_id INT NOT NULL, id_user_id INT NOT NULL, INDEX IDX_1C459311C104E62 (id_diploma_id), UNIQUE INDEX UNIQ_1C45931179F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE educational_background ADD CONSTRAINT FK_1C459311C104E62 FOREIGN KEY (id_diploma_id) REFERENCES diploma (id)');
        $this->addSql('ALTER TABLE educational_background ADD CONSTRAINT FK_1C45931179F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE educational_background DROP FOREIGN KEY FK_1C459311C104E62');
        $this->addSql('ALTER TABLE educational_background DROP FOREIGN KEY FK_1C45931179F37AE5');
        $this->addSql('DROP TABLE diploma');
        $this->addSql('DROP TABLE educational_background');
    }
}
