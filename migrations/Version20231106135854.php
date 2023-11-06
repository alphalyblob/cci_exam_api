<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106135854 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fill_blank_quest (id INT AUTO_INCREMENT NOT NULL, id_question_id INT NOT NULL, expected_value VARCHAR(255) NOT NULL, blank_idx SMALLINT NOT NULL, INDEX IDX_72EF04386353B48 (id_question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fill_blank_quest ADD CONSTRAINT FK_72EF04386353B48 FOREIGN KEY (id_question_id) REFERENCES question (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fill_blank_quest DROP FOREIGN KEY FK_72EF04386353B48');
        $this->addSql('DROP TABLE fill_blank_quest');
    }
}
