<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241221142555 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id SERIAL NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE langue (id SERIAL NOT NULL, code VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE reponse (id SERIAL NOT NULL, topic_id INT DEFAULT NULL, contenu TEXT NOT NULL, date_publication TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5FB6DEC71F55203D ON reponse (topic_id)');
        $this->addSql('CREATE TABLE topic (id SERIAL NOT NULL, categorie_id INT DEFAULT NULL, langue_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, contenu TEXT NOT NULL, date_publication TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9D40DE1BBCF5E72D ON topic (categorie_id)');
        $this->addSql('CREATE INDEX IDX_9D40DE1B2AADBACD ON topic (langue_id)');
        $this->addSql('CREATE TABLE "user" (id SERIAL NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON "user" (email)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC71F55203D FOREIGN KEY (topic_id) REFERENCES topic (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE topic ADD CONSTRAINT FK_9D40DE1BBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE topic ADD CONSTRAINT FK_9D40DE1B2AADBACD FOREIGN KEY (langue_id) REFERENCES langue (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE reponse DROP CONSTRAINT FK_5FB6DEC71F55203D');
        $this->addSql('ALTER TABLE topic DROP CONSTRAINT FK_9D40DE1BBCF5E72D');
        $this->addSql('ALTER TABLE topic DROP CONSTRAINT FK_9D40DE1B2AADBACD');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE langue');
        $this->addSql('DROP TABLE reponse');
        $this->addSql('DROP TABLE topic');
        $this->addSql('DROP TABLE "user"');
    }
}
