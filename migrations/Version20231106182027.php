<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106182027 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE policial_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE policial (id INT NOT NULL, pessoa_id INT NOT NULL, re VARCHAR(10) NOT NULL, posto VARCHAR(20) NOT NULL, status VARCHAR(20) NOT NULL, numero_spprev VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9EF773FDF6FA0A5 ON policial (pessoa_id)');
        $this->addSql('ALTER TABLE policial ADD CONSTRAINT FK_9EF773FDF6FA0A5 FOREIGN KEY (pessoa_id) REFERENCES pessoa (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE policial_id_seq CASCADE');
        $this->addSql('ALTER TABLE policial DROP CONSTRAINT FK_9EF773FDF6FA0A5');
        $this->addSql('DROP TABLE policial');
    }
}
