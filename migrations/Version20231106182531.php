<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106182531 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE dependente_pensionista_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE dependente_pensionista (id INT NOT NULL, pessoa_id INT NOT NULL, polical_id INT NOT NULL, status VARCHAR(20) NOT NULL, matricula VARCHAR(255) DEFAULT NULL, parentesco VARCHAR(20) NOT NULL, pensionista BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A15AA88CDF6FA0A5 ON dependente_pensionista (pessoa_id)');
        $this->addSql('CREATE INDEX IDX_A15AA88CCDB168C9 ON dependente_pensionista (polical_id)');
        $this->addSql('ALTER TABLE dependente_pensionista ADD CONSTRAINT FK_A15AA88CDF6FA0A5 FOREIGN KEY (pessoa_id) REFERENCES pessoa (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE dependente_pensionista ADD CONSTRAINT FK_A15AA88CCDB168C9 FOREIGN KEY (polical_id) REFERENCES policial (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE dependente_pensionista_id_seq CASCADE');
        $this->addSql('ALTER TABLE dependente_pensionista DROP CONSTRAINT FK_A15AA88CDF6FA0A5');
        $this->addSql('ALTER TABLE dependente_pensionista DROP CONSTRAINT FK_A15AA88CCDB168C9');
        $this->addSql('DROP TABLE dependente_pensionista');
    }
}
