<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106143545 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE result (id INT AUTO_INCREMENT NOT NULL, id_question_id INT NOT NULL, UNIQUE INDEX UNIQ_136AC1136353B48 (id_question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE result ADD CONSTRAINT FK_136AC1136353B48 FOREIGN KEY (id_question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE answer ADD result_id INT NOT NULL');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A257A7B643 FOREIGN KEY (result_id) REFERENCES result (id)');
        $this->addSql('CREATE INDEX IDX_DADD4A257A7B643 ON answer (result_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A257A7B643');
        $this->addSql('ALTER TABLE result DROP FOREIGN KEY FK_136AC1136353B48');
        $this->addSql('DROP TABLE result');
        $this->addSql('DROP INDEX IDX_DADD4A257A7B643 ON answer');
        $this->addSql('ALTER TABLE answer DROP result_id');
    }
}
