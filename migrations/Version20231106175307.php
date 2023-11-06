<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106175307 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE observacoes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE observacoes (id INT NOT NULL, data DATE NOT NULL, motivo VARCHAR(255) NOT NULL, descricao VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE observacoes_pessoa (observacoes_id INT NOT NULL, pessoa_id INT NOT NULL, PRIMARY KEY(observacoes_id, pessoa_id))');
        $this->addSql('CREATE INDEX IDX_51F702CA88EA0B36 ON observacoes_pessoa (observacoes_id)');
        $this->addSql('CREATE INDEX IDX_51F702CADF6FA0A5 ON observacoes_pessoa (pessoa_id)');
        $this->addSql('ALTER TABLE observacoes_pessoa ADD CONSTRAINT FK_51F702CA88EA0B36 FOREIGN KEY (observacoes_id) REFERENCES observacoes (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE observacoes_pessoa ADD CONSTRAINT FK_51F702CADF6FA0A5 FOREIGN KEY (pessoa_id) REFERENCES pessoa (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE observacoes_id_seq CASCADE');
        $this->addSql('ALTER TABLE observacoes_pessoa DROP CONSTRAINT FK_51F702CA88EA0B36');
        $this->addSql('ALTER TABLE observacoes_pessoa DROP CONSTRAINT FK_51F702CADF6FA0A5');
        $this->addSql('DROP TABLE observacoes');
        $this->addSql('DROP TABLE observacoes_pessoa');
    }
}
