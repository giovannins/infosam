<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106163923 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE pessoa_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE pessoa (id INT NOT NULL, endereco_id INT NOT NULL, contato_id INT NOT NULL, nome VARCHAR(255) NOT NULL, data_nascimento DATE NOT NULL, cpf VARCHAR(14) NOT NULL, rg VARCHAR(12) DEFAULT NULL, rg_orgao_emissor VARCHAR(10) DEFAULT NULL, rg_uf VARCHAR(2) DEFAULT NULL, sexo BOOLEAN NOT NULL, complemento VARCHAR(255) DEFAULT NULL, numero INT NOT NULL, estado_civil VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1CDFAB821BB76823 ON pessoa (endereco_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1CDFAB82B279BE46 ON pessoa (contato_id)');
        $this->addSql('ALTER TABLE pessoa ADD CONSTRAINT FK_1CDFAB821BB76823 FOREIGN KEY (endereco_id) REFERENCES endereco (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pessoa ADD CONSTRAINT FK_1CDFAB82B279BE46 FOREIGN KEY (contato_id) REFERENCES contato (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE endereco ADD uf VARCHAR(2) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE pessoa_id_seq CASCADE');
        $this->addSql('ALTER TABLE pessoa DROP CONSTRAINT FK_1CDFAB821BB76823');
        $this->addSql('ALTER TABLE pessoa DROP CONSTRAINT FK_1CDFAB82B279BE46');
        $this->addSql('DROP TABLE pessoa');
        $this->addSql('ALTER TABLE endereco DROP uf');
    }
}
