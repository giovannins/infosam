<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106161242 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE contato_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE endereco_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE contato (id INT NOT NULL, telefone_residencial VARCHAR(20) DEFAULT NULL, telefone_celular VARCHAR(20) NOT NULL, telefone_outro VARCHAR(20) DEFAULT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE endereco (id INT NOT NULL, cep VARCHAR(8) NOT NULL, bairro VARCHAR(255) NOT NULL, logradouro VARCHAR(255) NOT NULL, municipio VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE contato_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE endereco_id_seq CASCADE');
        $this->addSql('DROP TABLE contato');
        $this->addSql('DROP TABLE endereco');
    }
}
