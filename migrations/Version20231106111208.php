<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106111208 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE test ADD id_exam_id INT NOT NULL');
        $this->addSql('ALTER TABLE test ADD CONSTRAINT FK_D87F7E0C8910F7E1 FOREIGN KEY (id_exam_id) REFERENCES exam (id)');
        $this->addSql('CREATE INDEX IDX_D87F7E0C8910F7E1 ON test (id_exam_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE test DROP FOREIGN KEY FK_D87F7E0C8910F7E1');
        $this->addSql('DROP INDEX IDX_D87F7E0C8910F7E1 ON test');
        $this->addSql('ALTER TABLE test DROP id_exam_id');
    }
}
