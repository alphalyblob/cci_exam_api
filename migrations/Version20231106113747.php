<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106113747 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pro_background (id INT AUTO_INCREMENT NOT NULL, id_pro_experience_id INT NOT NULL, id_user_id INT NOT NULL, INDEX IDX_F1E05F02A1E7013 (id_pro_experience_id), UNIQUE INDEX UNIQ_F1E05F079F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pro_background ADD CONSTRAINT FK_F1E05F02A1E7013 FOREIGN KEY (id_pro_experience_id) REFERENCES pro_experience (id)');
        $this->addSql('ALTER TABLE pro_background ADD CONSTRAINT FK_F1E05F079F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pro_background DROP FOREIGN KEY FK_F1E05F02A1E7013');
        $this->addSql('ALTER TABLE pro_background DROP FOREIGN KEY FK_F1E05F079F37AE5');
        $this->addSql('DROP TABLE pro_background');
    }
}
